<!-- edit.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Karyawan</title>
    <!-- Tambahkan link CSS dan bootstrap jika diperlukan -->
</head>
<body>
    <?php
    // Koneksi ke database dan akses data karyawan yang akan di-edit
    include "koneksi.php";
    $id = @$_GET['id_kar'];
    $data = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE id_kar='$id'");
    $d = mysqli_fetch_array($data);
    ?>

    <h2>Edit Data Karyawan</h2>
    <form action="update_data_adm.php?id_kar=<?php echo $id ?>" method="post">
        <label for="nik">NIK:</label>
        <input type="text" name="nik" value="<?php echo $d['nik']; ?>" required><br>

        <label for="nama">Nama:</label>
        <input type="text" name="nama" value="<?php echo $d['nama']; ?>" required><br>

        <label for="section">Section:</label>
        <input type="text" name="section" value="<?php echo $d['section']; ?>" required><br>

        <label for="posisi">Posisi:</label>
        <input type="text" name="posisi" value="<?php echo $d['posisi']; ?>" required><br>

        <button type="submit">Update</button>
    </form>
</body>
</html>
