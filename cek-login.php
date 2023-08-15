<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi, "select * from login where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if ($cek > 0) {

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if ($data['hak_akses'] == "admin") {

		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['hak_akses'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:halaman_admin.php");

		// cek jika user login sebagai pegawai
	} else if ($data['hak_akses'] == "user") {
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['hak_akses'] = "user";
		// alihkan ke halaman dashboard pegawai
		header("location:halaman_user.php");

		// cek jika user login sebagai pengurus
	} else if ($data['hak_akses'] == "supervisor") {
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['hak_akses'] = "supervisor";
		// alihkan ke halaman dashboard pengurus
		header("location:halaman_supervisor.php");

		// cek jika user login sebagai pengurus
	} else if ($data['hak_akses'] == "manager") {
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['hak_akses'] = "manager";
		// alihkan ke halaman dashboard pengurus
		header("location:halaman_manager.php");

		// cek jika user login sebagai pengurus
	} else if ($data['hak_akses'] == "GA") {
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['hak_akses'] = "GA";
		// alihkan ke halaman dashboard pengurus
		header("location:halaman_GA.php");

		// cek jika user login sebagai pengurus
	} else if ($data['hak_akses'] == "security") {
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['hak_akses'] = "security";
		// alihkan ke halaman dashboard pengurus
		header("location:halaman_security.php");
	} else {

		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}
} else {
	header("location:index.php?pesan=gagal");
}
