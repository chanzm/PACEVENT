<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<div class="container-fluid">


<br>
<div class="card mb-3">
    
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-hover" id="example2" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Telepon</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Foto Mahasiswa</th>
                        <th>Identitas Mahasiswa</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($penyewa as $y): ?>
                    <tr>
                        <td>
                            <?php echo $y->id_user?>
                        </td>
                        <td>
                            <?php echo $y->nama_peny ?>
                        </td>
                        <td>
                            <?php echo $y->telp_peny ?>
                        </td>
                        <td>
                            <?php echo $y->email_peny ?>
                        </td>
                        <td>
                            <?php echo $y->username_peny ?>
                        </td>
                        <td>
                        <img src="<?php echo base_url('assets/img/penyewa/profil/'.$y->foto_peny) ?>" width="100" />
                        </td>
                        <td>
                        <img src="<?php echo base_url('assets/img/penyewa/identitas/'.$y->upload_identitas_peny) ?>" width="100" />
                        </td>
                       
                        <td>
                        <a data-toggle="modal" data-target="#modal-edit<?php echo $y->id_user;?>"> <em class="fa fa-pencil btn btn-sm btn-primary btn-create"></em></a> 
                        <a data-toggle="modal" onclick="delete_confirm('<?php echo site_url('main/dashboard_adm/hapus_penyewa/'.$y->id_user) ?>')" ><em class="fa fa-trash btn btn-sm btn-danger"></em></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

</div>


<?php 
  foreach($penyewa as $y):
  ?>

  <div class="modal fade" id="modal-edit<?php echo $y->id_user?>">
    <div class="modal-dialog">
      <form action="<?php echo base_url(). 'main/dashboard_adm/update_data_penyewa/'.$y->id_user.''; ?>"  method="post">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Edit Penyewa</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <input type="hidden" class="form-control" name="id_user" value="<?php echo $y->id_user?>">
            </div>

            <div class="form-group">
              <label>Nama</label>
              <input type="text" class="form-control" name="nama_peny" value="<?php echo $y->nama_peny?>">
            </div>
            <div class="form-group">
              <label>Telepon</label>
              <input type="text" class="form-control" name="telp_peny" value="<?php echo $y->telp_peny?>">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="text" class="form-control" name="email_peny" value="<?php echo $y->email_peny?>">
            </div>
            <div class="form-group">
            <label>Username</label>
              <input type="text" class="form-control" name="username_peny" value="<?php echo $y->username_peny?>">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="submit" name="simpan" class="btn btn-danger">Save</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <?php endforeach;?>

  <div class="modal modal-danger fade" id="modal-delete">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Hapus Penyewa</h4>
        </div>
        <div class="modal-body">
          <h5 class="modal-title"> Are you sure ? </h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tutup</button>
          <a id="btn-delete" class="btn btn-outline" href="">Hapus</a>
        </div>
      </div>
    </div>
  </div>

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
