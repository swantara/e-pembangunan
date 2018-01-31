
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit User
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
              <h3 class="box-title"><i class="fa fa-edit margin-r-5"></i>Edit User</h3>
            </div>
            <!-- /.box-header -->            
            <?php echo form_open('user/edit/'.$data->id, array('method' => 'POST', 'role' => 'form', 'enctype' => 'multipart/form-data'));?>
            <?php echo validation_errors();?>
            <div class="box-body">
              <div class="row">                               
                <div class="col-md-12">
                  <div class="row">             
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="control-label">Kode Urusan</label>
                        <select
                          <?php if($this->session->userdata('session')['role'] == 1) : ?> 
                            required 
                          <?php else : ?>
                            disabled
                          <?php endif; ?>
                          name="kd_urusan" class="form-control input-xs">
                            <option value="opt1">Semua</option>
                            <option value="1">1 - Urusan Wajib Pelayanan Dasar</option>
                            <option value="2">2 - Urusan Wajib Bukan Pelayanan Dasar</option>
                            <option value="3">3 - Urusan Pilihan</option>
                            <option value="4">4 - Fungsi Penunjang Urusan Pemerintahan</option>
                        </select>
                        <input name="kd_urusan" type="hidden" value="<?=$data->kd_urusan?>">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="control-label">Kode Bidang</label>
                        <select 
                          <?php if($this->session->userdata('session')['role'] == 1) : ?> 
                            required 
                          <?php else : ?>
                            disabled
                          <?php endif; ?>
                          name="kd_bidang" class="form-control input-xs">
                            <option value="opt1">Semua</option>
                            <option value="1">1.01 - Pendidikan</option>
                            <option value="2">1.02 - Kesehatan</option>
                            <option value="3">1.03 - Pekerjaan Umum dan Penataan Ruang</option>
                            <option value="4">1.04 - Perumahan Rakyat dan Kawasan Permukiman</option>
                        </select>
                        <input name="kd_bidang" type="hidden" value="<?=$data->kd_bidang?>">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="control-label">Kode Unit</label>
                        <select 
                          <?php if($this->session->userdata('session')['role'] == 1) : ?> 
                            required 
                          <?php else : ?>
                            disabled
                          <?php endif; ?>
                          name="kd_unit" class="form-control input-xs">
                            <option value="opt1">Semua</option>
                            <option value="1">1.01.01 - Dinas Pendidikan, Kepemudaan dan Olah Raga</option>
                            <option value="2">1.02.01 - Dinas Kesehatan</option>
                            <option value="3">1.02.02 - Rumah Sakit Umum Daerah</option>
                            <option value="4">1.03.01 - Perumahan Rakyat dan Kawasan Permukiman</option>
                        </select>
                        <input name="kd_unit" type="hidden" value="<?=$data->kd_unit?>">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="control-label">Kode Sub-Unit</label>
                        <select 
                          <?php if($this->session->userdata('session')['role'] == 1) : ?> 
                            required 
                          <?php else : ?>
                            disabled
                          <?php endif; ?>
                          name="kd_sub" class="form-control input-xs">
                            <option value="opt1">Semua</option>
                            <option value="1">1.01.01.01 - Dinas Pendidikan, Kepemudaan dan Olah Raga</option>
                            <option value="2">1.02.01.01 - Dinas Kesehatan</option>
                            <option value="3">1.02.02.01 - Rumah Sakit Umum Daerah</option>
                            <option value="4">1.03.01.01 - Dinas Perumahan Rakyat dan Kawasan Permukiman</option>
                        </select>
                        <input name="kd_sub" type="hidden" value="<?=$data->kd_sub?>">
                      </div>
                    </div>
                  </div>
                  <hr/>
                  <div class="row">
                    <div class="col-md-2">
                        <div class="box-body box-profile">
                          <img style="margin: 0 auto;" class="img-responsive"
                            <?php if($data->foto!=""): ?> src="<?php echo base_url() . 'assets/images/user/' . $data->foto?>"
                            <?php else : ?> src="<?=base_url()?>assets/images/no-image-square.jpg"
                            <?php endif; ?>
                           alt="Program Picture">
                          <hr>
                          <lavel>Browse Foto :</lavel>
                          <input name="foto" type="file"">
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Username</label>
                        <input readonly name="username" type="text" class="form-control" value="<?=$data->username?>" placeholder="Username">
                      </div>
                    </div>              
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Nama</label>
                        <input required name="nama" type="text" class="form-control" value="<?=$data->nama?>" placeholder="Nama">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Jenis User</label>
                        <select 
                          <?php if($this->session->userdata('session')['role'] == 1) : ?> 
                            required 
                          <?php else : ?>
                            disabled
                          <?php endif; ?> 
                          name="role" class="form-control">

                          <?php
                            if(is_object($role) || is_array($role)) :
                              $no = 1;
                              foreach ($role as $rowB) :
                          ?>

                          <option <?php if($data->role==$rowB->id) echo "selected ";?> value="<?=$rowB->id?>"><?=$rowB->nama?></option>

                          <?php
                              $no ++;
                              endforeach;
                            endif;
                          ?>

                        </select>
                        <input name="role" type="hidden" value="<?=$data->role?>">
                      </div>
                    </div>   
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Password</label>
                        <input name="password" type="text" class="form-control" placeholder="Isikan jika ingin mengganti password">
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