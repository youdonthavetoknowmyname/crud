<?php include('koneksi.php');?>
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
</head>
<body>
<div class="container">
        <div class="card mt-4">
            <div class="card-header bg-primary text-white">
                Form Tambah Makanan
            </div>
            <form action="proses_tambah.php" method="POST" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group">
                    <label>Nama produk</label>
                    <input type="text" name="nama_produk" class="form-control" placeholder="Masukan Nama Makanan" required>
                </div>
                <div class="form-group pt-2">
                    <label>Harga</label>
                    <input type="text" name="harga_produk" class="form-control" placeholder="Masukan Harga" required>
                </div>
                <div class="form-group pt-2">
                    <label>Deskripsi</label>
                    <input type="text" name="deskripsi" class="form-control" placeholder="deskripsi..">
                </div>
                <div class="form-group pt-2">
                    <label>Gambar</label>
                    <input type="file" name="gambar_produk" class="form-control" required>
                </div>
                
                <button type="submit"class="btn btn-success" name="simpan">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</body>
</html>