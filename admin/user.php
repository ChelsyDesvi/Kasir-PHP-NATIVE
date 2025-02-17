<?php
 session_start();
if (isset($_POST['btn-tambah'])): 
    include('../koneksi.php'); 
  
   

    $username = htmlspecialchars($_POST['username']);
    $password = md5($_POST['password']);
    $role = htmlspecialchars($_POST['role']); 

    $query = "INSERT INTO user (username, password, role) VALUES ('$username', '$password', '$role')";
    $eksekusi = mysqli_query($koneksi, $query);

    if ($eksekusi) {
        echo "<script>
            alert('tambah user berhasil') 
            window.location = 'user.php';
            </script>";
    } else {
        echo "Registrasi gagal: " . mysqli_error($koneksi); // Menampilkan error jika query gagal
    }
endif;
?>
<?php
include '../koneksi.php';

$query = "select * from user";
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
    require_once('navbar-admin.php');
    ?>
        <div class="float-end mt-5">
        
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                tambah user
            </button>

        </div>
        <!-- modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambahkan User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">username</label>
                                <input type="text" name="username" class="form-control" id="exampleFormControlInput1"
                                    placeholder="name@example.com">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">password</label>
                                <input type="password" name="password" class="form-control" id="exampleFormControlInput1"
                                    placeholder="name@example.com">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">role</label>
                                <select name="role" id="" class="form-control">
                                    <option value="admin">admin</option>
                                    <option value="petugas">petugas</option>
                                </select>
                            </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="btn-tambah" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <table class="table-bordered table-striped table">
            <thead>
                <tr>
                    <th>no</th>
                    <th>username</th>
                    <th>role</th>
                </tr>
            </thead>
            <?php
    $no=1;
    foreach($data as $data){
    ?>
                <tr>
                    <td><?=$no++?></td>
                    <td><?=$data['username']?></td>
                    <td><?=$data['role']?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    </div>

</body>

</html>
<?php
if (isset($_POST['btn-update'])): 
    include('../koneksi.php'); 

    $kode_produk = htmlspecialchars($_POST['kode_produk']);
    $nama_produk = htmlspecialchars($_POST['nama_produk']);
    $stok = htmlspecialchars($_POST['stok']);
    $harga = htmlspecialchars($_POST['harga']);
    $id = htmlspecialchars($_POST['id']);
  

    $query = "UPDATE produk SET 
                kode_produk = '$kode_produk', 
                nama_produk = '$nama_produk', 
                stok = '$stok', 
                harga = '$harga' 
              WHERE id = '$id'";

    $eksekusi = mysqli_query($koneksi, $query);
    if ($eksekusi) {
        echo "<script>
            alert('edit berhasil') 
            window.location = 'barang.php';
            </script>";
    } else {
        echo "Registrasi gagal: " . mysqli_error($koneksi); // Menampilkan error jika query gagal
    }
endif;
?>