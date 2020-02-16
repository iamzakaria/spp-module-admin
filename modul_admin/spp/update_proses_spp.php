<?php
	include "koneksi.php";

	$id_spp= $_GET['id_spp'];
	$tahun = $_POST['inputtahun'];
	$nominal = $_POST['inputnominal'];
	
	$query = "UPDATE spp SET 
		id_spp='$id_spp',
		tahun='$tahun',
		nominal='$nominal'
		 WHERE id_spp='$id_spp'";

	$cekquery = mysqli_query($connection,$query);

	if ($cekquery) {
?>
		<script>
			alert('Data berhasil di tambahkan!');
			location='media_admin.php?module=spp';
		</script>

<?php
		}else{
?>
		<script>
			alert('Gagal di tambahkan!');
			location='media_admin.php?module=spp';
		</script>
<?php
		}
?>
