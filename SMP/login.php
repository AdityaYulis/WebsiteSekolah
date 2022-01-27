<?php
    session_start();
    include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/style.css" />

    <title>Halaman Login</title>
  </head>
  <body>

    <div class="page-login">
        <div class="box box-login">
             <div class="box-header text-center">
                 Login
             </div>
             <div class="box-body">
                <?php
                    if(isset($_GET['msg'])){
                        echo "<div class='alert alert-error'>".$_GET['msg']."</div>";
                    }
                ?>
                 <form action="" method="POST">
                     <div class="form-group">
                         <label>Username</label>
                         <input type="text" name="user" placeholder="Username" class="input-control">
                     </div>
                     <div class="form-group">
                         <label>Password</label>
                         <input type="Password" name="pass" placeholder="Password" class="input-control">
                     </div>

                     <input type="submit" name="submit" values="Login" class="btn-login">
                 </form>
                 <?php

                     if(isset($_POST['submit'])){
                        
                        $user = mysqli_real_escape_string($conn, $_POST['user']);
                        $pass = mysqli_real_escape_string($conn, $_POST['pass']);

                        $cek = mysqli_query($conn, "SELECT * FROM PENGGUNA WHERE username = '".$user."' ");
                      if(mysqli_num_rows($cek) > 0){

                        $d = mysqli_fetch_object($cek);
                        if(md5($pass) == $d->password){

                            $_SESSION['status_login'] = true;
                            $_SESSION['uid']            =  $d->id;
                            $_SESSION['uname']          =  $d->nama;
                            $_SESSION['ulevel']         =  $d->level;

                            echo "<script>window.location = 'admin/index.php'</script>";


                        }else{
                            echo '<div class="alert">Password anda salah</div>';
                        }

                      }else{
                          echo '<div class="alert">Username tidak ditemukan</div>';
                      };


 
                     }

                ?>

             </div>
             <div class="box-footer text-center">
                 <a href="index.php">Halaman Utama</a>
             </div>
        </div>
    </div> 
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>