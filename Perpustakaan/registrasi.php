<?php
include 'function.php';

if(isset($_POST["register"])) {
    
    if(bikin($_POST) > 0 ){
        echo "<script> alert('user baru berhasil di tambahkan')</script>";
       header("Location:login.php?pesan=daftar");
    } else {
       echo mysqli_error($conn);
    }

}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Akun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> 
</head>
<body>
<h1 style="text-align:center; margin: 20px 0;">Halaman Registrasi</h1>
    <div style="max-width:800px; margin:auto;">
    <form class="row g-3" action="" method="post">
  <div class="col-12">
    <label for="inputEmail4" class="form-label">Username</label>
    <input type="text" class="form-control" id="inputEmail4" name="username" placeholder="Masukan Username Baru">
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Password</label>
    <input type="password" class="form-control" id="inputAddress" placeholder="Isi Password" name="password1">
  </div>
  <div class="col-12">
    <label for="inputAddress2" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="inputAddress2" placeholder="Samakan Password" name="password2">
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary" name="register">Sign in</button>
  </div>
</form>
    </div>
</body>
</html>