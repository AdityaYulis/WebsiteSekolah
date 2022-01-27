<?php  include 'header.php' ?>
     
     <div class="content">
       
       <div class="container">
          
          <div class="box2">
            
            <div class="box2-header">
              Tambah Materi
            </div>
            
            <div class="box2-body">

                <form method="POST" action="" enctype="multipart/form-data" >

                <div class="form-group">
                  <label>Matapelajaran</label>
                  <input type="text" name="matapelajaran" class="input-control" required="" />
                </div>

                <div>
                  <label>Keterangan</label>
                 <textarea type="text" name="keterangan" class="input-control" required > </textarea>
                </div>

                <div>
                  <label>File</label>
                 <input type="file" name="file" class="input-control" required="" />
                </div>
                <button type="button" class="btn-red" onclick="window.location = 'materi.php'">Kembali</button>
                    <input type="submit" name="submit" value="Simpan" class="btn-green">
              </form>
                <?php 

                    if(isset($_POST['submit'])){
                        // print_r($_FILES['file']);

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

                         }elseif($filesize > 10000000000){

                            echo '<div class="alert alert-error">ukuran file melebihi batas</div>';

                         }else{


                             move_uploaded_file($tmpname, "../uploads/materi/".$rename);

                           
                            $simpan = mysqli_query($conn, "INSERT INTO materi VALUES (
                                null,
                                '".$matapelajaran."',
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