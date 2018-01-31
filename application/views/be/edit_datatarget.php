
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
              <?php echo form_open('backend/edittargetkegiatan/?kd_urusan='.$data_kegiatan->kd_urusan.'&kd_bidang='.$data_kegiatan->kd_bidang.'&kd_unit='.$data_kegiatan->kd_unit.'&kd_sub='.$data_kegiatan->kd_sub.'&kd_prog='.$data_kegiatan->kd_prog.'&kd_keg='.$data_kegiatan->kd_keg.'&kd_rek_1='.$data_kegiatan->kd_rek_1.'&kd_rek_2='.$data_kegiatan->kd_rek_2.'&kd_rek_3='.$data_kegiatan->kd_rek_3.'&kd_rek_4='.$data_kegiatan->kd_rek_4.'&kd_rek_5='.$data_kegiatan->kd_rek_5.'&no_rinc='.$data_kegiatan->no_rinc.'&no_id='.$data_kegiatan->no_id, array('method' => 'POST', 'role' => 'form'));?>
              <?php echo validation_errors();?>
              <div class="box-body">
                <div class="row">
                  <div class="col-xs-4">
                    <strong>OPD</strong>
                    <p><?=$nama_opd->nama?></p>
                    <hr/>
                    <strong>Nama Kegiatan</strong>
                    <p><?=$nama_kegiatan->nama;?></p>
                    <hr/>
                    <strong>Rincian</strong>
                    <p><?=$data_kegiatan->keterangan;?></p>
                    <hr/>
                  </div>
                  <div class="col-xs-4">
                    <strong>Tahun</strong>
                    <p><?=$data_kegiatan->tahun?></p>
                    <hr/>
                    <strong>Kode Rekening</strong>
                    <p><?php echo $data_kegiatan->kd_urusan . " . 0" . $data_kegiatan->kd_bidang . " . 0" . $data_kegiatan->kd_unit . " . 0" . $data_kegiatan->kd_sub . " . 0" . $data_kegiatan->kd_prog . " . 0" . $data_kegiatan->kd_keg . " . 0" . $data_kegiatan->kd_rek_1 . " . 0" . $data_kegiatan->kd_rek_2 . " . 0" . $data_kegiatan->kd_rek_3 . " . 0" . $data_kegiatan->kd_rek_4 . " . 0" . $data_kegiatan->kd_rek_5 . " . 0" . $data_kegiatan->no_rinc . " . 0" . $data_kegiatan->no_id;?></p>
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
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Bulan 1 (%)</label>
                      <input required name="fisik1" type="text" class="form-control" value="<?=$target_fisik->b_1?>" placeholder="Bulan 1">
                    </div>
                  </div>   
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Bulan 2 (%)</label>
                      <input required name="fisik2" type="text" class="form-control" value="<?=$target_fisik->b_2?>" placeholder="Bulan 2">
                    </div>
                  </div>  
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Bulan 3 (%)</label>
                      <input required name="fisik3" type="text" class="form-control" value="<?=$target_fisik->b_3?>" placeholder="Bulan 3">
                    </div>
                  </div>  
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Bulan 4 (%)</label>
                      <input required name="fisik4" type="text" class="form-control" value="<?=$target_fisik->b_4?>" placeholder="Bulan 4">
                    </div>
                  </div>  
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Bulan 5 (%)</label>
                      <input required name="fisik5" type="text" class="form-control" value="<?=$target_fisik->b_5?>" placeholder="Bulan 5">
                    </div>
                  </div>  
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Bulan 6 (%)</label>
                      <input required name="fisik6" type="text" class="form-control" value="<?=$target_fisik->b_6?>" placeholder="Bulan 6">
                    </div>
                  </div>  
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Bulan 7 (%)</label>
                      <input required name="fisik7" type="text" class="form-control" value="<?=$target_fisik->b_7?>" placeholder="Bulan 7">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Bulan 8 (%)</label>
                      <input required name="fisik8" type="text" class="form-control" value="<?=$target_fisik->b_8?>" placeholder="Bulan 8">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Bulan 9 (%)</label>
                      <input required name="fisik9" type="text" class="form-control" value="<?=$target_fisik->b_9?>" placeholder="Bulan 9">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Bulan 10 (%)</label>
                      <input required name="fisik10" type="text" class="form-control" value="<?=$target_fisik->b_10?>" placeholder="Bulan 10">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Bulan 11 (%)</label>
                      <input required name="fisik11" type="text" class="form-control" value="<?=$target_fisik->b_11?>" placeholder="Bulan 11">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Bulan 12 (%)</label>
                      <input required name="fisik12" type="text" class="form-control" value="<?=$target_fisik->b_12?>" placeholder="Bulan 12">
                    </div>
                  </div>          
                </div>
                <?php else : ?>
                <div class="row">
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Bulan 1 (%)</label>
                      <input required name="fisik1" type="text" class="form-control" value="" placeholder="Bulan 1">
                    </div>
                  </div>   
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Bulan 2 (%)</label>
                      <input required name="fisik2" type="text" class="form-control" value="" placeholder="Bulan 2">
                    </div>
                  </div>  
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Bulan 3 (%)</label>
                      <input required name="fisik3" type="text" class="form-control" value="" placeholder="Bulan 3">
                    </div>
                  </div>  
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Bulan 4 (%)</label>
                      <input required name="fisik4" type="text" class="form-control" value="" placeholder="Bulan 4">
                    </div>
                  </div>  
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Bulan 5 (%)</label>
                      <input required name="fisik5" type="text" class="form-control" value="" placeholder="Bulan 5">
                    </div>
                  </div>  
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Bulan 6 (%)</label>
                      <input required name="fisik6" type="text" class="form-control" value="" placeholder="Bulan 6">
                    </div>
                  </div>  
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Bulan 7 (%)</label>
                      <input required name="fisik7" type="text" class="form-control" value="" placeholder="Bulan 7">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Bulan 8 (%)</label>
                      <input required name="fisik8" type="text" class="form-control" value="" placeholder="Bulan 8">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Bulan 9 (%)</label>
                      <input required name="fisik9" type="text" class="form-control" value="" placeholder="Bulan 9">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Bulan 10 (%)</label>
                      <input required name="fisik10" type="text" class="form-control" value="" placeholder="Bulan 10">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Bulan 11 (%)</label>
                      <input required name="fisik11" type="text" class="form-control" value="" placeholder="Bulan 11">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Bulan 12 (%)</label>
                      <input required name="fisik12" type="text" class="form-control" value="" placeholder="Bulan 12">
                    </div>
                  </div>          
                </div>
                <?php endif;?>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?=site_url('backend/detailrincianbykegiatan/?tahun='.$data_kegiatan->tahun.'&kd_urusan='.$data_kegiatan->kd_urusan.'&kd_bidang='.$data_kegiatan->kd_bidang.'&kd_unit='.$data_kegiatan->kd_unit.'&kd_sub='.$data_kegiatan->kd_sub.'&kd_prog='.$data_kegiatan->kd_prog.'&kd_keg='.$data_kegiatan->kd_keg.'&kd_rek_1='.$data_kegiatan->kd_rek_1.'&kd_rek_2='.$data_kegiatan->kd_rek_2.'&kd_rek_3='.$data_kegiatan->kd_rek_3.'&kd_rek_4='.$data_kegiatan->kd_rek_4.'&kd_rek_5='.$data_kegiatan->kd_rek_5.'&no_rinc='.$data_kegiatan->no_rinc.'&no_id='.$data_kegiatan->no_id)?>" class="btn btn-default"><i class="fa fa-close"></i> Cancel</a>
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