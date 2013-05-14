
	
	<script src="<?php echo base_url().'asset/theme/'; ?>/dashboard/js/modernizr-jquery.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url().'asset/theme/'; ?>/dashboard/js/adminflare-demo.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url().'asset/theme/'; ?>/dashboard/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url().'asset/theme/'; ?>/dashboard/js/adminflare.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>asset/ckeditor/ckeditor.js" type="text/javascript"></script>
	<script src="<?php echo base_url().'asset/theme/dashboard/'; ?>js/jquery-1.7.2.min.js"></script>
	<script src="<?php echo base_url().'asset/theme/dashboard/'; ?>js/jquery-ui-1.8.21.custom.min.js"></script>
	<link type="text/css" href="<?php echo base_url().'asset/theme/dashboard'; ?>/css/jquery-ui-1.7.2.custom.css" rel="stylesheet" />
	<script type="text/javascript">
	jQuery.noConflict();
	jQuery(document).ready(function(){
			$('#tgl_lahir').datepicker({ dateFormat: 'dd MM yy' });
			$('#tgl_masuk').datepicker({ dateFormat: 'dd MM yy' });
			$('#tgl_keluar').datepicker({ dateFormat: 'dd MM yy' });
		});
	</script>
		<footer id="main-footer">
			<?php echo $GLOBALS['site_footer']; ?>
		</footer>
		<!-- / Page footer -->
	</section>
</body>
</html>
