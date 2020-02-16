<?php
	include "koneksi.php";

	$id = $_POST['inputid'];
	$id_petugas = $_POST['inputid_petugas'];
	$username = $_POST['inputusername'];
	$password = $_POST['inputpassword'];
	$nama_petugas = $_POST['inputnama_petugas'];
	$level = $_POST['inputlevel'];
	
	$query = "INSERT into petugas values ('$id','$id_petugas','$username','$password','$nama_petugas','$level')";
	
	$cekquery = mysqli_query($connection,$query);

	if ($cekquery) {
?>

	<script>
		alert('Data berhasil di tambahkan!');
		location='media_admin.php?module=petugas';
	</script>

<?php
	}else{
?>
	<script>
		alert('Gagal di tambahkan!');
		location='media_admin.php?module=petugas';
	</script>
<?php
	}
?>