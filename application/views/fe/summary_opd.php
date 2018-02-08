
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
              <div class="panel-heading">
                <h5 class="panel-title"><i class="icon-stats-growth mr-10"></i><strong>Progres Keuangan - <?=$nama_opd->Nm_Sub_Unit?></strong></h5>
                <div class="heading-elements">
                  <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                  </ul>
                </div>
              </div>
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
                              $kd_urusan = $this -> input -> get('kd_urusan');
                              $kd_bidang = $this -> input -> get('kd_bidang');
                              $kd_unit = $this -> input -> get('kd_unit');
                              $kd_sub = $this -> input -> get('kd_sub');
                            ?>
                            <option <?php if($tahun==2017) echo "selected"; ?> value="2017">2017</option>
                            <option <?php if($tahun==2018) echo "selected"; ?> value="2018">2018</option>
                            <input type="hidden" id="kd_urusan" value="<?=$kd_urusan?>">
                            <input type="hidden" id="kd_bidang" value="<?=$kd_bidang?>">
                            <input type="hidden" id="kd_unit" value="<?=$kd_unit?>">
                            <input type="hidden" id="kd_sub" value="<?=$kd_sub?>">
                        </select>
                      </div>
                    </div>
                  </form>
                </div>
                <?php 
                $getYear = $this -> input -> get('tahun');
                  if(isset($getYear)){
                    $tahun = $getYear;
                  }
                  else{
                    $tahun = date('Y');
                  }
                ?>
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
                        <th>Total (Rp.)</th>
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
                        <td><?=number_format($targetkeuangan->total_target, 0, ',', '.')?></td>
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
                        <td><?=number_format($realisasikeuangan->total_realisasi, 0, ',', '.')?></td>
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
                        <td><?=number_format($realisasikeuangan->total_realisasi-$targetkeuangan->total_target, 0, ',', '.')?></td>
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
                <h5 class="panel-title"><i class="icon-clipboard2 mr-10"></i><strong>Progres Fisik - <?=$nama_opd->Nm_Sub_Unit?></strong></h5>
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
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><span class="pill-green">Target</span></td>
                        <td><?=$tahun?></td>
                        <td><?=number_format($targetfisik->total_jan, 2, ',', '.') . "%"?></td>
                        <td><?=number_format($targetfisik->total_feb, 2, ',', '.') . "%"?></td>
                        <td><?=number_format($targetfisik->total_mar, 2, ',', '.')?></td>
                        <td><?=number_format($targetfisik->total_apr, 2, ',', '.') . "%"?></td>
                        <td><?=number_format($targetfisik->total_mei, 2, ',', '.') . "%"?></td>
                        <td><?=number_format($targetfisik->total_jun, 2, ',', '.') . "%"?></td>
                        <td><?=number_format($targetfisik->total_jul, 2, ',', '.') . "%"?></td>
                        <td><?=number_format($targetfisik->total_agt, 2, ',', '.') . "%"?></td>
                        <td><?=number_format($targetfisik->total_sep, 2, ',', '.') . "%"?></td>
                        <td><?=number_format($targetfisik->total_okt, 2, ',', '.') . "%"?></td>
                        <td><?=number_format($targetfisik->total_nop, 2, ',', '.') . "%"?></td>
                        <td><?=number_format($targetfisik->total_des, 2, ',', '.') . "%"?></td>
                        <td><?=number_format($targetfisik->total_target, 2, ',', '.') . "%"?></td>
                      </tr>
                      <tr>
                        <td><span class="pill-blue">Realisasi</span></td>
                        <td><?=$tahun?></td>
                        <td><?=number_format($realisasifisik->total_jan, 2, ',', '.') . "%"?></td>
                        <td><?=number_format($realisasifisik->total_feb, 2, ',', '.') . "%"?></td>
                        <td><?=number_format($realisasifisik->total_mar, 2, ',', '.') . "%"?></td>
                        <td><?=number_format($realisasifisik->total_apr, 2, ',', '.') . "%"?></td>
                        <td><?=number_format($realisasifisik->total_mei, 2, ',', '.') . "%"?></td>
                        <td><?=number_format($realisasifisik->total_jun, 2, ',', '.') . "%"?></td>
                        <td><?=number_format($realisasifisik->total_jul, 2, ',', '.') . "%"?></td>
                        <td><?=number_format($realisasifisik->total_agt, 2, ',', '.') . "%"?></td>
                        <td><?=number_format($realisasifisik->total_sep, 2, ',', '.') . "%"?></td>
                        <td><?=number_format($realisasifisik->total_okt, 2, ',', '.') . "%"?></td>
                        <td><?=number_format($realisasifisik->total_nop, 2, ',', '.') . "%"?></td>
                        <td><?=number_format($realisasifisik->total_des, 2, ',', '.') . "%"?></td>
                        <td><?=number_format($realisasifisik->total_realisasi, 2, ',', '.') . "%"?></td>
                      </tr>
                      <tr>
                        <td><span class="pill-yellow">Deviasi</span></td>
                        <td><?=$tahun?></td>
                        <td><?=number_format($realisasifisik->total_jan-$targetfisik->total_jan, 2, ',', '.') . "%"?></td>
                        <td><?=number_format($realisasifisik->total_feb-$targetfisik->total_feb, 2, ',', '.') . "%"?></td>
                        <td><?=number_format($realisasifisik->total_mar-$targetfisik->total_mar, 2, ',', '.') . "%"?></td>
                        <td><?=number_format($realisasifisik->total_apr-$targetfisik->total_apr, 2, ',', '.') . "%"?></td>
                        <td><?=number_format($realisasifisik->total_mei-$targetfisik->total_mei, 2, ',', '.') . "%"?></td>
                        <td><?=number_format($realisasifisik->total_jun-$targetfisik->total_jun, 2, ',', '.') . "%"?></td>
                        <td><?=number_format($realisasifisik->total_jul-$targetfisik->total_jul, 2, ',', '.') . "%"?></td>
                        <td><?=number_format($realisasifisik->total_agt-$targetfisik->total_agt, 2, ',', '.') . "%"?></td>
                        <td><?=number_format($realisasifisik->total_sep-$targetfisik->total_sep, 2, ',', '.') . "%"?></td>
                        <td><?=number_format($realisasifisik->total_okt-$targetfisik->total_okt, 2, ',', '.') . "%"?></td>
                        <td><?=number_format($realisasifisik->total_nop-$targetfisik->total_nop, 2, ',', '.') . "%"?></td>
                        <td><?=number_format($realisasifisik->total_des-$targetfisik->total_des, 2, ',', '.') . "%"?></td>
                        <td><?=number_format($realisasifisik->total_realisasi-$targetfisik->total_target, 2, ',', '.') . "%"?></td>
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
                <h5 class="panel-title"><i class="icon-stats-growth mr-10"></i><strong>Progres Keuangan Triwulan - <?=$nama_opd->Nm_Sub_Unit?></strong></h5>
                <div class="heading-elements">
                  <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                  </ul>
                </div>
              </div>
              <div class="panel-body">
                <div class="chart" id="line-chart3" style="height: 300px;"></div>
                <div class="table-responsive mt-30">
                  <table class="table">
                    <thead>
                      <tr class="table-gradient">
                        <th>Keterangan</th>
                        <th>Tahun</th>
                        <th>Triwulan 1</th>
                        <th>Triwulan 2</th>
                        <th>Triwulan 3</th>
                        <th>Triwulan 4</th>
                        <th>Total (Rp.)</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><span class="pill-green">Target</span></td>
                        <td><?=$tahun?></td>
                        <td><?=number_format($targetkeuangantriwulan->triwulan_1, 0, ',', '.')?></td>
                        <td><?=number_format($targetkeuangantriwulan->triwulan_2, 0, ',', '.')?></td>
                        <td><?=number_format($targetkeuangantriwulan->triwulan_3, 0, ',', '.')?></td>
                        <td><?=number_format($targetkeuangantriwulan->triwulan_4, 0, ',', '.')?></td>
                        <td><?=number_format($targetkeuangantriwulan->total_target, 0, ',', '.')?></td>
                      </tr>
                      <tr>
                        <td><span class="pill-blue">Realisasi</span></td>
                        <td><?=$tahun?></td>
                        <td><?=number_format($realisasikeuangantriwulan->triwulan_1, 0, ',', '.')?></td>
                        <td><?=number_format($realisasikeuangantriwulan->triwulan_2, 0, ',', '.')?></td>
                        <td><?=number_format($realisasikeuangantriwulan->triwulan_3, 0, ',', '.')?></td>
                        <td><?=number_format($realisasikeuangantriwulan->triwulan_4, 0, ',', '.')?></td>
                        <td><?=number_format($realisasikeuangantriwulan->total_realisasi, 0, ',', '.')?></td>
                      </tr>
                      <tr>
                        <td><span class="pill-yellow">Deviasi</span></td>
                        <td><?=$tahun?></td>
                        <td><?=number_format($realisasikeuangantriwulan->triwulan_1-$targetkeuangantriwulan->triwulan_1, 0, ',', '.')?></td>
                        <td><?=number_format($realisasikeuangantriwulan->triwulan_2-$targetkeuangantriwulan->triwulan_2, 0, ',', '.')?></td>
                        <td><?=number_format($realisasikeuangantriwulan->triwulan_3-$targetkeuangantriwulan->triwulan_3, 0, ',', '.')?></td>
                        <td><?=number_format($realisasikeuangantriwulan->triwulan_4-$targetkeuangantriwulan->triwulan_4, 0, ',', '.')?></td>
                        <td><?=number_format($realisasikeuangantriwulan->total_realisasi-$targetkeuangantriwulan->total_target, 0, ',', '.')?></td>
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
                <h5 class="panel-title"><i class="icon-clipboard2 mr-10"></i><strong>Progres Fisik Triwulan - <?=$nama_opd->Nm_Sub_Unit?></strong></h5>
                <div class="heading-elements">
                  <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                  </ul>
                </div>
              </div>
              <div class="panel-body">
                <div class="chart" id="line-chart4" style="height: 300px;"></div>
                <div class="table-responsive mt-30">
                  <table class="table">
                    <thead>
                      <tr class="table-gradient">
                        <th>Keterangan</th>
                        <th>Tahun</th>
                        <th>Triwulan 1</th>
                        <th>Triwulan 2</th>
                        <th>Triwulan 3</th>
                        <th>Triwulan 4</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><span class="pill-green">Target</span></td>
                        <td><?=$tahun?></td>
                        <td><?=number_format($targetfisiktriwulan->triwulan_1, 2, ',', '.') . " %"?></td>
                        <td><?=number_format($targetfisiktriwulan->triwulan_2, 2, ',', '.') . " %"?></td>
                        <td><?=number_format($targetfisiktriwulan->triwulan_3, 2, ',', '.') . " %"?></td>
                        <td><?=number_format($targetfisiktriwulan->triwulan_4, 2, ',', '.') . " %"?></td>
                        <td><?=number_format($targetfisiktriwulan->total_target, 2, ',', '.') . " %"?></td>
                      </tr>
                      <tr>
                        <td><span class="pill-blue">Realisasi</span></td>
                        <td><?=$tahun?></td>
                        <td><?=number_format($realisasifisiktriwulan->triwulan_1, 2, ',', '.') . " %"?></td>
                        <td><?=number_format($realisasifisiktriwulan->triwulan_2, 2, ',', '.') . " %"?></td>
                        <td><?=number_format($realisasifisiktriwulan->triwulan_3, 2, ',', '.') . " %"?></td>
                        <td><?=number_format($realisasifisiktriwulan->triwulan_4, 2, ',', '.') . " %"?></td>
                        <td><?=number_format($realisasifisiktriwulan->total_realisasi, 2, ',', '.') . " %"?></td>
                      </tr>
                      <tr>
                        <td><span class="pill-yellow">Deviasi</span></td>
                        <td><?=$tahun?></td>
                        <td><?=number_format($realisasifisiktriwulan->triwulan_1-$targetfisiktriwulan->triwulan_1, 2, ',', '.') . " %"?></td>
                        <td><?=number_format($realisasifisiktriwulan->triwulan_2-$targetfisiktriwulan->triwulan_2, 2, ',', '.') . " %"?></td>
                        <td><?=number_format($realisasifisiktriwulan->triwulan_3-$targetfisiktriwulan->triwulan_3, 2, ',', '.') . " %"?></td>
                        <td><?=number_format($realisasifisiktriwulan->triwulan_4-$targetfisiktriwulan->triwulan_4, 2, ',', '.') . " %"?></td>
                        <td><?=number_format($realisasifisiktriwulan->total_realisasi-$targetfisiktriwulan->total_target, 2, ',', '.') . " %"?></td>
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

  <!-- page script -->
  <script>
    $(document).ready(function(){
      "use strict";

      $("#beranda").addClass("active");

      // CHART 1
      $.getJSON( "<?=site_url('beranda/ajaxgetkeuanganopd/?tahun='.$tahun.'&kd_urusan='.$kd_urusan.'&kd_bidang='.$kd_bidang.'&kd_unit='.$kd_unit.'&kd_sub='.$kd_sub)?>")
      .done(function( data1 ) {
        if(data1 != false)
        {
          var value = data1.keuangan;
          
          var line = new Morris.Line({
            element: 'line-chart',
            resize: true,
            data: [
                  {y: value[0].Tahun + '-01', item1: numeral(value[0].total_jan).format('0.00'), item2: numeral(value[1].total_jan).format('0.00'), item3: numeral(value[2].total_jan).format('0.00')},
                  {y: value[0].Tahun + '-02', item1: numeral(value[0].total_feb).format('0.00'), item2: numeral(value[1].total_feb).format('0.00'), item3: numeral(value[2].total_feb).format('0.00')},
                  {y: value[0].Tahun + '-03', item1: numeral(value[0].total_mar).format('0.00'), item2: numeral(value[1].total_mar).format('0.00'), item3: numeral(value[2].total_mar).format('0.00')},
                  {y: value[0].Tahun + '-04', item1: numeral(value[0].total_apr).format('0.00'), item2: numeral(value[1].total_apr).format('0.00'), item3: numeral(value[2].total_apr).format('0.00')},
                  {y: value[0].Tahun + '-05', item1: numeral(value[0].total_mei).format('0.00'), item2: numeral(value[1].total_mei).format('0.00'), item3: numeral(value[2].total_mei).format('0.00')},
                  {y: value[0].Tahun + '-06', item1: numeral(value[0].total_jun).format('0.00'), item2: numeral(value[1].total_jun).format('0.00'), item3: numeral(value[2].total_jun).format('0.00')},
                  {y: value[0].Tahun + '-07', item1: numeral(value[0].total_jul).format('0.00'), item2: numeral(value[1].total_jul).format('0.00'), item3: numeral(value[2].total_jul).format('0.00')},
                  {y: value[0].Tahun + '-08', item1: numeral(value[0].total_agt).format('0.00'), item2: numeral(value[1].total_agt).format('0.00'), item3: numeral(value[2].total_agt).format('0.00')},
                  {y: value[0].Tahun + '-09', item1: numeral(value[0].total_sep).format('0.00'), item2: numeral(value[1].total_sep).format('0.00'), item3: numeral(value[2].total_sep).format('0.00')},
                  {y: value[0].Tahun + '-10', item1: numeral(value[0].total_okt).format('0.00'), item2: numeral(value[1].total_okt).format('0.00'), item3: numeral(value[2].total_okt).format('0.00')},
                  {y: value[0].Tahun + '-11', item1: numeral(value[0].total_nop).format('0.00'), item2: numeral(value[1].total_nop).format('0.00'), item3: numeral(value[2].total_nop).format('0.00')},
                  {y: value[0].Tahun + '-12', item1: numeral(value[0].total_des).format('0.00'), item2: numeral(value[1].total_des).format('0.00'), item3: numeral(value[2].total_des).format('0.00')}
                ],
            xkey: 'y',
            ykeys: ['item1', 'item2', 'item3'],
            labels: ['Target', 'Realisasi', 'Deviasi'],
            lineColors: ['#b9e0a0', '#a0d0e0', '#cddc39'],
            hideHover: 'auto',
            postUnits: ' juta',
            xLabels : 'bulan'
          });
        }
      });

      // CHART 2
      $.getJSON( "<?=site_url('beranda/ajaxgetfisikopd/?tahun='.$tahun.'&kd_urusan='.$kd_urusan.'&kd_bidang='.$kd_bidang.'&kd_unit='.$kd_unit.'&kd_sub='.$kd_sub)?>")
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

      // CHART 3
      $.getJSON( "<?=site_url('beranda/ajaxgetkeuangantriwulan/?tahun='.$tahun.'&kd_urusan='.$kd_urusan.'&kd_bidang='.$kd_bidang.'&kd_unit='.$kd_unit.'&kd_sub='.$kd_sub)?>")
      .done(function( data3 ) {
        if(data3 != false)
        {
          var value = data3.keuangan;
          
          var line3 = new Morris.Line({
            element: 'line-chart3',
            resize: true,
            data: [
                  {y: 'Triwulan 1', item1c: numeral(value[0].triwulan_1).format('0.00'), item2c: numeral(value[1].triwulan_1).format('0.00'), item3c: numeral(value[2].triwulan_1).format('0.00')},
                  {y: 'Triwulan 2', item1c: numeral(value[0].triwulan_2).format('0.00'), item2c: numeral(value[1].triwulan_2).format('0.00'), item3c: numeral(value[2].triwulan_2).format('0.00')},
                  {y: 'Triwulan 3', item1c: numeral(value[0].triwulan_3).format('0.00'), item2c: numeral(value[1].triwulan_3).format('0.00'), item3c: numeral(value[2].triwulan_3).format('0.00')},
                  {y: 'Triwulan 4', item1c: numeral(value[0].triwulan_4).format('0.00'), item2c: numeral(value[1].triwulan_4).format('0.00'), item3c: numeral(value[2].triwulan_4).format('0.00')}
                ],
            parseTime : false,
            xkey: 'y',
            ykeys: ['item1c', 'item2c', 'item3c'],
            labels: ['Target', 'Realisasi', 'Deviasi'],
            lineColors: ['#b9e0a0', '#a0d0e0', '#cddc39'],
            hideHover: 'auto',
            postUnits: ' juta',
            xLabels : 'bulan'
          });
        }
      });

      // CHART 4
      $.getJSON( "<?=site_url('beranda/ajaxgetfisiktriwulan/?tahun='.$tahun.'&kd_urusan='.$kd_urusan.'&kd_bidang='.$kd_bidang.'&kd_unit='.$kd_unit.'&kd_sub='.$kd_sub)?>")
      .done(function( data4 ) {
        if(data4 != false)
        {
          var value = data4.fisik;
          
          var line4 = new Morris.Line({
            element: 'line-chart4',
            resize: true,
            data: [
                  {y: value[0].tahun + '-01', item1d: numeral(value[0].total_jan).format('0.0000'), item2d: numeral(value[1].total_jan).format('0.0000'), item3d: numeral(value[2].total_jan).format('0.0000')},
                  {y: value[0].tahun + '-02', item1d: numeral(value[0].total_feb).format('0.0000'), item2d: numeral(value[1].total_feb).format('0.0000'), item3d: numeral(value[2].total_feb).format('0.0000')},
                  {y: value[0].tahun + '-03', item1d: numeral(value[0].total_mar).format('0.0000'), item2d: numeral(value[1].total_mar).format('0.0000'), item3d: numeral(value[2].total_mar).format('0.0000')},
                  {y: value[0].tahun + '-04', item1d: numeral(value[0].total_apr).format('0.0000'), item2d: numeral(value[1].total_apr).format('0.0000'), item3d: numeral(value[2].total_apr).format('0.0000')},
                  {y: value[0].tahun + '-05', item1d: numeral(value[0].total_mei).format('0.0000'), item2d: numeral(value[1].total_mei).format('0.0000'), item3d: numeral(value[2].total_mei).format('0.0000')},
                  {y: value[0].tahun + '-06', item1d: numeral(value[0].total_jun).format('0.0000'), item2d: numeral(value[1].total_jun).format('0.0000'), item3d: numeral(value[2].total_jun).format('0.0000')},
                  {y: value[0].tahun + '-07', item1d: numeral(value[0].total_jul).format('0.0000'), item2d: numeral(value[1].total_jul).format('0.0000'), item3d: numeral(value[2].total_jul).format('0.0000')},
                  {y: value[0].tahun + '-08', item1d: numeral(value[0].total_agt).format('0.0000'), item2d: numeral(value[1].total_agt).format('0.0000'), item3d: numeral(value[2].total_agt).format('0.0000')},
                  {y: value[0].tahun + '-09', item1d: numeral(value[0].total_sep).format('0.0000'), item2d: numeral(value[1].total_sep).format('0.0000'), item3d: numeral(value[2].total_sep).format('0.0000')},
                  {y: value[0].tahun + '-10', item1d: numeral(value[0].total_okt).format('0.0000'), item2d: numeral(value[1].total_okt).format('0.0000'), item3d: numeral(value[2].total_okt).format('0.0000')},
                  {y: value[0].tahun + '-11', item1d: numeral(value[0].total_nop).format('0.0000'), item2d: numeral(value[1].total_nop).format('0.0000'), item3d: numeral(value[2].total_nop).format('0.0000')},
                  {y: value[0].tahun + '-12', item1d: numeral(value[0].total_des).format('0.0000'), item2d: numeral(value[1].total_des).format('0.0000'), item3d: numeral(value[2].total_des).format('0.0000')}
                ],
            xkey: 'y',
            ykeys: ['item1d', 'item2d', 'item3d'],
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
        var kd_urusan = document.getElementById("kd_urusan").value;
        var kd_bidang = document.getElementById("kd_bidang").value;
        var kd_unit = document.getElementById("kd_unit").value;
        var kd_sub = document.getElementById("kd_sub").value;
        window.location.assign("http://e-pembangunan.badungkab.go.id/beranda/opd/?tahun=" + year + "&kd_urusan=" + kd_urusan + "&kd_bidang=" + kd_bidang + "&kd_unit=" + kd_unit + "&kd_sub=" + kd_sub);
    }
  </script>
  <script type="text/javascript" src="<?=base_url('assets/js/pages/extra_trees.js')?>"></script>