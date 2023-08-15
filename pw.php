<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LUPA PASSWORD</title>
  <!-- Bootstrap 5 CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
  <div class="container mt-5">
    <form id="passwordForm">
      <div class="mb-3">
        <label for="email" class="form-label">
          <h3>Email:</h3>
        </label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <button type="button" id="showPasswordBtn" class="btn btn-success">Temukan Password</button>
      <a href="index.php"><button type="button" id="showPasswordBtn" class="btn btn-primary">LogIn kembali</button></a>
    </form>
  </div>

  <!-- Bootstrap 5 JS and jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js" integrity="sha384-JYy5Ko+01gNV5L1A6Jf7jBtxRb9Adl2MflWokycHYeaZ8HbxhODZ/daVQsaj7l3S" crossorigin="anonymous"></script>
  <!-- Custom JavaScript -->
  <script>
    $(document).ready(function() {
      $("#showPasswordBtn").click(function() {
        var email = $("#email").val();
        // Kirim permintaan Ajax ke server untuk mendapatkan password
        $.ajax({
          type: "POST",
          url: "lupa_password.php", // Ganti dengan alamat skrip PHP untuk mendapatkan password
          data: {
            email: email
          },
          success: function(response) {
            // Tampilkan password pada alert jika data berhasil ditemukan
            if (response) {
              alert("Password untuk email " + email + " adalah: " + response);
            } else {
              alert("Email tidak ditemukan.");
            }
          },
          error: function() {
            alert("Terjadi kesalahan saat menghubungi server.");
          }
        });
      });
    });
  </script>
</body>

</html>