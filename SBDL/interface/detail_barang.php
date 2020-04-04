<?php
    session_start();
    include 'koneksi.php';
    if(!isset($_SESSION['username'])){
	header("location:index.php");
}
?>

<!DOCTYPE html>
 <html>
 <head>
 	<title>Detail Barang</title>
	<link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="fontawesome/css/all.css">
 </head>
 <body>
 <div class="container">
 	<div class="row justify-content-md-center my-5">
     <div class="col-md-5">
        <h3 align="center">Detail Barang</h3>
        <?php
        $id_brg=mysqli_real_escape_string($koneksi, $_GET['id']);
        $det=mysqli_query($koneksi, "select * from barang where id='$id_brg'")or die(mysqli_error());
        while($d=mysqli_fetch_array($det)){
            ?>					
            <table class="table">
                <tr>
                    <td>Nama</td>
                    <td><?php echo $d['nama'] ?></td>
                </tr>
                <tr>
                    <td>Jenis</td>
                    <td><?php echo $d['jenis'] ?></td>
                </tr>
                <tr>
                    <td>Modal</td>
                    <td>Rp.<?php echo number_format($d['modal']); ?>,-</td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td>Rp.<?php echo number_format($d['harga']) ?>,-</td>
                </tr>
                <tr>
                    <td>Jumlah</td>
                    <td><?php echo $d['jumlah'] ?></td>
                </tr>
                <tr>
                    <td>Sisa</td>
                    <td><?php echo $d['sisa'] ?></td>
                </tr>
            </table>
            <?php 
        }
        ?>
                <a href="home.php" class="btn btn-success">Kembali</a>
    </div>
    </div>
</div>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


 </body>
 </html>

