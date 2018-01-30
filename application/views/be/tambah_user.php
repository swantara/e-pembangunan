
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Data Kegiatan
        <small>E-Pembangunan</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
      <div class="col-md-12">
          <!-- About Me Box -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-edit margin-r-5"></i>Tambah User</h3>
            </div>
            <!-- /.box-header -->            
            <?php echo form_open('user/tambah', array('method' => 'POST', 'role' => 'form', 'enctype' => 'multipart/form-data'));?>
            <?php echo validation_errors();?>
            <div class="box-body">
              <div class="row">                               
                <div class="col-md-12">
                  <div class="row">             
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="control-label">Kode Urusan</label>
                        <select required name="kd_urusan" class="form-control input-xs">
                            <?php
                              if(is_object($urusan) || is_array($urusan)) :
                                foreach ($urusan as $rowA) :
                            ?>
                            <option value="<?=$rowA->kd_urusan?>"><?php echo $rowA->kd_urusan . " - " . $rowA->nama?></option>
                            <?php
                                endforeach;
                              endif;
                            ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="control-label">Kode Bidang</label>
                        <select required name="kd_bidang" class="form-control input-xs">
                            <?php
                              if(is_object($bidang) || is_array($bidang)) :
                                foreach ($bidang as $rowB) :
                            ?>
                            <option value="<?=$rowB->kd_bidang?>"><?php echo $rowB->kd_urusan . "." . $rowB->kd_bidang . " - " . $rowB->nama?></option>
                            <?php
                                endforeach;
                              endif;
                            ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="control-label">Kode Unit</label>
                        <select required name="kd_unit" class="form-control input-xs">
                            <?php
                              if(is_object($unit) || is_array($unit)) :
                                foreach ($unit as $rowC) :
                            ?>
                            <option value="<?=$rowC->kd_bidang?>"><?php echo $rowC->kd_urusan . "." . $rowC->kd_bidang . "." . $rowC->kd_unit . " - " . $rowC->nama?></option>
                            <?php
                                endforeach;
                              endif;
                            ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="control-label">Kode Sub-Unit</label>
                        <select required name="kd_sub" class="form-control input-xs">
                            <?php
                              if(is_object($sub) || is_array($sub)) :
                                foreach ($sub as $rowD) :
                            ?>
                            <option value="<?=$rowD->kd_bidang?>"><?php echo $rowD->kd_urusan . "." . $rowD->kd_bidang . "." . $rowD->kd_unit . "." . $rowD->kd_sub . " - " . $rowD->nama?></option>
                            <?php
                                endforeach;
                              endif;
                            ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <hr/>
                  <div class="row">
                    <div class="col-md-2">
                        <div class="box-body box-profile">
                          <img style="margin: 0 auto;" class="img-responsive" src="<?=base_url()?>assets/images/no-image-square.jpg" alt="Program Picture">
                          <hr>
                          <lavel>Browse Foto :</lavel>
                          <input required name="foto" type="file">
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Username</label>
                        <input required name="username" type="text" class="form-control" value="<?=set_value('username')?>" placeholder="Username">
                      </div>
                    </div>              
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Nama</label>
                        <input required name="nama" type="text" class="form-control" value="<?=set_value('username')?>" placeholder="Nama">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Jenis User</label>
                        <select required name="role" class="form-control">
                          <option value="1">Admin</option>                      
                          <option value="2">User OPD</option>
                        </select>
                      </div>
                    </div>   
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Password</label>
                        <input required name="password" type="text" class="form-control" value="<?=set_value('password')?>" placeholder="Password">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <a href="<?=site_url('user')?>" class="btn btn-default"><i class="fa fa-close"></i> Cancel</a>
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