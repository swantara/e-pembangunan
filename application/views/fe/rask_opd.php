
  <!-- <script type="text/javascript" src="<?=base_url('assets/js/plugins/visualization/echarts/echarts.js')?>"></script> -->
  <script type="text/javascript" src="<?=base_url('assets/js/pages/datatables_rask.js')?>"></script>
  
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
              <div class="panel-heading">
                <h5 class="panel-title"><i class="icon-search4 mr-10"></i><strong><?=$nama_opd->nama?></strong></h5>
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
                        <th style="width: 200px;">Kode Rekening</th>
                        <th>Nama Kegiatan</th>
                        <th>Jumlah Data</th>
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
                          <a href="<?=site_url('rask/kegiatan/?tahun='.$row->tahun.'&kd_urusan='.$row->kd_urusan.'&kd_bidang='.$row->kd_bidang.'&kd_unit='.$row->kd_unit.'&kd_sub='.$row->kd_sub.'&kd_prog='.$row->kd_prog.'&kd_keg='.$row->kd_keg.'&kd_rek_1='.$row->kd_rek_1.'&kd_rek_2='.$row->kd_rek_2)?>">
                            <?php 
                              echo $row->kd_urusan . " . 0" . $row->kd_bidang . " . 0" . $row->kd_unit . " . 0" . $row->kd_sub . " . 0" . $row->kd_prog . " . 0" . $row->kd_keg;
                            ?>
                          </a>
                        </td>
                        <td>
                          <a href="<?=site_url('rask/kegiatan/?tahun='.$row->tahun.'&kd_urusan='.$row->kd_urusan.'&kd_bidang='.$row->kd_bidang.'&kd_unit='.$row->kd_unit.'&kd_sub='.$row->kd_sub.'&kd_prog='.$row->kd_prog.'&kd_keg='.$row->kd_keg.'&kd_rek_1='.$row->kd_rek_1.'&kd_rek_2='.$row->kd_rek_2)?>">
                            <?php         
                              foreach ($nama_kegiatan as $rowB) :
                                if($row->kd_urusan == $rowB->kd_urusan && $row->kd_bidang == $rowB->kd_bidang && $row->kd_prog == $rowB->kd_prog && $row->kd_keg == $rowB->kd_keg) :
                                  echo $rowB->nama;
                                  break;
                                endif;
                              endforeach;
                            ?>
                          </a>
                        </td>
                        <td><?=$row->jumlah_data?></td>
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
                        <td style="text-align: right;">
                          <?php
                            if ($row->total_induk == 0) {
                              echo "-";
                            }
                            else if ($row->total_perubahan == 0) {
                              echo "-";
                            }
                            else {
                              echo number_format(((($row->total_perubahan - $row->total_induk)/$row->total_induk)*100),2) . " %";
                            }
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

  <script>
    $(document).ready(function(){
      $("#rask").addClass("active");
      // $(".datatable-header").addClass("pull-right");
    });
  </script>
  <script type="text/javascript" src="<?=base_url('assets/js/pages/extra_trees.js')?>"></script>