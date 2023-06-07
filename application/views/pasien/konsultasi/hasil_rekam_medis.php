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
        <li><a href="<?=site_url('konsultasi')?>"> Konsultasi</a></li>
      </ol>
    </section>

    

    <!-- Main content -->
    <section class="content">

    
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Hasil Konsultasi Pasien</h3>

        </div>
        <div class="box-body">
          <table class="table table-bordered table-hover table-responsive" >
                    <thead class="bg-red">
                        <tr>
                            <th style="width: 3%;">No </th>
                            <th> Gejala Terpilih </th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr >
                            <?php
                            $no = 1;
                            foreach ($gejala->result() as $kamu => $data) { ?>
                                <td><?= $no++ ?></td>
                                <td><?= $data->nama_gejala?></td>
                                  
                        </tr>
                    <?php } ?>
                    
                    </tbody>
          </table>
                <br>
            
          <table class="table table-bordered table-hover table-responsive" >
                    <thead class="bg-red">
                        <tr>
                            <th style="width: 3%;">No </th>
                            <th colspan="2"> Presentasi Setiap Penyakit </th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr >
                            <?php
                            $no = 1;
                            foreach ($diagnosa as $kamu => $data) { ?>
                                <td><?= $no++ ?></td>
                                <td>Presentase Pasien Menderita Penyakit <?= $data['nama_penyakit']?> Sebesar <?= floor($data['hasil_probabilitas'] * 100)?>% </td>
                                <td><?= $data['hasil_probabilitas']?></td>
                                  
                        </tr>
                    <?php } ?>
                    
                    </tbody>
          </table>
          <br>
          
          <table class="table table-bordered table-hover table-responsive" >
                  <tr class="bg-red" >
                    <th  colspan="3" class="text-center" >Hasil Diagnosa Sistem</th>
                  </tr>
                  <tr  >
                    <th>Nama : </th>
                    <td>:</td>
                    <td><?= $this->fungsi->user_login()->name?></td>
                  </tr>
              <?php
               foreach ($detail as $kamu => $data) { ?>
                <tr >
                  <th>Penyakit  </th>
                  <td>:</td>
                  <td> <?= $data['nama_penyakit']?></td>
                  
                </tr>
               
                <tr  >
                  <th>Hasil  Sebelum  </th>
                  <td>:</td>
                  <td><?= $data['hasil_probabilitas']; ?></td>
                </tr>
                <tr  >
                  <th>Hasil  Sesudah  </th>
                  <td>:</td>
                  <td><?= floor($data['hasil_probabilitas'] * 100)?></td>
                </tr>
                <tr  >
                  <th>Solusi  </th>
                  <td>:</td>
                  <td><?= $data['solusi']?></td>
                </tr>
                <tr  >
                  <th>Kesimpulan  </th>
                  <td>:</td>
                  <td>Berdasrkan hasil diagnosa yang anda lakukan secara mandiri maka hasilnya dinyatakan <label class="label label-info"><?= $data['nama_penyakit']?></label> berdasarkan nilai perhitungan <label class="label label-info"><?= floor($data['hasil_probabilitas'] * 100)?></label>  dengan solusi sebagai berikut <label class="label label-info"><?= $data['solusi']?></label></td>
                </tr>

                    <?php } ?>
            
               </table>
        </div>
        <div class="box-footer">
          <a href="<?=site_url('konsultasi/cetak')?>" class="btn btn-success btn-sm btn-flat" > <i class="fa fa-print"></i> Cetak Diagosa</a>
          <a href="<?=site_url('konsultasi')?>" class="btn btn-info btn-sm btn-flat"> <i class="fa fa-undo"></i>  Diagosa Ulang</a>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->