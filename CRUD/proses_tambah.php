<?php
    include('koneksi.php');

    $nama_produk = $_POST['nama_produk'];
    $deskripsi = $_POST['deskripsi'];
    $harga_produk = $_POST['harga_produk'];
    $gambar_produk = $_FILES['gambar_produk']['name'];

    if($gambar_produk != ""){
        $tipe_file = array('png', 'jpg');
        $x = explode('.', $gambar_produk);
        $tipe = strtolower(end($x));
        $file_tmp = $_FILES['gambar_produk']['tmp_name'];
        $acak = rand(1,999);
        $nama_gambar_baru = $acak. '-' .$gambar_produk;

        if(in_array ($tipe, $tipe_file) === true){
            move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru);
            $query = "INSERT INTO produk (nama_produk,deskripsi,harga_produk,gambar_produk) VALUES ('$nama_produk', '$deskripsi','$harga_produk','$nama_gambar_baru')";
            $result = mysqli_query($koneksi, $query);

            if(!$result){
                die("query error : ".mysqli_error($koneksi)." - ".mysqli_error($koneksi));
            }else{
                echo "<script>alert('Data berhasil Ditambahkan');window.location='index.php'</script>";
            }
        }else{
            echo "<script>alert('ekstensi hanya bisa jpg dan png!');window.location='tambah_produk.php'</script>";
        }
    }else{
        $query = "INSERT INTO produk (nama_produk,deskripsi,harga_produk) VALUES ('$nama_produk', '$deskripsi','$harga_produk')";
            $result = mysqli_query($koneksi, $query);

            if(!$result){
                die("query error : ".mysqli_error($koneksi)." - ".mysqli_error($koneksi));
            }else{
                echo "<script>alert('Data berhasil Ditambahkan');window.location='index.php'</script>";
            }
    }
    
?>