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
                 header('location: admin.php');
            } else {
                header('location: petugas.php');
            }
        } else {
            echo "<script>
            alert('login gagal,tolong cek password anda') 
            window.location = 'login.php';
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
</head>

<body>
    <form action="" method="POST">
    <input type="text" name="username" placeholder="Masukkan username" required>
        <input type="password" name="password" placeholder="Masukkan password" required>
        <select name="role" required>
            <option value="admin">Admin</option>
            <option value="petugas">Petugas</option>
        </select>
        <input type="submit" name="login" value="login">
        <a href="register.php"><button>register</button></a>
    </form>

</body>

</html>