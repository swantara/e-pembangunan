
  <script type="text/javascript" src="<?=base_url('assets/js/plugins/visualization/echarts/echarts.js')?>"></script>
  <script type="text/javascript" src="<?=base_url('assets/js/pages/datatables_rask.js')?>"></script>
  <!-- D3 JS files -->
  <script type="text/javascript" src="<?=base_url('assets/js/plugins/visualization/d3/d3.min.js')?>"></script>
  <script type="text/javascript" src="<?=base_url('assets/js/plugins/visualization/d3/d3_tooltip.js')?>"></script>

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
                <h5 class="panel-title">
                  <i class="icon-search4 mr-10"></i>
                  <strong> 
                    <?php 
                      echo $nama_opd->nama . " - " . $nama_kegiatan->nama;
                    ?>      
                  </strong></h5>
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
                        <th style="width: 150px;">Kode Rekening</th>
                        <th style="width: 150px;">Uraian</th>
                        <th style="width: 200px;">Induk (Rp.)</th>
                        <th style="width: 200px;"">Perubahan (Rp.)</th>
                        <th style="width: 80px;">Kenaikan / Penurunan (Rp.)</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                        if(is_object($real) || is_array($real)) :
                          $no = 1;
                          // $total_perubahan = 0;
                          // $total_induk = 0;
                          foreach ($real as $row) :
                      ?>

                      <tr>
                        <td><?=$no?></td>
                        <th><?=$row->tahun?></th>
                        <td>
                          <?php 
                            echo $row->kd_urusan . " . 0" . $row->kd_bidang . " . 0" . $row->kd_unit . " . 0" . $row->kd_sub . " . 0" . $row->kd_prog . " . 0" . $row->kd_keg . " . 0" . $row->kd_rek_1 . " . 0" . $row->kd_rek_2 . " . 0" . $row->kd_rek_3 . " . 0" . $row->kd_rek_4 . " . 0" . $row->kd_rek_5 . " . 0" . $row->no_rinc;
                          ?>
                        </td>
                        <td><?=$row->keterangan?></td>
                        <td style="text-align: right;">
                          <?php
                            if(!isset($row->jml_satuan_i) && !isset($row->nilai_rp_i) && !isset($row->total_i)) :
                              echo "(" . $row->jml_satuan . " " . $row->satuan123 . " x " . number_format($row->nilai_rp, 0)  . ")<br/>= " . number_format($row->total, 0);
                            else :
                              if($row->jml_satuan_i != 0 && $row->nilai_rp_i !=0 && $row->total_i !=0) : 
                                echo "(" . $row->jml_satuan_i . " " . $row->satuan123 . " x " . number_format($row->nilai_rp_i, 0)  . ")<br/>= " . number_format($row->total_i, 0);
                              else :
                                echo "0";
                              endif;
                            endif;
                          ?>      
                        </td>
                        <td style="text-align: right;">
                          <?php
                            if(!isset($row->jml_satuan_i) && !isset($row->nilai_rp_i) && !isset($row->total_i)) :
                              echo "-";
                            else :
                              if($row->jml_satuan != 0 && $row->nilai_rp !=0 && $row->total !=0) : 
                                echo "(" . $row->jml_satuan . " " . $row->satuan123 . " x " . number_format($row->nilai_rp, 0)  . ")<br/>= " . number_format($row->total, 0);
                              else :
                                echo "0";
                              endif;
                            endif;
                          ?>
                        </td>
                        <td style="text-align: right;">
                          <?php
                            if(!isset($row->total_i)) :
                                echo "-";
                            else:
                                echo number_format(($row->total - $row->total_i),0);
                            endif;
                          ?>    
                        </td>
                      </tr>

                    <?php
                          // $total_induk = $total_induk + $row->total_i;
                          // $total_perubahan = $total_perubahan + $row->total;
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
      <!-- <?php echo "induk : " . $total_induk . " | perubahan : " . $total_perubahan;?> -->

    </div>
    <!-- /page content -->

  </div>
  <!-- /page container -->

  <!-- page script -->
  <script>
    $(document).ready(function(){
      $("#rask").addClass("active");
    });
  </script>