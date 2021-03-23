<?php 
	include ("koneksi.php");
?>
<!doctype html>
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
        table{
            border: 1px solid #d4d6d6;
            border-collapse: collapse;
            border-spacing:0;
            width:70%;
            margin: 10px auto 10px auto;
        }
        table thead th{
            background-color:#ddefef;
            border: 1px solid #ddeeee;
            text-align:left;
            padding:10px;
        }
        table tbody td{
            border:1px solid #d4d6d6;
            padding:10px;
        }
        a{
            background-color:#ff0000;
            padding:10px;
            font-size:11px;
            color:white;
            text-decoration:none;
        }
    </style>
</head>

<body>
    
        <br>
    <center><a href="tambah_produk.php">+ Tambah Produk</a></center>
    <div class="container">
    <table>
        <thead>
        <tr>
            <th>No.</th>
            <th>Produk</th>
            <th>deskripsi</th>
            <th>harga</th>
            <th>gambar</th>
            <th>action</th>
        </tr>
        </thead>
        <tbody>
            <?php
                $query = "SELECT * FROM produk ORDER BY id ASC";
                $result = mysqli_query($koneksi,$query);

                

                $no = 1;

                while ($row = mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $row['nama_produk']; ?></td>
                <td><?php echo substr($row['deskripsi'], 0, 20); ?>...</td>
                <td><?php echo number_format ($row['harga_produk'], 0,',','.'); ?></td>
                <td><img style ="width:100px"src="gambar/<?php echo $row['gambar_produk']; ?>"></td>
                <td>
                    <a href="edit_produk.php?id=<?php echo $row['id'];?>">edit</a>
                    <a href="proses_hapus.php?id=<?php echo $row['id'];?>" onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')">Hapus</a>
                </td>

            </tr>
            <?php
            $no++;
                }
            ?>
        </tbody>
    </table>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>

</body>

</html>