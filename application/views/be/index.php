
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">

        <div class="col-md-12 col-sm-6 col-xs-12">
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Selamat Datang, <?php echo $this->session->userdata('session')['name'];?></h4>
            Anda telah login ke dalam aplikasi E-Pembangunan.
          </div>
        </div>

        <!-- <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-line-chart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Realisasi Tertinggi</span>
              <span class="info-box-number">90<small>%</small></span> - <a href="#">Pengadaan ...</a>
            </div>

          </div>

        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-warning"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Belum Terlaporkan</span>
              <span class="info-box-number">50</span>
            </div>

          </div>

        </div>

        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-pie-chart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pelaporan Fisik</span>
              <span class="info-box-number">760</span>
            </div>

          </div>

        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">User SKPD</span>
              <span class="info-box-number">38</span>
            </div>

          </div>

        </div> -->
      </div>

      <div class="row">
        <div class="col-xs-12">
          <div class="box box-danger">
            <div class="box-header with-border">
              <div class="row">
                <form class="form-vertical" action="#">
                  <div class="form-group">
                    <div style="margin-bottom: 10px;" class="col-md-2">
                      <label class="control-label">Tahun</label>
                      <select name="select" class="form-control input-xs" id="selectYear" onchange="changeYear()">
                          <?php
                            $getYear = $this -> input -> get('tahun');
                            if(isset($getYear)){
                              $tahun = $getYear;
                            }
                            else{
                              $tahun = date('Y');
                            }
                          ?>
                          <option <?php if($tahun==2017) echo "selected"; ?> value="2017">2017</option>
                          <option <?php if($tahun==2018) echo "selected"; ?> value="2018">2018</option>
                      </select>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example2" class="table table-hover">
                
                <?php
                  if ($this->session->userdata('session')['role'] == 1) :
                ?>

                <h4>Kegiatan</h4>
                <thead>
                <tr>
                  <th style="width: 10px;">#</th>
                  <th>Tahun</th>
                  <th style="width: 150px;">Kode OPD</th>
                  <th>Nama OPD</th>
                  <th>Induk (Rp.)</th>
                  <th>Perubahan (Rp.)</th>
                  <th>Kelengkapan Data</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  if(is_object($kegiatan) || is_array($kegiatan)) :
                    $no = 1;
                    foreach ($kegiatan as $row) :
                ?>
                <tr>
                  <td><?=$no?></td>
                  <th><?=$row->tahun?></th>
                  <td>
                    <a href="<?=site_url('backend/kegiatanbyopd/?tahun='.$row->tahun.'&kd_urusan='.$row->kd_urusan.'&kd_bidang='.$row->kd_bidang.'&kd_unit='.$row->kd_unit.'&kd_sub='.$row->kd_sub)?>">
                      <?php 
                        echo $row->kd_urusan . " . 0" . $row->kd_bidang . " . 0" . $row->kd_unit . " . 0" . $row->kd_sub;
                      ?>
                    </a>
                  </td>
                  <td>
                    <?php                      
                      foreach ($nama_opd as $rowB) :
                        if($row->kd_urusan == $rowB->kd_urusan && $row->kd_bidang == $rowB->kd_bidang && $row->kd_unit == $rowB->kd_unit && $row->kd_sub == $rowB->kd_sub) :
                          echo $rowB->nama;
                          break;
                        endif;
                      endforeach;
                    ?>
                  </td>
                  <td style="text-align: right;"><?php echo number_format($row->total_induk, 0, ',', '.');?></td>
                  <td style="text-align: right;"><?php echo number_format($row->total_perubahan, 0, ',', '.');?></td>
                  <td>
                    <a href="#">(<?=$row->progress_data."/".$row->total_data?>) <i style="margin-left: 5px;" class="fa fa-circle-o-notch fa-spin text-aqua ml-10"></i></a>
                  </td>
                </tr>

                <?php
                    $no ++;
                    endforeach;
                  endif;
                ?>

                </tbody>

                <?php
                  else :
                ?>

                <h4>List Kegiatan</h4>
                <thead>
                <tr>
                  <th style="width: 10px;">#</th>
                  <th>Tahun</th>
                  <th style="width: 150px;">Kode Rekening</th>
                  <th>Nama Kegiatan</th>
                  <th>Sebelum Perubahan (Rp.)</th>
                  <th>Setelah Perubahan (Rp.)</th>
                  <th style="width: 50px;">Kelengkapan Data</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  if(is_object($kegiatan) || is_array($kegiatan)) :
                    $no = 1;
                    foreach ($kegiatan as $row) :
                ?>
                <tr>
                  <td><?=$no?></td>
                  <th><?=$row->tahun?></th>
                  <td>
                    <a href="<?=site_url('backend/rincianbykegiatan/?tahun='.$row->tahun.'&kd_urusan='.$row->kd_urusan.'&kd_bidang='.$row->kd_bidang.'&kd_unit='.$row->kd_unit.'&kd_sub='.$row->kd_sub.'&kd_prog='.$row->kd_prog.'&kd_keg='.$row->kd_keg)?>">
                      <?php 
                        echo $row->kd_urusan . " . 0" . $row->kd_bidang . " . 0" . $row->kd_unit . " . 0" . $row->kd_sub . " . 0" . $row->kd_prog . " . 0" . $row->kd_keg;
                      ?>
                    </a>
                  </td>
                  <td>
                    <?php                      
                      foreach ($nama_kegiatan as $rowB) :
                        if($row->kd_urusan == $rowB->kd_urusan && $row->kd_bidang == $rowB->kd_bidang && $row->kd_prog == $rowB->kd_prog && $row->kd_keg == $rowB->kd_keg) :
                          echo $rowB->nama;
                          break;
                        endif;
                      endforeach;
                    ?>
                  </td>
                  <td style="text-align: right;"><?php echo number_format($row->total_induk, 0, ',', '.');?></td>
                  <td style="text-align: right;"><?php echo number_format($row->total_perubahan, 0, ',', '.');?></td>
                  <td>
                    <a href="<?=site_url('backend/rincianbykegiatan/?tahun='.$row->tahun.'&kd_urusan='.$row->kd_urusan.'&kd_bidang='.$row->kd_bidang.'&kd_unit='.$row->kd_unit.'&kd_sub='.$row->kd_sub.'&kd_prog='.$row->kd_prog.'&kd_keg='.$row->kd_keg)?>">(<?=$row->progress_data."/".$row->total_data?>) <i style="margin-left: 5px;" class="fa fa-circle-o-notch fa-spin text-aqua ml-10"></i></a>
                    <!-- 1. Jenis Pengadaan <i class="fa fa-check text-green ml-5"></i><br/>
                    2. Anggaran Kas <i class="fa fa-times text-red ml-5"></i><br/>
                    3. Target Fisik <i class="fa fa-check text-green ml-5"></i><br/>
                    4. Metode Pengadaan <i class="fa fa-check text-green ml-5"></i><br/>
                    5. Anggaran Kas u/ Kontrak <i class="fa fa-times text-red ml-5"></i><br/>
                    6. Target Fisik u/ Kontrak <i class="fa fa-check text-green ml-5"></i><br/> -->
                  </td>
                </tr>

                <?php
                    $no ++;
                    endforeach;
                  endif;
                ?>

                </tbody>

                <?php
                  endif;
                ?>
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
  function changeYear() {
      var year = document.getElementById("selectYear").value;
      window.location.assign("http://ganeshaglobal.com/sippp/backend/?tahun=" + year);
  }
  </script>