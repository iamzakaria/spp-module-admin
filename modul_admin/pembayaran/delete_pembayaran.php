<?php
	include "koneksi.php";
	$kode= $_GET['kode'];
	mysqli_query($connection,"DELETE FROM pembayaran WHERE id_pembayaran='$kode'");
	header("location:media_admin.php?module=pembayaran");
?>