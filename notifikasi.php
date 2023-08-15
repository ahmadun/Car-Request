<?php
session_start();
include('koneksi.php');
if ($_SESSION['hak_akses'] == 'manager') {
    $login = mysqli_query($koneksi, "select count(id_data) as jumlah from data where notif_manager=0");
    $data = mysqli_fetch_assoc($login);
    echo '<span class="badge bg-danger rounded-pill">' . $data['jumlah'] . '</span>';
} else if ($_SESSION['hak_akses'] == 'GA') {
    $login = mysqli_query($koneksi, "select count(id_data) as jumlah from data where notif_ga=0");
    $data = mysqli_fetch_assoc($login);
    echo '<span class="badge bg-danger rounded-pill">' . $data['jumlah'] . '</span>';
} else if ($_SESSION['hak_akses'] == 'user') {
    $login = mysqli_query($koneksi, "select count(id_data) as jumlah from data where notif_user=0 AND status_spv IS NOT NULL AND status_manager IS NOT NULL AND status_ga IS NOT NULL");
    $data = mysqli_fetch_assoc($login);
    echo '<span class="badge bg-danger rounded-pill">' . $data['jumlah'] . '</span>';
}
