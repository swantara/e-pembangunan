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
						<span class="text-semibold"> Realisasi Keuangan</span> 
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
								<h5 class="panel-title"><i class="icon-clipboard2 mr-10"></i><strong>Realisasi Keuangan</strong></h5>
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
												<th>Persentase</th>
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
												<td>Rp. 400.000.000</td>		
												<td>80%</td>		
												<td>Nama Rekanan</td>
											</tr>
											<tr>
												<td><a href="#">4.01 . 4.01.03 . 01 . 02 . 05</a></td>	
												<td>Konstruksi</td>	
												<td>Nama Pengadaan</td>	
												<td>Rp. 400.000.000</td>		
												<td>80%</td>	
												<td>Nama Rekanan</td>						
											</tr>
											<tr>
												<td><a href="#">4.01 . 4.01.03 . 01 . 02 . 05</a></td>	
												<td>Konsultasi</td>	
												<td>Nama Pengadaan</td>	
												<td>Rp. 400.000.000</td>		
												<td>80%</td>	
												<td>Nama Rekanan</td>
											</tr>
											<tr>
												<td><a href="#">4.01 . 4.01.03 . 01 . 02 . 05</a></td>	
												<td>Jasa Lainnya</td>	
												<td>Nama Pengadaan</td>	
												<td>Rp. 400.000.000</td>		
												<td>80%</td>			
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
    $(document).ready(function(){
      $("#realisasi").addClass("active");
      $("#keuangan").addClass("active");
    });
  </script>
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
	  });
	</script>
	<script type="text/javascript" src="assets/js/pages/extra_trees.js"></script>
<?php include 'footer.php'; ?>