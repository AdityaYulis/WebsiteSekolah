<?php include 'header.php' ?>
<?php
    $prestasi   = mysqli_query($conn, "SELECT * FROM prestasi WHERE id = '".$_GET['id']."' ");

    if(mysqli_num_rows($prestasi) == 0){
        echo "<script>window.location='prestasi.php'</script>";
    }


    $p          = mysqli_fetch_object($prestasi);
?>
     
     <div class="content">
       
       <div class="container">
          
          <div class="box2">
            
            <div class="box2-header">
              Edit Prestasi
            </div>
            
            <div class="box2-body">
                <form method="POST" action="" enctype="multipart/form-data" >

                <div class="form-group">
                  <label>Keterangan</label>
                  <textarea type="text" name="keterangan" class="input-control" id="keterangan"  ><?= $p->keterangan ?></textarea>
                </div>

                <div>
                  <label>Foto</label>
                  <br>
                  <img src="../uploads/prestasi/<?= $p->foto ?>" width="200px" class="image">
                  <input type="hidden" name="foto2" value="<?= $p->foto ?>">
                 <input type="file" name="foto" class="input-control" />
                </div>
                <button type="button" class="btn-red" onclick="window.location = 'prestasi.php'">Kembali</button>
                    <input type="submit" name="submit" value="Simpan" class="btn-green">
              </form>
                <?php
                    if(isset($_POST['submit'])){

                        $ket             = addslashes($_POST['keterangan']);
                        $currdate        = date('Y-m-d H:i:s');
                        
                        if($_FILES['foto']['name']!=''){

                            //echo 'user ganti file';

                            $ket             = addslashes($_POST['keterangan']);

                            $filename   = $_FILES['foto']['name'];
                            $tmpname    = $_FILES['foto']['tmp_name'];
                            $filesize   = $_FILES['foto']['size'];



                            $formatfile = pathinfo($filename, PATHINFO_EXTENSION);
                            $rename     = 'prestasi'.time().'.'.$formatfile;

                            $allowedtype = array ('png','jpg','jpeg','pdf','doc');

                            if(!in_array($formatfile, $allowedtype)){

                             echo '<div class="alert alert-error">format file tidak sesuai</div>';

                             return false;

                        }elseif($filesize > 10000000000){

                             echo '<div class="alert alert-error">ukuran file melebihi batas</div>';

                             return false;

                         }else{

                            if(file_exists("../uploads/prestasi/".$_POST['foto2'])){

                                unlink("../uploads/prestasi/".$_POST['foto2']);
                            }

                            move_uploaded_file($tmpname, "../uploads/prestasi/".$rename);

                        }

                        }else{

                            //echo 'user tidak ganti file';

                            $rename = $_POST['foto2'];

                        
                        }

                            $update = mysqli_query($conn, "UPDATE prestasi SET
                                
                                keterangan    = '".$ket."',
                                foto       = '".$rename."',
                                updated_at  = '".$currdate."'
                                WHERE id    = '".$_GET['id']."' 
                            ");

                            if($update){
                                echo "<script>window.location='prestasi.php?success=Edit File Berhasil'</script>";

                            }else{

                                echo 'Gagal Edit Data '.mysqli_error($conn);
                            }
                    }
                ?>
            </div>

          </div>

       </div>

     </div>
<?php include 'footer.php' ?>