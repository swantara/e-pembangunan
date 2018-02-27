
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
                <h3 class="box-title"><i class="fa fa-edit margin-r-5"></i>Target Kegiatan</h3>
              </div>
              <!-- /.box-header -->            
              <?php echo form_open('backend/edittargetkegiatan/?kd_urusan='.$data_kegiatan->Kd_Urusan.'&kd_bidang='.$data_kegiatan->Kd_Bidang.'&kd_unit='.$data_kegiatan->Kd_Unit.'&kd_sub='.$data_kegiatan->Kd_Sub.'&kd_prog='.$data_kegiatan->Kd_Prog.'&kd_keg='.$data_kegiatan->Kd_Keg.'&kd_rek_1='.$data_kegiatan->Kd_Rek_1.'&kd_rek_2='.$data_kegiatan->Kd_Rek_2.'&kd_rek_3='.$data_kegiatan->Kd_Rek_3.'&kd_rek_4='.$data_kegiatan->Kd_Rek_4.'&kd_rek_5='.$data_kegiatan->Kd_Rek_5, array('method' => 'POST', 'role' => 'form'));?>
              <?php echo validation_errors();?>
              <div class="box-body">
                <div class="row">
                  <div class="col-xs-4">
                    <strong>OPD</strong>
                    <p><?=$nama_opd->Nm_Sub_Unit?></p>
                    <hr/>
                    <strong>Nama Kegiatan</strong>
                    <p><?=$nama_kegiatan->nama;?></p>
                    <hr/>
                    <strong>Rincian</strong>
<<<<<<< HEAD
                    <p>
                      <?php
                        foreach ($uraian as $rowD) :
                          if($data_kegiatan->Kd_Rek_1 == $rowD->Kd_Rek_1 && $data_kegiatan->Kd_Rek_2 == $rowD->Kd_Rek_2 && $data_kegiatan->Kd_Rek_3 == $rowD->Kd_Rek_3 && $data_kegiatan->Kd_Rek_4 == $rowD->Kd_Rek_4 && $data_kegiatan->Kd_Rek_5 == $rowD->Kd_Rek_5) :
                            echo $rowD->Nm_Rek_5;
                          endif;
                        endforeach;
                      ?>     
                    </p>
=======
                    <p><?=$data_kegiatan->Keterangan_Rinc;?></p>
