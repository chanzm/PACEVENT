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
  foreach($produk as $brg):
  ?>

      <form action="<?php echo base_url(). 'main/pesan/buat_pesanan/'; ?>"  method="post">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Sewa Barang</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <input type="hidden" class="form-control" name="id_penyewa" value="<?php echo $this->session->userdata('id_user')->id_user?>">
            </div>
            <div class="form-group">
              <input type="hidden" class="form-control" name="id_vendor" value="<?php echo $brg->id_vendor?>">
            </div>
            <div class="form-group">
              <input type="hidden" class="form-control" name="id_barang" value="<?php echo $brg->id_barang?>">
            </div>
            <div class="form-group">                
              <label>Nama Barang</label>
              <input type="text" disabled class="form-control" name="nama_Barang" value="<?php echo $brg->nama_barang?>">
            </div>
            <div class="form-group">   
              <input type="hidden" class="form-control" name="nama_barang_input" value="<?php echo $brg->nama_barang?>">
            </div>
            <div class="form-group">                
              <label>Deskripsi Barang</label>
              <input type="text" disabled name="deskripsi_barang" class="form-control" value="<?php echo $brg->deskripsi_barang?>">
            </div>
            <div class="form-group">                
              <input type="hidden" name="harga_barang" class="form-control" value="<?php echo $brg->harga_barang?>">
            </div>
            <!-- <div class="form-group">                
              <label>Nama Vendor</label>
              <input type="text" disabled name="harga_barang" class="form-control" value="<?php echo $brg->id_vendor?>">
            </div> -->
            <div class="form-group">                
              <label>Jumlah</label>
              <input type="numeric" name="jumlah_barang" class="form-control">
            </div>
            <div class="form-group">                
              <label>Tanggal Peminjaman</label>
              <input type="date" name="tgl_pinjam" class="form-control">
            </div>
            <div class="form-group">                
              <label>Tanggal Pengembalian</label>
              <input type="date" name="tgl_kembali" class="form-control">
            </div>
            <div class="form-group">                
              <label>Pengambilan Barang</label>
              <select class='form-control input-md' name='ambil_barang' >
                    <option value="" disabled selected>Pilih Opsi</option>
                    <option value="cod">COD</option>
                    <option value="kirim">Dikirim ke Alamat</option>
                    <option value="ambil">Diambil di tempat penyedia</option>
                </select>
            </div>
            <div class="form-group">                
              <label>Alamat COD/Pengiriman Barang</label>
              <input type="text" name="alamat" class="form-control" placeholder="kosongkan jika memilih ambil barang di tempat penyedia">
            </div>
            <div class="form-group">                
              <label>Keterangan Tambahan</label>
              <input type="text" name="ket" class="form-control" placeholder="Jika ada spesifikasi tambahan kriteria barang silahkan cantumkan disini">
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" name="pesan" class="btn btn-danger">Buat Pesanan</button>
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
