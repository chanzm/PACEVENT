<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <script>
    function tolak(url){
      $('#modal-tolak').modal();
      $('#btn-delete').attr("href", url);
    }
    function terima(url){
      $('#modal-terima').modal();
      $('#btn-lala').attr("href", url);
    }
  </script>

<?php 
  foreach($pencairan as $s):
  ?>

      <form method="post" enctype='multipart/form-data' action="<?php echo base_url(). 'main/dashboard_adm/terima_pencairan/'; ?>">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Konfirmasi Pencairan PACmoney</h4>
          </div>
          <div class="modal-body">
           <div class="form-group">
              <input type="hidden" class="form-control" name="id_cair" value="<?php echo $s->id_cair?>">
            </div>
            <div class="form-group">
            <label>ID Pencairan</label>
              <input type="text" disabled class="form-control" name="id_cair_view" value="<?php echo $s->id_cair?>">
            </div>
            <div class="form-group">                
              <label>ID User</label>
              <input type="text" class="form-control" name="id_user" value="<?php echo $s->id_user?>">
            </div>
            <div class="form-group">                
              <label>Role User</label>
              <input type="text" name="role" class="form-control" value="<?php echo $s->role?>">
            </div>
            <div class="form-group">                
              <label>Nominal</label>
              <input type="numeric" name="nominal" class="form-control" value="<?php echo $s->nominal_cair?>">
            </div>
            <div class="form-group">                
              <label>Bank</label>
              <input type="text" disabled name="bank" class="form-control" value="<?php echo $s->bank_tujuan?>">
            </div>
            <div class="form-group">                
              <label>Nomor Rekening</label>
              <input type="text" disabled name="no_rekening" class="form-control" value="<?php echo $s->no_rekening?>">
            </div>
            <div class="form-group">                
              <label>Nama rekening</label>
              <input type="text" disabled name="nama_rekening" class="form-control" value="<?php echo $s->nama_rekening?>">
            </div>
            <div class="form-group">                
              <label>Waktu pengajuan</label>
              <input type="text" disabled name="waktu_pengajuan" class="form-control" value="<?php echo $s->waktu_pengajuan?>">
            </div>
          </div>
          <div class="modal-footer">
              <!-- <button type="submit" name="terima" class="btn btn-success">Terima Pesanan</button> -->
              <!-- <button type="submit" name="tolak" class="btn btn-danger">Tolak Pesanan</button> -->
              <!-- <a data-toggle="modal" data-target="#modal-tolak<?php echo $s->id_sewa;?>"> <em class="btn btn-danger btn-create">Tolak</em></a> 
              <a data-toggle="modal" data-target="#modal-terima<?php echo $s->id_sewa;?>"> <em class="btn btn-danger btn-create">Terima</em></a>  -->
              <a data-toggle="modal" onclick="tolak('<?php echo base_url(). 'main/dashboard_adm/tolak_pencairan/'.$s->id_cair.''; ?>  ')" ><em class="btn btn-danger">Tolak</em></a>
              <!-- <a href="<?php echo base_url(). 'main/dashboard_adm/terima_pencairan/'.$s->id_cair.''; ?>" ><em class="btn btn-danger">Terima</em></a> -->
              <button type="submit" name="upload" class="btn btn-danger">Terima</button>
              <!-- <?php echo anchor('main/dashboard_adm/terima_pencairan/'.$s->id_cair,'<div class="col text-center"><button style="background-color: #800000;" class="btn btn-sm btn-danger">Detail</button></div>');?> -->
          </div>
        </div>
      </form>
    
  <?php endforeach;?>

  <div class="modal modal-danger fade" id="modal-tolak">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Tolak Permintaan Pencairan PACmoney</h4>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tutup</button>
          <a id="btn-delete" class="btn btn-outline" href="">Tolak</a>
        </div>
      </div>
    </div>
  </div>

  <div class="modal modal-success fade" id="modal-terima">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Terima Permintaan PACmoney</h4>
          
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tutup</button>
          <a id="btn-lala" class="btn btn-outline" href="">Terima</a>
        </div>
      </div>
    </div>
  </div>
