<?php include 'header.php'; ?>
	
  <script type="text/javascript" src="assets/js/plugins/visualization/echarts/echarts.js"></script>

	<!-- Page header -->
	<div class="page-header mw-200">
		<!-- <div class="gradient-overlay">
		</div> -->
		<div class="img-overlay bg-gradient" style="background-image: url('assets/images/backgrounds/kantor-bupati.jpg');">
			<div class="page-header-content">
				<div class="page-title align-center">
					<div class="h-50">E-PEMBANGUNAN KABUPATEN BADUNG</div>
					<h4>
						<i class="icon-home2 position-left"></i>
						<a href="index.php"><span class="text-semibold white-link">Beranda </span></a>
						<i class="icon-arrow-right32"></i>
						<i class="icon-design position-left"></i>
						<span class="text-semibold"> RASK</span> 
					</h4>
				</div>
			</div>
		</div>
	</div>
	<!-- /page header -->


	<!-- Page container -->
	<div class="page-container mt-20">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title"><i class="icon-search4 mr-10"></i><strong>Pengadaan Melalui Kontrak</strong></h5>
								<div class="heading-elements">
									<ul class="icons-list">
                		<li><a data-action="collapse"></a></li>
                	</ul>
              	</div>
							</div>
							<div class="panel-body">
								<div class="row">
									<form class="form-vertical" action="#">
								    <div class="form-group">
								    	<div style="margin-bottom: 10px;" class="col-md-2">
								    		<label class="control-label">Kode Urusan</label>
							          <select name="select" class="form-control input-xs">
							              <option value="opt1">Semua</option>
							              <option value="opt2">1 - Urusan Wajib Pelayanan Dasar</option>
							              <option value="opt3">2 - Urusan Wajib Bukan Pelayanan Dasar</option>
							              <option value="opt4">3 - Urusan Pilihan</option>
							              <option value="opt4">4 - Fungsi Penunjang Urusan Pemerintahan</option>
							          </select>
							        </div>
								    </div>
								    <div class="form-group">
								    	<div style="margin-bottom: 10px;" class="col-md-2">
								    		<label class="control-label">Kode Bidang</label>
							          <select name="select" class="form-control input-xs">
							              <option value="opt1">Semua</option>
							              <option value="opt2">1.01 - Pendidikan</option>
							              <option value="opt3">1.02 - Kesehatan</option>
							              <option value="opt4">1.03 - Pekerjaan Umum dan Penataan Ruang</option>
							              <option value="opt4">1.04 - Perumahan Rakyat dan Kawasan Permukiman</option>
							          </select>
							        </div>
								    </div>
								    <div class="form-group">
								    	<div style="margin-bottom: 10px;" class="col-md-2">
								    		<label class="control-label">Kode Unit</label>
							          <select name="select" class="form-control input-xs">
							              <option value="opt1">Semua</option>
							              <option value="opt2">1.01.01 - Dinas Pendidikan, Kepemudaan dan Olah Raga</option>
							              <option value="opt3">1.02.01 - Dinas Kesehatan</option>
							              <option value="opt4">1.02.02 - Rumah Sakit Umum Daerah</option>
							              <option value="opt4">1.03.01 - Perumahan Rakyat dan Kawasan Permukiman</option>
							          </select>
							        </div>
								    </div>
								    <div class="form-group">
								    	<div style="margin-bottom: 10px;" class="col-md-2">
								    		<label class="control-label">Kode Sub-Unit</label>
							          <select name="select" class="form-control input-xs">
							              <option value="opt1">Semua</option>
							              <option value="opt2">1.01.01.01 - Dinas Pendidikan, Kepemudaan dan Olah Raga</option>
							              <option value="opt3">1.02.01.01 - Dinas Kesehatan</option>
							              <option value="opt4">1.02.02.01 - Rumah Sakit Umum Daerah</option>
							              <option value="opt4">1.03.01.01 - Dinas Perumahan Rakyat dan Kawasan Permukiman</option>
							          </select>
							        </div>
								    </div>
								    <div class="form-group">
								    	<div style="margin-bottom: 10px;" class="col-md-2">
								    		<label class="control-label">Kode Program</label>
							          <select name="select" class="form-control input-xs">
							              <option value="opt1">Semua</option>
							              <option value="opt2">1.01.01 - Program Pelayanan Administrasi Perkantoran</option>
							              <option value="opt3">1.02.01 - Program Peningkatan Sarana dan Prasarana Aparatur </option>
							              <option value="opt4">1.02.02 - Program Peningkatan Disiplin Aparatur</option>
							              <option value="opt4">1.03.01 - Program fasilitasi pindah/purna tugas PNS</option>
							          </select>
							        </div>
								    </div>
								    <div class="form-group">
								    	<div style="margin-bottom: 10px;" class="col-md-2">
								    		<label class="control-label">Kode Kegiatan</label>
							          <select name="select" class="form-control input-xs">
							              <option value="opt1">Semua</option>
							              <option value="opt2">1.01.01.02 - Penyediaan Jasa Komunikasi Sumber Daya Air dan listrik</option>
							              <option value="opt3">1.01.01.07 - Penyediaan Jasa Adminstrasi Keuangan</option>
							              <option value="opt4">1.01.01.08 - Penyediaan Jasa Penjaga Malam, dan Sopir</option>
							              <option value="opt4">1.01.01.10 - Penyediaan Alat Tulis Kantor</option>
							          </select>
							        </div>
								    </div>
										<div class="form-group">
											<div class="col-md-2">
												<label class="control-label">Nama Kegiatan</label>
												<input placeholder="misal : Pengadaan Kendaraan Dinas/Operasional" type="text" class="form-control input-xs">
											</div>
										</div>
								    <div class="form-group">
								    	<div style="margin-bottom: 10px;" class="col-md-2">
								    		<label class="control-label">Jenis Pengadaan</label>
							          <select name="select" class="form-control input-xs">
							              <option value="opt1">Semua</option>
							              <option value="opt2">Barang</option>
							              <option value="opt3">Konstruksi</option>
							              <option value="opt4">Jasa</option>
							              <option value="opt4">Jasa Lainnya</option>
							              <option value="opt4">Swakelola</option>
							          </select>
							        </div>
								    </div>
										<div class="form-group">
											<div class="col-md-2">
												<label class="control-label">Pelaksana</label>
												<input placeholder="misal : Pengadaan Kendaraan Dinas/Operasional" type="text" class="form-control input-xs">
											</div>
										</div>
								    <div class="form-group">
								    	<div class="col-md-1">
								    		<button class="btn btn-xs btn-red mt-26" type="submit"><i class="icon-search4"></i></button>
								    	</div>
								    </div>
									</form>
								</div>
        				<div class="table-responsive mt-30">
									<table class="table">
										<thead>
											<tr class="table-gradient">
												<th>#</th>
												<th>Kode Rekening</th>
												<th>Jenis Pengadaan</th>
												<th>Nama Kegiatan</th>
												<th>Tanggal Mulai</th>
												<th>Tanggal Selesai</th>
												<th>Lama Pekerjaan</th>
												<th>Nilai Kontrak</th>
												<th>Pelaksana</th>
											</tr>
										</thead>
										<tbody>
											<tr style="text-align: center;">
											</tr>
											<tr>
												<td>1</td>	
												<td>4.01.03.01.02.05</td>	
												<td>Barang</td>
												<td>Pengadaan Kendaraan Dinas/Operasional</td>
												<td>01-04-2017</td>	
												<td>01-08-2017</td>	
												<td>90 Hari</td>	
												<td>Rp. 33,99 Miliar</td>		
												<td>Pelaksana</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

	<script>
    $(document).ready(function(){
      $("#kontrak").addClass("active");
    });
  </script>
	<script type="text/javascript" src="assets/js/pages/extra_trees.js"></script>
<?php include 'footer.php'; ?>