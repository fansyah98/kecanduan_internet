<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Rekap  
        <small> Konsultasi Pasien</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=site_url('dashboard')?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?=site_url('dashboard/rekap_konsultasi')?> ">Data Konsultasi</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <?php  $this->load->view('message'); ?>

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Data Rekap Konsultasi </h3>

          
        </div>
        <div class="box-body">
        <table class="table table-bordered table-hover table-responsive" id="table2">
                <thead class="bg-red">
                    <tr>
                        <th style="width: 3%;">No </th>
                        <th style="width: 13%;">Nama Pasien </th>
                        <th>Penyakit</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Hasil Probabilitas</th>
                   </tr>
                </thead>
                <tbody>
                    <tr >
                        <?php
                        $no = 1;
                        foreach ($row->result() as $kamu => $data) { ?>
                            <td><?= $no++ ?></td>
                            <td><?= $data->user ?></td>
                            <td><?= $data->penyakit?></td>
                            <td><?= $data->tanggal?></td>
                            <td><?= $data->waktu?></td>
                            <td><?= $data->hasil_probabilitas	?></td>
                           
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