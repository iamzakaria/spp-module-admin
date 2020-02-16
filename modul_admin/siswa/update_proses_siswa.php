<?php
	include "koneksi.php";

	$id= $_GET['id'];
	$nisn = $_POST['inputnisn'];
	$nis = $_POST['inputnis'];
	$nama = $_POST['inputnama'];
	$id_kelas = $_POST['inputid_kelas'];
	$alamat = $_POST['inputalamat'];
	$no_telp = $_POST['inputno_telp'];
	$id_spp = $_POST['inputid_spp'];
	$query = "UPDATE siswa SET 
		id='$id',
		nisn='$nisn',
		nisn='$nisn',
		nis='$nis',
		nama='$nama',
		id_kelas='$id_kelas',
		alamat='$alamat',
		no_telp='$no_telp',
		id_spp='$id_spp'
		 WHERE id='$id'";

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
