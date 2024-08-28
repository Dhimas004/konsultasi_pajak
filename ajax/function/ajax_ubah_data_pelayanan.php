<?php
session_start();
require_once('../../koneksi.php');
$id = $_POST['id'];
$nama_pelayanan = $_POST['nama_pelayanan'];
$username = $_SESSION['username'];

$cek_data = mysql_query("SELECT * FROM data_pelayanan WHERE nama_pelayanan = '$nama_pelayanan' AND deleted_at IS NULL AND id != '$id'");
if (mysql_num_rows($cek_data) > 0) {
    echo json_encode(['res' => 'duplicate']);
    die;
}

$query = mysql_query("UPDATE data_pelayanan SET nama_pelayanan = '$nama_pelayanan',updated_at = NOW() WHERE id = '$id'");

if ($query) {
    $res = true;
} else {
    $res = false;
}
echo json_encode([
    'res' => $res
]);
