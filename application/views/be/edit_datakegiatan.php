
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
      <div class="col-md-12">
          <!-- About Me Box -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-edit margin-r-5"></i>Edit Data Kegiatan</h3>
            </div>
            <!-- /.box-header -->            
            <?php echo form_open('backend/editdatakegiatan/?kd_urusan='.$data_kegiatan->Kd_Urusan.'&kd_bidang='.$data_kegiatan->Kd_Bidang.'&kd_unit='.$data_kegiatan->Kd_Unit.'&kd_sub='.$data_kegiatan->Kd_Sub.'&kd_prog='.$data_kegiatan->Kd_Prog.'&kd_keg='.$data_kegiatan->Kd_Keg.'&kd_rek_1='.$data_kegiatan->Kd_Rek_1.'&kd_rek_2='.$data_kegiatan->Kd_Rek_2.'&kd_rek_3='.$data_kegiatan->Kd_Rek_3.'&kd_rek_4='.$data_kegiatan->Kd_Rek_4.'&kd_rek_5='.$data_kegiatan->Kd_Rek_5, array('method' => 'POST', 'role' => 'form'));?>
            <?php echo validation_errors();?>
            <div class="box-body">
              <div class="row">                               
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>OPD</label>
                        <input readonly name="opd" type="text" class="form-control" value="<?=$opd->Nm_Sub_Unit?>" placeholder="Nama">
                      </div>
                    </div>              
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Nama Kegiatan</label>
                        <input readonly name="nama_kegiatan" type="text" class="form-control" value="<?=$nama_kegiatan->nama?>" placeholder="Nama">
                      </div>
                    </div>                
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Kode Rekening</label>
                        <input readonly name="periode" type="text" class="form-control" value='<?php echo $data_kegiatan->Kd_Urusan . " . 0" . $data_kegiatan->Kd_Bidang . " . 0" . $data_kegiatan->Kd_Unit . " . 0" . $data_kegiatan->Kd_Sub . " . 0" . $data_kegiatan->Kd_Prog . " . 0" . $data_kegiatan->Kd_Keg . " . 0" . $data_kegiatan->Kd_Rek_1 . " . 0" . $data_kegiatan->Kd_Rek_2 . " . 0" . $data_kegiatan->Kd_Rek_3 . " . 0" . $data_kegiatan->Kd_Rek_4 . " . 0" . $data_kegiatan->Kd_Rek_5?>' placeholder="Kode Rekening">
                      </div>
                    </div>              
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Rincian</label>
<<<<<<< HEAD
                        <input readonly name="nama_kegiatan" type="text" class="form-control" value="<?php
                            foreach ($uraian as $rowD) :
                              if($data_kegiatan->Kd_Rek_1 == $rowD->Kd_Rek_1 && $data_kegiatan->Kd_Rek_2 == $rowD->Kd_Rek_2 && $data_kegiatan->Kd_Rek_3 == $rowD->Kd_Rek_3 && $data_kegiatan->Kd_Rek_4 == $rowD->Kd_Rek_4 && $data_kegiatan->Kd_Rek_5 == $rowD->Kd_Rek_5) :
                                echo $rowD->Nm_Rek_5;
                              endif;
                            endforeach;
                          ?> 
                        " placeholder="Rincian">
=======
                        <input readonly name="nama_kegiatan" type="text" class="form-control" value="<?=$rincian->Keterangan_Rinc?>" placeholder="Rincian">
>>>>>>> master
                      </div>
                    </div>                
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Tahun</label>
                        <input readonly name="opd" type="text" class="form-control" value="<?=$data_kegiatan->Tahun?>" placeholder="Nama">
                      </div>
                    </div>              
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Anggaran Induk</label>
                        <input readonly name="opd" type="text" class="form-control" value="<?php echo "Rp. " . number_format($rincian->Total, 0, ",", "."); ?>" placeholder="Nama">
                      </div>
                    </div>                
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Anggaran Perubahan</label>
<<<<<<< HEAD
                        <input readonly name="opd" type="text" class="form-control" value="<?php
=======
                        <input readonly name="opd" type="text" class="form-control" value="
                        <?php
