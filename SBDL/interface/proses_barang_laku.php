<?php 

include 'koneksi.php';
$nama=$_POST['nama'];
$harga=$_POST['harga'];
$jumlah=$_POST['jumlah'];

$dt=mysqli_query($koneksi, "SELECT * FROM barang WHERE nama='$nama'");
$data=mysqli_fetch_array($dt);
$sisa=$data['jumlah']-$jumlah;
mysqli_query($koneksi, "UPDATE barang SET jumlah='$sisa' WHERE nama='$nama'");

$modal=$data['modal'];
$laba=$harga-$modal;
$labaa=$laba*$jumlah;
$total_harga=$harga*$jumlah;
mysqli_query($koneksi, "insert into barang_laku values('','$nama','$jumlah','$harga','$total_harga','$labaa')")or die(mysqli_error());
header("location:penjualan.php");

?>