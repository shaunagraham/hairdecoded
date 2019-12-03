<div class="navbg-gry"></div>
<div class="container">
    <section id="hair-pro">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="profile-pro-img">
                    <img src="<?php if(!empty($stylist[0]->ProfilePic)) { echo base_url().$stylist[0]->ProfilePic; }else{ echo base_url().'images/profile/Blank-Profile-Icon.jpg'; } ?>" class="img-responsive profilePic" alt="" style="width:100%;height:250px;object-fit: cover;">
                </div>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="col-md-12 col-sm-12 col-xs-12">
                   <div class="client-detail-profile clearfix">
                      <div class="name pull-left CustomerName"><?php echo $user['user']['firstName']." ".$user['user']['lastName']; ?></div>
                  </div>
                  <p class="about-client-intro Slug">

                  </p>
                  <p class="client-cell"><i class="fa fa-phone" aria-hidden="true"></i> <a href="javascript:void(0);" class="MobileNo"></a></p>
                  <p class="client-cell"><i class="fa fa-envelope-open-o" aria-hidden="true"></i> <a href="javascript:void(0);"class="EmailID" ></a></p>
                  <div class="social-icons">
                      <a href="javascript:void(0);" class="instagram" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a> 
                      <a href="javascript:void(0);" class="facebook" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a> 
                      <a href="javascript:void(0);" class="twitter" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
                  </div>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12  text-center-sm">
                <a href="#" class="white-btn pro-icon" data-toggle="modal" data-target="#specialities" style="width:190px;"><i class="fa fa-plus-square-o" aria-hidden="true"></i> SPECIALITIES</a>

                <a href="#" class="white-btn pro-icon" data-toggle="modal" data-target="#add-availability" style="width:190px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> AVAILABILITY</a>
                <?php
                if(empty($usscheck)) {
                    ?>
                    <a href="javascript:void(0);"  onclick="getproffessionaldetail();" class="edit-profile white-btn pro-icon" style="width:190px;"><i class="fa fa-pencil" aria-hidden="true"></i> Edit Profile</a>
                    <?php 
                } 
                ?>
            </div>
        </div>

        <div class="col-md-9 col-sm-9 col-xs-12 col-md9-100">

        </div>
    </div>

    <h3 class="my-services-hd">MY SERVICES</h3>
    <div class="row servicelist">


    </div>
    <div class="row servicepage" align="center">

    </div>    </section>
</div>
<style type="text/css">
    .pagebox{
        width: 30px;
        height: 30px;
        background : black;
        color: white;
        padding: 5px 10px;
        display: inline-block;
        border: 1px #676767 solid;
    }
    .activepage{
        background : white;
        color: black;
        border: 1px #000000 solid;
    }
    .services-img .view-profile-galler {
        position: absolute;
        top: 5px;
        left: 20px;
        background: #000000bd;
        padding: 2px 10px;
    }
    .services-img .view-profile-galler:hover {
        background: #ffffffbd;
    }
</style>


