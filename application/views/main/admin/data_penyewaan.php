<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<div class="container-fluid">


<br>
<!-- DataTables -->
<div class="card mb-3">
    
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-hover" id="example2" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id sewa</th>
                        <th>Waktu pemesanan</th>
                        <th>Id barang</th>
                        <th>Nama Penyewa</th>
                        <th>Jumlah Barang</th>
                        <th>Status</th>
                        <!-- 14 -->
                        <!-- <th>Action</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($penyewaan as $a): ?>
                    <tr>
                        <td><?php echo $a->id_sewa ?></td>
                        <td><?php echo $a->waktu_pemesanan ?></td>
                        <td><?php echo $a->nama_barang ?></td>
                        <td><?php echo $a->id_penyewa ?></td>
                        <td><?php echo $a->jumlah_barang ?></td>
                        <td><?php echo $a->status ?></td>
                        <!-- <td><?php echo anchor('main/dashboard_ven/konfirmasi/'.$a->id_sewa,'<button class="btn btn-sm btn-danger">Detail</button>'); ?></td> -->
                    </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
