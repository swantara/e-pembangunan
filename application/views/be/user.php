
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
              <a style="margin-right: 5px;" href="<?=site_url('user/tambah')?>" class="btn btn-default"><i class="fa fa-user-plus text-green"></i> Tambah User</a>
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
                  <th style="width: 94px;">Aksi</th>
                </tr>
                </thead>
                <tbody>

                <?php
                  if(is_object($user) || is_array($user)) :
                    $no = 1;
                    foreach ($user as $row) :
                ?>

                <tr>
                  <td><?=$no?></td>
                  <td><?=$row->nama?></td>
                  <td><?=$row->username?></td>
                  <td>
                    <?php                      
                      foreach ($nama_opd as $rowB) :
                        if($row->kd_urusan == $rowB->kd_urusan && $row->kd_bidang == $rowB->kd_bidang && $row->kd_unit == $rowB->kd_unit && $row->kd_sub == $rowB->kd_sub) :
                          echo $rowB->nama;
                        endif;
                      endforeach;
                    ?>
                  </td>
                  <td><?=$row->role_user?></td>
                  <td>                  
                    <div class="btn-group">
                      <a data-toggle="tooltip" data-placement="left" title="Sunting" class="btn btn-default" href="<?=site_url('user/edit/'.$row->id)?>">
                          <i class="fa fa-edit"></i>
                      </a>
                      <a data-toggle="tooltip" data-placement="left" title="Sunting" class="btn btn-danger" href="<?=site_url('user/hapus/'.$row->id)?>">
                          <i class="fa fa-trash"></i>
                      </a>
                    </div>
                  </td>
                </tr>

                <?php
                    $no ++;
                    endforeach;
                  endif;
                ?>

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