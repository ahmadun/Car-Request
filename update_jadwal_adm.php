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
              <h4>JADWAL KEBERANGKATAN BUS PLAN</h4>
              <p>        
<?php
ob_start();
session_start();
include"koneksi.php"; 
$plan1=htmlspecialchars($_POST['plan1']);
$plan3=htmlspecialchars($_POST['plan3']);
$id = @$_GET['id'];
$update=mysqli_query($koneksi,"update jadwal set plan1='$plan1', plan3='$plan3' where id='$id'");
if($update){
    $_SESSION['pesan'] = '<font></font>';
	header("location:tampil_jadwal_adm.php");
}else{
	echo "Gagal update data!";
}
?>

  </br>
      <h6>Ketentuan jam keberangkatan adalah :</h6></br>
  Penumpang harus sudah stand by di halte 5 menit sebelum jadwal keberangkatan</br>
Penumpang yang diterima hanya yang telah memasuki list sistem</br>

</form>
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
    