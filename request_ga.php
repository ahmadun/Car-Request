<!DOCTYPE html>
<html lang="en">
<?php
include('koneksi.php');
$cekJumlah = mysqli_query($koneksi, "select count(id_data) as jumlah from data where notif_ga=0");
$data = mysqli_fetch_assoc($cekJumlah);
if ($data['jumlah'] > 0) {
  $query = "UPDATE data SET notif_ga=1 WHERE notif_ga=0";
  mysqli_query($koneksi, $query);
}
?>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>USER</title>
    <!-- bootstrap 5 css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css"
          integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous" />
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
            background: #87CEFA;
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
    <div class="sidebar p-4 " id="sidebar">
        <h4 class="mb-5 text-black" style="font-size: 25px;">CAR REQUEST</h4>
        <li>
            <a class="text-white" href="halaman_GA.php">
                Dashboard
            </a>
        </li>
        <li>
            <a class="text-white" href="request_ga.php">
                Data Car Request
                <?php include('notifikasi.php') ?>
            </a>
        </li>
        <li>
            <a class="text-white" href="laporan_ga.php">
                Laporan Car Request
            </a>
        </li>
        <li>
            <a class="text-white" href="update_jadwal.php">
                Update Jadwal Car
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
    <div style="border:1px; padding:10px; overflow:auto; width:80%; height:475px;">
        <?php
        include "koneksi.php";
        $query = mysqli_query($koneksi, "SELECT * FROM data");
        ?>
        <form action="proses_ga.php" method="post">
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr bgcolor="white">
                    <td colspan="9">
                        <h4>Pengajuan Car Request</h4>
                    </td>
                </tr>
                <tr>
                    <th width="50">No</th>
                    <th width="30">NIK</th>
                    <th width="30">Nama</th>
                    <th width="30">Section</th>
                    <th width="30">Posisi</th>
                    <th width="30">Tujuan</th>
                    <th width="30">Keberangkatan</th>
                    <th width="30">Status Manager</th>
                    <th width="30">Status GA</th>
                </tr>
                      <?php if (mysqli_num_rows($query) > 0) {
            $no = 1;
            while ($data = mysqli_fetch_array($query)) { ?>
              <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $data["nik"]; ?></td>
                <td><?php echo $data["nama"]; ?></td>
                <td><?php echo $data["section"]; ?></td>
                <td><?php echo $data["posisi"]; ?></td>
                <td><?php echo $data["tujuan"]; ?></td>
                <td><?php echo $data["keberangkatan"]; ?></td>
                <td>
                  <?php
                  if ($data["posisi"] == "manager") {
                    if ($data['status_manager'] == "Ditolak") {
                      echo "Ditolak<br>(Ditolak)";
                    } else {
                      echo "-";
                    }
                  } else {
                    echo $data['status_manager'];
                  }
                  ?>
                </td>
                 <td>
                        <?php if ($data["status_ga"] == NULL) : ?>
                            <input type="radio" name="status_ga[<?= $data['id_data'] ?>]" value="Diterima" required>Diterima
                            <input type="radio" name="status_ga[<?= $data['id_data'] ?>]" value="Ditolak" required>Ditolak
                        <?php else : ?>
                            <?php echo $data["status_ga"]; ?>
                        <?php endif; ?>
                    </td>
              </tr>
            <?php $no++;
            }
          } ?>
        </table></br>
        <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
      </form>
    </div>
  </section>
  <script>
    // event will be executed when the toggle-button is clicked
    document.getElementById("button-toggle").addEventListener("click", () => {

      // when the button-toggle is clicked, it will add/remove the active-sidebar class
      document.getElementById("sidebar").classList.toggle("active-sidebar");

      // when the button-toggle is clicked, it will add/remove the active-main-content class
      document.getElementById("main-content").classList.toggle("active-main-content");
    });
  </script>
</body>

</html>
