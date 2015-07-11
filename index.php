<?php
	include("config/autoload.php");
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title><?php echo $equip->theSiteName('', ' | ') . $equip->theSlogan(); ?></title>
	
	<link href="<?php echo $app->base_url('public/assets/images/favicon.ico'); ?>" rel="shortcut icon" type="image/x-icon" />

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

	<?php
		if ($auth->check())
		{
	?>
		<style type="text/css">
			#home-media > .home-left {
				width: 100%;
			}
			#home-media > #home-right {
				display: none;
			}
		</style>
	<?php
		}
	?>

	<div class="wrapper w80" id="master">
		<div id='topbar'>
			<a href='#' id="home-clc">IKA UII</a>
			<a href='#' id="news-clc">News</a>
			<a href='#' id="profil-clc">Profil</a>
			<?php
				if ($auth->check())
				{
			?>
			<a href="<?php echo $app->base_url('logout.php'); ?>">Logout</a>
			<?php
				}
			?>
		</div>
		<div class='triangle-l'></div>
		<div class='triangle-r'></div>
		
		<div id="main">
			<div id="home-media">
				<div class="home-left">
					<img src="<?php echo $app->base_url('public/assets/images/uii.png'); ?>" width="200px">
					<br><br><br>
					<h1>Ikatan Alumni Universitas Islam Indonesia</h1>
				</div>

			<?php
				if (!$auth->check())
				{
			?>
				<div class="home-right">
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
				</div>
			<?php
				}
			?>
			</div>

			<div id="berita-terbaru">
				<h1>News from IKA UII</h1><br>
				<ul>
				<?php

					$dt = $db->select('artikel', '', "type = 'article'", 'id DESC');

					foreach ($dt['result'] as $data) {
						$dtt = $db->select('artikel', 'nama', 'id = ' . $data->id_user)['result'];
						echo "<li class='artikel-judul'>" . $data->judul . "</li>";
					}

				?>
				</ul>
			</div>

			<div id="profil-ika">
				<h1>Profil IKA UII</h1>
<br>
				<p>Universitas Islam Indonesia (UII) didirikan pada tanggal 8 Juli 1945 bertepatan dengan 27 Rajab 1364 Hijriah, Jadi persis 40 hari sebelum Indonesia merdeka. Semula UII dikenalkan dengan nama Sekolah Tinggi Islam (STI), dan berkedudukan di Jakarta, Tetapi karena terjadi agresi Belanda beberapa waktu setelah proklamasi kemederkaan dan mengingat pengurus STI saat itu terdiri dari pimpinan negara dan pemerintah, pada tahun 1946 STI hijrah ke Yogyakarta, mengikuti kepindahan ibukota Negara Republik Indonesia. Dalam perjalanannya pada tahun 1948, untuk meningkatkan fungsi STI maka nama STI berubah menjadi Universitas Islam Indonesia.
<br><br>
Organisasi alumni UII dilahirkan melalui musyawarah Dewan Mahasiswa dan Majelis Permusyawaratan Mahasiswa (DM dan MPM) yang dihadiri oleh beberapa alumni UII seperti Siswo Wiratmo, SH, Taufiq Halim, SH, Drs. Dairi Azis, Imam Suhadi, SH. dan M. Mansur, SH. Tanggal dilahirkan/didirikannya organisasi tersebut adalah tanggal 19 Mei 1967 yang bertepatan dengan 11 Safar 1387 H. Nama yang dipilih untuk organisasi tersebut adalah Keluarga Alumni Universitas Islam Indonesia yang kemudian lazim disingkat KA UII. Kelahiran Keluarga Alumni UII waktu itu telah disertai dengan perangkatnya yang utama yaitu Anggaran Dasar dan Pengurus (sementara) yang diketuai oleh Imam Suhadi, SH dengan Sekretaris Taufiq Halim, SH.</p>
			</div>

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