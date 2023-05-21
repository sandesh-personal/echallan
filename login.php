<?php
include "connect.php";
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from p.w3layouts.com/demos_new/template_demo/10-02-2018/donuts_login_form-demo_Free/1224104968/web/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 May 2018 02:38:29 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
	<?php
	$result = $db->prepare("SELECT * FROM site_settings WHERE id=1");
	$result->execute();
	for ($i = 0; $row = $result->fetch(); $i++) {
	?>
		<title><?php echo $row['site_name']; ?></title>
		<!-- Meta tags -->
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Donuts Login Form Responsive Widget, Audio and Video players, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
	<?php } ?>
	<!-- Meta tags -->
	<!-- font-awesome icons -->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css" />
	<!-- //font-awesome icons -->
	<!--stylesheets-->
	<link href="assets/css/style.css" rel='stylesheet' type='text/css' media="all">
	<!--//style sheet end here-->
	<link href="http://fonts.googleapis.com/css?family=Merienda+One" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet">

</head>

<body>

	<div class="swm-right-w3ls">
		<form action="login2.php" method="post">
			<!-- <div class=" header-side">
									
									
								</div> -->
			<div class="content">
				<div class="icon-head">
					<h2>Admin Login</h2>
				</div>
				<div class="form-left-w3l">
					<input type="text" name="username" placeholder="Username" required="">
					<div class="clear"></div>
				</div>
				<div class="form-right-w3ls ">
					<input type="password" name="pass" placeholder="Password" required="">
					<div class="clear"></div>
				</div>
				<div class="btnn">
					<button type="submit">Login</button>
					<br>

				</div>
			</div>
		</form>


		<div class="copy">
			<?php
			$result = $db->prepare("SELECT * FROM site_settings WHERE id=1");
			$result->execute();
			for ($i = 0; $row = $result->fetch(); $i++) { ?>
				<p>&copy;2022 <?php echo $row['site_name']; ?> | Design by
					<a href="http://www.sandeshkoirala.com.np/" target="_blank">sandesh koirala</a>
				</p>
			<?php } ?>
		</div>
	</div>
</body>

</html>