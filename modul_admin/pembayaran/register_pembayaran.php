<?php
	include "koneksi.php";

	$id = $_POST['inputid'];
	$id_pembayaran = $_POST['inputid_pembayaran'];
	$id_petugas = $_POST['inputid_petugas'];
	$nisn = $_POST['inputnisn'];
	$tgl_bayar = $_POST['inputtgl_bayar'];
	$bulan_dibayar = $_POST['inputbulan_dibayar'];
	$tahun_dibayar = $_POST['inputtahun_dibayar'];
	$id_spp = $_POST['inputid_spp'];
	$jumlah_bayar = $_POST['inputjumlah_bayar'];
	$query = "INSERT into pembayaran values ('', '$id_pembayaran', '$id_petugas', '$nisn', '$tgl_bayar', '$bulan_dibayar', '$tahun_dibayar', '$id_spp', '$jumlah_bayar')";
	
	$cekquery = mysqli_query($connection,$query);

	if ($cekquery) {
?>

	<script>
		alert('Data berhasil di tambahkan!');
		location='media_admin.php?module=pembayaran';
	</script>

<?php
	}else{
?>
	<script>
		alert('Gagal di tambahkan!');
		location='media_admin.php?module=pembayaran';
	</script>
<?php
	}
?>