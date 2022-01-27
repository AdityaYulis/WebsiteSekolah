<?php include 'header.php' ?>
     
     <div class="content">
       
       <div class="container">
          
          <div class="box2">
            
            <div class="box2-header">
            Prestasi
            </div>
            
            <div class="box2-body">
                <button type="button" class="btn-green" onclick="window.location = 'tambah-prestasi.php'"><i class="fa fa-plus"> </i> Tambah</button>

                <?php
                    if(isset($_GET['success'])){
                        echo"<div class='alert alert-success'>".$_GET['success']."</div>";
                    }

                ?>
                <br>
                <form action="">
                    <div class="input-group">
                        <input type="text" name="key" placeholder="Pencarian">
                        <button type="submit"><i class="fa fa-search"> </i></button>
                    </div>
                </form>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Keterangan</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;

                            $where = " WHERE 1=1 ";
                            if(isset($_GET['key'])){
                                $where .= " AND keterangan LIKE '%".addslashes($_GET['key'])."%' ";
                            }

                            $prestasi = mysqli_query($conn, "SELECT * FROM prestasi $where ORDER BY id ASC");
                            if(mysqli_num_rows($prestasi) > 0 ){
                                while($p = mysqli_fetch_array($prestasi)){
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= substr($p['keterangan'], 0,100) ?></td>
                            
                           
                            <td><center><img src="../uploads/prestasi/<?= $p['foto']?>" width="200px "></center></td>

                            <td>
                                <a href="edit-prestasi.php?id=<?= $p['id'] ?>" title="Edit Data"><i class="fa fa-edit"> </i></a> |
                                <a href="hapus.php?idprestasi=<?= $p['id'] ?>" onclick="return confirm('Apakah anda ingin menghapus file <?= $p['keterangan'] ?> ?')" title="Hapus Data" class="text-red"><i class="fa fa-trash-alt"> </i></a>
                            </td>
                        </tr>
                        <?php }}else{ ?>
                            <tr>
                                <td colspan="5">Data Tidak Tersedia</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

          </div>

       </div>

     </div>
<?php include 'footer.php' ?>