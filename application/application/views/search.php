<div class="main-map-search profile-map">
	<section class="search-page-bg">
		<!--slider datalist-->
		<div class="container">
			<div class="slider-inside">
				<div class="top-options">
					<form id="filter_form">
						<div class="row">
							<div class="col-md-8 col-sm-12">
								<div class="slider-buttons inner-top-search clearfix">
									<div class="row">
										<div class="col-md-5 col-sm-5 col-xs-12">
											<span class="silder-button-box input1">
												<input type="text" placeholder="Search style, stylist, or salon" id="filter_box" name="filter_box" value="<?php if(!empty($ssidd1)) echo $ssidd1; ?>" />
											</span>
										</div>
										<div class="col-md-5 col-sm-5 col-xs-12">
											<span class="silder-button-box">
												<input type="text" placeholder="Zip code or city" id="filter_zc" name="filter_zc" value="<?php if(!empty($ssidd2)) echo $ssidd2; ?>" />
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
							<div class="col-md-1 col-sm-1">
								<a href="javascript:void(0);" onclick="$('#filter_form')[0].reset();$('#filter_record')[0].reset();$('.filter_record').click();"><i class="fa fa-repeat filter-hm-icon" style="font-size:25px;color:black;margin-top:27px;"></i></a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!--slider datalist complete-->
	</section>
	<!--slider complete-->

	<section class="map-search clearfix">
		<div id="search-map" class="pd-r-15 ">
			<div class="iframe-map " id="map">
				
			</div>
		</div>
		<div class="search-profile-list">
			<div class="row container searchPage">
				<div class="serviceList">

				</div>

			</div>  
			<ul id="pagination-demo" class="pagination-lg pull-right"></ul>            
		</div>

	</section>
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
									<span class="img-center">
										<!-- <div style="height: 50vh;"> -->
										<img src="" class="img-responsive" alt="">
										<a style="position:absolute; margin: -40px 0; padding: 10px; background:#0000006e; color:white;width: 91%;text-align: center;" class="usernamebook"></a>
										<!-- </div> -->
									</span>
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/locales/bootstrap-datepicker.nl.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.standalone.min.css" rel="stylesheet"/>
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.twbsPagination.js'); ?>"></script>
	<style>
		.page {
			display: none;
		}
		.page-active {
			display: block;
		}
		.searchPage,.jumbotron {
			width: 100%;
			padding: 0px !important;
			margin: 0px !important;
		}
		@media screen and (max-width: 9500px) and (min-width: 791px) {
			.img-responsive {
				width: 100% !important;
			}
		}
		.serviceList .profile-box {
			width : 100% !important;
		}
		.serviceList .profile-box .profile-pic-map img{
			/*height : 38vh !important*/
		}
		#map {
			height: 1200px;
			width: 100%;
		}
		.search-profile-list {
			padding: 15px 0;
		}
		.gm-style-iw , .gm-style-iw-d {
			height: 285px !important;
		}
	</style>
	<script type="text/javascript">
		var locations = [
		<?php
		if(!empty($stylist_location)) {
			$ii=0;
			foreach ($stylist_location as $value) {
			// $htloc = 1;
				$htloc = '<div class=\"profile-pic-map\"><img src=\"'.base_url().$location_services[$ii]->thumbnail.'\" width=\"150\" height=\"150\"><a onclick=\"open_services('.$location_services[$ii]->ServiceID.');\"  class=\"search-eye\" data-toggle=\"modal\" data-target=\"#bookstyle\"><i class=\"fa fa-eye\" aria-hidden=\"true\"></i></a><div class=\"price-tag\">$'.$location_services[$ii]->Price.'</div></div><div class=\"map-person-name text-center\"><a href=\"#\">'.$location_services[$ii]->Title.'</a></div><div class=\"map-person-service text-center\"><a href=\"#\">'.$location_services[$ii]->HasTag.'</a></div><a href=\"#\" onclick=\"open_services('.$location_services[$ii]->ServiceID.');\" class=\"bookstyle-btn\" data-toggle=\"modal\" data-target=\"#bookstyle\">Book Style</a></div>';
			// $htloc = '';
				echo '["'.$value->StylistName.'",'.$value->Latitude.','.$value->Longitude.',"'.$htloc.'"],';
				$ii++;
			}
		}
		?>
		];
		get_services(0);
		function get_services (page) {
			$.ajax({
				type: "GET",
				url: '<?php echo base_url("search/getServices"); ?>',
				beforeSend: function(){
					$('.ajax-loader').css("visibility", "visible");
				},
				success: function (response) {
					var obj = JSON.parse(response);
					var j = 1;
					var html = locs = locs1 = '';
					if(obj.data != "undefined" && obj.data) {
						for (var i = 0; i < obj.data.length; i++) {
							if(i == 0) {
								html = '<div class="jumbotron page" id="page'+j+'">';
							}
							if( i != 0 && i  % 9 == 0) {
								j = j + 1;
								html =  html = html + '</div><div class="jumbotron page" id="page'+j+'">';
							}
							html = html + '<div class="col-md-4 col-sm-4 col-xs-6">' +
							'<div class="profile-box">' +
							'<div class="profile-pic-map">' +
							'<img src="<?php echo base_url(); ?>'+obj.data[i].thumbnail+'" class="img-responsive" alt="" width="217" height="217">' +
							'<a onclick="open_services('+obj.data[i].ServiceID+');"  class="search-eye" data-toggle="modal" data-target="#bookstyle"><i class="fa fa-eye" aria-hidden="true"></i></a>' +
							'<div class="price-tag">$'+obj.data[i].Price+'</div>' +
							'</div>' +
							'<div class="map-person-name text-center"><a href="#">'+obj.data[i].Title+'</a></div>' +
							'<div class="map-person-service text-center"><a href="#">'+obj.data[i].HasTag+'</a></div>' +
							'<a href="#" onclick="open_services('+obj.data[i].ServiceID+');" class="bookstyle-btn" data-toggle="modal" data-target="#bookstyle">Book Style</a>' +
							'</div>' +
							'</div>';
							// if(obj.data[i].Latitude && obj.data[i].Longitude ) {
							// 	locs = '<img src=\'<?php echo base_url(); ?>'+obj.data[i].thumbnail+'\' class=\'img-responsive\' alt=\'\' width=\'217\' height=\'217\'>' +
							// 	'<a onclick=\'open_services('+obj.data[i].ServiceID+');\'  class=\'search-eye\' data-toggle=\'modal\' data-target=\'#bookstyle\'><i class=\'fa fa-eye\' aria-hidden=\'true\'></i></a>' +
							// 	'<div class=\'price-tag\'>$'+obj.data[i].Price+'</div>' +
							// 	'</div>' +
							// 	'<div class=\'map-person-name text-center\'><a href=\'#\'>'+obj.data[i].Title+'</a></div>' +
							// 	'<div class=\'map-person-service text-center\'><a href=\'#\'>'+obj.data[i].HasTag+'</a></div>' +
							// 	'<a href=\'#\' onclick=\'open_services('+obj.data[i].ServiceID+');\' class=\'bookstyle-btn\' data-toggle=\'modal\' data-target=\'#bookstyle\'>Book Style</a>' +
							// 	'</div>';
							// 	locs1 = locs1 + '["hi",'+obj.data[i].Latitude+','+obj.data[i].Longitude+',"'+locs+'"],';
							// }
						}
						if(html) {
							// locations = [ locs1 ];
							// clearMarkers();
							// setTimeout(function() {
							// 	initMap1();
							// },1500);
							$(".serviceList").html("</div>" + html);

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
						}else{
							// $(".serviceList").html("<br/><h2 align='center'>No record Found!</h2><br/>");
							$(".serviceList").html("");
						}
					}else{
						// $(".serviceList").html("<br/><h2 align='center'>No record Found!</h2><br/>");
						$(".serviceList").html("");
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
var marker, i,map,infowindow;var markers = [];
function initMap() {
	map = new google.maps.Map(document.getElementById('map'), {
		zoom: 8,
		center: new google.maps.LatLng(41.976816, -87.659916),
		mapTypeId: google.maps.MapTypeId.ROADMAP
	});

	infowindow = new google.maps.InfoWindow({});

	for (i = 0; i < locations.length; i++) {
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(locations[i][1], locations[i][2]),
			map: map
		});

		google.maps.event.addListener(marker, 'click', (function (marker, i) {
			return function () {
				infowindow.setContent(locations[i][3]);
				infowindow.open(map, marker);
			}
		})(marker, i));
		markers.push(marker);
	}
}
function initMap1() {
	// console.log("hi");
	// for (i = 0; i < locations.length; i++) {
	// 	marker = new google.maps.Marker({
	// 		position: new google.maps.LatLng(locations[i][1], locations[i][2]),
	// 		map: map
	// 	});

	// 	google.maps.event.addListener(marker, 'click', (function (marker, i) {
	// 		return function () {
	// 			infowindow.setContent(locations[i][3]);
	// 			infowindow.open(map, marker);
	// 		}
	// 	})(marker, i));
	// 	markers.push(marker);
	// }
}
function clearMarkers() {
	// for (var i = 0; i < markers.length; i++) {
	// 	markers[i].setMap(null);
	// }
	// markers = [];
}
var date = new Date();
var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
$('#calendar').datepicker({
	format: "yyyy-mm-dd",
	todayHighlight: true,
	startDate: today
});

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
<!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBn2YECUFur6jWWVyqyGzLvuw3JdzjNUxw&callback=initMap"></script> -->


<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgVT3RnQR58QkE74G8KIBjspAFkVVfrv4&callback=initMap"></script>
<!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVf8SiwSoZdlrtH0LeqKjvdPXLbw14N7g&callback=initMap"></script> -->

