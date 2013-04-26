	<section class="container">
	
		<!-- Headings
			================================================== -->
		<section class="row-fluid">
			<h1 class="box-header"><span class="icon-inbox"></span> Data Ruang | <?php echo $GLOBALS['site_title']; ?></h1>
			<div class="box">
				<div class="well">
					<?php echo form_open_multipart("admin/ruang/simpan"); ?>
				
				<label for="menu">Nama Ruang</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="nama_ruang" name="nama_ruang" placeholder="Nama Ruang" value="<?php echo $nama_ruang; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Status Ruangan</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="status_ruangan" name="status_ruangan" placeholder="Status Ruangan" value="<?php echo $status_ruangan; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Fasilitas Ruangan</label>
				<div class="cleaner_h5"></div>
				<textarea name="fasilitas_ruangan" class="ckeditor" cols="50" rows="6"><?php echo $fasilitas_ruangan; ?></textarea>
				<div class="cleaner_h10"></div>
				
				<label for="menu">Kategori Ruangan</label>
				<div class="cleaner_h5"></div>
				<select name="id_kategori_ruang">
					<?php
						foreach($kat->result_array() as $k)
						{
							if($id_kategori_ruang==$k['id_kategori_ruang'])
							{
					?>
								<option value="<?php echo $k['id_kategori_ruang']; ?>" selected="selected"><?php echo $k['kategori_ruang']; ?></option>
					<?php
							}
							else
							{
					?>
								<option value="<?php echo $k['id_kategori_ruang']; ?>"><?php echo $k['kategori_ruang']; ?></option>
					<?php
							}
						}
					?>
				</select>
				<div class="cleaner_h10"></div>
				
				<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
				<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />
				<div class="cleaner_h10"></div>
				<input type="submit" class="btn btn-info" value="SIMPAN" />
				<?php echo form_close(); ?>
				</div>
			</div>
		</section>