>>>>>>> master
                    <hr/>
                  </div>
                  <div class="col-xs-4">
                    <strong>Tahun</strong>
                    <p><?=$data_kegiatan->Tahun?></p>
                    <hr/>
                    <strong>Kode Rekening</strong>
                    <p><?php echo $data_kegiatan->Kd_Urusan . " . 0" . $data_kegiatan->Kd_Bidang . " . 0" . $data_kegiatan->Kd_Unit . " . 0" . $data_kegiatan->Kd_Sub . " . 0" . $data_kegiatan->Kd_Prog . " . 0" . $data_kegiatan->Kd_Keg . " . 0" . $data_kegiatan->Kd_Rek_1 . " . 0" . $data_kegiatan->Kd_Rek_2 . " . 0" . $data_kegiatan->Kd_Rek_3 . " . 0" . $data_kegiatan->Kd_Rek_4 . " . 0" . $data_kegiatan->Kd_Rek_5;?></p>
                    <hr/>
                  </div>
                  <div class="col-xs-4">
                    <strong>Anggaran Induk</strong>
                    <p><?php echo "Rp. " . number_format($data_kegiatan->total_induk, 0, ",", "."); ?></p>
                    <hr/>
                    <strong>Anggaran Perubahan</strong>
                    <p><?php echo "Rp. " . number_format($data_kegiatan->total_perubahan, 0, ",", "."); ?></p>
                    <hr/>
                  </div>
                </div>
                <h4>Target Fisik</h4>
                <?php if((is_object($target_fisik) || is_array($target_fisik)) && !is_null($target_fisik->b_1)) :?>
                <div class="row">
                  <div class="col-md-6">
                      <h5>Triwulan 1</h5>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Bulan 1 (%)</label>
                          <input required name="fisik1" type="text" class="form-control" value="<?=$target_fisik->b_1?>" placeholder="0.000000">
                        </div>
                      </div>   
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Bulan 2 (%)</label>
                          <input required name="fisik2" type="text" class="form-control" value="<?=$target_fisik->b_2?>" placeholder="0.000000">
                        </div>
                      </div>  
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Bulan 3 (%)</label>
                          <input required name="fisik3" type="text" class="form-control" value="<?=$target_fisik->b_3?>" placeholder="0.000000">
                        </div>
                      </div> 
                  </div>
                  <div class="col-md-6">
                      <h5>Triwulan 2</h5>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Bulan 4 (%)</label>
                          <input required name="fisik4" type="text" class="form-control" value="<?=$target_fisik->b_4?>" placeholder="0.000000">
                        </div>
                      </div>  
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Bulan 5 (%)</label>
                          <input required name="fisik5" type="text" class="form-control" value="<?=$target_fisik->b_5?>" placeholder="0.000000">
                        </div>
                      </div>  
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Bulan 6 (%)</label>
                          <input required name="fisik6" type="text" class="form-control" value="<?=$target_fisik->b_6?>" placeholder="0.000000">
                        </div>
                      </div>  
                  </div>
                  <div class="col-md-6">
                      <h5>Triwulan 3</h5>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Bulan 7 (%)</label>
                          <input required name="fisik7" type="text" class="form-control" value="<?=$target_fisik->b_7?>" placeholder="0.000000">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Bulan 8 (%)</label>
                          <input required name="fisik8" type="text" class="form-control" value="<?=$target_fisik->b_8?>" placeholder="0.000000">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Bulan 9 (%)</label>
                          <input required name="fisik9" type="text" class="form-control" value="<?=$target_fisik->b_9?>" placeholder="0.000000">
                        </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <h5>Triwulan 4</h5>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Bulan 10 (%)</label>
                          <input required name="fisik10" type="text" class="form-control" value="<?=$target_fisik->b_10?>" placeholder="0.000000">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Bulan 11 (%)</label>
                          <input required name="fisik11" type="text" class="form-control" value="<?=$target_fisik->b_11?>" placeholder="0.000000">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Bulan 12 (%)</label>
                          <input required name="fisik12" type="text" class="form-control" value="<?=$target_fisik->b_12?>" placeholder="0.000000">
                        </div>
                      </div>  
                  </div>
                </div>
                <?php else : ?>
                <div class="row">
                  <div class="col-md-6">
                      <h5>Triwulan 1</h5>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Bulan 1 (%)</label>
                          <input required name="fisik1" type="text" class="form-control" value="" placeholder="0.000000">
                        </div>
                      </div>   
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Bulan 2 (%)</label>
                          <input required name="fisik2" type="text" class="form-control" value="" placeholder="0.000000">
                        </div>
                      </div>  
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Bulan 3 (%)</label>
                          <input required name="fisik3" type="text" class="form-control" value="" placeholder="0.000000">
                        </div>
                      </div>  
                  </div>
                  <div class="col-md-6">
                      <h5>Triwulan 2</h5>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Bulan 4 (%)</label>
                          <input required name="fisik4" type="text" class="form-control" value="" placeholder="0.000000">
                        </div>
                      </div>  
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Bulan 5 (%)</label>
                          <input required name="fisik5" type="text" class="form-control" value="" placeholder="0.000000">
                        </div>
                      </div>  
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Bulan 6 (%)</label>
                          <input required name="fisik6" type="text" class="form-control" value="" placeholder="0.000000">
                        </div>
                      </div>  
                  </div>
                  <div class="col-md-6">
                      <h5>Triwulan 3</h5>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Bulan 7 (%)</label>
                          <input required name="fisik7" type="text" class="form-control" value="" placeholder="0.000000">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Bulan 8 (%)</label>
                          <input required name="fisik8" type="text" class="form-control" value="" placeholder="0.000000">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Bulan 9 (%)</label>
                          <input required name="fisik9" type="text" class="form-control" value="" placeholder="0.000000">
                        </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <h5>Triwulan 4</h5>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Bulan 10 (%)</label>
                          <input required name="fisik10" type="text" class="form-control" value="" placeholder="0.000000">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Bulan 11 (%)</label>
                          <input required name="fisik11" type="text" class="form-control" value="" placeholder="0.000000">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Bulan 12 (%)</label>
                          <input required name="fisik12" type="text" class="form-control" value="" placeholder="0.000000">
                        </div>
                      </div>    
                  </div>
                </div>
                <?php endif;?>
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

    if($('#metode_pengadaan').val() == 1){
      $('#jenis_pengadaan').addClass('hidden');
      $('#data_kontrak').addClass('hidden');
    }
    else if($('#metode_pengadaan').val() == 2){
      $('#jenis_pengadaan').removeClass('hidden');
      $('#data_kontrak').removeClass('hidden');
    }
  });

  function show_form() {
    if($('#metode_pengadaan').val() == 1){
      $('#jenis_pengadaan').addClass('hidden');
      $('#data_kontrak').addClass('hidden');
    }
    else if($('#metode_pengadaan').val() == 2){
      $('#jenis_pengadaan').removeClass('hidden');
      $('#data_kontrak').removeClass('hidden');
    }
  }

  </script>