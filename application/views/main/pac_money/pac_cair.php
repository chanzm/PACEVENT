<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PACEVENT | Penyewa</title>
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
    <?php $this->load->view('main/partial_/sidebar_peny');?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
 
<?php 
  foreach($user as $user):
  ?>

      <form action="<?php echo base_url(). 'main/pac_money_peny/cairkan_penyewa/'.$user->id_user; ?>"  method="post">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Pencairan PAC Money Penyewa</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <input type="hidden" class="form-control" name="id_user" value="<?php echo $user->id_user?>">
            </div>
            <div class="form-group">                
              <label>Id Penyewa</label>
              <input type="text" disabled class="form-control" name="id_user_view" value="<?php echo $user->id_user?>">
            </div>
            <div class="form-group">                
              <label>Nama Penyewa</label>
              <input type="text" disabled class="form-control" name="nama_peny" value="<?php echo $user->nama_peny?>">
            </div>
            <div class="form-group">                
              <label>Saldo saat ini</label>
              <input type="text" disabled class="form-control" name="pac_money_view" value="<?php echo $user->pacmoney?>">
            </div>
            <div class="form-group">                
              <input type="hidden"class="form-control" name="pac_money" value="<?php echo $user->pacmoney?>">
            </div>
            <div class="form-group">                
              <label>Masukkan Nominal Pencairan</label>
              <input type="numeric" name="nominal" class="form-control">
            </div>
            <div class="form-group">                
              <label>Bank Tujuan</label>
              <input type="text" disabled name="bank_peny1" class="form-control" value="<?php echo $user->bank_peny?>">
            </div>
            <div class="form-group"> 
              <input type="hidden" name="bank_peny" class="form-control"  value="<?php echo $user->bank_peny?>">
            </div>
            <div class="form-group"> 
              <input type="hidden" name="no_rek_peny" class="form-control" value="<?php echo $user->no_rek_peny?>">
            </div>
            <div class="form-group">                
              <label>Nomor Rekening</label>
              <input type="text" disabled name="no_rek_peny1" class="form-control" value="<?php echo $user->no_rek_peny?>">
            </div>
            <div class="form-group">                
              <label>Nama Rekening</label>
              <input type="text" disabled name="nama_rek" class="form-control" value="<?php echo $user->nama_rekening?>">
            </div>
            <div class="form-group">                
              <input type="hidden" name="nama_rekening" class="form-control" value="<?php echo $user->nama_rekening?>">
            </div>
            <div class="form-group">                
              <label>Jika ada perubahan rekening tujuan, silahkan menghubungi administrator</label>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" name="pesan" class="btn btn-danger">Ajukan Pencairan</button>
          </div>
        </div>
      </form>
    
  <?php endforeach;?>

  </div>
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
