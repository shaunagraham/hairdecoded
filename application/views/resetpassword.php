<div class="navbg-gry"></div>
<div class="container" align="center">
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<h1>Reset your password</h1>
			<h5>Enter a new password for your account.</h5><br/>
			<form method="post" name="reset_form" class="reset_form">
				<input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
				<div class="form-group">
					<input type="password" name="password" class="form-control inputfield" id="password" placeholder="Choose a password" required>
				</div>
				<div class="form-group">
					<input type="password" name="cpassword" class="form-control inputfield" id="cpassword" placeholder="Confirm the password" required>
				</div>
				<div class="loginres">
					<div>

					</div>
				</div>
				<div class="login-btns clearfix" style="width:100%;">
					<input type="submit"  style="width:100%;" class="blk-btn pull-left" value="Submit">
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	$(".reset_form").submit(function (e) {
		e.preventDefault();
		if($("#password").val() != $("#cpassword").val()) {
			$(".loginres div").attr("class", "alert alert-danger");
			$(".loginres div").html("Invalid Confirm Password.");
			return false;
		}
		var $form = $(this);
		$.ajax({
			type: "POST",
			url: '<?php echo base_url("auth/resetpass"); ?>',
			data: $form.serialize(),
			dataType: "json",
			success: function (response) {
				if (response.status == "true") {
					$(".loginres div").attr("class", "alert alert-success");
					$(".loginres div").html(response.message);
					setTimeout(function () {
						$(".loginres").empty();
						$(".reset_form")[0].reset();
						$('#login-modal').modal('show');
					}, 1500)
				} else {
					$(".loginres div").attr("class", "alert alert-danger");
					$(".loginres div").html(response.message);
				}
			}
		});
	});
</script>