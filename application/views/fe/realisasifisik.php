
  <!-- Page header -->
  <div class="page-header mw-200">
    <!-- <div class="gradient-overlay">
    </div> -->
    <div class="img-overlay bg-gradient" style="background-image: url('<?=base_url("assets/images/backgrounds/kantor-bupati.jpg")?>');">
      <div class="page-header-content">
        <div class="page-title align-center">
          <div class="h-50">E-PEMBANGUNAN KABUPATEN BADUNG</div>
          <h4>
            <i class="icon-home2 position-left"></i>
            <a href="<?=site_url('')?>"><span class="text-semibold white-link">Beranda </span></a>
            <i class="icon-arrow-right32"></i>
            <i class="icon-clipboard2 position-left"></i>
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
                <div class="row">
                  <form class="form-vertical" action="#">
                    <div class="form-group">
                      <div style="margin-bottom: 10px;" class="col-md-2">
                        <label class="control-label">Kode Urusan</label>
                        <select name="select" class="form-control input-xs">
                            <option value="opt1">Semua</option>
                            <option value="opt2">1 - Urusan Wajib Pelayanan Dasar</option>
                            <option value="opt3">2 - Urusan Wajib Bukan Pelayanan Dasar</option>
                            <option value="opt4">3 - Urusan Pilihan</option>
                            <option value="opt4">4 - Fungsi Penunjang Urusan Pemerintahan</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <div style="margin-bottom: 10px;" class="col-md-2">
                        <label class="control-label">Kode Bidang</label>
                        <select name="select" class="form-control input-xs">
                            <option value="opt1">Semua</option>
                            <option value="opt2">1.01 - Pendidikan</option>
                            <option value="opt3">1.02 - Kesehatan</option>
                            <option value="opt4">1.03 - Pekerjaan Umum dan Penataan Ruang</option>
                            <option value="opt4">1.04 - Perumahan Rakyat dan Kawasan Permukiman</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <div style="margin-bottom: 10px;" class="col-md-2">
                        <label class="control-label">Kode Unit</label>
                        <select name="select" class="form-control input-xs">
                            <option value="opt1">Semua</option>
                            <option value="opt2">1.01.01 - Dinas Pendidikan, Kepemudaan dan Olah Raga</option>
                            <option value="opt3">1.02.01 - Dinas Kesehatan</option>
                            <option value="opt4">1.02.02 - Rumah Sakit Umum Daerah</option>
                            <option value="opt4">1.03.01 - Perumahan Rakyat dan Kawasan Permukiman</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <div style="margin-bottom: 10px;" class="col-md-2">
                        <label class="control-label">Kode Sub-Unit</label>
                        <select name="select" class="form-control input-xs">
                            <option value="opt1">Semua</option>
                            <option value="opt2">1.01.01.01 - Dinas Pendidikan, Kepemudaan dan Olah Raga</option>
                            <option value="opt3">1.02.01.01 - Dinas Kesehatan</option>
                            <option value="opt4">1.02.02.01 - Rumah Sakit Umum Daerah</option>
                            <option value="opt4">1.03.01.01 - Dinas Perumahan Rakyat dan Kawasan Permukiman</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <div style="margin-bottom: 10px;" class="col-md-2">
                        <label class="control-label">Kode Program</label>
                        <select name="select" class="form-control input-xs">
                            <option value="opt1">Semua</option>
                            <option value="opt2">1.01.01 - Program Pelayanan Administrasi Perkantoran</option>
                            <option value="opt3">1.02.01 - Program Peningkatan Sarana dan Prasarana Aparatur </option>
                            <option value="opt4">1.02.02 - Program Peningkatan Disiplin Aparatur</option>
                            <option value="opt4">1.03.01 - Program fasilitasi pindah/purna tugas PNS</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <div style="margin-bottom: 10px;" class="col-md-2">
                        <label class="control-label">Kode Kegiatan</label>
                        <select name="select" class="form-control input-xs">
                            <option value="opt1">Semua</option>
                            <option value="opt2">1.01.01.02 - Penyediaan Jasa Komunikasi Sumber Daya Air dan listrik</option>
                            <option value="opt3">1.01.01.07 - Penyediaan Jasa Adminstrasi Keuangan</option>
                            <option value="opt4">1.01.01.08 - Penyediaan Jasa Penjaga Malam, dan Sopir</option>
                            <option value="opt4">1.01.01.10 - Penyediaan Alat Tulis Kantor</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-2">
                        <label class="control-label">Nama Kegiatan</label>
                        <input placeholder="misal : Pengadaan Kendaraan Dinas/Operasional" type="text" class="form-control input-xs">
                      </div>
                    </div>
                    <div class="form-group">
                      <div style="margin-bottom: 10px;" class="col-md-2">
                        <label class="control-label">Jenis Pengadaan</label>
                        <select name="select" class="form-control input-xs">
                            <option value="opt1">Semua</option>
                            <option value="opt2">Barang</option>
                            <option value="opt3">Konstruksi</option>
                            <option value="opt4">Jasa</option>
                            <option value="opt4">Jasa Lainnya</option>
                            <option value="opt4">Swakelola</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <div style="margin-bottom: 10px;" class="col-md-2">
                        <label class="control-label">Bulan</label>
                        <select name="select" class="form-control input-xs">
                            <option value="opt1">Semua</option>
                            <option value="opt2">Januari</option>
                            <option value="opt3">Pebruari</option>
                            <option value="opt4">Maret</option>
                            <option value="opt4">April</option>
                            <option value="opt4">Mei</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-1">
                        <button class="btn btn-xs btn-red mt-26" type="submit"><i class="icon-search4"></i></button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="table-responsive mt-30">
                  <table class="table">
                    <thead>
                      <tr class="table-gradient">
                        <th>#</th>
                        <th>Kode Rekening</th>
                        <th>Jenis Pengadaan</th>
                        <th>Nama Kegiatan</th>
                        <th>Bulan</th>
                        <th>Target</th>
                        <th>Realisasi</th>
                        <th>Deviasi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr style="text-align: center;">
                      </tr>
                      <tr>
                        <td>1</td>  
                        <td><a href="<?=site_url('realisasifisik/detail')?>">4.01.03.01.02.05</a></td>  
                        <td>Barang</td>
                        <td>Pengadaan Kendaraan Dinas/Operasional</td>
                        <td>Agustus</td>  
                        <td>100 %</td>  
                        <td>100 %</td>  
                        <td>-</td>
                      </tr>
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
  <script>
    $(function () {
      "use strict";

      // LINE CHART 1
      var line = new Morris.Line({
        element: 'line-chart',
        resize: true,
        data: [
          {y: '2017-01', item1: 8.12, item2: 2.34},
          {y: '2017-02', item1: 21.05, item2: 3.67},
          {y: '2017-03', item1: 34.91, item2: 7.01},
          {y: '2017-04', item1: 45.02, item2: 8.10},
          {y: '2017-05', item1: 49.19, item2: 13.80},
          {y: '2017-06', item1: 56.44, item2: 25.77},
          {y: '2017-07', item1: 67.26, item2: 33.68},
          {y: '2017-08', item1: 78.51, item2: 39.02},
          {y: '2017-09', item1: 86.15, item2: 45.10},
          {y: '2017-10', item1: 91.62, item2: 56.43},
          {y: '2017-11', item1: 97.94},
          {y: '2017-12', item1: 100}
        ],
        xkey: 'y',
        ykeys: ['item1', 'item2'],
        labels: ['Target', 'Realisasi'],
        lineColors: ['#b9e0a0', '#a0d0e0'],
        hideHover: 'auto',
        postUnits: '%',
        xLabels : 'month'
      });
    });
  </script>
  <script type="text/javascript" src="<?=base_url('assets/js/pages/extra_trees.js')?>"></script>