<?php include 'header.php'?>

<div class="section">
                <div class="container">
                    <h3><center>Kontak</center></h3>

                    <div class="col-4">
                        <p><b>Alamat :</b> <br> <?= $d->alamat ?></p><br>
                        <p><b>Telepon :</b> <br> <?= $d->telepon ?></p><br>
                        <p><b>Email :</b> <br> <?= $d->email ?></p><br>
                    </div>

                    <div class="box-gmaps">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.429755227937!2d110.66867241477783!3d-7.744157294418386!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a47a9b3cf5f6d%3A0x14a3aad7d6fce6a7!2sSMP%20Negeri%201%20Trucuk!5e0!3m2!1sid!2sid!4v1643282417089!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
            
<?php include 'footer.php'?>
           