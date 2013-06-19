	<section class="container">
	
		<!-- Headings
			================================================== -->
		<section class="row-fluid">
			<h1 class="box-header"><span class="icon-signin"></span> Laporan Data Kunjungan | <?php echo $GLOBALS['site_title']; ?></h1>
			<div class="box">
				<div class="well">
					<?php echo form_open("admin/laporan_data_kunjungan/set"); ?>
					<input type="text" class="input-xlarge" id="bulan" name="bulan" value="<?php echo $bulan_cari; ?>" autocomplete="off" required />
					<select name="tunjangan">
					<?php
						foreach ($tunjangan->result_array() as $t) 
						{
							if($id_tunjangan==$t['id_tunjangan'])
							{
							?>
								<option value="<?php echo $t['id_tunjangan']; ?>" selected><?php echo $t['tunjangan']; ?></option>
							<?php
							}
							else
							{

								?>
								<option value="<?php echo $t['id_tunjangan']; ?>"><?php echo $t['tunjangan']; ?></option>
								<?php
							}
						}
					?>
					</select>
					<input type="submit" value="Lihat Laporan" class="btn btn-small" />
					<a class="btn btn-warning btn-small" href="<?php echo base_url(); ?>admin/laporan_data_kunjungan/cetak">Cetak Data</a>
					<?php echo form_close(); ?>
					<?php echo $data_retrieve; ?>
				</div>
			</div>
		</section>