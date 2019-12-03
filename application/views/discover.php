<div class="main-map-search profile-map">
    <section class="discover-page-bg">
        <!--slider datalist-->
        <div class="container">
            <div class="slider-inside">
                <!-- <div class="top-options">
                    <form id="filter_form">
                        <div class="row">
                            <div class="col-md-9 col-sm-12">
                                <div class="slider-buttons inner-top-search clearfix">
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5 col-xs-12">
                                            <span class="silder-button-box input1">
                                                <input type="text" placeholder="Search style, stylist, or salon" id="filter_box"/>
                                            </span>
                                        </div>
                                        <div class="col-md-5 col-sm-5 col-xs-12">
                                            <span class="silder-button-box">
                                                <input type="text" placeholder="Zip code or city"  id="filter_zc"/>
                                            </span>
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-12">
                                            <div class="silder-siiting-icon">
                                                <div class="dropdown">
                                                    <img src="<?php echo $this->config->item('assets'); ?>img/filters_icon.svg" alt="" class="filter-hm-icon filter-icon" data-toggle="modal" data-target="#searchFilter" href="#"/>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <a href="javascript:void(0);" class="filter_record">
                                    <span class="silder-search-box">
                                        Search
                                    </span>
                                </a>
                            </div>
                        </div>
                    </form>
                </div> -->
                <div class="top-options">
                    <form id="discover_filter_form">
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
                                <div class="slider-buttons inner-top-search clearfix">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <span class="silder-button-box input1">
                                                <!-- <input type="text" placeholder="Find stylist and salons near you. Track hair journeys" id="filter_box" name="filter_box"/> -->
                                                <input type="text" placeholder="Search hair styles" id="filter_box" name="filter_box"/>
                                            </span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <a href="javascript:void(0);" class="discover_filter_form">
                                    <span class="silder-search-box">
                                        Search
                                    </span>
                                </a>
                            </div>
                            <div class="col-md-1 col-sm-1">
                            <a href="javascript:void(0);" onclick="$('#discover_filter_form')[0].reset();$('.discover_filter_form').click();"><i class="fa fa-repeat filter-hm-icon" style="font-size:25px;color:black;margin-top:27px;"></i></a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="top-options">
                    <div class="row">
                        <div class="slider-buttons inner-top-search clearfix">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <span>
                                        <input type="text" placeholder="Search user" id="user_box" name="filter_box">
                                        <ul id="user_drop_down" class="typeahead dropdown-menu">
                                            
                                        </ul>
                                    </span>
                                </div>
                            </div>                              
                        </div>    
                    </div>   
                </div>
            </div>
        </div>
        <!--slider datalist complete-->
    </section>
    <!--slider complete-->

    <section class="container">
        <div class="row discoverpage">

        </div>
        <nav aria-label="Page navigation" class="text-center">
            <ul id="pagination-demo" class="pagination-lg pull-right"></ul>  
        </nav>
    </section>
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
                        <div class="col-md-5">
                            <div class="gallery-view-detail">
                                <div class="row">
                                    <div class="col-md-3 col-sm-3 col-xs-3">
                                        <a href="javascript:void(0);" class="namepopuserlink">
                                            <img src="<?php echo $this->config->item('assets'); ?>img/client-profile-pic.jpg" class="gallery-view-profile-pic userpicpop" alt="">
                                        </a>
                                    </div>
                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                        <span class="user-profile-name"><a href="#" class="namepopuser"></a></span> <br>
                                    </div>
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
                                        <form id="comment_form">
                                            <input type="hidden" name="id" id="id">
                                            <div class="add-comment">
                                                <textarea cols="" name="message" rows="" placeholder="Add your comment..." required></textarea>
                                                <input type="submit" value="POST" style="background:black;color:white;border:none;padding:5px 20px;float:right;">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo $this->config->item('assets'); ?>js/typeahead.js"></script>
    <style type="text/css">.jumbotron{background: none;}</style>
    <script type="text/javascript">
        get_discover(0);
        function get_discover (page) {
            $.ajax({
                type: "GET",
                url: '<?php echo base_url("Discover/getDiscover"); ?>',
                beforeSend: function(){
                    $('.ajax-loader').css("visibility", "visible");
                },
                success: function (response) {
                    var obj = JSON.parse(response);
                    var j = 1;
                    var html = '<div class="jumbotron page" id="page'+j+'">';
                    if(obj.data != "undefined" && obj.data) {
                        for (var i = 0; i < obj.data.length; i++) {
                            if( i != 0 && i  % 20 == 0) {
                                j = j + 1;
                                html =  html = html + '</div><div class="jumbotron page" id="page'+j+'">';
                            }
                            html = html + '<div class="col-md-3 col-sm-3 col-xs-6">' +
                            '<div class="discover-profile-box">' +
                            '<div class="profile-pic-map">' +
                            '<a href="#" class="view-profile-galler" onclick="getdetail('+obj.data[i].GalleryID+')"><img src="<?php echo base_url(); ?>'+obj.data[i].Image+'" class="img-responsive" alt="" style="height:250px;width:100%;"></a>' +
                            '<a class="discover-fav disfav-'+obj.data[i].GalleryID+'" onclick="likedislike('+obj.data[i].GalleryID+');">';
                            if(obj.data[i].ldl == 1) {
                                html = html + '<i class="fa fa-heart" aria-hidden="true"></i>';
                            }else {
                                html = html + '<i class="fa fa-heart-o" aria-hidden="true"></i>';
                            }
                            html = html + '</a>' +
                            '</div>' +
                            '</div>'+
                            '</div>';
                        }
                        if(html) {
                            $(".discoverpage").html("</div>" + html);
                            paginations();
                        }
                    }

                },
                complete: function(){
                    $('.ajax-loader').css("visibility", "hidden");
                }
            });
}
function getdetail (id) {
    $("#comment_form #id").val(id);
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
                if(obj.data.Slug != "undefined" && obj.data.Slug) {
                    $(".namepopuser").attr("href",'<?php echo base_url(); ?>profile/'+obj.data.Slug.replace(" ", "-"));
                    $(".namepopuserlink").attr("href",'<?php echo base_url(); ?>profile/'+obj.data.Slug.replace(" ", "-"));
                }else{
                    $(".namepopuser").attr("href",'<?php echo base_url(); ?>profile/'+obj.data.uid);
                    $(".namepopuserlink").attr("href",'<?php echo base_url(); ?>profile/'+obj.data.uid);
                }
                if(obj.data.ProfilePic != "undefined" && obj.data.ProfilePic) {
                    $(".userpicpop").attr('src','<?php echo base_url(); ?>'+obj.data.ProfilePic);
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
function paginations() {
    $('#pagination-demo').twbsPagination({
        totalPages: <?php echo ceil($total/20); ?>,
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
            $('#page'+page).addClass('page-active');
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
                    $(".disfav-"+id+"").html('<i class="fa fa-heart" aria-hidden="true"></i>');
                }else{
                    $(".disfav-"+id+"").html('<i class="fa fa-heart-o" aria-hidden="true"></i>');
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

$("#comment_form").submit(function(e) {
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
        url: '<?php echo base_url("Discover/addComment"); ?>',
        data: $(this).serialize(),
        beforeSend: function(){
            $('.ajax-loader').css("visibility", "visible");
        },
        success: function (response) {
            var obj = JSON.parse(response);
            if(obj.status == "true") {
                getdetail($("#comment_form #id").val());
                messageShow("Success!",obj.message,"green","Success");
            }else{
                messageShow("Error!",obj.message,"red","Try-Again");
            }            
        },
        complete: function(){
            $('.ajax-loader').css("visibility", "hidden");
        }
    });
});

$(document).ready(function() {
    $('#user_box').keyup(function(){
        $('#user_drop_down').empty();
        $('#user_drop_down').hide();
        var val = $(this).val();
        var html = '';
        if( $(this).val() != '' ) {
            $.ajax({
                url: "<?php echo base_url(); ?>Discover/getUser",
                data: 'query=' + val,            
                dataType: "json",
                type: "POST",
                success: function(data) {
                    $.map(data, function(item) {
                        html += '<li><a href="'+item.url+'">'+item.name+'</a></li>';
                    })
                    $('#user_drop_down').append(html);
                    if(html != ''){
                        $('#user_drop_down').show();
                    }
                }
            })
        }else{
            $('#user_drop_down').hide();
        }
    });
});
</script>

<style type="text/css">
    @media screen and (min-width: 768px){
        .container .jumbotron, .container-fluid .jumbotron {
            padding-right: 0px; 
            padding-left: 0px; 
        }
    }
</style>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.twbsPagination.js'); ?>"></script>