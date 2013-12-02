<?php
	session_start();
	ob_start();
	include("koneksi.php");
	$valid = FALSE;
	if (isset($_SESSION['username'])) {
		if (trim($_SESSION['username']) === 'admin') {
			$valid = TRUE;
		}
	}

	if ($valid) {

	if (isset($_POST['add_img'])) {
		$namabarang = $_POST['namabarang'];
		$kategori = $_POST['kategori'];
		$merk = $_POST['merk'];
		$harga = $_POST['harga'];
		$stok = $_POST['stok'];
		$deskripsi = $_POST['deskripsi'];
		$gambar = $_FILES['gambar']['name'];
		$dirgbr = "images/item/";
		$addressgbr = $dirgbr . $gambar;

		$query = mysql_query("SELECT nama_barang FROM barang WHERE nama_barang='$namabarang'");
		if (mysql_num_rows($query) > 0) {
			echo "<script type='text/javascript'> alert('Barang sudah ada!!!'); </script>";
		}else{
			$insert = mysql_query("INSERT INTO barang VALUES('','$namabarang', '$kategori', '$merk', '$harga', '$stok', '$deskripsi', '$gambar')");
			if ($insert) {
				move_uploaded_file($_FILES['gambar']['tmp_name'], $addressgbr) or die(mysql_error());
				echo "<script type='text/javascript'> alert('Barang berhasil di add!!'); </script>";
				header("location: index.php");
			}else
				echo "<script type='text/javascript'> alert('Barang gagal diupload!!!'); </script>";
		}
	}

	if (isset($_POST['hapus'])) {
		$namabarang = $_POST['namabarang'];

		$query = mysql_query("DELETE FROM `barang` WHERE `nama_barang` = '$namabarang'");
		echo "<script type='text/javascript'> alert('Barang berhasil dihapus!!!'); </script>";
	}

}else die("Login sebagai Admin terlebih dahulu!!!");
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/form.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
<div class="admin">
<h1>Upload Produk</h1><hr/>
	<form action="admin.php" enctype="multipart/form-data" method="post">
		<table>
			<tr>
				<td><label id="upload">Nama barang</label></td>
				<td> : </td>
				<td><input type="text" name="namabarang"></td>
			</tr>
			<tr>
				<td><label id="upload">Kategori</label></td>
				<td> : </td>
				<td><input type="radio" name="kategori" value="HP" class="kat">Handphone
					<input type="radio" name="kategori" value="Laptop" class="kat">Laptop
					<input type="radio" name="kategori" value="Otomotif" class="kat">Otomotif
					<input type="radio" name="kategori" value="Elektronik" class="kat">Elektronik
					<input type="radio" name="kategori" value="Kamera" class="kat">Kamera
				</td>
			</tr>
			<tr>
				<td><label id="upload">Merk</label></td>
				<td> : </td>
				<td><input type="text" name="merk"></td>
			</tr>
			<tr>
				<td><label id="upload">Harga</label></td>
				<td> : </td>
				<td><input type="text" name="harga"></td>
			</tr>
			<tr>
				<td><label id="upload">Stok</label></td>
				<td> : </td>
				<td><input type="text" name="stok"></td>
			</tr>
			<tr>
				<td><label id="upload">Deskripsi</label></td>
				<td> : </td>
				<td><textarea name="deskripsi"></textarea></td>
			</tr>
			<tr>
				<td><label id="upload">Gambar</label></td>
				<td> : </td>
				<td><input type="file" name="gambar"></td>
			</tr>
			<tr>
				<td><button name="add_img" class="btn btn-primary">Upload</button></td>
			</tr>
		</table>
	</form>
<br/><h1>Delete Barang</h1><hr />
	<form action="admin.php" method="POST">
	<table>
		<tr>
			<td><label>Nama Barang</label></td>
			<td> : </td>
			<td><input type="text" id="namabarang" name="namabarang" placeholder="Nama barang yang akan dihapus"></td>
		</tr>
		<tr>
			<td colspan="3"><button name="hapus" class="btn btn-danger">Hapus</button></td>
		</tr>
	</table>
	</form>

<!-- <br/><hr />
<h1>Pembelian</h1>
	<table>
		<tr>
			<td>Nama Pembeli</td>
			<td> : </td>
			<td><?php echo $namapembeli;?></td>
		</tr>
		<tr>
			<td>Pembayaran</td>
			<td> : </td>
			<td><?php echo $metode;?></td>
		</tr>
		<tr>
			<td>Total Pembelian</td>
			<td> : </td>
			<td><?php echo $grandtotal;?></td>
		</tr>
	</table> -->


<br/><hr />
<a href="index.php"><button class="btn btn-primary">Kembali ke Halaman Utama</button></a>
</div>
</body>
</html>