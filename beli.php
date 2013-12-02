<?php
	session_start();
	include("koneksi.php");
	$grandtotal = 0;

	$name = $_SESSION['username'];
	if (!isset($_SESSION['cart'])) {
		die("Keranjang belanja masih kosong!!!");
	}

	$queryz = "SELECT * FROM users WHERE username='$name'";
	$resultz = mysql_query($queryz);

	$row = mysql_fetch_assoc($resultz);

	$namapembeli = $row['nama'];
	$alamat = $row['alamat'];
	$telp = $row['telp'];
?>
<div id="datapembeli">
	<table>
		<tr>
			<th>Nama Pembeli</th>
			<td> : </td>
			<td><?php echo $namapembeli;?></td>
		</tr>
		<tr>
			<th>Alamat</th>
			<td> : </td>
			<td><?php echo $alamat;?></td>
		</tr>
		<tr>
			<th>No. Telp</th>
			<td> : </td>
			<td><?php echo $telp;?></td>
		</tr>
	</table>
</div>
<br/>
<div class="datagrid">
<table>
	<thead>
		<tr>
			<th>Nama Barang</th>
			<th>Jumlah</th>
			<th>Total</th>
		</tr>
	</thead>
<?php
	foreach ($_SESSION['cart'] as $id => $jml) {
			$query = "SELECT * FROM barang WHERE `id` = '$id'";
			$result = mysql_query($query);

			$record = mysql_fetch_assoc($result);

			$nama = $record['nama_barang'];
			$harga = $record['harga'];
			$total = ($harga * $jml);
			$grandtotal += $total;
?>
		<tr>
			<td><?php echo $nama;?></td>
			<td><?php echo $jml;?></td>
			<td><?php echo $total;?></td>
		</tr>
	</tbody>

<?php
}

	if (isset($_GET['beliskrg'])) {
		echo '<script> alert("Permintaan anda sedang diproses!") </script>';
		echo '<script language="JavaScript"> window.location.href ="index.php" </script>';
		unset($_SESSION['cart']);
	}
?>
	<tr>
		<td colspan="2" align="right">Sub Total</td>
		<td><?php echo $grandtotal;?></td>
	</tr>
</table>
</div>
<br/>
<div id="pembayaran">
	<table>
	<tr>
		<td>Metode Pembayaran</td>
		<td> : </td>
		<td><select>
				<option value="COD" name="metode">Bayar di tempat</option>
				<option value="BCA" name="metode">BCA</option>
				<option value="BNI" name="metode">BNI</option>
				<option value="Mandiri" name="metode">Mandiri</option>
				<option value="NISP" name="metode">NISP</option>
			</select>
		</td>
	</tr>
	</table>
</div><br />
<form action="beli.php" method="GET">
	<button id="belifix" class="btn btn-primary" name="beliskrg">Beli Sekarang juga!</button>
</form>