<?php
  include 'header.php';
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kelola User
        <small>E-Pembangunan</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box box-danger">
            <div class="box-header with-border">
              <a style="margin-right: 5px;" href="#" class="btn btn-default"><i class="fa fa-user-plus text-green"></i> Tambah User</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 10px;">No</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Instansi</th>
                  <th>Role</th>
                  <th style="max-width: 55px;">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <input name='id' id='id' value='".$id."' type='hidden'>
                  <td>1.</td>
                  <td>Nyoman Swan</td>
                  <td>nyomanswan</td>
                  <td>Kesekretariatan Daerah</td>
                  <td>Admin</td>
                  <td>                  
                    <div class="btn-group">
                      <button type="button" data-toggle="tooltip" data-placement="left" title="Sunting" class="btn btn-default" onClick="">
                          <i class="fa fa-edit"></i>
                      </button>
                      <button type="button" data-toggle="tooltip" data-placement="left" title="Hapus" class="btn btn-danger" onClick="">
                          <i class="fa fa-trash"></i>
                      </button>
                    </div>
                  </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Role</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
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

    $(document).ready(function() {
      $('#user').addClass("active");
    });

  </script>

<?php
  include 'footer.php';
?>