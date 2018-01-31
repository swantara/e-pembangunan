<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-Pembangunan Kabupaten Badung</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Favicons -->
  <link rel="shortcut icon" href="<?=base_url('assets/be/dist/img/favicon.png')?>">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url('assets/be/bower_components/bootstrap/dist/css/bootstrap.min.css')?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url('assets/be/bower_components/font-awesome/css/font-awesome.min.css')?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url('assets/be/bower_components/Ionicons/css/ionicons.min.css')?>">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?=base_url('assets/be/bower_components/jvectormap/jquery-jvectormap.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('assets/be/dist/css/AdminLTE.min.css')?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url('assets/be/dist/css/skins/_all-skins.css')?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url('assets/be/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')?>">
  <!-- jQuery 3 -->
  <script src="<?=base_url('assets/be/bower_components/jquery/dist/jquery.min.js')?>"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="<?=site_url('backend')?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SIPPP</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SIPPP</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img 
                <?php if($this->session->userdata('session')['foto']!=""): ?> src="<?php echo base_url() . 'assets/images/user/' . $this->session->userdata('session')['foto']?>"
                <?php else : ?> src="<?=base_url()?>assets/images/no-image-square.jpg"
                <?php endif; ?>
                class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata('session')['name'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img
                  <?php if($this->session->userdata('session')['foto']!=""): ?> src="<?php echo base_url() . 'assets/images/user/' . $this->session->userdata('session')['foto']?>"
                  <?php else : ?> src="<?=base_url()?>assets/images/no-image-square.jpg"
                  <?php endif; ?>
                  class="img-circle" alt="User Image">

                <p>
                  <?php echo $this->session->userdata('session')['name'];?>
                  <small>
                    <?php
                      echo $this->session->userdata('session')['opd'];
                    ?>
                  </small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?=site_url('user/editprofile/'.$this->session->userdata('session')['user_id'])?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a onclick="return confirm('Pilih OK untuk melanjutkan.')" href="<?=site_url('login/logout')?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img 
            <?php if($this->session->userdata('session')['foto']!=""): ?> src="<?php echo base_url() . 'assets/images/user/' . $this->session->userdata('session')['foto']?>"
            <?php else : ?> src="<?=base_url()?>assets/images/no-image-square.jpg"
            <?php endif; ?>
            class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('session')['name'];?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php
        $getYear = $this -> input -> get('tahun');
        if(isset($getYear)){
          $tahun = $getYear;
        }
        else{
          $tahun = date('Y');
        }
      ?>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li id="dashboard">
          <a href="<?=site_url('backend/?tahun='.$tahun)?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li id="rask">
          <a href="#">
            <i class="fa fa-institution"></i> <span>RASK</span>
          </a>
        </li>
        <li id="kontrak">
          <a href="#">
            <i class="fa fa-copy"></i> <span>Kontrak</span>
          </a>
        </li>
        <li id="realisasikeuangan">
          <a href="#">
            <i class="fa fa-bar-chart"></i> <span>Realisasi Keuangan</span>
          </a>
        </li>
        <li id="realisasifisik">
          <a href="#">
            <i class="fa fa-line-chart"></i> <span>Realisasi Fisik</span>
          </a>
        </li>
        <li id="pelaporanfisik">
          <a href="#">
            <i class="fa fa-file-text-o"></i> <span>Pelaporan Fisik</span>
          </a>
        </li>
        <!-- <li id="rask">
          <a href="<?=site_url('backend/rask/?tahun='.$tahun)?>">
            <i class="fa fa-institution"></i> <span>RASK</span>
          </a>
        </li>
        <li id="kontrak">
          <a href="<?=site_url('backend/kontrak/?tahun='.$tahun)?>">
            <i class="fa fa-copy"></i> <span>Kontrak</span>
          </a>
        </li>
        <li id="realisasikeuangan">
          <a href="<?=site_url('backend/realisasikeuangan/?tahun='.$tahun)?>">
            <i class="fa fa-bar-chart"></i> <span>Realisasi Keuangan</span>
          </a>
        </li>
        <li id="realisasifisik">
          <a href="<?=site_url('backend/realisasifisik/?tahun='.$tahun)?>">
            <i class="fa fa-line-chart"></i> <span>Realisasi Fisik</span>
          </a>
        </li>
        <li id="pelaporanfisik">
          <a href="<?=site_url('backend/pelaporanfisik/?tahun='.$tahun)?>">
            <i class="fa fa-file-text-o"></i> <span>Pelaporan Fisik</span>
          </a>
        </li> -->
        <li id="user">
          <a href="<?=site_url('user')?>">
            <i class="fa fa-users"></i> <span>Kelola User</span>
          </a>
        </li>
        <li class="header">FRONT END</li>
        <li><a href="<?=site_url('')?>"><i class="fa fa-home text-green"></i> <span>Halaman Utama</span></a></li>
        <li class="header">SIGN OUT</li>
        <li><a onclick="return confirm('Pilih OK untuk melanjutkan.')" href="<?=site_url('login/logout')?>"><i class="fa fa-power-off text-red"></i> <span>Sign Out</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <?=$body?>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0 b
    </div>
    <strong>Copyright &copy; 2017 <a href="#">Sekretariat Daerah Kabupaten Badung</a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url('assets/be/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<!-- DataTables -->
<script src="<?=base_url('assets/be/bower_components/datatables.net/js/jquery.dataTables.min.js')?>"></script>
<script src="<?=base_url('assets/be/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')?>"></script>
<!-- FastClick -->
<script src="<?=base_url('assets/be/bower_components/fastclick/lib/fastclick.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('assets/be/dist/js/adminlte.min.js')?>"></script>
<!-- Sparkline -->
<script src="<?=base_url('assets/be/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')?>"></script>
<!-- jvectormap  -->
<script src="<?=base_url('assets/be/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')?>"></script>
<script src="<?=base_url('assets/be/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')?>"></script>
<!-- SlimScroll -->
<script src="<?=base_url('assets/be/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')?>"></script>
<!-- ChartJS -->
<script src="<?=base_url('assets/be/bower_components/Chart.js/Chart.js')?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?=base_url('assets/be/dist/js/pages/dashboard2.js')?>"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url('assets/be/dist/js/demo.js')?>"></script>
</body>
</html>