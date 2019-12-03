<?php
$loggedinUser = checkLogin();
$hair_length = $this->common_model->get('sshd_hairlength', array("status" => 1));
$hair_for = $this->common_model->get('sshd_hairfor', array("status" => 1));
$hair_type = $this->common_model->get('sshd_hairtype', array("status" => 1));
$hair_color = $this->common_model->get('sshd_haircolor', array("status" => 1));
$hair_professional = $this->common_model->get('sshd_hairprofessional', array("status" => 1));
$hair_servicemaster = $this->common_model->get('sshd_servicemaster', array("status" => 1));
if (empty($loggedinUser)) {
    ?>

    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="login-modalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body nopadding">
                    <div class="modal-wrap">
                        <div class="close-btn"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
                        <h2>Login</h2>
                        <form method="post" name="login_form" class="login_form">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control inputfield" id="email" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control inputfield" id="password" placeholder="Password" required>
                            </div>
                            <div class="loginres">
                                <div>

                                </div>
                            </div>
                            <div class="login-btns clearfix">
                                <input type="submit" class="blk-btn pull-left" value="LOGIN">
                                <a href="#"  data-toggle="modal" data-target="#forgot-passowrd" data-dismiss="modal" aria-label="Close" class="forgot-pass-link pull-right">Forgot Password?</a>                                   

                            </div>
                            <div class="text-center">or connect with</div>
                            <div class="social-links text-center">
                                <a href="<?php echo $this->facebook->login_url(); ?>"><img src="<?php echo $this->config->item('assets'); ?>img/fb-icon.jpg" alt="facebook"></a> 
                                <a href="<?php echo $this->google->loginURL(); ?>"><img src="<?php echo $this->config->item('assets'); ?>img/googleplus-icon.jpg" alt="google plus"></a> 
                                <a href="<?php echo base_url('auth/callbacklinkedin'); ?>?oauth_init=1"><img src="<?php echo $this->config->item('assets'); ?>img/linkedin-icon.jpg" alt="Linkedin"></a>
                                <!-- <a href="https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id=81wrsweliq76iz&redirect_uri=<?php echo urlencode(base_url() . 'auth/callbacklinkedin'); ?>&state=987654321&scope=r_basicprofile,r_emailaddress"><img src="<?php echo $this->config->item('assets'); ?>img/linkedin-icon.jpg" alt="Linkedin"></a> -->
                            </div>
                            <a href="#" data-toggle="modal" data-target="#signup-modal" data-dismiss="modal" aria-label="Close" class="create-account">Create an account</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="forgot-passowrd" tabindex="-1" role="dialog" aria-labelledby="forgot-passowrdLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body nopadding">
                    <div class="modal-wrap">
                        <div class="close-btn"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
                        <h2>Forgot Password</h2>
                        <p>Submit your email address and we'll send you a link to reset your password.</p>
                        <form id="resetpassword">
                            <div class="form-group">
                                <input type="email" class="form-control inputfield" id="forgotPassword" placeholder="Enter Email Address" required name="email">
                            </div>
                            <div class="loginres">
                                <div>

                                </div>
                            </div>
                            <div class="login-btns clearfix">
                                <input type="submit" class="blk-btn pull-left" value="Reset Password">

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="signup-modal" tabindex="-1" role="dialog" aria-labelledby="login-modalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body nopadding">
                    <div class="modal-wrap">
                        <div class="close-btn"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
                        <h2>Sign up</h2>
                        <form method="post" name="signup_form" class="signup_form" action="<?php echo base_url("auth/signup"); ?>">
                            <div class="form-group">
                                <input type="text" name="firstname" class="form-control inputfield" required id="fName" placeholder="First Name" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="lastname" class="form-control inputfield" required id="lName" placeholder="Last Name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control inputfield" required id="emailAddress" placeholder="Email Address" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control inputfield" required id="signup-pass" placeholder="Create Password" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="cpassword" class="form-control inputfield" required id="signup-cpass" placeholder="Confirm Password" required>
                            </div>
                            <div class="form-group">
                                <select name="usertype" required class="form-control selectpicker">
                                    <option selected value="professional">Professional</option>
                                    <option value="client">Client</option>
                                </select>
                            </div>
                            <div class="signupres">
                                <div>

                                </div>
                            </div>
                            <div class="login-btns clearfix">
                                <input type="submit" class="blk-btn pull-left" value="Sign Up">
                            </div>
                            <div class="text-center">or connect with</div>
                            <div class="social-links text-center">
                                <a href="<?php echo $this->facebook->login_url(); ?>"><img src="<?php echo $this->config->item('assets'); ?>img/fb-icon.jpg" alt="facebook"></a> 
                                <a href="<?php echo $this->google->loginURL(); ?>"><img src="<?php echo $this->config->item('assets'); ?>img/googleplus-icon.jpg" alt="google plus"></a> 
                                <a href="<?php echo base_url('auth/callbacklinkedin'); ?>?oauth_init=1"><img src="<?php echo $this->config->item('assets'); ?>img/linkedin-icon.jpg" alt="Linkedin"></a>
                            </div>
                            <a href="#" data-toggle="modal" data-dismiss="modal" aria-label="Close" data-target="#login-modal" class="create-account">Already have an account!</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} else {
    ?>
    <div class="modal fade usertype-details" id="enter-usertype" tdata-keyboard="false" data-backdrop="static" role="dialog" aria-labelledby="usertypeLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Enter Your Details</h5>
                </div>
                <div class="modal-body">
                   <span>Select your User Type</span>
                   <select name="usertype" id="social_usertype" required="" class="form-control selectpicker" tabindex="-98">
                        <option selected="" value="professional">Professional</option>
                        <option value="client">Client</option>
                    </select>
                    <div class="dropdown-menu open" role="combobox" style="max-height: 254px; overflow: hidden; min-height: 0px;">
                        <div class="inner open" role="listbox" aria-expanded="true" tabindex="-1" style="max-height: 242px; overflow-y: auto; min-height: 0px;">
                            <ul class="dropdown-menu inner ">
                                <li class="">
                                    <a role="option" aria-disabled="false" tabindex="0" class="" aria-selected="false"><span class="glyphicon glyphicon-ok check-mark"></span><span class="text">Professional</span></a>
                                </li>
                                <li class="selected active">
                                    <a role="option" aria-disabled="false" tabindex="0" aria-selected="true" class="selected active"><span class="glyphicon glyphicon-ok check-mark"></span><span class="text">Client</span></a>
                                </li>
                            </ul>
                        </div>
                    </div> 
                    <div class="loginres">
                        <div>

                        </div>
                    </div>                  
                </div>
                <div class="modal-footer">
                    <button type="button" id="social_user_type" class="btn btn-primary">Save changes</button>
                  </div>

            </div>
        </div>
    </div>

    <div class="modal fade upload-photo" id="upload-photo" tabindex="-1" role="dialog" aria-labelledby="uploadPhotoLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <h2 class="btmline">Upload Photo</h2>
                    <div class="close-btn"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
                    <form id="upload-photo-form">
                        <div class="row">
                            <div class="col-md-4">
                                <input type="file" name="photos" id="photo1" style="display:none;">
                                <input type="hidden" name="photo" id="photo1s">
                                <div class="img-upload" onclick="$('#photo1').click();$('#photo1').val('');" style="cursor:pointer;">
                                    <div id="drop-area">
                                        <h3 class="drop-text">Click Here Upload Images</h3>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control inputfield-3" id="phototitle" placeholder="Title" name="title" required>
                                </div>
                                <div>
                                    <textarea cols="" rows="" class="inputfield-3 textarea-img-upload" placeholder="Description" name="description"></textarea>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-3 col-sm-3 col-xs-6">
                                        <div class="list-lable">FOR</div>
                                        <?php
                                        foreach ($hair_for as $valfor) {
                                            ?>
                                            <label class="pop-up-lables"><?php echo $valfor['HairFor']; ?>
                                                <input type="checkbox" name="fortype[]" value="<?php echo $valfor['HairForID']; ?>">
                                                <span class="checkmark-checkbox"></span>
                                            </label>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-6">
                                        <div class="list-lable">Hair Length</div>
                                        <!-- <div class="list-lable" style="font-size: 13.94px;">My Hair Length</div> -->
                                        <?php
                                        foreach ($hair_length as $vallength) {
                                            ?>
                                            <label class="pop-up-lables"><?php echo $vallength['HairLength']; ?>
                                                <input type="checkbox" name="hairlength[]"  value="<?php echo $vallength['HairLengthID']; ?>">
                                                <span class="checkmark-checkbox"></span>
                                            </label>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-6">
                                        <div class="list-lable">Hair Type</div>
                                        <?php
                                        foreach ($hair_type as $valtype) {
                                            ?>
                                            <label class="pop-up-lables"><?php echo $valtype['HairType']; ?>
                                                <input type="checkbox" name="hairtype[]" value="<?php echo $valtype['HairTypeID']; ?>">
                                                <span class="checkmark-checkbox"></span>
                                            </label>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-6">
                                        <div class="list-lable">Color</div>
                                        <?php
                                        foreach ($hair_color as $valcolor) {
                                            ?>
                                            <label class="pop-up-lables">
                                                <?php
                                                if (!empty($valcolor['Description'])) {
                                                    ?>
                                                    <div><font style="background:<?php echo $valcolor['Description']; ?>;height:25px;width:25px;border-radius:50%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></div>
                                                    <?php
                                                } else {
                                                    if ($valcolor['HairColor'] == "Other") {
                                                        echo '<div style="padding-top:4px;"><div style="border-radius: 50px;border-style: solid;border-width: 9px;border-bottom-color: red;border-left-color: green;border-right-color: blue;border-top-color: yellow;height: 6px;width: 0px;-webkit-transform: rotate(45deg);-moz-transform: rotate(45deg);-ms-transform: rotate(45deg);-o-transform: rotate(45deg);transform: rotate(45deg);"></div></div>';
                                                    } else {
                                                        echo $valcolor['HairColor'];
                                                    }
                                                }
                                                ?>
                                                <input type="checkbox" name="haircolor[]" value="<?php echo $valcolor['HairColorID']; ?>">
                                                <span class="checkmark-checkbox"></span>
                                            </label>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="list-lable pad-top-15">Services</div>
                                    </div>
                                    <?php
                                    foreach ($hair_servicemaster as $valservice) {
                                        ?>
                                        <div class="col-md-3 col-sm-3 col-xs-6">
                                            <div class="color-height">
                                                <label class="pop-up-lables"><?php echo $valservice['ServiceName']; ?>
                                                    <input type="checkbox" name="services[]" value="<?php echo $valservice['ServiceMasterID']; ?>">
                                                    <span class="checkmark-checkbox"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <div class="col-md-12 pad-top-15">
                                        <input type="submit" class="blk-btn" value="Upload"> <a href="#" class="reset">Reset</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <?php
    $user_data = $this->session->userdata('user');
    $usr = $this->db->select('userType')->where("id",$user_data['id'])->get("sshd_user")->row();
    if(empty($usr->userType) ){
    	$this->session->set_userdata('userType', ' ');
        ?>
        <script>
            $(window).on('load',function(){
                $('#enter-usertype').modal('show');
            });
            $(document).ready(function () {
                $('#social_user_type').click(function(){
                    var usertype = $('#social_usertype').val();
                    $.ajax({
		                type: "POST",
		                url: '<?php echo base_url("auth/save_usertype"); ?>',
		                data: {"usertype": usertype},
		                dataType: "json",
		                success: function (response) {
		                    if (response.status == 'true') {
		                        $(".loginres div").attr("class", "alert alert-success");
                        		$(".loginres div").html(response.message);
                        		setTimeout(function(){
								  $('#enter-usertype').modal('hide');
                                  window.location.href = "<?php echo base_url("auth/logout") ?>";
								}, 4000);

		                    } else {
		                       	$(".loginres div").attr("class", "alert alert-danger");
                        		$(".loginres div").html(response.message); 
		                    }
		                }
		            });
                });
            });
        </script>
        <?php
    }
}
?>
<div class="modal fade" id="searchFilter" tabindex="-1" role="dialog" aria-labelledby="searchFilterHome">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="filter_record">
                <div class="modal-body">
                    <h2 class="btmline">Find A Professional</h2>
                    <div class="close-btn" data-toggle="collapse" href="#searchFilter" aria-expanded="false" aria-controls="searchFilterHome"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row pad-btm-sep">
                                <div class="col-md-2 col-sm-4 col-xs-6 modal-lables-height">
                                    <div class="list-lable">Professionals</div>
                                    <?php
                                    foreach ($hair_professional as $valprofessional) {
                                        ?>
                                        <label class="pop-up-lables"><?php
                                            if ($valprofessional['HairProfessional'] == "An Independent Stylist") {
                                                echo "Stylist";
                                            } else {
                                                echo $valprofessional['HairProfessional'];
                                            }
                                            ?>
                                            <input type="checkbox" name="search_forprofessional[]" value="<?php echo $valprofessional['HairProfessionalID']; ?>">
                                            <span class="checkmark-checkbox"></span>
                                        </label>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="col-md-2 col-sm-4 col-xs-6 modal-lables-height">
                                    <div class="list-lable">For</div>
                                    <?php
                                    foreach ($hair_for as $valfor) {
                                        ?>
                                        <label class="pop-up-lables"><?php echo $valfor['HairFor']; ?>
                                            <input type="checkbox" name="search_fortype[]" value="<?php echo $valfor['HairForID']; ?>">
                                            <span class="checkmark-checkbox"></span>
                                        </label>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="col-md-2 col-sm-4 col-xs-6 modal-lables-height">
                                    <div class="list-lable">Pricing</div>
                                    <label class="pop-up-lables">$ ($0-50)
                                        <input type="checkbox" name="search_pricing[]" value="1">
                                        <span class="checkmark-checkbox"></span>
                                    </label>
                                    <label class="pop-up-lables">$$ ($51-200)
                                        <input type="checkbox" name="search_pricing[]" value="2">
                                        <span class="checkmark-checkbox"></span>
                                    </label>
                                    <label class="pop-up-lables">$$$ ($200+) 
                                        <input type="checkbox" name="search_pricing[]" value="3">
                                        <span class="checkmark-checkbox"></span>
                                    </label>
                                </div>

                                <div class="col-md-2 col-sm-4 col-xs-6 modal-lables-height">
                                    <div class="list-lable">My Hair type</div>

                                    <?php
                                    foreach ($hair_type as $valtype) {
                                        ?>
                                        <label class="pop-up-lables"><?php echo $valtype['HairType']; ?>
                                            <input type="checkbox" name="search_hairtype[]" value="<?php echo $valtype['HairTypeID']; ?>">
                                            <span class="checkmark-checkbox"></span>
                                        </label>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="col-md-2 col-sm-4 col-xs-6 modal-lables-height">
                                    <div class="list-lable" style="font-size: 13.94px;">My Hair Length</div>
                                    <?php
                                    foreach ($hair_length as $vallength) {
                                        ?>
                                        <label class="pop-up-lables"><?php echo $vallength['HairLength']; ?>
                                            <input type="checkbox" name="search_hairlength[]"  value="<?php echo $vallength['HairLengthID']; ?>">
                                            <span class="checkmark-checkbox"></span>
                                        </label>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="col-md-2 col-sm-4 col-xs-6 modal-lables-height">
                                    <div class="list-lable">Color</div>
                                    <div class="color-height scrollbar-outer">
                                        <?php
                                        foreach ($hair_color as $valcolor) {
                                            ?>
                                            <label class="pop-up-lables">
                                                <?php
                                                if (!empty($valcolor['Description'])) {
                                                    ?>
                                                    <div><font style="background:<?php echo $valcolor['Description']; ?>;height:25px;width:25px;border-radius:50%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></div>
                                                    <?php
                                                } else {
                                                    if ($valcolor['HairColor'] == "Other") {
                                                        echo '<div style="padding-top:4px;"><div style="border-radius: 50px;border-style: solid;border-width: 9px;border-bottom-color: red;border-left-color: green;border-right-color: blue;border-top-color: yellow;height: 6px;width: 0px;-webkit-transform: rotate(45deg);-moz-transform: rotate(45deg);-ms-transform: rotate(45deg);-o-transform: rotate(45deg);transform: rotate(45deg);"></div></div>';
                                                    } else {
                                                        echo $valcolor['HairColor'];
                                                    }
                                                }
                                                ?>
                                                <input type="checkbox" name="search_haircolor[]" value="<?php echo $valcolor['HairColorID']; ?>">
                                                <span class="checkmark-checkbox"></span>
                                            </label>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row pad-b-20">
                                <div class="col-xs-12 list-lable toggle-services">Services</div>
                                <?php
                                foreach ($hair_servicemaster as $valservice) {
                                    ?>
                                    <div class="col-md-2 col-sm-4 col-xs-6">
                                        <div class="color-height">
                                            <label class="pop-up-lables"><?php echo $valservice['ServiceName']; ?>
                                                <input type="checkbox" name="search_services[]" value="<?php echo $valservice['ServiceMasterID']; ?>">
                                                <span class="checkmark-checkbox"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <button type="button" class="blk-btn" data-dismiss="modal" aria-label="Close">Search</button>
                                    <input type="reset" class="blk-btn" value="reset"> 
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>

</div>

<div id="uploadimageModal" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Upload & Crop Image</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div id="image_demo1"></div>
                    </div>
                    <div class="col-md-12 text-center" style="padding-top:30px;">
                        <button class="btn btn-success crop_image">Crop & Upload Image</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<section id="footer">
    <div class="footer-section">
        <div class="container">
            <!--footer-section 1-->
            <div class="col-sm-4 col-xs-12">
                <div class="logo-section clearfix">
                    <div class="logo clearfix">
                        <a class="navbar-brand footer-logo" href="<?php echo site_url(); ?>"><img src="<?php echo $this->config->item('assets'); ?>img/logo.svg" alt=""></a>
                    </div>
                    <div class="logo-defination">
                        <p>Hair Decoded is a beauty and hair style discovery booking platform that lets you book hair stylists, salons, and barbers geolocation.</p>
                    </div>
                </div>
            </div>
            <!--footer-section 2-->
            <div class="col-sm-3 col-xs-8">
                <div class="nav-info">
                    <ul>
                        <li><a href="<?php echo base_url('search'); ?>">SEARCH FOR PROFESSIONALS</a></li>
                        <li><a href="<?php echo base_url('discover'); ?>">DISCOVER</a></li>
                        <?php
                        $currentUserData = $this->session->userdata('user');
                        if (empty($currentUserData)) {
                            ?>
                            <li><a href="<?php echo base_url('get-listed'); ?>">GET LISTED</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#login-modal">LOGIN</a></li>
                            <?php
                        }
                        ?>
                        <li><a href="<?php echo base_url('about-us'); ?>">ABOUT</a></li>
                    </ul>
                </div>
            </div>
            <!--footer-section 3-->
            <div class="col-sm-2 col-xs-4">
                <div class="nav-info">
                    <ul>
                        <li><a href="<?php echo base_url('terms'); ?>">TERMS</a></li>
                        <li><a href="<?php echo base_url('privacy'); ?>">PRIVACY</a></li>
                        <li><a href="<?php echo base_url('contact'); ?>">GET HELP</a></li>
                        <li><a href="<?php echo base_url('contact'); ?>">CONTACT</a></li>
                    </ul>
                </div>
            </div>
            <!--footer-section 4-->
            <div class="col-sm-2 col-xs-12">
                <div class="nav-info">
                    <div class="social-icons">
                        <a href="https://www.instagram.com/hairdecoded/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a> 
                        <a href="https://www.facebook.com/hairdecoded/" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a> 
                        <a href="https://twitter.com/hairdecoded" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
                    </div>
                    <ul>
                        <li><a href="mailto:info@hairdecoded.com" class="footer-email">info@hairdecoded.com</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="copy-right">
        <p><a href="">&copy; Hair Decoded</a>. All Right Reserved 2019</p>
    </div>
</section>

<style type="text/css">
    /*.crop_image,.crop_image1,.crop_image2 {
        margin-top: 45%;
    }*/
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>
<script src="<?php echo $this->config->item('assets'); ?>js/bootstrap-select.js" type="text/javascript"></script>
<script src="<?php echo $this->config->item('assets'); ?>js/scrollbar.js"></script>
<script src="<?php echo $this->config->item('assets'); ?>js/script.js"></script>
<script src="<?php echo $this->config->item('assets'); ?>js/croppie.js"></script>
<script>
    $("#owl-demo1").owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        navText: ["<i class='fa fa-long-arrow-left'></i>", "<i class='fa fa-long-arrow-right'></i>"],

        responsive: {
            0: {
                items: 1
            },
            476: {
                items: 2
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            },
            1100: {
                items: 4
            }
        }
    })
    $('#owl-demo2').owlCarousel({
        center: true,
        items: 2,
        loop: true,
        margin: 10,
        navText: ["<i class='fa fa-long-arrow-left'></i>", "<i class='fa fa-long-arrow-right'></i>"],
        responsive: {
            0: {
                items: 2
            },
            400: {
                items: 3
            },
            600: {
                items: 3
            },
            700: {
                items: 4
            },
            1000: {
                items: 4
            }
        }
    });
    $("#owl-demo3").owlCarousel({
        loop: true,
        margin: 10,
        nav: true,

        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],

        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 4
            },
            1000: {
                items: 5
            }
        }
    })
    $(".dropdown").click(function () {
        $(".slider-bottom-section").toggle(1000);
    });

    jQuery(document).ready(function () {
        jQuery('.scrollbar-macosx').scrollbar();
        jQuery('.scrollbar-outer').scrollbar();

        $(".signup_form").submit(function (e) {
            e.preventDefault();
            if ($("#signup-pass").val() != $("#signup-cpass").val()) {
                $(".signupres div").attr("class", "alert alert-danger");
                $(".signupres div").html("Invalid Confirm Password.");
                return false;
            }
            var $form = $(this);
            $.ajax({
                type: "POST",
                url: '<?php echo base_url("auth/signup"); ?>',
                data: $form.serialize(),
                dataType: "json",
                success: function (response) {
                    if (response.status == true) {
                        $(".signupres div").attr("class", "alert alert-success");
                        $(".signupres div").html(response.message);
                        setTimeout(function () {
                            location.reload();
                        }, 1500)
                    } else {
                        $(".signupres div").attr("class", "alert alert-danger");
                        $(".signupres div").html(response.message);
                    }
                }
            });
        });

        $(".login_form").submit(function (e) {
            e.preventDefault();
            var $form = $(this);
            $.ajax({
                type: "POST",
                url: '<?php echo base_url("auth/login"); ?>',
                data: $form.serialize(),
                dataType: "json",
                success: function (response) {
                    if (response.status == true) {
                        $(".loginres div").attr("class", "alert alert-success");
                        $(".loginres div").html(response.message);
                        setTimeout(function () {
                            location.reload();
                        }, 1500)
                    } else {
                        $(".loginres div").attr("class", "alert alert-danger");
                        $(".loginres div").html(response.message);
                    }
                }
            });
        });

        $("#resetpassword").submit(function (e) {
            e.preventDefault();
            var $form = $(this);
            $.ajax({
                type: "POST",
                url: '<?php echo base_url("auth/forgotpassword"); ?>',
                data: $form.serialize(),
                dataType: "json",
                success: function (response) {
                    if (response.status == 'true') {
                        messageShow("Success!", response.message, "green", "Success");
                        $("#forgot-passowrd").modal("hide");
                        $("#resetpassword")[0].reset();
                    } else {
                        $("#resetpassword .loginres div").attr("class", "alert alert-danger");
                        $("#resetpassword .loginres div").html(response.message);
                    }
                }
            });
        });
    });
    $("#upload-photo-form").submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: '<?php echo base_url("Discover/addDiscover"); ?>',
            data: $("#upload-photo-form").serialize(),
            beforeSend: function () {
                $('.ajax-loader').css("visibility", "visible");
            },
            success: function (response) {
                var obj = JSON.parse(response);
                if (obj.status == "true") {
                    messageShow("Success!", obj.message, "green", "Success");
                    $("#upload-photo").modal("hide");
                    $("#upload-photo-form")[0].reset();
                    setTimeout(function () {
                        window.location.href = '<?php echo base_url("Discover"); ?>';
                    }, 1500);
                } else {
                    messageShow("Error!", obj.message, "red", "Try-Again");
                }
            },
            complete: function () {
                $('.ajax-loader').css("visibility", "hidden");
            }
        });
    });

    $(".filter_record").click(function () {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url("search/filterRecord"); ?>',
            data: $("#filter_record").serialize() + "&filter_box=" + $("#filter_box").val() + "&filter_zc=" + $("#filter_zc").val() + "&ss=<?php echo uri_string(); ?>",
            beforeSend: function () {
                //$('.ajax-loader').css("visibility", "visible");
            },
            success: function (response) {
                var obj = JSON.parse(response);
                //console.log(obj);
                <?php
                // if(uri_string()  == "search") {
                if (uri_string() == "searchss") {
                    ?>
                    var j = 1;
                    var html = locs = locs1 = '';
                    if (obj.data != "undefined" && obj.data) {
                        for (var i = 0; i < obj.data.length; i++) {
                            if (i == 0) {
                                html = '<div class="jumbotron page" id="page' + j + '">';
                            }
                            if (i != 0 && i % 9 == 0) {
                                j = j + 1;
                                html = html = html + '</div><div class="jumbotron page" id="page' + j + '">';
                            }
                            html = html + '<div class="col-md-4 col-sm-4 col-xs-6">' +
                                    '<div class="profile-box">' +
                                    '<div class="profile-pic-map">' +
                                    '<img src="<?php echo base_url(); ?>' + obj.data[i].thumbnail + '" class="img-responsive" alt="" width="217" height="217">' +
                                    '<a onclick="open_services(' + obj.data[i].ServiceID + ');"  class="search-eye" data-toggle="modal" data-target="#bookstyle"><i class="fa fa-eye" aria-hidden="true"></i></a>' +
                                    '<div class="price-tag">$' + obj.data[i].Price + '</div>' +
                                    '</div>' +
                                    '<div class="map-person-name text-center"><a href="#">' + obj.data[i].Title + '</a></div>' +
                                    '<div class="map-person-service text-center"><a href="#">' + obj.data[i].HasTag + '</a></div>' +
                                    '<a href="#" onclick="open_services(' + obj.data[i].ServiceID + ');" class="bookstyle-btn" data-toggle="modal" data-target="#bookstyle">Book Style</a>' +
                                    '</div>' +
                                    '</div>';
                            if (obj.data[i].Latitude && obj.data[i].Longitude) {
                                locs = '<img src=\'<?php echo base_url(); ?>' + obj.data[i].thumbnail + '\' class=\'img-responsive\' alt=\'\' width=\'217\' height=\'217\'>' +
                                        '<a onclick=\'open_services(' + obj.data[i].ServiceID + ');\'  class=\'search-eye\' data-toggle=\'modal\' data-target=\'#bookstyle\'><i class=\'fa fa-eye\' aria-hidden=\'true\'></i></a>' +
                                        '<div class=\'price-tag\'>$' + obj.data[i].Price + '</div>' +
                                        '</div>' +
                                        '<div class=\'map-person-name text-center\'><a href=\'#\'>' + obj.data[i].Title + '</a></div>' +
                                        '<div class=\'map-person-service text-center\'><a href=\'#\'>' + obj.data[i].HasTag + '</a></div>' +
                                        '<a href=\'#\' onclick=\'open_services(' + obj.data[i].ServiceID + ');\' class=\'bookstyle-btn\' data-toggle=\'modal\' data-target=\'#bookstyle\'>Book Style</a>' +
                                        '</div>';
                                locs1 = locs1 + '["hi",' + obj.data[i].Latitude + ',' + obj.data[i].Longitude + ',"' + locs + '"],';
                            }
                        }
                    }
                    if (html) {
                        locations = [locs1];
                        clearMarkers();

                        setTimeout(function () {
                            initMap1();
                        }, 1500);
                        $(".serviceList").html("</div>" + html);

                        $('#pagination-demo').twbsPagination('destroy');

                        $('#pagination-demo').twbsPagination({
                            totalPages: Math.ceil((obj.total / 9)),
                            startPage: 1,
                            visiblePages: 5,
                            initiateStartPageClick: true,
                            href: false,
                            hrefVariable: '{{number}}',
                            first: 'First',
                            prev: 'Previous',
                            next: 'Next',
                            last: 'Last',
                            loop: false,
                            onPageClick: function (event, page) {
                                $('.page-active').removeClass('page-active');
                                $('#page' + page).addClass('page-active');
                            },
                            paginationClass: 'pagination',
                            nextClass: 'next',
                            prevClass: 'prev',
                            lastClass: 'last',
                            firstClass: 'first',
                            pageClass: 'page',
                            activeClass: 'active',
                            disabledClass: 'disabled'
                        });
                    } else {
                        $('#pagination-demo').twbsPagination('destroy');
                        $(".serviceList").html("");
                        // $(".serviceList").html("<br/><h2 align='center'>No record Found!</h2><br/>");
                    }
                    <?php
                } else {
                    ?>
                    window.location.href = "<?php echo base_url(); ?>search";
                    <?php
                }
                ?>
            },
            complete: function () {
                //$('.ajax-loader').css("visibility", "hidden");
            }
        });
    });

                                $(".discover_filter_form").click(function () {
                                    $.ajax({
                                        type: "POST",
                                        url: '<?php echo base_url("discover/filterRecord"); ?>',
                                        data: $("#discover_filter_form").serialize() + "&ss=<?php echo uri_string(); ?>",
                                        beforeSend: function () {
                                            $('.ajax-loader').css("visibility", "visible");
                                        },
                                        success: function (response) {
                                            var obj = JSON.parse(response);
                                            //console.log(obj);
<?php
if (uri_string() == "discover") {
    ?>
                                                var j = 1;
                                                var html = '';
                                                if (obj.data != "undefined" && obj.data) {
                                                    for (var i = 0; i < obj.data.length; i++) {
                                                        if (i != 0 && i % 20 == 0) {
                                                            j = j + 1;
                                                            html = html = html + '</div><div class="jumbotron page" id="page' + j + '">';
                                                        }
                                                        html = html + '<div class="col-md-3 col-sm-3 col-xs-6">' +
                                                                '<div class="discover-profile-box">' +
                                                                '<div class="profile-pic-map">' +
                                                                '<a href="#" class="view-profile-galler" onclick="getdetail(' + obj.data[i].GalleryID + ')"><img src="<?php echo base_url(); ?>' + obj.data[i].Image + '" class="img-responsive" alt="" style="height:250px;width:100%;"></a>' +
                                                                '<a class="discover-fav disfav-' + obj.data[i].GalleryID + '" onclick="likedislike(' + obj.data[i].GalleryID + ');">';
                                                        if (obj.data[i].ldl == 1) {
                                                            html = html + '<i class="fa fa-heart" aria-hidden="true"></i>';
                                                        } else {
                                                            html = html + '<i class="fa fa-heart-o" aria-hidden="true"></i>';
                                                        }
                                                        html = html + '</a>' +
                                                                '</div>' +
                                                                '</div>' +
                                                                '</div>';
                                                    }
                                                }
                                                if (html) {
                                                    $(".discoverpage").html("</div>" + html);

                                                    $('#pagination-demo').twbsPagination('destroy');

                                                    $('#pagination-demo').twbsPagination({
                                                        totalPages: Math.ceil((obj.total / 20)),
                                                        startPage: 1,
                                                        visiblePages: 5,
                                                        initiateStartPageClick: true,
                                                        href: false,
                                                        hrefVariable: '{{number}}',
                                                        first: 'First',
                                                        prev: 'Previous',
                                                        next: 'Next',
                                                        last: 'Last',
                                                        loop: false,
                                                        onPageClick: function (event, page) {
                                                            $('.page-active').removeClass('page-active');
                                                            $('#page' + page).addClass('page-active');
                                                        },
                                                        paginationClass: 'pagination',
                                                        nextClass: 'next',
                                                        prevClass: 'prev',
                                                        lastClass: 'last',
                                                        firstClass: 'first',
                                                        pageClass: 'page',
                                                        activeClass: 'active',
                                                        disabledClass: 'disabled'
                                                    });
                                                } else {
                                                    $('#pagination-demo').twbsPagination('destroy');
                                                    $(".discoverpage").html("");
                                                    // $(".discoverpage").html("<br/><h2 align='center'>No record Found!</h2><br/>");
                                                }
    <?php
} else {
    ?>
                                                window.location.href = "<?php echo base_url(); ?>discover";
    <?php
}
?>
                                        },
                                        complete: function () {
                                            $('.ajax-loader').css("visibility", "hidden");
                                        }
                                    });
                                });
                                function messageShow(title, content, color, button) {
                                    $.confirm({
                                        title: title,
                                        content: content,
                                        type: color,
                                        typeAnimated: true,
                                        buttons: {
                                            tryAgain: {
                                                text: button,
                                                btnClass: 'btn-red',
                                                action: function () {
                                                }
                                            },
                                            close: function () {
                                            }
                                        }
                                    });
                                }
