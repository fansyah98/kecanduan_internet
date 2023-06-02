<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detail
        <small>Tipe Kecanduan / Penyakit </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?=site_url('tipe_kecanduan')?>">Data Kecanduan</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Detail tipe kecanduan <span class="btn btn-info btn-sm"><?= $row->keterangan ?></span></h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-hover ">
                <tr>
                    <th>Kode Penyakit</th>
                    <td><?= $row->kode_penyakit ?></td>
                </tr>
                <tr>
                    <th>Nama Penyakit</th>
                    <td><?= $row->nama_penyakit ?></td>
                </tr>
                <tr>
                    <th>Keterangan</th>
                    <td><?= $row->keterangan ?></td>
                </tr>
                <tr>
                    <th>Solusi</th>
                    <td><?= $row->solusi ?></td>
                </tr>
            
                <tr>
                    <th> <a href="<?=site_url('tipe_kecanduan')?>" class="btn btn-warning btn-sm ">Kembali</a></th>
                    <td> <a href="" class="btn btn-info btn-sm ">Cetak</a></td>
                </tr>

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