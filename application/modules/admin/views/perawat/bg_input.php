	<section class="container">
	
		<!-- Headings
			================================================== -->
		<section class="row-fluid">
			<h1 class="box-header"><span class="icon-edit"></span> Data Perawat | <?php echo $GLOBALS['site_title']; ?></h1>
			<div class="box">
				<div class="well">
					<?php echo form_open_multipart("admin/data_perawat/simpan"); ?>
				
				<label for="menu">Status</label>
				<div class="cleaner_h5"></div>
				<select name="id_status">
					<?php
						foreach($status->result_array() as $k)
						{
							if($id_status==$k['id_status'])
							{
					?>
								<option value="<?php echo $k['id_status']; ?>" selected="selected"><?php echo $k['status']; ?></option>
					<?php
							}
							else
							{
					?>
								<option value="<?php echo $k['id_status']; ?>"><?php echo $k['status']; ?></option>
					<?php
							}
						}
					?>
				</select>
				<div class="cleaner_h10"></div>
				
				<label for="menu">Spesialis</label>
				<div class="cleaner_h5"></div>
				<select name="id_spesialis">
					<?php
						foreach($spesialis->result_array() as $k)
						{
							if($id_spesialis==$k['id_spesialis'])
							{
					?>
								<option value="<?php echo $k['id_spesialis']; ?>" selected="selected"><?php echo $k['spesialis']; ?></option>
					<?php
							}
							else
							{
					?>
								<option value="<?php echo $k['id_spesialis']; ?>"><?php echo $k['spesialis']; ?></option>
					<?php
							}
						}
					?>
				</select>
				<div class="cleaner_h10"></div>
				
				<label for="menu">Nama perawat</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="nama_perawat" name="nama_perawat" placeholder="Nama perawat" value="<?php echo $nama_perawat; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">NIP</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="nip" name="nip" placeholder="NIP" value="<?php echo $nip; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Jenis Kelamin</label>
				<div class="cleaner_h5"></div>
				<select name="jk">
					<?php
						$l=''; $p=''; 
						if($jk=="L"){ $l='selected'; $p=''; }
						else if($jk=="P"){ $l=''; $p='selected'; }
					?>
					<option value="L" <?php echo $l; ?>>Laki-Laki</option>
					<option value="P" <?php echo $p; ?>>Perempuan</option>
				</select>
				<div class="cleaner_h10"></div>
				
				<label for="menu">Golongan</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="golongan" name="golongan" placeholder="Golongan" value="<?php echo $golongan; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Alamat</label>
				<div class="cleaner_h5"></div>
				<textarea name="alamat" class="ckeditor" cols="50" rows="6"><?php echo $alamat; ?></textarea>
				<div class="cleaner_h10"></div>
				
				<label for="menu">Telepon</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="telepon" name="telepon" placeholder="Telepon" value="<?php echo $telepon; ?>" />
				<div class="cleaner_h10"></div>
				
				<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
				<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />
				<div class="cleaner_h10"></div>
				<input type="submit" class="btn btn-info" value="SIMPAN" />
				<?php echo form_close(); ?>
				</div>
			</div>
		</section>