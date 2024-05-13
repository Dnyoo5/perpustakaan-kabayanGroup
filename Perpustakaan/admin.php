<?php
include 'function.php';

session_start();
if(!isset($_SESSION["login"])) {
  header("Location:login.php");
  exit;
}

$result = mysqli_query($conn,"SELECT * FROM buku");
// 
if(isset($_POST["cari"])) {
  $kata = $_POST["keyword"];
  $result = mysqli_query($conn,"SELECT * FROM buku WHERE nrp LIKE '%$kata%' OR nama LIKE '%$kata%' OR email LIKE '%$kata%' OR jurusan LIKE '%$kata%' ORDER BY id DESC ");
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Halaman Admin</title>

</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary ">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="#">Perpustakaan</a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="data.php">Data Buku</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="peminjaman.php">Peminjaman</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tambah.php">Tambah Buku</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="anggota.php">Anggota</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Keluar</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit" name="cari">Search</button>
      </form>
    </div>
  </div>
</nav>

<section class="home">
  <div class="isi">
  </div>
</section>

<div class="container">
        <h2>Perpustakaan</h2>
        <div class="work">
          <h3>Jenis Jenis Buku</h3>
          <div class="work-parent">    
<?php
while($row=mysqli_fetch_assoc($result)) { ?>
       
                <div class="img">
                <a href="jadwal.php"><img src="img/<?= $row["gambar"] ;?>" width="250px" alt=""></a>
             
                  <h4 style="padding:5px;">Nama Buku: <?= $row["nama"]; ?></h4>
                <p style="padding:5px;">Kategori Buku: <b><?= $row["kategori_buku"] ;?></b></p>
                <p style="padding:5px;">Stok Barang: <?= $row["stok buku"];?></p>
                <p style="padding:5px;">Tahun Buku: <?= $row["tahun_buku"];?></p>
                <div class="pinjam">
                <a href="peminjaman.php?id=<?= $row["id_buku"]; ?>">Pinjam</a>
              </div>
</div>
          
            <?php  }?>
        </div>
    </div>
</body>
</html>