<script type="text/javascript" src="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/js/mapjs/prototype.js"></script>    
<script type="text/javascript" src="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/js/mapjs/scriptaculous.js?load=effects"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/js/mapjs/wz_jsgraphics.js"></script>
<script class="javascript" src="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/js/mapjs/shCore.js"></script>
<script class="javascript" src="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/js/mapjs/shBrushXml.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/js/mapjs/imagemapcreator.js"></script>	
	<section class="container">
	
		<!-- Headings
			================================================== -->
		<section class="row-fluid">
			<h1 class="box-header"><span class="icon-th"></span> Denah Ruang | <?php echo $GLOBALS['site_title']; ?></h1>
			<div class="box">
				<div class="well">
					<?php echo form_open_multipart("admin/denah_ruang/simpan"); ?>
				<style>
				    #map {
				    	cursor:crosshair;
				    	position:relative;
				    	text-align: center;
				    	margin: 0px auto;
				    	width:1000px; 
				    	height:1000px;
				    	background-color:#f0f0f0;
				    	border:1px solid black;
				    	background-repeat:no-repeat;
				    	margin-top:30px;
				    	margin-bottom:30px;
				    	background-image:url("<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/images/peta_tambah.jpg");
				    }
				</style>
				<div id="map"></div>
		<a href="" id="delete" style="display:block"></a>
				
				<label for="menu">Nama Ruang</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="judul" name="judul" placeholder="Nama Ruang" value="<?php echo $judul; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Koordinat</label>
				<div class="cleaner_h5"></div>
				<textarea style="width:400px; height150px;" id="code" name="koordinat"><?php echo $koordinat; ?></textarea>
				<div class="cleaner_h10"></div>
				
				<label for="menu">Keterangan</label>
				<div class="cleaner_h5"></div>
				<textarea name="keterangan" class="ckeditor" cols="50" rows="6"><?php echo $keterangan; ?></textarea>
				<div class="cleaner_h10"></div>
				
				<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
				<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />
				<div class="cleaner_h10"></div>
				<input type="submit" class="btn btn-info" value="SIMPAN" />
				<?php echo form_close(); ?>
				</div>
				
			</div>
		</section>