<?php
	include "koneksi.php";
?>
<div id="konten">
<h1>Data Kelas</h1>  
<form method="POST" action="media_admin.php?module=register_kelas" align="center" onsubmit="return validasi(this)">
	<table cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td width="20%">id_kelas</td>
			<td>:</td>
			<td><input type="text" name="inputid_kelas" size="40%"></td>
		</tr>
		<tr>
			<td width="20%">nama_kelas</td>
			<td>:</td>
			<td><input type="text" name="inputnama_kelas" size="40%"></td>
		</tr>
		<tr>
			<td width="20%">kompetensi_keahliah</td>
			<td>:</td>
			<td><input type="text" name="inputkompetensi_keahliah" size="40%"></td>
		<tr>
			<td></td>
			<td></td>
			<td><input type="submit" name="tambahkelas" value="Tambah">
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

		<th>id_kelas</th>
		<th>nama_kelas</th>
		<th>kompetensi_keahlian</th>
		<th colspan="2">Aksi</th>
	</thead>
	<tbody>
		<?php
		if(isset($_POST['btncari'])){
				$kategori = $_POST['inputkategori'];
				$datacari = $_POST['inputcari'];
				$sql = mysqli_query($connection,"select * from kelas 
					inner join tarif on pelanggan.KodeTarif = tarif.KodeTarif 
					where $kategori LIKE '%$datacari%' 
					ORDER BY $kategori")or die (mysqli_error());
			}else{
				$sql = mysqli_query($connection,"select * from kelas 
					")or die (mysqli_error());
			}
			while($data=mysqli_fetch_array($sql)){  
		?>
		<tr>

			<td><?php echo $data['id_kelas']; ?> </td>
			<td><?php echo $data['nama_kelas']; ?> </td>
			<td><?php echo $data['kompetensi_keahlian']; ?> </td>
			<td><a href="media_admin.php?module=update_kelas&amp;kode=<?php echo $data['id_kelas'];?>">Update</a></td>
			<td><a href="media_admin.php?module=delete_kelas&amp;kode=<?php echo $data['id_kelas'];?>">Hapus</a></td>
		</tr>
		<?php
			}
		?>
	</tbody>
</table>

<script type="text/javascript">
	function validasi(form){
		if (form.inputIdPelanggan.value == 
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