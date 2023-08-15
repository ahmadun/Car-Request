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
  
  

<body style="padding:15px;background: white;">   
<body>
    <div class="container">
      <div class="row">
            <div class="col-md-4 offset-md-4 mt-5">
              <body style="padding:15px;background:#ddd">
<?php
  include 'koneksi.php';
  $id = @$_GET['id_kar'];
  $data = mysqli_query($koneksi,"select * from karyawan where id_kar='$id'");
  $d = mysqli_fetch_array($data);?>
<body>
               <div class="card" style="width: auto; height: auto;">
                <div class="card-title text-center">  
    <h3 style="font-size: 30px;">Update Jadwal</h3>
    <div class="card-body">
<form action="update_data_adm.php?id_kar=<?php echo $id ?>" method="post">
  <table>
          <form class="form-group" method="post"> 
<input style="margin-bottom:10px; width: 300px; height: 30px;" type="text" name="nik" value="<?php echo $d['nik']; ?>"><br>
<input style="margin-bottom:10px; width: 300px; height: 30px;" type="text" name="nama" value="<?php echo $d['nama']; ?>"><br>
<input style="margin-bottom:10px; width: 300px; height: 30px;" type="text" name="section" value="<?php echo $d['section']; ?>"><br>
<input style="margin-bottom:10px; width: 300px; height: 30px;" type="text" name="posisi" value="<?php echo $d['posisi']; ?>"><br>
<button type="submit" class="btn btn-info">Update</button>
</form>
</body>
</html>

</tr></div>     
</table>
</form>
</div>
</div>
</div>
</div>

</body>
        </section>
        </body>
</html>