<div class="navbg-gry"></div>
<div class="container">
	<div class="top-bar-section clearfix">
		<div class="left">
			<h4></h4>
		</div>
		<div class="right">
			<a class="new-btn-adm" href="#" data-toggle="modal" data-target="#composeadmin-modal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Contact Admin</a>
		</div>
	</div>
	<div class="message-page-fully">
		<div class="right-sidebar-full messages-section clearfix">
			<div class="col-sm-3 msg-float1">
				<div class="friends-section clearfix">
					<div class="search-message" style="margin-bottom:15px;">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search" id="searchmsg">
							<span class="input-group-btn" onclick="searchUser();">
								<button class="btn btn-default" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
							</span>
						</div>
					</div>
					<!-- <div class="col-sm-12" style="margin-bottom:25px;padding-left:0px;">
						<select class="form-control" onchange="getusers();" id="userlist">
							<option value="0">-- Select Record --</option>
							<?php
							foreach ($userlist as $value) {
								if(!empty($value->CustomerName))
									echo '<option value="'.$value->CustomerID.'">'.$value->CustomerName.'</option>';
								else
									echo '<option value="'.$value->StylistID.'">'.$value->StylistName.'</option>';
							}
							?>
						</select>
					</div> -->
					<div class="top-bar-section clearfix">
						<div class="left">
							<h4>MESSAGES</h4>
						</div>
						<div class="right">
							<!-- <a class="new-btn1" href="#" data-toggle="modal" data-target="#compose-modal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Compose</a> -->
							<a class="new-btn" href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Compose</a>
						</div>
					</div>
					<div class="message-box-full msg-list-content" style="height:450px;overflow-y:scroll;">
						
						<!-- <div class="message-box-child  clearfix active-msg"> -->
					</div>
				</div>
			</div>
			<div class="col-sm-9 msg-float2">
				<div class="chat-section">
					<div class="top-bar-section clearfix" style="border-bottom: 1px lightgray solid;padding-bottom: 15px;">
						<div>
							<div class="names" style="display: flex;"></div>
						</div>
					</div>
					<div class="message-box-child clearfix">
						<div class="col-sm-9 left">
							<div class="image-title">
								<div class="newmsg" style="height:450px;overflow-y:scroll;">
									
								</div>
								<div class="write-comment clearfix" style="display:none;">
									<div class="textares-msg">
										<textarea cols="" rows="" id="textmsg" class="textmsg" placeholder="Write here..."></textarea>
									</div>
									<input type="hidden" id="conid">
									<div class="msg-send-btn">
										<a href="javascript:void();" class="new-btn2" style="cursor:pointer" onclick="sentmessage();">
											<i class="fa fa-paper-plane" aria-hidden="true"></i>
										</a>
									</div>
									<div class="pull-right paperclip">
										<input type="file" name="filesm" id="filesm" style="display:none;">
										<a href="javascript:void();" onclick="$('#filesm').click();">
											<i class="fa fa-paperclip" aria-hidden="true"></i>
										</a>
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

<!-- <div class="modal fade compose-modal" id="compose-modal" tabindex="-1" role="dialog" aria-labelledby="compose-modalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body nopadding">
				<div class="modal-wrap">
					<div class="close-btn"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
					<h2 class="send-msg btmline">Send Message</h2>
					<form id="emailform">
						<div class="form-group">
							<input type="text" class="form-control inputfield" id="tomsg" name="to" placeholder="To" required>
						</div>
						<!-- <div class="form-group">
							<input type="email" class="form-control inputfield" name="from" id="frommsg" placeholder="From" required>
						</div> -->
						<!---<div class="form-group">
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
</div> -->

<div class="modal fade compose-modal" id="composeadmin-modal" tabindex="-1" role="dialog" aria-labelledby="compose-modalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body nopadding">
				<div class="modal-wrap">
					<div class="close-btn"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
					<h2 class="send-msg btmline">Send Message</h2>
					<form id="adminemailform">
						<div class="form-group">
							<input type="text" class="form-control inputfield" id="subject" name="subject" placeholder="Subject" required>
						</div>
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


