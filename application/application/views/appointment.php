<div class="navbg-gry"></div>
<div class="container">
    <section class="appoinment-section">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="appointment-list">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs text-center" role="tablist">
                        <li role="presentation" class="active"><a href="#upcoming" aria-controls="upcoming" role="tab" data-toggle="tab">Upcoming</a></li>
                        <li role="presentation"><a href="#past" aria-controls="past" role="tab" data-toggle="tab">Past</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="upcoming">
                            <ul class="upcoming-appointment scrollbar-macosx">

                            </ul>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="past">
                            <ul class="upcoming-appointment scrollbar-macosx">

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-8 appointmentdetail">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12 appointmentdetaildiv">
                        <div class="appointment-profile-pic">
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#bookstyle" class="date-time-pop">
                                <img src="<?php echo base_url(); ?>images/profile/Blank-Profile-Icon.jpg" class="img-responsive aptimg" alt="">
                                <div class="price-tag"></div>
                                <div class="appointment-pic-view-icon"><i class="fa fa-eye" aria-hidden="true"></i></div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-12 appointmentdetaildiv">
                        <h4 class="detailInfo">Details &amp; Personal Info</h4>
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="detail-info-appoinment clientnamedd">
                                    <div class="lable-detail">
                                        <i class="fa fa-address-card-o" aria-hidden="true"></i> Client Name:
                                    </div>
                                    <div class="lable-description name"></div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-6 styledd">
                                <div class="detail-info-appoinment">
                                    <div class="lable-detail">
                                        <i class="fa fa-magic" aria-hidden="true"></i> Style:
                                    </div>
                                    <div class="lable-description styles"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 datedd">
                                <div class="detail-info-appoinment">
                                    <div class="lable-detail">
                                        <i class="fa fa-calendar" aria-hidden="true"></i> Date:
                                    </div>
                                    <div class="lable-description dates">mm/dd/yy</div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 durationdd">
                                <div class="detail-info-appoinment">
                                    <div class="lable-detail">
                                        <i class="fa fa-hourglass-half" aria-hidden="true"></i> Duration:
                                    </div>
                                    <div class="lable-description duration"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 timedd">
                                <div class="detail-info-appoinment">
                                    <div class="lable-detail">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i> Time:
                                    </div>
                                    <div class="lable-description times"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 numberdd">
                                <div class="detail-info-appoinment">
                                    <div class="lable-detail">
                                        <i class="fa fa-phone" aria-hidden="true"></i> Number: 
                                    </div>
                                    <div class="lable-description phone"></div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 notesdd">
                                <div class="detail-info-appoinment">
                                    <div class="lable-detail">
                                        <i class="fa fa-sticky-note-o " aria-hidden="true"></i> Notes: 
                                    </div>
                                    <div class="lable-description notes"></div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="detail-info-appoinment">
                                    <div class="lable-detail">
                                        <i class="fa fa-shield" aria-hidden="true"></i> Status: 
                                    </div>
                                    <div class="lable-description staus-links">
                                        <a class="status-section <?php if($userType == 'professional') { echo 'statussection'; } ?> Pending" name="" id="Pending">Pending</a> 
                                        <?php
                                        if($userType == "professional") {
                                            ?>
                                            <a class="status-section  <?php if($userType == 'professional') { echo 'statussection'; } ?>  Confirmed" name="" id="Confirmed">Confirmed</a> 
                                            <?php
                                        }
                                        ?>
                                        <a class="status-section Rescheduled" id="Rescheduled" name="" data-toggle="modal" data-target="#bookstyle">Reschedule</a> 
                                        <?php
                                        if($userType == "professional") {
                                            ?>
                                            <a class="status-section <?php if($userType == 'professional') { echo 'statussection'; } ?> Completed" name="" id="Completed">Completed</a>
                                            <?php
                                        }
                                        ?>
                                        <a class="status-section Cancelled" id="Cancelled" name="" data-toggle="modal" data-target="#confirm-modal">Cancel</a>
                                        <input type="hidden" name="sStatus" id="sStatus">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="mt-30">
                                    <a href="javascript:void(0);" class="blk-btn responsive-setting addtocalender" onclick="calenderevent()">Add to Calender</a> &nbsp;
                                    <a href="#"  class="blk-btn aptcall">Call</a> &nbsp;
                                    <a href="#"  class="blk-btn" data-toggle="modal" data-target="#compose-modal">Email</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12  col-xs-12 mt-30">
                        <div class="box-shadow">
                            <div class="iframe-map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d2109816.101063266!2d-77.2259141095278!3d43.0877133789492!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1528270880335" class="client-map-profile" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<form id="calendereventform" style="display:none;">
    <input type="hidden" name="title" value="Appointment">
    <input type="hidden" name="start_time" value="">
    <input type="hidden" name="end_time" value="">
    <input type="hidden" name="event_date" class="calevent_date" value="">
    <input type="hidden" name="all_day" value="1">
