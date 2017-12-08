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
						<span class="text-semibold">Beranda</span> - Dashboard
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
									<div style="height: 1200px !important;" class="chart has-fixed-height" id="basic_bars"></div>
								</div>
        				<div class="table-responsive mt-30">
									<table class="table">
										<thead>
											<tr class="table-gradient">
												<th>#</th>
												<th>Organisasi Perangkat Daerah</th>
												<th>Sebelum Perubahan (Miliar)</th>
												<th>Setelah Perubahan (Miliar)</th>
												<th>Selisih (Miliar)</th>
												<th>Persentase</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1</td>	
												<td>Barang</td>	
												<td>Rp. 561,79 Miliar</td>	
												<td>Rp. 578.2 Miliar</td>		
												<td>Rp. 16,31 Miliar</td>		
												<td>2%</td>
											</tr>
											<tr>
												<td>2</td>	
												<td>Konstruksi</td>
												<td>Rp. 1.688,91 Miliar</td>	
												<td>Rp. 1.670,8 Miliar</td>		
												<td>Rp. 16.31 Miliar</td>		
												<td>3,2%</td>													
											</tr>
											<tr>
												<td>3</td>	
												<td>Konsultasi</td>
												<td>Rp. 51,11 Miliar</td>	
												<td>Rp. 48,9 Miliar</td>		
												<td>Rp. 2,21 Miliar</td>		
												<td>1,5%</td>		
											</tr>
											<tr>
												<td>4</td>	
												<td>Jasa Lainnya</td>
												<td>Rp. 56,18 Miliar</td>	
												<td>Rp. 54,8 Miliar</td>		
												<td>Rp. 2,1 Miliar</td>		
												<td>1,3%</td>		
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title"><i class="icon-stats-growth mr-10"></i><strong>Progres Keuangan</strong></h5>
								<div class="heading-elements">
									<ul class="icons-list">
                		<li><a data-action="collapse"></a></li>
                	</ul>
              	</div>
							</div>
							<div class="panel-body">
        				<div class="chart" id="line-chart" style="height: 300px;"></div>
        				<div class="table-responsive mt-30">
									<table class="table">
										<thead>
											<tr class="table-gradient">
												<th>Keterangan</th>
												<th>Tahun</th>
												<th>B01</th>
												<th>B02</th>
												<th>B03</th>
												<th>B04</th>
												<th>B05</th>
												<th>B06</th>
												<th>B07</th>
												<th>B08</th>
												<th>B09</th>
												<th>B010</th>
												<th>B011</th>
												<th>B012</th>
											</tr>
										</thead>
										<tbody>
											<tr style="text-align: center;">
											</tr>
											<tr>
												<td><span class="pill-green">Target</span></td>
												<td>2017</td>	
												<td>8.12%</td>	
												<td>21.05%</td>	
												<td>34.91%</td>	
												<td>45.02%</td>	
												<td>49.19%</td>		
												<td>56.44%</td>		
												<td>67.26%</td>			
												<td>78.512%</td>		
												<td>86.15%</td>	
												<td>91.62%</td>
												<td>97.94%</td>
												<td>100%</td>
											</tr>
											<tr>
												<td><span class="pill-blue">Realisasi</span></td>
												<td>2017</td>
												<td>2.34%</td>
												<td>3.67%</td>
												<td>7.01%</td>
												<td>8.10%</td>
												<td>13.80%</td>
												<td>25.77%</td>
												<td>33.68%</td>
												<td>39.02%</td>
												<td>45.10%</td>
												<td>56.43%</td>
												<td>-</td>
												<td>-</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title"><i class="icon-clipboard2 mr-10"></i><strong>Progres Fisik</strong></h5>
								<div class="heading-elements">
									<ul class="icons-list">
                		<li><a data-action="collapse"></a></li>
                	</ul>
              	</div>
							</div>
							<div class="panel-body">
        				<div class="chart" id="line-chart2" style="height: 300px;"></div>
        				<div class="table-responsive mt-30">
									<table class="table">
										<thead>
											<tr class="table-gradient">
												<th>Keterangan</th>
												<th>Tahun</th>
												<th>B01</th>
												<th>B02</th>
												<th>B03</th>
												<th>B04</th>
												<th>B05</th>
												<th>B06</th>
												<th>B07</th>
												<th>B08</th>
												<th>B09</th>
												<th>B010</th>
												<th>B011</th>
												<th>B012</th>
											</tr>
										</thead>
										<tbody>
											<tr style="text-align: center;">
											</tr>
											<tr>
												<td><span class="pill-green">Target</span></td>
												<td>2017</td>	
												<td>8.12%</td>	
												<td>21.05%</td>	
												<td>34.91%</td>	
												<td>45.02%</td>	
												<td>49.19%</td>		
												<td>56.44%</td>		
												<td>67.26%</td>			
												<td>78.512%</td>		
												<td>86.15%</td>	
												<td>91.62%</td>
												<td>97.94%</td>
												<td>100%</td>
											</tr>
											<tr>
												<td><span class="pill-blue">Realisasi</span></td>
												<td>2017</td>
												<td>2.34%</td>
												<td>3.67%</td>
												<td>7.01%</td>
												<td>8.10%</td>
												<td>13.80%</td>
												<td>25.77%</td>
												<td>33.68%</td>
												<td>39.02%</td>
												<td>45.10%</td>
												<td>56.43%</td>
												<td>-</td>
												<td>-</td>
											</tr>
											<tr>
												<td><span class="pill-yellow">Deviasi</span></td>
												<td>2017</td>
												<td>2.34%</td>
												<td>3.67%</td>
												<td>7.01%</td>
												<td>8.10%</td>
												<td>13.80%</td>
												<td>25.77%</td>
												<td>33.68%</td>
												<td>39.02%</td>
												<td>45.10%</td>
												<td>56.43%</td>
												<td>-</td>
												<td>-</td>
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
	    "use strict";

	    // LINE CHART 1
	    var line = new Morris.Line({
	      element: 'line-chart',
	      resize: true,
	      data: [
	        {y: '2017-01', item1: 8.12, item2: 2.34},
	        {y: '2017-02', item1: 21.05, item2: 3.67},
	        {y: '2017-03', item1: 34.91, item2: 7.01},
	        {y: '2017-04', item1: 45.02, item2: 8.10},
	        {y: '2017-05', item1: 49.19, item2: 13.80},
	        {y: '2017-06', item1: 56.44, item2: 25.77},
	        {y: '2017-07', item1: 67.26, item2: 33.68},
	        {y: '2017-08', item1: 78.51, item2: 39.02},
	        {y: '2017-09', item1: 86.15, item2: 45.10},
	        {y: '2017-10', item1: 91.62, item2: 56.43},
	        {y: '2017-11', item1: 97.94},
	        {y: '2017-12', item1: 100}
	      ],
	      xkey: 'y',
	      ykeys: ['item1', 'item2'],
	      labels: ['Target', 'Realisasi'],
	      lineColors: ['#b9e0a0', '#a0d0e0'],
	      hideHover: 'auto',
	      postUnits: '%',
	      xLabels : 'month'
	    });

	    // LINE CHART 2
	    var line2 = new Morris.Line({
	      element: 'line-chart2',
	      resize: true,
	      data: [
	        {y: '2017-01', item1b: 9.31, item2b: 2.02, item3b: -7.02},
	        {y: '2017-02', item1b: 23.93, item2b: 4.20, item3b: 7.02},
	        {y: '2017-03', item1b: 39.80, item2b: 8.04, item3b: 10.02},
	        {y: '2017-04', item1b: 51.46, item2b: 9.35, item3b: 10.02},
	        {y: '2017-05', item1b: 56.58, item2b: 16.65, item3b: -7.02},
	        {y: '2017-06', item1b: 63.72, item2b: 37.85, item3b: -7.02},
	        {y: '2017-07', item1b: 77.66, item2b: 45.02, item3b: 8.02},
	        {y: '2017-08', item1b: 83.86, item2b: 48.87, item3b: 9.02},
	        {y: '2017-09', item1b: 87.75, item2b: 60.10, item3b: 20.02},
	        {y: '2017-10', item1b: 93.31, item2b: 68.53, item3b: -2.02},
	        {y: '2017-11', item1b: 97.89},
	        {y: '2017-12', item1b: 100}
	      ],
	      xkey: 'y',
	      ykeys: ['item1b', 'item2b', 'item3b'],
	      labels: ['Target', 'Realisasi', 'Deviasi'],
	      lineColors: ['#b9e0a0', '#a0d0e0', '#cddc39'],
	      hideHover: 'auto',
	      postUnits: '%',
	      xLabels : 'month'
	    });

	  });
	</script>
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
		                    x: 580,
		                    x2: 10,
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
		                    data: ['Dinas Pendidikan, Kepemudaan dan Olah Raga',
		                    	'Dinas Kesehatan',
		                    	'Rumah Sakit Umum Daerah',
		                    	'Dinas Pekerjaan Umum dan Penataan Ruang',
		                    	'Dinas Perumahan Rakyat dan Kawasan Permukiman',
		                    	'Satuan Polisi Pamong Praja',
		                    	'Badan Kesatuan Bangsa dan Politik',
		                    	'Badan Penanggulangan Bencana Daerah',
		                    	'Dinas Kebakaran dan Penyelamatan',
		                    	'Dinas Sosial',
		                    	'Dinas Lingkungan Hidup dan Kebersihan',
		                    	'Dinas Kependudukan dan Pencatatan Sipil',
		                    	'Dinas Pemberdayaan Masyarakat dan Desa',
		                    	'Dinas Pengendalian Penduduk dan Keluarga Berencana, Pemberdayaan Perempuan dan Perlindungan Anak',
		                    	'Dinas Perhubungan',
		                    	'Dinas Komunikasi dan Informatika',
		                    	'Dinas Koperasi, UKM dan Perdagangan',
		                    	'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu',
		                    	'Dinas Kebudayaan',
		                    	'Dinas Kearsipan dan Perpustakaan',
		                    	'Dinas Perikanan',
		                    	'Dinas Pariwisata',
		                    	'Dinas Pertanian dan Pangan',
		                    	'Dinas Perindustrian dan Tenaga Kerja',
		                    	'Dewan Perwakilan Rakyat Daerah (DPRD)',
		                    	'Bupati dan Wakil Bupati',
		                    	'Sekretariat Daerah',
		                    	'Sekretariat DPRD',
		                    	'Kecamatan Kuta',
		                    	'Kecamatan Kuta Utara',
		                    	'Kecamatan Kuta Selatan',
		                    	'Kecamatan Mengwi',
		                    	'Kecamatan Abiansemal',
		                    	'Kecamatan Petang',
		                    	'Inspektorat',
		                    	'Badan Perencanaan Pembangunan Daerah',
		                    	'Badan Pengelola Keuangan dan Aset Daerah',
		                    	'Badan Pendapatan Daerah/Pasedahan Agung',
		                    	'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia',
		                    	'Badan Penelitian dan Pengembangan']
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
		                        data: [56.18, 51.11, 1688.91, 561.79, 56.18, 51.11, 1688.91, 561.79, 56.18, 51.11, 1688.91, 561.79, 56.18, 51.11, 1688.91, 561.79, 56.18, 51.11, 1688.91, 561.79, 56.18, 51.11, 1688.91, 561.79, 56.18, 51.11, 1688.91, 561.79, 56.18, 51.11, 1688.91, 561.79, 56.18, 51.11, 1688.91, 561.79, 56.18, 51.11, 1688.91, 561.79]
		                    },
		                    {
		                        name: 'Perubahan',
		                        type: 'bar',
		                        itemStyle: {
		                            normal: {
		                                color: '#b9e0a0'
		                            }
		                        },
		                        data: [54.8, 48.9, 1670.8, 578.2, 54.8, 48.9, 1670.8, 578.2, 54.8, 48.9, 1670.8, 578.2, 54.8, 48.9, 1670.8, 578.2, 54.8, 48.9, 1670.8, 578.2, 54.8, 48.9, 1670.8, 578.2, 54.8, 48.9, 1670.8, 578.2, 54.8, 48.9, 1670.8, 578.2, 54.8, 48.9, 1670.8, 578.2, 54.8, 48.9, 1670.8, 578.2]
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
        $("#beranda").addClass("active");
      });
    </script>
	<script type="text/javascript" src="assets/js/pages/extra_trees.js"></script>
<?php include 'footer.php'; ?>