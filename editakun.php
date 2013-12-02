<?php
	session_start();
	ob_start();
	include("koneksi.php");

	if (!isset($_SESSION['username'])) {
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

<div id="edit">
<form action="checkedit.php" method="POST" enctype="multipart/form-data">
	<table>
		<input type="hidden" name="id" value="<?php echo $id?>"/>
		<tr>
			<td><label>Password</label></td>
			<td> : </td>
			<td><input type="password" name="password"  value="<?php echo $pass;?>"></td>
		</tr>
		<tr>
			<td><label>Email</label></td>
			<td> : </td>
			<td><input type="text" name="email" value="<?php echo $email;?>"></td>
		</tr>
		<tr>
			<td><label>Nama</label></td>
			<td> : </td>
			<td><input type="text" name="nama" value="<?php echo $nama;?>"></td>
		</tr>
		<tr>
			<td><label>Alamat</label></td>
			<td> : </td>
			<td><input type="text" name="alamat" value="<?php echo $alamat;?>"></td>
		</tr>
		<tr>
			<td><label>Nomor Telepon</label></td>
			<td> : </td>
			<td><input type="text" name="telp" value="<?php echo $telp;?>"></td>
		</tr>
		<tr>
			<td><label>Foto</label></td>
			<td> : </td>
			<td><input type="file" name="foto" value="<?php echo $photo;?>"></td>
		</tr>
		<td>
			<input type="submit" value="Edit" name="edit" class="btn btn-primary" id="editakun">
		</td>
	</table>
</form>
</div>