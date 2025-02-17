<?php
include ('../koneksi.php');
session_start();
$data = "SELECT * FROM produk";

$eksekusi = mysqli_query($koneksi, $data);
$pembelian = mysqli_fetch_all($eksekusi, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>halaman awal</title>
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

    <?php
    require_once('navbar-admin.php');
    ?>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>kode produk</th>
                            <th>nama barang</th>
                            <th>stok</th>
                            <th>history</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    $no=1;
                    foreach($pembelian as $data) {
                    ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$data['kode_produk']?></td>
                            <td><?=$data['nama_produk']?></td>
                            <td><?=$data['stok']?></td>
                            <td><button data-bs-target="#history<?=$data['kode_produk']?>" data-bs-toggle="modal"
                                    class="btn btn-info" type="button"><i class="bi bi-clock"></i></button></td>

                        </tr>
                        <!-- Modal -->
                        <?php
                          $data_stok ="SELECT * FROM log_stok ls 
LEFT JOIN produk p ON p.id = ls.id_produk WHERE p.kode_produk= ".$data['kode_produk']. " order by tanggal desc  " ;


$eksekusi = mysqli_query($koneksi, $data_stok);
$pembelian = mysqli_fetch_all($eksekusi, MYSQLI_ASSOC);
                         ?>
                        <div class="modal fade" id="history<?=$data['kode_produk']?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">history stok produk</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <?php
                                        foreach($pembelian as $stok){
                                        ?>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p><?=$stok['nama_produk']?></p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><?=$stok['keterangan']?></p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><?=$stok['tanggal']?></p>
                                            </div>
                                        </div>
                                        <?php 
                                        }
                                        ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
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