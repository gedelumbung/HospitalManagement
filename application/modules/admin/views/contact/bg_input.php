	<section class="container">
	
		<!-- Headings
			================================================== -->
		<section class="row-fluid">
			<h1 class="box-header"><span class="icon-envelope"></span> Contact Us | <?php echo $GLOBALS['site_title']; ?></h1>
			<div class="box">
				<div class="well">
					<?php echo form_open_multipart("admin/data_contact/simpan"); ?>
				
				<label for="menu">Nama</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="nama" name="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu2">Email</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="email" name="email" placeholder="Email" value="<?php echo $email; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu2">Telepon</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="telepon" name="telepon" placeholder="Telepon" value="<?php echo $telepon; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu2">Alamat</label>
				<div class="cleaner_h5"></div>
				<textarea name="alamat" class="ckeditor" cols="50" rows="6"><?php echo $alamat; ?></textarea>
				<div class="cleaner_h10"></div>
				
				<label for="content">Pesan</label>
				<div class="cleaner_h5"></div>
				<textarea name="pesan" class="ckeditor" cols="50" rows="6"><?php echo $pesan; ?></textarea>
				<div class="cleaner_h10"></div>
				
				<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
				<div class="cleaner_h10"></div>
				<input type="submit" class="btn btn-info" value="SIMPAN" />
				<?php echo form_close(); ?>
				</div>
			</div>
		</section>