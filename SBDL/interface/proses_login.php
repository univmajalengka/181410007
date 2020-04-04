<?php 
session_start();
include 'koneksi.php';
$username=$_POST['username'];
$password=md5($_POST['password']);
$query=mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'")or die(mysqli_error());
if(mysqli_num_rows($query)==1){
	$_SESSION['username']=$username;
	header("location:home.php");
}
 ?>