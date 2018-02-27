  <script type="text/javascript" src="<?=base_url('assets/js/pages/datatables_realisasikeuangan.js')?>"></script>
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
            <i class="icon-stats-growth position-left"></i>
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
                        <th style="width: 200px;">Kode Kegiatan</th>
                        <th>Nama Kegiatan</th>
                        <th>Jumlah Data</th>
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
                        <td>
                          <a href="<?=site_url('realisasifisik/detail/?tahun='.$row->tahun.'&kd_urusan='.$row->kd_urusan.'&kd_bidang='.$row->kd_bidang.'&kd_unit='.$row->kd_unit.'&kd_sub='.$row->kd_sub.'&kd_prog='.$row->kd_prog.'&kd_keg='.$row->kd_keg)?>">
                            <?php 
                              echo $row->kd_urusan . " . 0" . $row->kd_bidang . " . 0" . $row->kd_unit . " . 0" . $row->kd_sub . " . 0" . $row->kd_prog . " . 0" . $row->kd_keg;
                            ?>
                          </a>
                        </td> 
                        <td>
                          <a href="<?=site_url('realisasifisik/detail/?tahun='.$row->tahun.'&kd_urusan='.$row->kd_urusan.'&kd_bidang='.$row->kd_bidang.'&kd_unit='.$row->kd_unit.'&kd_sub='.$row->kd_sub.'&kd_prog='.$row->kd_prog.'&kd_keg='.$row->kd_keg)?>">
                            <?php           
                              $statusB = 0;
                              if(!is_array($nama_kegiatan)) :
                                echo "-";
                              else:
                              foreach ($nama_kegiatan as $rowB) :
                                if($row->kd_urusan == $rowB->kd_urusan && $row->kd_bidang == $rowB->kd_bidang && $row->kd_prog == $rowB->kd_prog && $row->kd_keg == $rowB->kd_keg) :
                                  echo $rowB->nama;
                                  break;
                                endif;
                              endforeach;
                              if($statusB!=1):
                                echo "-";
                              endif;
                            endif;
                            ?>
                          </a>
                        </td>
                        <td><?php echo $row->jumlah_data;?></td>
                        <td><?php echo $row->total_target . " %";?></td>
                        <td>
                          <?php        
                            $statusC = 0;
                            if(!is_array($realisasifisik)) :
                              echo "-";
                            else:      
                            foreach ($realisasifisik as $rowC) :
                              if($row->kd_urusan == $rowC->kd_urusan && $row->kd_bidang == $rowC->kd_bidang && $row->kd_prog == $rowC->kd_prog && $row->kd_keg == $rowC->kd_keg) :
                                echo $rowC->total_realisasi . " %";
                                break;
                              endif;
                            endforeach;
                              if($statusC!=1):
                                echo "-";
                              endif;
                            endif;
                          ?>
                        </td>
                        <td>
                          <?php      
                            $statusC = 0;
                            if(!is_array($realisasifisik)) :
                              echo "-";
                            else:      
                            foreach ($realisasifisik as $rowD) :
                              if($row->kd_urusan == $rowD->kd_urusan && $row->kd_bidang == $rowD->kd_bidang && $row->kd_prog == $rowD->kd_prog && $row->kd_keg == $rowD->kd_keg) :
                                echo $rowD->total_realisasi-$row->total_target . " %";
                                break;
                              endif;
                            endforeach;
                              if($statusC!=1):
                                echo "-";
                              endif;
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
      $("#realisasi-fisik").addClass("active");
    });
  </script>