<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data
        <small>Basis Aturan Pakar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=site_url('dashboard')?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?=site_url('aturan')?>">Data Basis Aturan</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php  $this->load->view('message'); ?>

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Data  Basis Aturan Pakar</h3>

          <div class="box-tools pull-right">
            <a href="<?=site_url('aturan/add')?>" class="btn btn-success btn-flat btn-sm"><i class="fa fa-plus"></i> Tambah Data Basis Aturan </a> 
          </div>
        </div>
        <div class="box-body">
        <table class="table table-bordered table-hover table-responsive" id="table2" width="100%">
        <thead class="bg-red"> 
            <tr>
                <th style="width: 1%;">No </th>
                <th style="width: 6%;">Nama penyakit </th>
                <th style="width: 25%;" class="text-center">Nama gejala</th>
                <th style="width: 3%;">Nilai</th>
                <th style="width: 7%;" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
          <tr>
          <?php 
               $no = 1; 
               foreach ($row->result() as $key => $value) { ?>
               <td><?= $no++ ?></td>
               <td>[<?= $value->kode_penyakit ?>] <?= $value->nama_penyakit ?> </td>
               <td>[<?= $value->kode_gejala ?>] <?= $value->nama_gejala ?> </td>
               <td> <?= $value->probabilitas ?> </td>
               <td>
                <a href="<?=site_url('aturan/edit/' . $value->id_rule)?>" class="btn btn-success btn-sm btn-flat btn "><i class="fa fa-pencil"></i>Ubah </a>
                <a href="<?=site_url('aturan/del/' . $value->id_rule)?>" class="btn btn-warning btn-sm btn-flat btn "><i class="fa fa-trash"></i>Hapus </a>
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