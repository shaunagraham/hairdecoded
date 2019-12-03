<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $services = $this->common->selectRecord("sshd_service","ServiceID,ServicePic,Title,Description,Price,HasTag,ServiceMasterID,HairLengthID,HairColorID,HairTypeID,ServiceTime",array("Status"=>1),"ServiceID","desc",5);
        $service = array();
        if(!empty($services)) {
            foreach ($services as $value) {
                $unc = $unc1 = array();
                $data = $this->db->select('ServiceName,ServiceMasterID')->where_in('ServiceMasterID',explode(",",$value->ServiceMasterID))->order_by("rand()")->limit(2)->get('sshd_servicemaster')->result();
                if(!empty($data)) {
                    if(!empty($data[0]->ServiceName)){
                        $unc[] = $data[0]->ServiceName;$unc1[] = "ss-".$data[0]->ServiceMasterID;
                    }
                    if(!empty($data[1]->ServiceName)){
                        $unc[] = $data[1]->ServiceName;$unc1[] = "ss-".$data[1]->ServiceMasterID;
                    }
                }

                $data = $this->db->select('HairLength,HairLengthID')->where_in('HairLengthID',explode(",",$value->HairLengthID))->order_by("rand()")->limit(2)->get('sshd_hairlength')->result();
                if(!empty($data)) {
                    if(!empty($data[0]->HairLength)){
                        $unc[] = $data[0]->HairLength;$unc1[] = "hl-".$data[0]->HairLengthID;
                    }
                    if(!empty($data[1]->HairLength)){
                        $unc[] = $data[1]->HairLength;$unc1[] = "hl-".$data[1]->HairLengthID;
                    }
                }

                $data = $this->db->select('HairColor,HairColorID')->where_in('HairColorID',explode(",",$value->HairColorID))->order_by("rand()")->limit(2)->get('sshd_haircolor')->result();
                if(!empty($data)) {
                    if(!empty($data[0]->HairColor)){
                        $unc[] = $data[0]->HairColor;$unc1[] = "hc-".$data[0]->HairColorID;
                    }
                    if(!empty($data[1]->HairColor)){
                        $unc[] = $data[1]->HairColor;$unc1[] = "hc-".$data[1]->HairColorID;
                    }
                }

                $data = $this->db->select('HairType,HairTypeID')->where_in('HairTypeID',explode(",",$value->HairTypeID))->order_by("rand()")->limit(2)->get('sshd_hairtype')->result();
                if(!empty($data)) {
                    if(!empty($data[0]->HairType)){
                        $unc[] = $data[0]->HairType;$unc1[] = "ht-".$data[0]->HairTypeID;
                    }
                    if(!empty($data[1]->HairType)){
                        $unc[] = $data[1]->HairType;$unc1[] = "ht-".$data[1]->HairTypeID;
                    }
                }
                $value->slugs = $unc;
                $value->slugs1 = $unc1;

                $service[] = $value;
            }
        }
        // echo "<pre>";print_r($service);die;
        $data['service'] = $service;
        $menu['homemenu'] = 'active';
        $this->load->view("common/header", $menu);
        $this->load->view("home", $data);
        $this->load->view("common/footer");
    }

    public function photo()
    {
        

        $data = $_POST["photo"];

        $image_array_1 = explode(";", $data);


        $image_array_2 = explode(",", $image_array_1[1]);


        $data = base64_decode($image_array_2[1]);

        $imageName = time() . '.png';

        file_put_contents("images/".$imageName, $image_array_2[1]);

        echo '<img src="'.$imageName.'" class="img-thumbnail" />';
    }
}
