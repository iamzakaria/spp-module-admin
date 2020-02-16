<?php
include "../../koneksi.php";
$hasil2=mysqli_query($connection,"select * from tarif order by KodeTarif");
$pageQry = mysqli_query($connection,"SELECT * FROM surat_keluar");
?>
<center><h2>Laporan Tarif</h2></center>
<table width="100%" border="0" cellspacing="1" cellpadding="3">
  <tr>
  <td colspan="2">
	<table  class="table-list" width="100%" border="1" rules="all" bordercolor="#000000" cellspacing="1" cellpadding="3" >
    <tr>
      <th width="16%" bgcolor="#CCCCCC"><strong>Kode Tarif</strong></th>
      <th width="16%" bgcolor="#CCCCCC"><strong>Daya</strong></th>
      <th width="16%" bgcolor="#CCCCCC"><strong>Tarif Per KWH</strong></th>
    </tr>
    <script>
      window.print();
    </script>
    <?php
  	   # Jika tombol Cari/Search diklik, maka pencarian dilakukan
  	  if(isset($_POST['btnCari'])){
  		  $sql = "SELECT * FROM tarif WHERE KodeTarif LIKE '%$dataCari%' ORDER BY KodeTarif ";
  	  }
      else {
  		  $sql = "SELECT * FROM tarif ORDER BY KodeTarif ";
      } 
  	
      // Menjalankan query di atas
      $myquery = mysqli_query($connection,$sql)  or die ("Query salah : ".mysqli_error());

      while ($myData = mysqli_fetch_array($myquery)) {
      $Kode = $myData['KodeTarif'];
    ?>  
      <tr>
        <td> <?php echo $myData['KodeTarif']; ?></td>
        <td> <?php echo $myData['Daya']; ?></td>
        <td> <?php echo $myData['TarifPerKWH']; ?> </td>
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