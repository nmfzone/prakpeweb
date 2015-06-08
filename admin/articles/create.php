<?php
	include("../../config/autoload.php");
	session_start();
	$auth->isAllowed("AdminPage");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Tambah Artikel | Sistem Informasi Ikatan Alumni UII</title>

	<!--
		Stylesheet Area
	-->
	<link rel="stylesheet" type="text/css" href="<?php echo $app->base_url('public/assets/css/uiicss.css'); ?>">

	<!--
		Javascript Area
	-->
	<script type="text/javascript" src="<?php echo $app->base_url('public/assets/vendor/jquery/dist/jquery.min.js'); ?>"></script>
</head>
<body>
	<?php
		echo "Howdy, " . $auth->getName();
	?>
</body>
</html> 