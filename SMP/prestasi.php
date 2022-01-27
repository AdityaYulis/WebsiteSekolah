<?php include 'header.php'?>

<div class="section" id="prestasi">
    <div class="container text-center">
        

    <?php
        $prestasi = mysqli_query($conn, "SELECT * FROM prestasi  ORDER BY id DESC");
        if(mysqli_num_rows($prestasi) > 0){

            while($p = mysqli_fetch_array($prestasi)){
    ?>

                    <div class="col-4" >
                        <a href="detail-prestasi.php?id=<?= $p['id']?>" class="thubmnail-link">
                        <div class="thumbnail-box">
                            <div class="thumbnail-img" style="background-image: url('uploads/prestasi/<?= $p['foto'] ?>');">
                                
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

</div>
            
<?php include 'footer.php'?>