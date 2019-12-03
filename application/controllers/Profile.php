<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($id) {
        $data['hair_length'] = $this->common_model->get('sshd_hairlength',array("status"=>1));
        $data['hair_for'] = $this->common_model->get('sshd_hairfor',array("status"=>1));
        $data['hair_type'] = $this->common_model->get('sshd_hairtype',array("status"=>1));
        $data['hair_color'] = $this->common_model->get('sshd_haircolor',array("status"=>1));
        $data['hair_professional'] = $this->common_model->get('sshd_hairprofessional',array("status"=>1));
        $data['hair_servicemaster'] = $this->common_model->get('sshd_servicemaster',array("status"=>1));

        $user_id = $id;

        $data['stylist'] = $this->common->selectRecord("sshd_stylist","",array('status'=>1,"UserID"=>$user_id));
        if(empty($data['stylist'])) {
            $data['stylist'] = $this->common->selectRecord("sshd_stylist","",array('status'=>1,"Slug"=>str_replace("-", " ", $user_id)));
            if(empty($data['stylist'])) {
                $data['customer'] = $this->common->selectRecord("sshd_customer","",array('status'=>1,"Slug"=>str_replace("-", " ", $user_id)));
                if(!empty($data['customer'])) {
                    $user_id = $data['customer'][0]->UserID;
                }
            }else{
                $user_id = $data['stylist'][0]->UserID;
            }
        }

        $data['gallery'] = $this->common->selectRecord("sshd_gallery","",array('status'=>1,"UserID"=>$user_id));
        if(empty($data['stylist'])) {
            $result = $this->common->selectRecord("sshd_user","",array("id"=>$user_id));
            $data['stylist'][0]->StylistName = $result[0]->firstName." ".$result[0]->lastName;
            $data['stylist'][0]->EmailID = $result[0]->email;
            $data['stylist'][0]->MobileNo = $result[0]->mobileNo;
            $data['stylist'][0]->Description = "";
        }
        $user = $this->common->selectRecord("sshd_user","",array("id"=>$user_id));
        $data['userid'] = $id;
        $data['stylistavailability'] = $this->common->selectRecord("sshd_stylistavailability","",array('status'=>1,"UserID"=>$user_id));
        $data['times'] = $this->common->selectRecord("sshd_time");

        $menu['profilemenu'] = 'active';
        $data['usscheck'] = 1;
        $this->load->view("common/header", $menu);
        if($user[0]->userType == "client"){
            $this->load->view("profile/clients", $data);
        } elseif ($user[0]->userType == "professional") {
            $this->load->view("profile/professionals", $data);
        }

        $this->load->view("common/footer", []);
    }

    function get_customer($id) {
        $user = $this->session->get_userdata('user');
        $user_id = $id;
        $slug = str_replace("-", " ", $id);
        $data['UserID'] = $user_id;
        $result = $this->common->selectRecord("sshd_customer","","(UserID = '".$user_id."' or Slug = '".$slug."')");
        if(empty($result)) {
            $result = $this->common->selectRecord("sshd_stylist","","(UserID = '".$user_id."' or Slug = '".$slug."')");
            if(empty($result)) {
                $result = $this->common->selectRecord("sshd_user","",array("id"=>$user_id));
                if(empty($result)) {
                    $data['MobileNo'] =  "";
                    $data['Slug'] =  "";
                    $data['Description'] = "";
                    $data['ProfilePic'] = "";
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
                    $response['data'] = $data;
                    $response['status'] = "true";
                    $response['message'] = "Customer Detail found successfully.";
                }
            }else{
                $data['CustomerName'] = $result[0]->StylistName;
                $data['MobileNo'] =  $result[0]->MobileNo;
                $data['Slug'] =  $result[0]->Slug;
                $data['Description'] =  $result[0]->Description;
                $data['EmailID'] =  $result[0]->EmailID;
                $data['ProfilePic'] =  $result[0]->ProfilePic;
                $response['data'] = $data;
                $response['status'] = "true";
                $response['message'] = "Customer Detail found successfully.";
            }
        }else{
            $data['CustomerName'] = $result[0]->CustomerName;
            $data['MobileNo'] =  $result[0]->MobileNo;
            $data['Slug'] =  $result[0]->Slug;
            $data['Description'] =  $result[0]->Description;
            $data['EmailID'] =  $result[0]->EmailID;
            $data['ProfilePic'] =  $result[0]->ProfilePic;
            $response['data'] = $data;
            $response['status'] = "true";
            $response['message'] = "Customer Detail found successfully.";
        }
        echo json_encode($response);
    }

    public function getServices($page = 0)
    {
        $user = $this->session->get_userdata('user');
        if(isset($_POST['uid']) && !empty($_POST['uid'])) {
            $uu = $this->common->selectRecord("sshd_customer","","(Status = 1 and (UserID = '".$_POST['uid']."' or Slug = '".str_replace("-", " ", $_POST['uid'])."'))");
            if(!empty($uu)) {
                $user_id = $uu[0]->UserID;
            }else{
                $uu = $this->common->selectRecord("sshd_stylist","","(Status = 1 and (UserID = '".$_POST['uid']."' or Slug = '".str_replace("-", " ", $_POST['uid'])."'))");
                if(!empty($uu)) {
                    $user_id = $uu[0]->UserID;
                }else{
                    $user_id = $_POST['uid'];
                }
            }
        }else{
            $user_id = $user['user']['id'];
        }
        if(isset($_POST['id']) && !empty($_POST['id'])) {
            $service = $this->common->selectRecord("sshd_service","",array("UserID"=>$user_id,"ServiceID"=>$_POST['id'],"Status"=>1));
        }else{
            if($page == 0) {
                $service = $this->common->selectRecord("sshd_service","ServiceID,ServicePic,Title,Description,Price,HasTag",array("UserID"=>$user_id,"Status"=>1),"ServiceID","desc");
            }else{
                $service = $this->common->selectRecord("sshd_service","ServiceID,ServicePic,Title,Description,Price,HasTag",array("UserID"=>$user_id,"Status"=>1),"ServiceID","desc",4,($page * 4));
            }
        }
        
        if($service) {
            $serviceTotal = $this->common->selectRecord("sshd_service","count(ServiceID) as total",array("UserID"=>$user_id,"Status"=>1));
            $response['total'] = $serviceTotal[0]->total;
            $response['data'] = $service;
            $response['status'] = "true";
            $response['message'] = "Service found successfully.";
        }else{
            $response['status'] = "false";
            $response['message'] = "No Service found!";
        }
        echo json_encode($response);
    }

}
