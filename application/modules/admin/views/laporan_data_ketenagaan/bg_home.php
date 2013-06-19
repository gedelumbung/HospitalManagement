	<section class="container">
	
		<!-- Headings
			================================================== -->
		<section class="row-fluid">
			<h1 class="box-header"><span class="icon-folder-open"></span> Laporan Data Ketenagaan | <?php echo $GLOBALS['site_title']; ?></h1>
			<div class="box">
				<div class="well">
					<a class="btn btn-warning" href="<?php echo base_url(); ?>admin/laporan_data_ketenagaan/cetak">Cetak Data</a>
					<?php echo $data_retrieve; ?>
				</div>
			</div>
		</section>