<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard 
        <small>Control & Overview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <?php if ($this->session->userdata('level') == 1) { ?>

    <div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3><?= $this->fungsi->count_kecanduan() ?></h3>
          <p>Data Penyakit </p>
        </div>
        <div class="icon">
          <i class="ion ion-plus"></i>
        </div>
        <a href="<?= site_url('tipe_kecanduan') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3><?= $this->fungsi->count_gejala() ?><sup style="font-size: 20px"></sup></h3>

          <p>Data Gejala </p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="<?= site_url('gejala') ?> " class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3><?= $this->fungsi->count_aturan() ?></h3>

          <p>Data Basis Aturan / Rule  </p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="<?= site_url('aturan') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?= $this->fungsi->count_user() ?></h3>

          <p>Data User </p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="<?= site_url('user ') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>


  </div>
  <?php }?>

    
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Dashboard Panel</h3>

        </div>
        <div class="box-body">
            <h3> Kecanduan Internet</h1>
            <p class="text-justify">
            Kecanduan internet telah menyerang berbagai golongan, baik anak-anak, remaja, orang dewasa maupun orang tua, apalagi dengan adanya trend-trend cara berinteraksi diinternet seperti Facebook, Twitter, YM (Chatting) dan juga Game Online (Warcraft, Poin Blank, Mobile Legend), transaksi perdangangan online (E-commers) [1]. Internet addiction diartikan sebagai sebuah sindrom yang ditandai dengan menghabiskan sejumlah waktu yang sangat banyak dalam menggunakan internet dan tidak mampu mengontrol penggunaannya saat online. Orang-orang yang menunjukan sindrom ini akan merasa cemas, kesedihan, depresi, mudah marah atau hampa saat tidak online di internet.
            </p>
        </div>
        <!-- /.box-body -->
     
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->