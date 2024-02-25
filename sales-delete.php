<?php
$koneksi = mysqli_connect('127.0.0.1', 'root', '', 'magang');
$id=$_REQUEST['id'];
$kueri = "DELETE FROM jual WHERE id=$id"; 
$hasil = mysqli_query($koneksi,$kueri);
header("Location: sales.php"); 
exit();
?>