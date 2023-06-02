<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit  
        <small>Data Penyakit</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=site_url('dashboard')?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?=site_url('tipe_kecanduan')?>">Data Penyakit</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Data Penyakit </h3>
        </div>
        <div class="box-body">
        <form  action="<?=site_url('tipe_kecanduan/edit')?>" method="post" class="form-horizontal">
          <div class="box-body">
            <div class="form-group">
              <label for="kode_gejala" class="col-sm-2 control-label">Kode Penyakit  </label>
              <div class="col-sm-10">
                <input type="hidden" class="form-control" name="id" value="<?= $row->id_penyakit ?>" readonly >
                <input type="text" class="form-control" name="kode_penyakit" value="<?= $row->kode_penyakit ?>" readonly >
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Nama Penyakit </label>
              <div class="col-sm-10">
                <input type="text" class="form-control"  name="nama_penyakit" value="<?= $row->nama_penyakit ?>"  required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Keterangan  </label>
              <div class="col-sm-10">
                <input type="text" class="form-control"  name="keterangan" value="<?= $row->keterangan ?>" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Solusi  </label>
              <div class="col-sm-10">
                <input type="text" class="form-control"  name="solusi" value="<?= $row->solusi ?>" required>
              </div>
            </div>
           
         
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-success btn-sm btn-flat"> <i class="fa fa-upload"></i> Update Data </button>
            <button type="submit" class="btn btn-primary btn-sm btn-flat"> <i class="fa fa-close"></i> Reset Data </button>
            <a href="<?=site_url('tipe_kecanduan')?>" class="btn btn-warning btn-sm btn-flat" > <i class="fa fa-undo"></i> Kembali</a>
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