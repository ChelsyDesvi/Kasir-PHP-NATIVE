<?php
    include "koneksi.php";

    if(isset($_POST['login'])){
        
        $username= $_POST['username']; 
        $password= md5 ($_POST['password']);

        $query="SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        $eksekusi = mysqli_query($koneksi,$query);
        $data = mysqli_fetch_assoc($eksekusi);

        $jumlah_data = mysqli_num_rows($eksekusi);

        if ($jumlah_data == 1){

            session_start();
            $_SESSION['id'] = $data['id'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['role'] = $data['role'];

            if($data['role']=='admin') {
                 header('location: admin/admin.php');
            } else {
                header('location: petugas/petugas.php');
            }
        } else {
            echo "<script>
            alert('login gagal,tolong cek password anda') 
            window.location = 'index.php';
            </script>";
        }
     }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>halaman login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
        <div class="card mb-3">

          <div class="card-body">

            <div class="pt-4 pb-2">
              <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
              <p class="text-center small">Enter your username &amp; password to login</p>
              <div id="autohide">

              </div>
            </div>

            <form class="row g-3 needs-validation" method="post" action="">

              <div class="col-12">
                <label for="yourUsername" class="form-label">Username</label>
                <div class="input-group has-validation">
                  <input type="text" name="username" class="form-control" id="yourUsername" required="">
                  <div class="invalid-feedback">Please enter your username.</div>
                </div>
              </div>

              <div class="col-12">
                <label for="yourPassword" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="yourPassword" required="">
                <div class="invalid-feedback">Please enter your password!</div>
              </div>
              <div class="col-12">
                <button class="btn btn-primary w-100" type="submit" name="login">Login</button>
              </div>
             
            </form>

          </div>
        </div>

      </div>

    </div>
  </div>
  </section>

</body>

</html>