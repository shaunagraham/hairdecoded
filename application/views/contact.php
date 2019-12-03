<div class="main-contact-page">
    <!--slider start-->
    <section class="slider-home2">
        <div class="slider-inside container">
            <div class="slide-text">
                <h1>CONTACT US</h1>
            </div>
        </div>
    </section>
    <!--slider complete-->

    <!--news-letter 2 parts-->
    <section class="news-letter-form clearfix" id="news-letter-form">
        <!--part1-->
        <div class="col-sm-6">
            <div class="news-letter-1">
                <div class="form-header">
                    <h4>
                        WRITE TO US
                    </h4>
                </div>
                <div class="datails-form">
                    <form id="contactform">
                        <input type="text" name="name" placeholder="NAME" required/>
                        <input type="email" name="email" placeholder="EMAIL" required/>
                        <input type="text" name="subject" placeholder="SUBJECT" required/>
                        <textarea type="text" name="message" placeholder="MASSAGE" required></textarea>
                        <a><button type="submit">SEND</button></a>
                    </form>
                </div>
            </div>
        </div>
        <!--part2-->
        <div class="col-sm-6">
            <div class="news-letter-2">
                <div class="datails-form clearfix">
                    <h4>
                        subscribe to our newsletter
                    </h4>
                    <form id="subscribedform">
                        <input type="email" name="email" placeholder="ENTER EMAIL" required>
                        <a href="javascript:void(0);">
                            <button type="submit">SUBSCRIBE</button>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--newsletter full complete-->
    <!--instagram section start-->
    <section class="instagram-section">
        <div class="instagram-header">
            <h5>INSTAGRAM</h5>
        </div>
        <div class="instagram-main-section">
            <div id="owl-demo3" class="owl-carousel owl-theme">
                <?php
                $access_token="1175643629.1677ed0.ca948b5e6cfc441086c1ad60708e2c61";
                $photo_count=5;
                $json_link="https://api.instagram.com/v1/users/self/media/recent/?";
                $json_link.="access_token={$access_token}&count={$photo_count}";
                $json = file_get_contents($json_link);
                $obj = json_decode($json, true, 512, JSON_BIGINT_AS_STRING);
                foreach ($obj['data'] as $post) { 
                    $pic_text=$post['caption']['text'];
                    $pic_link=$post['link'];
                    $pic_like_count=$post['likes']['count'];
                    $pic_comment_count=$post['comments']['count'];
                    $pic_src=str_replace("http://", "https://", $post['images']['standard_resolution']['url']);
                    $pic_created_time=date("F j, Y", $post['created_time']);
                    $pic_created_time=date("F j, Y", strtotime($pic_created_time . " +1 days"));
                    echo '<div class="item">';
                        echo "<a href='{$pic_link}'>";
                            echo '<div class="instagram-image1 image-height">';
                                echo "<img src='{$pic_src}' style='height:255px;width:216px;' alt=''/>";
                            echo '</div>';
                        echo '</a>';
                    echo '</div>';
                }
            ?>
            </div>
            <div class="instagram-button">
                <a href="https://instagram.com/hairdecoded" target="_blank">
                    <div class="insta-explore-more">Follow Us</div>
                </a>
            </div>
        </div>
        <!--instagram-explore button-->

    </section>
    <!--instagram-section-complete-->
</div>
<script>
    $("#contactform").submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: '<?php echo base_url("contact/sentmessage"); ?>',
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
                    $("#contactform")[0].reset();
                    messageShow("Success!",obj.message,"green","Success");
                }else{
                    messageShow("Error!",obj.message,"red","Try-Again");
                }
            },
            complete: function() {
                $('.ajax-loader').css("visibility", "hidden");
            }
        });
    });

        /*var token11 = '1175643629.1677ed0.ca948b5e6cfc441086c1ad60708e2c61'; // learn how to obtain it below
        // var token11 = '1982953273.8920e2b.026f22ada636441c815c2fb4d4722c80'; // learn how to obtain it below
        var userid = 17427417388;// User ID - get it in source HTML of your Instagram profile or look at the next example :)
        var num_photos = 5; */// how much photos do you want to get

        /*$.ajax({
            url: 'https://api.instagram.com/v1/users/self/media/recent/', // or /users/self/media/recent for Sandbox
            dataType: 'jsonp',
            type: 'GET',
            data: {access_token: token11, count: num_photos},
            success: function(data){
                //console.log(data);
                var html = "";
                for( x in data.data ){
                    html = html + '<div class="item"><a href="'+data.data[x].link+'" target="_blank"><div class="instagram-image4 image-height"><img src="'+data.data[x].images.low_resolution.url+'" style="height:255px;width:216px;" alt=""/></div></a></div>';
                    // $('ul').append('<li><img src="'+data.data[x].images.low_resolution.url+'"></li>'); // data.data[x].images.low_resolution.url - URL of image, 306х306
                    // data.data[x].images.thumbnail.url - URL of image 150х150
                    // data.data[x].images.standard_resolution.url - URL of image 612х612
                    // data.data[x].link - Instagram post URL 
                }
                $("#owl-demo3").html(html);
            },
            error: function(data){
            // console.log(data); // send the error notifications to console
        }
    });*/
</script>