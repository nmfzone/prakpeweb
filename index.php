<?php
	include("config/autoload.php");
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title><?php echo $equip->theSiteName('', ' | ') . $equip->theSlogan(); ?></title>
	
	<!--
		Stylesheet Area
	-->
	<link rel="stylesheet" type="text/css" href="<?php echo $app->base_url('public/assets/css/fonts.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo $app->base_url('public/assets/css/uiicss.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo $app->base_url('public/assets/css/style.css'); ?>">

	<!--
		Javascript Area
	-->
	<script type="text/javascript" src="<?php echo $app->base_url('public/assets/vendor/jquery/dist/jquery.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo $app->base_url('public/assets/js/site.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo $app->base_url('public/assets/js/login.js'); ?>"></script>

</head>
<body>
	<div class="wrapper w80">
		<div id='topbar'>
			<a href='#'>IKA UII</a>
			<a href='#' >News</a>
			<a href='#' title='Panduan Download'>Profil</a>
			<a href='#' title='MP3 Legal'>Agenda</a>
			<a href='#' title='Video Klip'>Join Komunitas</a>
		</div>
		<div class='triangle-l'></div>
		<div class='triangle-r'></div>
		
		<div id="main">
		<?php
			if (!$auth->check())
			{
		?>

			<div id="login-area">
				<div id="login-message"></div>
				<form method="POST" action="<?php echo $app->base_url('login.php'); ?>" id="uii-form" class="login">
					<div class="uii-input-control">
						<label for="username">Username</label>
						<input type="text" name="username" placeholder="NIM" class="uii-input" required="required">
					</div>

					<div class="uii-input-control">
						<label for="password">Password</label>
						<input type="password" name="password" placeholder="Password" class="uii-input" required="required">
					</div>

					<button class="uii-button button-login">Login</button>
				</form>
			</div>
			
		<?php
			}
			else
			{
		?>
			<a href="<?php echo $app->base_url('logout.php'); ?>">Logout</a>
		<?php
			}
		?>

		</div>
	
		<div class="bottom">
			<div id="footer">
				<?php echo $equip->theCopy('',' ') . $equip->theSiteName(); ?>

			</div>
			<div class='triangle-l'></div>
			<div class='triangle-r'></div>
		</div>
	</div> <!-- END of Wrapper -->
</body>
</html>