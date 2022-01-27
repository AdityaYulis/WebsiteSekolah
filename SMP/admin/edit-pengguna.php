<?php include 'header.php' ?>
<?php
    $pengguna   = mysqli_query($conn, "SELECT * FROM pengguna WHERE id = '".$_GET['id']."' ");

    if(mysqli_num_rows($pengguna) == 0){
        echo "<script>window.location='pengguna.php'</script>";
    }


    $p          = mysqli_fetch_object($pengguna);
?>
     
     <div class="content">
       
       <div class="container">
          
          <div class="box2">
            
            <div class="box2-header">
              Edit Pengguna
            </div>
            
            <div class="box2-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" value="<?= $p->nama ?>" required>
                    </div>  

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="user" placeholder="Username" class="input-control" value="<?= $p->username ?>" required>
                    </div>  

                    <div class="form-group">
                        <label>Level</label>
                        <select name="level" class="input-control" required>
                            <option value="">Pilih</option>
                            <option value="Admin" <?= ($p->level == 'Admin')? 'selected':''; ?>>Admin</option>
                            <option value="Guru" <?= ($p->level == 'Guru')? 'selected':''; ?>>Guru</option>
                        </select>
                    </div>  
                    <button type="button" class="btn-red" onclick="window.location = 'pengguna.php'">Kembali</button>
                    <input type="submit" name="submit" value="Simpan" class="btn-green">
                </form>
                <?php
                    if(isset($_POST['submit'])){
                        $nama       = addslashes(ucwords($_POST['nama']));
                        $user       = addslashes($_POST['user']);
                        $level      = $_POST['level'];
                        $currdate   = date('Y-m-d H:i:s');

                        $cek    = mysqli_query($conn, "SELECT username FROM pengguna WHERE username = '".$user."' ");
                        if(mysqli_num_rows($cek) > 0){
                            echo '<div class="alert alert-error">Username Telah Digunakan!</div>';
                        }else{
                            $update = mysqli_query($conn, "UPDATE pengguna SET
                                nama        = '".$nama."',
                                username    = '".$user."',
                                level       = '".$level."',
                                updated_at  = '".$currdate."'
                                WHERE id    = '".$_GET['id']."' 
                            ");

                            if($update){
                                    echo "<script>window.location='pengguna.php?success=Edit File Berhasil'</script>";
                            }else{
                                echo 'Gagal Edit Data '.mysqli_error($conn);
                            }
                        }
                    }
                ?>
            </div>

          </div>

       </div>

     </div>
<?php include 'footer.php' ?>