<script src="<?php echo $this->config->item('assets'); ?>js/typeahead.js"></script>
<script>
	function getusers() {
		if($("#userlist").val() != 0) {
			getmessage($("#userlist").val());
		}
	}
	searchUser(1);
	function searchUser(idd = 0) {
		$.ajax({
			type: "POST",
			url: '<?php echo base_url("Message/searchUser"); ?>',
			data: {search : $("#searchmsg").val(),idd:idd},
			beforeSend: function(){
				$('.ajax-loader').css("visibility", "visible");
			},
			success: function (response) {
				var obj = JSON.parse(response);
				if(obj.status == "true") {
					var html = "";
					for (var i = 0; i < obj.data.length; i++) {
						html = html + '<div class="message-box-child  clearfix" onclick="getmessage('+obj.data[i].StylistID+',\''+obj.data[i].type+'\');" style="cursor:pointer;">';
						if(obj.data[i].count != 0){
							html = html + '<div class="dot-shape shpe-'+obj.data[i].StylistID+'">'+obj.data[i].count+'</div>';
						}
						html = html + '<div class="">' +
						'<div class="image-title left" style="width:100%;">' +
						'<div class="images-wrapper left" style="vertical-align:top;">' ;
						if(obj.data[i].ProfilePic) {
							html = html + '<img src="<?php echo base_url(); ?>'+obj.data[i].ProfilePic+'" alt="" style="width:63px;height:54px;" width="63" height="54">';
						}else{
							html = html + '<img src="<?php echo base_url(); ?>images/profile/Blank-Profile-Icon.jpg" alt="" style="width:63px;height:54px;" width="63" height="54">';
						}
						html = html + '</div>' +
						'<div class="img-defi right" style="float:left;vertical-align:top;">' +
						'<h5>'+obj.data[i].StylistName+'</h5>' ;
						if(obj.data[i].conv.CreatedDate){
							if(obj.data[i].conv.Image){
								html=html + '<p class="msg-info-txt">Sent file.</p>' ;
							}else if(obj.data[i].conv.Message){
								html=html + '<p class="msg-info-txt">'+obj.data[i].conv.Message+'</p>' ;
							}
							if(obj.data[i].conv.CreatedDate)
								html=html + '<p class="msg-datetime">'+obj.data[i].conv.CreatedDate+'</p>' ;
						}else{
							html = html + '<p class="msg-info-txt"><a href="javascript:void(0)">Send Message</a></p>';
						}
						html = html + '</div>' +
						'</div>' +
						'</div>' +
						'</div>';
					}
					if(html){
						$(".msg-list-content").html(html);
					}else{
						// $(".msg-list-content").html("No record found...!");
					}
				}else{
					// $(".msg-list-content").html("No record found...!");
				}
			},
			complete: function(){
				$('.ajax-loader').css("visibility", "hidden");
			}
		});
}
function getmessage(id,type="") {
	$("#conid").val(id);
	$.ajax({
		type: "POST",
		url: '<?php echo base_url("Message/get_message"); ?>',
		data: {id : id,type:type},
		beforeSend: function(){
			$('.ajax-loader').css("visibility", "visible");
		},
		success: function (response) {
			var obj = JSON.parse(response);
			if(obj.profilepic) {
				var upropic = obj.profilepic;
			}else{
				var upropic = 'images/profile/Blank-Profile-Icon.jpg';
			}
			$(".names").html('<div style="display:inline-block;padding-left:10px;"><img src="<?php echo base_url(); ?>'+upropic+'" style="width:40px;height:40px;" width="40" height="40"/></div><div style="display:inline-block;padding-left:10px;"><h5>'+obj.scname+'</h5><h5>'+obj.EmailID+'</h5></div>');
			$(".new-btn2").attr("usertype",type);
			$(".write-comment").show();
			if(obj.status == "true") {
				$(".shpe-"+id).hide();
				var html = "";
				for (var i = 0; i < obj.data.length; i++) {
					
					if(obj.data[i].type == "o") {
						html = html + '<div class="child-section clearfix" style="margin-top:5px;">' +
						'<div class="images-wrapper left">' ;
						if(obj.profilepic) {
							html = html + '<img src="'+obj.profilepic+'" alt="'+obj.uuname+'" width="63" height="54" style="width:63px;height:54px;">';
						}else{
							html = html + '<img src="<?php echo base_url(); ?>images/profile/Blank-Profile-Icon.jpg"  alt="'+obj.uuname+'"  width="63" height="54" style="width:63px;height:54px;">';
						}
						html = html + '</div>' +
						'<div class="img-defi right">';
						if(obj.data[i].Image){
							var ind = obj.data[i].Image.toLowerCase();
							if(ind.indexOf(".jpg") > 0 || ind.indexOf(".jpeg") > 0 || ind.indexOf(".png") > 0 || ind.indexOf(".gif") > 0 ) {
								html = html + '<a href="<?php echo base_url(); ?>' + obj.data[i].Image+ '" target="_blank"><img src="<?php echo base_url(); ?>' + obj.data[i].Image+ '"  height="200" style="height:200px;"/></a>';
							}else{
								html = html + '<a href="<?php echo base_url(); ?>' + obj.data[i].Image+ '" target="_blank"><iframe src="<?php echo base_url(); ?>' + obj.data[i].Image+ '"></iframe></a>';
							}
						}else if(obj.data[i].Message){
							html = html + '<h5>' + obj.data[i].Message+ "</h5>";
						}
						
						html = html + '<h5 class="time">'+obj.data[i].CreatedDate+'</h5>' +
						'</div>' +
						'</div>';
					}else{
						html = html + '<div class="child-section clearfix" style="margin-top:5px;">' +
						'<div class="images-wrapper right" style="padding-left:15px;padding-right:5px;margin-top:15px;">' ;
						if(obj.mypic) {
							html = html + '<img src="'+obj.mypic+'" alt="'+obj.uuname+'" width="63" height="54" style="width:63px;height:54px;">';
						}else{
							html = html + '<img src="<?php echo base_url(); ?>images/profile/Blank-Profile-Icon.jpg"  alt="'+obj.uuname+'"  width="63" height="54" style="width:63px;height:54px;">';
						}
						html = html + '</div>' +
						'<div class="img-defi img-defi-reply right">';
						if(obj.data[i].Image){
							var ind = obj.data[i].Image.toLowerCase();
							if(ind.indexOf(".jpg") > 0 || ind.indexOf(".jpeg") > 0 || ind.indexOf(".png") > 0 || ind.indexOf(".gif") > 0 ) {
								html = html + '<a href="<?php echo base_url(); ?>' + obj.data[i].Image+ '" target="_blank"><img src="<?php echo base_url(); ?>' + obj.data[i].Image+ '" width="200" height="200" style="width:200px;height:200px;"/></a>';
							}else{
								html = html + '<a href="<?php echo base_url(); ?>' + obj.data[i].Image+ '" target="_blank"><iframe src="<?php echo base_url(); ?>' + obj.data[i].Image+ '"></iframe></a>';
							}
						}else if(obj.data[i].Message){
							html = html + '<h5>' + obj.data[i].Message+ "</h5>";
						}
						html = html + '<h5 class="time">'+obj.data[i].CreatedDate+'</h5>' +
						'</div>' +
						'</div>';
					}
				}
				if(html){
					$(".newmsg").html(html);
					$('.newmsg').scrollTop($('.newmsg')[0].scrollHeight);
				}else{
					// $(".newmsg").html("No Conversation found...!");
					$(".newmsg").html("");
				}
			}else{
				// $(".newmsg").html("No Conversation found...!");
				$(".newmsg").html("");
			}
		},
		complete: function(){
			$('.ajax-loader').css("visibility", "hidden");
		}
	});
}
function sentmessage() {
	$.ajax({
		type: "POST",
		url: '<?php echo base_url("Message/sent_message"); ?>',
		data: {id:$("#conid").val(),msg:$("#textmsg").val(),usertype: $('.new-btn2').attr("usertype")},
		beforeSend: function(){
			$('.ajax-loader').css("visibility", "visible");
		},
		success: function (response) {
			var obj = JSON.parse(response);
			console.log(obj);
			if(obj.status == "true") {
				getmessage($("#conid").val(),$('.new-btn2').attr("usertype"));
				$("#textmsg").val("");
			}else{
				messageShow("Error!",obj.message,"red","Try-Again");
			}
		},
		complete: function(){
			$('.ajax-loader').css("visibility", "hidden");
		}
	});
}
$("#filesm").change(function(){
	var fd = new FormData();
	var files = $('#filesm')[0].files[0];
	fd.append('filesm',files);
	fd.append('id',$("#conid").val());
	fd.append('usertype',$('.new-btn2').attr("usertype"));
	$.ajax({
		type: "POST",
		url: '<?php echo base_url("Message/sent_messagefiles"); ?>',
		data: fd,
		beforeSend: function(){
			$('.ajax-loader').css("visibility", "visible");
		},
		contentType: false,
		processData: false,
		success: function (response) {
			var obj = JSON.parse(response);
			console.log(obj);
			if(obj.status == "true") {
				getmessage($("#conid").val(),$('.new-btn2').attr("usertype"));
				$("#textmsg").val("");
			}else{
				messageShow("Error!",obj.message,"red","Try-Again");
			}
		},
		complete: function(){
			$('.ajax-loader').css("visibility", "hidden");
		}
	});
});
$('body').on('submit','#emailform',function(e) {
	e.preventDefault();
	$.ajax({
		type: "POST",
		url: '<?php echo base_url("message/sentmessage"); ?>',
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
$("#adminemailform").submit(function (e) {
	e.preventDefault();
	$.ajax({
		type: "POST",
		url: '<?php echo base_url("message/sentmessagetoadmin"); ?>',
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
				$("#composeadmin-modal").modal('hide');
				$("#adminemailform")[0].reset();
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
$(".msg-list-content .message-box-child").on('click',function(){
	setTimeout(function() {
		// $(".msg-list-content .message-box-child").css("background","");
		console.log("hi");
		$(this).css("background","lightgray");
	},1000);
});
function keytype(){
	$('#tomsg').typeahead({
		source: function (query, result) {
			$.ajax({
				url: "<?php echo base_url(); ?>message/getuser",
				data: 'query=' + query,            
				dataType: "json",
				type: "POST",
				success: function (data) {
					result($.map(data, function (item) {
						return item;
					}));
				}
			});
		}
	});
}
$(document).ready(function () {
	$('.new-btn').on('click',function(){
		$(".names").html('<div style="display:inline-block;padding-left:10px;"></div><div style="display:inline-block;padding-left:10px;"><h5>Send Message</h5></div>');
		var html = '<form id="emailform"><div class="form-group"><input type="text" class="form-control inputfield" id="tomsg" onkeypress="keytype()" name="to" placeholder="To" required></div><div class="form-group"><textarea cols="" rows="8" name="message" class="form-control inputfield" placeholder="Message" required></textarea></div><div class="login-btns clearfix"><input type="submit" class="blk-btn pull-left" value="Send"></div></form>';
		$(".newmsg").html(html);
		$('.newmsg').scrollTop($('.newmsg')[0].scrollHeight);
		return false;
	});
});
</script>
<style>
	.dot-shape {
		position: absolute;
		background: #a06727;
		border-radius: 50%;
		content: "";
		padding: 0px 5px;
		border: 3px solid #FFF;
		color: white;
	}
	.names h5{
		margin-top: 3px;
		margin-bottom: 3px;
		font-weight: bold;
	}
	.typeahead { border: 2px solid #FFF;border-radius: 4px;padding: 8px 12px;max-width: 300px;min-width: 290px;background: rgba(66, 52, 52, 0.5);color: #FFF;}
	.tt-menu { width:300px; }
	ul.typeahead{margin:0px;padding:10px 0px;}
	ul.typeahead.dropdown-menu li a {padding: 10px !important;	border-bottom:#CCC 1px solid;color:#FFF;}
	ul.typeahead.dropdown-menu li:last-child a { border-bottom:0px !important; }
	.bgcolor {max-width: 550px;min-width: 290px;max-height:340px;background:url("world-contries.jpg") no-repeat center center;padding: 100px 10px 130px;border-radius:4px;text-align:center;margin:10px;}
	.demo-label {font-size:1.5em;color: #686868;font-weight: 500;color:#FFF;}
	.dropdown-menu>.active>a, .dropdown-menu>.active>a:focus, .dropdown-menu>.active>a:hover {
		text-decoration: none;
		background-color: #1f3f41;
		outline: 0;
	}
</style>