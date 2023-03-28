<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin</title>
  <!-- bootstrap 5 css -->
  <link rel="stylesheet" href="http://192.168.29.55:8300/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous" />
  <link rel="stylesheet" href="http://192.168.29.55:8300/bootstrap-icons.css" />
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

<body background="#87CEFA" ;>
  <div>
    <div class="sidebar p-4 background #87CEFA" id="sidebar">
      <h4 class="mb-5 text-white">CAR REQUEST</h4>
      <li>
        <a class="text-white" href="halaman_admin.php">
          <i class="bi bi-house mr-2"></i>
          Dashboard
        </a>
      </li>
      <li>
        <a class="text-white" href="data_admin.php">
          <i class='bi bi-truck'></i>
          Input Request Car
        </a>
      </li>
      <li>
        <a class="text-white" href="laporan_admin.php">
          <i class="bi bi-clipboard-data-fill"></i>
          Laporan Car Request
          <?php include('notification.php') ?>
        </a>
      </li>
      <li>
        <a class="text-white" href="add.php">
          <i class='bi bi-person-plus'></i>
          Add USER
        </a>
      </li>
      <li>
        <a class="text-white" href="update_jadwal.php">
          <i class='bi bi-arrow-repeat'></i>
          Update Jadwal Car
        </a>
      </li>
      <li>
        <a class="text-white" href="index.php">
          <i class='bi bi-box-arrow-right'></i>
          Logout
        </a>
      </li>


    </div>
  </div>
  <section class="p-4" id="main-content">
    <button class="btn btn-primary" id="button-toggle">
      <i class="bi bi-list"></i>
    </button>
    <div class="card mt-5">
      <div class="body">
        <?php { ?>
          <body>
            <html>
            <head>
              <title>Request</title>
              <link rel="stylesheet" href="http://192.168.29.55:8300/bootstraps.min.css" />
              <script src="http://192.168.29.55:8300/bootstrap.min.js"></script>
              <script src="http://192.168.29.55:8300/jquery.min.js"></script>
            </head>

            <body>
              <div class="container" align="center">
                <br />
                <br />
                <h2 align="center">Input Data Car Request</h2>
                <div class="form-group" align="center">
                  <form name="add_name" id="add_name">
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
                            <input type="text" style="width:200px" name="tujuan[]" class="form-control nilai_list" placeholder="Tujuan">
                            <input type="text" style="width:200px" name="alasan[]" class="form-control nilai_list" placeholder="Alasan" />
                            <input type="text" style="width:200px" name="keberangkatan[]" class="form-control nilai_list" placeholder="keberangkatan">
                          </td>
                        </tr>
                      </table></br>
                      <button type="button" name="add" id="add" class="btn btn-success">Add </button>
                      <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />
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
                  $('#dynamic_field').append('<tr id="row' + i + '"><td><input type="text" style="width:200px" name="nik[]" class="form-control nilai_list" placeholder="NIK"/><input type="text" style="width:200px" name="nama[]" class="form-control nilai_list" placeholder="Nama"/><select style="width:200px" name="section[]" class="form-control name_list col-sm col-md-7"><option value="none"> Pilih Section</option><option value="HR">Human Resource</option><option value="GA">General Affair</option><option value="IS">Information System</option><option value="HSE">HSE</option><option value="CC">C&C</option><option value="TC">Training Center</option><option value="Assy">Manufacturing</option><option value="QC">Quality Control</option><option value="PE">Production Engineering</option> <option value="QA">Quality Assurance</option><option value="Design">Design</option><option value="LC">Logistic Control</option><option value="MC">Material Control</option></select></br></br><input type="text" style="width:200px" name="tujuan[]" class="form-control nilai_list" placeholder="Tujuan"><input type="text" style="width:200px" name="alasan[]" class="form-control nilai_list" placeholder="Alasan"><input type="text" style="width:200px" name="keberangkatan[]" class="form-control nilai_list" placeholder="keberangkatan"/></td>  <td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
                });
                $(document).on('click', '.btn_remove', function() {
                  var button_id = $(this).attr("id");
                  $('#row' + button_id + '').remove();
                });
                $('#submit').click(function() {
                  $.ajax({
                    url: "proses data admin.php",
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