<?php
session_start();

include('../koneksi.php');

$kode_pembelian= $_GET['kode_pembelian'];
$detail_pembelian = "SELECT * FROM detail_pembelian dp 
LEFT JOIN pembelian p ON dp.kode_pembelian=p.kode_pembelian
LEFT JOIN produk r ON dp.produk_id=r.id
LEFT JOIN user u ON p.user_id=u.id
WHERE dp.kode_pembelian= ".$kode_pembelian;
$eksekusi_detail_pembelian = mysqli_query($koneksi, $detail_pembelian);
$eksekusi_dp_2 = mysqli_fetch_all($eksekusi_detail_pembelian, MYSQLI_ASSOC);


$data_petugas= "SELECT * FROM pembelian p
LEFT JOIN user u ON u.id=p.user_id where kode_pembelian= ".$kode_pembelian;

$eksekusi_data_petugas = mysqli_query($koneksi,$data_petugas);
$eksekusi2 = mysqli_fetch_assoc($eksekusi_data_petugas);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>..........</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>

    <?php
    require_once('navbar-admin.php');
    ?>
    <div class="container">
        <div class="card mt-5">
            <div class="card-body"> 
                <div class="row">
                    <div class="col-md-4"> 
                        <label for="" class="form-label">
                            kode pembelian
                        </label>
                        <input readonly type="text" class="form-control" value="<?= $kode_pembelian?>">
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">
                            nama petugas
                        </label>
                        <input readonly type="text" class="form-control" value="<?= $eksekusi2['username']?>">
                    </div>
                    <div class="col-md-4"> 
                        <label for="" class="form-label">
                            tanggal
                        </label>
                        <input readonly type="text" class="form-control" value="<?= $eksekusi2['tanggal_pembelian']?>">
                    </div>
                    <table class="table-striped table mt-5">
                        <thead>
                            <tr>
                                <th>no</th>
                                <th>kode produk</th>
                                <th>nama produk</th>
                                <th>jumlah</th>
                                <th>harga satuan</th>
                                <th>harga total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                                    $no=1;
                                                    foreach($eksekusi_dp_2 as $detail) {

                                                    ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$detail['kode_produk']?></td>
                                <td><?=$detail['nama_produk']?></td>
                                <td><?=$detail['jumlah']?></td>
                                <td><?=$detail['harga']?></td>
                                <td><?=$detail['harga'] * $detail['jumlah']?></td>
                            </tr>

                            <?php
                                                     }
                                                    ?>
                            <tr>
                                <td>total</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td colspan="3"><?=$detail['harga_jual']?></td>
                            </tr>
                            <tr>
                                <td>harga bayar</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td colspan="3"><?=$detail['harga_bayar']?></td>
                            </tr>
                            <tr>
                                <td>kembalian</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td colspan="3"><?=$detail['kembalian']?></td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
 
</body>

</html>