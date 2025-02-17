<?php
include '../koneksi.php';

$query = "SELECT YEAR(tanggal_pembelian) as tahun, MONTH(tanggal_pembelian) AS bulan,SUM(harga_jual)
AS total_penjualan,COUNT(id) AS total_transaksi FROM pembelian GROUP BY YEAR(tanggal_pembelian),MONTH(tanggal_pembelian) 
ORDER BY  tahun DESC,bulan DESC";

$eksekusi = mysqli_query($koneksi, $query);
$rekap= mysqli_fetch_all($eksekusi, MYSQLI_ASSOC); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>halaman rekap per bulan</title>
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
        <?php
        require("navbar-admin.php")
        ?>
        <div class="card">
            <div class="card-body">
                <table class="table-striped table">
                <thead>
                    <tr>
                        <th>no</th>
                        <th>bulan</th>
                        <th>tahun</th>
                        <th>total penjualan</th>
                        <th>total transaksi</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                    $no=1;
                    foreach($rekap as $rekap2)
                     {
                        $bulan_nama = [
                            1 => "Januari", 2 => "Februari", 3 => "Maret", 4 => "April", 5 => "Mei",
                            6 => "Juni", 7 => "Juli", 8 => "Agustus", 9 => "September", 10 => "Oktober",
                            11 => "November", 12 => "Desember"
                        ];
                    ?>
                    <tr>
                        <td><?= $no++?></td>
                        <td><?= $bulan_nama[$rekap2['bulan']] ?></td>
                        <td><?= $rekap2['tahun']?></td>
                        <td><?= $rekap2['total_penjualan']?></td>
                        <td><?= $rekap2['total_transaksi']?> transaksi</td>
                    </tr>
                    <?php 
                    }
                    ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
    
</body>
</html>