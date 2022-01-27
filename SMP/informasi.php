<?php include 'header.php'?>

<div class= "section" >
                <div class="container text-center">
                    <h3>Informasi Terbaru</h3>
                    <?php
                        
                        $informasi = mysqli_query($conn, "SELECT * FROM informasi  ORDER BY id ASC");
                            if(mysqli_num_rows($informasi) > 0 ){
                                while($p = mysqli_fetch_array($informasi)){

                            
                   ?>

                    <div class="col-4">
                        <a href="detail-informasi.php?id=<?= $p['id'] ?>" class="thubmnail-link">
                        <div class="thumbnail-box">
                            <div class="thumbnail-img" style="background-image: url('uploads/informasi/<?= $p['gambar'] ?>');">
                                
                            </div>

                            <div class="thumbnail-text">
                                <?= $p['keterangan']?>
                                
                            </div>
 
                        </div>
                        </a>
                    </div>
                        

                    <?php }}else{ ?>

                            Tidak ada data

                    <?php } ?>
                </div>
    
            
<?php include 'footer.php'?>