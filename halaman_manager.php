<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>USER</title>
  <!-- bootstrap 5 css -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/fontawesome.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    li {
      list-style: none;
      margin: 20px 0 20px 0;

    }

    a {
      text-decoration: none;

    }

    .sidebar {
      width: 250px;
      height: 100vh;
      position: fixed;
      margin-left: -300px;
      transition: 0.4s;
      background: #87CEFA;
      font-size: 15px;
    }

    .active-main-content {
      margin-left: 250px;

    }

    .active-sidebar {
      margin-left: 0;
      background: #87CEFA;
    }

    #main-content {
      transition: 0.4s;
    }
  </style>
</head>

<body>
  <div>
    <div class="sidebar p-4" id="sidebar">
      <h4 class="mb-5 text-black" style="font-size: 25px;">CAR REQUEST</h4>
      <li>
        <a class="text-white" href="halaman_manager.php">
          Dashboard
        </a>
      </li>
      <li>
        <a class="text-white" href="pengajuan_manager.php">
          Input Request Car
        </a>
      </li>
       <li>
        <a class="text-white" href="request_manager.php">
          Data Car Request
          <?php include('notifikasi.php') ?>
        </a>
      </li>
      <li>
        <a class="text-white" href="laporan_manager.php">
          Laporan Car Request
         </li>
      <a class="text-white" href="index.php">
       Logout
      </a>
      </li>
 </div>
  </div>
  <section class="p-4" id="main-content">
    <button class="btn btn-info" id="button-toggle">
      <img src="list.png" height="30px" width="30px">
    </button>
    <div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:auto; height:auto;">
     <div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:auto; height:auto;">
     <body>
  <h2>Laporan Data Pegawai</h2>
  <form method="GET" action="laporan_ga.php" style="text-align: right;">
    Cari jam keberangkatan:</br><input type="text" name="kata_cari" value="<?php if(isset($_GET['kata_cari'])) { echo $_GET['kata_cari']; } ?>"  />
        <button type="submit"><i class="bi bi-search" style="margin-right: 7px;"></i></button>
    </form></br> 
  <table class="table">
    <thead>
      <tr>
        <th>NIK</th>
        <th>Nama</th>
        <th>Section</th>
        <th>Posisi</th>
        <th>Tujuan</th>
        <th>Alasan</th>
        <th>Keberangkatan</th>
        <th>Manager</th>
        <th>Status GA</th>
        <th>Hasil</th>
      </tr>
    </thead>
    <tbody>
      <?php
            include('koneksi.php');
            if (isset($_GET['kata_cari'])) {
              $kata_cari = $_GET['kata_cari'];
              $query = "SELECT * FROM data WHERE keberangkatan like '%" . $kata_cari . "%'  ORDER BY id_data ASC";
            } else {
              $query = "SELECT * FROM data ORDER BY id_data ASC";
            }
      
      // Buat koneksi ke database (gunakan koneksi yang sesuai dengan database Anda)
      $koneksi = mysqli_connect("dbcar", "sumitomo", "sumitomo", "request_car");

      // Ambil semua data dari tabel data
      $query = mysqli_query($koneksi, $query);

      // Tampilkan data dalam tabel
      while ($data = mysqli_fetch_array($query)) {
        echo "<tr>";
        echo "<td>" . $data['nik'] . "</td>";
        echo "<td>" . $data['nama'] . "</td>";
        echo "<td>" . $data['section'] . "</td>";
        echo "<td>" . $data['posisi'] . "</td>";
        echo "<td>" . $data['tujuan'] . "</td>";
        echo "<td>" . $data['alasan'] . "</td>";
        echo "<td>" . $data['keberangkatan'] . "</td>";
        
        // Tambahkan baris berikut untuk menampilkan kolom Manager dan Status GA
        echo "<td>";
        if ($data["posisi"] == "manager") {
            echo "----";
        }
        echo "</td>";
        echo "<td>" . $data['status_ga'] . "</td>";

        echo "</tr>";
      }

      // Tutup koneksi ke database
      mysqli_close($koneksi);
      ?>
    </tbody>
  </table>

  <script>
    document.getElementById("button-toggle").addEventListener("click", () => {
    document.getElementById("sidebar").classList.toggle("active-sidebar");
    document.getElementById("main-content").classList.toggle("active-main-content");
    });
</script>
</body>
</html>
