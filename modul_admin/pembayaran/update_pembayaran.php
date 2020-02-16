<?php
	include "koneksi.php";
	$kode= $_GET['kode'];
	$queryEdit = mysqli_query($connection,"SELECT * FROM pembayaran where id_pembayaran='$kode' limit 1")or die(mysqli_error());
	$dataEdit = mysqli_fetch_array($queryEdit);
?>
<div id="konten">
<h1>Data Pembayaran</h1>  
<form method="POST" action="media_admin.php?module=update_proses_pembayaran&amp;kode=<?php echo $dataEdit['id'];?>" align="center" onsubmit="return validasi(this)">
	<table cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td width="20%">No</td>
			<td>:</td>
			<td>
				<input type="text" name="inputid" size="40%" value=<?php echo $dataEdit['id'];?>>
			</td>
		</tr>               
		<tr>
			<td width="20%">id_pembayaran</td>
			<td>:</td>
			<td><input type="text" name="inputid_pembayaran" size="40%" value=<?php echo $dataEdit['id_pembayaran'];?>></td>
		</tr>
		<tr>
			<td width="20%">id_petugas</td>
			<td>:</td>
			<td><input type="text" name="inputid_petugas" size="40%" value=<?php echo $dataEdit['id_petugas'];?>></td>
		</tr>
		<tr>
			<td width="20%">nisn</td>
			<td>:</td>
			<td><input type="text" name="inputnisn" size="40%" value=<?php echo $dataEdit['nisn'];?>></td>
		</tr>
		<tr>
			<td width="20%">tgl_bayar</td>
			<td>:</td>
			<td><input type="text" name="inputtgl_bayar" size="40%" value=<?php echo $dataEdit['tgl_bayar'];?>></td>
		</tr>
		<tr>
			<td width="20%">bulan_dibayar</td>
			<td>:</td>
			<td><input type="text" name="inputbulan_dibayar" size="40%" value=<?php echo $dataEdit['bulan_dibayar'];?>></td>
		</tr>
		<tr>
			<td width="20%">tahun_dibayar</td>
			<td>:</td>
			<td><input type="text" name="inputtahun_dibayar" size="40%" value=<?php echo $dataEdit['tahun_dibayar'];?>></td>
		</tr>
		<tr>
			<td width="20%">id_spp</td>
			<td>:</td>
			<td><input type="text" name="inputid_spp" size="40%" value=<?php echo $dataEdit['id_spp'];?>></td>
		</tr>
		<tr>
			<td width="20%">jumlah_bayar</td>
			<td>:</td>
			<td><input type="text" name="inputjumlah_bayar" size="40%" value=<?php echo $dataEdit['jumlah_bayar'];?>></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td>
				<input type="submit" name="tambahpembayaran" value="Update pembayaran">
				<input type="reset" name="reset" value="Reset">
			</td>
		</tr>
	</table>
</form>

<br>
<form method="POST" action="" align="center" onsubmit="return validasi(this)">
	Pencarian :	
	<input type="text" name="inputcari" size="40%">
	Kategori :	
	<select name="inputkategori" style="width: 20%;">
		<option value="id_pembayaran">id_pembayaran</option>
		<option value="id_petugas">id_petugas</option>
		<option value="nisn">nisn</option>
		<option value="tgl_bayar">tgl_bayar</option>
		<option value="bulan_bayar">bulan_bayar</option>
		<option value="tahun_dibayar">tahun_dibayar</option>
		<option value="id_spp">id_spp</option>
		<option value="jumlah_bayar">jumlah_bayar</option>
	</select>
	<input name="btncari" type="submit" value="Cari" />
</form>
<br>

<table border="1" width="100%">
	<thead>
		<th>No</th>
		<th>id_pembayaran</th>
		<th>id_petugas</th>
		<th>nisn</th>
		<th>tgl_bayar</th>
		<th>bulan_dibayar</th>
		<th>tahun_dibayar</th>
		<th>id_spp</th>
		<th>jumlah_bayar</th>
		<th colspan="2">Aksi</th>
	</thead>
	<tbody>
		<?php
			if(isset($_POST['btncari'])){
				$kategori = $_POST['inputkategori'];
				$datacari = $_POST['inputcari'];
				$sql = mysqli_query($connection,"select * from pembayaran 
					where $kategori LIKE '%$datacari%' 
					ORDER BY $kategori")or die (mysqli_error());
			}else{
				$sql = mysqli_query($connection,"select * from pembayaran")or die (mysqli_error());
			}
			while($mydata=mysqli_fetch_array($sql)){
		?>
		<tr>
			<td><?php echo $mydata['id']; ?> </td>
			<td><?php echo $mydata['id_pembayaran']; ?> </td>
			<td><?php echo $mydata['id_petugas']; ?> </td>
			<td><?php echo $mydata['nisn']; ?> </td>
			<td><?php echo $mydata['tgl_bayar']; ?> </td>
			<td><?php echo $mydata['bulan_dibayar']; ?> </td>
			<td><?php echo $mydata['tahun_dibayar']; ?> </td>
			<td><?php echo $mydata['id_spp']; ?> </td>
			<td><?php echo $mydata['jumlah_bayar']; ?> </td>
			<td><a href="media_admin.php?module=update_pembayaran&amp;kode=<?php echo $mydata['id'];?>">Update</a></td>
			<td><a href="media_admin.php?module=delete_pembayaran&amp;kode=<?php echo $mydata['id'];?>">Hapus</a></td>
		</tr>
		<?php
			}
		?>
	</tbody>
</table>

<script type="text/javascript">
	function validasi(form){
		if (form.inputkodetarif.value == ""){
	    	alert("Kode tarif masih kosong!");
	    	form.inputkodetarif.focus();
	    	return false;
	  	}
		if (form.inputdaya.value == ""){
	    	alert("Daya masih kosong!");
	    	form.inputdaya.focus();
	    	return false;
	  	}
  		if (form.inputtarifperkwh.value == ""){
	    	alert("Tarif Per KWH masih kosong!");
	    	form.inputtarifperkwh.focus();
	    	return false;
	  	}
		return true;
	}
</script>