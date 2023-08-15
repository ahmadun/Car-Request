<?php
$connect = mysqli_connect("dbcar", "sumitomo", "sumitomo", "request_car");
$karyawan = count($_POST["nama"]);

if ($karyawan > 0) {
    for ($i = 0; $i < $karyawan; $i++) {
        if (trim($_POST["nama"][$i]) != '') {
            // Melakukan INSERT ke tabel data
            $nik = mysqli_real_escape_string($connect, $_POST["nik"][$i]);
            $nama = $_POST['nama'][$i];
            $section = $_POST['section'][$i];
            $posisi = $_POST['posisi'][$i];
            $sql = "INSERT INTO karyawan (nik, nama, section, posisi) VALUES ('$nik', '$nama', '$section', '$posisi')";
            mysqli_query($connect, $sql);
        } else {
            echo "NIK harus diisi.";
            exit(); // Menghentikan eksekusi skrip
        }
    }

    echo "Data berhasil ditambahkan";

}
