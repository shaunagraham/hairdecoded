<?php
$data['hair_length'] = $this->common_model->get('sshd_hairlength',array("status"=>1));
        // print_r($data);
?>
<section class="slider">
    <!--slider datalist-->
    <div class="container">
        <div class="slider-inside">
            <!--<div class="top-options">-->
            <div>
                <div class="slide-text">
                    <h1>Find A Hair Professional</h1>
                </div>
                <div class="search-filter-hm">
                    <form id="filter_form">
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <input type="text" placeholder="Search style, stylist, or salon " id="filter_box" />
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <input type="text" placeholder="Zip code or city" id="filter_zc" />
                            </div>
                            <div class="col-md-1 col-sm-1">
                                <img src="<?php echo $this->config->item('assets'); ?>img/filters_icon.svg" alt="" class="filter-hm-icon filter-icon" data-toggle="modal" data-target="#searchFilter" href="#"/>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <input type="button" value="Search" class="blk-btn filter_record">
                            </div>
                            <div class="col-md-1 col-sm-1">
                                <a href="javascript:void(0);" onclick="$('#filter_form')[0].reset();$('#filter_record')[0].reset();"><i class="fa fa-repeat filter-hm-icon" style="font-size:25px;color:black;"></i></a>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- <br/><br/>
                <div class="search-filter-hm">
                    <form id="discover_filter_form">
                        <div class="row">
                            <div class="col-md-9 col-sm-12">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" placeholder="Find stylist and salons near you. Track hair journeys" id="filter_box" name="filter_box"/>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <input type="button" value="Search" class="blk-btn discover_filter_form">
                            </div>
                        </div>
                    </form>
                </div> -->
            </div>
        </div>
    </div>
    <!--slider datalist complete-->
</section>
<!--slider complete-->

<!--Company-brand logos-->
<section class="company-brands">
    <div class="container">
        <div id="owl-demo1" class="owl-carousel owl-theme">
            <div class="item">
                <div class="col-sm-2 col-sm-2 col-md-3">
                    <span class="brand1">
                        <img src="<?php echo $this->config->item('assets'); ?>img/naturallycurly.png" alt="" class="img-responsive">
                    </span>
                </div>
            </div>
            <div class="item">
                <div class="col-sm-2 col-sm-2 col-md-3">
                    <span class="brand1">
                        <img src="<?php echo $this->config->item('assets'); ?>img/talkingtexture-tag.png" alt="" class="img-responsive">
                    </span>
                </div>
            </div>
            <div class="item">
                <div class="col-sm-2 col-sm-2 col-md-3">
                    <span class="brand1">
                        <img src="<?php echo $this->config->item('assets'); ?>img/bustle.png" alt="" class="img-responsive">
                    </span>
                </div>
            </div>
            <div class="item">
                <div class="col-sm-2 col-sm-2 col-md-3">
                    <span class="brand1">
                        <img src="<?php echo $this->config->item('assets'); ?>img/Curls-Understood-LOGO-2015-x.png" alt="" class="img-responsive">
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Company-brand logos-complete-->

