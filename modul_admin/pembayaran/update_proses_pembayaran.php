<?php
	include "koneksi.php";

	$id= $_GET['id'];
	$id_pembayaran= $_GET['id_pembayaran'];
	$id_petugas=$_POST['inputid_petugas'];
	$nisn=$_POST['inputnisn'];
	$tgl_bayar=$_POST['inputtgl_bayar'];
	$bulan_dibayar= $_GET['bulan_dibayar'];
	$tahun_dibayar=$_POST['inputtahun_dibayar'];
	$id_spp=$_POST['inputid_spp'];
	$jumlah_bayar=$_POST['inputjumlah_bayar'];
	$query = "UPDATE pembayaran SET id='$id', id_pembayaran='$id_pembayaran', id_petugas='$id_petugas', nisn='$nisn', tgl_bayar='$tgl_bayar', bulan_dibayar='$bulan_dibayar', tahun_dibayar='$tahun_dibayar', id_spp='$id_spp', jumlah_bayar='$jumlah_bayar' WHERE id='$id'";

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
