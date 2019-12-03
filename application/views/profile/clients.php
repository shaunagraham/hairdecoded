<style>
    .gallery-img-client:hover .gallery-opt-links { top:10px; }
    .gallery-opt-links a { float:right; }
</style>
<div class="navbg-gry"></div>
<div class="container">
    <section id="hair-pro">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="profile-pro-img">
                    <img src="<?php if(!empty($stylist[0]->ProfilePic)) { echo base_url().$stylist[0]->ProfilePic; }else{ echo base_url().'images/profile/Blank-Profile-Icon.jpg'; } ?>" class="img-responsive ProfilePic" alt="" style="width:100%;height:250px;object-fit: cover;">
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
                    <a href="javascript:void(0);"><i class="fa fa-instagram" aria-hidden="true"></i></a> <a href="javascript:void(0);"><i class="fa fa-facebook-square" aria-hidden="true"></i></a> <a href="javascript:void(0);"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <div class="tab-section">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#gallery" aria-controls="gallery" role="tab" data-toggle="tab">GALLERY</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="gallery">
                    <div class="row no-margin">
                        <?php
                        if(empty($gallery)) { echo "<h2 align='center'>No gallery found...!</h2>"; }
                        foreach ($gallery as $value) {
                            ?>
                            <div class="col-md-2 col-sm-3 col-xs-6 gallery-padding">
                                <div class="gallery-img-client">
                                    <div class="gallery-opt-links">
                                        <a href="javascript:void(0);" class="view-profile-galler" onclick="getdetail(<?php echo $value->GalleryID; ?>);"><i class="fa fa-eye" aria-hidden="true"></i></a> 

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

getcustomerdetail(11);
function getcustomerdetail (idd) {
    $.ajax({
        type: "GET",
        url: "<?php echo base_url('profile/get_customer/').$userid; ?>",
        beforeSend: function(){
            $('.ajax-loader').css("visibility", "visible");
        },
        success: function (response) {
            var obj = JSON.parse(response);
            if(obj.status == "true") {
                console.log(obj);
                if(idd != 11) {
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
                // if(obj.data.Slug) {
                //     slg = slg + obj.data.Slug;
                // }
                if(obj.data.Description) {
                    if(!slg)
                        slg=slg + "<br/>";
                    slg = slg + obj.data.Description;
                }
                $(".Slug").html(slg);
                $(".EmailID").html(obj.data.EmailID);
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