</form>

<div class="modal fade compose-modal" id="compose-modal" tabindex="-1" role="dialog" aria-labelledby="compose-modalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body nopadding">
                <div class="modal-wrap">
                    <div class="close-btn"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
                    <h2 class="send-msg btmline">Send Message</h2>
                    <form id="emailform">
                        <div class="form-group">
                            <input type="email" class="form-control inputfield" id="tomsg" name="to" placeholder="To" required>
                        </div>
                        <!-- <div class="form-group">
                            <input type="email" class="form-control inputfield" name="from" id="frommsg" placeholder="From" required>
                        </div> -->
                        <div class="form-group">
                            <textarea cols="" rows="8" name="message" class="form-control inputfield" placeholder="Message" required></textarea>
                        </div>
                        <div class="login-btns clearfix">
                            <input type="submit" class="blk-btn pull-left" value="Send">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade confirm-modal" id="confirm-modal" tabindex="-1" role="dialog" aria-labelledby="compose-modalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body nopadding">
                <div class="modal-wrap pad-b-20">
                    <div class="close-btn"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
                    <h2 class="btmline">Confimation</h2>
                    <p class="text-center">Are you sure you want to cancel?</p>
                    <div class="text-center">
                        <input type="submit" class="blk-btn" value="Yes" onclick="statusChanges('Cancelled')"> <input type="submit" class="white-btn" value="No">
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
                <input type="hidden" id="bookid" name="bookid">
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
                                        <div class="search-person-name"></div>
                                        <!-- <a href="#" class="tags"></a> -->
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
                                    <div class="select-time">
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/locales/bootstrap-datepicker.nl.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.standalone.min.css" rel="stylesheet"/>
<script>
    getappoinment();
    function getappoinment () {
        $.ajax({
            type: "GET",
            url: '<?php echo base_url("Appointment/getAppointment"); ?>',
            beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
            },
            success: function (response) {
                var obj = JSON.parse(response);
                var html = "";
                var at = 0 ;
                if(obj.status == "true") {
                    if (typeof obj.upcoming != 'undefined' && obj.upcoming) {
                        for (var i = 0; i < obj.upcoming.length; i++) {
                            at = 1;
                            var act = "";
                            if(i == 0 ){ act = "active";getuser(obj.upcoming[i].AppointmentID,'upcoming'); }
                            html = html + '<li class="clearfix act-'+obj.upcoming[i].AppointmentID+' '+act+'" onclick="getuser('+obj.upcoming[i].AppointmentID+',\'past\')">' +
                            '<a href="#">' +
                            '<div class="upcoming-appoint-img">' +
                            '<img src="<?php echo base_url(); ?>'+obj.upcoming[i].ServicePic+'" class="img-circle" alt="">' +
                            '</div>' +
                            '<div class="upcoming-appoint-info pull-left">' +
                            '<div class="name">'+obj.upcoming[i].Title+'</div>' +
                            '<div class="appointment-info">' +
                            ' <div class="upcoming-appoint-date"><i class="fa fa-calendar" aria-hidden="true"></i> '+obj.upcoming[i].AppointmentDate+'</div> <div class="upcoming-appoint-time"><i class="fa fa-clock-o" aria-hidden="true"></i> '+obj.upcoming[i]. AppointmentTime+'</div> <div class="upcoming-appoint-price"><i class="fa fa-usd" aria-hidden="true"></i> '+obj.upcoming[i].ServicePrice+'</div>' +
                            '</div>' +
                            '</div>' +
                            '</a>' +
                            '</li>';
                        }
                        if(html) {
                            $("#upcoming ul").html(html);
                        }else{
                            $("#upcoming ul").html("<br/><li><h6 align='center'>No upcoming appointments!</h6></li>");
                        }
                    }else{
                        $("#upcoming ul").html("<br/><li><h6 align='center'>No upcoming appointments!</h6></li>");
                    }
                    if (typeof obj.past != 'undefined' && obj.past) {
                        html = "";
                        for (var i = 0; i < obj.past.length; i++) {
                            html = html + '<li class="clearfix act-'+obj.past[i].AppointmentID+'" onclick="getuser('+obj.past[i].AppointmentID+',\'past\')">' +
                            '<a href="#">' +
                            '<div class="upcoming-appoint-img">' +
                            '<img src="<?php echo base_url(); ?>'+obj.past[i].ServicePic+'" class="img-circle" alt="">' +
                            '</div>' +
                            '<div class="upcoming-appoint-info pull-left">' +
                            '<div class="name">'+obj.past[i].Title+'</div>' +
                            '<div class="appointment-info">' +
                            ' <div class="upcoming-appoint-date"><i class="fa fa-calendar" aria-hidden="true"></i> '+obj.past[i].AppointmentDate+'</div> <div class="upcoming-appoint-time"><i class="fa fa-clock-o" aria-hidden="true"></i> '+obj.past[i]. AppointmentTime+'</div> <div class="upcoming-appoint-price"><i class="fa fa-usd" aria-hidden="true"></i> '+obj.past[i].ServicePrice+'</div>' +
                            '</div>' +
                            '</div>' +
                            '</a>' +
                            '</li>';
                        }
                        if(html) {
                            $("#past ul").html(html);
                        }else{
                            $("#past ul").html("<br/><li><h6 align='center'>No past appointments!</h6></li>");
                        }
                    }else{
                        $("#past ul").html("<br/><li><h6 align='center'>No past appointments!</h6></li>");
                    }
                }else{
                    $("#upcoming ul").html("<br/><li><h6 align='center'>No upcoming appointments!</h6></li>");
                    $("#past ul").html("<br/><li><h6 align='center'>No past appointments!</h6></li>");
                }
                if(at == 0) {
                    $(".appointmentdetaildiv").hide();
                }else{
                    $(".appointmentdetaildiv").show();
                }
            },
            complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
            }
        });
}
function getuser(id,stss) {
    $(".clearfix").removeClass("active");
    $(".act-"+id).addClass("active");
    $.ajax({
        type: "POST",
        url: '<?php echo base_url("Appointment/getAppointment"); ?>',
        data:{ id : id },
        beforeSend: function(){
            $('.ajax-loader').css("visibility", "visible");
        },
        success: function (response) {
            var obj = JSON.parse(response);
            var html = "";
            if(obj.status == "true") {
                $(".status-section").removeClass("active");
                if (typeof obj.data != 'undefined' && obj.data) {
                    for (var i = 0; i < obj.data.length; i++) {
                        $(".appointmentdetail .aptimg").attr('src','<?php echo base_url(); ?>'+obj.data[i].ServicePic);
                        $(".appointmentdetail .price-tag").html('<i class="fa fa-usd" aria-hidden="true"></i> '+obj.data[i].ServicePrice);

                        if(obj.data[i].service) { $(".styledd").show(); }else{ $(".styledd").hide(); }
                        if(obj.data[i].AppointmentDate) { $(".datedd").show(); }else{ $(".datedd").hide(); }
                        if(obj.data[i].AppointmentTime) { $(".timedd").show(); }else{ $(".timedd").hide(); }
                        if(obj.data[i].Title) { $(".clientnamedd").show(); }else{ $(".clientnamedd").hide(); }
                        if(obj.data[i].MobileNo) { $(".numberdd").show(); }else{ $(".numberdd").hide(); }
                        if(obj.data[i].Notes) { $(".notesdd").show(); }else{ $(".notesdd").hide(); }
                        if(obj.data[i].duration) { $(".durationdd").show(); }else{ $(".durationdd").hide(); }

                        $(".appointmentdetail .styles").html(obj.data[i].service);
                        $(".appointmentdetail .dates").html(obj.data[i].AppointmentDate);
                        $(".appointmentdetail .addtocalender").attr('dataid',obj.data[i].AppointmentDate);
                        $(".calevent_date").val(obj.data[i].AppointmentDate);
                        $(".appointmentdetail .times").html(obj.data[i].AppointmentTime);
                        $(".appointmentdetail .duration").html(obj.data[i].Duration+" Min");
                        $(".appointmentdetail .name").html(obj.data[i].userName);
                        var mmm = "";
                        var mno = [];
                        if(obj.data[i].MobileNo) {
                            var mcnt = mcnt1 = 0;
                            for (var iii = (obj.data[i].MobileNo.length - 1); iii >= 0; iii--) {
                                if(mcnt == 0){
                                    if(mcnt1 == 4){
                                        mmm = obj.data[i].MobileNo.charAt(iii) + "-" + mmm;
                                        mcnt1 = 0;
                                        mcnt = 1;
                                    }else{
                                        mmm = obj.data[i].MobileNo.charAt(iii) + mmm;
                                    }
                                }else{
                                    if(mcnt1 == 3){
                                        mmm = obj.data[i].MobileNo.charAt(iii) + "-" + mmm;
                                        mcnt1 = 0;
                                    }else{
                                        mmm = obj.data[i].MobileNo.charAt(iii) + mmm;
                                    }
                                }
                                mcnt1 = mcnt1 + 1;
                            }

                        }
                        $(".appointmentdetail .phone").html(mmm);

                        $(".appointmentdetail .aptcall").attr('href','tel:'+obj.data[i].MobileNo);
                        $(".appointmentdetail .notes").html(obj.data[i].Notes);
                        $(".appointmentdetail ."+obj.data[i].Action+"").addClass("active");

                        $(".Pending").show();$(".Confirmed").show();$(".Rescheduled").show();$(".Completed").show();$(".Cancelled").show();
                        $(".Completed").attr('id','Completed');$(".Confirmed").attr('id','Confirmed');
                        if(obj.data[i].Action == "Completed" || obj.data[i].Action == "Cancelled") {
                            $(".Pending").hide();$(".Confirmed").hide();$(".Rescheduled").hide();$(".Completed").hide();$(".Cancelled").hide();
                            if(obj.data[i].Action == "Completed") {
                                $(".Completed").show();$(".Completed").attr('id','###');
                            }
                            if(obj.data[i].Action == "Cancelled") {
                                $(".Cancelled").show();$(".Cancelled").attr('data-toggle',"true");
                            }
                            if(obj.data[i].Action == "Confirmed") {
                                $(".Confirmed").show();$(".Confirmed").attr('id','###');
                            }
                        }else if(obj.data[i].Action == "Confirmed") {
                            $(".Pending").hide();$(".Confirmed").attr('id','###');
                            $(".Cancelled").attr('data-toggle',"modal");
                        }

                        $(".appointmentdetail #sStatus").val(obj.data[i].AppointmentID);
                        $(".appointmentdetail .Rescheduled").attr("onclick","open_services("+obj.data[i].ServiceID + ","+obj.data[i].AppointmentID+")");
                        $(".appointmentdetail .appointment-profile-pic .date-time-pop").attr("onclick","open_services("+obj.data[i].ServiceID + ","+obj.data[i].AppointmentID+")");
                    }
                }
                $(".appointmentdetaildiv").show();
            }else{
                $(".appointmentdetaildiv").hide();
            }
        },
        complete: function(){
            $('.ajax-loader').css("visibility", "hidden");
        }
    });

}
$(".statussection").click(function() {
    var action = $(this).attr("id");
    if(action != "###") {
        statusChanges(action);
    }
});

