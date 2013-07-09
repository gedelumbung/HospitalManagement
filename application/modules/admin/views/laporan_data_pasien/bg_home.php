	<section class="container">
	
		<!-- Headings
			================================================== -->
		<section class="row-fluid">
			<h1 class="box-header"><span class="icon-file"></span> Laporan Data Pasien | <?php echo $GLOBALS['site_title']; ?></h1>
			<div class="box">
				<div class="well">
					<a class="btn btn-warning" href="<?php echo base_url(); ?>admin/laporan_data_pasien/cetak">Cetak Data</a>
					<?php echo form_open("admin/laporan_data_pasien/cari"); ?>
						<select name="cari">
							<option value="semua">Semua</option>
							<option value="anak">Anak-Anak</option>
							<option value="remaja">Remaja</option>
							<option value="dewasa">Dewasa</option>
							<option value="tua">Orang Tua</option>
						</select>
						<input type="submit" class="btn">
					<?php echo form_close(); ?>
					<?php echo $data_retrieve; ?>
				</div>
			</div>
		</section>