<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ADMIN</title>
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
        <a class="text-white" href="halaman_admin.php">
          Dashboard
        </a>
      </li>
          <li>
        <a class="text-white" href="Tampil_data_adm.php">
          Data Karyawan
        </a>
      </li>
       <li>
        <a class="text-white" href="pengajuan_admin.php">
          Pengajuan Car Request
        </a>
      </li>
            <li>
              <a class="text-white" href="laporan_admin.php">
                Laporan Car Request
              </a>
            </li>
      <li>
        <a class="text-white" href="add.php">
          Add USER
        </a>
      </li>
      <li>
        <a class="text-white" href="update_jadwal_adm.php">
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
        <div class="card mt-5">
            <div class="card-body">
                <h4>Manage Data Karyawan</h4>
                <p>
                    <?php
                    echo @$_SESSION['pesan'];
                    ?>
                    <table border="1">
                        <tr>
                            <td width="85" align="center">No</td>
                            <td width="100" align="center">NIK</td>
                            <td width="100" align="center">Nama</td>
                            <td width="100" align="center">Section</td>
                            <td width="100" align="center">Posisi</td>
                            <td width="100" align="center">Aksi</td>
                        </tr>
                        <?php
                        include "koneksi.php";
                        $data = mysqli_query($koneksi, "SELECT * FROM karyawan ORDER BY id_kar DESC");
                        $no = 1;
                        while ($d = mysqli_fetch_array($data)) {
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $d['nik']; ?></td>
                                <td><?php echo $d['nama']; ?></td>
                                <td><?php echo $d['section']; ?></td>
                                <td><?php echo $d['posisi']; ?></td>
                                <td><a href="edit_data_adm.php?id_kar=<?php echo $d['id_kar']; ?>">Edit</a> / 
                                    <a href="javascript:del(<?php echo $d['id_kar']; ?>)">Hapus</a></td>
                            </tr>
                            <?php
                            $no++;
                        }
                        ?>
                    </table><br>
                    <a href="input_data_adm.php" type="button" class="btn btn-info">Tambah Data</a><br><br>

                    <script language="JavaScript" type="text/javascript">
                        function del(id_kar) {
                            if (confirm("yakin akan menghapus data ini?")) {
                                window.location.href = 'hapus_data_adm.php?id_kar=' + id_kar;
                            }
                        }
                    </script>
                    <!-- ... Form tambah data user ... -->
                </p>
            </div>
        </div>
    </section>
    <script>
        document.getElementById("button-toggle").addEventListener("click", () => {
            document.getElementById("sidebar").classList.toggle("active-sidebar");
            document.getElementById("main-content").classList.toggle("active-main-content");
        });
    </script>
</body>
</html>
