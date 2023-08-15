<?php
session_start();
include"koneksi.php"; 
$id = @$_GET['id_kar'];
$del=mysqli_query($koneksi,"delete from karyawan where id_kar='$id'");
if($del){
    $_SESSION['pesan'] = '<font color=green>OK, 1 data berhasil dihapus.</font>';
	header("location:tampil_data_adm.php");
}else{
	echo "Gagal hapus data!";
}?>