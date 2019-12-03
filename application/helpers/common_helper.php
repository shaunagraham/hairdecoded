<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function p($value) {
    echo "<pre>";
    print_r($value);
    echo "</pre>";
}

function checkLogin() {
    $CI = get_instance();
    return $CI->session->userdata('user');
}
