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
          <h3 class="box-title">Edit Data Gejala </h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
        <form  action="<?=site_url('gejala/edit')?>" method="post" class="form-horizontal">
          <div class="box-body">
            <div class="form-group">
              <label for="kode_gejala" class="col-sm-2 control-label">Kode Gejala</label>
              <div class="col-sm-10">
                <input type="hidden" class="form-control" name="id" value="<?=  $row->id_gejala ?>" readonly>
                <input type="text" class="form-control" name="kode_gejala" value="<?=  $row->kode_gejala ?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Nama Gejala </label>
              <div class="col-sm-10">
                <input type="text" class="form-control"  name="nama_gejala" value="<?=$row->nama_gejala ?>"   >
              </div>
            </div>
            <!-- <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Kecanduan  </label>
              <div class="col-sm-10">
              <//?php// echo form_dropdown('penyakit', $penyakit, $selectedpenyakit, ['class' => 'form-control', 'required' => 'required']) ?>

            </div> -->

            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Bobot </label>
              <div class="col-sm-10">
                <input type="text" class="form-control"  name="probabilitas" value="<?=  $row->nilai ?>" >
              </div>
            </div>   
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary btn-sm btn-flat"> <i class="fa fa-upload"></i> Update Data </button>
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