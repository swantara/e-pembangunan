<?php include 'header.php'; ?>

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
						<i class="icon-clipboard2 position-left"></i>
						<span class="text-semibold"> Realisasi Fisik</span> 
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
								<h5 class="panel-title"><i class="icon-clipboard2 mr-10"></i><strong>Realisasi Fisik</strong></h5>
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
								<h5 class="panel-title"><i class="icon-search4 mr-10"></i><strong>Cari Pengadaan</strong></h5>
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
											<div class="col-md-2">
												<label class="control-label">Kode Rekening</label>
												<input placeholder="misal : 4.01 . 4.01.03 . 01 . 02 . 05" type="text" class="form-control">
											</div>
										</div>
								    <div class="form-group">
								    	<div class="col-md-2">
								    		<label class="control-label">Jenis Pengadaan</label>
							          <select name="select" class="form-control">
							              <option value="opt1">Semua Pengadaan</option>
							              <option value="opt2">Barang</option>
							              <option value="opt3">Konstruksi</option>
							              <option value="opt4">Jasa</option>
							              <option value="opt4">Jasa Lainnya</option>
							          </select>
							        </div>
								    </div>
								    <div class="form-group">
								    	<div class="col-md-2">
								    		<label class="control-label">SKPD</label>
							          <select name="select" class="form-control">
							              <option value="opt1">Semua SKPD</option>
							              <option value="opt2">SKPD 1</option>
							              <option value="opt3">SKPD 2</option>
							              <option value="opt4">SKPD 3</option>
							              <option value="opt4">SKPD 4</option>
							          </select>
							        </div>
								    </div>
										<div class="form-group">
											<div class="col-md-2">
												<label class="control-label">Nama Pengadaan</label>
												<input placeholder="misal : Pengadaan Kendaraan Dinas/Operasional" type="text" class="form-control">
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-2">
												<label class="control-label">Nama Rekanan</label>
												<input placeholder="misal : PT Jaya Abadi" type="text" class="form-control">
											</div>
										</div>
								    <div class="form-group">
								    	<div class="col-md-1">
								    		<button class="btn btn-red mt-26" type="submit"><i class="icon-search4"></i></button>
								    	</div>
								    </div>
									</form>
								</div>
        				<div class="table-responsive mt-30">
									<table class="table">
										<thead>
											<tr class="table-gradient">
												<th>Kode Rekening</th>
												<th>Jenis Pengadaan Barang/Jasa</th>
												<th>Nama Pengadaan</th>
												<th>Realisasi Saat Ini</th>
												<th>Target Penyelesaian</th>
												<th>Rekanan</th>
											</tr>
										</thead>
										<tbody>
											<tr style="text-align: center;">
											</tr>
											<tr>
												<td><a href="#">4.01 . 4.01.03 . 01 . 02 . 05</a></td>	
												<td>Barang</td>	
												<td>Nama Pengadaan</td>		
												<td>80%</td>			
												<td>8 Desember 2017</td>	
												<td>Nama Rekanan</td>
											</tr>
											<tr>
												<td><a href="#">4.01 . 4.01.03 . 01 . 02 . 05</a></td>	
												<td>Konstruksi</td>	
												<td>Nama Pengadaan</td>	
												<td>79%</td>	
												<td>8 Desember 2017</td>	
												<td>Nama Rekanan</td>						
											</tr>
											<tr>
												<td><a href="#">4.01 . 4.01.03 . 01 . 02 . 05</a></td>	
												<td>Konsultasi</td>	
												<td>Nama Pengadaan</td>		
												<td>88%</td>	
												<td>8 Desember 2017</td>	
												<td>Nama Rekanan</td>
											</tr>
											<tr>
												<td><a href="#">4.01 . 4.01.03 . 01 . 02 . 05</a></td>	
												<td>Jasa Lainnya</td>	
												<td>Nama Pengadaan</td>		
												<td>92%</td>		
												<td>8 Desember 2017</td>		
												<td>Nama Rekanan</td>
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

	    // LINE CHART 2
	    var line2 = new Morris.Line({
	      element: 'line-chart2',
	      resize: true,
	      data: [
	        {y: '2017-01', item1b: 9.31, item2b: 2.02},
	        {y: '2017-02', item1b: 23.93, item2b: 4.20},
	        {y: '2017-03', item1b: 39.80, item2b: 8.04},
	        {y: '2017-04', item1b: 51.46, item2b: 9.35},
	        {y: '2017-05', item1b: 56.58, item2b: 16.65},
	        {y: '2017-06', item1b: 63.72, item2b: 37.85},
	        {y: '2017-07', item1b: 77.66, item2b: 45.02},
	        {y: '2017-08', item1b: 83.86, item2b: 48.87},
	        {y: '2017-09', item1b: 87.75, item2b: 60.10},
	        {y: '2017-10', item1b: 93.31, item2b: 68.53},
	        {y: '2017-11', item1b: 97.89},
	        {y: '2017-12', item1b: 100}
	      ],
	      xkey: 'y',
	      ykeys: ['item1b', 'item2b'],
	      labels: ['Target', 'Realisasi'],
	      lineColors: ['#b9e0a0', '#a0d0e0'],
	      hideHover: 'auto',
	      postUnits: '%',
	      xLabels : 'month'
	    });

	  });
	</script>
	<script>
    $(document).ready(function(){
      $("#realisasi").addClass("active");
      $("#fisik").addClass("active");
    });
  </script>
	<script type="text/javascript" src="assets/js/pages/extra_trees.js"></script>
<?php include 'footer.php'; ?>