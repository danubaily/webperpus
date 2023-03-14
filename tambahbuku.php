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

	if ($level=="user"){
	echo "<script>window.location = 'index.php'</script>";	
	}
	else{
	


if(isset($_POST['upload'])){	
	$kode=date('dmYHis',time());
$file_name	= $_FILES['gambar']['name'];
	$file_ext 	= strtolower(end(explode('.', $file_name)));
	$file_tmp 	= $_FILES['gambar']['tmp_name'];
	
	$new_name=$kode.'.'.$file_ext;

	 move_uploaded_file($file_tmp, 'gambar/'.$new_name);



mysqli_query($conn, "INSERT INTO buku(id, judul, pengarang, penerbit, kategori, lokasi, stok, gambar) 
	                       VALUES('NULL', 
						   '$_POST[judul]', 
						   '$_POST[pengarang]',
						   '$_POST[penerbit]',
						   '$_POST[kategori]',
						   '$_POST[lokasi]',
						   '$_POST[stok]',
						   '$new_name')");
header('location:menu.php');
}
?>
<html >
<head>
<title>Menu Tambah Buku</title>
</head>
<body>

<h1>MENU TAMBAH BUKU</h1>
<a href='menu.php'>> kembali ke menu</a>
<br>
<br>
<br>
<form method='post' action='' enctype='multipart/form-data'>
<input type='file' name='gambar' >
<br><br>
Judul <input type='text' name='judul'>
<br><br>
Pengarang <input type='text' name='pengarang'>
<br><br>
Penerbit <input type='text' name='penerbit'>
<br><br>
Kategori <input type='text' name='kategori'>
<br><br>
lokasi buku <input type='text' name='lokasi'>
<br><br>
stok <input type='text' name='stok'>
<br><br>
<input type='submit' value='simpan' name='upload'>
</form>

</body>
</html>
<?php
}
}
?>