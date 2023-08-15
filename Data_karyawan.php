<!DOCTYPE html>
    <html lang="en">
      <head >
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
          <div class="sidebar p-4" id="sidebar" >
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
   
<h4>Laporan Car Request</h4>
<body>
    <form method="GET" action="Data_Karyawan.php" style="text-align: right;">
    Cari Data:</br><input type="text" name="kata_cari" value="<?php if(isset($_GET['kata_cari'])) { echo $_GET['kata_cari']; } ?>"  />
        <button type="submit"><i class="bi bi-search" style="margin-right: 7px;"></i></button>
    </form></br>
    <table>
        <thead>
           <tr>
    <th width="70">NIK</td> 
    <th width="70">Nama</td>     
    <th width="70">Section</td> 
    <th width="70">Posisi</td>  
           
      </tr>
        </thead>
        <tbody>
            <?php 
              include('koneksi.php');
                if(isset($_GET['kata_cari'])) {
                    $kata_cari = $_GET['kata_cari'];
                    $query = "SELECT * FROM karyawan WHERE NIK like '%".$kata_cari."%'  ORDER BY id_kar ASC";
                } else {
                    $query = "SELECT * FROM karyawan ORDER BY id_kar ASC";
                }
                $result = mysqli_query($koneksi, $query);
                if(!$result) {
                    die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
                }
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $row['nik']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['section']; ?></td>
                <td><?php echo $row['posisi']; ?></td>
                
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table></br>

              </p>
            </div>
          </div>
        </section>
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
    
