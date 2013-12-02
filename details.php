<?php
	session_start();
	include("koneksi.php");

	$id= $_GET['id'];
	$dir = "images/item/";

	$query = mysql_query("SELECT * FROM `barang` WHERE `id`= '$id'") or die(mysql_error());
			
	while ($row = mysql_fetch_assoc($query)) {
		$nama = $row['nama_barang'];
		$merk = $row['merk'];
		$harga = $row['harga'];
		$stok = $row['stok'];
		$deskripsi = $row['deskripsi'];
		$gambar = $dir . $row['gambar'];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Detail Barang</title>
	<link rel="stylesheet" type="text/css" href="css/detail.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
<div class="grid_8">
	<div id="content">
		<h1><?php echo $nama; ?></h1>
		<table>
			<tr>
				<td colspan="2"><img src="<?php echo $gambar;?>" height="250" width="175" /></td>
			</tr>
			<tr>
				<td><label>Harga</label></td>
				<td>Rp. <?php echo $harga; ?></td>
			</tr>
			<tr>
				<td><label>Sisa Stok</label></td>
				<td><?php echo $stok;?></td>
			</tr>
			<tr>
				<td><label>Deskripsi barang</label></td>
				<td class="text-info"><?php echo $deskripsi;?></td>
			</tr>
		</table>
		<form action="details.php">
			<input type="hidden" name="id" value="<?php echo $id;?>">
			<input type="text" placeholder="1" id="buy" name="jumlah" />
			<button type="submit" id="buybutt">Beli</button>
		</form>
	</div>
</div>
<div id="kembali">
		<a href="index.php"><button class="btn btn-primary">Kembali ke Tampilan Awal</button></a>
</div>
</body>
</html>
<?php
if (isset($_GET['id']) && isset($_GET['jumlah'])) {
		$id = $_GET['id'];
		$jml = $_GET['jumlah'];

		$_SESSION['cart'][$id] = $jml;
}
?>