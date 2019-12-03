<?php

/**
 * Created by PhpStorm.
 * User: mtaneja
 * Company: Karma Solutions LLC / info@karmasolutionz.com 
 * Date: 6/8/16
 * Time: 2:48 PM
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Discover extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['discover'] = $this->common->selectRecord("sshd_gallery", "", array('status' => 1));
        $serviceTotal = $this->common->selectRecord("sshd_gallery","count(GalleryID) as total",array("Status"=>1));
        $data['total'] = $serviceTotal[0]->total;
        $user = $this->session->get_userdata('user');
        if(empty($user['user']['id'])) {
            $data['user'] = "";
        }else{
            $data['user']= $user['user']['id'];
        }
        $menu['discovermenu'] = 'active';
        $this->load->view("common/header", $menu);
        $this->load->view("discover", $data);
        $this->load->view("common/footer", []);
    }

    public function getDiscover() {
        $user = $this->session->get_userdata('user');
        // $user_id = $user['user']['id'];
        $sdata = $this->session->get_userdata('discoverdata');
        if(!empty($sdata['discoverdata'])) {
            foreach ($sdata['discoverdata'] as $key => $value) {
                if($key == 'filter_box') {
                    $aaa1 = $this->db->where('(HairColor like "%'.$value.'%")')->get('sshd_haircolor')->result();
                    $aaa2 = $this->db->where('(HairFor like "%'.$value.'%")')->get('sshd_hairfor')->result();
                    $aaa3 = $this->db->where('(HairLength like "%'.$value.'%")')->get('sshd_hairlength')->result();
                    $aaa4 = $this->db->where('(HairType like "%'.$value.'%")')->get('sshd_hairtype')->result();
                    $aaa5 = $this->db->where('(ServiceName like "%'.$value.'%")')->get('sshd_servicemaster')->result();
                    $aaa6 = $this->db->select("s.*")->from('sshd_gallery as s')->join("sshd_user as sl","s.UserID = sl.id")->where('(s.Title like "%'.$value.'%" or sl.firstName like "%'.$value.'%" or sl.lastName like "%'.$value.'%")')->group_by('s.GalleryID')->get('sshd_servicemaster')->result();
                }
            }
            $this->db->select("s.*")->from('sshd_gallery as s')->join("sshd_user as sl","s.UserID = sl.id");
            foreach ($sdata['discoverdata'] as $key => $value) {
                $q = "";$i = 0;
                if($key == 'filter_box') {
                    if(empty($aaa1) && empty($aaa2) && empty($aaa3) && empty($aaa4) && empty($aaa5) && empty($aaa6)) {
                        $this->db->where('(s.Title like "%'.$value.'%" or sl.firstName like "%'.$value.'%" or sl.lastName like "%'.$value.'%")');
                    }
                    $ii = 0;$q = "";
                    if(!empty($aaa6)) {
                        $ii = 1;
                        $q .= 's.Title like "%'.$value.'%" or sl.firstName like "%'.$value.'%" or sl.lastName like "%'.$value.'%"';
                    }
                    // ------------------- Hair Color --------------
                    $i = 0;
                    if(!empty($aaa1)) {
                        foreach ($aaa1 as $value) {
                            if(!empty($q)) {
                                $q .= " or ";$i = 1;
                            }
                            $q .= "FIND_IN_SET(".$value->HairColorID.",s.HairColorID)";
                        }
                    }
                    // ------------------- Hair For --------------
                    if(!empty($aaa2)) {
                        foreach ($aaa2 as $value) {
                            if(!empty($q)) {
                                $q .= " or ";$i = 1;
                            }
                            $q .= "FIND_IN_SET(".$value->HairForID.",s.HairForID)";
                        }
                    }
                    // ------------------- Hair Length --------------
                    if(!empty($aaa3)) {
                        foreach ($aaa3 as $value) {
                            if(!empty($q)) {
                                $q .= " or ";$i = 1;
                            }
                            $q .= "FIND_IN_SET(".$value->HairLengthID.",s.HairLengthID)";
                        }
                    }
                    // ------------------- Hair Type --------------
                    if(!empty($aaa4)) {
                        foreach ($aaa4 as $value) {
                            if(!empty($q)) {
                                $q .= " or ";$i = 1;
                            }
                            $q .= "FIND_IN_SET(".$value->HairTypeID.",s.HairTypeID)";
                        }
                    }
                    // ------------------- Hair Services --------------
                    if(!empty($aaa5)) {
                        foreach ($aaa5 as $value) {
                            if(!empty($q)) {
                                $q .= " or ";$i = 1;
                            }
                            $q .= "FIND_IN_SET(".$value->ServiceMasterID.",s.ServiceMasterID)";
                        }
                    }
                    if(!empty($q)) {
                        if($i == 0) { 
                            if($ii == 1) {
                                $this->db->where("(".$q.")"); 
                            }else{
                                $this->db->where("".$q." !=",0); 
                            }
                        }else{ 
                            $this->db->where("(".$q.")"); 
                        }
                    }
                }
            }
            $services = $this->db->where("s.Status",1)->group_by("s.GalleryID")->order_by("s.GalleryID","desc")->get()->result();
            $query = $this->db->last_query();
        }else{
            if(isset($_POST['id']) && !empty($_POST['id'])) {
                $services = $this->common->selectRecord("sshd_gallery","",array("GalleryID"=>$_POST['id'],"Status"=>1));
            }else{
                $services = $this->common->selectRecord("sshd_gallery","GalleryID,Image,Title,Description",array("Status"=>1),"GalleryID","desc");
            }
        }
        
        $this->session->set_userdata('data',array());
        $this->session->set_userdata('discoverdata',array());
        $this->session->set_userdata('ssid1',"");
        $this->session->set_userdata('ssid2',"");
        $service = array();
        if(empty($user['user']['id'])) {
            foreach ($services as $value) {
                $value->ldl = 0;
                $service[] = $value;
            }
        }else{
            foreach ($services as $value) {
                $check = $this->common->selectRecord('sshd_favourite',"",array("GalleryID"=>$value->GalleryID,'UserID'=>$user['user']['id']));
                if(empty($check))
                    $value->ldl = 0;
                else
                    $value->ldl = $check[0]->Status;

                $service[] = $value;
            }
        }
        
        if($service) {
            $serviceTotal = $this->common->selectRecord("sshd_gallery","count(GalleryID) as total",array("Status"=>1));
            $response['total'] = $serviceTotal[0]->total;
            $response['data'] = $service;
            $response['status'] = "true";
            $response['message'] = "Discover found successfully.";
        }else{
            $response['status'] = "false";
            $response['message'] = "No Discover found!";
        }
        echo json_encode($response);
    }

    public function getDetail() {
        // $services = $this->common->selectRecord("sshd_gallery","",array("GalleryID"=>$_POST['id'],"Status"=>1));
        $services = $this->db->select("s.*,u.StylistName,u.EmailID,u.Slug,u.ProfilePic,u.UserID as uid")->from("sshd_gallery as s")->join("sshd_stylist as u",'s.UserID = u.UserID')->where("GalleryID",$_POST['id'])->get()->row();
        if(empty($services)) {
            $services = $this->db->select("s.*,u.firstName,u.lastName,u.email,u.profilePic as ProfilePic,u.id as uid")->from("sshd_gallery as s")->join("sshd_user as u",'s.UserID = u.id')->where("GalleryID",$_POST['id'])->get()->row();
            $services->StylistName = $services->firstName." ".$services->lastName;
        }
        
        if($services) {
            $fav = $fav1 = array();
            $favorite=$this->common->selectRecord("sshd_profilecomment","",array("GalleryID"=>$_POST['id'],'Status'=>1));
            if(!empty($favorite)) {
                foreach ($favorite as $value) {
                    $fav1 = array();
                    $user = $this->common->selectRecord("sshd_stylist","",array("UserID"=>$value->UserID));
                    if(empty($user)) {                        
                        $user = $this->common->selectRecord("sshd_user","",array("id"=>$value->UserID));
                        $fav1['name'] = str_replace(" ", "_", $user[0]->firstName."_".$user[0]->lastName);
                    }else{
                        $fav1['name'] = str_replace(" ", "_", $user[0]->StylistName);
                    }
                    $fav1['message'] = $value->Message;
                    $fav[] = $fav1;
                }
            }
            $response['data'] = $services;
            $response['fav'] = $fav;
            $response['status'] = "true";
            $response['message'] = "Discover found successfully.";
        }else{
            $response['status'] = "false";
            $response['message'] = "No Discover found!";
        }
        echo json_encode($response);
    }

    public function addDiscover() {
        $user = $this->session->get_userdata('user');
        $user_id = $user['user']['id'];
        $data['UserID'] = $user_id;
        $data['CreatedBy'] = $user_id;
        // $data['StylistName'] = $user['user']['firstName'] . " " . $user['user']['lastName'];
        // $data['EmailID'] = $user['user']['email'];
        if ( (isset($_POST['title']) && isset($_POST['photo'])) && (!empty($_POST['title']) && !empty($_POST['photo'])) ) {
            $imgpath = "";
            $data11 = $_POST['photo'];
            $allowed = array('png', 'jpg', 'gif', 'jpeg');

            $image_array_1 = explode(";", $data11);
            $extension = explode("/", $image_array_1[0]);

            $image_array_2 = explode(",", $image_array_1[1]);

            $data11 = base64_decode($image_array_2[1]);
            // $extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
            $imagename = md5("hairdecoded") . time() . rand(10, 100) . "." . $extension[1];
            
            if (!in_array(strtolower($extension[1]), $allowed)) {
                $response['status'] = "false";
                $response['message'] = "Image photo was not supported.";
                echo json_encode($response);
                die;
            } else {
                if (file_put_contents("images/discover/".$imagename, $data11)) {
                    $imgpath = 'images/discover/' . $imagename;
                } else {
                    $response['status'] = "false";
                    $response['message'] = "Failed to upload photo. Please try again later.";
                    echo json_encode($response);
                    die;
                }
            }
            $data['Image'] = $imgpath;
            $data['Title'] = $_POST['title'];
            $data['Description'] = $_POST['description'];
            $data['UserID'] = $user_id;
            $data['CreatedBy'] = $user_id;
            if (isset($_POST['fortype']) && !empty($_POST['fortype'])) {
                $data['HairForID'] = implode(",", $_POST['fortype']);
                // $data['HairForID'] = json_encode($_POST['fortype']);
            }
            if (isset($_POST['hairlength']) && !empty($_POST['hairlength'])) {
                $data['HairLengthID'] = implode(",", $_POST['hairlength']);
                // $data['HairLengthID'] = json_encode($_POST['hairlength']);
            }
            if (isset($_POST['hairtype']) && !empty($_POST['hairtype'])) {
                $data['HairTypeID'] = implode(",", $_POST['hairtype']);
                // $data['HairTypeID'] = json_encode($_POST['hairtype']);
            }
            if (isset($_POST['haircolor']) && !empty($_POST['haircolor'])) {
                $data['HairColorID'] = implode(",", $_POST['haircolor']);
                // $data['HairColorID'] = json_encode($_POST['haircolor']);
            }
            if (isset($_POST['services']) && !empty($_POST['services'])) {
                $data['ServiceMasterID'] = implode(",", $_POST['services']);
                // $data['ServiceMasterID'] = json_encode($_POST['services']);
            }

            if ($this->common->insertRecord('sshd_gallery', $data)) {
                $response['status'] = "true";
                $response['message'] = "Photo upload successfully.";
            } else {
                $response['status'] = "false";
                $response['message'] = "Something went wrong. Please after sometine.";
            }
        } else {
            $response['status'] = "false";
            $response['message'] = "Please fill Images,Title field.";
            $response['da'] = $_POST['photo'];
            $response['daa'] = $_FILES['photo'];
        }
        echo json_encode($response);
    }

    public function likeunlike($GalleryID) {
        $user = $this->session->get_userdata('user');
        $user_id = $user['user']['id'];
        $data['UserID'] = $user_id;
        $data['CreatedBy'] = $user_id;
        $data['ModifiedBy'] = $user_id;
        $check = $this->common->selectRecord('sshd_favourite',"",array('UserID'=>$user_id,'GalleryID'=>$GalleryID));
        if(empty($check)) {
            $data['GalleryID'] = $GalleryID;
            if ($this->common->insertRecord('sshd_favourite',$data)) {
                $response['status'] = "true";
                $response['like'] = 1;
                $response['message'] = "Like successfully.";
            } else {
                $response['status'] = "false";
                $response['message'] = "Something went wrong. Please after sometine.";
            }
        }else{
            $status = 1;
            if($check[0]->Status == 1) {
                $status = 2;
            }
            if ($this->common->updateRecord('sshd_favourite',array("Status"=>$status,"ModifiedDate"=>date("Y-m-d H:i:s")),array('UserID'=>$user_id,'GalleryID'=>$GalleryID))) {
                $response['status'] = "true";
                $response['like'] = $status;
                $response['message'] = "status change successfully.";
            } else {
                $response['status'] = "false";
                $response['message'] = "Something went wrong. Please after sometine.";
            }
        }
        echo json_encode($response);
    }

    public function deletePhoto($GalleryID) {
        // $check = $this->common->selectRecord('sshd_favourite',"",array('UserID'=>$user_id,'GalleryID'=>$GalleryID));
        $gcheck = $this->common->selectRecord("sshd_gallery","",array('GalleryID' => $GalleryID));
        if(!empty($gcheck)) {
            $delete = $gcheck[0]->Image;
        }
        if ($this->common->deleteRecord('sshd_gallery',array('GalleryID'=>$GalleryID))) {
            if(!empty($delete))
                unlink($delete);
            $response['status'] = "true";
            $response['message'] = "Gallery deleted successfully.";
        } else {
            $response['status'] = "false";
            $response['message'] = "Something went wrong. Please after sometine.";
        }
        echo json_encode($response);
    }

    public function addComment() {
        $user = $this->session->get_userdata('user');
        if(isset($_POST['message']) && !empty($_POST['message'])) {
            $user_id = $user['user']['id'];
            $data['UserID'] = $user_id;
            $data['CreatedBy'] = $user_id;
            $data['ModifiedBy'] = $user_id;
            $data['GalleryID'] = $_POST['id'];
            $data['Message'] = $_POST['message'];
            if ($this->common->insertRecord('sshd_profilecomment',$data)) {
                $response['status'] = "true";
                $response['like'] = 1;
                $response['message'] = "Add Comment successfully.";
            } else {
                $response['status'] = "false";
                $response['message'] = "Something went wrong. Please after sometine.";
            }
        }else{
            $response['status'] = "false";
            $response['message'] = "Please add comment.";
        }
        
        echo json_encode($response);
    }


    public function filterRecord()
    {
        $query = "";
        $this->session->set_userdata('discoverdata', array());
        if(isset($_POST['ss']) && $_POST['ss'] != "discover") {
            $this->session->set_userdata('discoverdata', $_POST);
        }elseif(isset($_POST['ssid1'])) {
            $this->session->set_userdata('ssid1', $_POST['ssid1']);
            $this->session->set_userdata('ssid2', $_POST['ssid2']);
        }else{
            if(isset($_POST['filter_box']) && !empty($_POST['filter_box'])) {
                $aaa1 = $this->db->where('(HairColor like "%'.$_POST['filter_box'].'%")')->get('sshd_haircolor')->result();
                $aaa2 = $this->db->where('(HairFor like "%'.$_POST['filter_box'].'%")')->get('sshd_hairfor')->result();
                $aaa3 = $this->db->where('(HairLength like "%'.$_POST['filter_box'].'%")')->get('sshd_hairlength')->result();
                $aaa4 = $this->db->where('(HairType like "%'.$_POST['filter_box'].'%")')->get('sshd_hairtype')->result();
                $aaa5 = $this->db->where('(ServiceName like "%'.$_POST['filter_box'].'%")')->get('sshd_servicemaster')->result();
                $aaa6 = $this->db->select("s.*")->from('sshd_gallery as s')->join("sshd_user as sl","s.UserID = sl.id")->where('(s.Title like "%'.$_POST['filter_box'].'%" or sl.firstName like "%'.$_POST['filter_box'].'%" or sl.lastName like "%'.$_POST['filter_box'].'%")')->group_by('s.GalleryID')->get('sshd_servicemaster')->result();
            }

            $this->db->select("s.*")->from('sshd_gallery as s')->join("sshd_user as sl","s.UserID = sl.id");

            if(isset($_POST['filter_box']) && !empty($_POST['filter_box'])) {
                if(empty($aaa1) && empty($aaa2) && empty($aaa3) && empty($aaa4) && empty($aaa5) && empty($aaa6)) {
                    $this->db->where('(s.Title like "%'.$_POST['filter_box'].'%" or sl.firstName like "%'.$_POST['filter_box'].'%" or sl.lastName like "%'.$_POST['filter_box'].'%")');
                }
                $ii = 0;
                $q = "";
                if(!empty($aaa6)) {
                    $ii = 1;
                    $q .= 's.Title like "%'.$_POST['filter_box'].'%" or sl.firstName like "%'.$_POST['filter_box'].'%" or sl.lastName like "%'.$_POST['filter_box'].'%"';
                }
                // ------------------- Hair Color --------------
                $i = 0;
                if(!empty($aaa1)) {
                    foreach ($aaa1 as $value) {
                        if(!empty($q)) {
                            $q .= " or ";$i = 1;
                        }
                        $q .= "FIND_IN_SET(".$value->HairColorID.",s.HairColorID)";
                    }
                }
                // ------------------- Hair For --------------
                if(!empty($aaa2)) {
                    foreach ($aaa2 as $value) {
                        if(!empty($q)) {
                            $q .= " or ";$i = 1;
                        }
                        $q .= "FIND_IN_SET(".$value->HairForID.",s.HairForID)";
                    }
                }
                // ------------------- Hair Length --------------
                if(!empty($aaa3)) {
                    foreach ($aaa3 as $value) {
                        if(!empty($q)) {
                            $q .= " or ";$i = 1;
                        }
                        $q .= "FIND_IN_SET(".$value->HairLengthID.",s.HairLengthID)";
                    }
                }
                // ------------------- Hair Type --------------
                if(!empty($aaa4)) {
                    foreach ($aaa4 as $value) {
                        if(!empty($q)) {
                            $q .= " or ";$i = 1;
                        }
                        $q .= "FIND_IN_SET(".$value->HairTypeID.",s.HairTypeID)";
                    }
                }
                // ------------------- Hair Services --------------
                if(!empty($aaa5)) {
                    foreach ($aaa5 as $value) {
                        if(!empty($q)) {
                            $q .= " or ";$i = 1;
                        }
                        $q .= "FIND_IN_SET(".$value->ServiceMasterID.",s.ServiceMasterID)";
                    }
                }
                if(!empty($q)) {
                    if($i == 0) { 
                        if($ii == 1) {
                            $this->db->where("(".$q.")"); 
                        }else{
                            $this->db->where("".$q." !=",0); 
                        }
                    }else{ 
                        $this->db->where("(".$q.")"); 
                    }
                }
                // -----------------------------------------
            }

            $services = $this->db->where("s.Status",1)->group_by("s.GalleryID")->get()->result();
            $query = $this->db->last_query();
        }

        $service = array();
        if(empty($user['user']['id'])) {
            foreach ($services as $value) {
                $value->ldl = 0;
                $service[] = $value;
            }
        }else{
            foreach ($services as $value) {
                $check = $this->common->selectRecord('sshd_favourite',"",array("GalleryID"=>$value->GalleryID,'UserID'=>$user['user']['id']));
                if(empty($check))
                    $value->ldl = 0;
                else
                    $value->ldl = $check[0]->Status;

                $service[] = $value;
            }
        }
        
        if($service) {
            $serviceTotal = $this->common->selectRecord("sshd_gallery","count(GalleryID) as total",array("Status"=>1));
            $response['total'] = $serviceTotal[0]->total;
            $response['query'] = $query;
            $response['data'] = $service;
            $response['status'] = "true";
            $response['message'] = "Discover found successfully.";
        }else{
            $response['query'] = $query;
            $response['status'] = "false";
            $response['message'] = "No Discover found!";
        }
        echo json_encode($response);
    }

    public function getUser()
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
            $array[] = array(
                'name' => $value->firstName." ".$value->lastName,
                'url' => 'https://www.hairdecoded.com/profile/'.$value->id,
                'pic' => $value->profilePic,
            );
        }
        // echo $this->db->last_query();
        echo json_encode($array);
    }
}
