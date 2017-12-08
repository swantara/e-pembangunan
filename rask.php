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
								<h5 class="panel-title"><i class="icon-design mr-10"></i><strong>Rencana Anggaran Satuan Kerja</strong></h5>
								<div class="heading-elements">
									<ul class="icons-list">
                		<li><a data-action="reload"></a></li>
                		<li><a data-action="collapse"></a></li>
                	</ul>
              	</div>
							</div>
							<div class="panel-body">
        				<div class="chart-container">
									<div style="height: 200px !important;" class="chart has-fixed-height" id="basic_bars"></div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title"><i class="icon-search4 mr-10"></i><strong>Rencana Anggaran Satuan Kerja</strong></h5>
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
												<th>Nama Kegiatan</th>
												<th>Sebelum Perubahan</th>
												<th>Setelah Perubahan</th>
												<th>Selisih</th>
												<th>Persentase</th>
											</tr>
										</thead>
										<tbody>
											<tr style="text-align: center;">
											</tr>
											<tr>
												<td>1</td>	
												<td>4.01.03.01.02.05</td>	
												<td>Barang</td>
												<td>Rp. 561,79 Miliar</td>	
												<td>Rp. 578.2 Miliar</td>		
												<td>Rp. 16,31 Miliar</td>		
												<td>2%</td>
											</tr>
											<tr>
												<td>2</td>	
												<td>4.01.03.01.02.05</td>	
												<td>Barang</td>
												<td>Rp. 561,79 Miliar</td>	
												<td>Rp. 578.2 Miliar</td>		
												<td>Rp. 16,31 Miliar</td>		
												<td>2%</td>
											</tr>
											<tr>
												<td>3</td>	
												<td>4.01.03.01.02.05</td>	
												<td>Barang</td>
												<td>Rp. 561,79 Miliar</td>	
												<td>Rp. 578.2 Miliar</td>		
												<td>Rp. 16,31 Miliar</td>		
												<td>2%</td>
											</tr>
											<tr>
												<td>4</td>	
												<td>4.01.03.01.02.05</td>	
												<td>Barang</td>
												<td>Rp. 561,79 Miliar</td>	
												<td>Rp. 578.2 Miliar</td>		
												<td>Rp. 16,31 Miliar</td>		
												<td>2%</td>
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

  <!-- page script -->
  <script>
  	$(function () {

		    // Set paths
		    // ------------------------------

		    require.config({
		        paths: {
		            echarts: 'assets/js/plugins/visualization/echarts'
		        }
		    });


		    // Configuration
		    // ------------------------------

		    require(
		        [
		            'echarts',
		            'echarts/theme/limitless',
		            'echarts/chart/bar',
		            'echarts/chart/line'
		        ],


		        // Charts setup
		        function (ec, limitless) {

		            // Initialize charts
		            // ------------------------------

		            var basic_bars = ec.init(document.getElementById('basic_bars'), limitless);


		            // Charts setup
		            // ------------------------------

		            //
		            // Basic bars options
		            //

		            basic_bars_options = {

		                // Setup grid
		                grid: {
		                    x: 75,
		                    x2: 35,
		                    y: 35,
		                    y2: 25
		                },

		                // Add tooltip
		                tooltip: {
		                    trigger: 'axis',
		                    axisPointer: {
		                        type: 'shadow'
		                    }
		                },

		                // Add legend
		                legend: {
		                    data: ['Induk', 'Perubahan']
		                },

		                // Enable drag recalculate
		                calculable: true,

		                // Horizontal axis
		                xAxis: [{
		                    type: 'value',
		                    boundaryGap: [0, 0.01]
		                }],

		                // Vertical axis
		                yAxis: [{
		                    type: 'category',
		                    data: ['RASK']
		                }],

		                // Add series
		                series: [
		                    {
		                        name: 'Induk',
		                        type: 'bar',
		                        itemStyle: {
		                            normal: {
		                                color: '#a0d0e0'
		                            }
		                        },
		                        data: [56.18]
		                    },
		                    {
		                        name: 'Perubahan',
		                        type: 'bar',
		                        itemStyle: {
		                            normal: {
		                                color: '#b9e0a0'
		                            }
		                        },
		                        data: [54.8]
		                    }
		                ]
		            };

		            // Apply options
		            // ------------------------------

		            basic_bars.setOption(basic_bars_options);

		            // Resize charts
		            // ------------------------------

		            window.onresize = function () {
		                setTimeout(function (){
		                    basic_bars.resize();
		                }, 200);
		            }
		        }
		    );
		});

  </script>
	<script>
    $(document).ready(function(){
      $("#rask").addClass("active");
    });
  </script>
	<script type="text/javascript" src="assets/js/pages/extra_trees.js"></script>
<?php include 'footer.php'; ?>