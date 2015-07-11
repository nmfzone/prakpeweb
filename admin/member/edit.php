<?php
	include("../../config/autoload.php");
	session_start();
	$auth->isAllowed("AdminPage");

	if (isset($_GET['id']))
	{
		$artikelId = $_GET['id'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Edit Artikel | Sistem Informasi Ikatan Alumni UII</title>

	<link href="<?php echo $app->base_url('public/assets/images/favicon.ico'); ?>" rel="shortcut icon" type="image/x-icon" />

	<!--
		Stylesheet Area
	-->
	<link rel="stylesheet" type="text/css" href="<?php echo $app->base_url('public/assets/css/fonts.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo $app->base_url('public/assets/css/uiicss.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo $app->base_url('public/assets/css/admin.css'); ?>">

	<!--
		Javascript Area
	-->
	<script type="text/javascript" src="<?php echo $app->base_url('public/assets/vendor/jquery/dist/jquery.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo $app->base_url('public/assets/js/articles.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo $app->base_url('public/assets/js/admin.js'); ?>"></script>

</head>
<body>
	
	<?php include($ROOT_PATH. 'admin/layouts/navbar.php'); ?>

	<div class="wrapper w80">
		<div id="edit-area">
			<div id="post-message"></div>
				<form action="<?php echo $app->base_url('admin/articles/articlesControl.php'); ?>" method="POST" id="uii-form" class="articles-edit">
				<?php

					$dt = $db->select('artikel', '', 'id = '. $artikelId);

					foreach ($dt['result'] as $data) {
				?>
					<div class="uii-input-control">
						<label for="title">Title</label>
						<input type="text" name="title" class="uii-input" required="required" value="<?php echo $data->judul; ?>">
					</div>

					<div class="uii-input-control">
						<label for="contents">Content</label>
						<textarea name="contents" class="uii-textarea"><?php echo $data->isi; ?></textarea>
					</div>

					<input type="hidden" name="actionType" value="edit">
					<input type="hidden" name="id" value="<?php echo $artikelId; ?>">

				<?php
					}
				?>

					<button class="uii-button button-post">Post</button>
				</form>
			</div>
		</div>
	</div>

</body>
</html> 