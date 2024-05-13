<?php
include 'function.php';
session_start();
if(isset($_SESSION["login"])) {
    header("Location:index.php");
    exit;
}

    if(isset($_POST["kirim"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

    $cek = mysqli_query($conn,"SELECT * FROM penjaga_perpus WHERE user = '$username'");
        if( mysqli_num_rows($cek) === 1) {
            $row = mysqli_fetch_assoc($cek);
            if (password_verify($password, $row["password"])) {
                if($row["role"]=="admin") {
                    $_SESSION["user"] = '$username';
                    $_SESSION["role"] ="admin";
                    header("Location:admin.php");
                } else if ($row["role"]=="user") {
                    $_SESSION["user"] = '$username';
                    $_SESSION["role"] =$username;
                    header("Location:index.php");
                }

                $_SESSION["login"] = true;
                exit;
            }
        }

        header("Location:login.php?pesan=gagal");
       
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> <link rel="stylesheet" href="style2.css">
</head>
<body>
    <header>
        <div class="box">
            <h1>Login</h1>
            <form action="" method="post">
                <table>
                    <tr>
                        <td><label for="">Username</label></td>
                        <td><input type="text" name="username"></td>
                    </tr>
                    <tr>
                        
                        <td><label for="">Password</label><input type="password" name="password"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Kirim" name="kirim"></td>
                        <td> <button type="button" class="btn btn-danger" style="width:200px; margin:auto "><a href="registrasi.php" style="color:white; text-decoration:none; display:block; ">Bikin Akun Baru</a></button></td>
                    </tr>
                    <tr>
                </table>
                <div style="text-align:center;">
                <?php
if(isset($_GET['pesan'])) {
    if($_GET['pesan']=="gagal") {
        echo "Login gagal! Username/Password Salah";
    }else if($_GET['pesan']=="logout") {
        echo "Anda Berhasil Logout";
    } else if($_GET['pesan']=="belum_login") {
        echo "anda harus login";
    } else if($_GET['pesan']=="daftar") {
        echo "anda berhasil menambahkan akun";
    }
}
?>
</div>
            </form>
           
    </header>
</body>
</html>