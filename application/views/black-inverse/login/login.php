<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title><?php echo $GLOBALS['site_title'].' - '.$GLOBALS['site_quotes']; ?></title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" /> 
    
	<link href="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet" />
		
	<link href="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/css/signin.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/css/chosen.css" rel="stylesheet" type="text/css" />
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body>

<div class="account-container">
	
	<div class="content clearfix">
		
		<?php echo form_open("login/act"); ?>
		
			<h1><?php echo $GLOBALS['site_title']; ?></h1>		
			
			<div class="login-fields">
				
				<p>Enter your username & password to access Dashboard</p>
				
				<p><?php echo $this->session->flashdata("result_login"); ?>
				
				<div class="field">
					<label for="username">Username:</label>
					<input type="text" id="username" name="username" value="" placeholder="Username..." class="login username-field" required />
				</div> <!-- /field -->
				
				<div class="field">
					<label for="password">Password:</label>
					<input type="password" id="password" name="password" value="" placeholder="Password..." class="login password-field" required />
				</div> <!-- /password -->
				
				<div class="field" style="height:35px;">
					<select data-placeholder="Level Access..." class="chzn-select" style="width:320px;" tabindex="2" name="st" id="st" required>
          				<option value=""></option> 
						<option value="admin">Admin</option>
						<option value="direktur">Direktur</option>
						<option value="perawat">Perawat</option>
					</select>
				</div>
				
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
									
				<input type="submit" class="button btn btn-warning btn-large" value="Sign In"> <input type="reset" class="button btn btn-default btn-large" value="Reset">
				
			</div>
				<p align="center"><?php echo $GLOBALS['site_footer']; ?></p>
			
		<?php echo form_close(); ?>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->

	<script src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/js/jquery-1.7.2.min.js"></script>
	<script src="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/js/chosen.jquery.js" type="text/javascript"></script>
	<script type="text/javascript"> 
		$(".chzn-select").chosen();
	</script>

</body>
</html>
