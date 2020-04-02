<div class="card mb-3">
    
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-hover" id="example2" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id Vendor</th>
                        <th>Foto Vendor</th>
                        <th>Nama Vendor</th>
                        <th>Telepon Vendor</th>
                        <th>Email Vendor</th>
                        <th>NPWP Pemilik</th>
                        <th>Nomor SIUP</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($vendor as $ven): ?>
                    <tr>
                    <td>
                    <?php echo $ven->id_user?>
                        </td>
                        <td>
                        <img src="<?php echo base_url('assets/img/vendor/profil/'.$ven->foto_ven) ?>" width="100" />
                        </td>
                        <td>
                            <?php echo $ven->nama_ven ?>
                        </td>
                        <td>
                            <?php echo $ven->telp_ven ?>
                        </td>
                        <td>
                            <?php echo $ven->email_ven ?>
                        </td>
                        <td>
                            
                        </td>
                        <td>
                            
                        </td>
                        <td>
                            <?php echo $ven->status ?>
                        </td>
                        
                        <td >
                        <a data-toggle="modal" data-target="#modal-edit<?php echo $ven->id_user; ?> "><em class="fa fa-pencil btn btn-sm btn-primary"></em></a>
                        <a data-toggle="modal" onclick="delete_confirm('<?php echo site_url('main/dashboard_adm/hapus_vendor/'.$ven->id_user) ?>')" ><em class="fa fa-trash btn btn-sm btn-danger"></em></a>
                        </td>

                    </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="modal modal-danger fade" id="modal-delete">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Hapus Vendor</h4>
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

  <?php 
  foreach($vendor as $ven):
  ?>

  <div class="modal fade" id="modal-edit<?php echo $ven->id_user?>">
    <div class="modal-dialog">
      <form action="<?php echo base_url(). 'main/dashboard_adm/edit_vendor/'.$ven->id_user.''; ?>"  method="post">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Edit Vendor</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <input type="hidden" class="form-control" name="id_user" value="<?php echo $ven->id_user?>">
            </div>
            <div class="form-group">                
              <label>Nama Vendor</label>
              <input type="text" class="form-control" name="nama_ven" id="j_edit_m" value="<?php echo $ven->nama_ven?>">
            </div>
            <div class="form-group">                
              <label>Telepon Vendor</label>
              <input type="text" id='p_edit_m' name="telp_ven" class="form-control" value="<?php echo $ven->telp_ven?>">
            </div>
            <div class="form-group">                
              <label>Username Vendor</label>
              <input type="text" id='p_edit_m' name="username_ven" class="form-control" value="<?php echo $ven->username_ven?>">
            </div>
            <div class="form-group">                
              <label>Email Vendor</label>
              <input type="text" id='p_edit_m' name="email_ven" class="form-control" value="<?php echo $ven->email_ven?>">
            </div>
            <div class="form-group">                
              <label>Status Vendor</label>
              <input type="text" id='p_edit_m' name="status" class="form-control" value="<?php echo $ven->status?>" required placeholder = "0=belum aktif, 1=aktif">
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

<!-- jQuery 3 -->

<script>
    function delete_confirm(url){
      $('#modal-delete').modal();
      $('#btn-delete').attr("href", url);
    }
$.noConflict();
jQuery( document ).ready(function( $ ) {
    $('#example2').DataTable();
  // $(document).ready(function () {
    $('.sidebar-menu').tree();
    // $('#example2').DataTables();
  })
  
</script>
