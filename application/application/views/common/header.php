<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hair Decoded | Discover Hairstyles, Find Stylists, Track Hair Journeys</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    
    <link rel="icon" type="image/png" href="<?php echo $this->config->item('assets'); ?>img/favi.png">

    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900" rel="stylesheet"> 

    <link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('assets'); ?>css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo $this->config->item('assets'); ?>css/bootstrap-select.css" />
    <link rel="stylesheet" href="<?php echo $this->config->item('assets'); ?>css/style.css" />
    <link rel="stylesheet" href="<?php echo $this->config->item('assets'); ?>css/scrollbar.css" />
    <link rel="stylesheet" href="<?php echo $this->config->item('assets'); ?>css/responsive.css" />
    <link rel="stylesheet" href="<?php echo $this->config->item('assets'); ?>css/croppie.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
    <style type="text/css">
        .nav>li>a { padding-left: 10px;padding-right: 10px; }
        .ajax-loader {
            visibility: hidden;
            background-color: rgba(255,255,255,0.7);
            position: fixed;
            z-index: 9000 !important;
            width: 100%;
            height:100vh;
            top: 0;
        }

        .ajax-loader img {
            position: relative;
            top:50%;
            left:50%;
        }
        .dot-shpe {
            position: absolute;
            background: #a06727;
            border-radius: 50%;
            content: "";
            padding: 0px 5px;
            border: 3px solid #FFF;
            color: white;
            top: 0;
            right: 0;
        }
    </style>
</head>
<body>
    <div class="ajax-loader">
        <img src="<?php echo base_url(); ?>assets/img/ajax-loader.gif" />
    </div>
    <div>
        <!--nav-bar menu-->
        <nav class="navbar navbar-default">
            <div class="container">

                <?php
                $routeName = $this->router->fetch_class();
                $logoUrl = $this->config->item('assets') . (($routeName == "getlisted") ? 'img/logo-white.svg' : 'img/logo.svg');

                $extraClass = ($routeName == "getlisted") ? 'get-listed-nav' : '';
                ?>

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo $logoUrl; ?>" alt=""></a>
                </div>
                <div class="collapse navbar-collapse <?php echo $extraClass; ?>" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="<?php if(!empty($homemenu)) { echo $homemenu; } ?>"><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li class="<?php if(!empty($searchmenu)) { echo $searchmenu; } ?>"><a href="<?php echo base_url('search'); ?>">Search</a></li>
                        <li  class="<?php if(!empty($discovermenu)) { echo $discovermenu; } ?>"><a href="<?php echo base_url('discover'); ?>">Discover</a></li>
                        <?php
                        $currentUserData = $this->session->userdata('user');
                        if ($currentUserData) {
                            ?>
                            <li class="<?php if(!empty($profilemenu)) { echo $profilemenu; } ?>"><a href="<?php echo base_url('myprofile'); ?>">My Profile</a></li>
                            <?php
                            //if($currentUserData['userType'] == 'professional')
                           // {
                            ?>
                            <li class="<?php if(!empty($appointmentmenu)) { echo $appointmentmenu; } ?>"><a href="<?php echo base_url('appointment'); ?>">Appointments</a></li>
                            <?php
                           // }

                            $user = $this->session->get_userdata('user');
                            $msg = array();
                            $iv = 0;
                            $u = $this->db->where("UserID",$user['user']['id'])->group_by("SessionUserID")->get('sshd_conversation')->result();
                            if(empty($u)) {
                                $u = $this->db->where("SessionUserID",$user['user']['id'])->group_by("UserID")->get('sshd_conversation')->result();
                                if(!empty($u)) { $iv = 1; }
                            }
                            $uu = array();
                            if(!empty($u)) {
                                foreach ($u as $value) {
                                    if($iv == 0) {
                                        $uu[] = $value->SessionUserID;
                                    }else{
                                        $uu[] = $value->UserID;
                                    }
                                }
                                if($user['user']['userType'] != "professional") {
                                    $msg = $this->db->select("u.*")->from('sshd_stylist as u')->where_in("UserID",$uu)->group_by("u.StylistID")->get()->result();
                                }else{
                                    $msg = $this->db->select("u.*")->from('sshd_customer as u')->where_in("UserID",$uu)->group_by("u.CustomerID")->get()->result();
                                }
                            }
                            if(!empty($msg)) {
                                $msgs = 0;
                                foreach ($msg as $value) {
                                    $unconv = $this->db->select("count(c.ConversationID) as total")->from("sshd_conversation as c")->join("sshd_conversationdetails as cd","c.ConversationID=cd.ConversationID")->where("(c.SessionUserID = '".$user['user']['id']."' and c.UserID = '".$value->UserID."')")->where("cd.Unread",0)->get()->row();
                                    if(!empty($unconv)) {
                                        $msgs += $unconv->total;
                                    }
                                }
                            }
                            ?>
                            <li class="<?php if(!empty($messagemenu)) { echo $messagemenu; } ?>"><a href="<?php echo base_url('message'); ?>">Messages<?php  if(!empty($msgs)){ ?><div class="dot-shpe"><?=$msgs;?></div><?php } ?></a></li>
                            <li><a href="#" class="nav-white-link clearfix" data-toggle="modal" data-target="#upload-photo"><i class="fa fa-camera" aria-hidden="true"></i> <span class="visible-lg visible-md">UPLOAD PHOTO</span></a></li>
                            <li><a href="<?php echo base_url("auth/logout"); ?>" class="nav-black-link clearfix"><span class="visible-lg visible-md">LOGOUT</span> <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
                            <?php
                        } else {
                            ?>

                            <li><a href="#" data-toggle="modal" data-target="#login-modal">Log in</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#signup-modal">Sign up</a></li>
                            <li class="<?php if(!empty($getlistmenu)) { echo $getlistmenu; } ?>"><a href="<?php echo base_url('get-listed'); ?>"><button>Get Listed</button></a></li>
                            <!-- <li class="<?php if(!empty($searchmenu)) { echo $searchmenu; } ?>"><a href="<?php echo base_url('search'); ?>"><button>Book Now</button></a></li> -->
                            <?php
                        }
                        ?>

                    </ul>
                </div>
            </div>
        </nav>
    </div>



