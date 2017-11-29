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
						<i class="icon-stats-growth position-left"></i>
						<span class="text-semibold"> Grafik Perencanaan</span> 
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
								<h5 class="panel-title"><i class="icon-design mr-10"></i><strong>Rencana Pengadaan</strong></h5>
								<div class="heading-elements">
									<ul class="icons-list">
                		<li><a data-action="reload"></a></li>
                		<li><a data-action="collapse"></a></li>
                	</ul>
              	</div>
							</div>
							<div class="panel-body">
        				<div class="chart-container">
									<div class="chart has-fixed-height" id="basic_bars"></div>
								</div>
        				<div class="table-responsive mt-30">
									<table class="table">
										<thead>
											<tr class="table-gradient">
												<th>Jenis Pengadaan Barang/Jasa</th>
												<th>Paket</th>
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
												<td>Barang</td>	
												<td>883</td>	
												<td>Rp. 561,79 Miliar</td>	
												<td>Rp. 578.2 Miliar</td>		
												<td>Rp. 16,31 Miliar</td>		
												<td>2%</td>
											</tr>
											<tr>
												<td>Konstruksi</td>	
												<td>322</td>	
												<td>Rp. 1.688,91 Miliar</td>	
												<td>Rp. 1.670,8 Miliar</td>		
												<td>Rp. 16.31 Miliar</td>		
												<td>3,2%</td>													
											</tr>
											<tr>
												<td>Konsultasi</td>	
												<td>279</td>	
												<td>Rp. 51,11 Miliar</td>	
												<td>Rp. 48,9 Miliar</td>		
												<td>Rp. 2,21 Miliar</td>		
												<td>1,5%</td>		
											</tr>
											<tr>
												<td>Jasa Lainnya</td>	
												<td>138</td>	
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
		                    data: ['Sebelum Perubahan', 'Setelah Perubahan']
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
		                    data: ['Jasa Lainnya','Konsultasi','Konstruksi','Barang']
		                }],

		                // Add series
		                series: [
		                    {
		                        name: 'Sebelum Perubahan',
		                        type: 'bar',
		                        itemStyle: {
		                            normal: {
		                                color: '#a0d0e0'
		                            }
		                        },
		                        data: [56.18, 51.11, 1688.91, 561.79]
		                    },
		                    {
		                        name: 'Setelah Perubahan',
		                        type: 'bar',
		                        itemStyle: {
		                            normal: {
		                                color: '#b9e0a0'
		                            }
		                        },
		                        data: [54.8, 48.9, 1670.8, 578.2]
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
      $("#perencanaan").addClass("active");
    });
  </script>
	<script type="text/javascript" src="assets/js/pages/extra_trees.js"></script>
<?php include 'footer.php'; ?>