<?php
  include 'koneksi.php';

  date_default_timezone_set("Asia/Jakarta");

$identitas = mysqli_query($conn, "SELECT * FROM pengaturan ORDER BY id DESC LIMIT 1");
$d = mysqli_fetch_object($identitas);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="icon" href="uploads/identitas/<?= $d->favicon ?>" >

    <title> <?= $d->nama?></title>

  </head>
  <body> 
            <!-- Header-->
            <div class="header">
                <div class="container">
                    <div class="header-logo">
                        <img src="uploads/identitas/<?= $d->logo ?>" width="80">
                        <h2><a href="index.php"><?= $d->nama ?></a></h2>
                        
                    </div>
                    <ul class="header-menu">
                        <li> <a href="index.php">Beranda</a></li>
                        <li> <a href="tentang-sekolah.php">Tentang Sekolah</a></li>
                        <li> <a href="materi.php">Materi</a></li>
                        <li> <a href="prestasi.php">Prestasi</a></li>
                        <li> <a href="informasi.php">Informasi</a></li>
                        <li> <a href="kontak.php">Kontak</a></li>
                    </ul>
                </div>
            </div>