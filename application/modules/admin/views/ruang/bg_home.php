	<section class="container">
	
		<!-- Headings
			================================================== -->
		<section class="row-fluid">
			<h1 class="box-header"><span class="icon-inbox"></span> Data Ruang | <?php echo $GLOBALS['site_title']; ?></h1>
			<div class="box">
				<div class="well">
					<?php echo form_open_multipart("admin/ruang/set"); ?>
					<label for="menu">Pencarian Data</label>
					<div class="cleaner_h5"></div>
					<input type="search" style="width:90%;" name="cari" placeholder="Pencarian data..." value="<?php echo $cari; ?>" />
					<div class="cleaner_h0"></div>
					<input type="submit" class="btn btn-info" value="Cari Data" />
					<?php echo form_close(); ?>

					<?php echo $data_retrieve; ?>
				</div>
			</div>
		</section>