<!--products-design start-->
<section class="hair-decoded-sliders">
    <form id="filter_records">
        <div id="owl-demo2" class="owl-carousel owl-theme">
            <!--1 design-->
            <div class="item">
                <div class="first-item">
                    <div class="first-look-image">
                        <img src="<?php echo $this->config->item('assets'); ?>img/look11.jpg" alt="">
                    </div>
                    <div class="brand-name-box">
                        <h5>Weaves</h5>
                        <p><a href="javascript:void(0);" onclick="searchlook('ht-4','ss-4','Weaves');">GET THE LOOK</a></p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="first-item">
                    <div class="first-look-image">
                        <img src="<?php echo $this->config->item('assets'); ?>img/look9.jpg" alt="">
                    </div>
                    <div class="brand-name-box">
                        <h5>Blonde</h5>
                        <p><a href="javascript:void(0);" onclick="searchlook('hc-1','','Blonde');">GET THE LOOK</a></p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="first-item">
                    <div class="first-look-image">
                        <img src="<?php echo $this->config->item('assets'); ?>img/look7.jpg" alt="">
                    </div>
                    <div class="brand-name-box">
                        <h5>Hair Cuts</h5>
                        <p><a href="javascript:void(0);" onclick="searchlook('ss-3','','Hair Cuts');">GET THE LOOK</a></p>
                    </div>
                </div>
            </div>
            <!--2 design-->
            <div class="item">
                <div class="first-item">
                    <div class="first-look-image">
                        <img src="<?php echo $this->config->item('assets'); ?>img/curly-hairs.jpg" alt="" >
                    </div>
                    <div class="brand-name-box">
                        <h5>Curly Hair</h5>
                        <p><a href="javascript:void(0);" onclick="searchlook('ht-2','','Curly Hair');">GET THE LOOK</a></p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="first-item">
                    <div class="first-look-image">
                        <img src="<?php echo $this->config->item('assets'); ?>img/dreadlocks.jpg" alt="" >
                    </div>
                    <div class="brand-name-box">
                        <h5>Dreads</h5>
                        <p><a href="javascript:void(0);" onclick="searchlook('ss-12','','Dreads');">GET THE LOOK</a></p>
                    </div>
                </div>
            </div>
            <!--3 design-->
            <div class="item">
                <div class="first-item">
                    <div class="first-look-image">
                        <img src="<?php echo $this->config->item('assets'); ?>img/look10.jpg" alt="">
                    </div>
                    <div class="brand-name-box">
                        <h5>Ombre</h5>
                        <p><a href="javascript:void(0);" onclick="searchlook('hc-5','','Ombre');">GET THE LOOK</a></p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="first-item">
                    <div class="first-look-image">
                        <img src="<?php echo $this->config->item('assets'); ?>img/braids.jpg" alt="">
                    </div>
                    <div class="brand-name-box">
                        <h5>Braids</h5>
                        <p><a href="javascript:void(0);" onclick="searchlook('ss-5','','Braids');">GET THE LOOK</a></p>
                    </div>
                </div>
            </div>
            <!--4 design-->
            <div class="item">
                <div class="first-item">
                    <div class="first-look-image">
                        <img src="<?php echo $this->config->item('assets'); ?>img/look8.jpg" alt="">
                    </div>
                    <div class="brand-name-box">
                        <h5>Hair Cuts</h5>
                        <p><a href="javascript:void(0);" onclick="searchlook('ss-3','','Hair Cuts');">GET THE LOOK</a></p>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="text-center"><a href="<?php echo base_url("search"); ?>"><button>BROWSE ALL LOOKS</button></a></div>
</section>
<!--products-design complete-->

<div class="seprator"></div>

<!--2 slider-start-->
<div class="no-cantainer">
    <section class="slider-2-banner text-center">
        <div class="banner-image-bg">
            <h4>FIND YOUR HAIR STYLIST</h4>
            <div class="banner-image-content">
                Hair Decoded is a hair discovery booking platform that allows you to easily find hair stylists, salons, and barbers geo-location.
            </div>
            <img src="<?php echo $this->config->item('assets'); ?>img/Hire-slide2.jpg" alt="">
        </div>
        <a href="<?php echo base_url("search"); ?>">
            <div class="btnn-book-now">START SEARCHING</div>
        </a>
    </section>
</div>
<!--3 slider-start-->

<!--blogs-start-->
<section class="blogs">
    <!--1 blog-->
    <div class="first-blog">
        <div class="container">
            <div class="row">

                <div class="col-sm-6 float-right">
                    <div class="blog-abouts1">

                    </div>
                    <div class="about-blog-image">
                        <img src="<?php echo $this->config->item('assets'); ?>img/blog1.jpg" alt="">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="defination-blog">
                        <h5>Start Your Business</h5>
                        <p>Hair Decoded is a free booking platform for beauty and barber services. Our easy approach allows your clients to see their style before booking it.
                        </p>
                        <div class="btns-links text-center">
                            <a href="<?php echo base_url("get-listed"); ?>"><button class="get-start active">GET LISTED</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--2 blog-->
    <div id="home" class="second-blog margin-btm-100 clearfix">


        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="blog-abouts2"> <img src="<?php echo $this->config->item('assets'); ?>img/blog3.png" class="img-responsive" alt="" style="height:auto;"></div>
                    <div class="about-blog-image2">

                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="defination-blog2">
                        <!--<h5>Mobile App Launching 2019</h5>-->
                        <h5>Mobile App Launching Soon</h5>
                        <p>Hair Decoded will be relaunching the IOS and Android version very soon.  Be the first to know. </p> 
                        <div class="btns-links text-center">
                            <a href="<?php echo base_url("about-us"); ?>"><button class="get-start active">LEARN MORE</button></a>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!--news-letter start-->
<section class="subscribe-newsletter">
    <div class="container">
        <div class="subscribe-text">
            <h5>Subscribe to our newsletter</h5>
            <div class="form">
                <form id="subscribedform">
                    <input type="email" name="email" placeholder="ENTER EMAIL" required>
                    <a href="javascript:void(0);">
                        <button type="submit" class="btnn-book-now">SUBSCRIBE</button>
                    </a>
                </form>
            </div>
        </div>
        <div class="subscribe-image">
            <img src="<?php echo $this->config->item('assets'); ?>img/subscribe1.png" alt="">
        </div>
    </div>
</section>
<style>
.carousel-inner>.item>a>img, .carousel-inner>.item>img, .img-responsive, .thumbnail a>img, .thumbnail>img { height: 63px; }
</style>