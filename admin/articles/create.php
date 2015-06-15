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
	<script type="text/javascript" src="<?php echo $app->base_url('public/assets/js/articles.js'); ?>"></script>

</head>
<body>
	<?php
		echo "Howdy, " . $auth->get()->name . "<br/><br/><br/>";
	?>
	<div class="wrapper w80">
		<div id="post-area">
			<div id="post-message"></div>
				<form action="<?php echo $app->base_url('admin/articles/articlesControl.php'); ?>" method="POST" id="uii-form" class="articles">
					<div class="uii-input-control">
						<label for="title">Title</label>
						<input type="text" name="title" placeholder="Enter title here" class="uii-input" required="required">
					</div>

					<div class="uii-input-control">
						<label for="contents">Content</label>
						<textarea name="contents" class="uii-textarea"></textarea>
					</div>

					<input type="hidden" name="type" value="article">
					<input type="hidden" name="actionType" value="create">

					<button class="uii-button button-post">Post</button>
				</form>
			</div>
		</div>
	</div>

</body>
</html> 