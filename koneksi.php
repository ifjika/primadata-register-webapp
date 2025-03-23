<?php
$server="localhost";
$username="root";
$pass="";
$db="db_pendaftaran";
$koneksi=mysqli_connect($server,$username,$pass,$db);
if (mysqli_connect_errno()) {
	echo "Koneksi Gagal!!".mysqli_connect_error(); 
}

?>