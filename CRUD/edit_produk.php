<?php include('koneksi.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM produk where id = '$id'";
    $result = mysqli_query($koneksi,$query);

    if(!$result){
        die("query error : ".mysqli_error($koneksi)." - ".mysqli_error($koneksi));
    }
    $data =  mysqli_fetch_assoc($result);

    if(!count($data)){
        echo "<script>alert('Data tidak di temukan');window.location='index.php'</script>";
    }
}else{
    echo "<script>alert('Masukan ID yg ingin di edit');window.location='index.php'</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>CRUD</title>
    <style>
    </style>
</head>
<body>
<div class="container">
        <div class="card mt-4">
            <div class="card-header bg-primary text-white">
                Form Edit produk <?php echo $data['nama_produk']; ?>
            </div>
            <form action="proses_tambah.php" method="POST" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group">
                    <label>Nama produk</label>
                    <input type="text" name="nama_produk" class="form-control" placeholder="Masukan Nama Makanan" required="" value=" <?php echo $data['nama_produk']; ?>" />
                    
                </div>
                <div class="form-group pt-2">
                    <label>Harga</label>
                    <input type="text" name="harga_produk" class="form-control" placeholder="Masukan Harga" required="" value=" <?php echo $data['harga_produk']; ?>"/>
                </div>
                <div class="form-group pt-2">
                    <label>Deskripsi</label>
                    <input type="text" name="deskripsi" class="form-control" placeholder="deskripsi.." value=" <?php echo $data['deskripsi']; ?>"/>
                </div>
                <div class="form-group pt-2">
                    <label style=" display:block;">Gambar</label>
                    <img src="gambar/<?php echo $data['gambar_produk']; ?>" style ="width:100px; float:left; margin-bottom:10px;">
                    <input type="file" name="gambar_produk" class="form-control" />
                </div>
                
                <button type="submit"class="btn btn-success">Simpan perubahan</button>
            </div>
            </form>
        </div>
    </div>
</body>
</html>