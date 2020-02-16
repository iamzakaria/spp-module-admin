<?php
include "../../koneksi.php";
$hasil2=mysqli_query($connection,"select * from tarif order by IdPelanggan");
$pageQry = mysqli_query($connection,"SELECT * FROM surat_keluar");
?>
<center><h2>Laporan Tarif</h2></center>
<table width="100%" border="0" cellspacing="1" cellpadding="3">
  <tr>
  <td colspan="2">
	<table  class="table-list" width="100%" border="1" rules="all" bordercolor="#000000" cellspacing="1" cellpadding="3" >
    <tr>
      <th width="16%" bgcolor="#CCCCCC"><strong>Kode Tarif</strong></th>
      <th width="16%" bgcolor="#CCCCCC"><strong>Nomor Meter</strong></th>
      <th width="16%" bgcolor="#CCCCCC"><strong>Nama</strong></th>
      <th width="16%" bgcolor="#CCCCCC"><strong>Alamat</strong></th>
      <th width="16%" bgcolor="#CCCCCC"><strong>Daya</strong></th>
    </tr>
    <script>
      window.print();
    </script>
    <?php
  	   # Jika tombol Cari/Search diklik, maka pencarian dilakukan
  	  if(isset($_POST['btnCari'])){
  		  $sql = "SELECT * FROM pelanggan WHERE IdPelanggan LIKE '%$dataCari%' ORDER BY IdPelanggan ";
  	  }
      else {
  		  $sql = "SELECT * FROM pelanggan INNER JOIN tarif ON pelanggan.KodeTarif = tarif.KodeTarif ORDER BY IdPelanggan";
      } 
  	
      // Menjalankan query di atas
      $myquery = mysqli_query($connection,$sql)  or die ("Query salah : ".mysqli_error());

      while ($myData = mysqli_fetch_array($myquery)) {
      $Kode = $myData['IdPelanggan'];
    ?>  
      <tr>
        <td> <?php echo $myData['IdPelanggan']; ?></td>
        <td> <?php echo $myData['NoMeter']; ?></td>
        <td> <?php echo $myData['Nama']; ?> </td>
        <td> <?php echo $myData['Alamat']; ?> </td>
        <td> <?php echo $myData['Daya']; ?> </td>
      </tr>
    <?php } ?>
  </table>
</table>
<table width="100%" align="center" border="0">
  <tr>
    <td width="80%"></td>
    <td></td>
    <td>Admin</td>
  </tr>
<tr>
    <td width="80%"></td>
    <td></td>
    <td><br><br></td>
  </tr>
  <tr>
    <td width="80%"></td>
    <td></td>
    <td>(..........)</td>
  </tr>
</table>