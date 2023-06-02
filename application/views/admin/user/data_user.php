<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data 
        <small>Account User</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=site_url('dashboard')?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?=site_url('user')?>">Data User</a></li>
      </ol>
    </section>
  <?php $this->load->view('message'); ?>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Data User</h3>

        
        </div>
        <div class="box-body">
        <table class="table table-bordered table-hover table-responsive" id="table2" width="100%">
                <thead class="bg-red"> 
                    <tr>
                        <th style="width: 1%;">No </th>
                        <th style="width: 5%;">Nama </th>
                        <th style="width: 2%;" class="text-center">Username</th>
                        <th style="width: 6%;">Alamat</th>
                        <th style="width: 6%;" class="text-center">Role</th>
                        <th style="width: 7%;" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $no = 1;
                        foreach ($row->result() as $kamu => $data) { ?>
                            <td><?= $no++ ?></td>
                            <td><?= $data->name?></td>
                            <td><?= $data->username?></td>
                            <td><?= $data->alamat?></td>
                            <td><?php if($data->level == 1 ) {
                                echo 'Pakar';
                            }elseif($data->level == 2 ) {
                               echo 'Pasien ';
                            }?></td>
                            <td class="text-center">
                                <form action="<?= site_url('user/del/' . $data->user_id) ?>" method="POST">
                                    <input type="hidden" name="user_id" value="<?= $data->user_id ?>">
                                    <button class="btn btn-primary btn-sm btn-flat" onclick="return confirm('Yakin Data Di Hapuss!!')"><i class="fa fa-trash"> </i></button>
                                    <a href="<?= site_url('user/edit/' . $data->user_id) ?>" class="btn btn-success btn-sm btn-flat"><i class="fa fa-pencil "></i></a>
                                </form>
                            </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->