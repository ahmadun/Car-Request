<html>
 <head> 
    <title>Admin</title> 
 </head> 
 <!DOCTYPE html>
    <html lang="en">
      <head >
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Admin</title>
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
       
          <div class="card mt-5" style="width: auto;">
          <div class="body" style="width: auto;">   
<body>
    <div class="container">
      <div class="row">
            <div class="col-md-4 offset-md-4 mt-5">
                <?php
                if(isset($_SESSION['error'])) {
                ?>
                <div class="alert alert-warning" role="alert">
                  <?php echo $_SESSION['error']?>
                </div>
                <?php
                }
                ?>

                <?php
                if(isset($_SESSION['message'])) {
                ?>
                <div class="alert alert-success" role="alert">
                  <?php echo $_SESSION['message']?>
                </div>
                <?php
                }
                ?>
                <div class="card" style="width: 350px; height: 300px;">
                <div class="card-title text-center">  
    <h3 style="font-size: 30px;">Tambah User</h3>
    <div class="card-body">
    <form method="post" action="tambah_user.php">
        <table>
          <form class="form-group" method="post">   
              <input type="text" name="username" class="form-control" id="username" aria-describedby="name" placeholder="Username" autocomplete="off" style="width: 300px; height: 30px;"></div></label>
              <input type="text" name="email" class="form-control" id="email" placeholder="Email" autocomplete="off" style="width: 300px; height: 30px;"></div></label>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password" style="width: 300px; height: 30px;"></div>
                            <div class="form-group">
                                <select type="text" name="hak_akses" class="form-control" id="hak_akses"  placeholder="Hak Akses" style="width: 300px; height: 30px;">
                                  <option value="none"> Pilih Hak Akses</option>
                                        <option value="GA">General Affairs</option>
                                        <option value="admin">admin</option>
                                        <option value="user">User</option>
                                        <option value="manager">Manager</option>
                                        <option value="security">Security</option>
  </select>
  </div> 
<div class="card-title">   
            <td><input type="submit" value="SIMPAN" class="btn btn-info" style="width: 200px;"></td>
            </tr>  </div>     
</table>
</form>
</div>
</div>
</div>
</div>
</div>
</body>
        </section>
        <script>
    document.getElementById("button-toggle").addEventListener("click", () => {
    document.getElementById("sidebar").classList.toggle("active-sidebar");
    document.getElementById("main-content").classList.toggle("active-main-content");
    });
</script>
</body> 
</html> 
