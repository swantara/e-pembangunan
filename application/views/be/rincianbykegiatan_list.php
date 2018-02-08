
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Kegiatan
        <small>E-Pembangunan</small>
      </h1>
    </section>

    <?php
      $getYear = $this -> input -> get('tahun');
      if(isset($getYear)){
        $tahun = $getYear;
      }
      else{
        $tahun = date('Y');
      }
    ?>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box box-danger">
            <div class="box-header with-border">
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example2" class="table table-stripped table-hover">
                <thead>
                <tr>
                  <th style="width: 10px;">#</th>
                  <th>Tahun</th>
                  <th style="width: 240px;">Kode Rekening</th>
                  <th>Uraian</th>
                  <th>Induk (Rp.)</th>
                  <th>Perubahan (Rp.)</th>
                  <th>Kelengkapan Data</th>
                </tr>
                <h4><a href="<?=site_url('backend/?tahun='.$tahun)?>">Kegiatan</a> / Rincian</h4> 
                </thead>
                <tbody>

                <?php
                if(is_object($real) || is_array($real)) :
                  $no = 1;
                  foreach ($real as $row) :
                ?>

                <tr>
                  <td><?=$no?></td>
                  <td><?=$row->Tahun?></td>
                  <td>
                    <?php 
                      echo $row->Kd_Urusan . " . 0" . $row->Kd_Bidang . " . 0" . $row->Kd_Unit . " . 0" . $row->Kd_Sub . " . 0" . $row->Kd_Prog . " . 0" . $row->Kd_Keg. " . 0" . $row->Kd_Rek_1. " . 0" . $row->Kd_Rek_2. " . 0" . $row->Kd_Rek_3. " . 0" . $row->Kd_Rek_4. " . 0" . $row->Kd_Rek_5;
                    ?>
                  </td>
                  <td><?php echo $row->Keterangan_Rinc?></td>
                  <td style="text-align: right;">
                    <?php
                      if(!isset($row->jml_satuan_i) && !isset($row->nilai_rp_i) && !isset($row->total_i)) :
                        echo number_format($row->total_anggaran, 0, ',', '.');
                      else :
                        if($row->jml_satuan_i != 0 && $row->nilai_rp_i !=0 && $row->total_i !=0) : 
                          echo number_format($row->total_i, 0, ',', '.');
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
                  <td>
                    <a href="<?=site_url('backend/detailrincianbykegiatan/?tahun='.$row->Tahun.'&kd_urusan='.$row->Kd_Urusan.'&kd_bidang='.$row->Kd_Bidang.'&kd_unit='.$row->Kd_Unit.'&kd_sub='.$row->Kd_Sub.'&kd_prog='.$row->Kd_Prog.'&kd_keg='.$row->Kd_Keg.'&kd_rek_1='.$row->Kd_Rek_1.'&kd_rek_2='.$row->Kd_Rek_2.'&kd_rek_3='.$row->Kd_Rek_3.'&kd_rek_4='.$row->Kd_Rek_4.'&kd_rek_5='.$row->Kd_Rek_5)?>">(x/1) <i style="margin-left: 5px;" class="fa fa-circle-o-notch fa-spin text-aqua ml-10"></i></a>
                  </td>
                </tr>

                <?php
                    $no ++;
                    endforeach;
                  endif;
                ?>

                </tbody>
                <tfoot>
                <tr>
                  <th style="width: 10px;">#</th>
                  <th>Tahun</th>
                  <th style="width: 240px;">Kode Rekening</th>
                  <th>Uraian</th>
                  <th>Induk (Rp.)</th>
                  <th>Perubahan (Rp.)</th>
                  <th>Kelengkapan Data</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- <script>

    $(document).ready(function() {
      $('#user').addClass("active");
    });

  </script> -->

  <script>
  $(function () {
    $('#dashboard').addClass('active');
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      'pageLength'  : 25,
      'stateSave'   : true
    });
  })
  </script>