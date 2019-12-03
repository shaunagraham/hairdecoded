<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require APPPATH . 'controllers/linkedin-oauth-client-php/http.php';
require APPPATH . 'controllers/linkedin-oauth-client-php/oauth_client.php';

// require APPPATH.'controllers/class.phpmailer.php';
// require APPPATH.'controllers/class.pop3.php';
// require APPPATH.'controllers/class.smtp.php';
// require APPPATH.'controllers/PHPMailerAutoload.php';

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->config->load('linkedin');
        $this->linkedin_data['consumer_key'] = $this->config->item('linkedin_access');
        $this->linkedin_data['consumer_secret'] = $this->config->item('linkedin_secret');
        $this->linkedin_data['callback_url'] = $this->config->item('linkedin_callback_url');
    }

    public function login() {
        $emailAddress = $this->input->post('email');
        $password = $this->input->post('password');
        $where["email"] = $emailAddress;
        $where["password"] = md5($password);
        $getUserData = $this->common_model->get("sshd_user", $where);
        if ($getUserData) {
            $this->session->set_userdata('user', $getUserData[0]);
            $message = "Successfully logged in to your account.";
            $status = true;
        } else {
            $message = "Invalid email address or password.";
            $status = false;
        }
        $response['message'] = $message;
        $response['status'] = $status;
        echo json_encode($response);
    }

    public function signUp() {

        $firstName = $this->input->post('firstname');
        $lastName = $this->input->post('lastname');
        $emailAddress = $this->input->post('email');
        $password = $this->input->post('password');
        $userType = $this->input->post('usertype');

        $where["email"] = $emailAddress;
        $checkExistsUser = $this->common_model->get("sshd_user", $where);
        $response = [];
        if (empty($checkExistsUser)) {
            $userId = $this->uuid->v4();
            $userData["id"] = $userId;
            $userData["firstName"] = $firstName;
            $userData["lastName"] = $lastName;
            $userData["email"] = $emailAddress;
            $userData["password"] = md5($password);
            $userData["usertype"] = $userType;

            $insertRow = $this->common_model->insert("sshd_user", $userData);
            if ($insertRow) {
                $this->syncMailchimp($emailAddress);
                $signupData = $this->common_model->get("sshd_user", ["id" => $userId]);
                $this->session->set_userdata('user', $signupData[0]);
                $message = "Your account has been successfully created.";
                $status = true;
            } else {
                $message = "Internal server error.";
                $status = false;
            }
        } else {
            $message = "Email address is already registered.";
            $status = false;
        }
        $response['message'] = $message;
        $response['status'] = $status;
        echo json_encode($response);
    }

    public function facebookLogin() {
        $fb = new Facebook\Facebook([
            'app_id' => $this->config->item('facebook_app_id'),
            'app_secret' => $this->config->item('facebook_app_secret'),
            'default_graph_version' => $this->config->item('facebook_graph_version'),
        ]);

        # Create the login helper object
        $helper = $fb->getRedirectLoginHelper();

        # Get the access token and catch the exceptions if any
        try {
            $accessToken = $helper->getAccessToken();
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            // echo 'Graph returned an error: ' . $e->getMessage();
            p($e->getMessage());
            exit;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            // echo 'Facebook SDK returned an error: ' . $e->getMessage();
            p($e->getMessage());
            exit;
        }

        $fb->setDefaultAccessToken($accessToken);

        try {
            $response = $fb->get('/me?fields=email,name');
            $userNode = $response->getGraphUser();
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            // echo 'Graph returned an error: ' . $e->getMessage();
            p($e->getMessage());
            exit;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            // echo 'Facebook SDK returned an error: ' . $e->getMessage();
            p($e->getMessage());
            exit;
        }

        $facebookId = trim($userNode->getId());
        $signupData = $this->common_model->get("sshd_user", ["socialId" => $facebookId]);
        if ($signupData) {
            $this->session->set_userdata('user', $signupData[0]);
        } else {

            $userId = $this->uuid->v4();

            $userData["id"] = $userId;
            $userData['registrationType'] = 'facebook';
            $userData['socialId'] = $facebookId;
            $userData['userType'] = " ";
            $name = explode(" ", $userNode->getName());
            if (!empty($name[0]))
                $userData['firstName'] = $name[0];
            if (!empty($name[1]))
                $userData['lastName'] = $name[1];
            $userData['email'] = $userNode->getProperty('email');
            $userData['profilePic'] = 'https://graph.facebook.com/' . $userNode->getId() . '/picture?width=400';
            $insertRow = $this->common_model->insert("sshd_user", $userData);
            if ($insertRow) {
                $this->syncMailchimp($userNode->getProperty('email'));
                $signupData = $this->common_model->get("sshd_user", ["id" => $userId]);
                $this->session->set_userdata('user', $signupData[0]);
            }
        }
        redirect(base_url());

        // echo "Welcome !<br><br>";
        // echo 'Name: ' . $userNode->getName().'<br>';
        // echo 'User ID: ' . $userNode->getId().'<br>';
        // echo 'Email: ' . $userNode->getProperty('email').'<br><br>';
        // $image = 'https://graph.facebook.com/'.$userNode->getId().'/picture?width=200';
        // echo "Picture<br>";
        // echo "<img src='$image' /><br><br>";
    }

    public function googleLogin() {
        if (empty(checkLogin())) {
            if (isset($_GET['code'])) {
                try {
                    $this->google->getAuthenticate();
                    $gpInfo = $this->google->getUserInfo();
                    $googleId = trim($gpInfo['id']);
                    $signupData = $this->common_model->get("sshd_user", ["socialId" => $googleId]);
                    if ($signupData) {
                        $this->session->set_userdata('user', $signupData[0]);
                    } else {

                        $userId = $this->uuid->v4();

                        $userData["id"] = $userId;
                        $userData['registrationType'] = 'google';
                        $userData['socialId'] = $googleId;
                        $userData['userType'] = " ";
                        $userData['firstName'] = $gpInfo['given_name'];
                        $userData['lastName'] = $gpInfo['family_name'];
                        $userData['email'] = $gpInfo['email'];
                        $userData['profilePic'] = !empty($gpInfo['picture']) ? $gpInfo['picture'] : '';
                        $insertRow = $this->common_model->insert("sshd_user", $userData);
                        if ($insertRow) {
                            $this->syncMailchimp($gpInfo['email']);
                            $signupData = $this->common_model->get("sshd_user", ["id" => $userId]);
                            $this->session->set_userdata('user', $signupData[0]);
                        }
                    }
                    redirect(base_url());
                } catch (\Exception $e) {
                    p($e->getMessage());
                    $data = array();
                }
            }
        } else {
            redirect(base_url());
        }
    }

    public function linkedinLogin() {
        if (empty(checkLogin())) {
            
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function syncMailchimp($email) {
        $apiKey = 'd9498068f611ae8d3ba87de1698f9767-us5';
        $listId = '56e2b174a4';

        $memberId = md5(strtolower($email));
        $dataCenter = substr($apiKey, strpos($apiKey, '-') + 1);
        $url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listId . '/members/' . $memberId;

        $name = explode("@", $email);
        $name = preg_replace('/[^A-Za-z0-9\-]/', '', $name[0]);

        $json = json_encode([
            'email_address' => $email,
            'status' => 'subscribed', // "subscribed","unsubscribed","cleaned","pending"
            'merge_fields' => array(
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
    }

    public function reset($id) {
        $data['id'] = $id;
        $this->load->view("common/header");
        $this->load->view("resetpassword", $data);
        $this->load->view("common/footer", []);
    }

    public function forgotpassword() {
        $emailAddress = $this->input->post('email');
        $where["email"] = $emailAddress;
        $getUserData = $this->db->where($where)->get("sshd_user")->row();
        if(!empty($getUserData)){
            if($getUserData->registrationType == 'normal'){
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
                $this->email->from('info@hairdecoded.com');
                $this->email->to($emailAddress);
                $this->email->subject('Reset your password');
                $html = '<html>
                    <body style="padding:40px;background:lightgray;" align="center">
                        <h5>HAIR DECODED</h5>
                        <div style="padding:30px;background:white;" align="center">
                            <h1>Reset your password</h1>
                            <h6>'.$getUserData->firstName.' '.$getUserData->lastName.' -  need to update your password? Click the below button</h6>
                            <br/>
                            <a href="'.base_url().'auth/reset/'.$getUserData->id.'" style="border:2px solid black;padding:5px 10px;background:white;color:black">Reset my password &#9654;</a>
                        </div>
                    </body>
                </html>';
            $this->email->message($html); 
                if ($this->email->send()) {
                    $response['status'] = "true";
                    $response['message'] = "Please check your email to reset your password.";
                }else{
                    $response['status'] = "false";
                    $response['message'] = "Something went wrong. Please try again later.";
                }
            }else{
                $response['status'] = "false";
                $response['message'] = "Social login user are not allowed to reset password"; 
            }
        }else{
            $response['status'] = "false";
            $response['message'] = "Invalid email address."; 
        }
        echo json_encode($response);
    }

    public function resetpass() {
        if ((isset($_POST['id']) && isset($_POST['password'])) && (!empty($_POST['id']) && !empty($_POST['password']))) {
            if ($this->common->updateRecord('sshd_user', array('password' => md5($_POST['password'])), array('id' => $_POST['id']))) {
                $response['status'] = "true";
                $response['message'] = "Password successfully changed.";
            } else {
                $response['status'] = "false";
                $response['message'] = "Something went wrong. Please try again later.";
            }
        } else {
            $response['status'] = "false";
            $response['message'] = "Something went wrong. Please try again later.";
        }
        echo json_encode($response);
    }

    function callbacklinkedin() {

    }

    public function save_usertype(){
        if(isset($_POST['usertype']) && (!empty($_POST['usertype'])) ){
            $user_data = $this->session->userdata('user');
            if ($this->common->updateRecord('sshd_user', array('userType' => $_POST['usertype'] ), array('id' => $user_data['id']))) {
                $response['status'] = "true";
                $response['message'] = "User Type successfully updated. Please login again";
                $this->session->set_userdata('userType', $_POST['usertype']);
            }else{
                $response['status'] = "false";
                $response['message'] = "Something went wrong. Please try again later.";
            }
        }else{
            $response['status'] = "false";
            $response['message'] = "Please select usertype.";
        }
        echo json_encode($response);
    }

}
