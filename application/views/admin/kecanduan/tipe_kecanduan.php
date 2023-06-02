<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data
        <small>Tipe Kecanduan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=site_url('dashboard')?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?=site_url('tipe_kecanduan')?>">Data Kecanduan</a></li>
      </ol>
    </section>


    
    
    <!-- Main content -->
    <section class="content">
      <?php  $this->load->view('message'); ?>

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Data Tipe Kecanduan / Penyakit</h3>

          <div class="box-tools pull-right">
            <a href="<?=site_url('tipe_kecanduan/add')?>" class="btn btn-success btn-flat btn-sm"><i class="fa fa-plus"></i> Tambah Data Penyakit </a> 
          </div>
        </div>
        <div class="box-body">
        <table class="table table-bordered table-hover table-responsive" id="table2" width="100%">
                <thead class="bg-red"> 
                    <tr>
                        <th style="width: 1%;">No </th>
                        <th style="width: 1%;">Kode </th>
                        <th style="width: 1%;" class="text-center">Tipe Kecanduan</th>
                        <th style="width: 20%;">Solusi</th>
                        <th style="width: 4%;" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $no = 1;
                        foreach ($row->result() as $kamu => $data) { ?>
                            <td><?= $no++ ?></td>
                            <td><?= $data->kode_penyakit?></td>
                            <td><?= $data->nama_penyakit?></td>
                            <td><?= $data->solusi?></td>
                            <td class="text-center">
                              <a href="<?=site_url('tipe_kecanduan/edit/' . $data->id_penyakit)?>" class="btn btn-sm btn-flat btn-success"><i class="fa fa-pencil"></i>Ubah</a>
                              <a href="<?=site_url('tipe_kecanduan/del/' . $data->id_penyakit)?>"  onclick="return confirm('Yakin hapus data ?')" class="btn btn-sm btn-flat btn-warning"><i class="fa fa-trash"></i>Hapus</a>
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