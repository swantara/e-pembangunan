
  <!-- Page header -->
  <div class="page-header mw-200">
    <!-- <div class="gradient-overlay">
    </div> -->
    <div class="img-overlay bg-gradient" style="background-image: url('<?=base_url("assets/images/backgrounds/kantor-bupati.jpg")?>');">
      <div class="page-header-content">
        <div class="page-title align-center">
          <div class="h-50">E-PEMBANGUNAN KABUPATEN BADUNG</div>
          <h4>
            <i class="icon-home2 position-left"></i>
            <a href="index.php"><span class="text-semibold white-link">Beranda </span></a>
            <i class="icon-arrow-right32"></i>
            <i class="icon-stats-growth position-left"></i>
            <span class="text-semibold"> Detail Realisasi Keuangan</span> 
          </h4>
          <p>
            Nama Kegiatan
          </p>
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
                <h5 class="panel-title"><i class="icon-stats-growth mr-10"></i><strong>Detail Realisasi Keuangan</strong></h5>
                <div class="heading-elements">
                  <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                  </ul>
                </div>
              </div>
              <div class="panel-body">
                <div style="margin-bottom: 30px;" class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr class="table-gradient">
                        <th>Kode Rekening</th>
                        <th>Jenis Pengadaan</th>
                        <th>Nama Kegiatan</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Nilai Kontrak</th>
                        <th>Pelaksana</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr style="text-align: center;">
                      </tr>
                      <tr>
                        <td>4.01.03.01.02.05</td> 
                        <td>Barang</td> 
                        <td>Nama Kegiatan</td>  
                        <td>Tanggal Mulai</td>  
                        <td>Tanggal Selesai</td>  
                        <td>Nilai Kontrak</td>    
                        <td>Pelaksana</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="chart" id="line-chart2" style="height: 300px; margin-bottom: 30px;"></div>
                <div class="table-responsive">
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
      $("#realisasi-keuangan").addClass("active");
    });
  </script>
  <script type="text/javascript" src="<?=base_url('assets/js/pages/extra_trees.js')?>"></script>