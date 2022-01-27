<?php include 'header.php' ?>
     
     <div class="content">
       
       <div class="container">
          
          <div class="box2">
            
            <div class="box2-header">
              Tambah Pengguna
            </div>
            
            <div class="box2-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" required>
                    </div>  

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="user" placeholder="Username" class="input-control" required>
                    </div>  

                    <div class="form-group">
                        <label>Level</label>
                        <select name="level" class="input-control" require>
                            <option value="">Pilih</option>
                            <option value="Admin">Admin</option>
                            <option value="Guru">Guru</option>
                        </select>
                    </div>  
                    <button type="button" class="btn-red" onclick="window.location = 'pengguna.php'">Kembali</button>
                    <input type="submit" name="submit" value="Simpan" class="btn-green">
                </form>
                <?php
                    if(isset($_POST['submit'])){
                        $nama   = addslashes(ucwords($_POST['nama']));
                        $user   = addslashes($_POST['user']);
                        $level  = $_POST['level'];
                        $pass   = '12345678';

                        $cek    = mysqli_query($conn, "SELECT username FROM pengguna WHERE username = '".$user."' ");
                        if(mysqli_num_rows($cek) > 0){
                            echo '<div class="alert alert-error">Username Telah Digunakan!</div>';
                        }else{
                            $simpan = mysqli_query($conn, "INSERT INTO pengguna VALUES (
                                null,
                                '".$nama."',
                                '".$user."',
                                '".MD5($pass)."',
                                '".$level."',
                                null,
                                null
                            )");
    
                            if($simpan){
                                echo '<div class="alert alert-success">Berhasil Disimpan</div>';
                            }else{
                                echo 'Gagal Disimpan '.mysqli_error($conn);
                            }
                        }

                    }
                ?>
            </div>

          </div>

       </div>

     </div>
<?php include 'footer.php' ?>