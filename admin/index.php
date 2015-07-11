<?php
	include("../config/autoload.php");
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
	<link rel="stylesheet" type="text/css" href="<?php echo $app->base_url('public/assets/css/fonts.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo $app->base_url('public/assets/css/uiicss.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo $app->base_url('public/assets/css/admin.css'); ?>">

	<!--
		Javascript Area
	-->
	<script type="text/javascript" src="<?php echo $app->base_url('public/assets/vendor/jquery/dist/jquery.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo $app->base_url('public/assets/js/admin.js'); ?>"></script>

</head>
<body>
	
	<?php include($ROOT_PATH. 'admin/layouts/navbar.php'); ?>

	<div class="wrapper w80">
		<div class="dashboard">
			<div class="new-status">
				<h1>Recent Statuses</h1>

				<?php

					$dt = $db->select('status', '', '', 'id DESC');

					foreach ($dt['result'] as $data) {
						$dtt = $db->select('user', 'nama', 'id = ' . $data->id_user)['result'][0];
						echo "<div class='status-" . $data->id . " status-area'>";
						echo "<div class='status-name'>" . $dtt->nama . "</div>";
						echo "<div class='status-contents'>" . $data->isi . "</div>";
						echo "</div>";
					}

				?>
			</div>

			<div class="new-komentar">
				<h1>Recent Comments</h1>

				<?php

					$dt = $db->select('komentar', '', '', 'id DESC');

					foreach ($dt['result'] as $data) {
						$dtt = $db->select('user', 'nama', 'id = ' . $data->id_user)['result'][0];
						echo "<div class='comment-" . $data->id_status . "-" . $data->id ." comment-area'>";
						echo "<div class='comment-name'>" . $dtt->nama . "</div>";
						echo "<div class='comment-contents'>" . $data->isi . "</div>";
						echo "</div>";
					}

				?>
			</div>
		</div>
	</div>
</body>
</html>