<?php
	session_start();
	include("koneksi.php");

	if (isset($_SESSION['cart']) && isset($_SESSION['username'])) {
		//foreach
	}elseif (isset($_SESSION['cart']) && !isset($_SESSION['username'])) {
?>
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
<?php
		die("Login terlebih dahulu untuk pembelian lebih lanjut!!!");
	}elseif (!isset($_SESSION['cart']) && isset($_SESSION['username'])) {
		
	}elseif (!isset($_SESSION['cart']) && !isset($_SESSION['username'])) {
		die("Login terlebih dahulu!!!");
	}

	$username = $_SESSION['username'];
	$dir = "images/user/";

	$query = mysql_query("SELECT * FROM `users` WHERE `username` = '$username'") or die(mysql_error());
	$row = mysql_fetch_assoc($query);

	$id = $row['user_id'];
	$pass = $row['user_pass'];
	$email = $row['email'];
	$nama = $row['nama'];
	$alamat = $row['alamat'];
	$telp = $row['telp'];
	$photo = $dir . $row['photo'];

?>
<script src="js/main.js"></script>
<div id="akun">
	<table>
		<input type="hidden" name="id" value="<?php echo $id?>"/>
		<tr>
			<td colspan="3"><img src="<?php echo $photo;?>" id="photo"></td>
		</tr>
		<tr>
			<td><label>Username</label></td>
			<td> : </td>
			<td><?php echo $username;?></td>
		</tr>
		<tr>
			<td><label>Email</label></td>
			<td> : </td>
			<td><?php echo $email;?></td>
		</tr>
		<tr>
			<td><label>Nama</label></td>
			<td> : </td>
			<td><?php echo $nama;?></td>
		</tr>
		<tr>
			<td><label>Alamat</label></td>
			<td> : </td>
			<td><?php echo $alamat;?></td>
		</tr>
		<tr>
			<td><label>Nomor Telepon</label></td>
			<td> : </td>
			<td><?php echo $telp;?></td>
		</tr>
		<td>
			<button class="btn btn-primary" id="editakun">Edit Akun</button>
		</td>
	</table>
</div>
<div id="keranjangBelanja">
	<a id="shopcart"><img src="images/shopcart.png"></a>
</div>