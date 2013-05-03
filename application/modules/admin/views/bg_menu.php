
	<!-- Main navigation bar
		================================================== -->
	<header class="navbar navbar-fixed-top" id="main-navbar">
		<div class="navbar-inner">
			<div class="container">
				<a class="logo" href="#"><img alt="Af_logo" src="<?php echo base_url().'asset/theme/'; ?>/dashboard/images/af-logo.png"></a>

				<a class="btn nav-button collapsed" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-reorder"></span>
				</a>

				<div class="nav-collapse collapse">
					<ul class="nav">
						<li class="divider-vertical"></li>
						<li class="active"><a href="<?php echo base_url(); ?>"><i class="icon-home"></i> Front Page</a></li>
						<li class="divider-vertical"></li>
						<li><a href="<?php echo base_url(); ?>admin/routing_pages"><i class="icon-fire"></i> Routing Pages</a></li>
						<li class="divider-vertical"></li>
						<li><a href="<?php echo base_url(); ?>admin/sistem"><i class="icon-wrench"></i> System</a></li>
						<li class="divider-vertical"></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-leaf"></i> Additional <i class=" icon-caret-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo base_url(); ?>admin/data_spesialis"><i class="icon-filter"></i> Data Spesialis</a></li>
								<li><a href="<?php echo base_url(); ?>admin/data_status"><i class="icon-eject"></i> Data Status</a></li>
								<li><a href="<?php echo base_url(); ?>admin/data_kategori_ruang"><i class="icon-check"></i> Data Kategori Ruang</a></li>
								<li class="divider"></li>
								<li><a href="<?php echo base_url(); ?>admin/data_buku_tamu"><i class="icon-comment"></i> Data Buku Tamu</a></li>
								<li><a href="<?php echo base_url(); ?>admin/data_contact"><i class="icon-envelope"></i> Data Contact Us</a></li>
								<li><a href="<?php echo base_url(); ?>admin/data_galeri"><i class="icon-picture"></i> Data Galeri</a></li>
							</ul>
						</li>
					</ul>
					<ul class="nav pull-right">
					<li class="divider-vertical"></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle usermenu" data-toggle="dropdown">
								<i class="icon-user"></i> <?php echo $this->session->userdata("nama_user_login"); ?> <i class=" icon-caret-down"></i>
							</a>
							<ul class="dropdown-menu">
								<li>
									<a href="<?php echo base_url(); ?>global/profil"><i class="icon-user"></i> Ubah Profil</a>
								</li>
								<li>
									<a href="<?php echo base_url(); ?>global/password"><i class="icon-wrench"></i> Ubah Password</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="<?php echo base_url(); ?>login/login/logout"><i class="icon-off"></i> Log Out</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</header>
	<!-- / Main navigation bar -->
	
	<!-- Left navigation panel
		================================================== -->
	<nav id="left-panel">
		<div id="left-panel-content">
			<ul>
				<li>
					<a href="<?php echo base_url(); ?>app_route"><span class="icon-dashboard"></span>Dashboard</a>
				</li>
				<li class="lp-dropdown">
					<a href="#" class="lp-dropdown-toggle" id="laporan"><span class="icon-file-alt"></span>Data Laporan</a>
					<ul class="lp-dropdown-menu simple" data-dropdown-owner="laporan">
						<li>
							<a href="<?php echo base_url(); ?>admin/laporan_fasilitas_ruang"><i class="icon-th"></i>&nbsp;&nbsp;Laporan Fasilitas Ruang</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>admin/laporan_data_kunjungan"><i class="icon-signin"></i>&nbsp;&nbsp;Laporan Data Kunjungan</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>admin/laporan_data_pasien"><i class="icon-file"></i>&nbsp;&nbsp;Laporan Data Pasien</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>admin/laporan_data_ketenagaan"><i class="icon-folder-open"></i>&nbsp;&nbsp;Laporan Data Ketenagaan</a>
						</li>
					</ul>
				</li>
				<li class="lp-dropdown">
					<a href="#" class="lp-dropdown-toggle" id="jadwal"><span class="icon-th-large"></span>Data Jadwal</a>
					<ul class="lp-dropdown-menu simple" data-dropdown-owner="jadwal">
						<li>
							<a href="<?php echo base_url(); ?>admin/jadwal_dokter"><i class="icon-hdd"></i>&nbsp;&nbsp;Data Jadwal Dokter</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>admin/jadwal_perawat"><i class="icon-folder-close"></i>&nbsp;&nbsp;Data Jadwal Perawat</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="<?php echo base_url(); ?>admin/data_dokter"><span class="icon-font"></span>Data Dokter</a>
				</li>
				<li>
					<a href="<?php echo base_url(); ?>admin/data_perawat"><span class="icon-edit"></span>Data Perawat</a>
				</li>
				<li>
					<a href="<?php echo base_url(); ?>admin/data_pasien"><span class="icon-table"></span>Data Pasien</a>
				</li>
				
				<li>
					<a href="<?php echo base_url(); ?>admin/ruang"><span class="icon-inbox"></span>Data Ruang</a>
				</li>
				<li>
					<a href="<?php echo base_url(); ?>admin/user"><span class="icon-cog"></span>Data User</a>
				</li>
			</ul>
		</div>
		<div class="icon-caret-down"></div>
		<div class="icon-caret-up"></div>
	</nav>