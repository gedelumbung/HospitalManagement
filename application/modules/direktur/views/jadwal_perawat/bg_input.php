	<section class="container">
	
		<!-- Headings
			================================================== -->
		<section class="row-fluid">
			<h1 class="box-header"><span class="icon-folder-close"></span> Data Perawat | <?php echo $GLOBALS['site_title']; ?></h1>
			<div class="box">
				<div class="well">
					<?php echo form_open_multipart("direktur/jadwal_perawat/simpan"); ?>
				
				
				<label for="menu">Perawat</label>
				<div class="cleaner_h5"></div>
				<select name="id_perawat">
					<?php
						foreach($perawat->result_array() as $k)
						{
							if($id_perawat==$k['id_perawat'])
							{
					?>
								<option value="<?php echo $k['id_perawat']; ?>" selected="selected"><?php echo $k['nama_perawat']; ?></option>
					<?php
							}
							else
							{
					?>
								<option value="<?php echo $k['id_perawat']; ?>"><?php echo $k['nama_perawat']; ?></option>
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