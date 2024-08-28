<?php
require_once('./koneksi.php');
$id_pelayanan = $_GET['id_pelayanan'];
$id_user = $_GET['id_user'];
mysql_query("UPDATE pelayanan SET dikerjakan_oleh = '$id_user' WHERE id = '$id_pelayanan'");
echo "<script>window.location.href='data_pembayaran.php?stat=7'</script>";