function statusChanges(action) {
    $.ajax({
        type: "POST",
        url: '<?php echo base_url("Appointment/statusChange"); ?>',
        data:{ id : $(".appointmentdetail #sStatus").val(), action : action },
        beforeSend: function(){
            $('.ajax-loader').css("visibility", "visible");
        },
        success: function (response) {
            var obj = JSON.parse(response);
            var html = "";
            if(obj.status == "true") {
                $(".status-section").removeClass("active");
                $(this).addClass("active");
                messageShow("Success!",obj.message,"green","Success");
                setTimeout(function() {
                    location.reload();
                },1500);
            }else{
                messageShow("Error!",obj.message,"red","Try-Again");
            }
        },
        complete: function(){
            $('.ajax-loader').css("visibility", "hidden");
        }
    });
}

function open_services (serviceid,id) {
    $("#bookappoinment #id").val(serviceid);
    $("#bookappoinment #bookid").val(id);
    $.ajax({
        type: "POST",
        url: '<?php echo base_url("search/getServices/"); ?>0',
        data:{id : serviceid},
        beforeSend: function(){
            $('.ajax-loader').css("visibility", "visible");
        },
        success: function (response) {
            var obj = JSON.parse(response);
            var html = "";
            if(obj.data != "undefined" && obj.data) {
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

                    var t = 'July 21, 1983  ' + obj.data[i].ServiceTime;
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
                    console.log(obj.data[i].services);
                    for (var ii = 0; ii < obj.data[i].services.length; ii++) {
                        sservices1 = services1 + '<span><a href="javascript:void(0)" onclick=searchlook("ss-'+obj.data[i].services[ii].ServiceMasterID+'")>'+obj.data[i].services[ii].ServiceName+'</a></span>';
                    }
                    $(".booking-modal .tags-gallery-pic").html(services1);
                }
            }
        },
        complete: function(){
            $('.ajax-loader').css("visibility", "hidden");
        }
    });
}

$("#bookappoinment").submit(function (e) {
    e.preventDefault();
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

$("#emailform").submit(function (e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: '<?php echo base_url("Appointment/sentmessage"); ?>',
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
                $("#compose-modal").modal('hide');
                $("#emailform")[0].reset();
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
var date = new Date();
var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
$('#calendar').datepicker({
    format: "yyyy-mm-dd",
    todayHighlight: true,
    startDate: today
});

function calenderevent(){
    $.ajax({
        type: 'POST',
        url: '<?php  echo base_url(); ?>Appointment/google_login_calender',
        data: $("#calendereventform").serialize(),
        beforeSend: function(){
            $('.ajax-loader').css("visibility", "visible");
        },
        success: function(response) {
            var obj = JSON.parse(response);
            if(obj.status == 1) {
                messageShow("Success!",obj.data,"green","Success");
            } else if (obj.status == 3 ) {
                window.location = obj.data  ;
            }else{
                messageShow("Error!",obj.data,"red","Try-Again");
            }
        },
        error: function(response) {
            messageShow("Error!","Something went wrong. Please try again later.","red","Try-Again");
        },
        complete: function() {
            $('.ajax-loader').css("visibility", "hidden");
        }
    });
}
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
</style>