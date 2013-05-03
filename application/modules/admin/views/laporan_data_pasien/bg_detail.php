	<section class="container">
	
		<!-- Headings
			================================================== -->
		<section class="row-fluid">
			<h1 class="box-header"><span class="icon-file"></span> Laporan Data Pasien | <?php echo $GLOBALS['site_title']; ?></h1>
			<div class="box">
				<div class="well">
				
				<label for="menu">Ruangan</label>
				<div class="cleaner_h5"></div>
				<select name="id_ruang" disabled>
					<?php
						foreach($ruang->result_array() as $k)
						{
							if($id_ruang==$k['id_ruang'])
							{
					?>
								<option value="<?php echo $k['id_ruang'].'-'.$k['id_kategori_ruang']; ?>" selected="selected"><?php echo $k['nama_ruang']; ?></option>
					<?php
							}
							else
							{
					?>
								<option value="<?php echo $k['id_ruang'].'-'.$k['id_kategori_ruang']; ?>"><?php echo $k['nama_ruang']; ?></option>
					<?php
							}
						}
					?>
				</select>
				<div class="cleaner_h10"></div>
				
				<label for="menu">Dokter</label>
				<div class="cleaner_h5"></div>
				<select name="id_dokter" disabled>
					<?php
						foreach($dokter->result_array() as $k)
						{
							if($id_dokter==$k['id_dokter'])
							{
					?>
								<option value="<?php echo $k['id_dokter']; ?>" selected="selected"><?php echo $k['nama_dokter']; ?></option>
					<?php
							}
							else
							{
					?>
								<option value="<?php echo $k['id_dokter']; ?>"><?php echo $k['nama_dokter']; ?></option>
					<?php
							}
						}
					?>
				</select>
				<div class="cleaner_h10"></div>
				
				<label for="menu">Nama Pasien</label>
				<div class="cleaner_h5"></div>
				<input disabled type="search" style="width:90%;" id="nama_pasien" name="nama_pasien" placeholder="Nama Pasien" value="<?php echo $nama_pasien; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Tanggal Lahir</label>
				<div class="cleaner_h5"></div>
				<input disabled type="search" style="width:90%;" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir" value="<?php echo $tgl_lahir; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Tempat Lahir</label>
				<div class="cleaner_h5"></div>
				<input disabled type="search" style="width:90%;" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Jenis Kelamin</label>
				<div class="cleaner_h5"></div>
				<select name="jk" disabled>
					<?php
						$l=''; $p=''; 
						if($jk=="L"){ $l='selected'; $p=''; }
						else if($jk=="P"){ $l=''; $p='selected'; }
					?>
					<option value="L" <?php echo $l; ?>>Laki-Laki</option>
					<option value="P" <?php echo $p; ?>>Perempuan</option>
				</select>
				<div class="cleaner_h10"></div>
				
				<label for="menu">Usia</label>
				<div class="cleaner_h5"></div>
				<input disabled type="search" style="width:90%;" id="usia" name="usia" placeholder="Usia" value="<?php echo $usia; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Alamat</label>
				<div class="cleaner_h5"></div>
				<?php echo $alamat; ?>
				<div class="cleaner_h10"></div>
				
				<label for="menu">Jenis Penyakit</label>
				<div class="cleaner_h5"></div>
				<input disabled type="search" style="width:90%;" id="jenis_penyakit" name="jenis_penyakit" placeholder="Jenis Penyakit" value="<?php echo $jenis_penyakit; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Tanggal Masuk</label>
				<div class="cleaner_h5"></div>
				<input disabled type="search" style="width:90%;" id="tgl_masuk" name="tgl_masuk" placeholder="Tanggal Masuk" value="<?php echo $tgl_masuk; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Tanggal Keluar</label>
				<div class="cleaner_h5"></div>
				<input disabled type="search" style="width:90%;" id="tgl_keluar" name="tgl_keluar" placeholder="Tanggal Keluar" value="<?php echo $tgl_keluar; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Biaya</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" readonly="true" id="biaya" name="biaya" placeholder="Biaya" value="<?php echo "Rp. ".number_format($biaya,2,",","."); ?>" />
				<div class="cleaner_h10"></div>

				</div>
			</div>
		</section>