<?php 
session_start();
if($_SESSION['status']==""){
    header("location:tugas.php?pesan=gagal");
}
echo "Anda berhasil Login sebagai ".$_SESSION['username']." Dan anda terdaftar sebagai ".$_SESSION['status'];
?>
<h1>Halaman Admin</h1>
    <p>Halo <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['status']; ?></b>.</p>
<br>
Silahkan logout dengan klik link <a href='logout.php'>Disini</a>