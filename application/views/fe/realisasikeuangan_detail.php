  <script type="text/javascript" src="<?=base_url('assets/js/pages/datatables_realisasikeuangandetail.js')?>"></script>
  <!-- Page header -->
  <div class="page-header mw-200">
    <!-- <div class="gradient-overlay">
    </div> -->
    <div class="img-overlay bg-gradient" style="background-image: url('<?=base_url("assets/images/backgrounds/kantor-bupati.jpg")?>');">
      <div class="page-header-content">
        <div class="page-title align-center">
          <div class="h-40">SISTEM INFORMASI PELAPORAN &amp; PENGENDALIAN PEMBANGUNAN 
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

        <!-- <div class="row">
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
                        <th>B01 (Rp.)</th>
                        <th>B02 (Rp.)</th>
                        <th>B03 (Rp.)</th>
                        <th>B04 (Rp.)</th>
                        <th>B05 (Rp.)</th>
                        <th>B06 (Rp.)</th>
                        <th>B07 (Rp.)</th>
                        <th>B08 (Rp.)</th>
                        <th>B09 (Rp.)</th>
                        <th>B010 (Rp.)</th>
                        <th>B011 (Rp.)</th>
                        <th>B012 (Rp.)</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr style="text-align: center;">
                      </tr>
                      <tr>
                        <td><span class="pill-green">Target</span></td>
                        <td><?=$target->tahun?></td>
                        <td><?=number_format($target->total_jan, 0, ',', '.')?></td>
                        <td><?=number_format($target->total_feb, 0, ',', '.')?></td>
                        <td><?=number_format($target->total_mar, 0, ',', '.')?></td>
                        <td><?=number_format($target->total_apr, 0, ',', '.')?></td>
                        <td><?=number_format($target->total_mei, 0, ',', '.')?></td>
                        <td><?=number_format($target->total_jun, 0, ',', '.')?></td>
                        <td><?=number_format($target->total_jul, 0, ',', '.')?></td>
                        <td><?=number_format($target->total_agt, 0, ',', '.')?></td>
                        <td><?=number_format($target->total_sep, 0, ',', '.')?></td>
                        <td><?=number_format($target->total_okt, 0, ',', '.')?></td>
                        <td><?=number_format($target->total_nop, 0, ',', '.')?></td>
                        <td><?=number_format($target->total_des, 0, ',', '.')?></td>
                      </tr>
                      <tr>
                        <td><span class="pill-blue">Realisasi</span></td>
                        <td><?=$realisasikeuanganbykegiatan->tahun?></td>
                        <td><?=number_format($realisasikeuanganbykegiatan->total_jan, 0, ',', '.')?></td>  
                        <td><?=number_format($realisasikeuanganbykegiatan->total_feb, 0, ',', '.')?></td> 
                        <td><?=number_format($realisasikeuanganbykegiatan->total_mar, 0, ',', '.')?></td> 
                        <td><?=number_format($realisasikeuanganbykegiatan->total_apr, 0, ',', '.')?></td> 
                        <td><?=number_format($realisasikeuanganbykegiatan->total_mei, 0, ',', '.')?></td> 
                        <td><?=number_format($realisasikeuanganbykegiatan->total_jun, 0, ',', '.')?></td> 
                        <td><?=number_format($realisasikeuanganbykegiatan->total_jul, 0, ',', '.')?></td> 
                        <td><?=number_format($realisasikeuanganbykegiatan->total_agt, 0, ',', '.')?></td> 
                        <td><?=number_format($realisasikeuanganbykegiatan->total_sep, 0, ',', '.')?></td> 
                        <td><?=number_format($realisasikeuanganbykegiatan->total_okt, 0, ',', '.')?></td> 
                        <td><?=number_format($realisasikeuanganbykegiatan->total_nop, 0, ',', '.')?></td> 
                        <td><?=number_format($realisasikeuanganbykegiatan->total_des, 0, ',', '.')?></td> 
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div> -->

        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-flat">
              <div class="panel-heading">
                <h5 class="panel-title"><i class="icon-search4 mr-10"></i><strong>Progres Realisasi Keuangan</strong></h5>
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
                        <th>No SP2D</th>
                        <th>Tanggal Cair</th>
                        <th>Nilai (Rp.)</th>
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
                              if($row->kd_urusan == $rowB->kd_urusan && $row->kd_bidang == $rowB->kd_bidang && $row->kd_unit == $rowB->kd_unit && $row->kd_sub == $rowB->kd_sub && $row->kd_prog == $rowB->kd_prog && $row->kd_keg == $rowB->kd_keg && $row->kd_rek_1 == $rowB->kd_rek_1 && $row->kd_rek_2 == $rowB->kd_rek_2 && $row->kd_rek_3 == $rowB->kd_rek_3 && $row->kd_rek_4 == $rowB->kd_rek_4 && $row->kd_rek_5 == $rowB->kd_rek_5) :
                                  echo $rowB->keterangan_rinc;
                              break;
                              endif;
                            endforeach;
                          ?>
                        </th>
                        <th>
                          <?php      
                            foreach ($realisasikeuangan as $rowC) :
                              if($row->kd_urusan == $rowC->kd_urusan && $row->kd_bidang == $rowC->kd_bidang && $row->kd_unit == $rowC->kd_unit && $row->kd_sub == $rowC->kd_sub && $row->kd_prog == $rowC->kd_prog && $row->kd_keg == $rowC->kd_keg && $row->kd_rek_1 == $rowC->kd_rek_1 && $row->kd_rek_2 == $rowC->kd_rek_2 && $row->kd_rek_3 == $rowC->kd_rek_3 && $row->kd_rek_4 == $rowC->kd_rek_4 && $row->kd_rek_5 == $rowC->kd_rek_5) :
                                  echo $rowC->no_sp2d;
                              else :
                                echo "-";
                              endif;
                            endforeach;
                          ?>
                        </th>
                        <th>
                          <?php      
                            foreach ($realisasikeuangan as $rowD) :
                              if($row->kd_urusan == $rowD->kd_urusan && $row->kd_bidang == $rowD->kd_bidang && $row->kd_unit == $rowD->kd_unit && $row->kd_sub == $rowD->kd_sub && $row->kd_prog == $rowD->kd_prog && $row->kd_keg == $rowD->kd_keg && $row->kd_rek_1 == $rowD->kd_rek_1 && $row->kd_rek_2 == $rowD->kd_rek_2 && $row->kd_rek_3 == $rowD->kd_rek_3 && $row->kd_rek_4 == $rowD->kd_rek_4 && $row->kd_rek_5 == $rowD->kd_rek_5) :
                                  $date=date_create($rowD->tgl_cair);
                                  $newdate=date_format($date,"d-m-Y");
                                  echo $newdate;
                              else :
                                echo "-";
                              endif;
                            endforeach;
                          ?>
                        </th>
                        <th style="text-align: right;">
                          <?php      
                            foreach ($realisasikeuangan as $rowD) :
                              if($row->kd_urusan == $rowD->kd_urusan && $row->kd_bidang == $rowD->kd_bidang && $row->kd_unit == $rowD->kd_unit && $row->kd_sub == $rowD->kd_sub && $row->kd_prog == $rowD->kd_prog && $row->kd_keg == $rowD->kd_keg && $row->kd_rek_1 == $rowD->kd_rek_1 && $row->kd_rek_2 == $rowD->kd_rek_2 && $row->kd_rek_3 == $rowD->kd_rek_3 && $row->kd_rek_4 == $rowD->kd_rek_4 && $row->kd_rek_5 == $rowD->kd_rek_5) :
                                  echo number_format($rowD->nilai, 0, ',', '.');
                              else :
                                echo "-";
                              endif;
                            endforeach;
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

  <script>
    $(document).ready(function(){
      $("#realisasi-keuangan").addClass("active");
    });
  </script>
  <script type="text/javascript" src="<?=base_url('assets/js/pages/extra_trees.js')?>"></script>