<?php include 'header.php'?>

    <div class="content">
       
       <div class="container">
          
          <div class="box2">
            
            <div class="box2-header">
              <h1>Materi</h1>
            </div>
            
            <div class="box2-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Mata Pelajaran</th>
                            <th>Keterangan</th>
                            <th>File</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                            $where = " WHERE 1=1 ";
                            if(isset($_GET['key'])){
                                $where .= " AND nama LIKE '%".addslashes($_GET['key'])."%' ";
                            }

                            $materi = mysqli_query($conn, "SELECT * FROM materi $where ORDER BY id ASC");
                            if(mysqli_num_rows($materi) > 0 ){
                                while($p = mysqli_fetch_array($materi)){
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $p['matapelajaran'] ?></td>
                            <td><?= substr($p['keterangan'], 0,100) ?></td>
                            <td><center><img src="uploads/materi/<?= $p['file']?>" width="100px "></center></td>
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
            
<?php include 'footer.php'?>