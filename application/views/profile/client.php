<div class="navbg-gry"></div>
<div class="container">
    <section id="hair-pro">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="profile-pro-img">
                    <img src="<?php if(!empty($stylist[0]->ProfilePic)) { echo base_url().$stylist[0]->ProfilePic; }else{ echo base_url().'images/profile/Blank-Profile-Icon.jpg'; } ?>" class="img-responsive ProfilePic" alt="" style="width:100%;height:250px;object-fit: cover;">

                    <input type="file" name="ProfilePic" id="ProfilePic" style="display:none;">

                    <div class="pic-upload-icon"><a href="javascript:void(0);" onclick="$('#ProfilePic').click();"><i class="fa fa-camera" aria-hidden="true"></i></a></div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="client-detail-profile clearfix">
                    <div class="name pull-left CustomerName"></div>
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
            <div class="col-md-5 col-sm-5 col-xs-12 text-right text-center-sm">
                <a href="javascript:void(0);" onclick="getcustomerdetail();" class="edit-profile white-btn"><i class="fa fa-pencil" aria-hidden="true"></i> Edit Profile</a>
            </div>
        </div>
        <div class="tab-section">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#gallery" aria-controls="gallery" role="tab" data-toggle="tab">GALLERY</a></li>
                <li role="presentation"><a href="#favorites" aria-controls="favorites" role="tab" data-toggle="tab">FAVORITES</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="gallery">
                    <div class="row no-margin">
                        <?php
                        if(empty($gallery)) { 
                            echo '<div class="add-services-link"><a href="#"  data-toggle="modal" data-target="#upload-photo"><div class="add-services-icon"><img src="<?php echo $this->config->item(\'assets\'); ?>img/plus.png" alt=""></div> <div class="add-services-text">Upload Photo</div></a></div>'; 
                        }
                        foreach ($gallery as $value) {
                            ?>
                            <div class="col-md-2 col-sm-3 col-xs-6 gallery-padding">
                                <div class="gallery-img-client">
                                    <div class="gallery-opt-links1">
                                        <a href="javascript:void(0);" class="view-profile-galler" onclick="getdetail(<?php echo $value->GalleryID; ?>);"><i class="fa fa-eye" aria-hidden="true"></i></a> 
                                    </div>
                                    <div class="gallery-opt-links">
                                        <a href="javascript:void(0);" class="view-profile-galler" onclick="$('#confirm-modal1').modal('show');$('#confirm-modal1 .deleteservice').attr('onclick','deletePhoto(<?php echo $value->GalleryID; ?>);');"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                    </div>
                                    <img src="<?php echo base_url().$value->Image; ?>" alt="" class="img-responsive" style="width:100%;">
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="favorites">
                    <div class="row no-margin">
                        <?php
                        if(empty($Favgallery)) { echo "<h2 align='center'>No favorites found...!</h2>"; }
                        foreach ($Favgallery as $value) {
                            ?>
                            <div class="col-md-2 col-sm-3 col-xs-6 gallery-padding">
                                <div class="gallery-img-client">
                                    <div class="fav-heart disfav-<?php echo $value->GalleryID; ?>"  onclick="likedislike(<?php echo $value->GalleryID; ?>);"></div>
                                    <div class="fav-opt-links">
                                        <!-- <div class="rate">$750</div> -->
                                        <!-- <a href="javascript:void(0);" class="white-btn" data-toggle="modal" data-target="#bookstyle">Book Style</a> <a href="javascript:void(0);" class="white-btn" data-toggle="modal" data-target="#messagePopup"><i class="fa fa-commenting-o" aria-hidden="true"></i></a> -->
                                    </div>
                                    <img src="<?php echo base_url().$value->Image; ?>" alt="" class="img-responsive" style="width:100%;">
                                </div>
                            </div>
                            <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>


    </section>
</div>

<div class="modal fade confirm-modal" id="confirm-modal1" tabindex="-1" role="dialog" aria-labelledby="compose-modalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body nopadding">
                <div class="modal-wrap pad-b-20">
                    <div class="close-btn"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
                    <h2 class="btmline">Confimation</h2>
                    <p class="text-center">Are you sure you want to cancel?</p>
                    <div class="text-center">
                        <input type="submit" class="blk-btn deleteservice" value="Yes"> <input type="submit" class="white-btn" value="No" data-dismiss="modal" aria-label="Close">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bookstyle" id="bookstyle" tabindex="-1" role="dialog" aria-labelledby="bookStyleLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body nopadding">
                <div class="close-btn visible-xs"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
                <div class="row">
                    <div class="col-md-5 col-sm-5 col-xs-12">
                        <div class="booking-modal">
                            <!--<h2>Caroline Bukovski</h2>-->


                            <span class="img-center"><img src="<?php echo $this->config->item('assets'); ?>img/map-search-img1.jpg" class="img-responsive" alt=""></span>
                            <div class="search-person-name">Caroline Bukovski</div>
                            <div class="pad-20"><div class="modal-price-info clearfix"><span class="style-info pull-left"><a href="javascript:void(0);">Dreads Lock</a></span> <span class="price-info pull-right">$750/Hr</span></div>

                            <div class="tags-gallery-pic"><span>red</span> <span>short</span> <span>weave</span> <span>extension</span></div>


                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam iaculis orci ac metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam iaculis orci ac metus
                                consectetur adipiscing elit. Nam iaculis orci ac metus</p>
                            </div>


                        </div>
                    </div>
                    <div class="col-md-7 col-sm-6 col-xs-12 ">
                        <div class="calend-contain">
                            <div class="close-btn visible-lg visible-md visible-sm"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>

                            <div class="calendar">
                                <div class="month clearfix">
                                    <a class="arrow-left pull-left"></a>
                                    <a class="monthyear pull-left">June 2018</a>
                                    <a class="arrow-right pull-left"></a>
                                </div>
                                <div class="weeks">
                                    <ul class="clearfix">
                                        <li>MON</li>
                                        <li class="select">TUE</li>
                                        <li>WED</li>
                                        <li>THU</li>
                                        <li>FRI</li>
                                        <li>SAT</li>
                                        <li>SUN</li>                                            
                                    </ul>
                                </div>
                                <div class="dates">
                                    <ul class="clearfix">
                                        <li><a href="javascript:void(0);" class="offday">29</a></li>
                                        <li><a href="javascript:void(0);" class="offday">30</a></li>
                                        <li><a href="javascript:void(0);" class="offday">31</a></li>
                                        <li><a href="javascript:void(0);">1</a></li>
                                        <li><a href="javascript:void(0);">2</a></li>
                                        <li><a href="javascript:void(0);">3</a></li>
                                        <li><a href="javascript:void(0);">4</a></li>
                                        <li><a href="javascript:void(0);">5</a></li>
                                        <li><a href="javascript:void(0);" class="select">6</a></li>
                                        <li><a href="javascript:void(0);">7</a></li>
                                        <li><a href="javascript:void(0);">8</a></li>
                                        <li><a href="javascript:void(0);">9</a></li>
                                        <li><a href="javascript:void(0);">10</a></li>
                                        <li><a href="javascript:void(0);">11</a></li>
                                        <li><a href="javascript:void(0);">12</a></li>
                                        <li><a href="javascript:void(0);">13</a></li>
                                        <li><a href="javascript:void(0);">14</a></li>
                                        <li><a href="javascript:void(0);" class="offday">15</a></li>
                                        <li><a href="javascript:void(0);" class="offday">16</a></li>
                                        <li><a href="javascript:void(0);">17</a></li>
                                        <li><a href="javascript:void(0);">18</a></li>
                                        <li><a href="javascript:void(0);">19</a></li>
                                        <li><a href="javascript:void(0);">20</a></li>
                                        <li><a href="javascript:void(0);">21</a></li>
                                        <li><a href="javascript:void(0);">22</a></li>
                                        <li><a href="javascript:void(0);">23</a></li>
                                        <li><a href="javascript:void(0);">24</a></li>
                                        <li><a href="javascript:void(0);">25</a></li>
                                        <li><a href="javascript:void(0);">26</a></li>
                                        <li><a href="javascript:void(0);">27</a></li>
                                        <li><a href="javascript:void(0);">28</a></li>
                                        <li><a href="javascript:void(0);">29</a></li>
                                        <li><a href="javascript:void(0);">30</a></li>
                                        <li><a href="javascript:void(0);">31</a></li>
                                        <li><a href="javascript:void(0);">1</a></li>
                                    </ul>
                                </div>

                                <div class="select-time">
                                    <div class="select-side">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    </div>
                                    <select class="form-control" id="choose-time">
                                        <option selected>Choose Time</option>
                                    </select>
                                </div>

                                <div class="bookstyle-form-btn text-center">
                                    <input type="submit" value="Book" class="btn blk-btn"> &nbsp; <a href="javascript:void(0);"  data-dismiss="modal" aria-label="Close" class="btn white-btn">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<div class="modal fade" id="profile-modal" tabindex="-1" role="dialog" aria-labelledby="profile-modalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body nopadding">
                <div class="modal-wrap">
                    <div class="close-btn"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
                    <h2>Edit Profile</h2>
                    <form  name="profile_form" id="profile_form">
                        <div class="form-group">
                            <input type="text" name="CustomerName" class="form-control inputfield" id="CustomerName" placeholder="Your Name" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="MobileNo" class="form-control inputfield" id="MobileNo" placeholder="Mobile No">
                        </div>
                        <div class="form-group">
                            <input type="text" name="Slug" class="form-control inputfield" id="Slug" placeholder="Slugs" required>
                            <span class="errorslug"></span>
                        </div>
                        <div class="form-group">
                            <textarea  name="Description" class="form-control textareafield" id="Description" placeholder="About Me"></textarea>
                        </div>
                        <div class="form-group col-sm-12" style="padding-left:0px;padding-right:0px">
                            <div class="col-sm-4" style="height:50px;padding-top:14px;padding-left:0px;padding-right:0px;">User Type</div>
                            <div class="col-sm-8" style="padding-left:0px;padding-right:0px;">
                                <select name="usertype" id="usertype" required class="form-control selectpicker">
                                    <option selected value="professional">Professional</option>
                                    <option value="client">Client</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-12" style="padding-left:0px;padding-right:0px">
                            <div class="col-sm-4" style="height:50px;padding-top:14px;padding-left:0px;padding-right:0px;">https://instagram.com/</div>
                            <div class="col-sm-8" style="padding-left:0px;padding-right:0px;">
                                <input type="text" name="instagram" class="form-control inputfield" id="instagram" placeholder="Your Name">
                            </div>
                        </div>
                        <div class="form-group col-sm-12" style="padding-left:0px;padding-right:0px">
                            <div class="col-sm-4" style="height:50px;padding-top:14px;padding-left:0px;padding-right:0px;">https://facebook.com/</div>
                            <div class="col-sm-8" style="padding-left:0px;padding-right:0px;">
                                <input type="text" name="facebook" class="form-control inputfield" id="facebook" placeholder="Your Name">
                            </div>
                        </div>
                        <div class="form-group col-sm-12" style="padding-left:0px;padding-right:0px">
                            <div class="col-sm-4" style="height:50px;padding-top:14px;padding-left:0px;padding-right:0px;">https://twitter.com/</div>
                            <div class="col-sm-8" style="padding-left:0px;padding-right:0px;">
                                <input type="text" name="twitter" class="form-control inputfield" id="twitter" placeholder="Your Name">
                            </div>
                        </div>
                        <div class="login-btns clearfix">
                            <input type="submit" class="blk-btn pull-left" value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade gallery-popup" id="gallery-popup" tabindex="-1" role="dialog" aria-labelledby="uploadPhotoLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="close-btn"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
                <div class="row">
                    <div class="col-md-7">
                        <div class="client-img-view text-center">
                            <img src="<?php echo $this->config->item('assets'); ?>img/image-view.jpg" class="img-responsive disimage" alt="" style="width:100%;height:100%;">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="gallery-view-detail">
                            <div class="row">
                                <div class="col-md-3 col-sm-3 col-xs-3">
                                    <img src="<?php echo $this->config->item('assets'); ?>img/client-profile-pic.jpg" class="gallery-view-profile-pic userpicpop" alt="">
                                </div>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <span class="user-profile-name"><a href="javascript:void(0);" class="namepopuser"></a></span> <br>
                                </div>
                                
                                <script type="text/javascript">
                                    function fbs_click() {
                                        u=$('.disimage').attr('src');
                                        window.open('http://www.facebook.com/sharer.php?u='+u+'&picture='+u,'sharer');return false;
                                    }
                                    function twit_click() {
                                        u=$('.disimage').attr('src');
                                        window.open('https://twitter.com/intent/tweet?url='+u,'sharer');return false;
                                    }
                                    function linked_click() {
                                        u=$('.disimage').attr('src');
                                        window.open('http://www.linkedin.com/shareArticle?mini=true&url='+u,'sharer');return false;
                                    }
                                    function pinterest_click() {
                                        u=$('.disimage').attr('src');
                                        window.open('http://pinterest.com/pin/create/button/?url='+u+'&media='+u,'sharer');return false;
                                    }
                                </script>

                                <div class="col-xs-12 ">
                                    <div class="social-media-links">
                                        <!-- <a href="#" class="envelope-share"><i class="fa fa-envelope"></i></a> -->
                                        <a href="#" class="facebook-share" onclick="fbs_click()"><i class="fa fa-facebook"></i></a>
                                        <a href="#" class="twitter-share" onclick="twit_click()"><i class="fa fa-twitter"></i></a>
                                        <!-- <a href="#" class="instagram-share"><i class="fa fa-instagram"></i></a> -->
                                        <a href="#" class="linkedin-share" onclick="linked_click()"><i class="fa fa-linkedin"></i></a>
                                        <a href="#" class="printerest-share" onclick="pinterest_click()"><i class="fa fa-pinterest-p"></i></a>
                                    </div>
                                </div>
                                <div class="col-xs-12 discover-pop-ingo">
                                    <p class="gtitle"></p>
                                    <div class="seprator-line"></div>
                                </div>
                                <div class="col-xs-12">
                                    <ul class="discover-view-comments discmt">


                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade messagePopup" id="messagePopup" tabindex="-1" role="dialog" aria-labelledby="messagePopupLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <h2 class="btmline">Send Message</h2>
                <div class="close-btn"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="sender-name">To: Veronica Becham</div>
                        <div class="send-message">
                            <textarea cols="" rows="" placeholder="Please enter your message"></textarea>
                        </div>
                        <input type="submit" value="Send" class="blk-btn">
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    function getdetail (id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url("Discover/getDetail"); ?>',
            data: { id : id },
            beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
            },
            success: function (response) {
                var obj = JSON.parse(response);
                if(obj.status == "true") {
                    $("#gallery-popup").modal("show");
                    $(".disimage").attr('src','<?php echo base_url(); ?>'+obj.data.Image);
                    $(".namepopuser").html(obj.data.StylistName);
                    if(obj.data.ProfilePic != "undefined" && obj.data.ProfilePic) {
                        if(obj.data.ProfilePic.includes("https://") == true || obj.data.ProfilePic.includes("http://") == true ) {
                            $(".userpicpop").attr('src',obj.data.ProfilePic);
                        }else{
                            $(".userpicpop").attr('src','<?php echo base_url(); ?>'+obj.data.ProfilePic);
                        }
                    }else{
                        $(".userpicpop").attr('src','<?php echo base_url(); ?>images/profile/Blank-Profile-Icon.jpg');
                    }
                    $(".gtitle").html(obj.data.Title);
                    var html = "";
                    if(obj.fav != "undefined" && obj.fav) {
                        for (var i = 0; i < obj.fav.length; i++) {
                            html = html + '<li><span class="username-comment"><strong>'+obj.fav[i].name+'</strong> '+obj.fav[i].message+'</li>';
                        }
                    }
                    $(".discmt").html(html);
                }else{
                    messageShow("Error!",obj.message,"red","Try-Again");
                }            
            },
            complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
            }
        });
}

