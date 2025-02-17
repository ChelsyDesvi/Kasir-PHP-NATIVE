<?php
if (isset($_POST['register'])): 
    include('koneksi.php'); 

    $username = htmlspecialchars($_POST['username']);
    $password = md5($_POST['password']);
    $role = htmlspecialchars($_POST['role']); // Ambil role dari form

    // Query untuk memasukkan data ke database
    $query = "INSERT INTO user (username, password, role) VALUES ('$username', '$password', '$role')";
    $eksekusi = mysqli_query($koneksi, $query);

    if ($eksekusi) {
        header('location:login.php'); // Redirect ke halaman login setelah berhasil
    } else {
        echo "Registrasi gagal: " . mysqli_error($koneksi); // Menampilkan error jika query gagal
    }
endif;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Register</title>
</head>

<body>
    <form action="" method="POST">
        <input type="text" name="username" placeholder="Masukkan username" required>
        <input type="password" name="password" placeholder="Masukkan password" required>
        <select name="role" required>
            <option value="admin">Admin</option>
            <option value="petugas">Petugas</option>
        </select>
        <input type="submit" name="register" value="Register">
    </form>
</body>

</html>