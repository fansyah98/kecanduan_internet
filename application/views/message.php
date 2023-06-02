<?php if ($this->session->userdata('success')) { ?>
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="icon fa fa-check"></i><?= $this->session->flashdata('success'); ?>
    </div>
<?php } ?>

<?php if ($this->session->userdata('error')) { ?>
    <div class="alert alert-danger alert-dismissible">
        <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> -->
        <i class="icon fa fa-ban"></i><?= $this->session->flashdata('error'); ?>
    </div>
<?php } ?>