function likedislike(id){
    <?php
    if(empty($user)) {
        ?>
        $("#login-modal").modal('show');return false;
        <?php
    }
    ?>
    $.ajax({
        type: "GET",
        url: '<?php echo base_url("Discover/likeunlike/"); ?>'+id,
        beforeSend: function(){
            $('.ajax-loader').css("visibility", "visible");
        },
        success: function (response) {
            var obj = JSON.parse(response);
            if(obj.status == "true") {
                if(obj.like == 1){
                    $(".disfav-"+id+"").addClass('fav-heart-o');
                    $(".disfav-"+id+"").removeClass('fav-heart');
                }else{
                    $(".disfav-"+id+"").addClass('fav-heart');
                    $(".disfav-"+id+"").removeClass('fav-heart-o');
                }
                location.reload();
            }else{
                messageShow("Error!",obj.message,"red","Try-Again");
            }
        },
        complete: function(){
            $('.ajax-loader').css("visibility", "hidden");
        }
    });
}

function deletePhoto(id){
    <?php
    if(empty($user)) {
        ?>
        $("#login-modal").modal('show');return false;
        <?php
    }
    ?>
    $.ajax({
        type: "GET",
        url: '<?php echo base_url("Discover/deletePhoto/"); ?>'+id,
        beforeSend: function(){
            $('.ajax-loader').css("visibility", "visible");
        },
        success: function (response) {
            var obj = JSON.parse(response);
            if(obj.status == "true") {
                messageShow("Success!",obj.message,"green","Success");
                location.reload();
            }else{
                messageShow("Error!",obj.message,"red","Try-Again");
            }
            location.reload(); 
        },
        complete: function(){
            $('.ajax-loader').css("visibility", "hidden");
        }
    });
}
$("#ProfilePic").on('change',function () {
    if( $("#ProfilePic")[0].files.length >= 0) {

        var form_data = new FormData();
        for (var i = 0; i < $("#ProfilePic")[0].files.length; i++) {
            form_data.append('ProfilePic', $("#ProfilePic").prop('files')[i]);
        }
        $.ajax({
            type: "POST",
            url: '<?php echo base_url("Myprofile/clientProfilePic"); ?>',
            data: form_data,
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
            },
            success: function (response) {
                var obj = JSON.parse(response);
                if(obj.status == "true") {
                    $('.ProfilePic').attr('src',obj.image);
                    messageShow("Success!",obj.message,"green","Success");
                }else{
                    messageShow("Error!",obj.message,"red","Try-Again");
                }
            },
            complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
            }
        });
    }
});
$("#profile_form").submit(function (e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: '<?php echo base_url("Myprofile/clientProfile"); ?>',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        beforeSend: function(){
            $('.ajax-loader').css("visibility", "visible");
        },
        success: function (response) {
            var obj = JSON.parse(response);
            $("#Slug").css({"border":"1px solid #cccccc"});
            $(".errorslug").html("");
            if(obj.status == "true") {
                getcustomerdetail(1111111);
                messageShow("Success!",obj.message,"green","Success");
                $("#profile-modal").modal("hide");
                setTimeout(function () {
                    location.reload();
                }, 1500)
            }else{
                if(obj.ss != "undefined") {
                    $("#Slug").css({"border":"1px red solid"});
                    $(".errorslug").html(obj.message);
                }else{
                    messageShow("Error!",obj.message,"red","Try-Again");
                }
            }
        },
        complete: function(){
            $('.ajax-loader').css("visibility", "hidden");
        }
    });
});
getcustomerdetail(1111111);
function getcustomerdetail (idd) {
    $.ajax({
        type: "GET",
        url: '<?php echo base_url("Myprofile/get_customer"); ?>',
        beforeSend: function(){
            $('.ajax-loader').css("visibility", "visible");
        },
        success: function (response) {
            var obj = JSON.parse(response);
            if(obj.status == "true") {
                console.log(obj);
                if(idd != 1111111) {
                    $("#profile-modal").modal("show");
                }
                $(".fa-phone").show();
                $("#CustomerName").val(obj.data.CustomerName);
                $(".CustomerName").html(obj.data.CustomerName);
                $("#MobileNo").val(obj.data.MobileNo);
                $(".MobileNo").html(obj.data.MobileNo);
                if(!obj.data.MobileNo) {
                    $(".fa-phone").hide();
                }
                $("#Description").val(obj.data.Description);
                $(".Description").html(obj.data.Description);
                $("#Slug").val(obj.data.Slug);
                var slg = "";
                if(obj.data.Slug) {
                    slg = slg + obj.data.Slug;
                }
                if(obj.data.Description) {
                    if(slg)
                        slg=slg + "<br/>";
                    slg = slg + obj.data.Description;
                }
                $(".Slug").html(slg);
                $(".EmailID").html(obj.data.EmailID);
                $('#usertype [value='+obj.data.userType+']').attr('selected', 'true');
                $("#instagram").val(obj.data.instagram);
                $("#facebook").val(obj.data.facebook);
                $("#twitter").val(obj.data.twitter);
                if(obj.data.instagram) {
                    $(".instagram").attr("href","https://instagram.com/"+obj.data.instagram);$(".instagram").show();
                }else{
                    $(".instagram").hide();
                }
                if(obj.data.facebook) {
                    $(".facebook").attr("href","https://facebook.com/"+obj.data.facebook);$(".facebook").show();
                }else{
                    $(".facebook").hide();
                }
                if(obj.data.twitter) {
                    $(".twitter").attr("href","https://twitter.com/"+obj.data.twitter);$(".twitter").show();
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