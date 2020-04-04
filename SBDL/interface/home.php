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
 	<title>DASHBOARD</title>
	<link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="fontawesome/css/all.css">
 </head>
 <body>
 	<div class="container">
 	    <div class="row justify-content-md-center">
 	        <div class="col-md-auto">
 	<h1>SELAMAT DATANG <?= @$_SESSION['uname'] ?></h1>
 	<button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#tambah">Tambah Data Barang</button>
     <a href="penjualan.php" class="btn btn-success my-3">Entry Pejualan</a>
 	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">No</th>
	      <th scope="col">Nama Barang</th>
          <th scope="col">Harga Jual</th>
          <th scope="col">Jumlah</th>
		  <th scope="col">Action</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php
	  	$query = mysqli_query($koneksi, "SELECT * FROM barang");
	  	$nomer = 1;
	  	while ($data = mysqli_fetch_array($query)) {
	  	?>
	    <tr>
	      <td><?= $nomer++ ?></td>
	      <td><?= $data['nama'];?></td>
          <td><?= $data['harga'];?></td>
          <td><?= $data['jumlah'];?></td>
				<td>
                    <a href="detail_barang.php?id=<?= $data['id'];?>" type="button" class="btn btn-primary">Detail</a>
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit<?php echo $data['id']; ?>">Edit</button>
					<a href="proses_delete.php?id=<?= $data['id'];?>" type="button" class="btn btn-danger" onclick="return confirm('Yakin Hapus?')">Delete</a>
				</td>
	    </tr>
			        <!-- Modal Edit Barang-->
        <div class="modal fade" id="edit<?php echo $data['id']; ?>" role="dialog">
        <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Update Data Barang</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">

            <form role="form" action="proses_update.php" method="get">

                <?php
                $id = $data['id']; 
                $query_edit = mysqli_query($koneksi, "SELECT * FROM barang WHERE id='$id'");
                while ($row = mysqli_fetch_array($query_edit)) {  
                ?>

                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>">      
                </div>
                <div class="form-group">
                    <label>Jenis</label>
                    <input type="text" name="jenis" class="form-control" value="<?php echo $row['jenis']; ?>">      
                </div>
                <div class="form-group">
                    <label>Modal</label>
                    <input type="text" name="modal" class="form-control" value="<?php echo $row['modal']; ?>">      
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <input type="text" name="harga" class="form-control" value="<?php echo $row['harga']; ?>">      
                </div>
                <div class="form-group">
                    <label>Jumlah</label>
                    <input type="text" name="jumlah" class="form-control" value="<?php echo $row['jumlah']; ?>">      
                </div>
                <div class="modal-footer">  
                    <button type="submit" class="btn btn-success">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
                <?php 
                }
                ?>        
            </form>
            </div>
        </div>
    </div>
</div>
		<?php } ?>
	  </tbody>
</table>

<a class="btn btn-danger" href="proses_logout.php" role="button">LOGOUT</a>
</div>


<!-- MODAL -->
<div id="tambah" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
						<h4>Tambah Data Barang</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
						<form method="POST" action="proses_tambah.php">
							<div class="modal-body">
								<div class="form-grup">
									<label class="control-label" for="nama">Nama Barang</label>
									<input type="text" name="nama" class="form-control" id="nama" required>
								</div>
								<div class="form-grup">
									<label class="control-label" for="npm">Jenis Barang</label>
									<input type="text" name="jenis" class="form-control" id="jenis" required>
								</div> 
                                <div class="form-grup">
									<label class="control-label" for="alamat">Harga Modal</label>
									<input type="text" name="modal" class="form-control" id="modal" required>
								</div>
                                <div class="form-grup">
									<label class="control-label" for="alamat">Harga Jual</label>
									<input type="text" name="harga" class="form-control" id="harga" required>
								</div>
                                <div class="form-grup">
									<label class="control-label" for="alamat">Jumlah</label>
									<input type="text" name="jumlah" class="form-control" id="jumlah" required>
								</div>
							</div>
							<div class="modal-footer">
								<button type="reset" class="btn btn-danger">Reset</button>
								<input type="submit" class="btn btn-success" name="tambah" value="Simpan">
							</div>
						</form>
					</div>
				</div>
	</div>
</div>
<!-- AKHIR MODAL -->


<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


 </body>
 </html>