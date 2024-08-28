<?php
require_once('./koneksi.php');
$id = $_GET['id'];
mysql_query("UPDATE pelayanan SET status_pengerjaan = 'sudah selesai' WHERE id = '$id'");
echo "<script>window.location.href='data_pembayaran.php?stat=6'</script>";
