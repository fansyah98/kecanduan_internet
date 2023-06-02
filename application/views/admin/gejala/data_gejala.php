<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Gejala
        <small>Kecanduan Internet</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=site_url('dashboard')?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?=site_url('gejala')?> ">Data Gejala</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <?php  $this->load->view('message'); ?>

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Data Gejala </h3>

          <div class="box-tools pull-right">
            <a href="<?=site_url('gejala/add')?>" class="btn btn-success btn-flat btn-sm"><i class="fa fa-plus"></i> Tambah Data Gejala </a>
         
          </div>
          
        </div>
        <div class="box-body">
        <table class="table table-bordered table-hover table-responsive" id="table2">
                <thead class="bg-red">
                    <tr>
                        <th style="width: 3%;">No </th>
                        <th style="width: 13%;">Kode </th>
                        <th>Nama Gejala</th>
                        <th>Nilai</th>
                        <th style="width: 9%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr >
                        <?php
                        $no = 1;
                        foreach ($row->result() as $kamu => $data) { ?>
                            <td><?= $no++ ?></td>
                            <td><?= $data->kode_gejala ?></td>
                            <td><?= $data->nama_gejala?></td>
                            <td><?= $data->nilai?></td>
                            <td >
                              <a href="<?=site_url('gejala/edit/' . $data->id_gejala)?>" class="btn btn-sm btn-flat btn-success"><i class="fa fa-pencil"></i></a>
                              <a href="<?=site_url('gejala/del/' . $data->id_gejala )?>" class="btn btn-sm btn-flat btn-warning" onclick="return confirm('Yaki data dihapus !!!')"><i class="fa fa-trash"></i></a>
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