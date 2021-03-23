<?php
    include('koneksi.php');

    $id = $_POST['id'];
    $nama_produk = $_POST['nama_produk'];
    $deskripsi = $_POST['deskripsi'];
    $harga_produk = $_POST['harga_produk'];
    $gambar_produk = $_FILES['gambar_produk']['name'];

    if($gambar_produk != ""){
        $tipe_file = array('png', 'jpg');
        $x = explode('.',$gambar_produk);
        $tipe = strtolower(end($x));
        $file_tmp = $_FILES['gambar_produk']['tmp_name'];
        $acak = rand(1,999);
        $nama_gambar_baru = $acak. '-' .$gambar_produk;

        if(in_array ($tipe, $tipe_file) === true){
            move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru);

            $query = "UPDATE produk SET nama_produk = '$nama_produk',deskripsi = '$deskripsi',harga_produk = '$harga_produk',gambar_produk = '$nama_gambar_baru'";
            $query = "WHERE id ='$id'";
            $result = mysqli_query($koneksi, $query);

            if(!$result){
                die("query error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
            }else{
                echo "<script>alert('Data berhasil Diubah');window.location='index.php'</script>";
            }

        }else{
            echo "<script>alert('ekstensi hanya bisa jpg dan png!');window.location='edit_produk.php'</script>";
        }
    }else{
         $query = "UPDATE produk SET nama_produk = '$nama_produk',deskripsi = '$deskripsi',harga_produk = '$harga_produk'";
            $query = "WHERE id ='$id'";
            $result = mysqli_query($koneksi, $query);

            if(!$result){
                die("query error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
            }else{
                echo "<script>alert('Data berhasil Diubah');window.location='index.php'</script>";
            }
    }
    
?>