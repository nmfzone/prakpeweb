<div id="navbar">
	<div class="nav-left">
		<ul>
			<li><a href="<?php echo $app->base_url(''); ?>">IKA UII</a></li>
			<li><a href="<?php echo $app->base_url('admin'); ?>">Dashboard</a></li>
			<li><a href="<?php echo $app->base_url('admin/articles'); ?>">Management Artikel</a></li>
			<li><a href="<?php echo $app->base_url('admin/loker'); ?>">Management Lowongan Kerja</a></li>
			<li><a href="<?php echo $app->base_url('admin/member'); ?>">Management Member</a></li>
		</ul>
	</div>
	<div class="nav-right">
		<div>
			<?php
				echo "Howdy, " . $auth->get()->nama;
			?>
			<!-- <b class="caret"></b> -->

			<div class="dropdown drop-right">
				<span class="arrow top"></span>
				<ul>
					<li><a href="#">Keluar</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div style="clear: both"></div>
<br><br><br><br><br><br>