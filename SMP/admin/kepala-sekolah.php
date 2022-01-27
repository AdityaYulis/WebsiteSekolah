<?php include 'header.php' ?>
  
     <div class="content">
       
       <div class="container">
          
          <div class="box2">
            
            <div class="box2-header">
              Kepala Sekolah
            </div>
            
            <div class="box2-body">
              <?php
                    if(isset($_GET['success'])){
                        echo"<div class='alert alert-success'>".$_GET['success']."</div>";
                    }
              ?>
                <form action="" method="POST" action="" enctype="multipart/form-data" >

                <div>
                 <label>Nama Kepala Sekolah</label>
                 <input type="text" name="nama" placeholder="Nama Sekolah"  value="<?= $d->nama_kepsek ?>" class="input-control"required>
                </div>

                <div>
                 <label>Sambutan</label>
                 <textarea name="sambutan" class="input-control" placeholder="Sambutan Kepala Sekolah" id="keterangan" ><?= $d->sambutan_kepsek ?></textarea>
                </div>

                <div>
                  <label>Foto Kepala Sekolah</label>
                  <br>
                  <img src="../uploads/identitas/<?= $d->foto_kepsek ?>" width="200px" class="image">
                  <input type="hidden" name="foto_lama" value="<?= $d->foto_kepsek ?>">
                <input type="file" name="foto_baru" class="input-control">
                </div>

                
                <input type="submit" name="submit" value="Simpan Perubahan" class="btn-green">

              </form>
                <?php
                    if(isset($_POST['submit'])){

                        
                        $nama       = addslashes(ucwords($_POST['nama']));
                        $sambutan   = addslashes($_POST['sambutan']);
                        $currdate   = date('Y-m-d H:i:s');
                        
                        if($_FILES['foto_baru']['name']!=''){

                            $filename  = $_FILES['foto_baru']['name'];
                            $tmpname    = $_FILES['foto_baru']['tmp_name'];
                            $filesize   = $_FILES['foto_baru']['size'];


                            $formatfile  = pathinfo($filename , PATHINFO_EXTENSION);
                            $rename   = 'kepsek'.time().'.'.$formatfile ;

                            $allowedtype  = array ('png','jpg','jpeg','pdf','doc');

                            if(!in_array($formatfile, $allowedtype )){

                             echo '<div class="alert alert-error">format file kepala sekolah foto sekolah tidak sesuai</div>';

                             return false;

                        }elseif($filesize > 10000000000){

                             echo '<div class="alert alert-error">ukuran file foto kepala sekolah melebihi batas</div>';

                             return false;

                         }else{

                            if(file_exists("../uploads/identitas/".$_POST['foto_lama'])){

                                unlink("../uploads/identitas/".$_POST['foto_lama']);
                            }

                            move_uploaded_file($tmpname , "../uploads/identitas/".$rename );

                        }

                        }else{


                            $rename_logo  = $_POST['foto_lama'];

                        
                        }

                        
                            $update = mysqli_query($conn, "UPDATE pengaturan SET
                                
                                nama_kepsek     = '".$nama."',
                                sambutan_kepsek = '".$sambutan."',
                                foto_kepsek     = '".$rename."',
                                updated_at      = '".$currdate."'
                                WHERE id        = '".$d->id."' 
                            ");

                            if($update){
                                echo "<script>window.location='kepala-sekolah.php?success=Edit File Berhasil'</script>";

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