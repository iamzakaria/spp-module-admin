












<?php
  session_start();
  include "koneksi.php";
  include "akses.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title>Media Admin</title>
  <link rel="stylesheet" href="css/style_content.css" type="text/css">
  <link rel="stylesheet" href="css/style_table.css" type="text/css">
  <style>
  body{
  }
</style>
</head>
  <body>
    <div class="style">
            
      <div class="menu">
        <?php include "menu_admin.php"; ?>
      </div>
      
      <div id="isi">
        <?php include "content_admin.php"; ?>
      </div>
      
      <div id="clearer">
      </div>
      
      <div class="footer" align="center">
      <marquee scrollamount="5" scrolldelay="5">selamat datang di website Pembayaran spp</marquee>
      </div>

    </div>
  </body>
</html>