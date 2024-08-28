<?php
session_start();
include_once("koneksi.php");
if (isset($_POST['login']) ? $_POST['login'] : '') {
	$email = isset($_POST['email']) ? $_POST['email'] : '';
	$password = isset($_POST['password']) ? $_POST['password'] : '';
	$passmd5 = md5($password);

	if (empty($email) || empty($password)) {
		echo ("<script type='text/javascript'>
		alert('silahkan isi semua data');document.location='javascript:history.back(1)';
		</script>");
	} else {
		$query = mysql_query("select*from login where email='$email' and password='$passmd5'");
		$data = mysql_fetch_array($query);
		if ($username == $data['username'] && $passmd5 == $data['password']) {
			$_SESSION['id'] = $data['id'];
			$_SESSION['nama'] = $data['nama'];
			$_SESSION['level'] = $data['level'];
			$_SESSION['authorized'] = 1;
			header('Location:index.php');
			$q = mysql_query("select*from tbl_login where username='$email'");
		} else {
			echo ("<script type='text/javascript'> alert ('username atau password anda salah atau akun anda tidak aktif'); document.location='javascript:history.back(1)';
			</script>");
		}
	}
}
