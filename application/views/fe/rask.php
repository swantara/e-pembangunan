
  <!-- <script type="text/javascript" src="<?=base_url('assets/js/plugins/visualization/echarts/echarts.js')?>"></script> -->
  <script type="text/javascript" src="<?=base_url('assets/js/pages/datatables_rask.js')?>"></script>
  <!-- D3 JS files -->
  <script type="text/javascript" src="<?=base_url('assets/js/plugins/visualization/d3/d3.min.js')?>"></script>
  <script type="text/javascript" src="<?=base_url('assets/js/charts/d3/tree/tree_collapsible_rask.js')?>"></script>
  <!-- <script type="text/javascript" src="<?=base_url('assets/js/plugins/visualization/d3/d3_tooltip.js')?>"></script> -->
  <script type="text/javascript" src="<?=base_url('assets/js/numeral-min.js')?>"></script>
  
  <!-- Page header -->
  <div class="page-header mw-200">
    <!-- <div class="gradient-overlay">
    </div> -->
    <div class="img-overlay bg-gradient" style="background-image: url('<?=base_url("assets/images/backgrounds/kantor-bupati.jpg")?>');">
      <div class="page-header-content">
        <div class="page-title align-center">
          <div class="h-40">SISTEM INFORMASI PELAPORAN &amp; PEMANTAUAN PEMBANGUNAN 
            <br/>(SIPPP) KABUPATEN BADUNG</div>
          <h4>
            <i class="icon-home2 position-left"></i>
            <a href="<?=site_url('')?>"><span class="text-semibold white-link">Beranda </span></a>
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
              <div class="panel-body">
                <div class="row">
                  <form class="form-vertical" action="#">
                    <div class="form-group">
                      <div style="margin-bottom: 10px;" class="col-md-2">
                        <label class="control-label">Tahun</label>
                        <select name="select" class="form-control input-xs" id="selectYear" onchange="changeYear()">
                            <?php
                              $getYear = $this -> input -> get('tahun');
                              if(isset($getYear)){
                                $tahun = $getYear;
                              }
                              else{
                                $tahun = date('Y');
                              }
                            ?>
                            <option <?php if($tahun==2017) echo "selected"; ?> value="2017">2017</option>
                            <option <?php if($tahun==2018) echo "selected"; ?> value="2018">2018</option>
                        </select>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-flat">
              <div class="panel-heading">
                <h5 class="panel-title"><i class="icon-design mr-10"></i><strong>Tree View RASK - <?=$tahun?></strong></h5>
                <div class="heading-elements">
                  <ul class="icons-list">
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="collapse"></a></li>
                  </ul>
                </div>
              </div>
              <div class="panel-body">
                <div class="chart-container">
                  <div class="chart" id="tree-chart"></div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-flat">
              <div class="panel-heading">
                <h5 class="panel-title"><i class="icon-design mr-10"></i><strong>Bar Chart RASK - <?=$tahun?></strong></h5>
                <div class="heading-elements">
                  <ul class="icons-list">
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="collapse"></a></li>
                  </ul>
                </div>
              </div>
              <div class="panel-body">
                <div class="chart-container">
                  <canvas style="height: 400px;" class="chart" id="chart-group"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-flat">
              <div class="panel-heading">
                <h5 class="panel-title"><i class="icon-search4 mr-10"></i><strong>Rencana Anggaran Satuan Kerja - <?=$tahun?></strong></h5>
                <div class="heading-elements">
                  <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                  </ul>
                </div>
              </div>
              <div class="panel-body">
                <!-- <div class="row">
                  <form class="form-vertical" action="#">
                    <div class="form-group">
                      <div style="margin-bottom: 10px;" class="col-sm-2">
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
                      <div style="margin-bottom: 10px;" class="col-sm-2">
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
                      <div style="margin-bottom: 10px;" class="col-sm-2">
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
                      <div style="margin-bottom: 10px;" class="col-sm-2">
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
                      <div class="col-sm-1">
                        <button class="btn btn-xs btn-red mt-26" type="submit"><i class="icon-search4"></i></button>
                      </div>
                    </div>
                  </form>
                </div> -->
                <div class="table-responsive mt-30">
                  <table class="table datatable-basic">
                    <thead>
                      <tr class="table-gradient">
                        <th style="width: 10px;">#</th>
                        <th style="width: 10px;">Tahun</th>
                        <th style="width: 200px;">Kode OPD</th>
                        <th>Nama OPD</th>
                        <th>Induk (Rp.)</th>
                        <th>Perubahan (Rp.)</th>
                        <th>Kenaikan/Penurunan (Rp.)</th>
                        <th>Persentase</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                        if(is_object($kegiatan) || is_array($kegiatan)) :
                          $no = 1;
                          foreach ($kegiatan as $row) :
                      ?>

                      <tr>
                        <td><?=$no?></td>
                        <th><?=$row->tahun?></th>
                        <td>
                          <a href="<?=site_url('rask/opd/?tahun='.$row->tahun.'&kd_urusan='.$row->kd_urusan.'&kd_bidang='.$row->kd_bidang.'&kd_unit='.$row->kd_unit.'&kd_sub='.$row->kd_sub)?>">
                            <?php 
                              echo $row->kd_urusan . " . 0" . $row->kd_bidang . " . 0" . $row->kd_unit . " . 0" . $row->kd_sub;
                            ?>
                          </a>
                        </td>
                        <td>
                          <a href="<?=site_url('rask/opd/?tahun='.$row->tahun.'&kd_urusan='.$row->kd_urusan.'&kd_bidang='.$row->kd_bidang.'&kd_unit='.$row->kd_unit.'&kd_sub='.$row->kd_sub)?>">
                            <?php         
                              foreach ($nama_opd as $rowB) :
                                if($row->kd_urusan == $rowB->kd_urusan && $row->kd_bidang == $rowB->kd_bidang && $row->kd_unit == $rowB->kd_unit && $row->kd_sub == $rowB->kd_sub) :
                                  echo $rowB->nama;
                                endif;
                              endforeach;
                            ?>
                          </a>
                        </td>
                        <td style="text-align: right;"><?php echo number_format($row->total_induk, 0);?></td>
                        <td style="text-align: right;"><?php echo number_format($row->total_perubahan, 0);?></td>
                        <td style="text-align: right;">
                          <?php
                            if($row->total_perubahan!=0) :
                              echo number_format(($row->total_perubahan-$row->total_induk), 0, ',', '.');
                            else:
                              echo "-";
                            endif;
                          ?>  
                        </td>
                        <td>
                          <?php 
                            if($row->total_perubahan!=0) :
                              echo number_format(((($row->total_perubahan-$row->total_induk)/$row->total_induk)*100), 2) . " %";
                            else :
                              echo "-";
                            endif;
                          ?>
                        </td>
                      </tr>

                    <?php
                        $no ++;
                        endforeach;
                      endif;
                    ?>

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

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>

  <!-- page script -->
  <script>
    $(document).ready(function() {

      $("#rask").addClass("active");

      $.getJSON( "<?=site_url('rask/ajaxgetsumanggaranmix/?tahun='.$tahun)?>")
      .done(function( data1 ) {
        if(data1 != false)
        {
          var valuea = data1.induk[0];
          var valueb = data1.perubahan[0];

          var ctxs = $("#chart-group");
          var myChart = new Chart(ctxs, {
              type: 'bar',
              data: {
                  labels: ["Induk", "Perubahan"],
                  datasets: [{
                      label: 'Belanja Langsung',
                      data: [valuea.b_langsung, valueb.b_langsung],
                      backgroundColor: [
                          'rgba(255, 99, 132, 0.2)',
                          'rgba(255, 99, 132, 0.2)'
                      ],
                      borderColor: [
                          'rgba(255, 99, 132, 1)',
                          'rgba(255, 99, 132, 1)'
                      ],
                      borderWidth: 1
                  },
                  {
                      label: 'Belanja Tidak Langsung',
                      data: [valuea.b_taklangsung, valueb.b_taklangsung],
                      backgroundColor: [
                          'rgba(54, 162, 235, 0.2)',
                          'rgba(54, 162, 235, 0.2)'
                      ],
                      borderColor: [
                          'rgba(54, 162, 235, 1)',
                          'rgba(54, 162, 235, 1)'
                      ],
                      borderWidth: 1
                  }]
              },
              options: {
                  scales: {
                      yAxes: [{
                          ticks: {
                              beginAtZero:true,
                              callback: function(value, index, values) {
                                  return value + " Miliar";
                                }
                              }
                      }]
                  },
                  tooltips: {
                      enabled: true,
                      mode: 'single',
                      callbacks: {
                          label: function(tooltipItems, data) { 
                              return data.datasets[tooltipItems.datasetIndex].label + ': Rp. ' + numeral(tooltipItems.yLabel).format('0.0,00') + ' Miliar';
                          }
                    }
                }
              }
          });
        }
      });

    });
  </script>
  <script type="text/javascript" src="<?=base_url('assets/js/pages/extra_trees.js')?>"></script>
  <script>
    function changeYear() {
        var year = document.getElementById("selectYear").value;
        window.location.assign("http://e-pembangunan.badungkab.go.id/?tahun=" + year);
    }
  </script>