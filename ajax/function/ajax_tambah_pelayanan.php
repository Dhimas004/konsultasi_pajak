<?php
session_start();
require_once('../../koneksi.php');
$nama_pelayanan = $_POST['nama_pelayanan'];
$username = $_SESSION['username'];

$cek_data = mysql_query("SELECT * FROM data_pelayanan WHERE nama_pelayanan = '$nama_pelayanan' AND deleted_at IS NULL");
if (mysql_num_rows($cek_data) > 0) {
    echo json_encode(['res' => 'duplicate']);
    die;
}

$query = mysql_query("INSERT INTO `data_pelayanan` (
    `nama_pelayanan`,
    `user`
  )
  VALUES
    (
      '$nama_pelayanan',
      '$username'
    );
  ");

if ($query) {
    $res = true;
} else {
    $res = false;
}
echo json_encode([
    'res' => $res
]);
