<?php
include ('../koneksi.php');
session_start();
$data ="SELECT * FROM pembelian p 
LEFT JOIN user u ON p.user_id = u.id" ;

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
                            <th>nama petugas</th>
                            <th>tanggal pembelian</th>
                            <th>kode pembelian</th>
                            <th>harga jual</th>
                            <th>harga bayar</th>
                            <th>kembalian</th>
                            <th>detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    $no=1;
                    foreach($pembelian as $data) {
                    ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$data['username']?></td>
                            <td><?=$data['tanggal_pembelian']?></td>
                            <td><?=$data['kode_pembelian']?></td>
                            <td><?=$data['harga_jual']?></td>
                            <td><?=$data['harga_bayar']?></td>
                            <td><?=$data['kembalian']?></td>
                            <td>
                                <a href="detail_transaksi.php?kode_pembelian=<?=$data['kode_pembelian']?>" class="btn btn-info"><i class="bi bi-eye"></i></a>
                                <a href="../nota.php?kode_pembelian=<?=$data['kode_pembelian']?>"target="_blank" class="btn btn-danger"><i class="bi bi-printer"></i></a>
                            
                            </td>
                        </tr>
                        <!-- Modal -->
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