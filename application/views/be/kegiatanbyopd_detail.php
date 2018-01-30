
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detail Kegiatan
        <small>E-Pembangunan</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box box-danger">        
            <div class="box-body">
              <h4 style="display: inline;">
                <?php
                  echo $nama_opd->nama . " - " . $nama_kegiatan->nama;
                ?> 
              </h4>
              <a style="margin-left: 20px;" href="<?=site_url('backend/editdatakegiatan/?tahun='.$row->tahun.'&kd_urusan='.$data_kegiatan->kd_urusan.'&kd_bidang='.$data_kegiatan->kd_bidang.'&kd_unit='.$data_kegiatan->kd_unit.'&kd_sub='.$data_kegiatan->kd_sub.'&kd_prog='.$data_kegiatan->kd_prog.'&kd_keg='.$data_kegiatan->kd_keg)?>" class="btn btn-default btn"><i class="fa fa-edit text-green"></i></a>
              <hr/>
              <div class="row">
                <div class="col-xs-4">
                  <strong>OPD</strong>
                  <p><?=$nama_opd->nama?></p>
                  <hr/>
                  <strong>Nama Kegiatan</strong>
                  <p><?=$nama_kegiatan->nama;?></p>
                  <hr/>
                  <strong>Tahun</strong>
                  <p><?=$data_kegiatan->tahun?></p>
                  <hr/>
                  <strong>Kode Rekening</strong>
                  <p><?php echo $data_kegiatan->kd_urusan . " . 0" . $data_kegiatan->kd_bidang . " . 0" . $data_kegiatan->kd_unit . " . 0" . $data_kegiatan->kd_sub . " . 0" . $data_kegiatan->kd_prog . " . 0" . $data_kegiatan->kd_keg;?></p>
                  <hr/>
                </div>
                <div class="col-xs-2">
                  <strong>Anggaran Induk</strong>
                  <p><?php echo "Rp. " . number_format($data_kegiatan->total_induk, 0, ",", "."); ?></p>
                  <hr/>
                  <strong>Anggaran Perubahan</strong>
                  <p><?php echo "Rp. " . number_format($data_kegiatan->total_perubahan, 0, ",", "."); ?></p>
                  <hr/>
                  <strong>Kenaikan/Penurunan</strong>
                  <p><?php echo "Rp. " . number_format($data_kegiatan->total_perubahan-$data_kegiatan->total_induk, 0, ",", "."); ?></p>
                  <hr/>
                </div>
                <div class="col-xs-2">
                  <strong>Metode Pengadaan</strong>
                  <p>
                    <?php
                      if(is_object($data_kontrak) || is_array($data_kontrak)) :
                        echo $data_kontrak->ket_metode_pengadaan;
                      else :
                        echo "data belum tersedia";
                      endif;
                    ?>
                  </p>
                  <hr/>
                  <?php if((is_object($data_kontrak) || is_array($data_kontrak)) && $data_kontrak->metode_pengadaan!=1) :?>
                  <strong>Jenis Pengadaan</strong>
                  <p><?=$data_kontrak->ket_jenis_pengadaan?></p>
                  <hr/>
                  <strong>Pelaksana</strong>
                  <p><?=$data_kontrak->pelaksana?></p>
                  <hr/>
                  <strong>Nilai Kontrak</strong>
                  <p><?=$data_kontrak->nilai_kontrak?></p>
                  <hr/>
                  <?php endif; ?>
                </div>
                <div class="col-xs-2">                  
                  <?php if((is_object($data_kontrak) || is_array($data_kontrak)) && $data_kontrak->metode_pengadaan!=1) :?>
                  <strong>No Kontrak</strong>
                  <p><?=$data_kontrak->nilai_kontrak?></p>
                  <hr/>
                  <strong>Tanggal Mulai</strong>
                  <p>
                    <?php
                      $date=date_create($data_kontrak->tanggal_mulai);
                      $newdate=date_format($date,"d-m-Y");
                      echo $newdate;
                    ?>
                  </p>
                  <hr/>
                  <strong>Tanggal Berakhir</strong>
                  <p>
                    <?php
                      $date=date_create($data_kontrak->tanggal_selesai);
                      $newdate=date_format($date,"d-m-Y");
                      echo $newdate;
                    ?>
                  </p>
                  <hr/>
                  <strong>Lama Pekerjaan</strong>
                  <p><?php echo $data_kontrak->durasi . " hari"?></p>
                  <hr/>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12">
          <div class="box box-danger">            
            <div class="box-body">
              <h4 style="display: inline;">
                Anggaran Kas
              </h4>
              <a style="margin-left: 20px;" href="<?=site_url('backend/edittargetkegiatan/?kd_urusan='.$data_kegiatan->kd_urusan.'&kd_bidang='.$data_kegiatan->kd_bidang.'&kd_unit='.$data_kegiatan->kd_unit.'&kd_sub='.$data_kegiatan->kd_sub.'&kd_prog='.$data_kegiatan->kd_prog.'&kd_keg='.$data_kegiatan->kd_keg)?>" class="btn btn-default btn"><i class="fa fa-edit text-green"></i></a>
              <hr/>
              <div class="table-responsive">
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
                    <?php if((is_object($target_keuangan) || is_array($target_keuangan)) && !is_null($target_keuangan->b_1)) :?>
                    <tr>
                      <td>Target</td>
                      <td><?=$target_keuangan->tahun?></td>
                      <td><?php echo "Rp." . number_format($target_keuangan->b_1, 0, ',', '.');?></td>
                      <td><?php echo "Rp." . number_format($target_keuangan->b_2, 0, ',', '.');?></td>
                      <td><?php echo "Rp." . number_format($target_keuangan->b_3, 0, ',', '.');?></td>
                      <td><?php echo "Rp." . number_format($target_keuangan->b_4, 0, ',', '.');?></td>
                      <td><?php echo "Rp." . number_format($target_keuangan->b_5, 0, ',', '.');?></td>
                      <td><?php echo "Rp." . number_format($target_keuangan->b_6, 0, ',', '.');?></td>
                      <td><?php echo "Rp." . number_format($target_keuangan->b_7, 0, ',', '.');?></td>
                      <td><?php echo "Rp." . number_format($target_keuangan->b_8, 0, ',', '.');?></td>
                      <td><?php echo "Rp." . number_format($target_keuangan->b_9, 0, ',', '.');?></td>
                      <td><?php echo "Rp." . number_format($target_keuangan->b_10, 0, ',', '.');?></td>
                      <td><?php echo "Rp." . number_format($target_keuangan->b_11, 0, ',', '.');?></td>
                      <td><?php echo "Rp." . number_format($target_keuangan->b_12, 0, ',', '.');?></td>
                      <td><?php echo "Rp." . number_format($target_keuangan->b_12, 0, ',', '.');?></td>
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
                  </tbody>
                </table>
              </div>
              <hr/>
              <br/>
              <h4>Realisasi Fisik</h4>
              <hr/>
              <div class="table-responsive">
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
                        <td><?php echo number_format($target_fisik->b_1, 0, ',', '.') . "%";?></td>
                        <td><?php echo number_format($target_fisik->b_2, 0, ',', '.') . "%";?></td>
                        <td><?php echo number_format($target_fisik->b_3, 0, ',', '.') . "%";?></td>
                        <td><?php echo number_format($target_fisik->b_4, 0, ',', '.') . "%";?></td>
                        <td><?php echo number_format($target_fisik->b_5, 0, ',', '.') . "%";?></td>
                        <td><?php echo number_format($target_fisik->b_6, 0, ',', '.') . "%";?></td>
                        <td><?php echo number_format($target_fisik->b_7, 0, ',', '.') . "%";?></td>
                        <td><?php echo number_format($target_fisik->b_8, 0, ',', '.') . "%";?></td>
                        <td><?php echo number_format($target_fisik->b_9, 0, ',', '.') . "%";?></td>
                        <td><?php echo number_format($target_fisik->b_10, 0, ',', '.') . "%";?></td>
                        <td><?php echo number_format($target_fisik->b_11, 0, ',', '.') . "%";?></td>
                        <td><?php echo number_format($target_fisik->b_12, 0, ',', '.') . "%";?></td>
                        <td><?php echo number_format($target_fisik->b_12, 0, ',', '.') . "%";?></td>
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
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php if((is_object($data_kontrak) || is_array($data_kontrak)) && $data_kontrak->metode_pengadaan!=1) :?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-danger">            
            <div class="box-body">
              <h4 style="display: inline;">Anggaran Kas Untuk Proyek</h4>
              <a style="margin-left: 20px;" href="<?=site_url('backend/edittargetkontrak/?kd_urusan='.$data_kegiatan->kd_urusan.'&kd_bidang='.$data_kegiatan->kd_bidang.'&kd_unit='.$data_kegiatan->kd_unit.'&kd_sub='.$data_kegiatan->kd_sub.'&kd_prog='.$data_kegiatan->kd_prog.'&kd_keg='.$data_kegiatan->kd_keg)?>" class="btn btn-default btn"><i class="fa fa-edit text-green"></i></a>
              <hr/>
              <div class="table-responsive">
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
                    </tr>
                  </thead>       
                  <tbody>         
                    <?php if((is_object($kontrak_keuangan) || is_array($kontrak_keuangan)) && !is_null($kontrak_keuangan->tahun)) :?>
                    <tr>
                      <td>Target</td>
                      <td><?=$kontrak_keuangan->tahun?></td>
                      <td>
                        <?php 
                          if ($kontrak_keuangan->b_1!=0):
                            echo "Rp." . number_format($kontrak_keuangan->b_1, 0, ',', '.');
                          else :
                            echo "-";
                          endif;
                        ?>
                      </td>
                      <td>
                        <?php 
                          if ($kontrak_keuangan->b_2!=0):
                            echo "Rp." . number_format($kontrak_keuangan->b_2, 0, ',', '.');
                          else :
                            echo "-";
                          endif;
                        ?>
                      </td>
                      <td>
                        <?php 
                          if ($kontrak_keuangan->b_3!=0):
                            echo "Rp." . number_format($kontrak_keuangan->b_3, 0, ',', '.');
                          else :
                            echo "-";
                          endif;
                        ?>
                      </td>
                      <td>
                        <?php 
                          if ($kontrak_keuangan->b_4!=0):
                            echo "Rp." . number_format($kontrak_keuangan->b_4, 0, ',', '.');
                          else :
                            echo "-";
                          endif;
                        ?>
                      </td>
                      <td>
                        <?php 
                          if ($kontrak_keuangan->b_5!=0):
                            echo "Rp." . number_format($kontrak_keuangan->b_5, 0, ',', '.');
                          else :
                            echo "-";
                          endif;
                        ?>
                      </td>
                      <td>
                        <?php 
                          if ($kontrak_keuangan->b_6!=0):
                            echo "Rp." . number_format($kontrak_keuangan->b_6, 0, ',', '.');
                          else :
                            echo "-";
                          endif;
                        ?>
                      </td>
                      <td>
                        <?php 
                          if ($kontrak_keuangan->b_7!=0):
                            echo "Rp." . number_format($kontrak_keuangan->b_7, 0, ',', '.');
                          else :
                            echo "-";
                          endif;
                        ?>
                      </td>
                      <td>
                        <?php 
                          if ($kontrak_keuangan->b_8!=0):
                            echo "Rp." . number_format($kontrak_keuangan->b_8, 0, ',', '.');
                          else :
                            echo "-";
                          endif;
                        ?>
                      </td>
                      <td>
                        <?php 
                          if ($kontrak_keuangan->b_9!=0):
                            echo "Rp." . number_format($kontrak_keuangan->b_9, 0, ',', '.');
                          else :
                            echo "-";
                          endif;
                        ?>
                      </td>
                      <td>
                        <?php 
                          if ($kontrak_keuangan->b_10!=0):
                            echo "Rp." . number_format($kontrak_keuangan->b_10, 0, ',', '.');
                          else :
                            echo "-";
                          endif;
                        ?>
                      </td>
                      <td>
                        <?php 
                          if ($kontrak_keuangan->b_11!=0):
                            echo "Rp." . number_format($kontrak_keuangan->b_11, 0, ',', '.');
                          else :
                            echo "-";
                          endif;
                        ?>
                      </td>
                      <td>
                        <?php 
                          if ($kontrak_keuangan->b_12!=0):
                            echo "Rp." . number_format($kontrak_keuangan->b_12, 0, ',', '.');
                          else :
                            echo "-";
                          endif;
                        ?>
                      </td>
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
                    </tr>
                  </tbody>
                </table>
              </div>
              <hr/>
              <br/>
              <h4 style="display: inline;">Realisasi Fisik Untuk Proyek</h4>
              <a style="margin-left: 20px;" href="<?=site_url('backend/edittargetkontrak/?kd_urusan='.$data_kegiatan->kd_urusan.'&kd_bidang='.$data_kegiatan->kd_bidang.'&kd_unit='.$data_kegiatan->kd_unit.'&kd_sub='.$data_kegiatan->kd_sub.'&kd_prog='.$data_kegiatan->kd_prog.'&kd_keg='.$data_kegiatan->kd_keg)?>" class="btn btn-default btn"><i class="fa fa-edit text-green"></i></a>
              <hr/>
              <div class="table-responsive">
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
                    </tr>
                  </thead>
                  <tbody>
                  <?php if((is_object($kontrak_fisik) || is_array($kontrak_fisik)) && !is_null($kontrak_fisik->tahun)) :?>
                    <tr>
                      <td>Target</td>
                      <td><?=$kontrak_fisik->tahun?></td>
                      <td>
                        <?php 
                          if ($kontrak_fisik->b_1!=0):
                            echo number_format($kontrak_fisik->b_1, 0, ',', '.') . "%";
                          else :
                            echo "-";
                          endif;
                        ?>
                      </td>
                      <td>
                        <?php 
                          if ($kontrak_fisik->b_2!=0):
                            echo number_format($kontrak_fisik->b_2, 0, ',', '.') . "%";
                          else :
                            echo "-";
                          endif;
                        ?>
                      </td>
                      <td>
                        <?php 
                          if ($kontrak_fisik->b_3!=0):
                            echo number_format($kontrak_fisik->b_3, 0, ',', '.') . "%";
                          else :
                            echo "-";
                          endif;
                        ?>
                      </td>
                      <td>
                        <?php 
                          if ($kontrak_fisik->b_4!=0):
                            echo number_format($kontrak_fisik->b_4, 0, ',', '.') . "%";
                          else :
                            echo "-";
                          endif;
                        ?>
                      </td>
                      <td>
                        <?php 
                          if ($kontrak_fisik->b_5!=0):
                            echo number_format($kontrak_fisik->b_5, 0, ',', '.') . "%";
                          else :
                            echo "-";
                          endif;
                        ?>
                      </td>
                      <td>
                        <?php 
                          if ($kontrak_fisik->b_6!=0):
                            echo number_format($kontrak_fisik->b_6, 0, ',', '.') . "%";
                          else :
                            echo "-";
                          endif;
                        ?>
                      </td>
                      <td>
                        <?php 
                          if ($kontrak_fisik->b_7!=0):
                            echo number_format($kontrak_fisik->b_7, 0, ',', '.') . "%";
                          else :
                            echo "-";
                          endif;
                        ?>
                      </td>
                      <td>
                        <?php 
                          if ($kontrak_fisik->b_8!=0):
                            echo number_format($kontrak_fisik->b_8, 0, ',', '.') . "%";
                          else :
                            echo "-";
                          endif;
                        ?>
                      </td>
                      <td>
                        <?php 
                          if ($kontrak_fisik->b_9!=0):
                            echo number_format($kontrak_fisik->b_9, 0, ',', '.') . "%";
                          else :
                            echo "-";
                          endif;
                        ?>
                      </td>
                      <td>
                        <?php 
                          if ($kontrak_fisik->b_10!=0):
                            echo number_format($kontrak_fisik->b_10, 0, ',', '.') . "%";
                          else :
                            echo "-";
                          endif;
                        ?>
                      </td>
                      <td>
                        <?php 
                          if ($kontrak_fisik->b_11!=0):
                            echo number_format($kontrak_fisik->b_11, 0, ',', '.') . "%";
                          else :
                            echo "-";
                          endif;
                        ?>
                      </td>
                      <td>
                        <?php 
                          if ($kontrak_fisik->b_12!=0):
                            echo number_format($kontrak_fisik->b_12, 0, ',', '.') . "%";
                          else :
                            echo "-";
                          endif;
                        ?>
                      </td>
                    </tr>
                    <?php endif; ?>
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
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php endif;?>

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
                  <th style="width: 50px;">Kenaikan / Penurunan (Rp.)</th>
                </tr>
                </thead>
                <tbody>

                <?php
                if(is_object($real) || is_array($real)) :
                  $no = 1;
                  foreach ($real as $row) :
                ?>

                <tr>
                  <td><?=$no?></td>
                  <td><?=$row->tahun?></td>
                  <td>
                    <?php 
                      echo $row->kd_urusan . " . 0" . $row->kd_bidang . " . 0" . $row->kd_unit . " . 0" . $row->kd_sub . " . 0" . $row->kd_prog . " . 0" . $row->kd_keg. " . " . $row->kd_rek_1. " . " . $row->kd_rek_2. " . " . $row->kd_rek_3. " . " . $row->kd_rek_4. " . " . $row->kd_rek_5. " . " . $row->no_rinc;
                    ?>
                  </td>
                  <td><?php echo $row->keterangan?></td>
                  <td style="text-align: right;">
                    <?php
                      if($row->jml_satuan_i != 0 && $row->nilai_rp_i !=0 && $row->total_i !=0) : 
                        echo "(" . $row->jml_satuan_i . " " . $row->satuan123 . " x " . number_format($row->nilai_rp_i, 0)  . ")<br/>= " . number_format($row->total_i, 0);
                      else :
                        echo "0";
                      endif;
                    ?>    
                  </td>
                  <td style="text-align: right;">
                    <?php 
                      if($row->jml_satuan != 0 && $row->nilai_rp !=0 && $row->total !=0) : 
                        echo "(" . $row->jml_satuan . " " . $row->satuan123 . " x " . number_format($row->nilai_rp, 0)  . ")<br/>= " . number_format($row->total, 0);
                      else :
                        echo "0";
                      endif;
                    ?>
                  </td>
                  <td style="text-align: right;"><?php echo number_format(($row->total - $row->total_i),0);?></td>
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
                  <th>Uraian</th>
                  <th>Induk (Rp.)</th>
                  <th>Perubahan (Rp.)</th>
                  <th>Kenaikan / Penurunan (Rp.)</th>
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
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      'pageLength'  : 25,
      'stateSave'   : true
    });
  })
  </script>