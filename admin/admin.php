<?php
include '../koneksi.php';
session_start();

date_default_timezone_set("Asia/Jakarta");


$query_produk = "SELECT * FROM produk";
$eksekusi_produk = mysqli_query($koneksi, $query_produk);
$data_produk = mysqli_fetch_all($eksekusi_produk, MYSQLI_ASSOC);


$query_history = "SELECT * FROM pembelian ORDER BY tanggal_pembelian DESC LIMIT 4";
$eksekusi_history = mysqli_query($koneksi, $query_history);
$data_history = mysqli_fetch_all($eksekusi_history, MYSQLI_ASSOC);

// Query untuk total pembelian hari ini
$pembelian_hari_ini = "SELECT SUM(harga_jual) AS total_today FROM pembelian WHERE tanggal_pembelian = CURDATE()";
$eksekusi_pembelian = mysqli_query($koneksi, $pembelian_hari_ini);
$data_pembelian = mysqli_fetch_assoc($eksekusi_pembelian);

// Query untuk total pembelian bulan ini
$bulan_ini = date('Y-m');
$pembelian_bulan_ini = "SELECT SUM(harga_jual) AS total_today FROM pembelian WHERE DATE_FORMAT(tanggal_pembelian,'%Y-%m') = '$bulan_ini'";

$eksekusi_pembelian2 = mysqli_query($koneksi, $pembelian_bulan_ini);
$data_pembelian2 = mysqli_fetch_assoc($eksekusi_pembelian2);


$query_transaksi = "SELECT * FROM pembelian where tanggal_pembelian= CURDATE()";
$eksekusi_transaksi = mysqli_query($koneksi, $query_transaksi);
$data_transaksi = mysqli_fetch_all($eksekusi_transaksi, MYSQLI_ASSOC);

$query_transaksi2 = "SELECT * FROM pembelian order by tanggal_pembelian desc limit 5";
$eksekusi_transaksi2 = mysqli_query($koneksi, $query_transaksi2);
$data_transaksi2 = mysqli_fetch_all($eksekusi_transaksi2, MYSQLI_ASSOC);

// Mengecek dan menampilkan hasil
// echo "Total Pembelian Hari Ini: " . ($data_pembelian['total_today'] ? $data_pembelian['total_today'] : 0) . "<br>";
// echo "Total Pembelian Bulan Ini: " . ($data_pembelian2['total_today'] ? $data_pembelian2['total_today'] : 0);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Awal Petugas</title>
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
  <?php require_once('navbar-admin.php'); ?>
  <div class="container">
<div class="col-lg-12">
  <div class="row">
    <div class="col-md-3 mt-5">
      <div class="card">
        <div class="card-body">
            <h4>penjualan hari ini</h4> 
            <h5><?=$data_pembelian['total_today'] ?? '0'?></h5>
        </div>
      </div>
    </div>
    <div class="col-md-3 mt-5">
      <div class="card">
        <div class="card-body">
            <h4>penjualan bulan ini</h4> 
            <h5><?=$data_pembelian2['total_today'] ?? '0'?></h5>
        </div>
      </div>
    </div>
    <div class="col-md-3 mt-5">
      <div class="card">
        <div class="card-body">
            <h4>total produk</h4> 
            <h5><?=count($data_produk)?></h5>
        </div>
      </div>
    </div>
    <div class="col-md-3 mt-5">
      <div class="card">
        <div class="card-body">
            <h4>transaksi hari ini</h4> 
            <h5><?=count($data_transaksi)?></h5>
        </div>
      </div>
    </div>
    <table class="table table-striped mt-5">
      <thead>
        <tr>
          <th>no</th>
          <th>kode pembelian</th>
          <th>tanggal pembelian</th>
          <th>total</th>
          <th>aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no=1;
        foreach($data_transaksi2 as $dt) {
        ?>
        <tr>
          <td><?=$no++?></td>
          <td><?=$dt['kode_pembelian']?></td>
          <td><?=$dt['tanggal_pembelian']?></td>  
          <td><?=$dt['harga_jual']?></td>  
          <td><a href="detail_transaksi.php?kode_pembelian=<?=$dt['kode_pembelian']?>" class="btn btn-primary"><i class="bi bi-eye"></i></a></td>
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
