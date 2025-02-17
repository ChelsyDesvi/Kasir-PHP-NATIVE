<?php
include('koneksi.php');
$kode_pembelian= $_GET['kode_pembelian'];
$data_petugas= "SELECT * FROM pembelian p
LEFT JOIN user u ON u.id=p.user_id where kode_pembelian= ".$kode_pembelian;

$eksekusi_data_petugas = mysqli_query($koneksi,$data_petugas);
$eksekusi2 = mysqli_fetch_assoc($eksekusi_data_petugas);

$detail_pembelian = "SELECT * FROM detail_pembelian dp 
LEFT JOIN pembelian p ON dp.kode_pembelian=p.kode_pembelian
LEFT JOIN produk r ON dp.produk_id=r.id
LEFT JOIN user u ON p.user_id=u.id
WHERE dp.kode_pembelian= ".$kode_pembelian;
$eksekusi_detail_pembelian = mysqli_query($koneksi, $detail_pembelian);
$eksekusi_dp_2 = mysqli_fetch_all($eksekusi_detail_pembelian, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nota pembayaran</title>
</head>

<body>
    <table>
        kasir
    </table>
    <table>
        <td>=============================</td>
    </table>
    <table>
        <tr>
        <td>nama petugas</td>
        <td>:</td>
        <td><?= $eksekusi2['username']?></td>
        </tr>
        <tr>
            <td>tanggal</td>
            <td>:</td>
            <td><?= $eksekusi2['tanggal_pembelian']?></td>
        </tr>
        <tr>
            <td>nota</td>
            <td>:</td>
            <td><?= $eksekusi2['kode_pembelian']?></td>
        </tr>

    </table>
    <table>
        <td>=============================</td>
    </table>
    <table>
        <tr>
            <td>kode - nama produk</td>
        </tr>
    </table>
    <table>
        <tr>
            <td>no</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>jumlah</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>harga</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>total</td>
        </tr>
    </table>
    <table>
        <td>=============================</td>
    </table>
    <?php
    $no=1;
    foreach($eksekusi_dp_2 as $detail) {
    ?>
    <table>
        <tr>
            <td><?=$detail['kode_produk']?>-<?= $detail['nama_produk']?></td>
        </tr>
    </table>
    <table>
        <tr>
            <td><?= $no++?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><?= $detail['jumlah']?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><?= $detail['harga']?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><?= $detail['jumlah'] * $detail['harga']?></td>
        </tr>
    </table>
    

    <?php
    }
    ?>
    <table>
        <td>=============================</td>
    </table>
    <table>
    <tr>
        <td>total belanja</td>
        <td>:</td>
        <td><?= $eksekusi2['harga_jual']?></td>
        </tr>
    </table>
    <table>
    <tr>
        <td>total bayar</td>
        <td>:</td>
        <td><?= $eksekusi2['harga_bayar']?></td>
        </tr>
    </table>
    <table>
    <tr>
        <td>kembalian</td>
        <td>:</td>
        <td><?= $eksekusi2['kembalian']?></td>
        </tr>
    </table>

    <script>
        window.print();
    </script>
</body>

</html>