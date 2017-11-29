<?php
  include 'header.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pelaporan Realisasi Fisik |
        <small>E-Pembangunan</small>
      </h1>
    </section>

    <!-- Main content -->
      <section class="content">
        <div class="row">
        <form>
          <!-- /.col -->
          <div class="col-md-9">
            <!-- About Me Box -->
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-user-plus margin-r-5"></i>Tambah Data Penduduk</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                  <div class="col-md-4">
                    <div id="validation" class="form-group">
                      <label>Kode Rekening</label>
                      <input required id="nik" name="nik" type="number" class="form-control" placeholder="4.01 . 4.01.03 . 01 . 02 . 05" onblur="checknik(this)">
                      <span id="help" class="help-block"></span>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="form-group">
                      <label>Nama Kegiatan</label>
                      <input readonly name="nkk" type="text" class="form-control" value="Nama Kegiatan">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Jenis Kegiatan</label>
                      <input readonly name="nama" type="text" class="form-control" value="Pengadaan">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Pagu Anggaran</label>
                      <input readonly name="nama" type="text" class="form-control" value="Pagu Anggaran">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Nilai Kontrak</label>
                      <input readonly name="nama" type="text" class="form-control" value="Nilai Kontrak">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Nama Pelaksana</label>
                      <input readonly name="nama" type="text" class="form-control" value="Nama Pelaksana">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Tanggal Mulai Pelaksanaan</label>
                      <input readonly name="nama" type="text" class="form-control" value="Tanggal Mulai">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Jangka Waktu</label>
                      <input readonly name="nama" type="text" class="form-control" value="Jangka Waktu">
                    </div>
                  </div>
                </div>
                <hr/>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Bulan</label>
                      <select required name="pendidikan" class="form-control">
                        <option value="">Pilih Bulan</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Target</label>
                      <input readonly name="nama" type="text" class="form-control" value="80%">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Realisasi</label>
                      <input required name="nama" type="text" class="form-control" placeholder="Realisasi (%)">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Keterangan</label>
                      <input name="pekerjaan" type="text" class="form-control" placeholder="Keterangan">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label>Foto Realisasi</label>
                    <input name="foto" type="file" id="fotoArtikel">
                    <br/>
                    <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-plus text-green"></i> Foto</button>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="#" class="btn btn-default"><i class="fa fa-close"></i> Cancel</a>
                <button type="submit" class="btn btn-default pull-right"><i class="fa fa-check text-green"></i> Submit</button>
              </div>
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
        </form>
        </div>
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- nik validation -->
  <script>

  function checknik(input)
  {
    if($('#nik').val()==""){
      console.log("meong");
      $('#help').html('');
      $('#validation').removeClass("has-success");
    }
    else{
      $.getJSON( "<?=site_url('penduduk/ajaxchecknik/')?>" + input.value)
      .done(function( data ) {
        if(data == false)
          {
            $('#help').html('');
            $('#validation').removeClass("has-error");
            $('#validation').addClass("has-success");
          }
          else
          {
            $('#help').html('NIK sudah terdaftar');
            $('#validation').addClass("has-error");
          }     
      });                  
    }    
  }

  $(document).ready(function() {
    $('#data_penduduk').addClass("active");
    $('#penduduk').addClass("active");
  });

  </script>

<?php
  include 'footer.php';
?>