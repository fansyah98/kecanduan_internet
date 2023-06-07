<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah 
        <small>Data Gejala</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=site_url('dashboard')?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?=site_url('gejala')?>">Data Gejala</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Data Gejala </h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
        <form  action="<?=site_url('gejala/add')?>" method="post" class="form-horizontal">
          <div class="box-body">
           
            <div class="form-group">
              <label for="kode_gejala" class="col-sm-2 control-label">Kode Gejala</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="kode_gejala" value="" >
              </div>
            </div>
            <!-- <div class="form-group">
              <label for="kode_gejala" class="col-sm-2 control-label">Penyakit </label>
              <div class="col-sm-10">
                <select name="penyakit" id=""  class="form-control" >
                    <option value="">-- Pilih Data --</option>
                    <?php 
                     foreach($row->result() as $key => $data) { ?>
                    <option value="<?= $data->id_penyakit?>">[<?= $data->kode_penyakit?>]  <?= $data->nama_penyakit?></option>

                     <?php }?>
                </select>
              </div>
            </div> -->
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Nama Gejala </label>
              <div class="col-sm-10">
                <input type="text" class="form-control"  name="nama_gejala"  required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Bobot  </label>
              <div class="col-sm-10">
                <input type="text" class="form-control"  name="probabilitas"  required>
              </div>
            </div>   
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary btn-sm btn-flat"> <i class="fa fa-upload"></i> Tambah Data </button>
            <a href="<?=site_url('gejala')?>" class="btn btn-warning btn-sm btn-flat" > <i class="fa fa-undo"></i> Kembali</a>
        </div>
        </form>   
        </div>
        <!-- /.box-body -->
        <!-- <div class="box-footer">
          Footer
        </div> -->
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->