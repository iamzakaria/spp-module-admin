<?php
	include "koneksi.php";

	$id_kelas = $_POST['inputid_kelas'];
	$nama_kelas = $_POST['inputnama_kelas'];
	$kompetensi_keahliah = $_POST['inputkompetensi_keahliah'];
	
	$query = "INSERT into kelas values ('$id_kelas','$nama_kelas','$kompetensi_keahliah')";
	
	$cekquery = mysqli_query($connection,$query);

	if ($cekquery) {
?>

	<script>
		alert('Data berhasil di tambahkan!');
		location='media_admin.php?module=kelas';
	</script>

<?php
	}else{
?>
	<script>
		alert('Gagal di tambahkan!');
		location='media_admin.php?module=kelas';
	</script>
<?php
	}
?>