<?php  include 'header.php' ?>
     
     <div class="content">
       
       <div class="container">
          
          <div class="box2">
            
            <div class="box2-header">
              Tambah Informasi
            </div>
            
            <div class="box2-body">

                <form method="POST" action="" enctype="multipart/form-data" >

                <div class="form-group">
                  <label>Judul</label>
                  <input type="text" name="judul" class="input-control" required="" />
                </div>

                <div>
                  <label>Keterangan</label>
                 <textarea type="text" name="keterangan" class="input-control" id="keterangan" required > </textarea>
                </div>

                <div>
                  <label>Gambar</label>
                 <input type="file" name="gambar" class="input-control" required="" />
                </div>
                <button type="button" class="btn-red" onclick="window.location = 'informasi.php'">Kembali</button>
                    <input type="submit" name="submit" value="Simpan" class="btn-green">
              </form>
                <?php 

                    if(isset($_POST['submit'])){
                        // print_r($_FILES['file']);

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

                         }elseif($filesize > 10000000000){

                            echo '<div class="alert alert-error">ukuran file melebihi batas</div>';

                         }else{


                             move_uploaded_file($tmpname, "../uploads/informasi/".$rename);

                           
                            $simpan = mysqli_query($conn, "INSERT INTO informasi VALUES (
                                null,
                                '".$judul."',
                                '".$ket."',
                                '".$rename."',
                                null,
                                null,
                                '".$_SESSION['uid']."'
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