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
        <a class="text-white" href="#">
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
          
        </a>
      </li>
      <li>
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
  <h2>Pengajuan Car Request</h2>
  <form action="proses_pengajuan_mngr.php" method="post">
    <table>
      <tr>
        <td width="100">NIK</td>
        <td>
          <input type="text" name="nik" id="nik" onkeyup="autofill()">
        </td>
      </tr>
      <tr>
        <td>Nama</td>
        <td><input type="text" name="nama" id="nama" size="30" readonly/></td>
      </tr>
      <tr>
        <td>Section</td>
        <td><input type="text" name="section" id="section" size="30" readonly/></td>
      </tr>
      <tr>
        <td>Posisi</td>
        <td><input type="text" name="posisi" id="posisi" size="30" readonly/></td>
      </tr>
      <tr>
        <td>Tujuan</td>
        <td><input type="text" name="tujuan" size="30"></td>
      </tr>
      <tr>
        <td>Alasan</td>
        <td><input type="text" name="alasan" size="30"></td>
      </tr>
      <tr>
        <td>Keberangkatan (Jam)</td>
        <td><input type="time" name="keberangkatan"></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" value="Simpan" name="proses"></td>
      </tr>
    </table>
  </form>

  <script>
    function autofill() {
      var nik = document.getElementById('nik').value;

      // Lakukan request AJAX ke file PHP yang akan mengambil data dari tabel karyawan berdasarkan NIK
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          var data = JSON.parse(this.responseText);
          if (data) {
            document.getElementById('nama').value = data.nama;
            document.getElementById('section').value = data.section;
            document.getElementById('posisi').value = data.posisi;
          } else {
            document.getElementById('nama').value = '';
            document.getElementById('section').value = '';
            document.getElementById('posisi').value = '';
          }
        }
      };
      xmlhttp.open("GET", "get_data_karyawan.php?nik=" + nik, true);
      xmlhttp.send();
    }
  </script>

</body>
</html>
