<?php
    include 'header.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">

        <div class="col-md-12 col-sm-6 col-xs-12">
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Selamat Datang, I Nyoman Swantara!</h4>
            Anda telah login ke dalam aplikasi E-Pembangunan.
          </div>
        </div>

        <!-- <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-line-chart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Realisasi Tertinggi</span>
              <span class="info-box-number">90<small>%</small></span> - <a href="#">Pengadaan ...</a>
            </div>

          </div>

        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-warning"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Belum Terlaporkan</span>
              <span class="info-box-number">50</span>
            </div>

          </div>

        </div>

        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-pie-chart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pelaporan Fisik</span>
              <span class="info-box-number">760</span>
            </div>

          </div>

        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">User SKPD</span>
              <span class="info-box-number">38</span>
            </div>

          </div>

        </div> -->
      </div>

      <div class="row">
        <div class="col-xs-12">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h4>Kegiatan</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 10px;">#</th>
                  <th>No Rekening</th>
                  <th>Nama Kegiatan</th>
                  <th>Sebelum Perubahan</th>
                  <th>Setelah Perubahan</th>
                  <th>Kelengkapan Data</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>1.</td>
                  <td><a href="#">4.01.03.01.02.05</a></td>
                  <td>Pengadaan Kendaraan Dinas/Operasional</td>
                  <td>Rp. 29.969.465.200,00</td>
                  <td>Rp. 33.994.362.000,00</td>
                  <td>
                    <a href="#">(4/6) <i style="margin-left: 5px;" class="fa fa-circle-o-notch fa-spin text-aqua ml-10"></i></a>
                    <!-- 1. Jenis Pengadaan <i class="fa fa-check text-green ml-5"></i><br/>
                    2. Anggaran Kas <i class="fa fa-times text-red ml-5"></i><br/>
                    3. Target Fisik <i class="fa fa-check text-green ml-5"></i><br/>
                    4. Metode Pengadaan <i class="fa fa-check text-green ml-5"></i><br/>
                    5. Anggaran Kas u/ Kontrak <i class="fa fa-times text-red ml-5"></i><br/>
                    6. Target Fisik u/ Kontrak <i class="fa fa-check text-green ml-5"></i><br/> -->
                  </td>
                </tr>
                </tbody>
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

<?php
  include 'footer.php';
?>