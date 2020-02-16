<?php
	include "koneksi.php";
	$kode= $_GET['kode'];
	mysqli_query($connection,"DELETE FROM siswa WHERE id='$kode'");
	header("location:media_admin.php?module=siswa");
?>