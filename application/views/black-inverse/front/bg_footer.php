
					

					<section class="testimonial">
						<h2><?php echo $GLOBALS['site_quotes']; ?></h2>

						<p><strong class="quote">"</strong><?php echo $GLOBALS['site_welcome']; ?>"</p>

						<p class="author"><strong>Kepala Rumah Sakit <?php echo $GLOBALS['site_title']; ?></strong></p>
					</section>
				</div>
				<!-- end of main -->
				<div class="socials">
					<div class="socials-inner">
						<h3>Follow us</h3>
						<ul>
							<li><a href="#" class="facebook-ico"><span></span>Facebook</a></li>
							<li><a href="#" class="twitter-ico"><span></span>Twitter</a></li>
							<li><a href="#" class="rss-feed-ico"><span></span>Rss-feed</a></li>
							<li><a href="#" class="myspace-ico"><span></span>myspace</a></li>
							<li><a href="#" class="john-doe-123-ico"><span></span>john.doe.123</a></li>
						</ul>
						<div class="cl">&nbsp;</div>
					</div>
				</div>
				<div id="footer">
					<div class="footer-cols">
						<div class="col">
							<h2>Statistik Kunjungan</h2>
							<?php
								$data["browser"] = $this->agent->browser().' '.$this->agent->version();
								$data["os"] = $this->agent->platform();
								$data["counter_pengunjung"] = $this->db->get("dlmbg_counter")->num_rows();
								setcookie("pengunjung", "sudah berkunjung", time() + 900 * 24);
								if (!isset($_COOKIE["pengunjung"])) {
									$d_in['ip_address'] = $_SERVER['REMOTE_ADDR'];
									$d_in['tanggal'] = gmdate("d-M-Y H:i:s",time()+3600*9);
									$this->db->insert("dlmbg_counter",$d_in);
								}
							?>
							<ul>
								<li><?php echo $data["counter_pengunjung"]; ?> Kali Kunjungan</li>
							</ul>
						</div>
						<div class="col">
							<h2>Sistem Operasi</h2>
							<ul>
								<li><?php echo $data["os"]; ?></li>
							</ul>
							<h2>Jenis Browser</h2>
							<ul>
								<li><?php echo $data["browser"]; ?></li>
							</ul>
						</div>
						<div class="col">
						<h2>Kalender</h2>
						<input type="text" id="example1" style="width:200px;" />
						<div class="cleaner_h60"></div>
						</div>

						<div class="cl">&nbsp;</div>
						<div class="cleaner_h60"></div>
						<div class="cleaner_h60"></div>
					</div>
					<!-- end of footer-cols -->
					<div class="footer-bottom">
						<nav class="footer-nav">
							<?php echo $menu_atas; ?>
						</nav>						<div class="cl">&nbsp;</div>
					</div>
				</div>
			</div>
			<!-- end of container -->	
		</div>
		<!-- end of shell -->	
	</div>
	<!-- end of wrapper -->
</body>
</html>