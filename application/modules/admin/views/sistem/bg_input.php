	<section class="container">
	
		<!-- Headings
			================================================== -->
		<section class="row-fluid">
			<h1 class="box-header"><span class="icon-wrench"></span> Sistem | <?php echo $GLOBALS['site_title']; ?></h1>
			<div class="box">
				<div class="well">
					<?php echo form_open_multipart("admin/sistem/simpan"); ?>
				
				<label for="title">Setting System</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="title" name="title" placeholder="Nama Pengaturan" value="<?php echo $title; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="tipe">Type</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="tipe" name="tipe" placeholder="Tipe" value="<?php echo $tipe; ?>" readonly="true" />
				<div class="cleaner_h10"></div>
				
				<label for="content_setting">Content of Setting</label>
				<div class="cleaner_h5"></div>
				<textarea name="content_setting" class="ckeditor"><?php echo $content_setting; ?></textarea>
				<div class="cleaner_h10"></div>
				
				<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
				<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />
				<div class="cleaner_h10"></div>
				<input type="submit" class="btn btn-info" value="SIMPAN" />
				<?php echo form_close(); ?>
				</div>
			</div>
		</section>