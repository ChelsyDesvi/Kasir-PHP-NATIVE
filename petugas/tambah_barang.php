<?php
include "../koneksi.php";
if (isset($_POST['simpan'])) {
   
    $kode_produk = $_POST['kode_produk'];
    $nama_produk = $_POST['nama_produk'];
    $stok= $_POST['stok'];
    $harga = $_POST['harga'];
    
    $query = "INSERT INTO produk (kode_produk, nama_produk, stok, harga) VALUES ('$kode_produk','$nama_produk','$stok','$harga')";
    $eksekusi = mysqli_query($koneksi, $query);
    if ($eksekusi) {
        echo "<script> alert('Berhasil menambahkan produk Baru!'); window.location.replace('petugas.php'); </script>";
    } else {
        echo "Ada masalah";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> halaman tambah barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</head>

<body>

    <div class="container">
    <h2 class="mb-4 mt-6">Tambah Barang</h2>
        <div class="card">
            <div class="card-body">
            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <label for="" class="form-label">kode produk</label>
                        <input class="form-control" type="text" name="kode_produk" placeholder="masukkan kode produk">
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">nama produk</label>
                        <input class="form-control" type="text" name="nama_produk" placeholder="masukkan nama produk">
                    </div>

                    <div class="col-md-6">
                        <label for="" class="form-label">jumlah stok</label>
                        <input class="form-control" type="text" name="stok" placeholder="masukkan stok">
                    </div>

                    <div class="col-md-6">
                        <label for="" class="form-label">harga produk</label>
                        <input class="form-control" type="text" name="harga" placeholder="masukkan harga produk">
                    </div>

                    <div class="col-md-6 mt-5 ">
                        <input class="btn btn-info" type="submit" name="simpan" placeholder="Simpan">
                    </div>
                    </form>



                </div>
            </div>
        </div>
    </div>
    
      
</body>

</html>