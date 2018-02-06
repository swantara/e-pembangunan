
<!-- Content Wrapper. Contains page content -->
  <?php
    $getYear = $this -> input -> get('tahun');
    if(isset($getYear)){
      $tahun = $getYear;
    }
    else{
      $tahun = date('Y');
    }
    $kd_urusan = $this -> input -> get('kd_urusan');
    $kd_bidang = $this -> input -> get('kd_bidang');
    $kd_unit = $this -> input -> get('kd_unit');
    $kd_sub = $this -> input -> get('kd_sub');
    $kd_prog = $this -> input -> get('kd_prog');
    $kd_keg = $this -> input -> get('kd_keg');
  ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h4><a href="<?=site_url('backend/?tahun='.$tahun)?>">Kegiatan</a> / <a href="<?=site_url('backend/rincianbykegiatan/?tahun='.$tahun.'&kd_urusan='.$kd_urusan.'&kd_bidang='.$kd_bidang.'&kd_unit='.$kd_unit.'&kd_sub='.$kd_sub.'&kd_prog='.$kd_prog.'&kd_keg='.$kd_keg)?>">Rincian</a> / Detail  </h4> 
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
              <a style="margin-left: 20px;" href="<?=site_url('backend/editdatakegiatan/?tahun='.$data_kegiatan->tahun.'&kd_urusan='.$data_kegiatan->kd_urusan.'&kd_bidang='.$data_kegiatan->kd_bidang.'&kd_unit='.$data_kegiatan->kd_unit.'&kd_sub='.$data_kegiatan->kd_sub.'&kd_prog='.$data_kegiatan->kd_prog.'&kd_keg='.$data_kegiatan->kd_keg.'&kd_rek_1='.$data_kegiatan->kd_rek_1.'&kd_rek_2='.$data_kegiatan->kd_rek_2.'&kd_rek_3='.$data_kegiatan->kd_rek_3.'&kd_rek_4='.$data_kegiatan->kd_rek_4.'&kd_rek_5='.$data_kegiatan->kd_rek_5.'&no_rinc='.$data_kegiatan->no_rinc.'&no_id='.$data_kegiatan->no_id)?>" class="btn btn-default btn"><i style="margin-right: 5px;" class="fa fa-edit text-green"></i> Edit</a>
              <hr/>
              <div class="row">
                <div class="col-xs-4">
                  <strong>Keterangan Rincian</strong>
                  <p><?=$data_kegiatan->keterangan_rinc?></p>
                  <hr/>
                  <strong>Anggaran Induk | Anggaran Perubahan</strong>
                  <p><?="Rp. " . number_format($data_kegiatan->total_induk, 0 , ',', '.') . " | Rp. " . number_format($data_kegiatan->total_perubahan, 0 , ',', '.');?></p>
                  <hr/>
                  <strong>Tahun</strong>
                  <p><?=$data_kegiatan->tahun?></p>
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
                  <?php endif; ?>
                </div>                
                <div class="col-xs-2">                  
                  <?php if((is_object($data_kontrak) || is_array($data_kontrak)) && $data_kontrak->metode_pengadaan!=1) :?>
                  <strong>Pelaksana</strong>
                  <p><?=$data_kontrak->pelaksana?></p>
                  <hr/>
                  <strong>Nilai Kontrak</strong>
                  <p><?=number_format($data_kontrak->nilai_kontrak, 0, ',', '.')?></p>
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
                  <?php endif; ?>
                </div>
                <div class="col-xs-2">                  
                  <?php if((is_object($data_kontrak) || is_array($data_kontrak)) && $data_kontrak->metode_pengadaan!=1) :?>
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
                      else :
                        echo number_format(($row->total - $row->total_i),0);
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
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>

      <div class="row">
        <div class="col-xs-12">
          <div class="box box-danger">            
            <div class="box-body">
              <h4>
                Realisasi Keuangan
              </h4>
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
                    <tr>
                      <td>Target</td>
                      <td><?=$target_keuangan->tahun?></td>
                      <td><?php echo "Rp." . number_format($target_keuangan->total_jan, 0, ',', '.');?></td>
                      <td><?php echo "Rp." . number_format($target_keuangan->total_feb, 0, ',', '.');?></td>
                      <td><?php echo "Rp." . number_format($target_keuangan->total_mar, 0, ',', '.');?></td>
                      <td><?php echo "Rp." . number_format($target_keuangan->total_apr, 0, ',', '.');?></td>
                      <td><?php echo "Rp." . number_format($target_keuangan->total_mei, 0, ',', '.');?></td>
                      <td><?php echo "Rp." . number_format($target_keuangan->total_jun, 0, ',', '.');?></td>
                      <td><?php echo "Rp." . number_format($target_keuangan->total_jul, 0, ',', '.');?></td>
                      <td><?php echo "Rp." . number_format($target_keuangan->total_agt, 0, ',', '.');?></td>
                      <td><?php echo "Rp." . number_format($target_keuangan->total_sep, 0, ',', '.');?></td>
                      <td><?php echo "Rp." . number_format($target_keuangan->total_okt, 0, ',', '.');?></td>
                      <td><?php echo "Rp." . number_format($target_keuangan->total_nop, 0, ',', '.');?></td>
                      <td><?php echo "Rp." . number_format($target_keuangan->total_des, 0, ',', '.');?></td>
                      <td><?php echo "Rp." . number_format($target_keuangan->total_keuangan, 0, ',', '.');?></td>
                      <!-- <td><?php echo "Rp." . number_format($target_keuangan->total_, 0, ',', '.');?></td> -->
                    </tr>
                    <tr>
                      <td>Realisasi</td>
                      <td><?=$realisasi_keuangan->tahun?></td>
                      <td><?php echo "Rp." . number_format($realisasi_keuangan->total_jan, 0, ',', '.');?></td>
                      <td><?php echo "Rp." . number_format($realisasi_keuangan->total_feb, 0, ',', '.');?></td>
                      <td><?php echo "Rp." . number_format($realisasi_keuangan->total_mar, 0, ',', '.');?></td>
                      <td><?php echo "Rp." . number_format($realisasi_keuangan->total_apr, 0, ',', '.');?></td>
                      <td><?php echo "Rp." . number_format($realisasi_keuangan->total_mei, 0, ',', '.');?></td>
                      <td><?php echo "Rp." . number_format($realisasi_keuangan->total_jun, 0, ',', '.');?></td>
                      <td><?php echo "Rp." . number_format($realisasi_keuangan->total_jul, 0, ',', '.');?></td>
                      <td><?php echo "Rp." . number_format($realisasi_keuangan->total_agt, 0, ',', '.');?></td>
                      <td><?php echo "Rp." . number_format($realisasi_keuangan->total_sep, 0, ',', '.');?></td>
                      <td><?php echo "Rp." . number_format($realisasi_keuangan->total_okt, 0, ',', '.');?></td>
                      <td><?php echo "Rp." . number_format($realisasi_keuangan->total_nop, 0, ',', '.');?></td>
                      <td><?php echo "Rp." . number_format($realisasi_keuangan->total_des, 0, ',', '.');?></td>
                      <td><?php echo "-";?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <hr/>
              <br/>
              <h4 style="display: inline;">Realisasi Fisik</h4>
              <a style="margin-left: 20px;" href="<?=site_url('backend/edittargetkegiatan/?kd_urusan='.$data_kegiatan->kd_urusan.'&kd_bidang='.$data_kegiatan->kd_bidang.'&kd_unit='.$data_kegiatan->kd_unit.'&kd_sub='.$data_kegiatan->kd_sub.'&kd_prog='.$data_kegiatan->kd_prog.'&kd_keg='.$data_kegiatan->kd_keg.'&kd_rek_1='.$data_kegiatan->kd_rek_1.'&kd_rek_2='.$data_kegiatan->kd_rek_2.'&kd_rek_3='.$data_kegiatan->kd_rek_3.'&kd_rek_4='.$data_kegiatan->kd_rek_4.'&kd_rek_5='.$data_kegiatan->kd_rek_5.'&no_rinc='.$data_kegiatan->no_rinc.'&no_id='.$data_kegiatan->no_id)?>" class="btn btn-default btn"><i style="margin-right: 5px;" class="fa fa-edit text-green"></i> Edit</a>
              <a style="margin-left: 10px;" href="<?=site_url('backend/laporanfisik/?kd_urusan='.$data_kegiatan->kd_urusan.'&kd_bidang='.$data_kegiatan->kd_bidang.'&kd_unit='.$data_kegiatan->kd_unit.'&kd_sub='.$data_kegiatan->kd_sub.'&kd_prog='.$data_kegiatan->kd_prog.'&kd_keg='.$data_kegiatan->kd_keg.'&kd_rek_1='.$data_kegiatan->kd_rek_1.'&kd_rek_2='.$data_kegiatan->kd_rek_2.'&kd_rek_3='.$data_kegiatan->kd_rek_3.'&kd_rek_4='.$data_kegiatan->kd_rek_4.'&kd_rek_5='.$data_kegiatan->kd_rek_5.'&no_rinc='.$data_kegiatan->no_rinc.'&no_id='.$data_kegiatan->no_id)?>" class="btn btn-primary btn"><i style="margin-right: 5px;" class="fa fa-file-text-o"></i> Lapor Realisasi</a>
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
                        <td><?php echo number_format($target_fisik->b_1, 5, ',', '.') . "%";?></td>
                        <td><?php echo number_format($target_fisik->b_2, 5, ',', '.') . "%";?></td>
                        <td><?php echo number_format($target_fisik->b_3, 5, ',', '.') . "%";?></td>
                        <td><?php echo number_format($target_fisik->b_4, 5, ',', '.') . "%";?></td>
                        <td><?php echo number_format($target_fisik->b_5, 5, ',', '.') . "%";?></td>
                        <td><?php echo number_format($target_fisik->b_6, 5, ',', '.') . "%";?></td>
                        <td><?php echo number_format($target_fisik->b_7, 5, ',', '.') . "%";?></td>
                        <td><?php echo number_format($target_fisik->b_8, 5, ',', '.') . "%";?></td>
                        <td><?php echo number_format($target_fisik->b_9, 5, ',', '.') . "%";?></td>
                        <td><?php echo number_format($target_fisik->b_10, 5, ',', '.') . "%";?></td>
                        <td><?php echo number_format($target_fisik->b_11, 5, ',', '.') . "%";?></td>
                        <td><?php echo number_format($target_fisik->b_12, 5, ',', '.') . "%";?></td>
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
                        <td><?php echo number_format($realisasi_fisik->b_1, 5, ',', '.') . "%";?></td>
                        <td><?php echo number_format($realisasi_fisik->b_2, 5, ',', '.') . "%";?></td>
                        <td><?php echo number_format($realisasi_fisik->b_3, 5, ',', '.') . "%";?></td>
                        <td><?php echo number_format($realisasi_fisik->b_4, 5, ',', '.') . "%";?></td>
                        <td><?php echo number_format($realisasi_fisik->b_5, 5, ',', '.') . "%";?></td>
                        <td><?php echo number_format($realisasi_fisik->b_6, 5, ',', '.') . "%";?></td>
                        <td><?php echo number_format($realisasi_fisik->b_7, 5, ',', '.') . "%";?></td>
                        <td><?php echo number_format($realisasi_fisik->b_8, 5, ',', '.') . "%";?></td>
                        <td><?php echo number_format($realisasi_fisik->b_9, 5, ',', '.') . "%";?></td>
                        <td><?php echo number_format($realisasi_fisik->b_10, 5, ',', '.') . "%";?></td>
                        <td><?php echo number_format($realisasi_fisik->b_11, 5, ',', '.') . "%";?></td>
                        <td><?php echo number_format($realisasi_fisik->b_12, 5, ',', '.') . "%";?></td>
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
          </div>
        </div>
      </div>

      <?php if((is_object($data_kontrak) || is_array($data_kontrak)) && $data_kontrak->metode_pengadaan!=1) :?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-danger">            
            <div class="box-body">
              <!-- <h4 style="display: inline;">Anggaran Kas Untuk Proyek</h4>
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
              </div> -->
              <!-- <hr/>
              <br/>
              <h4 style="display: inline;">Realisasi Fisik Untuk Proyek</h4>
              <a style="margin-left: 20px;" href="<?=site_url('backend/edittargetkontrak/?kd_urusan='.$data_kegiatan->kd_urusan.'&kd_bidang='.$data_kegiatan->kd_bidang.'&kd_unit='.$data_kegiatan->kd_unit.'&kd_sub='.$data_kegiatan->kd_sub.'&kd_prog='.$data_kegiatan->kd_prog.'&kd_keg='.$data_kegiatan->kd_keg.'&kd_rek_1='.$data_kegiatan->kd_rek_1.'&kd_rek_2='.$data_kegiatan->kd_rek_2.'&kd_rek_3='.$data_kegiatan->kd_rek_3.'&kd_rek_4='.$data_kegiatan->kd_rek_4.'&kd_rek_5='.$data_kegiatan->kd_rek_5.'&no_rinc='.$data_kegiatan->no_rinc.'&no_id='.$data_kegiatan->no_id)?>" class="btn btn-default btn"><i class="fa fa-edit text-green"></i></a>
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
              </div> -->
            </div>
          </div>
        </div>
      </div>
      <?php endif;?>

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