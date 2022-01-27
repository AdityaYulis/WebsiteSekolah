<?php include 'header.php' ?>
<?php
    $informasi   = mysqli_query($conn, "SELECT * FROM informasi WHERE id = '".$_GET['id']."' ");

    if(mysqli_num_rows($informasi) == 0){
        echo "<script>window.location='informasi.php'</script>";
    }


    $p          = mysqli_fetch_object($informasi);
?>
     
     <div class="content">
       
       <div class="container">
          
          <div class="box2">
            
            <div class="box2-header">
              Edit Informasi
            </div>
            
            <div class="box2-body">
                <form method="POST" action="" enctype="multipart/form-data" >

                <div class="form-group">
                  <label>Judul</label>
                  <input type="text" name="judul" class="input-control" value="<?= $p->judul ?>" />
                </div>

                <div>
                  <label>Keterangan</label>
                 <textarea type="text" name="keterangan" class="input-control" id="keterangan" ><?= $p->keterangan ?></textarea>
                </div>

                <div>
                  <label>Gambar</label>
                  <br>
                  <img src="../uploads/informasi/<?= $p->gambar ?>" width="200px" class="image">
                  <input type="hidden" name="gambar2" value="<?= $p->gambar ?>">
                 <input type="file" name="gambar" class="input-control" />
                </div>
                <button type="button" class="btn-red" onclick="window.location = 'informasi.php'">Kembali</button>
                    <input type="submit" name="submit" value="Simpan" class="btn-green">
              </form>
                <?php
                    if(isset($_POST['submit'])){

                        $judul   = addslashes(ucwords($_POST['judul']));
                        $ket             = addslashes($_POST['keterangan']);
                        $currdate   = date('Y-m-d H:i:s');
                        
                        if($_FILES['gambar']['name']!=''){

                            //echo 'user ganti file';

                            $judul   = addslashes(ucwords($_POST['judul']));
                            $ket             = addslashes($_POST['keterangan']);

                            $filename   = $_FILES['gambar']['name'];
                            $tmpname    = $_FILES['gambar']['tmp_name'];
                            $filesize   = $_FILES['gambar']['size'];



                            $formatfile = pathinfo($filename, PATHINFO_EXTENSION);
                            $rename     = 'informasi'.time().'.'.$formatfile;

                            $allowedtype = array ('png','jpg','jpeg','pdf','doc');

                            if(!in_array($formatfile, $allowedtype)){

                             echo '<div class="alert alert-error">format file tidak sesuai</div>';

                             return false;

                        }elseif($filesize > 10000000000){

                             echo '<div class="alert alert-error">ukuran file melebihi batas</div>';

                             return false;

                         }else{

                            if(file_exists("../uploads/informasi/".$_POST['gambar2'])){

                                unlink("../uploads/informasi/".$_POST['gambar2']);
                            }

                            move_uploaded_file($tmpname, "../uploads/informasi/".$rename);

                        }

                        }else{

                            //echo 'user tidak ganti file';

                            $rename = $_POST['gambar2'];

                        
                        }

                            $update = mysqli_query($conn, "UPDATE informasi SET
                                judul        = '".$judul."',
                                keterangan    = '".$ket."',
                                gambar       = '".$rename."',
                                updated_at  = '".$currdate."'
                                WHERE id    = '".$_GET['id']."' 
                            ");

                            if($update){
                                echo "<script>window.location='informasi.php?success=Edit File Berhasil'</script>";

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