>>>>>>> master
                            if(!isset($rincian->total_i)){
                              echo "-";
                            }
                            else{ 
                              echo "Rp. " . number_format($rincian->total_i, 0, ",", ".");
                            } 
                        ?>
                        " placeholder="Nama">
                      </div>
                    </div>      
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Kelebihan/Kekurangan</label>
                        <input readonly name="opd" type="text" class="form-control" value="<?php 
                          if(!isset($rincian->total_i)){
                            echo "-";
                          }
                          else{ 
                            echo "Rp. " . number_format($rincian->Total-$rincian->total_i, 0, ",", "."); 
                            // echo "-";
                          }
                        ?>" placeholder="Nama">
                      </div>
                    </div>
                  </div>
                  <h5>Mohon Lengkapi Data Berikut :</h5>
                  <hr/>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Metode Pengadaan</label>
                        <select id="metode_pengadaan" name="metode_pengadaan" class="form-control">
                          <option value="1">Swakelola</option>
                          <option value="2">Penyedia</option>
                        </select>
                      </div>
                    </div>
                    <!--<div class="col-md-3">-->
                    <!--  <div class="form-group" id="jenis_pengadaan">-->
                    <!--    <label>Jenis Pengadaan</label>-->
                    <!--    <select name="jenis_pengadaan" class="form-control">-->
                    <!--      <option value="1">Barang</option>                      -->
                    <!--      <option value="2">Konstruksi</option>                      -->
                    <!--      <option value="3">Jasa</option>                      -->
                    <!--      <option value="4">Jasa Lainnya</option>-->
                    <!--    </select>-->
                    <!--  </div>-->
                    <!--</div>-->
                  </div>
                  <!--<div id="data_kontrak">-->
                  <!--  <div class="row">-->
                  <!--    <div class="col-md-6">-->
                  <!--      <div class="form-group">-->
                  <!--        <label>Pelaksana</label>-->
                  <!--        <input name="pelaksana" type="text" class="form-control" value="" placeholder="Pelaksana">-->
                  <!--      </div>-->
                  <!--    </div>              -->
                  <!--    <div class="col-md-3">-->
                  <!--      <div class="form-group">-->
                  <!--        <label>NPWP Pelaksana</label>-->
                  <!--        <input name="npwp" type="text" class="form-control" value="" placeholder="NPWP">-->
                  <!--      </div>-->
                  <!--    </div>            -->
                  <!--  </div>-->
                  <!--  <div class="row">-->
                  <!--    <div class="col-md-3">-->
                  <!--      <div class="form-group">-->
                  <!--        <label>No Kontrak</label>-->
                  <!--        <input name="no_kontrak" type="text" class="form-control" value="" placeholder="No Kontrak">-->
                  <!--      </div>-->
                  <!--    </div>      -->
                  <!--    <div class="col-md-3">-->
                  <!--      <div class="form-group">-->
                  <!--        <label>Nilai Kontrak (Rp.)</label>-->
                  <!--        <input name="nilai_kontrak" type="text" class="form-control" value="" placeholder="Nilai Kontrak">-->
                  <!--      </div>-->
                  <!--    </div>-->
                  <!--  </div>-->
                  <!--  <div class="row">-->
                  <!--    <div class="col-md-3">                    -->
                  <!--      <div class="form-group">-->
                  <!--        <label>Mulai Pekerjaan</label>-->
                  <!--        <div class="input-group date">-->
                  <!--          <div class="input-group-addon">-->
                  <!--            <i class="fa fa-calendar"></i>-->
                  <!--          </div>-->
                  <!--          <input name="tanggal_mulai" type="text" class="form-control pull-right" id="datepicker-mulai">-->
                  <!--        </div>-->
                  <!--      </div>-->
                  <!--    </div>-->
                  <!--    <div class="col-md-3">-->
                  <!--      <div class="form-group">-->
                  <!--        <label>Selesai Pekerjaan</label>-->
                  <!--        <div class="input-group date">-->
                  <!--          <div class="input-group-addon">-->
                  <!--            <i class="fa fa-calendar"></i>-->
                  <!--          </div>-->
                  <!--          <input name="tanggal_selesai" type="text" class="form-control pull-right" id="datepicker-selesai">-->
                  <!--        </div>-->
                  <!--      </div>-->
                  <!--    </div>-->
                  <!--    <div class="col-md-3">-->
                  <!--      <div class="form-group">-->
                  <!--        <label>Lama Pekerjaan (Hari)</label>-->
                  <!--        <input name="durasi" type="text" class="form-control" value="" placeholder="Lama Pekerjaan">-->
                  <!--      </div>-->
                  <!--    </div>-->
                  <!--  </div>-->
                  <!--</div>-->
                </div>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <a href="<?=site_url('backend/detailrincianbykegiatan/?tahun='.$data_kegiatan->Tahun.'&kd_urusan='.$data_kegiatan->Kd_Urusan.'&kd_bidang='.$data_kegiatan->Kd_Bidang.'&kd_unit='.$data_kegiatan->Kd_Unit.'&kd_sub='.$data_kegiatan->Kd_Sub.'&kd_prog='.$data_kegiatan->Kd_Prog.'&kd_keg='.$data_kegiatan->Kd_Keg.'&kd_rek_1='.$data_kegiatan->Kd_Rek_1.'&kd_rek_2='.$data_kegiatan->Kd_Rek_2.'&kd_rek_3='.$data_kegiatan->Kd_Rek_3.'&kd_rek_4='.$data_kegiatan->Kd_Rek_4.'&kd_rek_5='.$data_kegiatan->Kd_Rek_5)?>" class="btn btn-default"><i class="fa fa-close"></i> Cancel</a>
              <button type="submit" class="btn btn-default pull-right"><i class="fa fa-check text-green"></i> Submit</button>
            </div>
            </form>
          </div>
          <!-- /.box -->
      </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- <script>

    $(document).ready(function() {
      $('#user').addClass("active");
    });

  </script> -->

  <!-- bootstrap datepicker -->
  <script src="<?=base_url('assets/be/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')?>"></script>
  <script>

  $(document).ready(function() {
    $('#dashboard').addClass('active');
    //Date picker
    $('#datepicker-mulai').datepicker({
      autoclose: true
    });
    //Date picker
    $('#datepicker-selesai').datepicker({
      autoclose: true
    });

    // if($('#metode_pengadaan').val() == 1){
    //   $('#jenis_pengadaan').addClass('hidden');
    //   $('#data_kontrak').addClass('hidden');
    // }
    // else if($('#metode_pengadaan').val() == 2){
    //   $('#jenis_pengadaan').removeClass('hidden');
    //   $('#data_kontrak').removeClass('hidden');
    // }
  });

//   function show_form() {
//     if($('#metode_pengadaan').val() == 1){
//       $('#jenis_pengadaan').addClass('hidden');
//       $('#data_kontrak').addClass('hidden');
//     }
//     else if($('#metode_pengadaan').val() == 2){
//       $('#jenis_pengadaan').removeClass('hidden');
//       $('#data_kontrak').removeClass('hidden');
//     }
//   }

  </script>