<?php
session_start();
include '../koneksi.php';

$query = "select * from produk";
$eksekusi = mysqli_query($koneksi, $query);
$data = mysqli_fetch_all($eksekusi, MYSQLI_ASSOC);
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

    <table class="table table-bordered table-striped mt-5">
      <tr>
        <th>NO</th>
        <th>KODE PRODUK</th>
        <th>NAMA</th>
        <th>STOK</th>
        <th>HARGA</th>
        <th>AKSI</th>
      </tr>
      <?php
    $no=1;
    foreach($data as $data){
    ?>
      <tr>
        <td><?=$no++?></td>
        <td><?=$data['kode_produk']?></td>
        <td><?=$data['nama_produk']?></td>
        <td><?=$data['stok']?></td>
        <td><?=$data['harga']?></td>
        <td>
      
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?=$data['id']?>">
            <i class="bi bi-pencil-square"></i>
          </button>

          <!-- Modal -->
          <div class="modal fade" id="edit<?=$data['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit barang</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="" method="post">
                    <input type="hidden" name="id" value="<?=$data['id']?>">
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Kode barang</label>
                      <input type="text" name="kode_produk" readonly value="<?=$data['kode_produk']?>" class="form-control"
                        id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Nama barang</label>
                      <input type="text" name="nama_produk" readonly value="<?=$data['nama_produk']?>" class="form-control"
                        id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Stok barang</label>
                      <input type="text" name="stok" value="<?=$data['stok']?>" class="form-control"
                        id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Harga barang</label>
                      <input type="text" name="harga" readonly value="<?=$data['harga']?>" class="form-control"
                        id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" name="btn-update" class="btn btn-primary">Save changes</button>
                </div>
                </form>
              </div>
            </div>
          </div>
          
        </td>
      </tr>
      <?php
        }
        ?>
    </table>

  </div>


</body>

</html>
<?php
if (isset($_POST['btn-update'])): 
    include('../koneksi.php'); 

    $stok = htmlspecialchars($_POST['stok']);
    $id = htmlspecialchars($_POST['id']);
  

    
    $tanggal_pembelian = date('Y-m-d');
    
    $log_stok ="INSERT INTO log_stok (id_produk,keterangan,tanggal,kode_pembelian) 
    VALUES ('$id', 'stok diubah menjadi $stok','$tanggal_pembelian','---')";
    $log_eksekusi = mysqli_query($koneksi, $log_stok);

    $query = "UPDATE produk SET 
                stok = '$stok' 
              WHERE id = '$id'";

    $eksekusi = mysqli_query($koneksi, $query);
    if ($eksekusi) {
        echo "<script>
            alert('edit berhasil') 
            window.location = 'stok.php';
            </script>";
    } else {
        echo "Registrasi gagal: " . mysqli_error($koneksi); // Menampilkan error jika query gagal
    }
endif;
?>
