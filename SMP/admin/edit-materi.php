<?php include 'header.php' ?>
<?php
    $materi   = mysqli_query($conn, "SELECT * FROM materi WHERE id = '".$_GET['id']."' ");

    if(mysqli_num_rows($materi) == 0){
        echo "<script>window.location='materi.php'</script>";
    }


    $p          = mysqli_fetch_object($materi);
?>
     
     <div class="content">
       
       <div class="container">
          
          <div class="box2">
            
            <div class="box2-header">
              Edit Materi
            </div>
            
            <div class="box2-body">
                <form method="POST" action="" enctype="multipart/form-data" >

                <div class="form-group">
                  <label>Matapelajaran</label>
                  <input type="text" name="matapelajaran" class="input-control" value="<?= $p->matapelajaran ?>" />
                </div>

                <div>
                  <label>Keterangan</label>
                 <textarea type="text" name="keterangan" class="input-control" id="keterangan"  ><?= $p->keterangan ?></textarea>
                </div>

                <div>
                  <label>File</label>
                  <br>
                  <img src="../uploads/materi/<?= $p->file ?>" width="200px" class="image">
                  <input type="hidden" name="file2" value="<?= $p->file ?>">
                 <input type="file" name="file" class="input-control" />
                </div>
                <button type="button" class="btn-red" onclick="window.location = 'materi.php'">Kembali</button>
                    <input type="submit" name="submit" value="Simpan" class="btn-green">
              </form>
                <?php
                    if(isset($_POST['submit'])){

                        $matapelajaran   = addslashes(ucwords($_POST['matapelajaran']));
                        $ket             = addslashes($_POST['keterangan']);
                        $currdate   = date('Y-m-d H:i:s');
                        
                        if($_FILES['file']['name']!=''){

                            //echo 'user ganti file';

                            $matapelajaran   = addslashes(ucwords($_POST['matapelajaran']));
                            $ket             = addslashes($_POST['keterangan']);

                            $filename   = $_FILES['file']['name'];
                            $tmpname    = $_FILES['file']['tmp_name'];
                            $filesize   = $_FILES['file']['size'];



                            $formatfile = pathinfo($filename, PATHINFO_EXTENSION);
                            $rename     = 'materi'.time().'.'.$formatfile;

                            $allowedtype = array ('png','jpg','jpeg','pdf','doc');

                            if(!in_array($formatfile, $allowedtype)){

                             echo '<div class="alert alert-error">format file tidak sesuai</div>';

                             return false;

                        }elseif($filesize > 10000000000){

                             echo '<div class="alert alert-error">ukuran file melebihi batas</div>';

                             return false;

                         }else{

                            if(file_exists("../uploads/materi/".$_POST['file2'])){

                                unlink("../uploads/materi/".$_POST['file2']);
                            }

                            move_uploaded_file($tmpname, "../uploads/materi/".$rename);

                        }

                        }else{

                            //echo 'user tidak ganti file';

                            $rename = $_POST['file2'];

                        
                        }

                            $update = mysqli_query($conn, "UPDATE materi SET
                                matapelajaran        = '".$matapelajaran."',
                                keterangan    = '".$ket."',
                                file       = '".$rename."',
                                updated_at  = '".$currdate."'
                                WHERE id    = '".$_GET['id']."' 
                            ");

                            if($update){
                                echo "<script>window.location='materi.php?success=Edit File Berhasil'</script>";

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