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


if ($_GET['cari']=='all'){
$sql=mysqli_query($conn, "SELECT * FROM buku");	
}
else{
$sql=mysqli_query($conn, "SELECT * FROM buku WHERE judul LIKE '%$_GET[cari]%'");		
}


	
?>

<html >
<head>
<title>Menu Pencarian</title>
<style>
.mydiv{
		
	width: 50%;
  border: 1px outset red; 
  text-align: center;
}
</style>
</head>
<body>

<h1>Pencarian</h1>

<a href='menu.php'>> kembali ke menu</a>
<br><br>
<a href='logout.php'>> logout</a>
<br><br>
<form>
Cari buku : <input type='text' name='cari'> <input type='submit' value='cari'>
</form>
<?php
$jumlah=mysqli_num_rows($sql);

echo "<h3>Jumlah Pencarian : $jumlah";

while ($buku=mysqli_fetch_array($sql)){
echo "<div class='mydiv'>";
  
echo "<img src='gambar/$buku[gambar]' width='500px'><br>";
echo "JUDUL BUKU ".$buku['judul'];
echo "<br>";
echo "Pengarang ".$buku['pengarang'];
echo "<br>";
echo "PENERBIT ".$buku['penerbit'];
echo "<br>";
echo "Kategori ".$buku['kategori'];
echo "<br>";
echo "Lokasi ".$buku['lokasi'];
echo "<br>";
echo "Stok ".$buku['stok'];
echo "<br>";

echo "</div>";	
}	

?>


</body>
</html>
<?php
}
?>