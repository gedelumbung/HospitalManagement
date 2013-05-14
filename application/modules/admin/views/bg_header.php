
<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>
		<?php echo $GLOBALS['site_title'].' - '.$GLOBALS['site_quotes']; ?>
	</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">

	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url().'asset/theme/'; ?>/dashboard/css/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" id="bootstrap-css">
	<link href="<?php echo base_url().'asset/theme/'; ?>/dashboard/css/adminflare.min.css" media="all" rel="stylesheet" type="text/css" id="adminflare-css">
	
	<script src="<?php echo base_url().'asset/theme/'; ?>/dashboard/js/jquery-1.7.2.min.js"></script>
	<script src="<?php echo base_url().'asset/theme/'; ?>/dashboard/js/jquery-ui-1.8.21.custom.min.js"></script>
	<link type="text/css" href="<?php echo base_url().'asset/theme/'; ?>/dashboard/css/jquery-ui-1.7.2.custom.css" rel="stylesheet" />

	<script type="text/javascript">
		$(function(){
			$('#bulan').datepicker( {
				changeMonth: true,
				changeYear: true,
				showButtonPanel: true,
				dateFormat: 'MM yy',
				onClose: function(dateText, inst) { 
					var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
					var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
					$(this).datepicker('setDate', new Date(year, month, 1));
				}
			});
		});
	</script>
</head>
<body onload="peta_awal()">