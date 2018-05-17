<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $judul_halaman; ?></title>

	<!-- Site favicon -->
	<!-- <link rel="shortcut icon" href="images/favicon.ico"> -->

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="<?php echo base_url('resources/admin/'); ?>vendors/styles/style.css">
	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
</head>
<body>
	<div class="login-wrap customscroll d-flex align-items-center flex-wrap justify-content-center pd-20">
		<div class="login-box bg-white box-shadow pd-30 border-radius-5">
			<img src="<?php echo base_url('resources/admin/') ?>vendors/images/login-img.png" alt="login" class="login-img">
			<h2 class="text-center mb-30">Login</h2>
			<form method="post" action="<?php echo base_url('login/auth'); ?>" id="formLogin">
				<div class="input-group custom input-group-lg">
					<input type="text" class="form-control" placeholder="Username" name="username">
					<div class="input-group-append custom">
						<span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
					</div>
				</div>
				<div class="input-group custom input-group-lg">
					<input type="password" class="form-control" placeholder="**********" name="password">
					<div class="input-group-append custom">
						<span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="input-group">
							<button class="btn btn-outline-primary btn-lg btn-block" type="submit">Masuk</button>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="forgot-password padding-top-10"><a href="forgot-password.php">Lupa password</a></div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<script src="<?php echo base_url('resources/admin/'); ?>vendors/scripts/script.js"></script>
</body>
</html>

<script>
	$('#formLogin').submit(function (e) {
	e.preventDefault();
	var url = $(this).attr('action');
	var data = $(this).serialize();
	$.ajax({
		url: url,
		data: data,
		type: 'post',
		dataType: 'json',
		beforeSend: function () {
			/* body... */
		},
		success: function (response) {
			switch (response.pesan) {
				case 1:
					window.location.href="<?php echo base_url(); ?>"+response.redirect;
					break;
				case 2:
					window.location.href="<?php echo base_url(); ?>"+response.redirect;
					break;
				default:
					alert(response.pesan);
					break;
			}
		}
	})
})
</script>