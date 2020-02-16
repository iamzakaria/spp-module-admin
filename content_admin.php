<?php
    include "koneksi.php";
    $modul = $_GET['module'];
    if ($modul=='home'){
    	echo "<h2>Selamat Datang </h2>";
    	echo "Hai, <b>".$_SESSION['username']."</b> anda sebagai <b>".$_SESSION['level']." </b>Selamat datang, Di Sistem Informasi Pembayaran spp<br>";

        include "home.php";
    }
    else if ($modul=='pembayaran'){
        include "modul_admin/pembayaran/pembayaran.php";
    }
    else if ($modul=='register_pembayaran'){
        include "modul_admin/pembayaran/register_pembayaran.php";
    }
    else if ($modul=='update_pembayaran'){
        include "modul_admin/pembayaran/update_pembayaran.php";
    }
    else if ($modul=='update_proses_pembayaran'){
        include "modul_admin/pembayaran/update_proses_pembayaran.php";
    }
    else if ($modul=='delete_pembayaran'){
        include "modul_admin/pembayaran/delete_pembayaran.php";
    }
    else if ($modul=='laporan_pembayaran'){
        include "modul_admin/pembayaran/laporan_pembayaran.php";
    }
    else if ($modul=='siswa'){
        include "modul_admin/siswa/siswa.php";
    }
    else if ($modul=='register_siswa'){
        include "modul_admin/siswa/register_siswa.php";
    }
    else if ($modul=='update_siswa'){
        include "modul_admin/siswa/update_siswa.php";
    }
    else if ($modul=='update_proses_siswa'){
        include "modul_admin/siswa/update_proses_siswa.php";
    }
    else if ($modul=='delete_siswa'){
        include "modul_admin/siswa/delete_siswa.php";
    }
    else if ($modul=='laporan_siswa'){
        include "modul_admin/siswa/laporan_siswa.php";
    }
    else if ($modul=='kelas'){
        include "modul_admin/kelas/kelas.php";
    }
    else if ($modul=='register_kelas'){
        include "modul_admin/kelas/register_kelas.php";
    }
    else if ($modul=='update_kelas'){
        include "modul_admin/kelas/update_kelas.php";
    }
    else if ($modul=='update_proses_kelas'){
        include "modul_admin/kelas/update_proses_kelas.php";
    }
    else if ($modul=='delete_kelas'){
        include "modul_admin/kelas/delete_kelas.php";
    }
    else if ($modul=='laporan_kelas'){
        include "modul_admin/kelas/laporan_kelas.php";
    }
    else if ($modul=='spp'){
        include "modul_admin/spp/spp.php";
    }
    else if ($modul=='register_spp'){
        include "modul_admin/spp/register_spp.php";
    }
    else if ($modul=='update_spp'){
        include "modul_admin/spp/update_spp.php";
    }
    else if ($modul=='update_proses_spp'){
        include "modul_admin/spp/update_proses_spp.php";
    }
    else if ($modul=='delete_spp'){
        include "modul_admin/spp/delete_spp.php";
    }
    else if ($modul=='laporan_spp'){
        include "modul_admin/spp/laporan_spp.php";
    }
    else if ($modul=='pengguna'){
        include "modul_admin/pengguna/pengguna.php";
    }
    else if ($modul=='register_pengguna'){
        include "modul_admin/pengguna/register_pengguna.php";
    }
    else if ($modul=='update_pengguna'){
        include "modul_admin/pengguna/update_pengguna.php";
    }
    else if ($modul=='update_proses_pengguna'){
        include "modul_admin/pengguna/update_proses_pengguna.php";
    }
    else if ($modul=='delete_pengguna'){
        include "modul_admin/pengguna/delete_pengguna.php";
    }
    else if ($modul=='laporan_pengguna'){
        include "modul_admin/pengguna/laporan_pembayaran.php";
    }
    else if ($modul=='user'){
        include "modul_admin/user/user.php";
    }
    else if ($modul=='register_user'){
        include "modul_admin/user/register_user.php";
    }
    else if ($modul=='update_user'){
        include "modul_admin/user/update_user.php";
    }
    else if ($modul=='update_proses_user'){
        include "modul_admin/user/update_proses_user.php";
    }
    else if ($modul=='delete_user'){
        include "modul_admin/user/delete_user.php";
    }
    else if ($modul=='laporan_user'){
        include "modul_admin/user/laporan_user.php";
    }
    else{
        echo "<b>MODUL BELUM ADA ATAU BELUM LENGKAP SILAHKAN BUAT SENDIRI</b>";
    }
?>