<div class="modal fade specialities" id="specialities" tabindex="-1" role="dialog" aria-labelledby="specilitiesLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <h2 class="btmline">Specialties</h2>
                <div class="close-btn"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
                <form id="specialities-form">
                    <div class="row">
                        <div class="col-xs-12"><div class="list-lable pad-top-none no-margin">I Am</div></div>
                        <?php
                        $hp = explode(",", $stylist[0]->HairProfessionalID);
                        foreach ($hair_professional as $valprofessional) {
                            ?>
                            <div class="col-xs-12 col-md-3">
                                <label class="pop-up-lables"><?php echo $valprofessional['HairProfessional']; ?>
                                    <input type="checkbox" name="forprofessional[]" value="<?php echo $valprofessional['HairProfessionalID']; ?>" <?php foreach ($hp as  $hpval) {
                                        if($hpval == $valprofessional['HairProfessionalID']) { echo "checked"; }
                                    } ?>>
                                    <span class="checkmark-checkbox"></span>
                                </label>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="col-xs-12 specialities-are">Specialities are:</div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                    <div class="list-lable">FOR</div>
                                    <?php
                                    $hp = explode(",", $stylist[0]->HairForID);
                                    foreach ($hair_for as $valfor) {
                                        ?>
                                        <label class="pop-up-lables"><?php echo $valfor['HairFor']; ?>
                                            <input type="checkbox" name="fortype[]" value="<?php echo $valfor['HairForID']; ?>" <?php foreach ($hp as  $hpval) {
                                                if($hpval == $valfor['HairForID']) { echo "checked"; }
                                            } ?>>
                                            <span class="checkmark-checkbox"></span>
                                        </label>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                    <div class="list-lable" style="font-size: 13.94px;">My Hair Length</div>
                                    <?php
                                    $hp = explode(",", $stylist[0]->HairLengthID);
                                    foreach ($hair_length as $vallength) {
                                        ?>
                                        <label class="pop-up-lables"><?php echo $vallength['HairLength']; ?>
                                            <input type="checkbox" name="hairlength[]"  value="<?php echo $vallength['HairLengthID']; ?>" <?php foreach ($hp as  $hpval) {
                                                if($hpval == $vallength['HairLengthID']) { echo "checked"; }
                                            } ?>>
                                            <span class="checkmark-checkbox"></span>
                                        </label>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                    <div class="list-lable">Hair Type</div>
                                    <?php
                                    $hp = explode(",", $stylist[0]->HairTypeID);
                                    foreach ($hair_type as $valtype) {
                                        ?>
                                        <label class="pop-up-lables"><?php echo $valtype['HairType']; ?>
                                            <input type="checkbox" name="hairtype[]" value="<?php echo $valtype['HairTypeID']; ?>" <?php foreach ($hp as  $hpval) {
                                                if($hpval == $valtype['HairTypeID']) { echo "checked"; }
                                            } ?>>
                                            <span class="checkmark-checkbox"></span>
                                        </label>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                    <div class="list-lable">Color</div>
                                    <?php
                                    $hp = explode(",", $stylist[0]->HairColorID);
                                    foreach ($hair_color as $valcolor) {
                                        ?>
                                        <label class="pop-up-lables">
                                            <?php
                                            if( !empty($valcolor['Description'])) {
                                                ?>
                                                <div><font style="background:<?php echo $valcolor['Description']; ?>;height:25px;width:25px;border-radius:50%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></div>
                                                <?php
                                            }   else {
                                                if($valcolor['HairColor'] == "Other"){
                                                    echo '<div style="padding-top:4px;"><div style="border-radius: 50px;border-style: solid;border-width: 10px;border-bottom-color: red;border-left-color: green;border-right-color: blue;border-top-color: yellow;height: 6px;width: 0px;-webkit-transform: rotate(45deg);-moz-transform: rotate(45deg);-ms-transform: rotate(45deg);-o-transform: rotate(45deg);transform: rotate(45deg);"></div></div>';
                                                }else{
                                                    echo $valcolor['HairColor'];
                                                }
                                            }
                                            ?>
                                            <input type="checkbox" name="haircolor[]" value="<?php echo $valcolor['HairColorID']; ?>" <?php foreach ($hp as  $hpval) {
                                                if($hpval == $valcolor['HairColorID']) { echo "checked"; }
                                            } ?>>
                                            <span class="checkmark-checkbox"></span>
                                        </label>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="list-lable">Services</div>
                                </div>
                                <?php
                                $hp = explode(",", $stylist[0]->ServiceMasterID);
                                foreach ($hair_servicemaster as $valservice) {
                                    ?>
                                    <div class="col-md-3 col-sm-3 col-xs-6">
                                        <div class="color-height">
                                            <label class="pop-up-lables"><?php echo $valservice['ServiceName']; ?>
                                                <input type="checkbox" name="services[]" value="<?php echo $valservice['ServiceMasterID']; ?>" <?php foreach ($hp as  $hpval) {
                                                    if($hpval == $valservice['ServiceMasterID']) { echo "checked"; }
                                                } ?>>
                                                <span class="checkmark-checkbox"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    $("#specialities-form").submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: '<?php echo base_url("Myprofile/mySpecialties"); ?>',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
            },
            success: function (response) {
                // console.log(response);
                var obj = JSON.parse(response);
                if(obj.status == "true") {
                    messageShow("Success!",obj.message,"green","Success");
                    $("#specialities").modal("hide");
                }else{
                    messageShow("Error!",obj.message,"red","Try-Again");
                }
            },
            complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
            }
        });
    });
