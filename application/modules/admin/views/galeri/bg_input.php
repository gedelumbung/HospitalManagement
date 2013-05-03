	<section class="container">
	
		<!-- Headings
			================================================== -->
		<section class="row-fluid">
			<h1 class="box-header"><span class="icon-picture"></span>  Galeri | <?php echo $GLOBALS['site_title']; ?></h1>
			<div class="box">
				<div class="well">
					<?php echo form_open_multipart("admin/data_galeri/simpan"); ?>
				
				<label for="menu">Judul</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="judul" name="judul" placeholder="Judul" value="<?php echo $judul; ?>" />
				<div class="cleaner_h10"></div>
				
				<?php if($gambar!=""){ ?>
				<label for="menu2">Gambar</label>
				<div class="cleaner_h5"></div>
				<img src='<?php echo base_url(); ?>asset/galeri/<?php echo $gambar; ?>'>
				<div class="cleaner_h10"></div>
				<?php } ?>
				
				<label for="menu2">File</label>
				<div class="cleaner_h5"></div>
				<input type="file" id="userfile" name="userfile" />
				<div class="cleaner_h10"></div>
				
				<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
				<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />
				<div class="cleaner_h10"></div>
				<input type="submit" class="btn btn-info" value="SIMPAN" />
				<?php echo form_close(); ?>
				</div>
			</div>
		</section>