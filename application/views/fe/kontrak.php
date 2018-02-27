 
  <script type="text/javascript" src="<?=base_url('assets/js/plugins/visualization/echarts/echarts.js')?>"></script>

  <!-- Page header -->
  <div class="page-header mw-200">
    <!-- <div class="gradient-overlay">
    </div> -->
    <div class="img-overlay bg-gradient" style="background-image: url('<?=base_url("assets/images/backgrounds/kantor-bupati.jpg")?>');">
      <div class="page-header-content">
        <div class="page-title align-center">
          <div class="h-40">SISTEM INFORMASI PELAPORAN &amp; PEMANTAUAN PEMBANGUNAN 
            <br/>(SIPPP) KABUPATEN BADUNG</div>
          <h4>
            <i class="icon-home2 position-left"></i>
            <a href="<?=site_url('')?>"><span class="text-semibold white-link">Beranda </span></a>
            <i class="icon-arrow-right32"></i>
            <i class="icon-versions position-left"></i>
            <span class="text-semibold"> Kontrak</span> 
          </h4>
        </div>
      </div>
    </div>
  </div>
  <!-- /page header -->


  <!-- Page container -->
  <div class="page-container mt-20">

    <!-- Page content -->
    <div class="page-content">

      <!-- Main content -->
      <div class="content-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-flat">
              <div class="panel-body">
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
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-flat">
              <div class="panel-heading">
                <h5 class="panel-title"><i class="icon-search4 mr-10"></i><strong>Pengadaan Melalui Kontrak</strong></h5>
                <div class="heading-elements">
                  <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                  </ul>
                </div>
              </div>
              <div class="panel-body">
                <!-- <div class="row">
                  <form class="form-vertical" action="#">
                    <div class="form-group">
                      <div style="margin-bottom: 10px;" class="col-md-2">
                        <label class="control-label">Kode Urusan</label>
                        <select name="select" class="form-control input-xs">
                            <option value="opt1">Semua</option>
                            <option value="opt2">1 - Urusan Wajib Pelayanan Dasar</option>
                            <option value="opt3">2 - Urusan Wajib Bukan Pelayanan Dasar</option>
                            <option value="opt4">3 - Urusan Pilihan</option>
                            <option value="opt4">4 - Fungsi Penunjang Urusan Pemerintahan</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <div style="margin-bottom: 10px;" class="col-md-2">
                        <label class="control-label">Kode Bidang</label>
                        <select name="select" class="form-control input-xs">
                            <option value="opt1">Semua</option>
                            <option value="opt2">1.01 - Pendidikan</option>
                            <option value="opt3">1.02 - Kesehatan</option>
                            <option value="opt4">1.03 - Pekerjaan Umum dan Penataan Ruang</option>
                            <option value="opt4">1.04 - Perumahan Rakyat dan Kawasan Permukiman</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <div style="margin-bottom: 10px;" class="col-md-2">
                        <label class="control-label">Kode Unit</label>
                        <select name="select" class="form-control input-xs">
                            <option value="opt1">Semua</option>
                            <option value="opt2">1.01.01 - Dinas Pendidikan, Kepemudaan dan Olah Raga</option>
                            <option value="opt3">1.02.01 - Dinas Kesehatan</option>
                            <option value="opt4">1.02.02 - Rumah Sakit Umum Daerah</option>
                            <option value="opt4">1.03.01 - Perumahan Rakyat dan Kawasan Permukiman</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <div style="margin-bottom: 10px;" class="col-md-2">
                        <label class="control-label">Kode Sub-Unit</label>
                        <select name="select" class="form-control input-xs">
                            <option value="opt1">Semua</option>
                            <option value="opt2">1.01.01.01 - Dinas Pendidikan, Kepemudaan dan Olah Raga</option>
                            <option value="opt3">1.02.01.01 - Dinas Kesehatan</option>
                            <option value="opt4">1.02.02.01 - Rumah Sakit Umum Daerah</option>
                            <option value="opt4">1.03.01.01 - Dinas Perumahan Rakyat dan Kawasan Permukiman</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <div style="margin-bottom: 10px;" class="col-md-2">
                        <label class="control-label">Kode Program</label>
                        <select name="select" class="form-control input-xs">
                            <option value="opt1">Semua</option>
                            <option value="opt2">1.01.01 - Program Pelayanan Administrasi Perkantoran</option>
                            <option value="opt3">1.02.01 - Program Peningkatan Sarana dan Prasarana Aparatur </option>
                            <option value="opt4">1.02.02 - Program Peningkatan Disiplin Aparatur</option>
                            <option value="opt4">1.03.01 - Program fasilitasi pindah/purna tugas PNS</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <div style="margin-bottom: 10px;" class="col-md-2">
                        <label class="control-label">Kode Kegiatan</label>
                        <select name="select" class="form-control input-xs">
                            <option value="opt1">Semua</option>
                            <option value="opt2">1.01.01.02 - Penyediaan Jasa Komunikasi Sumber Daya Air dan listrik</option>
                            <option value="opt3">1.01.01.07 - Penyediaan Jasa Adminstrasi Keuangan</option>
                            <option value="opt4">1.01.01.08 - Penyediaan Jasa Penjaga Malam, dan Sopir</option>
                            <option value="opt4">1.01.01.10 - Penyediaan Alat Tulis Kantor</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-2">
                        <label class="control-label">Nama Kegiatan</label>
                        <input placeholder="misal : Pengadaan Kendaraan Dinas/Operasional" type="text" class="form-control input-xs">
                      </div>
                    </div>
                    <div class="form-group">
                      <div style="margin-bottom: 10px;" class="col-md-2">
                        <label class="control-label">Jenis Pengadaan</label>
                        <select name="select" class="form-control input-xs">
                            <option value="opt1">Semua</option>
                            <option value="opt2">Barang</option>
                            <option value="opt3">Konstruksi</option>
                            <option value="opt4">Jasa</option>
                            <option value="opt4">Jasa Lainnya</option>
                            <option value="opt4">Swakelola</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-2">
                        <label class="control-label">Pelaksana</label>
                        <input placeholder="misal : Pengadaan Kendaraan Dinas/Operasional" type="text" class="form-control input-xs">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-1">
                        <button class="btn btn-xs btn-red mt-26" type="submit"><i class="icon-search4"></i></button>
                      </div>
                    </div>
                  </form>
                </div> -->
                <div class="table-responsive mt-30">
                  <table class="table">
                    <thead>
                      <tr class="table-gradient">
                        <th>#</th>
                        <th>Kode Rekening</th>
                        <th>OPD</th>
                        <th>Jenis Pengadaan</th>
                        <th>Nama Kegiatan</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Lama Pekerjaan</th>
                        <th>Nilai Kontrak (Rp.)</th>
                        <th>Pelaksana</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        if(is_object($kontrak) || is_array($kontrak)) :
                          $no = 1;
                          foreach ($kontrak as $row) :
                      ?>
                      <tr>
                        <td><?=$no?></td>  
                        <td>
                          <?php 
                            echo $row->kd_urusan . " . 0" . $row->kd_bidang . " . 0" . $row->kd_unit . " . 0" . $row->kd_sub . " . 0" . $row->kd_prog . " . 0" . $row->kd_keg;
                          ?>
                        </td> 
                        <td>
                          <?php         
                            foreach ($nama_opd as $rowB) :
                              if($row->kd_urusan == $rowB->kd_urusan && $row->kd_bidang == $rowB->kd_bidang && $row->kd_unit == $rowB->kd_unit && $row->kd_sub == $rowB->kd_sub) :
                                echo $rowB->nama;
                              endif;
                            endforeach;
                          ?>
                        </td>
                        <td><?=$row->ket_jenis_pengadaan?></td>                        
                        <td>
                          <?php         
                            foreach ($nama_kegiatan as $rowC) :
                              if($row->kd_urusan == $rowC->kd_urusan && $row->kd_bidang == $rowC->kd_bidang && $row->kd_prog == $rowC->kd_prog && $row->kd_keg == $rowC->kd_keg) :
                                echo $rowC->nama;
                                break;
                              endif;
                            endforeach;
                          ?>
                        </td> 
                        <td>
                          <?php
                            $date=date_create($row->tanggal_mulai);
                            $newdate=date_format($date,"d-m-Y");
                            echo $newdate;
                          ?>
                        </td> 
                        <td>
                          <?php
                            $date=date_create($row->tanggal_selesai);
                            $newdate=date_format($date,"d-m-Y");
                            echo $newdate;
                          ?>
                        </td>  
                        <td><?=$row->durasi." hari"?></td> 
                        <td><?php echo number_format($row->nilai_kontrak, 0, ',', '.')?></td> 
                        <td><?=$row->pelaksana?></td> 
                      </tr>
                      <?php
                          $no ++;
                          endforeach;
                        endif;
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <!-- /main content -->

    </div>
    <!-- /page content -->

  </div>
  <!-- /page container -->

  <script>
    $(document).ready(function(){
      $("#kontrak").addClass("active");
    });
  </script>
  <script type="text/javascript" src="<?=base_url('assets/js/pages/extra_trees.js')?>"></script>