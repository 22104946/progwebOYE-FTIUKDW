<?php
	session_start();
	include("koneksi.php");
?>
<script src="js/main.js"></script>
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
	$grandtotal = 0;
	if (!isset($_SESSION['cart'])) {
		die("Keranjang belanja masih kosong!!!");
	}elseif(isset($_POST['reset'])){
			unset($_SESSION['cart']);
			header('location: index.php');
	}
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
?>
	<tr>
		<td colspan="2" align="right">Sub Total</td>
		<td><?php echo $grandtotal;?></td>
	</tr>
</table>
</div>

<form action="index.php" method="post">
	<input type="hidden" name="reset" value="1" />
	<button class="btn btn-danger" id="reset-btn" name="reset">Reset</button>
</form>
	<button class="btn btn-primary" id="beli-btn" name="buy">Beli</button>
