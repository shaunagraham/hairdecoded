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

class Terms extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
    	$menu['termsmenu'] = 'active';
        $this->load->view("common/header", $menu);
        $this->load->view("terms", []);
        $this->load->view("common/footer", []);
    }

}
