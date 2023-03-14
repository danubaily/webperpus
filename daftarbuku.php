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

$sql=mysqli_query($conn, "SELECT * FROM buku WHERE id='$_GET[id]'");
$buku=mysqli_fetch_array($sql);
?>

<html >
<head>
<title>Menu DAFTAR BUKU</title>
</head>
<body>

<h1>MENU DAFTAR BUKU</h1>
<a href='menu.php'>> Kembali ke menu</a><br><br>

<?php
$tambahhalaman = $_GET['id'] +1 ;
$kuranghalaman = $_GET['id'] - 1;

$linktambah = "daftarbuku.php?id=".$tambahhalaman ;
$linkkurang = "daftarbuku.php?id=".$kuranghalaman ;
 
 echo "<img src='gambar/$buku[gambar]' width='500px'>";
echo "JUDUL BUKU ".$buku['judul'];
echo "<br><br>";
echo "Pengarang ".$buku['pengarang'];
echo "<br><br>";
echo "PENERBIT ".$buku['penerbit'];
echo "<br><br>";
echo "Kategori ".$buku['kategori'];
echo "<br><br>";
echo "Lokasi ".$buku['lokasi'];
echo "<br><br>";
echo "Stok ".$buku['stok'];
echo "<br><br>";

echo "<a href='$linkkurang'>halaman sebelumnnya </a> | <a href='$linktambah'>halaman selanjutnya </a> "
?>

</body>
</html>
<?php
}
?>