<?php
	session_start();
	include('koneksi.php');
?>
<script type="text/javascript" src="js/main.js"></script>
<div class="container_12" id="itemlist">
	<div id="menu_nav" class="grid_3">
		<ul class="nav nav-pills nav-stacked">
			<li class="active" id="lp"><a>List Produk</a></li>
			<li><a id="HP">Handphone</a></li>
			<li><a id="laptop">Laptop</a></li>
			<li><a id="kamera">Kamera</a></li>
			<li class="active"><a id="elektro">Peralatan Elektronik</a></li>
			<li><a id="otomotif">Otomotif</a></li>
		</ul>
	</div>
	<div id="itemlist">
<?php
	$query = mysql_query("SELECT * FROM barang WHERE `kategori`='Elektronik'");

	$dir = 'images/item/';

	while ($record = mysql_fetch_assoc($query)) {
		$id = $record['id'];
		$nama = $record['nama_barang'];
		$merk = $record['merk'];
		$harga = $record['harga'];
		$stok = $record['stok'];
		$deskripsi = $record['deskripsi'];
		$gambar = $dir . $record['gambar'];

?>
	<div id="items" class="grid_9">
		<p align="center"><?php echo $nama; ?></p>
		<img src="<?php echo $gambar;?>" height="150" width="110" />
		<p align="center"> Rp. <?php echo $harga; ?> </p>
		<form action="index.php" method="GET">
			<input type="hidden" name="id" value="<?php echo $id;?>">
			<button type="submit" id="buybutt" class="btn btn-info">Beli</button>
			<input type="text" placeholder="1" id="buy" name="jumlah" />
		</form>
		<form action="details.php" method="GET">
			<input type="hidden" name="id" value="<?php echo $id;?>">
			<button class="btn btn-info" id="details">Detail</button>
		</form>
	</div>
<?php
}

if (isset($_GET['id']) && isset($_GET['jumlah'])) {
		$id = $_GET['id'];
		$jml = $_GET['jumlah'];

		$_SESSION['cart'][$id] = $jml;
}
?>
</div>
</div>