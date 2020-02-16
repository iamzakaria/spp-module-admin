<?php
	include "koneksi.php";
?>
<div id="konten">
<h1>Data Pembayaran</h1>  
<form method="POST" action="media_admin.php?module=register_pembayaran" align="center" onsubmit="return validasi(this)">
	<table cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td width="20%">No</td>
			<td>:</td>
			<td>
				<input type="text" name="inputid" size="40%">
			</td>
		</tr>
		                   
		<tr>
			<td width="20%">id_pembayaran</td>
			<td>:</td>
			<td><input type="text" name="inputid_pembayaran" size="40%"></td>
		</tr>
				
		<tr>
			<td width="20%">id_petugas</td>
			<td>:</td>
			<td><input type="text" name="inputid_petugas" size="40%"></td>
		</tr>
		<tr>
			<td width="20%">nisn</td>
			<td>:</td>
			<td><input type="text" name="inputnisn" size="40%"></td>
		</tr>
		<tr>
			<td width="20%">tgl_bayar</td>
			<td>:</td>
			<td><input type="date" name="inputtgl_bayar" size="40%"></td>
		</tr>
		<tr>
			<td width="20%">bulan_dibayar</td>
			<td>:</td>
			<td><input type="date" name="inputbulan_dibayar" size="40%"></td>
		</tr>
		<tr>
			<td width="20%">tahun_dibayar</td>
			<td>:</td>
			<td><input type="date" name="inputtahun_dibayar" size="40%"></td>
		</tr>
		<tr>
			<td width="20%">id_spp</td>
			<td>:</td>
			<td><input type="text" name="inputid_spp" size="40%"></td>
		</tr>
		<tr>
			<td width="20%">jumlah_bayar</td>
			<td>:</td>
			<td><input type="text" name="inputjumlah_bayar" size="40%"></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><input type="submit" name="tambahpembayaran" value="Tambah">
			<input type="reset" name="reset" value="Reset"></td>
		</tr>
	</table>
</form>

<br>
<form method="POST" action="" align="center" onsubmit="return validasi(this)">
	Pencarian :	
	<input type="text" name="inputcari" size="40%">
	Kategori :	
	<select name="inputkategori" style="width: 20%;">
		<option value="KodeTarif">Kode Tarif</option>
		<option value="Daya">Daya</option>
		<option value="TarifPerKWH">Tarif Per KWH</option>
	</select>
	<input name="btncari" type="submit" value="Cari" />
	<a href="modul_admin/tarif/laporan_tarif.php" target="blank">print</a>
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
			<td><a href="media_admin.php?module=update_pembayaran&amp;kode=<?php echo $mydata['id'];?>">Update</a>
		<a href="media_admin.php?module=delete_pembayaran&amp;kode=<?php echo $mydata['id'];?>">Hapus</a></td>
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