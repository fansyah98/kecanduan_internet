<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Konsultasi 
        <small>Pasien</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=site_url('dashboard')?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?=site_url('dashboard')?>"> Konsultasi</a></li>
      </ol>
    </section>

    

    <!-- Main content -->
    <section class="content">

    <div class="callout callout-info">
      <h4> Selamat Datang  <?= $this->fungsi->user_login()->name ?></h4>
       <p class="text-justify">Silakan centang gejala di yang sudah disediakan oleh dan centang lah berdasrkan gejala yang dialami </p>
    </div>
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Konsultasi Pasien</h3>

        </div>
        <div class="box-body">
           <form action="<?=site_url('konsultasi/hasil')?>" method="POST">
           <table class="table table-bordered table-hover table-responsive" >
                    <thead class="bg-red">
                        <tr>
                            <th style="width: 3%;">No </th>
                            <th>Daftar Gejala</th>
                            <th style="width: 9%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr >
                            <?php
                            $no = 1;
                            foreach ($row->result() as $kamu => $data) { ?>
                                <td><?= $no++ ?></td>
                                <td><?= $data->nama_gejala?></td>
                                <td>
                                    <input id="<?= $data->id_gejala ?>" name="gejala[]" value="<?= $data->id_gejala ?>" type="checkbox" />
                            </td>        
                        </tr>
                    <?php } ?>
                    </tbody>
              </table>
                <button type="submit" class="btn btn-success btn-sm"> <i class="fa fa-upload"></i> Upload Diagnosa</button>
                <button type="reset" class="btn btn-warning btn-sm"> <i class="fa fa-close"></i> Reset Diagnosa</button>
        </form>
        </div>
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