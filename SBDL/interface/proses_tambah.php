<?php
include 'koneksi.php';

	$nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
	$jenis = mysqli_real_escape_string($koneksi, $_POST['jenis']);
    $modal = mysqli_real_escape_string($koneksi, $_POST['modal']);
    $harga = mysqli_real_escape_string($koneksi, $_POST['harga']);
    $jumlah = mysqli_real_escape_string($koneksi, $_POST['jumlah']);
    $sisa = $_POST['jumlah'];

	mysqli_query($koneksi, "INSERT INTO barang VALUES('', '$nama', '$jenis', '$modal', '$harga', '$jumlah', '$sisa')");
	header("location:home.php");
?>