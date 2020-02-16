<?php
	include "koneksi.php";
	$kode= $_GET['kode'];
	mysqli_query($connection,"DELETE FROM spp WHERE id_spp='$kode'");
	header("location:media_admin.php?module=spp");
?>