<?php
session_start();
error_reporting(0);
include "timeout.php";
include "konfigurasi.php";

//
if (empty($_SESSION['userperpus']) AND empty($_SESSION['passperpus'])){
  echo "<script>window.location = 'index.php'</script>";
}
else{
$pengguna = $_SESSION['userperpus'];
$level = $_SESSION['levelperpus'];	
	
?>

<html >
<head>
<title>Menu PERPUSTAKAAN</title>
</head>
<body>

<h1>MENU PERPUSTAKAAN</h1>
<?php
echo "<h3>Wellcome $pengguna </h3>";

if ($level=="admin") {
echo "<a href='tambahbuku.php'>> tambah daftar buku</a><br><br>";	
}

?>
<a href='pencarian.php?cari=all'>> PENCARIAN BUKU</a>
<br><br>
<a href='daftarbuku.php?id=1'>> DAFTAR BUKU</a>
<br><br><br><br>
<a href='logout.php'>> logout</a>

</body>
</html>
<?php
}
?>
