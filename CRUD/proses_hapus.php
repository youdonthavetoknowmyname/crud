<?php
    include('koneksi.php');

    $id = $_GET ['id'];
    $query = "DELETE FROM produk where id = '$id'";
    $result = mysqli_query($koneksi, $query);

    if(!$result){
        die("query error : ".mysqli_error($koneksi)." - ".mysqli_error($koneksi));
    }else{
        echo "<script>alert('Data berhasil Dihapus');window.location='index.php'</script>";
    }
?>