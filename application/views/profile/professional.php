<div class="navbg-gry"></div>
<div class="container">
	<section id="hair-pro">
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-12">
				<div class="profile-pro-img">
					<img src="<?php if(!empty($stylist[0]->ProfilePic)) { echo base_url().$stylist[0]->ProfilePic; }else{ echo base_url().'images/profile/Blank-Profile-Icon.jpg'; } ?>" class="img-responsive profilePic" alt="" style="width:100%;height:250px;object-fit: cover;">
					<div class="pic-upload-icon"><a href="#" onclick="$('#profilePic').click();"><i class="fa fa-camera" aria-hidden="true"></i></a></div>
					<input type="file" name="profilePic" id="profilePic" style="display:none;">
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

					<a href="javascript:void(0);"  onclick="getproffessionaldetail();" class="edit-profile white-btn pro-icon" style="width:190px;line-height: 1.1em;"><i class="fa fa-pencil" aria-hidden="true"></i> Edit Profile</a>
				</div>
			</div>

			<div class="col-md-9 col-sm-9 col-xs-12 col-md9-100">
				
			</div>
		</div>

		<h3 class="my-services-hd">MY SERVICES</h3>
		<div class="row servicelist">


		</div>
		<div class="row servicepage" align="center">

		</div>
		<div class="add-services-link">
			<a href="#"  data-toggle="modal" data-target="#add-services" onclick="$('.crop_image1').show();$('.crop_image2').hide();">
				<div class="add-services-icon"><img src="<?php echo $this->config->item('assets'); ?>img/plus.png" alt=""></div> <div class="add-services-text">ADD SERVICES</div>
			</a>
		</div>
	</section>
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
	.pac-container{
		z-index: 9999999999999 !important;
	}
</style>


