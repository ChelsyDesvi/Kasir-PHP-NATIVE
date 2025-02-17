<?php
session_start();
include '../koneksi.php';

$query = "select * from produk where stok >0";
$eksekusi = mysqli_query($koneksi, $query);
$data = mysqli_fetch_all($eksekusi, MYSQLI_ASSOC);
$data_produk ='SELECT * FROM temp t
left JOIN produk p ON t.id_produk = p.id
where id_user='.$_SESSION['id'];
$eksekusi_2 = mysqli_query($koneksi, $data_produk);
$cc = mysqli_fetch_all($eksekusi_2, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>data barang</title>
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
    </body>
</head>

<body>
    <div class="container">
  
    <?php
    require_once('navbar-petugas.php');
    ?>
      <h2 class="mb-4">Transaksi Barang</h2>
        <div class="card mt-3">
            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">

                        <label for="" class="form-label"> nama barang </label>
                        <select name="id_produk" id="" class="form-control">
                            <?php
                foreach ($data as $aa) {
                ?>
                            <option value="<?= $aa['id']?>"> <?= $aa['nama_produk']?></option>
                            <?php
                }
                ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label"> jumlah </label>
                        <input name="jumlah" id="" class="form-control"></input>
                    </div>
                    <button type="submit" name="tambah-temp" class="btn btn-info">tambah</button>
                </form>
                <div class="mt-5">
                    <table class="table-striped table">
                        <thead>
                            <tr>
                                <th>nama produk</th>
                                <th>jumlah</th>
                                <th>harga satuan</th>
                                <th>harga sub total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                    $total = 0; //inisialisasi variabel

                    foreach($cc as $dd) {
                    ?>
                            <tr>
                                <td><?=$dd['nama_produk']?></td>
                                <td><?=$dd['jumlah']?></td>
                                <td><?=$dd['harga']?></td>
                                <td><?=$dd['jumlah']* $dd['harga']?></td>
                            </tr>
                            <?php
                    $total = $total + $dd['harga'] * $dd['jumlah'];
                    }
                    ?>
                            <tr>
                                <td>total</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td colspan="3"><?=$total?></td>
                            </tr>
                        </tbody>
                    </table>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="" class="form-label"> harga bayar </label>
                            <input type="hidden" name="id_user" value="<?=$_SESSION['id']?>">
                            <input name="harga_bayar" id="" class="form-control"></input>
                        </div>
                        <button type="submit" name="simpan-transaksi" class="btn btn-info">simpan transaksi</button>
                    </form>
                </div>
            </div>
        </div>



    </div>


</body>

</html>
<?php
if (isset($_POST['tambah-temp'])): 
    include('../koneksi.php'); 

    $id_produk = htmlspecialchars($_POST['id_produk']);
    $jumlah = htmlspecialchars($_POST['jumlah']);
  
    $id_user = $_SESSION['id'] ;
    $query = "INSERT INTO temp (id_produk, jumlah, id_user) VALUES ('$id_produk','$jumlah',$id_user)";

    $eksekusi = mysqli_query($koneksi, $query);
    if ($eksekusi) {
        echo "<script> 
            window.location = 'transaksi.php';
            </script>";
    } else {
        echo "Registrasi gagal: " . mysqli_error($koneksi); // Menampilkan error jika query gagal
    }
endif;
?>

<?php
if (isset($_POST['simpan-transaksi'])): 
    include('../koneksi.php');

    $temp ='SELECT * FROM temp t
    left JOIN produk p ON t.id_produk = p.id
    where id_user='.$_SESSION['id'];
    $eksekusi_temp = mysqli_query($koneksi, $temp);
    $data_temp = mysqli_fetch_all($eksekusi_temp, MYSQLI_ASSOC); 
    $total = 0;
    $kode_pembelian = date('YmdHis');
    $tanggal_pembelian = date('Y-m-d');

    foreach($data_temp as $data_temp2) { 
        $id_produk = $data_temp2['id_produk'] ;
        $jumlah = $data_temp2['jumlah'] ;
        $sub_total_harga = $jumlah * $data_temp2['harga'] ;
        $total = $total + $data_temp2['harga'] * $data_temp2['jumlah'];
        $tambah_pembelian = "INSERT INTO detail_pembelian(produk_id, jumlah , sub_total_harga, kode_pembelian)
        VALUES ('$id_produk', '$jumlah', '$sub_total_harga', '$kode_pembelian')";

        $eksekusi_tambah_pembelian = mysqli_query($koneksi, $tambah_pembelian);
        $stok = $data_temp2['stok'] - $data_temp2['jumlah'];
        $update_stok = "UPDATE produk SET stok = ". $stok." where id = ".$id_produk;
        $eksekusi_update_stok = mysqli_query($koneksi , $update_stok);
        $hapus_temp = "DELETE FROM temp where id_user = ". $data_temp2['id_user'];
        $eksekusi_hapus_temp = mysqli_query ($koneksi,$hapus_temp);

        $log_stok = "INSERT INTO log_stok (id_produk,keterangan,tanggal,kode_pembelian) 
        VALUES ('$id_produk', 'stok diubah menjadi $stok','$tanggal_pembelian','$kode_pembelian')";
        $log_eksekusi = mysqli_query($koneksi, $log_stok);
    }
    $harga_bayar = htmlspecialchars($_POST['harga_bayar']); 
    $harga_jual = $total ;
    
    $id_user =  htmlspecialchars($_POST['id_user']);
    $kembalian = $harga_bayar - $harga_jual ;
    $tambah_pembelian2 =  "INSERT INTO pembelian(harga_bayar, harga_jual, kembalian, kode_pembelian,tanggal_pembelian,user_id)
    VALUES ('$harga_bayar', '$harga_jual', '$kembalian','$kode_pembelian','$tanggal_pembelian','$id_user')";
    $eksekusi_tambah_pembelian2 = mysqli_query($koneksi,$tambah_pembelian2);

    if ($eksekusi_tambah_pembelian2) {
        echo "<script>
            window.location = '../nota.php?kode_pembelian='+ '$kode_pembelian';
            </script>";
            
    } else {
        echo "Registrasi gagal: " . mysqli_error($koneksi); // Menampilkan error jika query gagal
    }
    
endif;
?>
