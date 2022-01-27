<?php  include 'header.php' ?>
     
     <div class="content">
       
       <div class="container">
          
          <div class="box2">
            
            <div class="box2-header">
              Tambah Prestasi
            </div>
            
            <div class="box2-body">

                <form method="POST" action="" enctype="multipart/form-data" >

                <div class="form-group">
                  <label>Keterangan</label>
                  <textarea type="text" name="keterangan" class="input-control" id="keterangan" required> </textarea>
                </div>

                <div>
                  <label>Foto</label>
                 <input type="file" name="foto" class="input-control" required />
                </div>
                <button type="button" class="btn-red" onclick="window.location = 'prestasi.php'">Kembali</button>
                    <input type="submit" name="submit" value="Simpan" class="btn-green">
              </form>
                <?php 

                    if(isset($_POST['submit'])){
                        // print_r($_FILES['file']);

                        $ket        = addslashes($_POST['keterangan']);

                        $filename   = $_FILES['foto']['name'];
                        $tmpname    = $_FILES['foto']['tmp_name'];
                        $filesize   = $_FILES['foto']['size'];

                        $formatfile = pathinfo($filename, PATHINFO_EXTENSION);
                        $rename     = 'prestasi'.time().'.'.$formatfile;

                        $allowedtype = array ('png','jpg','jpeg','pdf','doc');

                        if(!in_array($formatfile, $allowedtype)){

                             echo '<div class="alert alert-error">format file tidak sesuai</div>';

                         }elseif($filesize > 10000000000){

                            echo '<div class="alert alert-error">ukuran file melebihi batas</div>';

                         }else{


                             move_uploaded_file($tmpname, "../uploads/prestasi/".$rename);

                           
                            $simpan = mysqli_query($conn, "INSERT INTO prestasi VALUES (
                                null,
                                '".$ket."',
                                '".$rename."',
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