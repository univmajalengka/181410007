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
 	<title>Entry Penjualan</title>
	<link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="fontawesome/css/all.css">
 </head>
 <body>
 <div class="container">
 	<div class="row justify-content-md-center my-5">
     <div class="col-md-9">
     <h3><span class="glyphicon glyphicon-briefcase"></span>  Data Barang Terjual</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2">  Entry</button>
<br/>

<br/>
<?php 
if(isset($_GET['tanggal'])){
	echo "<h4> Data Penjualan Tanggal  <a style='color:blue'> ". $_GET['tanggal']."</a></h4>";
}
?>
<table class="table">
	<tr>
		<th>No</th>
		<th>Nama Barang</th>
		<th>Harga Terjual /pc</th>
		<th>Total Harga</th>
		<th>Jumlah</th>			
		<th>Laba</th>			
	</tr>
	<?php
	$no=1;
	$brg=mysqli_query($koneksi, "select * from barang_laku");
	while($b=mysqli_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['nama'] ?></td>
			<td>Rp.<?php echo number_format($b['harga']) ?>,-</td>
			<td>Rp.<?php echo number_format($b['total_harga']) ?>,-</td>
			<td><?php echo $b['jumlah'] ?></td>			
			<td><?php echo "Rp.".number_format($b['laba']).",-"?></td>			
		</tr>

		<?php 
	}
	?>
	<tr>
		<td colspan="7">Total Pemasukan</td>
		<?php 
			$x=mysqli_query($koneksi, "select sum(total_harga) as total from barang_laku");	
			$xx=mysqli_fetch_array($x);			
			echo "<td><b> Rp.". number_format($xx['total']).",-</b></td>";
		?>
	</tr>
	<tr>
		<td colspan="7">Total Laba</td>
		<?php 
			$x=mysqli_query($koneksi, "select sum(laba) as total from barang_laku");	
			$xx=mysqli_fetch_array($x);			
			echo "<td><b> Rp.". number_format($xx['total']).",-</b></td>";
		?>
	</tr>
</table>
<a href="home.php" class="btn btn-primary">Kembali</a>
<!-- modal input -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Penjualan
				</div>
				<div class="modal-body">				
					<form action="proses_barang_laku.php" method="post">	
						<div class="form-group">
							<label>Nama Barang</label>								
							<select class="form-control" name="nama">
								<?php 
								$brg=mysqli_query($koneksi, "select * from barang");
								while($b=mysqli_fetch_array($brg)){
									?>	
									<option value="<?php echo $b['nama']; ?>"><?php echo $b['nama'] ?></option>
									<?php 
								}
								?>
							</select>

						</div>									
						<div class="form-group">
							<label>Harga Jual / unit</label>
							<input name="harga" type="text" class="form-control" placeholder="Harga" autocomplete="off">
						</div>	
						<div class="form-group">
							<label>Jumlah</label>
							<input name="jumlah" type="text" class="form-control" placeholder="Jumlah" autocomplete="off">
						</div>																	

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
						<input type="reset" class="btn btn-danger" value="Reset">												
						<input type="submit" class="btn btn-primary" value="Simpan">
					</div>
				</form>
				
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#tgl").datepicker({dateFormat : 'yy/mm/dd'});							
		});
	</script>
    </div>
    </div>
</div>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


 </body>
 </html>

