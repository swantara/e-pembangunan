<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIPPP Kab Badung</title>

  <!-- Favicons -->
  <link rel="shortcut icon" href="<?=base_url('assets/images/favicon.png')?>">

  <!-- Global stylesheets -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
  <link href="<?=base_url('assets/css/icons/icomoon/styles.css')?>" rel="stylesheet" type="text/css">
  <link href="<?=base_url('assets/css/bootstrap.css')?>" rel="stylesheet" type="text/css">
  <link href="<?=base_url('assets/css/core.css')?>" rel="stylesheet" type="text/css">
  <link href="<?=base_url('assets/css/components.css')?>" rel="stylesheet" type="text/css">
  <link href="<?=base_url('assets/css/colors.css')?>" rel="stylesheet" type="text/css">
  <link href="<?=base_url('assets/css/style.css')?>" rel="stylesheet" type="text/css">
  <link href="<?=base_url('assets/css/morris.css')?>" rel="stylesheet" type="text/css">
  <!-- /global stylesheets -->

  <!-- Core JS files -->
  <script type="text/javascript" src="<?=base_url('assets/js/plugins/loaders/pace.min.js')?>"></script>
  <script type="text/javascript" src="<?=base_url('assets/js/core/libraries/jquery.min.js')?>"></script>
  <script type="text/javascript" src="<?=base_url('assets/js/core/libraries/bootstrap.min.js')?>"></script>
  <script type="text/javascript" src="<?=base_url('assets/js/plugins/loaders/blockui.min.js')?>"></script>
  <script type="text/javascript" src="<?=base_url('assets/js/plugins/ui/nicescroll.min.js')?>"></script>
  <script type="text/javascript" src="<?=base_url('assets/js/plugins/ui/drilldown.js')?>"></script>
  <!-- /core JS files -->

  <!-- Theme JS files -->
  <script type="text/javascript" src="<?=base_url('assets/js/core/libraries/jquery_ui/core.min.js')?>"></script>
  <script type="text/javascript" src="<?=base_url('assets/js/core/libraries/jquery_ui/effects.min.js')?>"></script>
  <script type="text/javascript" src="<?=base_url('assets/js/core/libraries/jquery_ui/interactions.min.js')?>"></script>
  <script type="text/javascript" src="<?=base_url('assets/js/plugins/extensions/cookie.js')?>"></script>
  <script type="text/javascript" src="<?=base_url('assets/js/plugins/visualization/d3/d3.min.js')?>"></script>
  <script type="text/javascript" src="<?=base_url('assets/js/plugins/visualization/d3/d3_tooltip.js')?>"></script>
  <script type="text/javascript" src="<?=base_url('assets/js/plugins/forms/styling/uniform.min.js')?>"></script>
  <script type="text/javascript" src="<?=base_url('assets/js/plugins/forms/selects/bootstrap_multiselect.js')?>"></script>
  <script type="text/javascript" src="<?=base_url('assets/js/plugins/ui/moment/moment.min.js')?>"></script>
  <script type="text/javascript" src="<?=base_url('assets/js/plugins/pickers/daterangepicker.js')?>"></script>

  <!-- Fancy Tree -->
  <script type="text/javascript" src="<?=base_url('assets/js/plugins/trees/fancytree_all.min.js')?>"></script>
  <script type="text/javascript" src="<?=base_url('assets/js/plugins/trees/fancytree_childcounter.js')?>"></script>

  <script type="text/javascript" src="<?=base_url('assets/js/core/app.js')?>"></script>
  <script type="text/javascript" src="<?=base_url('assets/js/raphael-min.js')?>"></script>
  <script type="text/javascript" src="<?=base_url('assets/js/morris-min.js')?>"></script>
  <script type="text/javascript" src="<?=base_url('assets/js/plugins/tables/datatables/datatables.min.js')?>"></script>
  <!-- /theme JS files -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>

</head>

<body>

  <!-- Main navbar -->
  <div class="navbar navbar-default navbar-fixed-top">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?=site_url('')?>"><img src="<?=base_url('assets/images/logo.png')?>" alt=""></a>
    </div>
    <ul class="nav navbar-nav no-border visible-xs-block">
      <li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second-toggle"><i class="icon-menu7"></i></a></li>
    </ul>

    <div class="navbar-collapse collapse" id="navbar-second-toggle">
      <ul class="nav navbar-nav navbar-right">
        <?php
          $getYear = $this -> input -> get('tahun');
          if(isset($getYear)){
            $tahun = $getYear;
          }
          else{
            $tahun = date('Y');
          }
        ?>
        <li id="beranda"><a href="<?=site_url('beranda/?tahun='.$tahun)?>"><i class="icon-home2 position-left"></i> Beranda</a></li>
        <li id="rask"><a href="<?=site_url('rask/?tahun='.$tahun)?>"><i class="icon-design position-left"></i> RASK</a></li>
        <li id="kontrak"><a href="<?=site_url('kontrak/?tahun='.$tahun)?>"><i class="icon-versions position-left"></i> Kontrak</a></li>
        <li id="realisasi-keuangan"><a href="<?=site_url('realisasikeuangan/?tahun='.$tahun)?>"><i class="icon-stats-growth position-left"></i> Realisasi Keuangan</a></li>
        <li id="realisasi-fisik"><a href="<?=site_url('realisasifisik/?tahun='.$tahun)?>"><i class="icon-clipboard2 position-left"></i> Realisasi Fisik</a></li>
        <!-- <li id="realisasi" class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="icon-statistics position-left"></i> Realisasi <span class="caret"></span>
          </a>
          <ul class="dropdown-menu width-200">
            <li id="keuangan"><a href="realisasi-keuangan.php"><i class="icon-clipboard2"></i> Realisasi Keuangan</a></li>
            <li id="grafik-keuangan"><a href="grafik-realisasi-keuangan.php"><i class="icon-stats-growth"></i> Grafik Realisasi Keuangan</a></li>
            <li id="fisik"><a href="realisasi-fisik.php"><i class="icon-clipboard2"></i> Realisasi Fisik</a></li>
            <li id="grafik-fisik"><a href="grafik-realisasi-fisik.php"><i class="icon-stats-growth"></i> Grafik Realisasi Fisik</a></li>
          </ul>
        </li> -->
        <li><a href="http://lpse.badungkab.go.id/" target="_blank"><i class="icon-link2 position-left"></i> LPSE</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="icon-link2 position-left"></i> ROPK <span class="caret"></span>
          </a>
          <ul class="dropdown-menu width-200">
            <li><a href="http://ropk.badungkab.go.id" target="_blank"><i class="icon-enter"></i> Halaman Utama</a></li>
            <li><a href="http://ropk.badungkab.go.id/app/realisasiopd/opd" target="_blank"><i class="icon-enter"></i> Realisasi Perangkat Daerah</a></li>
          </ul>
        </li>
        <li id="login" class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="icon-user position-left"></i> Login <span class="caret"></span>
          </a>
          <ul class="dropdown-menu width-200">
            <li id="user"><a href="<?=site_url('login')?>"><i class="icon-enter"></i> Masuk Ke Aplikasi</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
  <!-- /second navbar -->

  <?=$body?>
  
  <script type="text/javascript" src="<?=base_url('assets/js/pages/dashboard.js')?>"></script>
  <script type="text/javascript" src="<?=base_url('assets/js/plugins/forms/styling/switchery.min.js')?>"></script>

  <!-- Footer -->
  <div class="footer text-muted">
    &copy; 2017. <a href="#">Sekretariat Daerah Kabupaten Badung</a>
  </div>
  <!-- /footer -->

</body>
</html>