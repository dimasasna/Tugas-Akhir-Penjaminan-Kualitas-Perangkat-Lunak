<?php
session_start();
include "koneksi.php";
$username = $_POST['username'];
$password = md5($_POST['password']);

$sql = "SELECT * FROM login WHERE username='$username' AND password='$password'";
$login = mysqli_query($conn, $sql);
$ketemu = mysqli_num_rows($login);
$r = mysqli_fetch_array($login);

if ($ketemu > 0) {
	$_SESSION['username'] = $r['username'];
    $_SESSION['level'] = $r['level'];
	if($r['level']=='ADMIN'){
		header("location:halaman_admin.php");
	}else if($r['level']=='USER'){
		header("location:halaman_user.php");
	}
} else{
	header("location:index.php?pesan=gagal");
}
mysqli_close($conn);
