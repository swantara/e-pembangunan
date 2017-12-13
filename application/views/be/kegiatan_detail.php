
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Progress Fisik
        <small>E-Pembangunan</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box box-danger">
            <div class="box-header with-border">
              <a style="margin-right: 5px;" href="#" class="btn btn-default btn"><i class="fa fa-download text-green"></i></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 10px;">#</th>
                  <th>Kode Rekening</th>
                  <th>Jenis Pengadaan</th>
                  <th>Nama Kegiatan</th>
                  <th>Sebelum Perubahan</th>
                  <th>Setelah Perubahan</th>
                  <th>Selisih</th>
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
                  <td>4.01 . 4.01.03 . 01 . 02 . 05</td>
                  <td>Barang</td>
                  <td>Nama Pekerjaan</td>
                  <td>29.969.465.200,00</td>
                  <td>33.994.362.000,00</td>
                  <td>(+) 4.024.896.800,00</td>
                  <td>(+) 13,43%</td>
                </tr>

                <?php
                    $no ++;
                    endforeach;
                  endif;
                ?>

                </tbody>
                <tfoot>
                <tr>
                  <th style="width: 10px;">No</th>
                  <th>Kode Rekening</th>
                  <th>Jenis Pengadaan</th>
                  <th>Nama Kegiatan</th>
                  <th>Sebelum Perubahan</th>
                  <th>Setelah Perubahan</th>
                  <th>Selisih</th>
                  <th>Persentase</th>
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

  <script>

    $(document).ready(function() {
      $('#user').addClass("active");
    });

  </script>