<?php
require_once('../../koneksi.php');
$id = $_POST['id'];

$data = mysql_fetch_assoc(mysql_query("SELECT * FROM data_pelayanan WHERE id = '$id'"));
echo json_encode($data);
