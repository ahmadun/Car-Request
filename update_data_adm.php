<!-- update.php -->

<?php
// Koneksi ke database
include "koneksi.php";

// Ambil data yang dikirim dari form edit
$id = $_GET['id_kar'];
$nik = mysqli_real_escape_string($koneksi, $_POST['nik']);
$nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
$section = mysqli_real_escape_string($koneksi, $_POST['section']);
$posisi = mysqli_real_escape_string($koneksi, $_POST['posisi']);

// Update data karyawan berdasarkan ID
$update = mysqli_query($koneksi, "UPDATE karyawan SET nik='$nik', nama='$nama', section='$section', posisi='$posisi' WHERE id_kar='$id'");
if ($update) {
    // Jika berhasil, redirect kembali ke halaman tampil_data_adm.php
    header("location:tampil_data_adm.php");
    exit; // Tambahkan exit untuk menghentikan eksekusi setelah redirect
} else {
    echo "Gagal update data!";
}
?>
