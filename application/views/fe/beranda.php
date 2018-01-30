
  <script type="text/javascript" src="<?=base_url('assets/js/plugins/visualization/echarts/echarts.js')?>"></script>
  <!-- Page header -->
  <div class="page-header mw-200">
    <!-- <div class="gradient-overlay">
    </div> -->
    <div class="img-overlay bg-gradient" style="background-image: url('<?=base_url("assets/images/backgrounds/kantor-bupati.jpg")?>');">
      <div class="page-header-content">
        <div class="page-title align-center">
          <div class="h-40">SISTEM INFORMASI PELAPORAN &amp; PENGENDALIAN PEMBANGUNAN 
            <br/>(SIPPP) KABUPATEN BADUNG</div>
          <h4>
            <i class="icon-home2 position-left"></i>
            <span class="text-semibold">Beranda</span> - Dashboard
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
                <h5 class="panel-title"><i class="icon-design mr-10"></i><strong>Rencana Anggaran Satuan Kerja</strong></h5>
                <div class="heading-elements">
                  <ul class="icons-list">
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="collapse"></a></li>
                  </ul>
                </div>
              </div>
              <div class="panel-body">
                <div class="chart-container">
                  <div style="height: 1200px !important;" class="chart has-fixed-height" id="basic_bars"></div>
                </div>
                <div class="table-responsive mt-30">
                  <table class="table">
                    <thead>
                      <tr class="table-gradient">
                        <th>#</th>
                        <th>Organisasi Perangkat Daerah</th>
                        <th>Induk (Rupiah)</th>
                        <th>Perubahan (Rupiah)</th>
                        <th>Kenaikan/Penurunan (Rupiah)</th>
                        <th>Persentase</th>
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
                        <td>
                          <a href="<?=site_url('beranda/opd/?tahun='.$row->tahun.'&kd_urusan='.$row->kd_urusan.'&kd_bidang='.$row->kd_bidang.'&kd_unit='.$row->kd_unit.'&kd_sub='.$row->kd_sub)?>">
                          <?php
                            foreach ($nama_opd as $rowB) :
                              if($row->kd_urusan == $rowB->kd_urusan && $row->kd_bidang == $rowB->kd_bidang && $row->kd_unit == $rowB->kd_unit && $row->kd_sub == $rowB->kd_sub) :
                                echo $rowB->nama;
                              endif;
                            endforeach;
                          ?>
                          </a>
                        </td> 
                        <td style="text-align: right;"><?php echo number_format($row->total_induk, 0, ',', '.');?></td>
                        <td style="text-align: right;"><?php echo number_format($row->total_perubahan, 0, ',', '.');?></td>  
                        <td style="text-align: right;">
                          <?php
                            if($row->total_perubahan!=0) :
                              echo number_format(($row->total_perubahan-$row->total_induk), 0, ',', '.');
                            else:
                              echo "-";
                            endif;
                          ?>  
                        </td>
                        <td>
                          <?php 
                            if($row->total_perubahan!=0) :
                              echo number_format(((($row->total_perubahan-$row->total_induk)/$row->total_induk)*100), 2) . " %";
                            else :
                              echo "-";
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
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-flat">
              <div class="panel-heading">
                <h5 class="panel-title"><i class="icon-stats-growth mr-10"></i><strong>Progres Keuangan</strong></h5>
                <div class="heading-elements">
                  <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                  </ul>
                </div>
              </div>
              <div class="panel-body">
                <div class="chart" id="line-chart" style="height: 300px;"></div>
                <div class="table-responsive mt-30">
                  <table class="table">
                    <thead>
                      <tr class="table-gradient">
                        <th>Keterangan</th>
                        <th>Tahun</th>
                        <th>B01 (Rp.)</th>
                        <th>B02 (Rp.)</th>
                        <th>B03 (Rp.)</th>
                        <th>B04 (Rp.)</th>
                        <th>B05 (Rp.)</th>
                        <th>B06 (Rp.)</th>
                        <th>B07 (Rp.)</th>
                        <th>B08 (Rp.)</th>
                        <th>B09 (Rp.)</th>
                        <th>B010 (Rp.)</th>
                        <th>B011 (Rp.)</th>
                        <th>B012 (Rp.)</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><span class="pill-green">Target</span></td>
                        <td><?=$tahun?></td>
                        <td><?=number_format($targetkeuangan->total_jan, 0, ',', '.')?></td>
                        <td><?=number_format($targetkeuangan->total_feb, 0, ',', '.')?></td>
                        <td><?=number_format($targetkeuangan->total_mar, 0, ',', '.')?></td>
                        <td><?=number_format($targetkeuangan->total_apr, 0, ',', '.')?></td>
                        <td><?=number_format($targetkeuangan->total_mei, 0, ',', '.')?></td>
                        <td><?=number_format($targetkeuangan->total_jun, 0, ',', '.')?></td>
                        <td><?=number_format($targetkeuangan->total_jul, 0, ',', '.')?></td>
                        <td><?=number_format($targetkeuangan->total_agt, 0, ',', '.')?></td>
                        <td><?=number_format($targetkeuangan->total_sep, 0, ',', '.')?></td>
                        <td><?=number_format($targetkeuangan->total_okt, 0, ',', '.')?></td>
                        <td><?=number_format($targetkeuangan->total_nop, 0, ',', '.')?></td>
                        <td><?=number_format($targetkeuangan->total_des, 0, ',', '.')?></td>
                      </tr>
                      <tr>
                        <td><span class="pill-blue">Realisasi</span></td>
                        <td><?=$tahun?></td>
                        <td><?=number_format($realisasikeuangan->total_jan, 0, ',', '.')?></td>
                        <td><?=number_format($realisasikeuangan->total_feb, 0, ',', '.')?></td>
                        <td><?=number_format($realisasikeuangan->total_mar, 0, ',', '.')?></td>
                        <td><?=number_format($realisasikeuangan->total_apr, 0, ',', '.')?></td>
                        <td><?=number_format($realisasikeuangan->total_mei, 0, ',', '.')?></td>
                        <td><?=number_format($realisasikeuangan->total_jun, 0, ',', '.')?></td>
                        <td><?=number_format($realisasikeuangan->total_jul, 0, ',', '.')?></td>
                        <td><?=number_format($realisasikeuangan->total_agt, 0, ',', '.')?></td>
                        <td><?=number_format($realisasikeuangan->total_sep, 0, ',', '.')?></td>
                        <td><?=number_format($realisasikeuangan->total_okt, 0, ',', '.')?></td>
                        <td><?=number_format($realisasikeuangan->total_nop, 0, ',', '.')?></td>
                        <td><?=number_format($realisasikeuangan->total_des, 0, ',', '.')?></td>
                      </tr>
                      <tr>
                        <td><span class="pill-yellow">Deviasi</span></td>
                        <td><?=$tahun?></td>
                        <td><?=number_format($realisasikeuangan->total_jan-$targetkeuangan->total_jan, 0, ',', '.')?></td>
                        <td><?=number_format($realisasikeuangan->total_feb-$targetkeuangan->total_feb, 0, ',', '.')?></td>
                        <td><?=number_format($realisasikeuangan->total_mar-$targetkeuangan->total_mar, 0, ',', '.')?></td>
                        <td><?=number_format($realisasikeuangan->total_apr-$targetkeuangan->total_apr, 0, ',', '.')?></td>
                        <td><?=number_format($realisasikeuangan->total_mei-$targetkeuangan->total_mei, 0, ',', '.')?></td>
                        <td><?=number_format($realisasikeuangan->total_jun-$targetkeuangan->total_jun, 0, ',', '.')?></td>
                        <td><?=number_format($realisasikeuangan->total_jul-$targetkeuangan->total_jul, 0, ',', '.')?></td>
                        <td><?=number_format($realisasikeuangan->total_agt-$targetkeuangan->total_agt, 0, ',', '.')?></td>
                        <td><?=number_format($realisasikeuangan->total_sep-$targetkeuangan->total_sep, 0, ',', '.')?></td>
                        <td><?=number_format($realisasikeuangan->total_okt-$targetkeuangan->total_okt, 0, ',', '.')?></td>
                        <td><?=number_format($realisasikeuangan->total_nop-$targetkeuangan->total_nop, 0, ',', '.')?></td>
                        <td><?=number_format($realisasikeuangan->total_des-$targetkeuangan->total_des, 0, ',', '.')?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-flat">
              <div class="panel-heading">
                <h5 class="panel-title"><i class="icon-clipboard2 mr-10"></i><strong>Progres Fisik</strong></h5>
                <div class="heading-elements">
                  <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                  </ul>
                </div>
              </div>
              <div class="panel-body">
                <div class="chart" id="line-chart2" style="height: 300px;"></div>
                <div class="table-responsive mt-30">
                  <table class="table">
                    <thead>
                      <tr class="table-gradient">
                        <th>Keterangan</th>
                        <th>Tahun</th>
                        <th>B01</th>
                        <th>B02</th>
                        <th>B03</th>
                        <th>B04</th>
                        <th>B05</th>
                        <th>B06</th>
                        <th>B07</th>
                        <th>B08</th>
                        <th>B09</th>
                        <th>B010</th>
                        <th>B011</th>
                        <th>B012</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><span class="pill-green">Target</span></td>
                        <td><?=$tahun?></td>
                        <td><?=number_format($targetfisik->total_jan, 0, ',', '.') . "%"?></td>
                        <td><?=number_format($targetfisik->total_feb, 0, ',', '.') . "%"?></td>
                        <td><?=number_format($targetfisik->total_mar, 0, ',', '.') . "%"?></td>
                        <td><?=number_format($targetfisik->total_apr, 0, ',', '.') . "%"?></td>
                        <td><?=number_format($targetfisik->total_mei, 0, ',', '.') . "%"?></td>
                        <td><?=number_format($targetfisik->total_jun, 0, ',', '.') . "%"?></td>
                        <td><?=number_format($targetfisik->total_jul, 0, ',', '.') . "%"?></td>
                        <td><?=number_format($targetfisik->total_agt, 0, ',', '.') . "%"?></td>
                        <td><?=number_format($targetfisik->total_sep, 0, ',', '.') . "%"?></td>
                        <td><?=number_format($targetfisik->total_okt, 0, ',', '.') . "%"?></td>
                        <td><?=number_format($targetfisik->total_nop, 0, ',', '.') . "%"?></td>
                        <td><?=number_format($targetfisik->total_des, 0, ',', '.') . "%"?></td>
                      </tr>
                      <tr>
                        <td><span class="pill-blue">Realisasi</span></td>
                        <td><?=$tahun?></td>
                        <td><?=number_format($realisasifisik->total_jan, 0, ',', '.') . "%"?></td>
                        <td><?=number_format($realisasifisik->total_feb, 0, ',', '.') . "%"?></td>
                        <td><?=number_format($realisasifisik->total_mar, 0, ',', '.') . "%"?></td>
                        <td><?=number_format($realisasifisik->total_apr, 0, ',', '.') . "%"?></td>
                        <td><?=number_format($realisasifisik->total_mei, 0, ',', '.') . "%"?></td>
                        <td><?=number_format($realisasifisik->total_jun, 0, ',', '.') . "%"?></td>
                        <td><?=number_format($realisasifisik->total_jul, 0, ',', '.') . "%"?></td>
                        <td><?=number_format($realisasifisik->total_agt, 0, ',', '.') . "%"?></td>
                        <td><?=number_format($realisasifisik->total_sep, 0, ',', '.') . "%"?></td>
                        <td><?=number_format($realisasifisik->total_okt, 0, ',', '.') . "%"?></td>
                        <td><?=number_format($realisasifisik->total_nop, 0, ',', '.') . "%"?></td>
                        <td><?=number_format($realisasifisik->total_des, 0, ',', '.') . "%"?></td>
                      </tr>
                      <tr>
                        <td><span class="pill-yellow">Deviasi</span></td>
                        <td><?=$tahun?></td>
                        <td><?=number_format($realisasifisik->total_jan-$targetfisik->total_jan, 0, ',', '.') . "%"?></td>
                        <td><?=number_format($realisasifisik->total_feb-$targetfisik->total_feb, 0, ',', '.') . "%"?></td>
                        <td><?=number_format($realisasifisik->total_mar-$targetfisik->total_mar, 0, ',', '.') . "%"?></td>
                        <td><?=number_format($realisasifisik->total_apr-$targetfisik->total_apr, 0, ',', '.') . "%"?></td>
                        <td><?=number_format($realisasifisik->total_mei-$targetfisik->total_mei, 0, ',', '.') . "%"?></td>
                        <td><?=number_format($realisasifisik->total_jun-$targetfisik->total_jun, 0, ',', '.') . "%"?></td>
                        <td><?=number_format($realisasifisik->total_jul-$targetfisik->total_jul, 0, ',', '.') . "%"?></td>
                        <td><?=number_format($realisasifisik->total_agt-$targetfisik->total_agt, 0, ',', '.') . "%"?></td>
                        <td><?=number_format($realisasifisik->total_sep-$targetfisik->total_sep, 0, ',', '.') . "%"?></td>
                        <td><?=number_format($realisasifisik->total_okt-$targetfisik->total_okt, 0, ',', '.') . "%"?></td>
                        <td><?=number_format($realisasifisik->total_nop-$targetfisik->total_nop, 0, ',', '.') . "%"?></td>
                        <td><?=number_format($realisasifisik->total_des-$targetfisik->total_des, 0, ',', '.') . "%"?></td>
                      </tr>
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
    $(function () {

        // Set paths
        // ------------------------------

        require.config({
            paths: {
                echarts: "<?=base_url('assets/js/plugins/visualization/echarts')?>"
            }
        });


        // Configuration
        // ------------------------------

        require(
            [
                'echarts',
                'echarts/theme/limitless',
                'echarts/chart/bar',
                'echarts/chart/line'
            ],


            // Charts setup
            function (ec, limitless) {

                // Initialize charts
                // ------------------------------

                var basic_bars = ec.init(document.getElementById('basic_bars'), limitless);


                // Charts setup
                // ------------------------------

                //
                // Basic bars options
                //

                $.getJSON( "<?=site_url('beranda/ajaxgetsumrask/?tahun='.$tahun)?>")
                .done(function( datax ) {
                  if(datax != false)
                  {
                    var nilai = datax.rask;

                    basic_bars_options = {

                        // Setup grid
                        grid: {
                            x: 580,
                            x2: 10,
                            y: 35,
                            y2: 25
                        },

                        // Add tooltip
                        tooltip: {
                            trigger: 'axis',
                            axisPointer: {
                                type: 'shadow'
                            }
                        },

                        // Add legend
                        legend: {
                            data: ['Induk (Miliar)', 'Perubahan (Miliar)']
                        },

                        // Enable drag recalculate
                        calculable: true,

                        // Horizontal axis
                        xAxis: [{
                            type: 'value',
                            boundaryGap: [0, 0.01]
                        }],

                        // Vertical axis
                        yAxis: [{
                            type: 'category',
                            data: [nilai[0].nama,
                              nilai[1].nama,
                              nilai[2].nama,
                              nilai[3].nama,
                              nilai[4].nama,
                              nilai[5].nama,
                              nilai[6].nama,
                              nilai[7].nama,
                              nilai[8].nama,
                              nilai[9].nama,
                              nilai[10].nama,
                              nilai[11].nama,
                              nilai[12].nama,
                              nilai[13].nama,
                              nilai[14].nama,
                              nilai[15].nama,
                              nilai[16].nama,
                              nilai[17].nama,
                              nilai[18].nama,
                              nilai[19].nama,
                              nilai[20].nama,
                              nilai[21].nama,
                              nilai[22].nama,
                              nilai[23].nama,
                              nilai[24].nama,
                              nilai[25].nama,
                              nilai[26].nama,
                              nilai[27].nama,
                              nilai[28].nama,
                              nilai[29].nama,
                              nilai[30].nama,
                              nilai[31].nama,
                              nilai[32].nama,
                              nilai[33].nama,
                              nilai[34].nama,
                              nilai[35].nama,
                              nilai[36].nama,
                              nilai[37].nama,
                              nilai[38].nama,
                              nilai[39].nama,
                              nilai[40].nama]
                        }],

                        // Add series
                        series: [
                            {
                                name: 'Induk (Miliar)',
                                type: 'bar',
                                itemStyle: {
                                    normal: {
                                        color: '#a0d0e0'
                                    }
                                },
                                data: [numeral(nilai[0].total_induk).format('0.00'),
                              numeral(nilai[1].total_induk).format('0.00'),
                              numeral(nilai[2].total_induk).format('0.00'),
                              numeral(nilai[3].total_induk).format('0.00'),
                              numeral(nilai[4].total_induk).format('0.00'),
                              numeral(nilai[5].total_induk).format('0.00'),
                              numeral(nilai[6].total_induk).format('0.00'),
                              numeral(nilai[7].total_induk).format('0.00'),
                              numeral(nilai[8].total_induk).format('0.00'),
                              numeral(nilai[9].total_induk).format('0.00'),
                              numeral(nilai[10].total_induk).format('0.00'),
                              numeral(nilai[11].total_induk).format('0.00'),
                              numeral(nilai[12].total_induk).format('0.00'),
                              numeral(nilai[13].total_induk).format('0.00'),
                              numeral(nilai[14].total_induk).format('0.00'),
                              numeral(nilai[15].total_induk).format('0.00'),
                              numeral(nilai[16].total_induk).format('0.00'),
                              numeral(nilai[17].total_induk).format('0.00'),
                              numeral(nilai[18].total_induk).format('0.00'),
                              numeral(nilai[19].total_induk).format('0.00'),
                              numeral(nilai[20].total_induk).format('0.00'),
                              numeral(nilai[21].total_induk).format('0.00'),
                              numeral(nilai[22].total_induk).format('0.00'),
                              numeral(nilai[23].total_induk).format('0.00'),
                              numeral(nilai[24].total_induk).format('0.00'),
                              numeral(nilai[25].total_induk).format('0.00'),
                              numeral(nilai[26].total_induk).format('0.00'),
                              numeral(nilai[27].total_induk).format('0.00'),
                              numeral(nilai[28].total_induk).format('0.00'),
                              numeral(nilai[29].total_induk).format('0.00'),
                              numeral(nilai[30].total_induk).format('0.00'),
                              numeral(nilai[31].total_induk).format('0.00'),
                              numeral(nilai[32].total_induk).format('0.00'),
                              numeral(nilai[33].total_induk).format('0.00'),
                              numeral(nilai[34].total_induk).format('0.00'),
                              numeral(nilai[35].total_induk).format('0.00'),
                              numeral(nilai[36].total_induk).format('0.00'),
                              numeral(nilai[37].total_induk).format('0.00'),
                              numeral(nilai[38].total_induk).format('0.00'),
                              numeral(nilai[39].total_induk).format('0.00'),
                              numeral(nilai[40].total_induk).format('0.00')]
                            },
                            {
                                name: 'Perubahan (Miliar)',
                                type: 'bar',
                                itemStyle: {
                                    normal: {
                                        color: '#b9e0a0'
                                    }
                                },
                                data: [numeral(nilai[0].total_perubahan).format('0.00'),
                              numeral(nilai[1].total_perubahan).format('0.00'),
                              numeral(nilai[2].total_perubahan).format('0.00'),
                              numeral(nilai[3].total_perubahan).format('0.00'),
                              numeral(nilai[4].total_perubahan).format('0.00'),
                              numeral(nilai[5].total_perubahan).format('0.00'),
                              numeral(nilai[6].total_perubahan).format('0.00'),
                              numeral(nilai[7].total_perubahan).format('0.00'),
                              numeral(nilai[8].total_perubahan).format('0.00'),
                              numeral(nilai[9].total_perubahan).format('0.00'),
                              numeral(nilai[10].total_perubahan).format('0.00'),
                              numeral(nilai[11].total_perubahan).format('0.00'),
                              numeral(nilai[12].total_perubahan).format('0.00'),
                              numeral(nilai[13].total_perubahan).format('0.00'),
                              numeral(nilai[14].total_perubahan).format('0.00'),
                              numeral(nilai[15].total_perubahan).format('0.00'),
                              numeral(nilai[16].total_perubahan).format('0.00'),
                              numeral(nilai[17].total_perubahan).format('0.00'),
                              numeral(nilai[18].total_perubahan).format('0.00'),
                              numeral(nilai[19].total_perubahan).format('0.00'),
                              numeral(nilai[20].total_perubahan).format('0.00'),
                              numeral(nilai[21].total_perubahan).format('0.00'),
                              numeral(nilai[22].total_perubahan).format('0.00'),
                              numeral(nilai[23].total_perubahan).format('0.00'),
                              numeral(nilai[24].total_perubahan).format('0.00'),
                              numeral(nilai[25].total_perubahan).format('0.00'),
                              numeral(nilai[26].total_perubahan).format('0.00'),
                              numeral(nilai[27].total_perubahan).format('0.00'),
                              numeral(nilai[28].total_perubahan).format('0.00'),
                              numeral(nilai[29].total_perubahan).format('0.00'),
                              numeral(nilai[30].total_perubahan).format('0.00'),
                              numeral(nilai[31].total_perubahan).format('0.00'),
                              numeral(nilai[32].total_perubahan).format('0.00'),
                              numeral(nilai[33].total_perubahan).format('0.00'),
                              numeral(nilai[34].total_perubahan).format('0.00'),
                              numeral(nilai[35].total_perubahan).format('0.00'),
                              numeral(nilai[36].total_perubahan).format('0.00'),
                              numeral(nilai[37].total_perubahan).format('0.00'),
                              numeral(nilai[38].total_perubahan).format('0.00'),
                              numeral(nilai[39].total_perubahan).format('0.00'),
                              numeral(nilai[40].total_perubahan).format('0.00')]
                            }
                        ]
                    };

                    // Apply options
                    // ------------------------------

                    basic_bars.setOption(basic_bars_options);

                    // Resize charts
                    // ------------------------------

                    window.onresize = function () {
                        setTimeout(function (){
                            basic_bars.resize();
                        }, 200);
                    }
                  }
                });
            }
        );
    });

  </script>
  <script>
    $(document).ready(function(){
      "use strict";

      $("#beranda").addClass("active");

      // CHART 1
      $.getJSON( "<?=site_url('beranda/ajaxgetkeuanganall/?tahun='.$tahun)?>")
      .done(function( data1 ) {
        if(data1 != false)
        {
          var value = data1.keuangan;
          
          var line = new Morris.Line({
            element: 'line-chart',
            resize: true,
            data: [
                  {y: value[0].tahun + '-01', item1: numeral(value[0].total_jan).format('0.00'), item2: numeral(value[1].total_jan).format('0.00'), item3: numeral(value[2].total_jan).format('0.00')},
                  {y: value[0].tahun + '-02', item1: numeral(value[0].total_feb).format('0.00'), item2: numeral(value[1].total_feb).format('0.00'), item3: numeral(value[2].total_feb).format('0.00')},
                  {y: value[0].tahun + '-03', item1: numeral(value[0].total_mar).format('0.00'), item2: numeral(value[1].total_mar).format('0.00'), item3: numeral(value[2].total_mar).format('0.00')},
                  {y: value[0].tahun + '-04', item1: numeral(value[0].total_apr).format('0.00'), item2: numeral(value[1].total_apr).format('0.00'), item3: numeral(value[2].total_apr).format('0.00')},
                  {y: value[0].tahun + '-05', item1: numeral(value[0].total_mei).format('0.00'), item2: numeral(value[1].total_mei).format('0.00'), item3: numeral(value[2].total_mei).format('0.00')},
                  {y: value[0].tahun + '-06', item1: numeral(value[0].total_jun).format('0.00'), item2: numeral(value[1].total_jun).format('0.00'), item3: numeral(value[2].total_jun).format('0.00')},
                  {y: value[0].tahun + '-07', item1: numeral(value[0].total_jul).format('0.00'), item2: numeral(value[1].total_jul).format('0.00'), item3: numeral(value[2].total_jul).format('0.00')},
                  {y: value[0].tahun + '-08', item1: numeral(value[0].total_agt).format('0.00'), item2: numeral(value[1].total_agt).format('0.00'), item3: numeral(value[2].total_agt).format('0.00')},
                  {y: value[0].tahun + '-09', item1: numeral(value[0].total_sep).format('0.00'), item2: numeral(value[1].total_sep).format('0.00'), item3: numeral(value[2].total_sep).format('0.00')},
                  {y: value[0].tahun + '-10', item1: numeral(value[0].total_okt).format('0.00'), item2: numeral(value[1].total_okt).format('0.00'), item3: numeral(value[2].total_okt).format('0.00')},
                  {y: value[0].tahun + '-11', item1: numeral(value[0].total_nop).format('0.00'), item2: numeral(value[1].total_nop).format('0.00'), item3: numeral(value[2].total_nop).format('0.00')},
                  {y: value[0].tahun + '-12', item1: numeral(value[0].total_des).format('0.00'), item2: numeral(value[1].total_des).format('0.00'), item3: numeral(value[2].total_des).format('0.00')}
                ],
            xkey: 'y',
            ykeys: ['item1', 'item2', 'item3'],
            labels: ['Target', 'Realisasi', 'Deviasi'],
            lineColors: ['#b9e0a0', '#a0d0e0', '#cddc39'],
            hideHover: 'auto',
            postUnits: ' Miliar',
            xLabels : 'bulan'
          });
        }
      });

      // CHART 2
      $.getJSON( "<?=site_url('beranda/ajaxgetfisikall/?tahun='.$tahun)?>")
      .done(function( data2 ) {
        if(data2 != false)
        {
          var value = data2.fisik;
          
          var line2 = new Morris.Line({
            element: 'line-chart2',
            resize: true,
            data: [
                  {y: value[0].tahun + '-01', item1b: numeral(value[0].total_jan).format('0.0000'), item2b: numeral(value[1].total_jan).format('0.0000'), item3b: numeral(value[2].total_jan).format('0.0000')},
                  {y: value[0].tahun + '-02', item1b: numeral(value[0].total_feb).format('0.0000'), item2b: numeral(value[1].total_feb).format('0.0000'), item3b: numeral(value[2].total_feb).format('0.0000')},
                  {y: value[0].tahun + '-03', item1b: numeral(value[0].total_mar).format('0.0000'), item2b: numeral(value[1].total_mar).format('0.0000'), item3b: numeral(value[2].total_mar).format('0.0000')},
                  {y: value[0].tahun + '-04', item1b: numeral(value[0].total_apr).format('0.0000'), item2b: numeral(value[1].total_apr).format('0.0000'), item3b: numeral(value[2].total_apr).format('0.0000')},
                  {y: value[0].tahun + '-05', item1b: numeral(value[0].total_mei).format('0.0000'), item2b: numeral(value[1].total_mei).format('0.0000'), item3b: numeral(value[2].total_mei).format('0.0000')},
                  {y: value[0].tahun + '-06', item1b: numeral(value[0].total_jun).format('0.0000'), item2b: numeral(value[1].total_jun).format('0.0000'), item3b: numeral(value[2].total_jun).format('0.0000')},
                  {y: value[0].tahun + '-07', item1b: numeral(value[0].total_jul).format('0.0000'), item2b: numeral(value[1].total_jul).format('0.0000'), item3b: numeral(value[2].total_jul).format('0.0000')},
                  {y: value[0].tahun + '-08', item1b: numeral(value[0].total_agt).format('0.0000'), item2b: numeral(value[1].total_agt).format('0.0000'), item3b: numeral(value[2].total_agt).format('0.0000')},
                  {y: value[0].tahun + '-09', item1b: numeral(value[0].total_sep).format('0.0000'), item2b: numeral(value[1].total_sep).format('0.0000'), item3b: numeral(value[2].total_sep).format('0.0000')},
                  {y: value[0].tahun + '-10', item1b: numeral(value[0].total_okt).format('0.0000'), item2b: numeral(value[1].total_okt).format('0.0000'), item3b: numeral(value[2].total_okt).format('0.0000')},
                  {y: value[0].tahun + '-11', item1b: numeral(value[0].total_nop).format('0.0000'), item2b: numeral(value[1].total_nop).format('0.0000'), item3b: numeral(value[2].total_nop).format('0.0000')},
                  {y: value[0].tahun + '-12', item1b: numeral(value[0].total_des).format('0.0000'), item2b: numeral(value[1].total_des).format('0.0000'), item3b: numeral(value[2].total_des).format('0.0000')}
                ],
            xkey: 'y',
            ykeys: ['item1b', 'item2b', 'item3b'],
            labels: ['Target', 'Realisasi', 'Deviasi'],
            lineColors: ['#b9e0a0', '#a0d0e0', '#cddc39'],
            hideHover: 'auto',
            postUnits: ' %',
            xLabels : 'bulan'
          });
        }
      });
    });

    function changeYear() {
        var year = document.getElementById("selectYear").value;
        window.location.assign("http://ganeshaglobal.com/sippp/?tahun=" + year);
    }
  </script>
  <script type="text/javascript" src="<?=base_url('assets/js/pages/extra_trees.js')?>"></script>