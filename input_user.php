<?php
require_once('./koneksi.php');
$nama = $_POST['nama'];
$no_telepon = $_POST['no_telepon'];
$nama_perusahaan = $_POST['nama_perusahaan'];
$email = $_POST['email'];
$password = $_POST['password'];
$level = $_POST['level'];

$cek_email = mysql_query("SELECT * FROM login WHERE email = '$email'");
if (mysql_num_rows($cek_email) == 0) {
    $password = md5($password);
    mysql_query("INSERT INTO `login` (
      `nama`,
      `nama_perusahaan`,
      `no_telepon`,
      `email`,
      `level`,
      `password`
    )
    VALUES
      (
        '$nama',
        '$nama_perusahaan',
        '$no_telepon',
        '$email',
        '$level',
        '$password'
      );
    ");
    echo "<script>alert('Daftar Akun Berhasil'); window.location.href='index.php'</script>";
} else {
    echo "<script>alert('Email Sudah Digunakan'); window.location.href='index.php'</script>";
}
