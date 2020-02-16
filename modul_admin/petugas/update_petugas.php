<?php
	include "koneksi.php";
	$kode= $_GET['kode'];
	$queryEdit = mysqli_query($connection,"SELECT * FROM petugas where id='$kode' limit 1")or die(mysqli_error());
	$dataEdit = mysqli_fetch_array($queryEdit);
?>
<div id="konten">
<h1>Data Siswa</h1>  
<form method="POST" action="media_admin.php?module=update_proses_siswa&amp;kode=<?php echo $dataEdit['id'];?>" align="center" onsubmit="return validasi(this)">
	<table cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td width="20%">No</td>
			<td>:</td>
			<td>
				<input type="text" name="inputid" size="40%" value=<?php echo $dataEdit['id'];?>>
			</td>
		</tr>
		<tr>
			<td width="20%">nisn</td>
			<td>:</td>
			<td><input type="text" name="inputnisn" size="40%" value=<?php echo $dataEdit['nisn'];?>></td>
		</tr>
		<tr>
			<td width="20%">nis</td>
			<td>:</td>
			<td><input type="text" name="inputnis" size="40%" value=<?php echo $dataEdit['nis'];?>></td>
		</tr>
		<tr>
			<td width="20%">nama</td>
			<td>:</td>
			<td><input type="text" name="inputnama" size="40%" value=<?php echo $dataEdit['nama'];?>></td>
		</tr>
		<tr>
			<td width="20%">id_kelas</td>
			<td>:</td>
			<td><input type="text" name="inputid_kelas" size="40%" value=<?php echo $dataEdit['id_kelas'];?>></td>
		</tr>
		<tr>
			<td width="20%">alamat</td>
			<td>:</td>
			<td><input type="text" name="inputalamat" size="40%" value=<?php echo $dataEdit['alamat'];?>></td>
		</tr>
		<tr>
			<td width="20%">no_telp</td>
			<td>:</td>
			<td><input type="text" name="inputno_telp" size="40%" value=<?php echo $dataEdit['no_telp'];?>></td>
		</tr>
		<tr>
			<td width="20%">id_spp</td>
			<td>:</td>
			<td><input type="text" name="inputid_spp" size="40%" value=<?php echo $dataEdit['id_spp'];?>></td>
		</tr>
		<tr>
			<td width="20%">Daya</td>
			<td>:</td>
			<td>
				<select name="inputkodetarif" style="width: 70%;">
					<option value="" selected></option>
					<?php
						$sqlForeign = mysqli_query($connection,"SELECT * FROM siswa")or die(mysqli_error());
						while($dataForeign=mysqli_fetch_array($sqlForeign)){
					?>
					<option value=<?php echo $dataForeign['KodeTarif']; ?> 
						<?php 
							if($dataEdit['KodeTarif'] == $dataForeign['KodeTarif']){
								echo "selected";
							} 
						?> 
					>
						<?php echo $dataForeign['Daya'];?>
					</option>
					<?php
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><input type="submit" name="tambahsiswa" value="Update Siswa">
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
</form>
<br>

<table border="1" width="100%">
	<thead>
		<th>No</th>
		<th>nisn</th>
		<th>nis</th>
		<th>nama</th>
		<th>id_kelas</th>
		<th>alamat</th>
		<th>no_telp</th>
		<th>id_spp</th>
		<th colspan="2">Aksi</th>
	</thead>
	<tbody>
		<?php
		if(isset($_POST['btncari'])){
				$kategori = $_POST['inputkategori'];
				$datacari = $_POST['inputcari'];
				$sql = mysqli_query($connection,"select * from siswa 
					inner join tarif on pelanggan.KodeTarif = tarif.KodeTarif 
					where $kategori LIKE '%$datacari%' 
					ORDER BY $kategori")or die (mysqli_error());
			}else{
				$sql = mysqli_query($connection,"select * from siswa 
					")or die (mysqli_error());
			}
			// inner join tarif on pelanggan.KodeTarif = tarif.KodeTarif 
					// order by IdPelanggan
			while($data=mysqli_fetch_array($sql)){  
		?>
		<tr>
			<td><?php echo $data['id']; ?> </td>
			<td><?php echo $data['nisn']; ?> </td>
			<td><?php echo $data['nis']; ?> </td>
			<td><?php echo $data['nama']; ?> </td>
			<td><?php echo $data['id_kelas']; ?> </td>
			<td><?php echo $data['alamat']; ?> </td>
			<td><?php echo $data['no_telp']; ?> </td>
			<td><?php echo $data['id_spp']; ?> </td>
			<td><a href="media_admin.php?module=update_siswa&amp;kode=<?php echo $data['id'];?>">Update</a></td>
			<td><a href="media_admin.php?module=delete_siswa&amp;kode=<?php echo $data['id'];?>">Hapus</a></td>
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