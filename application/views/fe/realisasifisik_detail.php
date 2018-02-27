  <script type="text/javascript" src="<?=base_url('assets/js/pages/datatables_realisasikeuangandetail.js')?>"></script>
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
                <h5 class="panel-title"><i class="icon-search4 mr-10"></i><strong>Progres Realisasi Fisik</strong></h5>
                <div class="heading-elements">
                  <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                  </ul>
                </div>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table datatable-basic">
                    <thead>
                      <tr class="table-gradient">
                        <th style="width: 10px;">#</th>
                        <th style="width: 10px;">Tahun</th>
                        <th>No Rekening</th>
                        <th>Uraian</th>
                        <th>Target (%)</th>
                        <th>Realisasi (%)</th>
                        <th>Deviasi (%)</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                        if(is_object($target) || is_array($target)) :
                          $no = 1;
                          foreach ($target as $row) :
                      ?>

                      <tr>
                        <td><?=$no?></td>
                        <th><?=$row->tahun?></th> 
                        <th>
                          <?php 
                            echo $row->kd_urusan . " . 0" . $row->kd_bidang . " . 0" . $row->kd_unit . " . 0" . $row->kd_sub . " . 0" . $row->kd_prog . " . 0" . $row->kd_keg . " . 0" . $row->kd_rek_1 . " . 0" . $row->kd_rek_2 . " . 0" . $row->kd_rek_3 . " . 0" . $row->kd_rek_4 . " . 0" . $row->kd_rek_5;
                          ?>
                        </th>
                        <th>
                          <?php      
                            foreach ($rask as $rowB) :
                              if($row->kd_urusan == $rowB->kd_urusan && $row->kd_bidang == $rowB->kd_bidang && $row->kd_unit == $rowB->kd_unit && $row->kd_sub == $rowB->kd_sub && $row->kd_prog == $rowB->kd_prog && $row->kd_keg == $rowB->kd_keg && $row->kd_rek_1 == $rowB->kd_rek_1 && $row->kd_rek_2 == $rowB->kd_rek_2 && $row->kd_rek_3 == $rowB->kd_rek_3 && $row->kd_rek_4 == $rowB->kd_rek_4 && $row->kd_rek_5 == $rowB->kd_rek_5 && $row->no_rinc == $rowB->no_rinc && $row->no_id == $rowB->no_id) :
                                  echo $rowB->keterangan;
                              endif;
                            endforeach;
                          ?>
                        </th>
                        <th><?php echo number_format($row->total_target, 0, ',', '.') . " %";?></th> 
                        <th>
                          <?php      
                            if(is_object($realisasifisik) || is_array($realisasifisik)) :
                              foreach ($realisasifisik as $rowC) :
                                if($row->kd_urusan == $rowC->kd_urusan && $row->kd_bidang == $rowC->kd_bidang && $row->kd_unit == $rowC->kd_unit && $row->kd_sub == $rowC->kd_sub && $row->kd_prog == $rowC->kd_prog && $row->kd_keg == $rowC->kd_keg && $rowC->kd_rek_1 == $rowC->kd_rek_1 && $row->kd_rek_2 == $rowC->kd_rek_2 && $row->kd_rek_3 == $rowC->kd_rek_3 && $row->kd_rek_4 == $rowC->kd_rek_4 && $row->kd_rek_5 == $rowC->kd_rek_5 && $row->no_rinc == $rowC->no_rinc && $row->no_id == $rowC->no_id) :
                                    echo number_format($rowC->total_realisasi, 0, ',', '.') . " %";
                                endif;
                              endforeach;
                            else:
                              echo "-";
                            endif;
                          ?>
                        </th>
                        <th>
                          <?php      
                            if(is_object($realisasifisik) || is_array($realisasifisik)) :
                              foreach ($realisasifisik as $rowD) :
                                if($row->kd_urusan == $rowD->kd_urusan && $row->kd_bidang == $rowD->kd_bidang && $row->kd_unit == $rowD->kd_unit && $row->kd_sub == $rowD->kd_sub && $row->kd_prog == $rowD->kd_prog && $row->kd_keg == $rowD->kd_keg && $rowD->kd_rek_1 == $rowD->kd_rek_1 && $row->kd_rek_2 == $rowD->kd_rek_2 && $row->kd_rek_3 == $rowD->kd_rek_3 && $row->kd_rek_4 == $rowD->kd_rek_4 && $row->kd_rek_5 == $rowD->kd_rek_5 && $row->no_rinc == $rowD->no_rinc && $row->no_id == $rowD->no_id) :
                                    echo number_format($rowD->total_realisasi-$row->total_target, 0, ',', '.') . " %";
                                endif;
                              endforeach;
                            else:
                              echo "-";
                            endif;
                          ?>
                        </th>
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

  <!-- page script -->
<!--   <script>
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
  </script> -->
  <script>
    $(document).ready(function(){
      $("#realisasi-keuangan").addClass("active");
    });
  </script>
  <script type="text/javascript" src="<?=base_url('assets/js/pages/extra_trees.js')?>"></script>