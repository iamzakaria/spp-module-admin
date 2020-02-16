<?php
	include "koneksi.php";
?>
<div id="konten">
<h1>Data petugas</h1>  
<form method="POST" action="media_admin.php?module=register_petugas" align="center" onsubmit="return validasi(this)">
	<table cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td width="20%"></td>
			<td>:</td>
			<td><input type="hidden" name="inputid" size="40%"></td>
		</tr>
		<tr>
			<td width="20%">id_petugas</td>
			<td>:</td>
			<td><input type="text" name="inputid_petugas" size="40%"></td>
		</tr>
		<tr>
			<td width="20%">username</td>
			<td>:</td>
			<td><input type="text" name="inputusername" size="40%"></td>
		</tr>
		<tr>
			<td width="20%">password</td>
			<td>:</td>
			<td><input type="text" name="inputpassword" size="40%"></td>
		<tr>
			<tr>
			<td width="20%">nama_petugas</td>
			<td>:</td>
			<td><input type="text" name="inputnama_petugas" size="40%"></td>
		</tr>
		<select name="level" id="level">
			<option value="admin">admin</option>
			<option value="petugas">petugas</option>
		</select>
		
		<tr>
			<td></td>
			<td></td>
			<td><input type="submit" name="tambahpetugas" value="Tambah">
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
		<option value="IdPelanggan">ID Pelanggan</option>
		<option value="NoMeter">Nomor</option>
		<option value="Nama">Nama</option>
		<option value="Alamat">Alamat</option>
		<option value="Daya">Daya</option>
	</select>
	<input name="btncari" type="submit" value="Cari" />
	<a href="modul_admin/pelanggan/laporan_pelanggan.php" target="blank">print</a>
</form>
<br>

<table border="1" width="100%">
	<thead>
		<th>id_petugas</th>
		<th>username</th>
		<th>password</th>
		<th>nama_petugas</th>
		<th>level</th>
		<th colspan="2">Aksi</th>
	</thead>
	<tbody>
		<?php
		if(isset($_POST['btncari'])){
				$kategori = $_POST['inputkategori'];
				$datacari = $_POST['inputcari'];
				$sql = mysqli_query($connection,"select * from petugas 
					inner join tarif on pelanggan.KodeTarif = tarif.KodeTarif 
					where $kategori LIKE '%$datacari%' 
					ORDER BY $kategori")or die (mysqli_error());
			}else{
				$sql = mysqli_query($connection,"select * from petugas 
					")or die (mysqli_error());
			}
			while($data=mysqli_fetch_array($sql)){  
		?>
		<tr>
			<td><?php echo $data['id_petugas']; ?> </td>
			<td><?php echo $data['username']; ?> </td>
			<td><?php echo $data['password']; ?> </td>
			<td><?php echo $data['nama_petugas']; ?> </td>
			<td><?php echo $data['level']; ?> </td>
	
			<td><a href="media_admin.php?module=update_petugas&amp;kode=<?php echo $data['id'];?>">Update</a></td>
			<td><a href="media_admin.php?module=delete_petugas&amp;kode=<?php echo $data['id'];?>">Hapus</a></td>
		</tr>
		<?php
			}
		?>
	</tbody>
</table>

<script type="text/javascript">
	function validasi(form){
		if (form.inputIdPelanggan.value == ""){
	    	alert("Kode Pelanggan masih kosong!");
	    	form.inputkIdPelanggan.focus();
	    	return (false);
	  	}
	  	if(form.inputNoMeter.value == ""){
	    	alert("Nomor Meter masih kosong!");
	    	form.inputNoMeter.focus();
	    	return (false);
	  	}
	  	if(form.inputNama.value == ""){
	    	alert("Nama Pelanggan masih kosong!");
	    	form.inputNama.focus();
	    	return (false);
	  	}if(form.inputAlamat.value == ""){
	    	alert("Alamat Pelanggan masih kosong!");
	    	form.inputAlamat.focus();
	    	return (false);
	  	}if(form.inputKodeTarif.value == ""){
	    	alert("Daya masih kosong!");
	    	form.inputKodeTarif.focus();
	    	return (false);
	  	}
	  	return(true);;
	}
</script>