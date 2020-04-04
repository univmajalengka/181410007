<?php
include 'koneksi.php';

$id = $_GET['id'];
$nama = $_GET['nama'];
$jenis = $_GET['jenis'];
$modal = $_GET['modal'];
$harga = $_GET['harga'];
$jumlah = $_GET['jumlah'];
$sisa = $_GET['jumlah'];
//query update
$query = mysqli_query($koneksi, "UPDATE barang SET nama='$nama' , jenis='$jenis', modal='$modal', harga='$harga', jumlah='$jumlah', sisa='$sisa' WHERE id='$id'");

if ($query) {
 # credirect ke page index
 header("location:home.php"); 
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error();
}
?>