</script>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.img-upload').css({'background': 'url(' + e.target.result + ')'});
                $('.img-upload').css({'background-size': '100% 100%'});
                $(".img-upload #drop-area .drop-text").html("&nbsp;&nbsp;");
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#subscribedform").submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: '<?php echo base_url("contact/syncMailchimp"); ?>',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                $('.ajax-loader').css("visibility", "visible");
            },
            success: function (response) {
                var obj = JSON.parse(response);
                if (obj.status == "true") {
                    $("#subscribedform")[0].reset();
                    messageShow("Success!", obj.message, "green", "Success");
                } else {
                    messageShow("Error!", obj.message, "red", "Try-Again");
                }
            },
            complete: function () {
                $('.ajax-loader').css("visibility", "hidden");
            }
        });
    });
    function searchlook(id, id1 = "", id2 = "") {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url("search/filterRecord"); ?>',
            data: {"ssid1": id, "ssid2": id1, "ssid3": id2},
            beforeSend: function () {
                $('.ajax-loader').css("visibility", "visible");
            },
            success: function (response) {
                var obj = JSON.parse(response);
                // console.log(obj);
                window.location.href = "<?php echo base_url(); ?>search";
            },
            complete: function () {
                $('.ajax-loader').css("visibility", "hidden");
            }
        });
    }
    $image_crop = $('#image_demo').croppie({
        enableExif: true,
        viewport: {
            width: 200,
            height: 200,
            type: 'square' //circle
        },
        boundary: {
            width: 300,
            height: 300
        }
    });
    $image_crop1 = $('#image_demo1').croppie({
        enableExif: true,
        viewport: {
            width: 200,
            height: 200,
            type: 'square' //circle
        },
        boundary: {
            width: 300,
            height: 300
        }
    });

    $('#photo1').on('change', function () {
        var iwth = ihgt = 0;
        var reader;
        reader = new FileReader();
        reader.onload = function (event) {
            var image = new Image();
            image.src = reader.result;
            image.onload = function () {
                iwth = image.width;
                ihgt = image.height;
            };
            $image_crop1.croppie('bind', {
                url: event.target.result
            }).then(function () {
                console.log('jQuery bind complete');
            });
        }
        reader.readAsDataURL(this.files[0]);
        $('#uploadimageModal').modal('show');
    });

    $('.crop_image').click(function (event) {
        $image_crop1.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (response) {
            $('#uploadimageModal').modal('hide');

            $('.img-upload').html("<img src='" + response + "' width='100%'/>");
            $('.img-upload').css({"padding": "0px"});
            $('#photo1s').val(response);
        })
    });
</script>
</body>
</html>
