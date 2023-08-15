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
      <div class="body">
        <?php { ?>
          <body>
            <html>
            <head>
              <title>Request</title>
              <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
            </head>

            <body>
              <div class="container" align="center">
                <br />
                <br />
                <h2 align="center">Input Data Karyawan</h2>
               <div class="form-group" align="center">
    <form name="add_name" id="add_name" action="" method="POST">
                    <div align="center">
                      <table class="table table-bordered" style="width: 200px" id="dynamic_field" align="center">
                        <tr align="center">
                          <td align="center">
                            <input type="text" style="width:200px" name="nik[]" class="form-control nilai_list" placeholder="NIK" />
                            <input type="text" style="width:200px" name="nama[]" class="form-control nilai_list" placeholder="Nama" />
                            <select  style="width:200px" name="section[]" class="form-control name_list col-sm col-md-7" >
                              <option value="none"> Pilih Section</option>
                              <option value="HR">Human Resource</option>
                              <option value="GA">General Affair</option>
                              <option value="IS">Information System</option>
                              <option value="HSE">HSE</option>
                              <option value="CC">C&C</option>
                              <option value="TC">Training Center</option>
                              <option value="Assy">Manufacturing</option>
                              <option value="QC">Quality Control</option>
                              <option value="PE">Production Engineering</option>
                              <option value="QA">Quality Assurance</option>
                              <option value="Design">Design</option>
                              <option value="LC">Logistic Control</option>
                              <option value="MC">Material Control</option>
                            </select></br></br>
                              <select  style="width:200px" name="posisi[]" class="form-control name_list col-sm col-md-7" onchange="checkAvailability()" >
                              <option value="none">Pilih Posisi</option>
                              <option value="manager">Manager</option>
                              <option value="karyawan">Karyawan</option>
                              </select></br></br>
                            </td>
                        </tr>
                      </table></br>
                      <button type="button" name="add" id="add" class="btn btn-success">Add </button>
                       <form action="Tampil_data_adm.php" method="post"><input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
                      
                    </div>
                  </form>
                </div>
              </div>
            </body>
            </html>
            <script>
              $(document).ready(function() {
                var i = 1;
                $('#add').click(function() {
                  i++;
                  $('#dynamic_field').append('<tr id="row' + i + '"><td><input type="text" style="width:200px" name="nik[]" class="form-control nilai_list" placeholder="NIK"/><input type="text" style="width:200px" name="nama[]" class="form-control nilai_list" placeholder="Nama"/><select style="width:200px" name="section[]" class="form-control name_list col-sm col-md-7"><option value="none"> Pilih Section</option><option value="HR">Human Resource</option><option value="GA">General Affair</option><option value="IS">Information System</option><option value="HSE">HSE</option><option value="CC">C&C</option><option value="TC">Training Center</option><option value="Assy">Manufacturing</option><option value="QC">Quality Control</option><option value="PE">Production Engineering</option> <option value="QA">Quality Assurance</option><option value="Design">Design</option><option value="LC">Logistic Control</option><option value="MC">Material Control</option></select></br></br><select  style="width:200px" name="posisi[]" class="form-control name_list col-sm col-md-7" onchange="checkAvailability()" ><option value="none">Pilih Posisi</option><option value="manager">Manager</option><option value="karyawan">Karyawan</option></select></br></br></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
                });
                $(document).on('click', '.btn_remove', function() {
                  var button_id = $(this).attr("id");
                  $('#row' + button_id + '').remove();
                });
                $('#submit').click(function() {
                  $.ajax({
                    url: "proses data.php",
                    method: "POST",
                    data: $('#add_name').serialize(),
                    success: function(data) {
                      alert(data);
                      $('#add_name')[0].reset();
                    }
                  });
                });
              });
            </script>
          <?php
        }  ?>
      </div>
    </div>
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