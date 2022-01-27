<?php include 'header.php'?>


            <!-- bagian banner FOTO SEKOLAH BELUM ADA -->
            <div class="banner" >
                <div class="banner-text">
                    <div class="container">

                    <h3> Selamat Datang di <?= $d->nama ?></h3>
                    <p>Sekolah Menengah Kejuruan dengan berbagai jurusan yang dapat anda pilih sesuai minat bakat anda</p>

                    </div>
                    
                </div>

            </div>

            <!--bagian sambutan -->
            <div class="section">
                <div class="container text-center">
                    <h3>Sambutan Kepala Sekolah</h3>
                    <img src="uploads/identitas/<?= $d->foto_kepsek?>" width="400">
                    <h4><?= $d->nama_kepsek ?></h4>
                    <p><?= $d->sambutan_kepsek ?></p>
                </div>


            </div>

            <!-- bagian prestasi -->

            <div class= "section" id="prestasi">
                <div class="container text-center">
                    <h3>Prestasi</h3>

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

            <!--bagian informasi -->

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
    
            </div>
            <?php include 'footer.php'?>
           