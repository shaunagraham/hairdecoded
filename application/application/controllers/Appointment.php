<?php
/* Google App Client Id */
define('CLIENT_ID', '126440069877-i78cbvgj1b3sv9574phbour6eu1pqke9.apps.googleusercontent.com');

/* Google App Client Secret */
define('CLIENT_SECRET', 'txArhMA78TmU1rK36KaRMty1');

/* Google App Redirect Url */
define('CLIENT_REDIRECT_URL', 'https://hairdecoded.com/Appointment/google_login_calender');
require_once('google-calendar-api.php');

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Appointment extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$user = $this->session->get_userdata('user');
		if(empty($user)) {
			redirect(base_url());
		}else{
			if(empty($user['user']['userType'])) {
			// 	if($user['user']['userType'] != "professional") {
			// 		redirect(base_url());
			// 	}
			// }else{
				redirect(base_url());
			}
		}
		// echo "<pre>";
		$access_token = $this->session->get_userdata('access_token');
		$event_date = $this->session->get_userdata('event_date');
		// print_r($event_date);
		if(!empty($access_token['access_token']) && !empty($event_date['event_date'])) {
			try {
				$this->session->set_userdata('event_date',"");
					// Get event details
				$capi = new GoogleCalendarApi();
					// Get user calendar timezone
				$user_timezone = $capi->GetUserCalendarTimezone($access_token['access_token']);
					// Create event on primary calendar
				$aa['event_date'] = $event_date['event_date'];
				$event_id = $capi->CreateCalendarEvent('primary',"Appointment", 1, $aa, $user_timezone, $access_token['access_token']);
				echo '<script>alert("Appoinment date successfully added in calendar.");</script>';
			}
			catch(Exception $e) {
				echo '<script>messageShow("Error!","'.$e->getMessage().'","red","Try-Again");</script>';
			}
		}
		$menu['appointmentmenu'] = 'active';
		$data['times'] = $this->common->selectRecord("sshd_time");
		$data['userType'] = $user['user']['userType'] ;
		$this->load->view("common/header", $menu);
		$this->load->view("appointment", $data);
		$this->load->view("common/footer", []);
	}

	public function add()
	{
		if( (isset($_POST['id']) && isset($_POST['dates']) && isset($_POST['times']) ) && (!empty($_POST['id']) && !empty($_POST['dates']) && !empty($_POST['times']) ) ) {
			$services = $this->common->selectRecord("sshd_service","ServiceID,ServicePic,Title,Description,Price,HasTag,ServiceMasterID,ServiceTime",array('ServiceID'=>$_POST['id']),"ServiceID","desc");

			$user = $this->session->get_userdata('user');

			$data['UserID'] = $user['user']['id'];
			$data['ServiceID'] = $_POST['id'];
			$data['AppointmentDate'] = date('Y-m-d',strtotime($_POST['dates']));
			$data['AppointmentTime'] = $_POST['times'];
			$data['Price'] = $services[0]->Price;
			$data['ServiceTime'] = $services[0]->ServiceTime;
			$data['Action'] = 'Pending';
			$data['CreatedBy'] = $user['user']['id'];
			if(isset($_POST['notes']) && !empty($_POST['notes'])) {
				$data['Notes'] = $_POST['notes'];
			}
			if(isset($_POST['bookid']) && !empty($_POST['bookid'])) {
				$data['Action'] = 'Rescheduled';
				if($this->common->updateRecord('sshd_appointment',$data,array("AppointmentID"=>$_POST['bookid']))) {
					$response['status'] = "true";
					$response['message'] = "Appointments successfully Rescheduled.";
				}else{
					$response['status'] = "false";
					$response['message'] = "Something went wrong. Please try again later.";
				}
			}else{
				if($this->common->insertRecord('sshd_appointment',$data)) {
					$response['status'] = "true";
					$response['message'] = "Appointments successfully booked.";
				}else{
					$response['status'] = "false";
					$response['message'] = "Something went wrong. Please try again later.";
				}
			}
			
		}else{
			$response['status'] = "false";
			$response['message'] = "Please select date and time.";
		}
		echo json_encode($response);
	}

	public function getAppointment()
	{
		$user = $this->session->get_userdata('user');
		if(isset($_POST['id']) && !empty($_POST['id'])) {
			$apt=$this->db->select("a.*,s.ServicePic,s.Title,s.Description,s.HasTag,s.Price as ServicePrice,s.ServiceTime as SServiceTime,s.HairForID,s.HairLengthID,s.HairTypeID,s.HairColorID,s.ServiceMasterID")->from('sshd_appointment as a')->join('sshd_service as s','a.ServiceID = s.ServiceID')->where('AppointmentID',$_POST['id'])->where('(s.UserID = "'.$user['user']['id'].'" or a.UserID = "'.$user['user']['id'].'")')->get()->result();

			$appointment = array();
			if(!empty($apt)) {
				foreach ($apt as $value) {
					$styl = $this->db->select('EmailID,MobileNo,StylistName')->where("UserID",$value->UserID)->get("sshd_stylist")->row();
					if(empty($styl)) {
						$styl = $this->db->select('email,mobileNo,firstName,lastName')->where("id",$value->UserID)->get("sshd_user")->row();
						$value->EmailID = $styl->email;
						$value->MobileNo = $styl->mobileNo;
						$value->userName = $styl->firstName." ".$styl->lastName;
					}else{
						$value->EmailID = $styl->EmailID;
						$value->MobileNo = $styl->MobileNo;
						$value->userName = $styl->StylistName;
					}
					$value->AppointmentDate = date("m/d/Y",strtotime($value->AppointmentDate));
					$value->AppointmentTime = date("h:i A",strtotime($value->AppointmentTime));
					$value->Duration = date('i', strtotime($value->SServiceTime));
					$services = $this->db->select('ServiceName')->where_in('ServiceMasterID',explode(",", $value->ServiceMasterID))->get('sshd_servicemaster')->result();
					$ss = array();
					if(!empty($services)) {
						foreach ($services as $serval) {
							$ss[] = $serval->ServiceName;
						}
					}
					$value->service = implode(" & ", $ss);
					$appointment[] = $value;
				}
			}
			if($appointment) {
				$response['data'] = $appointment;
				$response['status'] = "true";
				$response['message'] = "Appointments found successfully.";
			}else{
				$response['status'] = "false";
				$response['message'] = "No Service found!";
			}
		}else{
			// $upcoming = $this->db->where('Status',1)->where('(DATE(AppointmentDate) < DATE(NOW()))')->get('sshd_appointment')->result();
			$upcoming = $this->db->select("a.*,s.ServicePic,s.Title,s.Description,s.HasTag,s.Price as ServicePrice,s.ServiceTime as SServiceTime,s.HairForID,s.HairLengthID,s.HairTypeID,s.HairColorID,s.ServiceMasterID")->from('sshd_appointment as a')->join('sshd_service as s','a.ServiceID = s.ServiceID')->where('(a.Action = "Pending" or a.Action = "Confirmed" or a.Action = "Rescheduled")')->where('(s.UserID = "'.$user['user']['id'].'" or a.UserID = "'.$user['user']['id'].'")')->get()->result();
			// echo $this->db->last_query();
			// $past = $this->db->where('Status',1)->where('(DATE(AppointmentDate) >= DATE(NOW()))')->get('sshd_appointment')->result();
			$past = $this->db->select("a.*,s.ServicePic,s.Title,s.Description,s.HasTag,s.Price as ServicePrice,s.ServiceTime as SServiceTime,s.HairForID,s.HairLengthID,s.HairTypeID,s.HairColorID,s.ServiceMasterID")->from('sshd_appointment as a')->join('sshd_service as s','a.ServiceID = s.ServiceID')->where('(a.Action = "Cancelled" or a.Action = "Completed")')->where('(s.UserID = "'.$user['user']['id'].'" or a.UserID = "'.$user['user']['id'].'")')->get()->result();

			$up = $pt = array();
			if(!empty($upcoming)) {
				foreach ($upcoming as $value) {
					$value->AppointmentDate = date("m/d/Y",strtotime($value->AppointmentDate));
					$value->AppointmentTime = date("h:i A",strtotime($value->AppointmentTime));
					$value->Duration = date('i', strtotime($value->SServiceTime));
					$services = $this->db->select('ServiceName')->where_in('ServiceMasterID',explode(",",$value->ServiceMasterID))->get('sshd_servicemaster')->result();
					$ss = array();
					if(!empty($services)) {
						foreach ($services as $serval) {
							$ss[] = $serval->ServiceName;
						}
					}
					$value->service = implode(" & ", $ss);
					$up[] = $value;
				}
			}
			if(!empty($past)) {
				foreach ($past as $value) {
					$value->AppointmentDate = date("m/d/Y",strtotime($value->AppointmentDate));
					$value->AppointmentTime = date("h:i A",strtotime($value->AppointmentTime));
					$value->Duration = date('i', strtotime($value->SServiceTime));
					$services = $this->db->select('ServiceName')->where_in('ServiceMasterID',explode(",",$value->ServiceMasterID))->get('sshd_servicemaster')->result();
					$ss = array();
					if(!empty($services)) {
						foreach ($services as $serval) {
							$ss[] = $serval->ServiceName;
						}
					}
					$value->service = implode(" & ", $ss);
					$pt[] = $value;
				}
			}
			if($up || $pt) {
				$response['upcoming'] = $up;
				$response['past'] = $pt;
				$response['status'] = "true";
				$response['message'] = "Appointments found successfully.";
			}else{
				$response['status'] = "false";
				$response['message'] = "No Service found!";
			}
		}
		
		echo json_encode($response);
	}

	public function statusChange()
	{
		if( (isset($_POST['id']) && isset($_POST['action'])) && (!empty($_POST['id']) && !empty($_POST['action'])) ) {
			if($this->common->updateRecord('sshd_appointment',array("Action"=>$_POST['action']),array("AppointmentID"=>$_POST['id']))) {
				$response['query'] = $this->db->last_query();
				$response['status'] = "true";
				$response['message'] = "Appointments status changed successfully";
			}else{
				$response['status'] = "false";
				$response['message'] = "Something went wrong. Please try again later.";
			}
		}else{
			$response['status'] = "false";
			$response['message'] = "Something went wrong. Please try again later.";
		}
		echo json_encode($response);
	}

	public function sentmessage() {
		$config['protocol']    = 'mail';
		$config['smtp_host']    = 'mail.hairdecoded.com';
		$config['smtp_port']    = '25';
		$config['smtp_user']    = 'no-reply@hairdecoded.com';
		$config['smtp_pass']    = 'D&vM3qEB0NQz11';
		$config['charset']    = 'utf-8';
		$config['newline']    = "\r\n";
		$config['mailtype'] = 'html';
		$config['validation'] = TRUE;

		$this->email->initialize($config);

		if( (isset($_POST['to']) && isset($_POST['message'])) && (!empty($_POST['to']) && !empty($_POST['message'])) ) {
			$user = $this->session->get_userdata('user');

			$this->email->from($user['user']['email']);
			$this->email->to($_POST['to']);
			$this->email->subject('Hairdecoded');
			$this->email->message($_POST['message']); 

			$data['UserID'] = $user['user']['id'];
			$data['CreatedBy'] = $user['user']['id'];
			$data['EmailTo'] = $_POST['to'];
			$data['EmailFrom'] = $user['user']['email'];
			$data['Message'] = $_POST['message'];
			if ($this->email->send()) {
				$data['Status'] = 1;
				$response['status'] = "true";
				$response['message'] = "Message sent successfully.";
			}else{
				$data['Status'] = 2;
				$response['status'] = "false";
				$response['message'] = "Something went wrong. Please try again later.";
			}
			$this->common->insertRecord("sshd_appointment_email",$data);
		}else{
			$response['status'] = "false";
			$response['message'] = "From, To and Message all field required.";
		}
		echo json_encode($response);
	}

	public function google_login_calender()
	{
		if(isset($_GET['code'])) {
			try {
				$capi = new GoogleCalendarApi();
				// Get the access token 
				$data = $capi->GetAccessToken(CLIENT_ID, CLIENT_REDIRECT_URL, CLIENT_SECRET, $_GET['code']);
				// Save the access token as a session variable
				// $_SESSION['access_token'] = $data['access_token'];
				// $access_token = $this->session->get_userdata('access_token');
				// if(empty($access_token['access_token'])){
				$this->session->set_userdata('access_token',$data['access_token']);
				// }
				redirect(base_url('appointment'));
				
			}
			catch(Exception $e) {
				$response['status'] = 2;
				$response['data'] = $e->getMessage();
				$response['access_token'] = $access_token['access_token'];
			}
		}else{
			$access_token = $this->session->get_userdata('access_token');
			if(empty($access_token['access_token'])){
				$login_url = 'https://accounts.google.com/o/oauth2/auth?scope=' . urlencode('https://www.googleapis.com/auth/calendar') . '&redirect_uri=' . urlencode(CLIENT_REDIRECT_URL) . '&response_type=code&client_id=' . CLIENT_ID . '&access_type=online';
				$this->session->set_userdata('event_date',date("Y-m-d",strtotime($_POST['event_date'])));

				$response['status'] = 3;
				$response['data'] = $login_url;
			}else{
				$access_token = $this->session->get_userdata('access_token');
				try {
					// Get event details
					$capi = new GoogleCalendarApi();
					// Get user calendar timezone
					$user_timezone = $capi->GetUserCalendarTimezone($access_token['access_token']);
					// Create event on primary calendar
					$aa['event_date'] = date("Y-m-d",strtotime($_POST['event_date']));

					$event_id = $capi->CreateCalendarEvent('primary', $_POST['title'], $_POST['all_day'], $aa, $user_timezone, $access_token['access_token']);
					$response['status'] = 1;
					$response['data'] = "Appointments date successfully added in calendar.";
					$response['access_token'] = $access_token['access_token'];
					$response['user_timezone'] = $event_id;
					// echo json_encode([ 'event_id' => $event_id ]);
				}
				catch(Exception $e) {
					$response['status'] = 2;
					$response['data'] = $e->getMessage();
					$response['access_token'] = $access_token['access_token'];
					$response['user_timezone'] = $event_id;
					// echo json_encode(array( 'error' => 1, 'message' => $e->getMessage() ));
				}
			}			
		}
		echo json_encode($response);
	}
	
	public function autoComplete(){
	    $sql = 'update sshd_appointment set Action="Completed" WHERE AppointmentDate < CURDATE()';
	    $this->common_model->query($sql);
	}

}