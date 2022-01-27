<?php
  session_start();
  include '../koneksi.php';
  if(!isset($_SESSION['status_login'])){
    echo "<script>window.location = '../login.php?msg=Silahkan Login Terlebih Dahulu!'</script>";
  }
  date_default_timezone_set("Asia/Jakarta");

$identitas = mysqli_query($conn, "SELECT * FROM pengaturan ORDER BY id DESC LIMIT 1");
$d = mysqli_fetch_object($identitas);

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../uploads/identitas/<?= $d->favicon ?>" >
    <link rel="stylesheet" type="text/css"  href="../assets/css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
      tinymce.init({
        selector: '#keterangan'
      }); 
    </script>
    

    <title>Panel Admin - <?= $d->nama ?></title>
  </head>
  <body>
     <div class="navbar">
         <div class="container">
             
                 <h2 class="nav-brand float-left"><a href="index.php"><?= $d->nama ?></a></h2>
                 <ul class="nav-menu float-left">
                     <li><a href="index.php">Dashboard</a></li>

                      <?php if($_SESSION['ulevel'] == 'Admin'){ ?>

                        <li><a href="pengguna.php">Pengguna</a></li>
                      <?php }elseif($_SESSION['ulevel'] == 'Guru'){ ?> 

                    
                        <li><a href="materi.php">Materi</a></li>
                        <li><a href="prestasi.php">Prestasi</a></li>
                        <li><a href="informasi.php">Informasi</a></li>
                        <li>
                            <a href="#">Pengaturan <i class="fa fa-caret-down"></i></a>
                            <!-- Sub menu-->
                            <ul class="drop-down">
                                <li><a href="identitas-sekolah.php">Identitas Sekolah</a></li>
                                <li><a href="tentang-sekolah.php">Tentang Sekolah</a></li>
                                <li><a href="kepala-sekolah.php">Kepala Sekolah</a></li>
                            </ul>
                            </li>
                      <?php }  ?>
                     <li>
                         <a href="#"><?= $_SESSION['uname'] ?>(<?= $_SESSION['ulevel'] ?>) <i class="fa fa-caret-down"></i></a>
                          <!-- Sub menu-->
                          <ul class="drop-down">
                             <li><a href="ubah-password.php">Ubah Password</a></li>
                             <li><a href="logout.php">Keluar</a></li>
                             
                         </ul>

                        </li>
                 </ul>
                 <div class="clearfix"></div>
             
         </div>

     </div>