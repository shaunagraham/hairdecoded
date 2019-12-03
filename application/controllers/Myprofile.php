<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Myprofile extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $loggedinUser = checkLogin();
        if (!empty($loggedinUser)) {
            $data['hair_length'] = $this->common_model->get('sshd_hairlength',array("status"=>1));
            $data['hair_for'] = $this->common_model->get('sshd_hairfor',array("status"=>1));
            $data['hair_type'] = $this->common_model->get('sshd_hairtype',array("status"=>1));
            $data['hair_color'] = $this->common_model->get('sshd_haircolor',array("status"=>1));
            $data['hair_professional'] = $this->common_model->get('sshd_hairprofessional',array("status"=>1));
            $data['hair_servicemaster'] = $this->common_model->get('sshd_servicemaster',array("status"=>1));

            $user = $data['user'] = $this->session->get_userdata('user');
            
            $user_id = $user['user']['id'];
            $data['gallery'] = $this->common->selectRecord("sshd_gallery","",array('status'=>1,"UserID"=>$user_id));

            $data['Favgallery'] = $this->db->select("s.*")->from("sshd_favourite as f")->join("sshd_gallery as s",'f.GalleryID = s.GalleryID')->where("f.UserID",$user_id)->where("f.Status",1)->get()->result();

            $data['stylist'] = $this->common->selectRecord("sshd_stylist","",array('status'=>1,"UserID"=>$user_id));
            $data['stylistavailability'] = $this->common->selectRecord("sshd_stylistavailability","",array('status'=>1,"UserID"=>$user_id));
            $data['times'] = $this->common->selectRecord("sshd_time");

            $menu['profilemenu'] = 'active';
            $this->load->view("common/header", $menu);
            if ($loggedinUser['userType'] == "client") {
                $this->load->view("profile/client", $data);
            } elseif ($loggedinUser['userType'] == "professional") {
                $this->load->view("profile/professional", $data);
            }

            $this->load->view("common/footer", []);
        } else {
            redirect(base_url());
        }
    }

    public function myAvailability()
    {
        $user = $this->session->get_userdata('user');
        $user_id = $user['user']['id'];
        $data['UserID'] = $user_id;
        $data['CreatedBy'] = $user_id;
        $i = 0;
        foreach ($_POST['weekday'] as $value) {
            $data['StartTime'] = $_POST['startSchedule'][$i];
            $data['EndTime'] = $_POST['endSchedule'][$i];
            $data['Days'] = $value;
            $data['IsOpen'] = 'Open';
            if(isset($_POST['closed'.($i + 1)])) {
                $data['IsOpen'] = 'Closed';
            }
            $result = $this->common->selectRecord("sshd_stylistavailability","",array("UserID"=>$user_id,"Days"=>$value));
            if(empty($result)) {

                if($this->common->insertRecord("sshd_stylistavailability",$data)) {
                    $response['status'] = "true";
                    $response['message'] = "Stylist Availability save successfully.";
                }else{
                    $response['status'] = "false";
                    $response['message'] = "Something went wrong. Please try again later.";
                }
            }else{
                if($this->common->updateRecord("sshd_stylistavailability",$data,array("UserID"=>$user_id,"Days"=>$value))) {
                    $response['status'] = "true";
                    $response['message'] = "Stylist Availability save successfully.";
                }else{
                    $response['status'] = "false";
                    $response['message'] = "Something went wrong. Please try again later.";
                }
            }
            $i++;
        }
        echo json_encode($response);
    }

    public function mySpecialties()
    {
        $user = $this->session->get_userdata('user');
        $user_id = $user['user']['id'];
        $data['UserID'] = $user_id;
        $data['CreatedBy'] = $user_id;
        $data['StylistName'] = $user['user']['firstName']. " ". $user['user']['lastName'];
        $data['EmailID'] = $user['user']['email'];
        if( isset($_POST['forprofessional']) && !empty($_POST['forprofessional']) ) {
            $data['HairProfessionalID'] = implode(",", $_POST['forprofessional']);
            // $data['HairProfessionalID'] = json_encode($_POST['forprofessional']);
        }
        if( isset($_POST['hairlength']) && !empty($_POST['hairlength']) ) {
            $data['HairLengthID'] = implode(",", $_POST['hairlength']);
            // $data['HairLengthID'] = json_encode($_POST['hairlength']);
        }
        if( isset($_POST['hairtype']) && !empty($_POST['hairtype']) ) {
            $data['HairTypeID'] = implode(",", $_POST['hairtype']);
            // $data['HairTypeID'] = json_encode($_POST['hairtype']);
        }
        if( isset($_POST['fortype']) && !empty($_POST['fortype']) ) {
            $data['HairForID'] = implode(",", $_POST['fortype']);
            // $data['HairForID'] = json_encode($_POST['fortype']);
        }
        if( isset($_POST['haircolor']) && !empty($_POST['haircolor']) ) {
            $data['HairColorID'] = implode(",", $_POST['haircolor']);
            // $data['HairColorID'] = json_encode($_POST['haircolor']);
        }
        if( isset($_POST['services']) && !empty($_POST['services']) ) {
            $data['ServiceMasterID'] = implode(",", $_POST['services']);
            // $data['ServiceMasterID'] = json_encode($_POST['services']);
        }
        if( isset($_POST['phone']) && !empty($_POST['phone']) ) {
            $data['MobileNo'] = $_POST['phone'];
        }
        if( isset($_POST['description']) && !empty($_POST['description']) ) {
            $data['Description'] = $_POST['description'];
        }
        if( isset($_POST['address']) && !empty($_POST['address']) ) {
            $data['FullAddress'] = $_POST['address'];
        }
        if( isset($_POST['lat']) && !empty($_POST['lat']) ) {
            $data['Latitude'] = $_POST['lat'];
        }
        if( isset($_POST['lang']) && !empty($_POST['lang']) ) {
            $data['Longitude'] = $_POST['lang'];
        }
        if( isset($_POST['Country']) && !empty($_POST['Country']) ) {
            $data['Country'] = $_POST['Country'];
        }
        if( isset($_POST['City']) && !empty($_POST['City']) ) {
            $data['City'] = $_POST['City'];
        }
        if( isset($_POST['instagram']) ) {
            $data['instagram'] = $_POST['instagram'];
        }
        if( isset($_POST['facebook']) ) {
            $data['facebook'] = $_POST['facebook'];
        }
        if( isset($_POST['twitter'])  ) {
            $data['twitter'] = $_POST['twitter'];
        }

        $result = $this->common->selectRecord("sshd_stylist","",array("UserID"=>$user_id));
        if(empty($result)) {
            if( isset($_POST['Slug']) && !empty($_POST['Slug']) ) {
                $ss = $this->db->where("(Slug like '%".$_POST['Slug']."%')")->get("sshd_stylist")->result();
                if(!empty($ss)) {
                    $response['status'] = "false";
                    $response['ss'] = 1;
                    $response['message'] = "Slug already exist.";
                    echo json_encode($response);die;
                }
                $data['Slug'] = $_POST['Slug'];
            }
            if($this->common->insertRecord("sshd_stylist",$data)) {
                $response['status'] = "true";
                $response['message'] = "Stylist save successfully.";
            }else{
                $response['status'] = "false";
                $response['message'] = "Something went wrong. Please try again later.";
            }
        }else{
            if( isset($_POST['Slug']) && !empty($_POST['Slug']) ) {
                $ss = $this->db->where("(Slug like '%".$_POST['Slug']."%' and UserID <> '".$user_id."')")->get("sshd_stylist")->result();
                if(!empty($ss)) {
                    $response['status'] = "false";
                    $response['ss'] = 1;
                    $response['message'] = "Slug already exist.";
                    echo json_encode($response);die;
                }
                $data['Slug'] = $_POST['Slug'];
            }
            if($this->common->updateRecord("sshd_stylist",$data,array("UserID"=>$user_id))) {
                $response['status'] = "true";
                $response['message'] = "Stylist save successfully.";
            }else{
                $response['status'] = "false";
                $response['message'] = "Something went wrong. Please try again later.";
            }
        }
        if( isset($_POST['usertype']) && !empty($_POST['usertype']) ){
            if ($this->common->updateRecord('sshd_user', array('userType' => $_POST['usertype'] ), array('id' => $user_id))) {
                $response['status'] = "true";
                $response['message'] = "Customer Detail save successfully.";
                $_SESSION['user']['userType'] = $_POST['usertype'];
            }else{
                $response['status'] = "false";
                $response['message'] = "Something went wrong. Please try again later.";
            }
        }
        echo json_encode($response);
    }

    public function myProfilePic()
    {
        $user = $this->session->get_userdata('user');
        $user_id = $user['user']['id'];
        $data['UserID'] = $user_id;
        $data['CreatedBy'] = $user_id;
        $data['StylistName'] = $user['user']['firstName']. " ". $user['user']['lastName'];
        $data['EmailID'] = $user['user']['email'];

        if(  isset($_FILES['profilePic']['name']) && !empty($_FILES['profilePic']['name']) ) {
            $imgpath = "";
            $allowed = array('png', 'jpg', 'gif','jpeg');
            $extension = pathinfo($_FILES['profilePic']['name'], PATHINFO_EXTENSION);
            $imagename = md5("hairdecoded").time().rand(10,100).".".$extension;

            if(!in_array(strtolower($extension), $allowed)) {
                $response['status'] = "false";
                $response['message'] = "Image profilePic was not supported.";
                echo json_encode($response);die;
            }else{
                if(move_uploaded_file($_FILES['profilePic']['tmp_name'], 'images/profile/'.$imagename)) {
                    $imgpath = 'images/profile/'.$imagename;
                }else{
                    $response['status'] = "false";
                    $response['message'] = "Failed to upload photo. Please try again later.";
                    echo json_encode($response);die;
                }
            }
            $data['ProfilePic'] = $imgpath;
            $result = $this->common->selectRecord("sshd_stylist","",array("UserID"=>$user_id));
            if(empty($result)) {
                if($this->common->insertRecord("sshd_stylist",$data)) {
                    $response['status'] = "true";
                    $response['image'] = $imgpath;
                    $response['message'] = "Profile upload successfully.";
                }else{
                    $response['status'] = "false";
                    $response['message'] = "Something went wrong. Please try again later.";
                }
            }else{
                if($this->common->updateRecord("sshd_stylist",$data,array("UserID"=>$user_id))) {
                    $response['status'] = "true";
                    $response['image'] = $imgpath;
                    $response['message'] = "Profile upload successfully.";
                }else{
                    $response['status'] = "false";
                    $response['message'] = "Something went wrong. Please try again later.";
                }
            }
        }else{
            $response['status'] = "false";
            $response['message'] = "Please fill Images,Title field.";
        }
        echo json_encode($response);
    }

    public function clientProfilePic()
    {
        $user = $this->session->get_userdata('user');
        $user_id = $user['user']['id'];
        $data['UserID'] = $user_id;
        $data['CreatedBy'] = $user_id;
        $data['CustomerName'] = $user['user']['firstName']. " ". $user['user']['lastName'];
        $data['EmailID'] = $user['user']['email'];

        if(  isset($_FILES['ProfilePic']['name']) && !empty($_FILES['ProfilePic']['name']) ) {
            $imgpath = "";
            $allowed = array('png', 'jpg', 'gif','jpeg');
            $extension = pathinfo($_FILES['ProfilePic']['name'], PATHINFO_EXTENSION);
            $imagename = md5("hairdecoded").time().rand(10,100).".".$extension;

            if(!in_array(strtolower($extension), $allowed)) {
                $response['status'] = "false";
                $response['message'] = "Image ProfilePic was not supported.";
                echo json_encode($response);die;
            }else{
                if(move_uploaded_file($_FILES['ProfilePic']['tmp_name'], 'images/profile/'.$imagename)) {
                    $imgpath = 'images/profile/'.$imagename;
                }else{
                    $response['status'] = "false";
                    $response['message'] = "Failed to upload photo. Please try again later.";
                    echo json_encode($response);die;
                }
            }
            $data['ProfilePic'] = $imgpath;
            $result = $this->common->selectRecord("sshd_customer","",array("UserID"=>$user_id));
            if(empty($result)) {
                if($this->common->insertRecord("sshd_customer",$data)) {
                    $response['status'] = "true";
                    $response['image'] = $imgpath;
                    $response['message'] = "Profile upload successfully.";
                }else{
                    $response['status'] = "false";
                    $response['message'] = "Something went wrong. Please try again later.";
                }
            }else{
                if($this->common->updateRecord("sshd_customer",$data,array("UserID"=>$user_id))) {
                    $response['status'] = "true";
                    $response['image'] = $imgpath;
                    $response['message'] = "Profile upload successfully.";
                }else{
                    $response['status'] = "false";
                    $response['message'] = "Something went wrong. Please try again later.";
                }
            }
        }else{
            $response['status'] = "false";
            $response['message'] = "Please fill Images,Title field.";
        }
        echo json_encode($response);
    }

    public function clientProfile()
    {
        $user = $this->session->get_userdata('user');
        $user_id = $user['user']['id'];
        $data['UserID'] = $user_id;
        $data['CreatedBy'] = $user_id;
        $data['CustomerName'] = $user['user']['firstName']. " ". $user['user']['lastName'];
        $data['EmailID'] = $user['user']['email'];
        
        if( isset($_POST['CustomerName']) && !empty($_POST['CustomerName']) ) {
            $data['CustomerName'] = $_POST['CustomerName'];
        }
        if( isset($_POST['MobileNo']) && !empty($_POST['MobileNo']) ) {
            $data['MobileNo'] = $_POST['MobileNo'];
        }
        if( isset($_POST['Slug']) && !empty($_POST['Slug']) ) {
            $data['Slug'] = $_POST['Slug'];
        }
        if( isset($_POST['Description']) && !empty($_POST['Description']) ) {
            $data['Description'] = $_POST['Description'];
        }
        if( isset($_POST['instagram']) ) {
            $data['instagram'] = $_POST['instagram'];
        }
        if( isset($_POST['facebook']) ) {
            $data['facebook'] = $_POST['facebook'];
        }
        if( isset($_POST['twitter'])  ) {
            $data['twitter'] = $_POST['twitter'];
        }
        $result = $this->common->selectRecord("sshd_customer","",array("UserID"=>$user_id));
        if(empty($result)) {
            if( isset($_POST['Slug']) && !empty($_POST['Slug']) ) {
                $ss=$this->db->where("(Slug like '%".$_POST['Slug']."%')")->get("sshd_customer")->result();
                if(!empty($ss)) {
                    $response['status'] = "false";
                    $response['ss'] = 1;
                    $response['message'] = "Slug already exist.";
                    echo json_encode($response);die;
                }
                $data['Slug'] = $_POST['Slug'];
            }
            if($this->common->insertRecord("sshd_customer",$data)) {
                if( isset($_POST['CustomerName']) && !empty($_POST['CustomerName']) ) {
                    $this->db->set('firstName',$_POST['CustomerName'])->where('id',$user_id)->update('sshd_user');
                }
                $response['status'] = "true";
                $response['message'] = "Customer Detail save successfully.";
            }else{
                $response['status'] = "false";
                $response['message'] = "Something went wrong. Please try again later.";
            }
        }else{
            if( isset($_POST['Slug']) && !empty($_POST['Slug']) ) {
                $ss = $this->db->where("(Slug like '%".$_POST['Slug']."%' and UserID <> '".$user_id."')")->get("sshd_customer")->result();
                if(!empty($ss)) {
                    $response['status'] = "false";
                    $response['ss'] = 1;
                    $response['message'] = "Slug already exist.";
                    echo json_encode($response);die;
                }
                $data['Slug'] = $_POST['Slug'];
            }
            if($this->common->updateRecord("sshd_customer",$data,array("UserID"=>$user_id))) {
                if( isset($_POST['CustomerName']) && !empty($_POST['CustomerName']) ) {
                    $this->db->set('firstName',$_POST['CustomerName'])->where('id',$user_id)->update('sshd_user');
                }
                $response['status'] = "true";
                $response['message'] = "Customer Detail save successfully.";
            }else{
                $response['status'] = "false";
                $response['message'] = "Something went wrong. Please try again later.";
            }
        }
        if( isset($_POST['usertype']) && !empty($_POST['usertype']) ){
            if ($this->common->updateRecord('sshd_user', array('userType' => $_POST['usertype'] ), array('id' => $user_id))) {
                $response['status'] = "true";
                $response['message'] = "Customer Detail save successfully.";
                $_SESSION['user']['userType'] = $_POST['usertype'];
            }else{
                $response['status'] = "false";
                $response['message'] = "Something went wrong. Please try again later.";
            }
        }
        echo json_encode($response);
    }

    function get_professional() {
        $user = $this->session->get_userdata('user');
        $user_id = $user['user']['id'];
        $data['UserID'] = $user_id;
        $data['CreatedBy'] = $user_id;
        $data['CustomerName'] = $user['user']['firstName']. " ". $user['user']['lastName'];
        $data['EmailID'] = $user['user']['email'];
        $result = $this->common->selectRecord("sshd_stylist","",array("UserID"=>$user_id));
        if(empty($result)) {
            $result = $this->common->selectRecord("sshd_user","",array("id"=>$user_id));
            if(empty($result)) {
                $data['MobileNo'] =  "";
                $data['Slug'] =  "";
                $data['Description'] = "";
                $data['ProfilePic'] = "";
                $data['FullAddress'] =  "";
                $data['Country'] =  "";
                $data['City'] =  "";
                $data['instagram'] =  "";
                $data['facebook'] =  "";
                $data['twitter'] =  "";
                $response['data'] = $data;
                $response['status'] = "true";
                $response['message'] = "Customer Detail found successfully.";
            }else{
                $data['CustomerName'] = $result[0]->firstName." ".$result[0]->lastName;
                $data['MobileNo'] =  $result[0]->mobileNo;
                $data['Slug'] =  "";
                $data['Description'] =  "";
                $data['EmailID'] =  $result[0]->email;
                $data['ProfilePic'] =  $result[0]->profilePic;
                $data['FullAddress'] =  "";
                $data['Country'] =  "";
                $data['City'] =  "";
                $data['instagram'] =  "";
                $data['facebook'] =  "";
                $data['twitter'] =  "";
                $response['data'] = $data;
                $response['status'] = "true";
                $response['message'] = "Customer Detail found successfully.";
            }
        }else{
            $data['StylistName'] = $result[0]->StylistName;
            $data['MobileNo'] =  $result[0]->MobileNo;
            $data['Slug'] =  $result[0]->Slug;
            $data['Description'] =  $result[0]->Description;
            $data['FullAddress'] =  $result[0]->FullAddress;
            $data['Country'] =  $result[0]->Country;
            $data['City'] =  $result[0]->City;
            $data['EmailID'] =  $result[0]->EmailID;
            $data['ProfilePic'] =  $result[0]->ProfilePic;
            $data['instagram'] =  $result[0]->instagram;
            $data['facebook'] =  $result[0]->facebook;
            $data['twitter'] =  $result[0]->twitter;
            $response['data'] = $data;
            $response['status'] = "true";
            $response['message'] = "Customer Detail found successfully.";
        }
        echo json_encode($response);
    }

    function get_customer() {
        $user = $this->session->get_userdata('user');
        $user_id = $user['user']['id'];
        $data['UserID'] = $user_id;
        $data['CreatedBy'] = $user_id;
        $data['CustomerName'] = $user['user']['firstName']. " ". $user['user']['lastName'];
        $data['EmailID'] = $user['user']['email'];
        $result = $this->common->selectRecord("sshd_customer","",array("UserID"=>$user_id));
        if(empty($result)) {
            $result = $this->common->selectRecord("sshd_user","",array("id"=>$user_id));
            if(empty($result)) {
                $data['MobileNo'] =  "";
                $data['Slug'] =  "";
                $data['Description'] = "";
                $data['ProfilePic'] = "";
                $data['userType'] = $user['user']['userType'];
                $data['instagram'] =  "";
                $data['facebook'] =  "";
                $data['twitter'] =  "";
                $response['data'] = $data;
                $response['status'] = "true";
                $response['message'] = "Customer Detail found successfully.";
            }else{
                $data['CustomerName'] = $result[0]->firstName." ".$result[0]->lastName;
                $data['MobileNo'] =  $result[0]->mobileNo;
                $data['Slug'] =  "";
                $data['Description'] =  "";
                $data['EmailID'] =  $result[0]->email;
                $data['ProfilePic'] =  $result[0]->profilePic;
                $data['userType'] = $result[0]->userType;
                $data['instagram'] =  "";
                $data['facebook'] =  "";
                $data['twitter'] =  "";
                $response['data'] = $data;
                $response['status'] = "true";
                $response['message'] = "Customer Detail found successfully.";
            }
        }else{
            $usr = $this->db->select('userType')->where("id",$user_id)->get("sshd_user")->row();
            $data['CustomerName'] = $result[0]->CustomerName;
            $data['MobileNo'] =  $result[0]->MobileNo;
            $data['Slug'] =  $result[0]->Slug;
            $data['Description'] =  $result[0]->Description;
            $data['EmailID'] =  $result[0]->EmailID;
            $data['ProfilePic'] =  $result[0]->ProfilePic;
            $data['userType'] = $usr->userType;
            $data['instagram'] =  $result[0]->instagram;
            $data['facebook'] =  $result[0]->facebook;
            $data['twitter'] =  $result[0]->twitter;
            $response['data'] = $data;
            $response['status'] = "true";
            $response['message'] = "Customer Detail found successfully.";
        }
        echo json_encode($response);
    }

    public function getFavorite() {
        $user = $this->session->get_userdata('user');
        // $user_id = $user['user']['id'];
        
        $services = $this->common->selectRecord("sshd_gallery","GalleryID,Image,Title,Description",array("Status"=>1,"UserID"=>$user['user']['id']),"GalleryID","desc");        
        if($services) {
            $serviceTotal = $this->common->selectRecord("sshd_gallery","count(GalleryID) as total",array("Status"=>1));
            $response['total'] = $serviceTotal[0]->total;
            $response['data'] = $services;
            $response['status'] = "true";
            $response['message'] = "Discover found successfully.";
        }else{
            $response['status'] = "false";
            $response['message'] = "No Discover found!";
        }
        echo json_encode($response);
    }
}
