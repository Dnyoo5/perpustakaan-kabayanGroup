<?php

$local = "localhost";
$root = "root";
$pass = "";
$db = "perpustakaan";

$conn = mysqli_connect($local,$root,$pass,$db);

if(!$conn) {
    die("database eror:".mysqli_connect_eror());
};

function query($query) {
  global $conn;
  $result = mysqli_query($conn,$query);
  $rows = [];
  while($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
  }
  return $rows;
} 

function bikin($data) {
    global $conn;
    $username = strtolower(stripslashes($data["username"]));
    $password1 = mysqli_real_escape_string($conn,$data["password1"]);
    $password2 = mysqli_real_escape_string($conn,$data["password2"]);
    $role = "user";

  $result=  mysqli_query($conn, "SELECT user FROM penjaga_perpus WHERE user = '$username'");
  if(mysqli_fetch_assoc($result)) {
    echo "<script>alert('username yang dpilih sudah terdaftar')</script>";
    return false;
  }

    if($password1 !== $password2 ) {
        echo "<script>alert('Password tidak sesuai')</script>";
        return false;
    }

    // enkripsi password
    $password1 = password_hash($password1, PASSWORD_DEFAULT);


    mysqli_query($conn,"INSERT INTO penjaga_perpus VALUES('', '$username','$password1','$role')");

    return mysqli_affected_rows($conn);

}



function tambah($data) {
  global $conn;
  $kode = htmlspecialchars($data["kode"]);
  $kategori = htmlspecialchars($data["kategori"]);
$nama = htmlspecialchars($data["nama"]);
  $stok = htmlspecialchars($data["stok"]);
  $tahun= htmlspecialchars($data["tahun"]);

// funsi upload

$gambar = upload();
if(!$gambar) {
  return false;
}

$result = mysqli_query($conn, "INSERT INTO buku VALUES('id','$gambar','$nama','$kode','$kategori','$stok','$tahun')");

return mysqli_affected_rows($conn);


}


function upload() {
  $namaFile = $_FILES["gambar"]["name"];
  $ukuran = $_FILES["gambar"]["size"];
  $eror = $_FILES["gambar"]["error"];
  $tmpName = $_FILES["gambar"]["tmp_name"];
  

  // cek apakah ada gambar

  if($eror === 4) {
      echo "<script>alert('Pilih gambar terlebih dahulu')</script>";
      return false;
  }

  // cek gambar apa bukan??
  $ekstensiGambarValid =['jpg','jpeg','png'];
  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));
  

  if(!in_array($ekstensiGambar,$ekstensiGambarValid)) {

      echo "<script>alert('yang di upload bukan gambar')</script>";
      return false;

}   

// cek ukuran terlalu besar 

  if($ukuran > 1000000) {
      echo "<script>alert('gambar terlalu besar ')</script>";
      return false;
  }

  // lolos
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar; 

 move_uploaded_file($tmpName, 'img/'.$namaFileBaru);
  return $namaFileBaru;

};


function hapus($id) {
  global $conn;
  mysqli_query($conn, "DELETE FROM buku WHERE id_buku = $id");
  return mysqli_affected_rows($conn);
}

function ubah($data) {
  global $conn;
  $id = $data["id"];
  $nama = htmlspecialchars($data["nama"]);
  $kode = htmlspecialchars($data["kode"]);
  $kategori = htmlspecialchars($data["kategori"]);
  $stok= htmlspecialchars($data["stok"]);
  $tahun= htmlspecialchars($data["tahun"]);
  $gambarLama = htmlspecialchars($data["gambarLama"]);

  // cek
  if($_FILES['gambar']['error'] === 4) {
      $gambar = $gambarLama;
  } else {
      $gambar = upload(); 
  }
 

  
  $result = mysqli_query($conn,"UPDATE buku SET nama='$nama',gambar='$gambar',kode_buku='$kode',kategori_buku='$kategori',stok buku ='$stok',tahun_buku='$tahun' WHERE id_buku = $id");


return mysqli_affected_rows($conn);
}




function pinjam($data) {
  global $conn;
  $buku = htmlspecialchars($data["Buku"]);
  $jumlah = htmlspecialchars($data["jumlah"]);
  $nama = htmlspecialchars($data["nama"]);
  $alamat = htmlspecialchars($data["alamat"]);
  $kontak= htmlspecialchars($data["kontak"]);
  $tanggal= htmlspecialchars($data["tanggal"]);

// funsi upload

$result = mysqli_query($conn, "INSERT INTO peminjaman VALUES('id','$buku','$jumlah','$nama','$alamat','$kontak','$tanggal')");

return mysqli_affected_rows($conn);


}

?>