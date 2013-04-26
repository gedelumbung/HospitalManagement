	<section class="container">
	
		<!-- Headings
			================================================== -->
		<section class="row-fluid">
			<h1 class="box-header"><span class="icon-eject"></span> Kategori Ruang | <?php echo $GLOBALS['site_title']; ?></h1>
			<div class="box">
				<div class="well">
					<?php echo form_open_multipart("admin/data_kategori_ruang/simpan"); ?>
				
				<label for="menu">Kategori Ruang</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="kategori_ruang" name="kategori_ruang" placeholder="Kategori Ruang" value="<?php echo $kategori_ruang; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu2">Biaya Ruang</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="biaya_ruang" name="biaya_ruang" placeholder="Biaya Ruang" value="<?php echo $biaya_ruang; ?>" />
				<div class="cleaner_h10"></div>
				
				<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
				<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />
				<div class="cleaner_h10"></div>
				<input type="submit" class="btn btn-info" value="SIMPAN" />
				<?php echo form_close(); ?>
				</div>
			</div>
		</section>