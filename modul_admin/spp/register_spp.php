<?php
	include "koneksi.php";

	$id_spp = $_POST['inputid_spp'];
	$tahun = $_POST['inputtahun'];
	$nominal = $_POST['inputnominal'];
	
	$query = "INSERT into spp values ('$id_spp','$tahun','$nominal')";
	
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