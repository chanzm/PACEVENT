<div class="card mb-3">
    
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-hover" id="example2" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id_pencairan</th>
                        <th>Id_user</th>
                        <th>Role</th>
                        <th>Nominal</th>
                        <th>Waktu Pengajuan</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pencairan as $y): ?>
                    <tr>
                    <td>
                            <?php echo $y->id_cair?>
                        </td>
                        <td>
                            <?php echo $y->id_user?>
                        </td>
                        <td>
                            <?php echo $y->role ?>
                        </td>
                        <td>
                            <?php echo $y->nominal_cair ?>
                        </td>
                        <td>
                            <?php echo $y->waktu_pengajuan ?>
                        </td>
                        <td>
                            <?php echo $y->status ?>
                        </td>
                        <td>
                        <?php 
                        if($y->status=='MENUNGGU KONFIRMASI'){
                            echo '<td>';
                            echo anchor('main/dashboard_adm/detail_cair/'.$y->id_cair,'<button class="btn btn-sm btn-danger">Detail</button>');
                            '</td>';
                        }
                        else if($y->status=='DIKONFIRMASI'){
                            echo '<td>';
                            echo anchor('main/dashboard_adm/konfirm_transfer/'.$y->id_cair,'<button class="btn btn-sm btn-success">Transfer</button>');
                            '</td>';
                        }
                        else if($y->status=='SELESAI' || $y->status=='DITOLAK'){
                            echo '<td></td>';
                        }
                        ?>
                        
                        </td>
                        
                    </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

</div>