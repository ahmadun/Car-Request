<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

// Koneksi ke database
$koneksi = mysqli_connect("dbcar", "sumitomo", "sumitomo", "request_car");

// Periksa apakah koneksi berhasil dilakukan
if (!$koneksi) {
  die("Koneksi gagal: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Mendapatkan input email dari form
  $email = mysqli_real_escape_string($koneksi, $_POST['email']);

  // Melakukan query ke database untuk mencari password berdasarkan email
  $query = "SELECT username, password FROM login WHERE email = '$email'";
  $result = mysqli_query($koneksi, $query);

  // Memeriksa apakah data ditemukan
  if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);
    $password = $data['password'];
    //echo $password; // Mengirimkan password kembali sebagai respons

    try {
      //Server settings
      //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'sumiadm1101@gmail.com';                     //SMTP username
      $mail->Password   = 'uzewncrlemklwjhj';                               //SMTP password
      //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
      $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //Recipients
      $mail->setFrom('sumiadm1101@gmail.com', 'Admin Car Request');
      $mail->addAddress($email, $data['username']);     //Add a recipient
      // $mail->addAddress('ellen@example.com');               //Name is optional
      // $mail->addReplyTo('info@example.com', 'Information');
      // $mail->addCC('cc@example.com');
      // $mail->addBCC('bcc@example.com');

      //Attachments
      //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
      //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Password Reset';
      $mail->Body    = '<h1>Password anda : <b>' . $password . '</b></h1>';
      //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      $mail->send();
      echo 'Message has been sent';
    } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  } else {
    echo ""; // Mengirimkan string kosong jika email tidak ditemukan
  }
}
