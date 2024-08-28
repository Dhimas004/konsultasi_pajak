<?php
require_once('./koneksi.php');
$id = $_GET['id'];
mysql_query("UPDATE pelayanan SET status_transaksi = 'pembayaran disetujui', status_pengerjaan = 'sedang diproses' WHERE id = '$id'");
echo "<script>window.location.href='data_pembayaran.php?stat=5'</script>";
