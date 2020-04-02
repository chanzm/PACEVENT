<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <script>
    function tolak(url){
      $('#modal-tolak').modal();
      $('#btn-delete').attr("href", url);
    }
  </script>

<?php 
  foreach($sewa as $s):
  ?>

      <form method="post">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Konfirmasi Penyewaan</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <input type="hidden" class="form-control" name="id_sewa" value="<?php echo $s->id_sewa?>">
            </div>
            <div class="form-group">                
              <label>Nama Penyewa</label>
              <input type="text" disabled class="form-control" name="nama_peny" value="<?php echo $s->nama_peny?>">
            </div>
            <div class="form-group">                
              <label>Nama Barang</label>
              <input type="text" disabled name="nama_barang" class="form-control" value="<?php echo $s->nama_barang?>">
            </div>
            <div class="form-group">                
              <label>Jumlah</label>
              <input type="numeric" disabled name="jumlah_barang" class="form-control" value="<?php echo $s->jumlah_barang?>">
            </div>
            <div class="form-group">                
              <label>Tanggal Peminjaman</label>
              <input type="date" disabled name="tgl_pinjam" class="form-control" value="<?php echo $s->tgl_pinjam?>">
            </div>
            <div class="form-group">                
              <label>Tanggal Pengembalian</label>
              <input type="date" disabled name="tgl_kembali" class="form-control" value="<?php echo $s->tgl_kembali?>">
            </div>
            <div class="form-group">                
              <label>Pengambilan Barang</label>
              <input type="text" disabled name="ambil_barang" class="form-control" value="<?php echo $s->ambil_barang?>">
            </div>
            <div class="form-group">                
              <label>Alamat COD/Pengiriman Barang</label>
              <input type="text" disabled name="alamat" class="form-control" value="<?php echo $s->alamat?>">
            </div>
            <div class="form-group">                
              <label>Keterangan Tambahan</label>
              <input type="text" disabled name="ket" class="form-control" value="<?php echo $s->ket?>">
            </div>
            <div class="form-group">                
              <label>Total Bayar</label>
              <input type="text" disabled name="ket" class="form-control" value="<?php echo $s->total_bayar?>">
            </div>
          </div>
           <div class="modal-footer">
          <?php 
                        if($s->status=='DIKONFIRMASI'){

                         echo '<em class="btn btn-success" disabled>Lakukan Pengiriman</em>';
                        }
                        else if($s->status=='SUDAH DIBAYAR'){
                           echo '<a href = "';
                           echo base_url(). 'main/dashboard_ven/kirim_barang/'.$s->id_sewa.''; 
                           echo '" ><em class="btn btn-success">Lakukan Pengiriman</em></a>';
                        }
                        ?>
             
          </div>
        </div>
      </form>
    
  <?php endforeach;?>

  <div class="modal modal-success fade" id="modal-tolak">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Kirim Barang Penyewaan</h4>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tutup</button>
          <a id="btn-delete" class="btn btn-outline" href="">Kirim</a>
        </div>
      </div>
    </div>
  </div>
