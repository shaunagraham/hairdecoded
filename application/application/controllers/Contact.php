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

class Contact extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
    	$menu['contactmenu'] = 'active';
        $this->load->view("common/header", $menu);
        $this->load->view("contact", []);
        $this->load->view("common/footer", []);
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

        if( (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])) && (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['subject']) && !empty($_POST['message'])) ) {

            $this->email->from($_POST['email']);
            $this->email->to('info@hairdecoded.com',$_POST['name']);
            $this->email->reply_to('info@hairdecoded.com');
            $this->email->subject('HD Inquiry');
            $this->email->message("Subject : ".$_POST['subject']."<br/>Message : ".$_POST['message']); 

            if ($this->email->send()) {
                $data['Status'] = 1;
                $response['status'] = "true";
                $response['message'] = "Message sent successfully.";
            }else{
                $data['Status'] = 2;
                $response['status'] = "false";
                $response['message'] = "Something went wrong. Please try again later.";
            }
        }else{
            $response['status'] = "false";
            $response['message'] = "From, To and Message all field required.";
        }
        echo json_encode($response);
    }


    public function syncMailchimp() {
        if(isset($_POST['email']) && !empty($_POST['email'])) {
            $apiKey = 'd9498068f611ae8d3ba87de1698f9767-us5';
            $listId = '56e2b174a4';

            $memberId = md5(strtolower($_POST['email']));
            $dataCenter = substr($apiKey,strpos($apiKey,'-')+1);
            $url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listId . '/members/' . $memberId;
            $name = explode("@", $_POST['email']);
            $name = preg_replace('/[^A-Za-z0-9\-]/', '', $name[0]);
            $json = json_encode([
                'email_address' => $_POST['email'],
                'status'        => 'subscribed', // "subscribed","unsubscribed","cleaned","pending"
                'merge_fields'  => array(
                    'FNAME' => $name
                    )
                ]);

            $ch = curl_init($url);

            curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json);                                                                                                                 

            $result = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if($httpCode == 200) {
                $response['status'] = "true";
                $response['message'] = "Subscibed successfully.";
            } else {
                $response['status'] = "false";
                $response['message'] = "Something went wrong. Please after sometine.".$result;
            }
        }else{
            $response['status'] = "false";
            $response['message'] = "Please enter email address.";
        }
        echo json_encode($response);
    }


}