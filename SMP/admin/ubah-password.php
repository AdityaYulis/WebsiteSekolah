<?php include 'header.php' ?>
     
     <div class="content">
       
       <div class="container">
          
          <div class="box2">
            
            <div class="box2-header">
              Ubah Password
            </div>
            
            <div class="box2-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="pass" placeholder="Password" class="input-control" required>
                    </div>  

                    <div class="form-group">
                        <label>Ulangi Password</label>
                        <input type="password" name="cpass" placeholder="Ulangi Password" class="input-control" required>
                    </div>  

                    <button type="button" class="btn-red" onclick="window.location = 'pengguna.php'">Kembali</button>
                    <input type="submit" name="submit" value="Simpan" class="btn-green">
                </form>

                <?php
                    if(isset($_POST['submit'])){
                        $pass       = addslashes($_POST['pass']);
                        $cpass       = addslashes($_POST['cpass']);
                        $currdate   = date('Y-m-d H:i:s');

                        if($pass != $cpass ){
                            echo '<div class="alert alert-error">Password Tidak Sesuai!</div>';
                        }else{

                            $update = mysqli_query($conn, "UPDATE pengguna SET
                                password    = '".MD5($pass)."',
                                updated_at  = '".$currdate."'
                                WHERE id    = '".$_SESSION['uid']."' 
                            ");

                            if($update){
                                echo '<div class="alert alert-success">Ubah Password Berhasil!</div>';
                            }else{
                                echo 'Gagal Ubah Password '.mysqli_error($conn);
                            }
                        }    
                    }
                ?>
            </div>

          </div>

       </div>

     </div>

<?php include 'footer.php' ?>