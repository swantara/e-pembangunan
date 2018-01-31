  <script type="text/javascript" src="<?=base_url('assets/js/pages/datatables_realisasikeuangan.js')?>"></script>
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
            <a href="<?=site_url('')?>"><span class="text-semibold white-link">Beranda </span></a>
            <i class="icon-arrow-right32"></i>
            <i class="icon-stats-growth position-left"></i>
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
                        <th style="width: 200px;">Kode Kegiatan</th>
                        <th>Nama Kegiatan</th>
                        <th>Jumlah Data</th>
                        <th>Target (Rp.)</th>
                        <th>Realisasi (Rp.)</th>
                        <th>Deviasi (Rp.)</th>
                        <th>Persentase</th>
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
                        <td>
                          <a href="<?=site_url('realisasikeuangan/detail/?tahun='.$row->tahun.'&kd_urusan='.$row->kd_urusan.'&kd_bidang='.$row->kd_bidang.'&kd_unit='.$row->kd_unit.'&kd_sub='.$row->kd_sub.'&kd_prog='.$row->kd_prog.'&kd_keg='.$row->kd_keg)?>">
                            <?php 
                              echo $row->kd_urusan . " . 0" . $row->kd_bidang . " . 0" . $row->kd_unit . " . 0" . $row->kd_sub . " . 0" . $row->kd_prog . " . 0" . $row->kd_keg;
                            ?>
                          </a>
                        </td> 
                        <td>
                          <a href="<?=site_url('realisasikeuangan/detail/?tahun='.$row->tahun.'&kd_urusan='.$row->kd_urusan.'&kd_bidang='.$row->kd_bidang.'&kd_unit='.$row->kd_unit.'&kd_sub='.$row->kd_sub.'&kd_prog='.$row->kd_prog.'&kd_keg='.$row->kd_keg)?>">
                            <?php     
                              $statusB = 0;    
                              foreach ($nama_kegiatan as $rowB) :
                                if($row->kd_urusan == $rowB->kd_urusan && $row->kd_bidang == $rowB->kd_bidang && $row->kd_prog == $rowB->kd_prog && $row->kd_keg == $rowB->kd_keg) :
                                  echo $rowB->nama;
                                  $statusB = 1;
                                  break;
                                endif;
                              endforeach;
                              if($statusB!=1):
                                echo "-";
                              endif;
                            ?>
                          </a>
                        </td>
                        <td><?=$row->jumlah_data?></td>
                        <td><?php echo number_format($row->total_target, 0, ',', '.'); ?></td>
                        <td style="text-align: right;">
                          <?php         
                            $statusC = 0;
                            foreach ($realisasikeuangan as $rowC) :
                              if($row->kd_urusan == $rowC->kd_urusan && $row->kd_bidang == $rowC->kd_bidang && $row->kd_prog == $rowC->kd_prog && $row->kd_keg == $rowC->kd_keg) :
                                echo number_format($rowC->total_realisasi, 0, ',', '.');
                                $statusC = 1;
                              endif;
                            endforeach;
                            if($statusC!=1):
                              echo "-";
                            endif;
                          ?>
                        </td>
                        <td>
                          <?php         
                            $statusD = 0;
                            foreach ($realisasikeuangan as $rowD) :
                              if($row->kd_urusan == $rowD->kd_urusan && $row->kd_bidang == $rowD->kd_bidang && $row->kd_prog == $rowD->kd_prog && $row->kd_keg == $rowD->kd_keg) :
                                echo number_format($rowD->total_realisasi-$row->total_target, 0, ',', '.');
                                $statusD = 1;
                              endif;
                            endforeach;
                            if($statusD!=1):
                              echo "-";
                            endif;
                          ?>
                        </td>
                        <td>
                          <?php         
                            $statusE = 0;
                            foreach ($realisasikeuangan as $rowE) :
                              if($row->kd_urusan == $rowE->kd_urusan && $row->kd_bidang == $rowE->kd_bidang && $row->kd_prog == $rowE->kd_prog && $row->kd_keg == $rowE->kd_keg) :
                                if($rowE->total_realisasi==0) :
                                  echo "-";
                                else :
                                  echo number_format(((($rowE->total_realisasi-$row->total_target)/$row->total_target)*100), 2, ',', '.') . "%";
                                endif;
                                $statusE = 1;
                              endif;
                            endforeach;
                            if($statusE!=1):
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

  <!-- page script -->
  <script>
    $(document).ready(function(){
      $("#realisasi-keuangan").addClass("active");
    });
  </script>