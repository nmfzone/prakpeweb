<?php
	include("../../config/autoload.php");
	session_start();
	$auth->isAllowed("AdminPage");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Artikel | Sistem Informasi Ikatan Alumni UII</title>

	<!--
		Stylesheet Area
	-->
	<link rel="stylesheet" type="text/css" href="<?php echo $app->base_url('public/assets/css/uiicss.css'); ?>">

	<!--
		Javascript Area
	-->
	<script type="text/javascript" src="<?php echo $app->base_url('public/assets/vendor/jquery/dist/jquery.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo $app->base_url('public/assets/js/articles.js'); ?>"></script>

</head>
<body>
	<div class="wrapper w80">
		<div id="post-area">
			<div id="post-message"></div>
		</div>		
	</div>
</body>
</html>