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

class Privacy extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
    	$menu['privacymenu'] = 'active';
        $this->load->view("common/header", $menu);
        $this->load->view("privacy", []);
        $this->load->view("common/footer", []);
    }

}
