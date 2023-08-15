<!DOCTYPE html>
<html lang="en">

<?php
include('koneksi.php');
$cekJumlah = mysqli_query($koneksi, "select count(id_data) as jumlah from data where notif_manager=0");
$data = mysqli_fetch_assoc($cekJumlah);
if ($data['jumlah'] > 0) {
  $query = "UPDATE data SET notif_manager=1 WHERE notif_manager=0";
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
      <div style="border:1px; padding:10px; overflow:50px; width:50%; height:auto;">
   
      <?php
      include "koneksi.php";
      $query = mysqli_query($koneksi, "SELECT * FROM data");
      ?>
      <form action="proses_manager.php" method="post">
        <table width="150%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr bgcolor="white"></br>
            <h4>Pengajuan Car Request</h4><br>
          <tr>
            <th width="20">No</td>

            <th width="30">NIK</td>
            <th width="30">Nama</td>
            <th width="30">Section</td>
            <th width="30">Posisi</td>
            <th width="30">Tujuan</td>
            <th width="50">Alasan</td>
            <th width="50">Keberangkatan</td>
            <th width="10">Status Manager</td>

          </tr>
          <?php
        $no = 1;
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $data["nik"]; ?></td>
                <td><?php echo $data["nama"]; ?></td>
                <td><?php echo $data["section"]; ?></td>
                <td><?php echo $data["posisi"]; ?></td>
                <td><?php echo $data["tujuan"]; ?></td>
                <td><?php echo $data["alasan"]; ?></td>
                <td><?php echo $data["keberangkatan"]; ?></td>
               <?php if ($data["posisi"] !== "manager") : ?>
                    <td>
                  <?php if ($data["status_manager"] == NULL) : ?>
                    <input type="radio" name="status_manager[<?= $data['id_data'] ?>]" value="diterima" required>Diterima
                    <input type="radio" name="status_manager[<?= $data['id_data'] ?>]" value="ditolak" required>Ditolak
                  <?php else : ?>
                    <?php echo $data["status_manager"]; ?>
                  <?php endif; ?>
                </td>
                <?php else : ?>
                    <td>
                        <!-- Jika posisi adalah "manager", disable input radio -->
                        <input type="radio" name="status_manager[<?= $data['id_data'] ?>]" value="Diterima" disabled>Diterima
                        <input type="radio" name="status_manager[<?= $data['id_data'] ?>]" value="Ditolak" disabled>Ditolak
                    </td>
                <?php endif; ?>
            </tr>
        <?php $no++;
        } ?>
    </table>
<?php ?>
</br>
        </table>

        <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
    </div>
    </form>
    </div>
    </div>
    </div>
    </div>
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div id="result" class="d-none"></div>
      </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
      $(document).ready(function() {
        $('input[type="checkbox"]').click(function() {
          var stt = $(this).val();
          console.log(stt)

          function setHide() {
            setTimeout(function() {
              $("#result").removeClass("d-block")
              $("#result").addClass("d-none")
            }, 2000)
          }

          $.ajax({
            url: "proses_manager.php",
            method: POST,
            data: {
              status_spv: stt
            },
            success: function(data) {
              $("#result").removeClass("d-none")
              $("#result").addClass("d-block")
              $("#result").html(data)
              setHide()
            }
          })
        })

      })
    </script>

    </td>
    </tr>

    </tr>

    </p>
    </div>
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

}</html>
