<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PACEVENT | <?php $this->session->userdata('role');?></title>
  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/logo_pac.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css"> 
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/dist/css/skins/_all-skins.min.css">
  <script src="<?php echo base_url(); ?>asset/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-red sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
     <a style="background-color: #800000;" href="<?php echo site_url("main/dashboard"); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span style="background-color: #800000;" class="logo-mini" ><img src="<?php echo base_url(); ?>assets/img/logo_pac.png"></i></span>
      <!-- logo for regular state and mobile devices -->
      <span style="background-color: #800000;" class="logo-lg"><b>PACEVENT</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="background-color: #800000;">
    <?php $this->load->view('main/partial_/navbar'); ?>
      
    </nav>
  </header>

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <?php $this->load->view('main/partial_/sidebar_peny'); ?>
    <!-- /.sidebar -->
  </aside>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="container-fluid">


<br>
<!-- DataTables -->
<div class="card mb-3">
    
    <div class="card-body">
    <?php foreach ($produk as $brg) {?>

      <form method="post">

        
<div class="row">
    <div class="col-md-4">
                <div class="profile-img">
                <img src="<?php echo base_url('assets/img/vendor/barang/'.$brg->foto_barang) ?>" width="200" />
                </div> 
    </div>

    <div class="col-md-6">
        <div class="profile-head">
                <h1> <strong> Detail Barang </strong></h1>
                <h5>
                    <?php echo $brg->nama_barang?>
                </h5>
                <!-- <h6>
                Vendor : <a href="<?php echo site_url('main/barang/get_profil_vendor/'.$brg->id_vendor); ?>"><?php echo $brg->nama_vendor; ?></a>
                </h6> -->
                  <br>          
                <div class="row">
                    <div class="col-md-6">
                        <label>Nama Barang</label>
                    </div>
                    <div class="col-md-6">
                        <p><?php echo $brg->nama_barang?></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label>Deskripsi Barang</label>
                    </div>
                    <div class="col-md-6">
                        <p><?php echo $brg->deskripsi_barang?></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label>Harga Sewa</label>
                    </div>
                    <div class="col-md-6">
                        <p><?php echo $brg->harga_barang?></p>
                    </div>
                </div>
                </div>
    </div>

</div>
<!-- tutupe div row -->

</form> 
        <center><?php echo anchor('main/pesan/form_pesan/'.$brg->id_barang,'<button class="btn btn-sm btn-danger">Sewa</button></div>');?> </center>
    <?php } ?>
   </div>
</div>

</div>
     
    <!-- Main content -->
    <!-- /.content -->

  <!-- /.content-wrapper -->



  <footer class="main-footer">
  <?php $this->load->view('main/partial_/footer');?>
  </footer>
   
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>asset/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>asset/bower_components/fastclick/lib/fastclick.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>asset/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>asset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>asset/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>asset/dist/js/demo.js"></script>
<script>
$.noConflict();
jQuery( document ).ready(function( $ ) {
    $('#example2').DataTable();
  // $(document).ready(function () {
    $('.sidebar-menu').tree();
    // $('#example2').DataTables();
  })
  
</script>
</body>
</html>
