<?php
	include "koneksi.php";

	$id_kelas= $_GET['id_kelas'];
	$nama_kelas = $_POST['inputnama_kelas'];
	$kompetensi_keahlian = $_POST['inputkompetensi_keahlian'];

	$query = "UPDATE kelas SET 
		id_kelas='$id_kelas',
		nama_kelas='$nama_kelas',
		kompetensi_keahlian='$kompetensi_keahlian'
		 WHERE id_kelas='$id_kelas'";

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
