<?php
// ... bagian kode PHP lainnya ...

// Buat koneksi ke database (gunakan koneksi yang sesuai dengan database Anda)
$koneksi = mysqli_connect("dbcar", "sumitomo", "sumitomo", "request_car");

// Cek apakah form "Tambah Data Pegawai" telah disubmit
if (isset($_POST['proses'])) {
  // Ambil data dari form
  $nik = $_POST['nik'];
  $nama = $_POST['nama'];
  $section = $_POST['section'];
  $posisi = $_POST['posisi'];
  $tujuan = $_POST['tujuan'];
  $alasan = $_POST['alasan'];
  $keberangkatan = $_POST['keberangkatan'];

  // Simpan data ke tabel data
  mysqli_query($koneksi, "INSERT INTO data (nik, nama, section, posisi, tujuan, alasan, keberangkatan) VALUES ('$nik', '$nama', '$section', '$posisi', '$tujuan', '$alasan', '$keberangkatan')") or die(mysqli_error($koneksi));
}

// Tutup koneksi ke database
mysqli_close($koneksi);

// Setelah data disimpan, alihkan kembali ke form input
header("Location: laporan_admin.php");
exit();
?>