<div class="modal fade" id="profile-modal" tabindex="-1" role="dialog" aria-labelledby="profile-modalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body nopadding">
				<div class="modal-wrap">
					<div class="close-btn"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
					<h2>Edit Profile</h2>
					<form id="professional-form">
						<div class="row nomargin" >
							<div class="col-md-12 col-sm-12 nopadding">
								<div class="form-group col-md-12 col-sm-12 nopadding">
									<input type="email" name="email" class="form-control inputfield-2" id="email" placeholder="Email" value="<?php if(empty($stylist[0]->EmailID)) { echo $user['user']['email']; } else { echo $stylist[0]->EmailID; }; ?>" disabled>
								</div>
								<div class="form-group col-md-12 col-sm-12 col-xs-12 nopadding">
									<input type="tel" class="form-control inputfield-2" id="phone" name="phone" placeholder="PHONE NUMBER" value="<?php echo $stylist[0]->MobileNo; ?>" required>
								</div>
								<div class="form-group col-md-12 col-xs-12 nopadding">
									<input type="text" name="Slug" class="form-control inputfield-2" id="Slug" placeholder="Slug" value="<?php echo $stylist[0]->Slug; ?>" required>
									<span class="errorslug"></span>
								</div>
								<div class="form-group col-md-6 col-sm-6 col-xs-12 nopadding  pr-15">
									<select class="selectpicker" id="choose-country" name="Country">
										<option value="US">United States</option>
										<!--<option value="UM">United States Minor Outlying Islands</option>-->
									</select>
								</div>
								<div class="form-group col-md-6 col-sm-6 col-xs-12 nopadding">
									<select class="selectpicker" id="choose-city" name="City">
										<option selected><strong>US States</strong></option>
										<option value="Alabama">Alabama</option>
										<option value="Alaska">Alaska</option>
										<option value="Arizona">Arizona</option>
										<option value="Arkansas">Arkansas</option>
										<option value="California">California</option>
										<option value="Colorado">Colorado</option>
										<option value="Connecticut">Connecticut</option>
										<option value="Delaware">Delaware</option>
										<option value="District Of Columbia">District Of Columbia</option>
										<option value="Florida">Florida</option>
										<option value="Georgia">Georgia</option>
										<option value="Hawaii">Hawaii</option>
										<option value="Idaho">Idaho</option>
										<option value="Illinois">Illinois</option>
										<option value="Indiana">Indiana</option>
										<option value="Iowa">Iowa</option>
										<option value="Kansas">Kansas</option>
										<option value="Kentucky">Kentucky</option>
										<option value="LLouisianaA">Louisiana</option>
										<option value="Maine">Maine</option>
										<option value="Maryland">Maryland</option>
										<option value="Massachusetts">Massachusetts</option>
										<option value="Michigan">Michigan</option>
										<option value="Minnesota">Minnesota</option>
										<option value="Mississippi">Mississippi</option>
										<option value="Missouri">Missouri</option>
										<option value="Montana">Montana</option>
										<option value="Nebraska">Nebraska</option>
										<option value="Nevada">Nevada</option>
										<option value="New Hampshire">New Hampshire</option>
										<option value="New Jersey">New Jersey</option>
										<option value="New Mexico">New Mexico</option>
										<option value="New York">New York</option>
										<option value="North Carolina">North Carolina</option>
										<option value="North Dakota">North Dakota</option>
										<option value="Ohio">Ohio</option>
										<option value="Oklahoma">Oklahoma</option>
										<option value="Oregon">Oregon</option>
										<option value="Pennsylvania">Pennsylvania</option>
										<option value="Rhode Island">Rhode Island</option>
										<option value="South Carolina">South Carolina</option>
										<option value="South Dakota">South Dakota</option>
										<option value="Tennessee">Tennessee</option>
										<option value="Texas">Texas</option>
										<option value="Utah">Utah</option>
										<option value="Vermont">Vermont</option>
										<option value="Virginia">Virginia</option>
										<option value="Washington">Washington</option>
										<option value="West Virginia">West Virginia</option>
										<option value="Wisconsin">Wisconsin</option>
										<option value="Wyoming">Wyoming</option>
									</select>
								</div>
								<div class="form-group col-md-12 col-xs-12 nopadding">
									<!-- <input type="text" class="form-control inputfield-2" id="address" placeholder="ADDRESS"> -->
									<div id="locationField">
										<input id="autocomplete" class="form-control inputfield-2" placeholder="Enter your address"  onFocus="geolocate()" type="text"  name="address" value="<?php echo $stylist[0]->FullAddress; ?>" />
										<input type="hidden" name="lat" id="lat">
										<input type="hidden" name="lang" id="lang">
									</div>
								</div>
							</div>
							<div class="col-md-12 col-sm-12  col-xs-12 nopad-sm nopad-xs nopadding">
								<div>
									<textarea cols="" rows="" class="inputfield-2 textarea-pro" placeholder="ABOUT YOURSELF" name="description" style="height:150px;"><?php echo $stylist[0]->Description; ?></textarea>
								</div>
							</div>
							<div class="form-group col-sm-12" style="padding-left:0px;padding-right:0px">
	                            <div class="col-sm-4" style="height:50px;padding-top:14px;padding-left:0px;padding-right:0px;">User Type</div>
	                            <div class="col-sm-8" style="padding-left:0px;padding-right:0px;">
	                            	<?php
	                            	$usr = $this->db->select('userType')->where("id",$stylist[0]->UserID)->get("sshd_user")->row();
	                            	?>
	                                <select name="usertype" id="usertype" required class="form-control selectpicker">
	                                    <option <?php if($usr->userType == 'professional'){ echo "selected";} ?> value="professional">Professional</option>
	                                    <option <?php if($usr->userType == 'client'){ echo "selected";} ?> value="client">Client</option>
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
							<div class="form-group col-sm-12" style="padding-left:0px;padding-right:0px">
								<input type="submit" value="SAVE" class="blk-btn btn-block">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade add-services" id="add-services" tabindex="-1" role="dialog" aria-labelledby="uploadPhotoLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

			<div class="modal-body">
				<h2 class="btmline">Add Services</h2>
				<div class="close-btn"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
				<form id="services-form">
					<div class="row">
						<div class="col-md-4 paddingrightnone">
							<input type="file" name="photos" id="photo2"  style="display:none;">
							<input type="hidden" name="photo" id="photo2s">
							<div class="img-upload" onclick="$('#photo2').click()" style="cursor:pointer;height:220px;">
								<div id="drop-area">
									<h3 class="drop-text">Click Here Upload Images</h3>
								</div>
							</div>
							<div class="form-group">
								<input type="text" class="form-control inputfield-4" id="title" placeholder="Title" name="title" required>
							</div>
							<div>
								<textarea cols="" rows="" class="inputfield-4 textarea-img-upload" placeholder="Description" name="description"></textarea>
							</div>
							<div class="form-group mt-10">
								<input type="text" class="form-control inputfield-4" data-role="tagsinput" id="tags" placeholder="Tags" name="tags">
							</div>

							<div class="form-group col-md-6  col-sm-6 col-xs-6 nopadding">
								<input type="text" class="form-control inputfield-4" placeholder="$ How Much" name="price" required>
							</div>
							<div class="form-group col-md-6  col-sm-6 col-xs-6 paddingrightnone" id="how-long">
								<select name="time" id="time" class="selectpicker"  required>
									<option value="" selected>How Long</option>
									<option value="00:15:00">0 hr : 15 min</option>
									<option value="00:30:00">0 hr : 30 min</option>
									<option value="00:45:00">0 hr : 45 min</option>

									<option value="01:00:00">1 hr : 00 min</option>
									<option value="01:15:00">1 hr : 15 min</option>
									<option value="01:30:00">1 hr : 30 min</option>
									<option value="01:45:00">1 hr : 45 min</option>

									<option value="02:00:00">2 hr : 00 min</option>
									<option value="02:15:00">2 hr : 15 min</option>
									<option value="02:30:00">2 hr : 30 min</option>
									<option value="02:45:00">2 hr : 45 min</option>

									<option value="03:00:00">3 hr : 00 min</option>
									<option value="03:15:00">3 hr : 15 min</option>
									<option value="03:30:00">3 hr : 30 min</option>
									<option value="03:45:00">3 hr : 45 min</option>

									<option value="04:00:00">4 hr : 00 min</option>
									<option value="04:15:00">4 hr : 15 min</option>
									<option value="04:30:00">4 hr : 30 min</option>
									<option value="04:45:00">4 hr : 45 min</option>

									<option value="05:00:00">5 hr : 00 min</option>
									<option value="05:15:00">5 hr : 15 min</option>
									<option value="05:30:00">5 hr : 30 min</option>
									<option value="05:45:00">5 hr : 45 min</option>

									<option value="06:00:00">6 hr : 00 min</option>
									<option value="06:15:00">6 hr : 15 min</option>
									<option value="06:30:00">6 hr : 30 min</option>
									<option value="06:45:00">6 hr : 45 min</option>

									<option value="07:00:00">7 hr : 00 min</option>
									<option value="07:15:00">7 hr : 15 min</option>
									<option value="07:30:00">7 hr : 30 min</option>
									<option value="07:45:00">7 hr : 45 min</option>

									<option value="08:00:00">8 hr : 00 min</option>
									<option value="08:15:00">8 hr : 15 min</option>
									<option value="08:30:00">8 hr : 30 min</option>
									<option value="08:45:00">8 hr : 45 min</option>

									<option value="09:00:00">9 hr : 00 min</option>
									<option value="09:15:00">9 hr : 15 min</option>
									<option value="09:30:00">9 hr : 30 min</option>
									<option value="09:45:00">9 hr : 45 min</option>

									<option value="10:00:00">10 hr : 00 min</option>
									<option value="10:15:00">10 hr : 15 min</option>
									<option value="10:30:00">10 hr : 30 min</option>
									<option value="10:45:00">10 hr : 45 min</option>

									<option value="11:00:00">11 hr : 00 min</option>
									<option value="11:15:00">11 hr : 15 min</option>
									<option value="11:30:00">11 hr : 30 min</option>
									<option value="11:45:00">11 hr : 45 min</option>

								</select>
							</div>
							<div class="clearfix"></div>
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
									<div class="list-lable" style="font-size: 13.94px;">My Hair Length</div>
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
									<div class="list-lable">My Hair Type</div>
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
											if( !empty($valcolor['Description'])) {
												?>
												<div><font style="background:<?php echo $valcolor['Description']; ?>;height:25px;width:25px;border-radius:50%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></div>
												<?php
											}   else {
												if($valcolor['HairColor'] == "Other"){
													echo '<div style="padding-top:4px;"><div style="border-radius: 50px;border-style: solid;border-width: 9px;border-bottom-color: red;border-left-color: green;border-right-color: blue;border-top-color: yellow;height: 6px;width: 0px;-webkit-transform: rotate(45deg);-moz-transform: rotate(45deg);-ms-transform: rotate(45deg);-o-transform: rotate(45deg);transform: rotate(45deg);"></div></div>';
												}else{
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
									<div class="list-lable add-services-hd-pad">Services</div>
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

<div class="modal fade add-services" id="edit-services" tabindex="-1" role="dialog" aria-labelledby="uploadPhotoLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

			<div class="modal-body">
				<h2 class="btmline">Edit Services</h2>
				<div class="close-btn"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
				<form id="editservices-form">
					<input type="hidden" id="id" name="id">
					<div class="row">
						<div class="col-md-4 paddingrightnone">

							<input type="file"  id="photos"  style="display:none;">
							<input type="hidden" name="photo" id="photo2ss">
							<div class="img-upload" style=""><i onclick="$('#photos').click()"  class="fa fa-camera" aria-hidden="true" style="background: black;padding: 10px;position: absolute;right: 10px;top: 10px;color: white;cursor:pointer;"></i>
								<div class="img-uploadd" style="height:220px;"></div>
							</div>  
							<div class="form-group">
								<input type="text" class="form-control inputfield-4" id="title" placeholder="Title" name="title" required>
							</div>
							<div>
								<textarea cols="" rows="" class="inputfield-4 textarea-img-upload" placeholder="Description" id="description" name="description"></textarea>
							</div>
							<div class="form-group mt-10">
								<input type="text" class="form-control inputfield-4" data-role="tagsinput" id="tags" placeholder="Tags" name="tags" id="tags">
							</div>

							<div class="form-group col-md-6  col-sm-6 col-xs-6 nopadding">
								<input type="text" class="form-control inputfield-4" placeholder="$ How Much" name="price" id="price" required>
							</div>
							<div class="form-group col-md-6  col-sm-6 col-xs-6 paddingrightnone" id="how-long">
								<select name="time" id="time" class="selectpicker" required>
									<option value="" selected>How Long</option>
									<option value="00:15:00">0 hr : 15 min</option>
									<option value="00:30:00">0 hr : 30 min</option>
									<option value="00:45:00">0 hr : 45 min</option>

									<option value="01:00:00">1 hr : 00 min</option>
									<option value="01:15:00">1 hr : 15 min</option>
									<option value="01:30:00">1 hr : 30 min</option>
									<option value="01:45:00">1 hr : 45 min</option>

									<option value="02:00:00">2 hr : 00 min</option>
									<option value="02:15:00">2 hr : 15 min</option>
									<option value="02:30:00">2 hr : 30 min</option>
									<option value="02:45:00">2 hr : 45 min</option>

									<option value="03:00:00">3 hr : 00 min</option>
									<option value="03:15:00">3 hr : 15 min</option>
									<option value="03:30:00">3 hr : 30 min</option>
									<option value="03:45:00">3 hr : 45 min</option>

									<option value="04:00:00">4 hr : 00 min</option>
									<option value="04:15:00">4 hr : 15 min</option>
									<option value="04:30:00">4 hr : 30 min</option>
									<option value="04:45:00">4 hr : 45 min</option>

									<option value="05:00:00">5 hr : 00 min</option>
									<option value="05:15:00">5 hr : 15 min</option>
									<option value="05:30:00">5 hr : 30 min</option>
									<option value="05:45:00">5 hr : 45 min</option>

									<option value="06:00:00">6 hr : 00 min</option>
									<option value="06:15:00">6 hr : 15 min</option>
									<option value="06:30:00">6 hr : 30 min</option>
									<option value="06:45:00">6 hr : 45 min</option>

									<option value="07:00:00">7 hr : 00 min</option>
									<option value="07:15:00">7 hr : 15 min</option>
									<option value="07:30:00">7 hr : 30 min</option>
									<option value="07:45:00">7 hr : 45 min</option>

									<option value="08:00:00">8 hr : 00 min</option>
									<option value="08:15:00">8 hr : 15 min</option>
									<option value="08:30:00">8 hr : 30 min</option>
									<option value="08:45:00">8 hr : 45 min</option>

									<option value="09:00:00">9 hr : 00 min</option>
									<option value="09:15:00">9 hr : 15 min</option>
									<option value="09:30:00">9 hr : 30 min</option>
									<option value="09:45:00">9 hr : 45 min</option>

									<option value="10:00:00">10 hr : 00 min</option>
									<option value="10:15:00">10 hr : 15 min</option>
									<option value="10:30:00">10 hr : 30 min</option>
									<option value="10:45:00">10 hr : 45 min</option>

									<option value="11:00:00">11 hr : 00 min</option>
									<option value="11:15:00">11 hr : 15 min</option>
									<option value="11:30:00">11 hr : 30 min</option>
									<option value="11:45:00">11 hr : 45 min</option>

								</select>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="col-md-8">
							<div class="row">
								<div class="col-md-3 col-sm-3 col-xs-6">
									<div class="list-lable">FOR</div>
									<?php
									foreach ($hair_for as $valfor) {
										?>
										<label class="pop-up-lables"><?php echo $valfor['HairFor']; ?>
											<input type="checkbox" name="fortype[]" value="<?php echo $valfor['HairForID']; ?>" class="fortype">
											<span class="checkmark-checkbox"></span>
										</label>
										<?php
									}
									?>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-6">
									<div class="list-lable" style="font-size: 13.94px;">My Hair Length</div>
									<?php
									foreach ($hair_length as $vallength) {
										?>
										<label class="pop-up-lables"><?php echo $vallength['HairLength']; ?>
											<input type="checkbox" name="hairlength[]"  value="<?php echo $vallength['HairLengthID']; ?>" class="hairlength">
											<span class="checkmark-checkbox"></span>
										</label>
										<?php
									}
									?>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-6">
									<div class="list-lable">My Hair Type</div>
									<?php
									foreach ($hair_type as $valtype) {
										?>
										<label class="pop-up-lables"><?php echo $valtype['HairType']; ?>
											<input type="checkbox" name="hairtype[]" value="<?php echo $valtype['HairTypeID']; ?>" class="hairtype">
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
											if( !empty($valcolor['Description'])) {
												?>
												<div><font style="background:<?php echo $valcolor['Description']; ?>;height:25px;width:25px;border-radius:50%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></div>
												<?php
											}   else {
												if($valcolor['HairColor'] == "Other"){
													echo '<div style="padding-top:4px;"><div style="border-radius: 50px;border-style: solid;border-width: 9px;border-bottom-color: red;border-left-color: green;border-right-color: blue;border-top-color: yellow;height: 6px;width: 0px;-webkit-transform: rotate(45deg);-moz-transform: rotate(45deg);-ms-transform: rotate(45deg);-o-transform: rotate(45deg);transform: rotate(45deg);"></div></div>';
												}else{
													echo $valcolor['HairColor'];
												}
											}
											?>
											<input type="checkbox" name="haircolor[]" value="<?php echo $valcolor['HairColorID']; ?>" class="haircolor">
											<span class="checkmark-checkbox"></span>
										</label>
										<?php
									}
									?>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="list-lable add-services-hd-pad">Services</div>
								</div>
								<?php
								foreach ($hair_servicemaster as $valservice) {
									?>
									<div class="col-md-3 col-sm-3 col-xs-6">
										<div class="color-height">
											<label class="pop-up-lables"><?php echo $valservice['ServiceName']; ?>
												<input type="checkbox" name="services[]" value="<?php echo $valservice['ServiceMasterID']; ?>" class="services">
												<span class="checkmark-checkbox"></span>
											</label>
										</div>
									</div>
									<?php
								}
								?>
								<div class="col-md-12 pad-top-15">
									<input type="submit" class="blk-btn" value="Upload">
									<!-- <a href="#" class="reset">Reset</a> -->
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>

		</div>
	</div>
</div>


<div class="modal fade specialities" id="specialities" tabindex="-1" role="dialog" aria-labelledby="specilitiesLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

			<div class="modal-body">
				<h2 class="btmline">Add Specialties</h2>
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
													echo '<div style="padding-top:4px;"><div style="border-radius: 50px;border-style: solid;border-width: 9px;border-bottom-color: red;border-left-color: green;border-right-color: blue;border-top-color: yellow;height: 6px;width: 0px;-webkit-transform: rotate(45deg);-moz-transform: rotate(45deg);-ms-transform: rotate(45deg);-o-transform: rotate(45deg);transform: rotate(45deg);"></div></div>';
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
								<div class="col-md-12 mt-30">
									<input type="submit" class="blk-btn" value="Save"> 
									<a href="#" class="reset" onclick="$('#specialities-form input').removeAttr('checked');">Reset</a>
								</div>
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

<div class="modal fade specialities" id="add-availability" tabindex="-1" role="dialog" aria-labelledby="specilitiesLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

			<div class="modal-body">
				<div class="close-btn"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
				<h2 class="btmline">Add Schedule</h2>
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
					<div class="mt-30">
						<input type="submit" class="blk-btn" value="Save"> 
					</div>
				</form>
			</div>

		</div>
	</div>
</div>

<div id="uploadimageModal1" class="modal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Upload & Crop Image</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12 text-center">
						<div id="image_demo"></div>
					</div>
					<div class="col-md-12 text-center" style="padding-top:30px;">
						<button class="btn btn-success crop_image1">Crop & Upload Image1</button>
						<button class="btn btn-success crop_image2">Crop & Upload Image2</button>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$("#availability-form").submit(function (e) {
		e.preventDefault();
		$.ajax({
			type: "POST",
			url: '<?php echo base_url("Myprofile/myAvailability"); ?>',
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
                	$("#add-availability").modal("hide");
                }else{
                	messageShow("Error!",obj.message,"red","Try-Again");
                }
            },
            complete: function(){
            	$('.ajax-loader').css("visibility", "hidden");
            }
        });
	});

	$("#professional-form").submit(function (e) {
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
                $("#Slug").css({"border":"1px solid #cccccc"});
                $(".errorslug").html("");
                var obj = JSON.parse(response);
                if(obj.status == "true") {
                	$("#profile-modal").modal("hide");
                	getproffessionaldetail(1111111);
                	messageShow("Success!",obj.message,"green","Success");
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

$("#profilePic").on('change',function () {
	if( $("#profilePic")[0].files.length >= 0) {

		var form_data = new FormData();
		for (var i = 0; i < $("#profilePic")[0].files.length; i++) {
			form_data.append('profilePic', $("#profilePic").prop('files')[i]);
		}
		$.ajax({
			type: "POST",
			url: '<?php echo base_url("Myprofile/myProfilePic"); ?>',
			data: form_data,
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
                    	$('.profilePic').attr('src',obj.image);
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

$("#services-form").submit(function (e) {
	e.preventDefault();
	$.ajax({
		type: "POST",
		url: '<?php echo base_url("services/addServices"); ?>',
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
            	$("#add-services").modal('hide');
            	$("#services-form")[0].reset();
            	messageShow("Success!",obj.message,"green","Success");
            	setTimeout(function() {
            		window.location.href="";
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

$("#editservices-form").submit(function (e) {
	e.preventDefault();
	$.ajax({
		type: "POST",
		url: '<?php echo base_url("services/editServices"); ?>',
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
            	$("#edit-services").modal('hide');
            	$("#editservices-form")[0].reset();
            	setTimeout(function() {
            		window.location.href="";
            	},1500);
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
get_services(0);
function get_services (page) {
	$.ajax({
		type: "GET",
		url: '<?php echo base_url("profile/getServices/"); ?>'+page,
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

					'<a href="javascript:void(0)" class="view-profile-galler" onclick="$(\'#confirm-modal1\').modal(\'show\');$(\'#confirm-modal1 .deleteservice\').attr(\'onclick\',\'deleteService(' +obj.data[i].ServiceID+ ');\');"><i class="fa fa-trash-o" aria-hidden="true"></i></a>'+

					'</div>' +
					'<div class="services-detail">' +
					'<div class="user-profile-name">'+obj.data[i].Title+'</div>' +
					'<p class="services-sort-p">'+obj.data[i].Description+'</p>' +
					'</div>' +
					'<div class="services-action">' +
					'<div class="rate">$'+obj.data[i].Price+'</div>' +
					'<a href="#" class="white-btn" data-toggle="modal" data-target="#edit-services" onclick="edit_services(' +obj.data[i].ServiceID+ ');$(\'.crop_image1\').hide();$(\'.crop_image2\').show();">Edit</a>' +
					'</div>' +
					'</div>';
				}
				if(html) {
					$(".servicelist").html(html);
					// var pagee = "";
					// var count = obj.total / 4;
					// if(count > 1) {
					// 	for (var i = 0; i < count ; i++) {
					// 		var activecheck = "";
					// 		if(i == page) {
					// 			activecheck = "activepage";
					// 		}
					// 		pagee = pagee + '<a href="javascript:void();" class="pagebox '+activecheck+'" onclick="get_services('+i+');">'+(i + 1)+'</a>';
					// 	}
					// 	$(".servicepage").html(pagee);
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
function edit_services (id) {
	$("#editservices-form")[0].reset();
	$("#editservices-form .img-upload").css({'background':'#fff url(<?php echo base_url(); ?>assets/img/img-upload.png) no-repeat scroll center 40%'});
	$("#id").val(id);
	$.ajax({
		type: "POST",
		url: '<?php echo base_url("services/getServices/"); ?>0',
		data:{id : id},
		beforeSend: function(){
			$('.ajax-loader').css("visibility", "visible");
		},
		success: function (response) {
			var obj = JSON.parse(response);
			var html = "";
			if(obj.data != "undefined" && obj.data) {
				$("#editservices-form")[0].reset();
				for (var i = 0; i < obj.data.length; i++) {
					$("#editservices-form #description").val(obj.data[i].Description);
					$("#editservices-form #title").val(obj.data[i].Title);
					$("#editservices-form #tags").val(obj.data[i].HasTag);
					$("#editservices-form #price").val(obj.data[i].Price);
					$("#editservices-form #time").val(obj.data[i].ServiceTime);
					$("#editservices-form .dropdown-toggle .filter-option .filter-option-inner-inner").html($("#editservices-form #time option[value='"+obj.data[i].ServiceTime+"']").html());

					$("#editservices-form .img-upload").css({'background':'#fff url(<?php echo base_url(); ?>'+obj.data[i].ServicePic+')'});
					$("#editservices-form .img-upload").css({'background-size':'100% 100%'});

					$("#editservices-form .fortype").removeAttr("checked");
					$("#editservices-form .hairlength").removeAttr("checked");
					$("#editservices-form .hairtype").removeAttr("checked");
					$("#editservices-form .haircolor").removeAttr("checked");
					$("#editservices-form .services").removeAttr("checked");

					if(obj.data[i].HairForID)
					{
						var ht = obj.data[i].HairForID.split(",");
						for (var ii = 0; ii < ht.length; ii++) {
							$("#editservices-form .fortype[value='"+ht[ii]+"']").attr("checked","true");
						}
					}
					if(obj.data[i].HairLengthID)
					{
						var ht = obj.data[i].HairLengthID.split(",");
						for (var ii = 0; ii < ht.length; ii++) {
							$("#editservices-form .hairlength[value='"+ht[ii]+"']").attr("checked","true");
						}
					}
					if(obj.data[i].HairTypeID)
					{
						var ht = obj.data[i].HairTypeID.split(",");
						for (var ii = 0; ii < ht.length; ii++) {
							$("#editservices-form .hairtype[value='"+ht[ii]+"']").attr("checked","true");
						}
					}
					if(obj.data[i].HairColorID)
					{
						var ht = obj.data[i].HairColorID.split(",");
						for (var ii = 0; ii < ht.length; ii++) {
							$("#editservices-form .haircolor[value='"+ht[ii]+"']").attr("checked","true");
						}
					}
					if(obj.data[i].ServiceMasterID)
					{
						var ht = obj.data[i].ServiceMasterID.split(",");
						for (var ii = 0; ii < ht.length; ii++) {
							$("#editservices-form .services[value='"+ht[ii]+"']").attr("checked","true");
						}
					}


				}
			}
		},
		complete: function(){
			$('.ajax-loader').css("visibility", "hidden");
		}
	});
}

function deleteService(id){
	<?php
	if(empty($user)) {
		?>
		$("#login-modal").modal('show');return false;
		<?php
	}
	?>
	$.ajax({
		type: "GET",
		url: '<?php echo base_url("services/deleteService/"); ?>'+id,
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

getproffessionaldetail(1111111);
function getproffessionaldetail (idd) {
	$.ajax({
		type: "GET",
		url: '<?php echo base_url("Myprofile/get_professional"); ?>',
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

				$("#instagram").val(obj.data.instagram);
				$("#facebook").val(obj.data.facebook);
				$("#twitter").val(obj.data.twitter);
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

$('#photo2').on('change', function(){
	var reader = new FileReader();
	reader.onload = function (event) {
		$image_crop.croppie('bind', {
			url: event.target.result
		}).then(function(){
			console.log('jQuery bind complete');
		});
	}
	reader.readAsDataURL(this.files[0]);
	$('#uploadimageModal1').modal('show');
});

$('.crop_image1').click(function(event){
	$image_crop.croppie('result', {
		type: 'canvas',
		size: 'viewport'
	}).then(function(response){
		$('#uploadimageModal1').modal('hide');
		$('#editservices-form .img-uploadd').html("");
		$('#services-form .img-upload').html("<img src='"+response+"' width='100%' style='height:inherit;'/>");
		$('#services-form .img-upload').css({"padding":"0px"});
		$('#photo2s').val(response);
		$(".add-services").css({"overflow-y":"auto"});
	})
});


$('#photos').on('change', function(){
	var reader = new FileReader();
	reader.onload = function (event) {
		$image_crop.croppie('bind', {
			url: event.target.result
		}).then(function(){
			console.log('jQuery bind completess');
		});
	}
	reader.readAsDataURL(this.files[0]);
	$('#uploadimageModal1').modal('show');
});

$('.crop_image2').click(function(event){
	$image_crop.croppie('result', {
		type: 'canvas',
		size: 'viewport'
	}).then(function(response){
		$('#uploadimageModal1').modal('hide');
		$('#services-form .img-upload').html('<div id="drop-area"><h3 class="drop-text">Click Here Upload Images</h3></div>');
		$('#editservices-form .img-uploadd').html("<img src='"+response+"' width='100%' style='height:inherit;'/>");
		$('#editservices-form .img-upload').css({"padding":"0px"});
		$('#photo2ss').val(response);
		$(".add-services").css({"overflow-y":"auto"});
	})
});
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
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgVT3RnQR58QkE74G8KIBjspAFkVVfrv4&libraries=places&callback=initAutocomplete" async defer></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVf8SiwSoZdlrtH0LeqKjvdPXLbw14N7g&libraries=places&callback=initAutocomplete" async defer></script> -->
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8pf6ZdFQj5qw7rc_HSGrhUwQKfIe9ICw&libraries=places&callback=initAutocomplete" async defer></script> -->