	<section class="container">
	
		<!-- Headings
			================================================== -->
		<section class="row-fluid">
			<h1 class="box-header"><span class="icon-dashboard"></span> Dashboard | <?php echo $GLOBALS['site_title']; ?></h1>
			<div class="box">
				<div class="well">
					Welcome, <strong><?php echo $this->session->userdata("nama_user_login"); ?></strong>. 
					Your privilage as <strong><?php echo $this->session->userdata("level"); ?></strong>
				</div>
			</div>
		</section>