</script>
<div class="modal fade gallery-popup" id="gallery-popup" tabindex="-1" role="dialog" aria-labelledby="uploadPhotoLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="close-btn"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
                <div class="row">
                    <div class="col-md-7">
                        <div class="client-img-view text-center">
                            <a href="#" class="trash-icon-pro"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                            <img src="<?php echo $this->config->item('assets'); ?>img/image-view2.jpg" class="img-responsive" alt="">
                            <div class="pro-popup-price">
                                <div class="price-info">$750</div>
                                <a href="#" class="add-price"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                <a href="#" class="contact-stylist"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="gallery-view-detail">
                            <div class="row">
                                <div class="col-md-3 col-sm-3 col-xs-3">
                                    <img src="<?php echo $this->config->item('assets'); ?>img/pro-profile-pic.jpg" class="gallery-view-profile-pic" alt="">
                                </div>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <span class="user-profile-name"><a href="#">Eronica Becham</a></span> <br>
                                    <span class="user-profile-update">5 days ago</span>
                                    <span class="edit-pro-popup"><a href="#"><i class="fa fa-pencil" aria-hidden="true"></i> <u>Edit</u></a></span>
                                </div>
                                <div class="col-xs-12">
                                    <div class="social-media-links">
                                        <a href="#" class="envelope-commenting"><i class="fa fa-commenting"></i></a>
                                        <a href="#" class="envelope-share"><i class="fa fa-envelope"></i></a>
                                        <a href="#" class="facebook-share"><i class="fa fa-facebook"></i></a>
                                        <a href="#" class="twitter-share"><i class="fa fa-twitter"></i></a>
                                        <a href="#" class="instagram-share"><i class="fa fa-instagram"></i></a>
                                        <a href="#" class="linkedin-share"><i class="fa fa-linkedin"></i></a>
                                        <a href="#" class="printerest-share"><i class="fa fa-pinterest-p"></i></a>
                                    </div>
                                </div>
                                <div class="col-xs-12 ">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam iaculis orci ac metus. Lorem ipsum dolor sit amet, consectetur </p>
                                </div>
                                <div class="col-xs-12">
                                    <div class="tags-gallery-pic"><span>red</span> <span>short</span> <span>weave</span> <span>extension</span></div>
                                    <!--<div class="gallery-pic-services">Stylist, Female, Curly, Long</div>-->
                                </div>
                                <div class="col-xs-12">
                                    <ul class="gallery-view-comments">
                                        <li><span class="username-comment"><strong>Steafano_77 I</strong> like this style</span> <span class="pull-right"><a href="#"><i class="fa fa-times" aria-hidden="true"></i></a></span> </li>
                                        <li><span class="username-comment"><strong>Jenny_876</strong> Rerfectly!!!
                                        </span> <span class="pull-right"><a href="#"><i class="fa fa-times" aria-hidden="true"></i></a></span> </li>
                                        <li><span class="username-comment"><strong>Haily_J556</strong> How long to make such a hairstyle? </span> <span class="pull-right"><a href="#"><i class="fa fa-times" aria-hidden="true"></i></a></span> </li>
                                    </ul>
                                    <div class="add-comment">
                                        <textarea cols="" rows="" placeholder="Add your comment..."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade bookstyle" id="bookstyle" tabindex="-1" role="dialog" aria-labelledby="bookStyleLabel">
    <div class="modal-dialog" role="document">
        <form id="bookappoinment">
            <div class="modal-content">
                <input type="hidden" id="id" name="id">
                <div class="modal-body nopadding">
                    <div class="close-btn visible-xs"><a type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a></div>
                    <div class="row">
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <div class="booking-modal">
                                <!--<h2>Caroline Bukovski</h2>-->
                                
                                <img src="" class="img-responsive" alt="">
                                <a style="position:absolute; margin: -40px 0; padding: 10px; background:#0000006e; color:white;width: 91%;text-align: center;" class="usernamebook"></a>
                                
                                <div class="pad-20">
                                    <div class="modal-price-info clearfix"><span class="style-info pull-left">
                                        <!-- <a href="#" class="tags"></a> -->
                                        <div class="search-person-name"></div>
                                    </span> <span class="price-info pull-right" style="padding-top: 10px;"></span></div>

                                    <div class="tags-gallery-pic" style="line-height:2em;height:auto;"></div>


                                    <p class="description">
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-6 col-xs-12 ">
                            <div class="calend-contain">
                                <div class="close-btn visible-lg visible-md visible-sm"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>

                                <div class="calendar">
                                    <div id="calendar">
                                        <input type="hidden" id="choose-date" name="dates" value="<?php echo date("Y-m-d"); ?>">
                                    </div>
                                    <br/>
                                    <!-- <div class="form-group">
                                        <input type="date" class="form-control" id="choose-date"  name="dates" min="<?php echo date("Y-m-d"); ?>" required/>
                                    </div> -->
                                    <div class="select-time form-group">
                                        <div class="select-side">
                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        </div>
                                        <select class="form-control" id="choose-time" name="times" required>
                                            <option selected value="">Choose Time</option>
                                            <?php 
                                            foreach ($times as $value) {
                                                echo '<option value="'.$value->Times.'">'.date('h:i A',strtotime($value->Times)).'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div><br/><br/><br/><br/>
                                    <div class="form-group">
                                        <textarea placeholder="Notes" class="form-control" id="choose-date" name="notes" style="width:94%;"></textarea>
                                    </div>

                                    <div class="bookstyle-form-btn text-center" style="padding-top:0px;">
                                        <input type="submit" value="Book" class="btn blk-btn"> &nbsp; <a href="#"  data-dismiss="modal" aria-label="Close" class="btn white-btn">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>

<div class="modal fade specialities" id="add-availability" tabindex="-1" role="dialog" aria-labelledby="specilitiesLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <div class="close-btn"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
                <h2 class="btmline">Schedule</h2>
                <form id="availability-form">
                    <div class="week-day-box">
                        <div class="row">
                            <div class="col-md-3">
                                <input type="hidden" name="weekday[]" value="Monday">
                                <div class="week-day">Monday</div>
                            </div>
                            <div class="col-md-3">
                                <select name="startSchedule[]" class="selectpicker">
                                    <?php 
                                    foreach ($times as $value) {
                                        $check = "";
                                        if($stylistavailability[0]->StartTime == $value->Times) {
                                            $check = "selected";
                                        }
                                        echo '<option value="'.$value->Times.'" '.$check.'>'.date('h:i A',strtotime($value->Times)).'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="endSchedule[]" class="selectpicker">
                                    <?php 
                                    foreach ($times as $value) {
                                        $check = "";
                                        if($stylistavailability[0]->EndTime == $value->Times) {
                                            $check = "selected";
                                        }
                                        echo '<option value="'.$value->Times.'" '.$check.'>'.date('h:i A',strtotime($value->Times)).'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="pop-up-lables">Closed
                                    <input type="checkbox" name="closed1" <?php if($stylistavailability[0]->IsOpen == "Closed") { echo "checked"; }  ?>>
                                    <span class="checkmark-checkbox"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="week-day-box">
                        <div class="row">
                            <div class="col-md-3">
                                <input type="hidden" name="weekday[]" value="Tuesday">
                                <div class="week-day">Tuesday</div>
                            </div>
                            <div class="col-md-3">
                                <select name="startSchedule[]" class="selectpicker">
                                    <?php 
                                    foreach ($times as $value) {
                                        $check = "";
                                        if($stylistavailability[1]->StartTime == $value->Times) {
                                            $check = "selected";
                                        }
                                        echo '<option value="'.$value->Times.'" '.$check.'>'.date('h:i A',strtotime($value->Times)).'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="endSchedule[]" class="selectpicker">
                                    <?php 
                                    foreach ($times as $value) {
                                        $check = "";
                                        if($stylistavailability[1]->EndTime == $value->Times) {
                                            $check = "selected";
                                        }
                                        echo '<option value="'.$value->Times.'" '.$check.'>'.date('h:i A',strtotime($value->Times)).'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="pop-up-lables">Closed
                                    <input type="checkbox" name="closed2" <?php if($stylistavailability[1]->IsOpen == "Closed") { echo "checked"; }  ?>>
                                    <span class="checkmark-checkbox"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="week-day-box">
                        <div class="row">
                            <div class="col-md-3">
                                <input type="hidden" name="weekday[]" value="Wednessday">
                                <div class="week-day">Wednessday</div>
                            </div>
                            <div class="col-md-3">
                                <select name="startSchedule[]" class="selectpicker">
                                    <?php 
                                    foreach ($times as $value) {
                                        $check = "";
                                        if($stylistavailability[2]->StartTime == $value->Times) {
                                            $check = "selected";
                                        }
                                        echo '<option value="'.$value->Times.'" '.$check.'>'.date('h:i A',strtotime($value->Times)).'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="endSchedule[]" class="selectpicker">
                                    <?php 
                                    foreach ($times as $value) {
                                        $check = "";
                                        if($stylistavailability[2]->EndTime == $value->Times) {
                                            $check = "selected";
                                        }
                                        echo '<option value="'.$value->Times.'" '.$check.'>'.date('h:i A',strtotime($value->Times)).'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="pop-up-lables">Closed
                                    <input type="checkbox" name="closed3" <?php if($stylistavailability[2]->IsOpen == "Closed") { echo "checked"; }  ?>>
                                    <span class="checkmark-checkbox"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="week-day-box">
                        <div class="row">
                            <div class="col-md-3">
                                <input type="hidden" name="weekday[]" value="Thursday">
                                <div class="week-day">Thursday</div>
                            </div>
                            <div class="col-md-3">
                                <select name="startSchedule[]" class="selectpicker">
                                    <?php 
                                    foreach ($times as $value) {
                                        $check = "";
                                        if($stylistavailability[3]->StartTime == $value->Times) {
                                            $check = "selected";
                                        }
                                        echo '<option value="'.$value->Times.'" '.$check.'>'.date('h:i A',strtotime($value->Times)).'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="endSchedule[]" class="selectpicker">
                                    <?php 
                                    foreach ($times as $value) {
                                        $check = "";
                                        if($stylistavailability[3]->EndTime == $value->Times) {
                                            $check = "selected";
                                        }
                                        echo '<option value="'.$value->Times.'" '.$check.'>'.date('h:i A',strtotime($value->Times)).'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="pop-up-lables">Closed
                                    <input type="checkbox" name="closed4" <?php if($stylistavailability[3]->IsOpen == "Closed") { echo "checked"; }  ?>>
                                    <span class="checkmark-checkbox"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="week-day-box">
                        <div class="row">
                            <div class="col-md-3">
                                <input type="hidden" name="weekday[]" value="Friday">
                                <div class="week-day">Friday</div>
                            </div>
                            <div class="col-md-3">
                                <select name="startSchedule[]" class="selectpicker">
                                    <?php 
                                    foreach ($times as $value) {
                                        $check = "";
                                        if($stylistavailability[4]->StartTime == $value->Times) {
                                            $check = "selected";
                                        }
                                        echo '<option value="'.$value->Times.'" '.$check.'>'.date('h:i A',strtotime($value->Times)).'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="endSchedule[]" class="selectpicker">
                                    <?php 
                                    foreach ($times as $value) {
                                        $check = "";
                                        if($stylistavailability[4]->EndTime == $value->Times) {
                                            $check = "selected";
                                        }
                                        echo '<option value="'.$value->Times.'" '.$check.'>'.date('h:i A',strtotime($value->Times)).'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="pop-up-lables">Closed
                                    <input type="checkbox" name="closed5" <?php if($stylistavailability[4]->IsOpen == "Closed") { echo "checked"; }  ?>>
                                    <span class="checkmark-checkbox"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="week-day-box">
                        <div class="row">
                            <div class="col-md-3">
                                <input type="hidden" name="weekday[]" value="Saturday">
                                <div class="week-day">Saturday</div>
                            </div>
                            <div class="col-md-3">
                                <select name="startSchedule[]" class="selectpicker">
                                    <?php 
                                    foreach ($times as $value) {
                                        $check = "";
                                        if($stylistavailability[5]->StartTime == $value->Times) {
                                            $check = "selected";
                                        }
                                        echo '<option value="'.$value->Times.'" '.$check.'>'.date('h:i A',strtotime($value->Times)).'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="endSchedule[]" class="selectpicker">
                                    <?php 
                                    foreach ($times as $value) {
                                        $check = "";
                                        if($stylistavailability[5]->EndTime == $value->Times) {
                                            $check = "selected";
                                        }
                                        echo '<option value="'.$value->Times.'" '.$check.'>'.date('h:i A',strtotime($value->Times)).'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="pop-up-lables">Closed
                                    <input type="checkbox" name="closed6" <?php if($stylistavailability[5]->IsOpen == "Closed") { echo "checked"; }  ?>>
                                    <span class="checkmark-checkbox"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="week-day-box">
                        <div class="row">
                            <div class="col-md-3">
                                <input type="hidden" name="weekday[]" value="Sunday">
                                <div class="week-day">Sunday</div>
                            </div>
                            <div class="col-md-3">
                                <select name="startSchedule[]" class="selectpicker">
                                    <?php 
                                    foreach ($times as $value) {
                                        $check = "";
                                        if($stylistavailability[6]->StartTime == $value->Times) {
                                            $check = "selected";
                                        }
                                        echo '<option value="'.$value->Times.'" '.$check.'>'.date('h:i A',strtotime($value->Times)).'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="endSchedule[]" class="selectpicker">
                                    <?php 
                                    foreach ($times as $value) {
                                        $check = "";
                                        if($stylistavailability[6]->EndTime == $value->Times) {
                                            $check = "selected";
                                        }
                                        echo '<option value="'.$value->Times.'" '.$check.'>'.date('h:i A',strtotime($value->Times)).'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="pop-up-lables">Closed
                                    <input type="checkbox" name="closed7" <?php if($stylistavailability[6]->IsOpen == "Closed") { echo "checked"; }  ?>>
                                    <span class="checkmark-checkbox"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/locales/bootstrap-datepicker.nl.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.standalone.min.css" rel="stylesheet"/>
<script type="text/javascript">
    get_services(0);
    function get_services (page) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url("profile/getServices/"); ?>'+page,
            data:{uid : '<?php echo $userid; ?>'},
            beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
            },
            success: function (response) {
                var obj = JSON.parse(response);
                var html = "";
                if(obj.status == "true") {
                    for (var i = 0; i < obj.data.length; i++) {
                        html = html + '<div class="col-md-6 col-sm-12 col-xs-12 pad-b-20">' +
                        '<div class="services-img"><img src="<?php echo base_url(); ?>'+obj.data[i].ServicePic+'" class="img-responsive" alt="" style="height:150px;width:100%;">'+

                        '</div>' +
                        '<div class="services-detail">' +
                        '<div class="user-profile-name">'+obj.data[i].Title+'</div>' +
                        '<p class="services-sort-p">'+obj.data[i].Description+'</p>' +
                        '</div>' +
                        '<div class="services-action">' +
                        '<div class="rate">$'+obj.data[i].Price+'</div>' +
                        '<a href="#" class="white-btn" data-toggle="modal" data-target="#bookstyle" onclick="open_services(' +obj.data[i].ServiceID+ ');">Book</a>' +
                        '</div>' +
                        '</div>';
                    }
                    if(html) {
                        $(".servicelist").html(html);
                        // var pagee = "";
                        // var count = obj.total / 4;
                        // if(count > 1) {
                        //     for (var i = 0; i < count ; i++) {
                        //         var activecheck = "";
                        //         if(i == page) {
                        //             activecheck = "activepage";
                        //         }
                        //         pagee = pagee + '<a href="javascript:void();" class="pagebox '+activecheck+'" onclick="get_services('+i+');">'+(i + 1)+'</a>';
                        //     }
                        //     $(".servicepage").html(pagee);
                        // }

                    }else{
                        // $(".servicelist").html("<br/><h2>No record Found!</h2><br/>");
                    }
                }else{
                    // $(".servicelist").html("<br/><h2>No record Found!</h2><br/>");
                }

            },
            complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
            }
        });
}
function open_services (id) {
    $("#bookappoinment #id").val(id);
    $.ajax({
        type: "POST",
        url: '<?php echo base_url("search/getServices/"); ?>0',
        data:{id : id},
        beforeSend: function(){
            $('.ajax-loader').css("visibility", "visible");
        },
        success: function (response) {
            var obj = JSON.parse(response);
            var html = "";
            for (var i = 0; i < obj.data.length; i++) {
                $(".booking-modal .description").html(obj.data[i].Description);
                $(".booking-modal .search-person-name").html(obj.data[i].Title);
                $(".booking-modal .tags").html(obj.data[i].HasTag);

                $(".booking-modal .usernamebook").html(obj.data[i].StylistName);
                if(obj.data[i].Slug != "undefined" && obj.data[i].Slug) {
                    $(".booking-modal .usernamebook").attr("href",'<?php echo base_url(); ?>profile/'+obj.data[i].Slug.replace(" ", "-"));
                }else{
                    $(".booking-modal .usernamebook").attr("href",'<?php echo base_url(); ?>profile/'+obj.data[i].uid);
                }

                var t = 'July 21, 1983 ' + obj.data[i].ServiceTime;
                var d = new Date(t);
                var time = "";
                if(d.getHours() == 0) {
                    time = d.getMinutes() + "min";
                }else{
                    time = d.getHours() + "hr";
                }
                $(".booking-modal .price-info").html('$'+obj.data[i].Price + '/'+time);
                
                $(".booking-modal .img-responsive").attr('src','<?php echo base_url(); ?>'+obj.data[i].thumbnail+'');
                var services1 = "";
                if(obj.data[i].services != "undefined" && obj.data[i].services) {
                    for (var ii = 0; ii < obj.data[i].services.length; ii++) {
                        services1 = services1 + '<span><a href="javascript:void(0)" onclick=searchlook("ss-'+obj.data[i].services[ii].ServiceMasterID+'")>'+obj.data[i].services[ii].ServiceName+'</a></span>';
                    }
                }
                $(".booking-modal .tags-gallery-pic").html(services1);
            }
        },
        complete: function(){
            $('.ajax-loader').css("visibility", "hidden");
        }
    });
}

$("#bookappoinment").submit(function (e) {
    e.preventDefault();
    
    <?php
    if(empty($user)) {
        ?>
        $("#login-modal").modal('show');return false;
        <?php
    }
    ?>
    $.ajax({
        type: "POST",
        url: '<?php echo base_url("Appointment/add"); ?>',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        beforeSend: function(){
            $('.ajax-loader').css("visibility", "visible");
        },
        success: function (response) {
            var obj = JSON.parse(response);
            if(obj.status == "true") {
                $("#bookstyle").modal('hide');
                $("#bookappoinment")[0].reset();
                messageShow("Success!",obj.message,"green","Success");
                setTimeout(function() {
                    window.location.href="<?php echo base_url(); ?>appointment";
                },1500);
            }else{
                messageShow("Error!",obj.message,"red","Try-Again");
            }
        },
        complete: function() {
            $('.ajax-loader').css("visibility", "hidden");
        }
    });
});


getproffessionaldetail(1111111);
function getproffessionaldetail (idd) {
	$.ajax({
		type: "GET",
		url: '<?php echo base_url("profile/get_customer/").$userid;; ?>',
		beforeSend: function(){
			$('.ajax-loader').css("visibility", "visible");
		},
		success: function (response) {
			var obj = JSON.parse(response);
			console.log(obj);
			if(obj.status == "true") {
				$(".fa-phone").show();
				$(".CustomerName").html(obj.data.CustomerName);
				$(".MobileNo").html(obj.data.MobileNo);
				if(!obj.data.MobileNo) {
					$(".fa-phone").hide();
				}
				$(".Description").html(obj.data.Description);
				var slg = "";
				// if(obj.data.Slug) {
				// 	slg = slg + obj.data.Slug;
				// }
				if(obj.data.Description) {
					if(slg)
						slg=slg + "<br/>";
					slg = slg + obj.data.Description;
				}
				$(".Slug").html(slg);
				$(".EmailID").html(obj.data.EmailID);

				$(".instagram").show();$(".facebook").show();$(".twitter").show();
				if(obj.data.instagram) {
					$(".instagram").attr("href",obj.data.instagram);$(".instagram").show();
				}else{
					$(".instagram").hide();
				}
				if(obj.data.facebook) {
					$(".facebook").attr("href",obj.data.facebook);$(".facebook").show();
				}else{
					$(".facebook").hide();
				}
				if(obj.data.twitter) {
					$(".twitter").attr("href",obj.data.twitter);$(".twitter").show();
				}else{
					$(".twitter").hide();
				}

				if(obj.data.ProfilePic != "undefined" && obj.data.ProfilePic) {
					if(obj.data.ProfilePic.includes("https://") == true || obj.data.ProfilePic.includes("http://") == true ) {
						$(".ProfilePic").attr('src',obj.data.ProfilePic);
					}else{
						$(".ProfilePic").attr('src','<?php echo base_url(); ?>'+obj.data.ProfilePic);
					}
				}else{
					$(".ProfilePic").attr('src','<?php echo base_url(); ?>images/profile/Blank-Profile-Icon.jpg');
				}
			}else{
				messageShow("Error!",obj.message,"red","Try-Again");
			}            
		},
		complete: function(){
			$('.ajax-loader').css("visibility", "hidden");
		}
	});
}
</script>
<script>
    var placeSearch, autocomplete;

    var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
    };

    function initAutocomplete() {
        autocomplete = new google.maps.places.Autocomplete(
          document.getElementById('autocomplete'), {types: ['geocode']});

        autocomplete.setComponentRestrictions(
            {'country': ['us']}
            );
        autocomplete.setFields(['address_component','geometry']);

        autocomplete.addListener('place_changed', geolocate);
    }

    function geolocate() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var geolocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                $("#lat").val(autocomplete.getPlace().geometry.location.lat());
                $("#lang").val(autocomplete.getPlace().geometry.location.lng());
                var circle = new google.maps.Circle(
                  {center: geolocation, radius: position.coords.accuracy});
                autocomplete.setBounds(circle.getBounds());
            });
        }
    }
    <?php
    if(!empty($stylist[0]->City)) {
        ?>
        $("#choose-city").val('<?php echo $stylist[0]->City; ?>');
        <?php
    }
    ?>


    var date = new Date();
    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    $('#calendar').datepicker({
        format: "yyyy-mm-dd",
        todayHighlight: true,
        startDate: today
    });
    $("#specialities input[type='checkbox']").attr("disabled","disabled");
    $("#availability-form input[type='checkbox']").attr("disabled","disabled");
    $("#availability-form select").attr("disabled","disabled");
</script>
<style type="text/css">
	.datepicker-inline{ width: 98%; }
	.datepicker-inline table { width: 100%; }
	.datepicker-inline table { height: 270px;}
	.datepicker-inline table .active{ background: #000 !important; }
	.datepicker-inline table .day:hover{ background: #000 !important;color: white !important; }
	/*.datepicker-inline table .cw{ display: none; }*/
    .datepicker-inline table .datepicker-switch,.datepicker-inline table .prev,.datepicker-inline table .next { font-size: 18px;padding: 20px 0; }
    .datepicker-switch { width:100%; }
    /*.booking-modal .img-center img{ height: 100%; }*/
</style>

<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBn2YECUFur6jWWVyqyGzLvuw3JdzjNUxw&libraries=places&callback=initAutocomplete" async defer></script> -->
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8pf6ZdFQj5qw7rc_HSGrhUwQKfIe9ICw&libraries=places&callback=initAutocomplete" async defer></script> -->