<?php
	include "koneksi.php";

	$id = $_POST['inputid'];
	$nisn = $_POST['inputnisn'];
	$nis = $_POST['inputnis'];
	$nama = $_POST['inputnama'];
	$id_kelas = $_POST['inputid_kelas'];
	$alamat = $_POST['inputalamat'];
	$no_telp = $_POST['inputno_telp'];
	$id_spp = $_POST['inputid_spp'];
	
	$query = "INSERT into siswa values ('','$nisn','$nis','$nama','$id_kelas','$alamat', '$no_telp', '$id_spp')";
	
	$cekquery = mysqli_query($connection,$query);

	if ($cekquery) {
?>

	<script>
		alert('Data berhasil di tambahkan!');
		location='media_admin.php?module=siswa';
	</script>

<?php
	}else{
?>
	<script>
		alert('Gagal di tambahkan!');
		location='media_admin.php?module=siswa';
	</script>
<?php
	}
?>