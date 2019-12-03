<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
  | -------------------------------------------------------------------
  |  Google API Configuration
  | -------------------------------------------------------------------
  |  client_id         string   Your Google API Client ID.
  |  client_secret     string   Your Google API Client secret.
  |  redirect_uri      string   URL to redirect back to after login.
  |  application_name  string   Your Google application name.
  |  api_key           string   Developer key.
  |  scopes            string   Specify scopes
 */
$config['google']['client_id'] = "624047806472-3o9dr5oiu49d3656jgnivanaq2pp8div.apps.googleusercontent.com";
$config['google']['client_secret'] = "YpmjUMawC2bTeO-9yzFEu-Vq";
// $config['google']['client_id'] = "971999649902-nl5t0mfl2b5g5hhmi7s1e7g2r61iinmm.apps.googleusercontent.com";
// $config['google']['client_secret'] = "TVZlhZOPnx8F-qckfYSxN4qf";
$config['google']['redirect_uri'] = base_url('auth/googleLogin');
$config['google']['application_name'] = 'Hairdecoded';
$config['google']['api_key'] = 'AIzaSyC0Rfg7wxHOj5laZFKNcNWUwf_y3i7fAmM';
$config['google']['scopes'] = array();
