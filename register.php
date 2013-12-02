<?php
	session_start();
	ob_start();
	include("koneksi.php");

	if (isset($_POST['regist'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$email = $_POST['email'];
	$telp = $_POST['telp'];
	$gambar = $_FILES['gambar']['name'];
	$dirgbr = "images/user/";
	$addressgbr = $dirgbr . $gambar;
	$valid = TRUE;
	

	if (!preg_match("/^([a-z0-9_\.]+)@([a-z0-9\-]+\.)+[a-z]{2,6}$/i", $_POST['email'])) {
		$_SESSION['error_msg'] = "Format email salah (example@example.com) !!";
		header('location: index.php');
		$valid = FALSE;
	}

	if (trim($_POST['username']=="")) {
		$_SESSION['error_msg'] = "Username harus diisi!!";
		header('location: index.php');
		$valid = FALSE;
	}

	if (trim($_POST['password']=="")) {
		$_SESSION['error_msg'] = "Password harus diisi!!');";
		header('location: index.php');
		$valid = FALSE;
	}

	if ($valid) {
	$query = mysql_query("SELECT username FROM users WHERE username='$username'");
	if (mysql_num_rows($query) > 0) {
		echo "<script type='text/javascript'> alert('ID sudah terdaftar!!'); </script>";
	}else{
		$insert = mysql_query("INSERT INTO users VALUES('','$username', '$password', '$email', '$nama', '$alamat', '$telp', '$gambar')");
		if ($insert) {
			move_uploaded_file($_FILES['gambar']['tmp_name'], $addressgbr) or die(mysql_error());
		}
		header("location: index.php");
	}
}
}
?>

<form action="register.php" method="POST" id="formreg" enctype="multipart/form-data">
	<div class="fieldset">
		<fieldset>
			<legend>
				Register
			</legend>
			<p>
				<label class="field" for="username">Username : </label>
				<input type="text" name="username" class="reginput" id="focusedInput">
			</p>
			<p>
				<label class="field" for="password">Password : </label>
				<input type="password" name="password" class="reginput" id="focusedInput">
			</p>
			<p>
				<label class="field" for="nama">Nama : </label>
				<input type="text" name="nama" class="reginput" id="focusedInput">
			</p>
			<p>
				<label class="field" for="alamat">Alamat : </label>
				<input type="text" name="alamat" class="reginput" id="focusedInput">
			</p>
			<p>
				<label class="field" for="email">Email : </label>
				<input type="text" name="email" class="reginput" id="focusedInput">
			</p>
			<p>
				<label class="field" for="telp">Telp : </label>
				<input type="text" name="telp" class="reginput" id="focusedInput">
			</p>
			<p>
				<label class="field" for="foto">Foto </label>
				<input type="file" name="gambar" class="reginput">
			</p>
		</fieldset>
	</div>

	<button type="submit" name="regist" class="btn btn-primary" id="register">
		Register
	</button>
</form>