
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Kegiatan
        <small>E-Pembangunan</small>
      </h1>
    </section>

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
                  <th>Nama Kegiatan</th>
                  <th>Induk (Rp.)</th>
                  <th>Perubahan (Rp.)</th>
                  <th>Kelengkapan Data</th>
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
                  <td><?=$row->Tahun?></td>
                  <td>
                    <?php 
                      echo $row->Kd_Urusan . " . 0" . $row->Kd_Bidang . " . 0" . $row->Kd_Unit . " . 0" . $row->Kd_Sub . " . 0" . $row->Kd_Prog . " . 0" . $row->Kd_Keg;
                    ?>
                  </td>
                  <td>
                    <?php         
                      foreach ($nama_kegiatan as $rowB) :
<<<<<<< HEAD
                        if($row->Kd_Urusan == $rowB->Kd_Urusan && $row->Kd_Bidang == $rowB->Kd_Bidang && $row->Kd_Unit == $rowB->Kd_Unit && $row->Kd_Sub == $rowB->Kd_Sub && $row->Kd_Prog == $rowB->Kd_Prog && $row->Kd_Keg == $rowB->Kd_Keg) :
=======
                        if($row->Kd_Urusan == $rowB->Kd_Urusan && $row->Kd_Bidang == $rowB->Kd_Bidang && $row->Kd_Prog == $rowB->Kd_Prog && $row->Kd_Keg == $rowB->Kd_Keg) :
>>>>>>> master
                          echo $rowB->nama;
                          break;
                        endif;
                      endforeach;
                    ?>
                  </td>
                  <td style="text-align: right;"><?php echo number_format($row->total_induk, 0);?></td>
                  <td style="text-align: right;"><?php echo number_format($row->total_perubahan, 0);?></td>
                  <td>
                    <a href="<?=site_url('backend/rincianbykegiatan/?tahun='.$row->Tahun.'&kd_urusan='.$row->Kd_Urusan.'&kd_bidang='.$row->Kd_Bidang.'&kd_unit='.$row->Kd_Unit.'&kd_sub='.$row->Kd_Sub.'&kd_prog='.$row->Kd_Prog.'&kd_keg='.$row->Kd_Keg)?>">(x/x) <i style="margin-left: 5px;" class="fa fa-circle-o-notch fa-spin text-aqua ml-10"></i></a>
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
                  <th>Kode Rekening</th>
                  <th>Nama Kegiatan</th>
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