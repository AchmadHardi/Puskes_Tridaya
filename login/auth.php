<?php
include("config/connection.php");
$admin = mysqli_query($conn,"SELECT * FROM user WHERE username='".$_POST['username']."' AND password='".md5($_POST['password'])."'");
if (mysqli_num_rows($admin)){
	$row = mysqli_fetch_array($admin);
	$_SESSION['username'] = $_POST['username'];
	$_SESSION['nama'] = $row['nama'];
	$_SESSION['id_user'] = $row['id'];
	$_SESSION['status'] = "logged";
	$_SESSION['level'] = $row["level"];
	header("location: media.php");
}else{
	$_SESSION['flash']['username']=$_POST['username'];
	$_SESSION['flash']['class']='alert alert-danger';
	$_SESSION['flash']['label']='Username atau password salah';
	$_SESSION['flash']['icon']='mdi mdi-sword-cross';
	header("location: index.php");
}
?>