<?php
session_start();
require_once('../../koneksi.php');
$id = $_POST['id'];
$username = $_SESSION['username'];

$query = mysql_query("UPDATE data_pelayanan SET deleted_at = NOW(),user = '$username' WHERE id = '$id'");
if ($query) {
    $res = true;
} else {
    $res = false;
}
echo json_encode([
    'res' => $res
]);
