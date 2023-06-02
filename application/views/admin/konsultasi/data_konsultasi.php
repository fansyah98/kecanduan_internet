<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data
        <small>Hasil Konsultasi</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=site_url('dashboard')?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?=site_url('aturan')?>">Hasil Konsultasi</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php  $this->load->view('message'); ?>

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Hasil Konsultasi</h3>
        </div>
        <div class="box-body">
        <table class="table table-bordered table-hover table-responsive" id="table2" width="100%">
        <thead class="bg-red"> 
            <tr>
                <th style="width: 1%;">No </th>
                <th style="width: 3%;">Pasien  </th>
                <th style="width: 3%;" class="text-center">Penyakit</th>
                <th style="width: 3%;">Tanggal </th>
                <th style="width: 3%;">Waktu </th>
                <th style="width: 3%;">Nilai Probabilitas </th>
                <th style="width: 3%;">Aksi </th>
            </tr>
        </thead>
        <tbody>
          <tr>
            <?php 
               $no = 1; 
               foreach ($row->result() as $key => $value) { ?>
               <td><?= $no++ ?></td>
               <td><?= $value->user ?> </td>
               <td><?= $value->penyakit ?> </td>
               <td> <?= $value->tanggal ?> </td>
               <td> <?= $value->waktu ?> </td>
               <td> <?= $value->hasil_probabilitas	 ?> </td>
               <td> 
                <a href="" class="btn btn-success btn-sm"> <i class="fa fa-print"></i> Cetak </a>
                <a href="<?=site_url('konsultasi/del/'. $value->id_hasil)?>" class="btn btn-warning btn-sm"> <i class="fa fa-trash"></i> Hapus  </a>
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