<?php 
include 'koneksi.php';
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$hak_akses = $_POST['hak_akses'];
mysqli_query($koneksi,"insert into login values('','$username', '$email', '$password','$hak_akses')");
header("location:halaman_admin.php");
?>
