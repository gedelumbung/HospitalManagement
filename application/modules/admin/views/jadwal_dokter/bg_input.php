	<section class="container">
	
		<!-- Headings
			================================================== -->
		<section class="row-fluid">
			<h1 class="box-header"><span class="icon-hdd"></span> Data Dokter | <?php echo $GLOBALS['site_title']; ?></h1>
			<div class="box">
				<div class="well">
					<?php echo form_open_multipart("admin/jadwal_dokter/simpan"); ?>
				
				
				<label for="menu">dokter</label>
				<div class="cleaner_h5"></div>
				<select name="id_dokter">
					<?php
						foreach($dokter->result_array() as $k)
						{
							if($id_dokter==$k['id_dokter'])
							{
					?>
								<option value="<?php echo $k['id_dokter']; ?>" selected="selected"><?php echo $k['nama_dokter']; ?></option>
					<?php
							}
							else
							{
					?>
								<option value="<?php echo $k['id_dokter']; ?>"><?php echo $k['nama_dokter']; ?></option>
					<?php
							}
						}
					?>
				</select>
				<div class="cleaner_h10"></div>
				
				<label for="menu">Shift</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="shift" name="shift" placeholder="Shift" value="<?php echo $shift; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Hari</label>
				<div class="cleaner_h5"></div>
				<input type="hari" style="width:90%;" id="hari" name="hari" placeholder="Hari" value="<?php echo $hari; ?>" />
				<div class="cleaner_h10"></div>
				
				<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
				<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />
				<div class="cleaner_h10"></div>
				<input type="submit" class="btn btn-info" value="SIMPAN" />
				<?php echo form_close(); ?>
				</div>
			</div>
		</section>