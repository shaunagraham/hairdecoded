<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Message extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $loggedinUser = checkLogin();
        if (!empty($loggedinUser)) {

            $conv = $this->db->select("c.*,cd.Message,cd.Image,cd.Unread")->from("sshd_conversation as c")->join("sshd_conversationdetails as cd","c.ConversationID=cd.ConversationID")->where("( c.UserID = '".$loggedinUser['id']."')")->group_by("c.ConversationID")->get()->result();
            $oldm = array();
            foreach ($conv as $value) {
                $oldm[] = $value->SessionUserID;
            }
            if(!empty($oldm)) {
                if($loggedinUser['userType'] != "professional") {
                    $msg = $this->db->select("u.*")->from('sshd_stylist as u')->where_not_in("UserID",$oldm)->group_by("u.StylistID")->get()->result();
                }else{
                    $msg = $this->db->select("u.*")->from('sshd_customer as u')->where_not_in("UserID",$oldm)->group_by("u.CustomerID")->get()->result();
                }
            }else{
                if($loggedinUser['userType'] != "professional") {
                    $msg = $this->db->select("u.*")->from('sshd_stylist as u')->get()->result();
                }else{
                    $msg = $this->db->select("u.*")->from('sshd_customer as u')->get()->result();
                }
            }
            $menu['messagemenu'] = 'active';
            $data['userlist'] = $msg;
            $this->load->view("common/header", $menu);
            $this->load->view("message", $data);
            $this->load->view("common/footer", []);
        } else {
            redirect(base_url());
        }
    }

    public function searchUser()
    {
        $user = $this->session->get_userdata('user');
        $msg = array();
        if(isset($_POST['idd']) && $_POST['idd'] == 1 ) {
            $iv = 0;
            $u = $this->db->where("UserID",$user['user']['id'])->group_by("SessionUserID")->get('sshd_conversation')->result();
            if(empty($u)) {
                $u = $this->db->where("SessionUserID",$user['user']['id'])->group_by("UserID")->get('sshd_conversation')->result();
                if(!empty($u)) { $iv = 1; }
            }
            $uu = array();
            if(!empty($u)) {
                foreach ($u as $value) {
                    if($iv == 0) {
                        $uu[] = $value->SessionUserID;
                    }else{
                        $uu[] = $value->UserID;
                    }
                }
                // if($user['user']['userType'] != "professional") {
                $msg1 = $this->db->select("u.*")->from('sshd_stylist as u')->where_in("UserID",$uu)->group_by("u.StylistID")->get()->result();
                // }else{
                $msg = $this->db->select("u.*")->from('sshd_customer as u')->where_in("UserID",$uu)->group_by("u.CustomerID")->get()->result();
                // }
                if(empty($msg)) {

                }
            }
        }else{
            // if($user['user']['userType'] != "professional") {
            if(isset($_POST['search']) && !empty($_POST['search'])) {
                $msg1 = $this->db->select("u.*")->from('sshd_service as s')->join('sshd_stylist as u','u.UserID = s.UserID')->where("(u.StylistName like '%".$_POST['search']."%')")->group_by("u.StylistID")->get()->result();
            } else {
                $msg1 = $this->db->select("u.*")->from('sshd_service as s')->join('sshd_stylist as u','u.UserID = s.UserID')->group_by("u.StylistID")->get()->result();
            }
            // }else{
            if(isset($_POST['search']) && !empty($_POST['search'])) {
                $msg = $this->db->select("u.*")->from('sshd_customer as u')->where("(u.CustomerName like '%".$_POST['search']."%')")->group_by("u.CustomerID")->get()->result();
            } else {
                $msg = $this->db->select("u.*")->from('sshd_customer as u')->group_by("u.CustomerID")->get()->result();
            }
            // }
        }        
        if(!empty($msg) || !empty($msg1)) {
            $msgs = array();
            if(!empty($msg)) {
                foreach ($msg as $value) {
                    if(!empty($value->CustomerName)) {
                        $value->StylistName = $value->CustomerName;
                    }
                    if(!empty($value->CustomerID)) {
                        $value->StylistID = $value->CustomerID;
                    }
                     $get_user = $this->db->select("userType")->from('sshd_user as u')->where("(u.id = '".$value->UserID."')")->get()->result();
                    if($get_user[0]->userType == "professional") {
                        $value->type = "p-";
                    }else{
                        $value->type = "c-";
                    }
                    $conv = $this->db->select("c.*,cd.Message,cd.Image,cd.Unread")->from("sshd_conversation as c")->join("sshd_conversationdetails as cd","c.ConversationID=cd.ConversationID")->where("((c.UserID = '".$user['user']['id']."' and c.SessionUserID = '".$value->UserID."') or (c.SessionUserID = '".$user['user']['id']."' and c.UserID = '".$value->UserID."'))")->order_by("c.ConversationID",'desc')->limit(1)->get()->row();
                    $unconv = $this->db->select("count(c.ConversationID) as total")->from("sshd_conversation as c")->join("sshd_conversationdetails as cd","c.ConversationID=cd.ConversationID")->where("(c.SessionUserID = '".$user['user']['id']."' and c.UserID = '".$value->UserID."')")->where("cd.Unread",0)->get()->row();
                    if(!empty($conv)) {
                        $conv->CreatedDate = date("d/m/Y h:i A",strtotime($conv->CreatedDate));
                        $conv->Message = substr($conv->Message, 0,30)."...";
                        $value->conv = $conv;
                        $value->count = $unconv->total;
                    }else{
                        $value->count = 0;
                        $value->conv = array();
                    }

                    $msgs[] = $value;
                }
            }
            if(!empty($msg1)) {
                foreach ($msg1 as $value) {
                    if(!empty($value->CustomerName)) {
                        $value->StylistName = $value->CustomerName;
                    }
                    if(!empty($value->CustomerID)) {
                        $value->StylistID = $value->CustomerID;
                    }
                    $get_user = $this->db->select("userType")->from('sshd_user as u')->where("(u.id = '".$value->UserID."')")->get()->result();
                    if($get_user[0]->userType == "professional") {
                        $value->type = "p-";
                    }else{
                        $value->type = "c-";
                    }
                    $conv = $this->db->select("c.*,cd.Message,cd.Image,cd.Unread")->from("sshd_conversation as c")->join("sshd_conversationdetails as cd","c.ConversationID=cd.ConversationID")->where("((c.UserID = '".$user['user']['id']."' and c.SessionUserID = '".$value->UserID."') or (c.SessionUserID = '".$user['user']['id']."' and c.UserID = '".$value->UserID."'))")->order_by("c.ConversationID",'desc')->limit(1)->get()->row();
                    $unconv = $this->db->select("count(c.ConversationID) as total")->from("sshd_conversation as c")->join("sshd_conversationdetails as cd","c.ConversationID=cd.ConversationID")->where("(c.SessionUserID = '".$user['user']['id']."' and c.UserID = '".$value->UserID."')")->where("cd.Unread",0)->get()->row();
                    if(!empty($conv)) {
                        $conv->CreatedDate = date("d/m/Y h:i A",strtotime($conv->CreatedDate));
                        $conv->Message = substr($conv->Message, 0,30)."...";
                        $value->conv = $conv;
                        $value->count = $unconv->total;
                    }else{
                        $value->count = 0;
                        $value->conv = array();
                    }

                    $msgs[] = $value;
                }
            }
            $response['data'] = $msgs;
            $response['status'] = "true";
            $response['message'] = "Message found successfully.";
        }else{
            $response['status'] = "false";
            $response['query'] = $this->db->last_query();
            $response['message'] = "No Service found!";
        }
        echo json_encode($response);
    }

    function get_message() {
        $user = $this->session->get_userdata('user');
        // if($user['user']['userType'] == "professional") {
        if($_POST['type'] == "p-") {
            $msg = $this->db->select("*")->where("StylistID",$_POST['id'])->get('sshd_stylist')->result();
            $uu=$this->db->select("*")->where("UserID",$user['user']['id'])->get('sshd_customer')->result();
        }else{
            $msg = $this->db->select("*")->where("CustomerID",$_POST['id'])->get('sshd_customer')->result();
            $uu=$this->db->select("*")->where("UserID",$user['user']['id'])->get('sshd_stylist')->result();
        }
        $conv = $this->db->select("c.*,cd.Message,cd.Image,cd.Unread")->from("sshd_conversation as c")->join("sshd_conversationdetails as cd","c.ConversationID=cd.ConversationID")->where("((c.UserID = '".$user['user']['id']."' and c.SessionUserID = '".$msg[0]->UserID."') or (c.SessionUserID = '".$user['user']['id']."' and c.UserID = '".$msg[0]->UserID."'))")->get()->result();
        $response['aaa1'] = $this->db->last_query();

        if(empty($msg[0]->StylistName)) {
            $response['scname'] = $msg[0]->CustomerName;
        }else{
            $response['scname'] = $msg[0]->StylistName;
        }
        if(empty($uu[0]->StylistName)) {
            $response['uuname'] = $uu[0]->CustomerName;
        }else{
            $response['uuname'] = $uu[0]->StylistName;
        }
        $response['profilepic'] = $msg[0]->ProfilePic;
        $response['EmailID'] = $msg[0]->EmailID;
        $response['mypic'] = $uu[0]->ProfilePic;
        
        if(!empty($conv)) {
            $msgs = array();
            foreach ($conv as $value) {
                $convun = $this->db->select("c.*,cd.Message,cd.Image,cd.Unread")->from("sshd_conversation as c")->join("sshd_conversationdetails as cd","c.ConversationID=cd.ConversationID")->where("(c.SessionUserID = '".$user['user']['id']."' and c.UserID = '".$msg[0]->UserID."')")->where("cd.Unread",0)->get()->result();
                $response['aaa'] = $this->db->last_query();
                if(!empty($convun)) {
                    foreach ($convun as $val) {
                        $this->db->set("Unread",1)->where("ConversationID",$val->ConversationID)->update("sshd_conversationdetails");
                    }
                }                
                $value->type = "o";
                // if(empty($msg[0]->StylistName)) {
                //     $value->scname = $msg[0]->CustomerName;
                // }else{
                //     $value->scname = $msg[0]->StylistName;
                // }
                // if(empty($uu[0]->StylistName)) {
                //     $value->uuname = $uu[0]->CustomerName;
                // }else{
                //     $value->uuname = $uu[0]->StylistName;
                // }
                // $value->profilepic = $msg[0]->ProfilePic;
                // $value->EmailID = $msg[0]->EmailID;
                // $value->mypic = $uu[0]->ProfilePic;
                if($user['user']['id'] == $value->UserID) {
                    $value->type = "s";
                }
                $value->CreatedDate = date("d/m/Y h:i A",strtotime($value->CreatedDate));

                $msgs[] = $value;
            }

            $response['data'] = $msgs;
            $response['status'] = "true";
            $response['message'] = "Message found successfully.";
        }else{
            $response['status'] = "false";
            $response['message'] = "No Service found!";
        }
        echo json_encode($response);
    }

    function sent_message() {
        $user = $this->session->get_userdata('user');

        if($_POST['usertype'] != "c-") {
            $msg = $this->db->select("*")->where("StylistID",$_POST['id'])->get('sshd_stylist')->result();
        }else{
            $msg = $this->db->select("*")->where("CustomerID",$_POST['id'])->get('sshd_customer')->result();
        }
        if(!empty($_POST)) {
            $data['UserID'] = $user['user']['id'];
            $data['CreatedBy'] = $user['user']['id'];
            $data['SessionUserID'] = $msg[0]->UserID;
            if($this->common->insertRecord("sshd_conversation",$data)) {
                $data = array();
                $data['CreatedBy'] = $user['user']['id'];
                $data['Message'] = $_POST['msg'];
                $data['ConversationID'] = $this->db->insert_id();
                $this->common->insertRecord("sshd_conversationdetails",$data);
                $response['status'] = "true";
                $response['message'] = "Message sent successfully.";
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

    function sent_messagefiles() {
        $user = $this->session->get_userdata('user');
        if($_POST['usertype'] != "c-") {
            $msg = $this->db->select("*")->where("StylistID",$_POST['id'])->get('sshd_stylist')->result();
        }else{
            $msg = $this->db->select("*")->where("CustomerID",$_POST['id'])->get('sshd_customer')->result();
        }
        if(!empty($_FILES)) {
            $data['UserID'] = $user['user']['id'];
            $data['CreatedBy'] = $user['user']['id'];
            $data['SessionUserID'] = $msg[0]->UserID;

            $extension = pathinfo($_FILES['filesm']['name'], PATHINFO_EXTENSION);
            $imagename = md5("hairdecoded").time().rand(10,100).".".$extension;
            if(move_uploaded_file($_FILES['filesm']['tmp_name'], 'images/message/'.$imagename)) {
                $imgpath = 'images/message/'.$imagename;
            }else{
                $response['status'] = "false";
                $response['message'] = "Failed to upload photo. Please try again later.";
                echo json_encode($response);die;
            }

            if($this->common->insertRecord("sshd_conversation",$data)) {
                $data = array();
                $data['CreatedBy'] = $user['user']['id'];
                $data['Message'] = $_FILES['filesm']['name'];
                $data['Image'] = $imgpath;

                // $allowed = array('png', 'jpg', 'gif','jpeg');
                // $extension = pathinfo($_FILES['filesm']['name'], PATHINFO_EXTENSION);
                // $imagename = md5("hairdecoded").time().rand(10,100).".".$extension;

                // if(!in_array(strtolower($extension), $allowed)) {
                //     $response['status'] = "false";
                //     $response['message'] = "Image profilePic was not supported.";
                //     echo json_encode($response);die;
                // }else{

                // }

                $data['ConversationID'] = $this->db->insert_id();
                $this->common->insertRecord("sshd_conversationdetails",$data);
                $response['status'] = "true";
                $response['message'] = "Message sent successfully.";
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

    public function getuser()
    {
        $val = $_POST['query'];
        $val = explode(" ", $val);
        $this->db->where('(firstName like "'.$val[0].'%")');
        if(!empty($val[1])){
            $this->db->where('(lastName like "'.$val[1].'%")');
        }
        $user = $this->db->get('sshd_user')->result();
        $array = array();
        foreach ($user as $value) {
            $array[] = $value->firstName." ".$value->lastName;
        }
        // echo $this->db->last_query();
        echo json_encode($array);
    }

    public function sentmessage() {
        $val = explode(" ", $_POST['to']);
        $this->db->where('(firstName like "'.$val[0].'%")');
        if(!empty($val[1])){
            $this->db->where('(lastName like "'.$val[1].'%")');
        }
        $user = $this->db->get('sshd_user')->row();
        $to = $user->email;
        if(!empty($to)) {
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
                $this->email->to($to);
                $this->email->subject('Hairdecoded');
                $this->email->message($_POST['message']); 

                $data['UserID'] = $user['user']['id'];
                $data['CreatedBy'] = $user['user']['id'];
                $data['EmailTo'] = $to;
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
        }else{
            $response['status'] = "false";
            $response['message'] = "Invalid User...!";
        }
        echo json_encode($response);
    }
    public function sentmessagetoadmin() {
        $to = 'info@hairdecoded.com';
        if(!empty($to)) {
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

            if( (isset($_POST['subject']) && isset($_POST['message'])) && (!empty($_POST['subject']) && !empty($_POST['message'])) ) {
                $user = $this->session->get_userdata('user');

                $this->email->from($user['user']['email']);
                $this->email->to($to);
                $this->email->subject($_POST['subject']);
                $this->email->message($_POST['message']); 

                $data['UserID'] = $user['user']['id'];
                $data['CreatedBy'] = $user['user']['id'];
                $data['EmailTo'] = $to;
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
                $response['message'] = "Subject and Message all field required.";
            }
        }else{
            $response['status'] = "false";
            $response['message'] = "Invalid User...!";
        }
        echo json_encode($response);
    }
}
