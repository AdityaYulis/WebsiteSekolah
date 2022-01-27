<?php
    include '../koneksi.php';

    if(isset($_GET['idpengguna'])){

        $delete = mysqli_query($conn, "DELETE FROM pengguna WHERE id = '".$_GET['idpengguna']."' ");
        echo "<script>window.location = 'pengguna.php'</script>";

    }

    if(isset($_GET['idmateri'])){

    	$materi = mysqli_query($conn,"SELECT file FROM materi WHERE id ='".$_GET['idmateri']."'");

    	if(mysqli_num_rows($materi) > 0){

    		$p = mysqli_fetch_object($materi);

    		if(file_exists("../uploads/materi/".$p->file)){

    			unlink("../uploads/materi/".$p->file);
    		}
    	}

        $delete = mysqli_query($conn, "DELETE FROM materi WHERE id = '".$_GET['idmateri']."' ");
        echo "<script>window.location = 'materi.php'</script>";

    }

     if(isset($_GET['idprestasi'])){

        $prestasi = mysqli_query($conn,"SELECT foto FROM prestasi WHERE id ='".$_GET['idprestasi']."'");

        if(mysqli_num_rows($prestasi) > 0){

            $p = mysqli_fetch_object($prestasi);

            if(file_exists("../uploads/prestasi/".$p->foto)){

                unlink("../uploads/prestasi/".$p->foto);
            }
        }

        $delete = mysqli_query($conn, "DELETE FROM prestasi WHERE id = '".$_GET['idprestasi']."' ");
        echo "<script>window.location = 'prestasi.php'</script>";

    }

    if(isset($_GET['idinformasi'])){

        $informasi = mysqli_query($conn,"SELECT gambar FROM informasi WHERE id ='".$_GET['idinformasi']."'");

        if(mysqli_num_rows($informasi) > 0){

            $p = mysqli_fetch_object($informasi);

            if(file_exists("../uploads/informasi/".$p->gambar)){

                unlink("../uploads/informasi/".$p->gambar);
            }
        }

        $delete = mysqli_query($conn, "DELETE FROM informasi WHERE id = '".$_GET['idinformasi']."' ");
        echo "<script>window.location = 'informasi.php'</script>";

    }
?>