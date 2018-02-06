
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
        <?php echo form_open('backend/laporanfisik/?kd_urusan='.$data_kegiatan->kd_urusan.'&kd_bidang='.$data_kegiatan->kd_bidang.'&kd_unit='.$data_kegiatan->kd_unit.'&kd_sub='.$data_kegiatan->kd_sub.'&kd_prog='.$data_kegiatan->kd_prog.'&kd_keg='.$data_kegiatan->kd_keg.'&kd_rek_1='.$data_kegiatan->kd_rek_1.'&kd_rek_2='.$data_kegiatan->kd_rek_2.'&kd_rek_3='.$data_kegiatan->kd_rek_3.'&kd_rek_4='.$data_kegiatan->kd_rek_4.'&kd_rek_5='.$data_kegiatan->kd_rek_5.'&no_rinc='.$data_kegiatan->no_rinc.'&no_id='.$data_kegiatan->no_id, array('method' => 'POST', 'role' => 'form', 'enctype' => 'multipart/form-data'));?>
        <?php echo validation_errors();?>
          <!-- /.col -->
          <div class="col-md-12">
            <!-- About Me Box -->
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-user-plus margin-r-5"></i>Pelaporan Realisasi Fisik</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <!-- <div class="row">
                  <div class="col-md-1">
                    <div class="form-group">
                      <label class="control-label">Urusan</label>
                      <select name="select" class="form-control input-xs">
                          <option value="opt1">Semua</option>
                          <option value="opt2">1 - Urusan Wajib Pelayanan Dasar</option>
                          <option value="opt3">2 - Urusan Wajib Bukan Pelayanan Dasar</option>
                          <option value="opt4">3 - Urusan Pilihan</option>
                          <option value="opt4">4 - Fungsi Penunjang Urusan Pemerintahan</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="form-group">
                      <label class="control-label">Bidang</label>
                      <select name="select" class="form-control input-xs">
                          <option value="opt1">Semua</option>
                          <option value="opt2">1.01 - Pendidikan</option>
                          <option value="opt3">1.02 - Kesehatan</option>
                          <option value="opt4">1.03 - Pekerjaan Umum dan Penataan Ruang</option>
                          <option value="opt4">1.04 - Perumahan Rakyat dan Kawasan Permukiman</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="form-group">
                      <label class="control-label">Unit</label>
                      <select name="select" class="form-control input-xs">
                          <option value="opt1">Semua</option>
                          <option value="opt2">1.01.01 - Dinas Pendidikan, Kepemudaan dan Olah Raga</option>
                          <option value="opt3">1.02.01 - Dinas Kesehatan</option>
                          <option value="opt4">1.02.02 - Rumah Sakit Umum Daerah</option>
                          <option value="opt4">1.03.01 - Perumahan Rakyat dan Kawasan Permukiman</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="form-group">
                      <label class="control-label">Sub-Unit</label>
                      <select name="select" class="form-control input-xs">
                          <option value="opt1">Semua</option>
                          <option value="opt2">1.01.01.01 - Dinas Pendidikan, Kepemudaan dan Olah Raga</option>
                          <option value="opt3">1.02.01.01 - Dinas Kesehatan</option>
                          <option value="opt4">1.02.02.01 - Rumah Sakit Umum Daerah</option>
                          <option value="opt4">1.03.01.01 - Dinas Perumahan Rakyat dan Kawasan Permukiman</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="form-group">
                      <label class="control-label">Program</label>
                      <select name="select" class="form-control input-xs">
                          <option value="opt1">Semua</option>
                          <option value="opt2">1.01.01 - Program Pelayanan Administrasi Perkantoran</option>
                          <option value="opt3">1.02.01 - Program Peningkatan Sarana dan Prasarana Aparatur </option>
                          <option value="opt4">1.02.02 - Program Peningkatan Disiplin Aparatur</option>
                          <option value="opt4">1.03.01 - Program fasilitasi pindah/purna tugas PNS</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="form-group">
                      <label class="control-label">Kegiatan</label>
                      <select name="select" class="form-control input-xs">
                          <option value="opt1">Semua</option>
                          <option value="opt2">1.01.01.02 - Penyediaan Jasa Komunikasi Sumber Daya Air dan listrik</option>
                          <option value="opt3">1.01.01.07 - Penyediaan Jasa Adminstrasi Keuangan</option>
                          <option value="opt4">1.01.01.08 - Penyediaan Jasa Penjaga Malam, dan Sopir</option>
                          <option value="opt4">1.01.01.10 - Penyediaan Alat Tulis Kantor</option>
                          <option value="opt4">1.03.01 - Perumahan Rakyat dan Kawasan Permukiman</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="form-group">
                      <label class="control-label">Rek 1</label>
                      <select name="select" class="form-control input-xs">
                          <option value="opt1">Semua</option>
                          <option value="opt2">1.01.01.02 - Penyediaan Jasa Komunikasi Sumber Daya Air dan listrik</option>
                          <option value="opt3">1.01.01.07 - Penyediaan Jasa Adminstrasi Keuangan</option>
                          <option value="opt4">1.01.01.08 - Penyediaan Jasa Penjaga Malam, dan Sopir</option>
                          <option value="opt4">1.01.01.10 - Penyediaan Alat Tulis Kantor</option>
                          <option value="opt4">1.03.01 - Perumahan Rakyat dan Kawasan Permukiman</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="form-group">
                      <label class="control-label">Rek 1</label>
                      <select name="select" class="form-control input-xs">
                          <option value="opt1">Semua</option>
                          <option value="opt2">1.01.01.02 - Penyediaan Jasa Komunikasi Sumber Daya Air dan listrik</option>
                          <option value="opt3">1.01.01.07 - Penyediaan Jasa Adminstrasi Keuangan</option>
                          <option value="opt4">1.01.01.08 - Penyediaan Jasa Penjaga Malam, dan Sopir</option>
                          <option value="opt4">1.01.01.10 - Penyediaan Alat Tulis Kantor</option>
                          <option value="opt4">1.03.01 - Perumahan Rakyat dan Kawasan Permukiman</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="form-group">
                      <label class="control-label">Rek 2</label>
                      <select name="select" class="form-control input-xs">
                          <option value="opt1">Semua</option>
                          <option value="opt2">1.01.01.02 - Penyediaan Jasa Komunikasi Sumber Daya Air dan listrik</option>
                          <option value="opt3">1.01.01.07 - Penyediaan Jasa Adminstrasi Keuangan</option>
                          <option value="opt4">1.01.01.08 - Penyediaan Jasa Penjaga Malam, dan Sopir</option>
                          <option value="opt4">1.01.01.10 - Penyediaan Alat Tulis Kantor</option>
                          <option value="opt4">1.03.01 - Perumahan Rakyat dan Kawasan Permukiman</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="form-group">
                      <label class="control-label">Rek 3</label>
                      <select name="select" class="form-control input-xs">
                          <option value="opt1">Semua</option>
                          <option value="opt2">1.01.01.02 - Penyediaan Jasa Komunikasi Sumber Daya Air dan listrik</option>
                          <option value="opt3">1.01.01.07 - Penyediaan Jasa Adminstrasi Keuangan</option>
                          <option value="opt4">1.01.01.08 - Penyediaan Jasa Penjaga Malam, dan Sopir</option>
                          <option value="opt4">1.01.01.10 - Penyediaan Alat Tulis Kantor</option>
                          <option value="opt4">1.03.01 - Perumahan Rakyat dan Kawasan Permukiman</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="form-group">
                      <label class="control-label">Rek 4</label>
                      <select name="select" class="form-control input-xs">
                          <option value="opt1">Semua</option>
                          <option value="opt2">1.01.01.02 - Penyediaan Jasa Komunikasi Sumber Daya Air dan listrik</option>
                          <option value="opt3">1.01.01.07 - Penyediaan Jasa Adminstrasi Keuangan</option>
                          <option value="opt4">1.01.01.08 - Penyediaan Jasa Penjaga Malam, dan Sopir</option>
                          <option value="opt4">1.01.01.10 - Penyediaan Alat Tulis Kantor</option>
                          <option value="opt4">1.03.01 - Perumahan Rakyat dan Kawasan Permukiman</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="form-group">
                      <label class="control-label">Rek 5</label>
                      <select name="select" class="form-control input-xs">
                          <option value="opt1">Semua</option>
                          <option value="opt2">1.01.01.02 - Penyediaan Jasa Komunikasi Sumber Daya Air dan listrik</option>
                          <option value="opt3">1.01.01.07 - Penyediaan Jasa Adminstrasi Keuangan</option>
                          <option value="opt4">1.01.01.08 - Penyediaan Jasa Penjaga Malam, dan Sopir</option>
                          <option value="opt4">1.01.01.10 - Penyediaan Alat Tulis Kantor</option>
                          <option value="opt4">1.03.01 - Perumahan Rakyat dan Kawasan Permukiman</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="form-group">
                      <button class="btn btn-default btn" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </div> -->
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>OPD</label>
                      <input readonly type="text" class="form-control" value="<?=$opd->nama?>">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Kegiatan</label>
                      <input readonly name="nama" type="text" class="form-control" value="<?=$nama_kegiatan->nama?>">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Tahun</label>
                      <input readonly  type="text" class="form-control" value="<?=$data_kegiatan->tahun?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>No Rekening</label>
                      <input readonly type="text" class="form-control" value="<?php echo $data_kegiatan->kd_urusan . " . 0" . $data_kegiatan->kd_bidang . " . 0" . $data_kegiatan->kd_unit . " . 0" . $data_kegiatan->kd_sub . " . 0" . $data_kegiatan->kd_prog . " . 0" . $data_kegiatan->kd_keg. " . " . $data_kegiatan->kd_rek_1. " . " . $data_kegiatan->kd_rek_2. " . " . $data_kegiatan->kd_rek_3. " . " . $data_kegiatan->kd_rek_4. " . " . $data_kegiatan->kd_rek_5. " . " . $data_kegiatan->no_rinc; ?>">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Uraian</label>
                      <input readonly type="text" class="form-control" value="<?php echo $data_kegiatan->keterangan?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Anggaran Induk</label>
                      <input readonly type="text" class="form-control" value="<?php echo "Rp. " . number_format($data_kegiatan->total_induk, 0, ',', '.')?>">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Anggaran Perubahan</label>
                      <input readonly type="text" class="form-control" value="<?php echo "Rp. " . number_format($data_kegiatan->total_perubahan, 0, ',', '.')?>">
                    </div>
                  </div>
                </div>

                <!-- /.input group -->

                <br/>
                <label>Data Laporan</label>
                <hr style="margin-top: 0px; margin-bottom: 5px;" />
                <div class="row">
                  <div class="col-md-12">
                    <table class="table table-stripped table-hover">
                      <thead>
                        <tr>
                          <th style="width: 10px;">Ket</th>
                          <th style="width: 10px;">Tahun</th>
                          <th>Januari</th>
                          <th>Pebruari</th>
                          <th>Maret</th>
                          <th>April</th>
                          <th>Mei</th>
                          <th>Juni</th>
                          <th>Juli</th>
                          <th>Agustus</th>
                          <th>September</th>
                          <th>Oktober</th>
                          <th>Nopember</th>
                          <th>Desember</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php if((is_object($target_fisik) || is_array($target_fisik)) && !is_null($target_fisik->b_1)) :?>
                        <tr>
                          <td>Target</td>
                          <td><?=$target_fisik->tahun?></td>
                          <td><?php echo number_format($target_fisik->b_1, 5, '.', ',') . "%";?></td>
                          <td><?php echo number_format($target_fisik->b_2, 5, '.', ',') . "%";?></td>
                          <td><?php echo number_format($target_fisik->b_3, 5, '.', ',') . "%";?></td>
                          <td><?php echo number_format($target_fisik->b_4, 5, '.', ',') . "%";?></td>
                          <td><?php echo number_format($target_fisik->b_5, 5, '.', ',') . "%";?></td>
                          <td><?php echo number_format($target_fisik->b_6, 5, '.', ',') . "%";?></td>
                          <td><?php echo number_format($target_fisik->b_7, 5, '.', ',') . "%";?></td>
                          <td><?php echo number_format($target_fisik->b_8, 5, '.', ',') . "%";?></td>
                          <td><?php echo number_format($target_fisik->b_9, 5, '.', ',') . "%";?></td>
                          <td><?php echo number_format($target_fisik->b_10, 5, '.', ',') . "%";?></td>
                          <td><?php echo number_format($target_fisik->b_11, 5, '.', ',') . "%";?></td>
                          <td><?php echo number_format($target_fisik->b_12, 5, '.', ',') . "%";?></td>
                          <td><?php echo number_format($target_fisik->total_fisik, 0, ',', '.') . "%";?></td>
                        </tr>
                      <?php else : ?>
                        <tr>
                          <td>Target</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                        </tr>
                      <?php endif; ?>
                      <?php if((is_object($realisasi_fisik) || is_array($realisasi_fisik))) :?>
                        <tr>
                          <td>Realisasi</td>
                          <td><?=$realisasi_fisik->tahun?></td>
                          <td><?php echo number_format($realisasi_fisik->b_1, 5, '.', ',') . "%";?></td>
                          <td><?php echo number_format($realisasi_fisik->b_2, 5, '.', ',') . "%";?></td>
                          <td><?php echo number_format($realisasi_fisik->b_3, 5, '.', ',') . "%";?></td>
                          <td><?php echo number_format($realisasi_fisik->b_4, 5, '.', ',') . "%";?></td>
                          <td><?php echo number_format($realisasi_fisik->b_5, 5, '.', ',') . "%";?></td>
                          <td><?php echo number_format($realisasi_fisik->b_6, 5, '.', ',') . "%";?></td>
                          <td><?php echo number_format($realisasi_fisik->b_7, 5, '.', ',') . "%";?></td>
                          <td><?php echo number_format($realisasi_fisik->b_8, 5, '.', ',') . "%";?></td>
                          <td><?php echo number_format($realisasi_fisik->b_9, 5, '.', ',') . "%";?></td>
                          <td><?php echo number_format($realisasi_fisik->b_10, 5, '.', ',') . "%";?></td>
                          <td><?php echo number_format($realisasi_fisik->b_11, 5, '.', ',') . "%";?></td>
                          <td><?php echo number_format($realisasi_fisik->b_12, 5, '.', ',') . "%";?></td>
                          <td><?php echo number_format($realisasi_fisik->total_fisik, 0, ',', '.') . "%";?></td>
                        </tr>
                      <?php else : ?>
                        <tr>
                          <td>Realisasi</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                        </tr>
                      <?php endif; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Bulan</label>
                      <select required name="bulan" class="form-control">
                        <option value="b_1">Januari</option>
                        <option value="b_2">Pebruari</option>
                        <option value="b_3">Maret</option>
                        <option value="b_4">April</option>
                        <option value="b_5">Mei</option>
                        <option value="b_6">Juni</option>
                        <option value="b_7">Juli</option>
                        <option value="b_8">Agustus</option>
                        <option value="b_9">September</option>
                        <option value="b_10">Oktober</option>
                        <option value="b_11">Nopember</option>
                        <option value="b_12">Desember</option>
                      </select>
                    </div>
                  </div>
                  <!-- <div class="col-md-4">
                    <div class="form-group">
                      <label>Target</label>
                      <input readonly name="nama" type="text" class="form-control" value="80%">
                    </div>
                  </div> -->
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Realisasi</label>
                      <input required name="realisasi" type="text" class="form-control" placeholder="Realisasi (%)">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <div class="box-body box-profile">
                      <img style="margin: 0 auto;" class="img-responsive"
                        <?php if(false): ?> src="<?php echo base_url() . 'assets/images/user/' . $data->foto?>"
                        <?php else : ?> src="<?=base_url()?>assets/images/no-image-square.jpg"
                        <?php endif; ?>
                       alt="Program Picture">
                      <hr>
                      <lavel>Browse Foto :</lavel>
                      <input name="foto" type="file"">
                    </div>
                  </div>
                  <div class="col-md-1"></div>
                  <div class="col-md-8">
                    <div class="form-group">
                      <label>Keterangan</label>
                      <input name="keterangan" type="text" class="form-control" placeholder="Keterangan">
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?=site_url('backend/detailrincianbykegiatan/?tahun='.$data_kegiatan->tahun.'&kd_urusan='.$data_kegiatan->kd_urusan.'&kd_bidang='.$data_kegiatan->kd_bidang.'&kd_unit='.$data_kegiatan->kd_unit.'&kd_sub='.$data_kegiatan->kd_sub.'&kd_prog='.$data_kegiatan->kd_prog.'&kd_keg='.$data_kegiatan->kd_keg.'&kd_rek_1='.$data_kegiatan->kd_rek_1.'&kd_rek_2='.$data_kegiatan->kd_rek_2.'&kd_rek_3='.$data_kegiatan->kd_rek_3.'&kd_rek_4='.$data_kegiatan->kd_rek_4.'&kd_rek_5='.$data_kegiatan->kd_rek_5.'&no_rinc='.$data_kegiatan->no_rinc.'&no_id='.$data_kegiatan->no_id)?>" class="btn btn-default"><i class="fa fa-close"></i> Cancel</a>
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

  <!-- bootstrap datepicker -->
  <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <!-- nik validation -->
  <script>

  $(document).ready(function() {
    $('#pelaporanfisik').addClass("active");
    //Date picker
    $('#datepicker-mulai').datepicker({
      autoclose: true
    });
    //Date picker
    $('#datepicker-selesai').datepicker({
      autoclose: true
    });
  });

  </script>