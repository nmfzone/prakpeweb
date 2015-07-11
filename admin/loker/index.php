<?php
	include("../../config/autoload.php");
	session_start();
	$auth->isAllowed("AdminPage");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Management Lowongan Kerja | Sistem Informasi Ikatan Alumni UII</title>

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
	<script type="text/javascript" src="<?php echo $app->base_url('public/assets/js/loker.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo $app->base_url('public/assets/js/admin.js'); ?>"></script>

</head>
<body>

	<?php include($ROOT_PATH. 'admin/layouts/navbar.php'); ?>

	<div class="wrapper w80">
		<div id="post-area">
			<div id="post-message"><?php if (isset($_GET['msg'])) echo $_GET['msg']; ?></div>

			<div class="tambah-artikel"><a href="<?php echo $app->base_url('admin/loker/create.php'); ?>">Tambah Lowongan Kerja</a></div>
			<br>
			<table id="list-articles">
				<tr>
					<th>No.</th>
					<th>ID</th>
					<th>Judul</th>
					<th>Isi</th>
					<th>Author</th>
					<th>Published At</th>
					<th>Last Edited</th>
					<th>Action</th>
				</tr>
			<?php
				$dt = $db->select('artikel', '', "type = 'loker'");

				$i = 1;
				foreach ($dt['result'] as $data) {
					$dtt = $db->select('user', 'nama', 'id = ' . $data->id_user)['result'][0];
					echo "<tr>";
					echo "<td>" . $i . "</td>";
					echo "<td>" . $data->id . "</td>";
					echo "<td>" . $data->judul . "</td>";
					echo "<td>" . $data->isi . "</td>";
					echo "<td>" . $dtt->nama . "</td>";
					echo "<td>" . $data->published_at . "</td>";
					echo "<td>" . $data->last_edited . "</td>";
					echo "<td><div class='post-action'><div class='edit'><a href='" . $app->base_url("admin/loker/edit.php?id=$data->id") . "'>Edit</a></div><div class='delete'><form method='POST' id='form-delete' action='" . $app->base_url('admin/loker/lokerControl.php') . "'><input type='hidden' name='id' value='" . $data->id . "'><input type='hidden' name='actionType' value='delete'><button type='submit'>x</button></form></div></div></td>";
					echo "</tr>";
					$i++;
				}
			?>
			</table>
		</div>
	</div>
</body>
</html>