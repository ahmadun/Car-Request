<?php
// get_data_karyawan.php

// Lakukan koneksi ke database
include "koneksi.php";

if (isset($_GET['nik'])) {
    $nik = $_GET['nik'];

    // Query untuk mengambil data karyawan berdasarkan NIK
    $query = "SELECT * FROM karyawan WHERE nik = '$nik'";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);

    // Ubah data menjadi format JSON dan kirimkan sebagai respon
    header('Content-Type: application/json');
    echo json_encode($data);
}
?>
