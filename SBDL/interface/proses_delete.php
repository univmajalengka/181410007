<?php 
	include 'koneksi.php';

	$id = $_GET['id'];
	$query = mysqli_query($koneksi, "DELETE FROM barang WHERE id='$id'");
	header("location:home.php");

?>