<?php
include('konfigurasi.php');


$login=mysqli_query($conn, "SELECT * FROM user WHERE username='$_POST[username]' AND password='$_POST[password]'");

$ketemu=mysqli_num_rows($login);
$pengguna=mysqli_fetch_array($login);

if ($ketemu > 0){
	session_start();
  include "timeout.php";

  $_SESSION['KCFINDER']=array();
  $_SESSION['KCFINDER']['disabled'] = false;

  $_SESSION['userperpus']     = $pengguna['username'];
  $_SESSION['passperpus']     = $pengguna['password'];
  $_SESSION['levelperpus']    = $pengguna['level'];
  $_SESSION['login'] = 'yes';
  
  // session timeout
  $_SESSION['loginperpus'] = 1;
  timer();

	$sid_lama = session_id();
	
	session_regenerate_id();

	$sid_baru = session_id();

  header('location:menu.php');
}
else{
  echo "<script>
  alert('Username atau password salah!');
  window.location=('index.php');
  </script>";
 
}

?>