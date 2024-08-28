<?php
require_once('./koneksi.php');
$id = $_GET['id'];
mysql_query("DELETE FROM `login` WHERE id = '$id'");
echo "<script>alert('Berhasil Hapus User');window.location.href='data_user.php'</script>";
