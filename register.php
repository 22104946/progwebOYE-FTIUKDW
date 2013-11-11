<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/form.css">
</head>
<body>
	<form action="register.php" method="POST">
		<div class="fieldset">
			<fieldset>
				<legend>Register</legend>
				<p><label class="field" for="username">Username : </label><input type="text" name="username"></p>
				<p><label class="field" for="password">Password : </label><input type="password" name="password"></p>
				<p><label class="field" for="nama">Nama : </label><input type="text" name="nama"></p>
				<p><label class="field" for="alamat">Alamat : </label><input type="text" name="alamat"></p>
				<p><label class="field" for="email">Email : </label><input type="text" name="email"></p>
			</fieldset>
		</div>

	<button type="submit" name="regist">Register</button>
	</form>
	<?php
		if (isset($_POST['regist'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			$nama = $_POST['nama'];
			$alamat = $_POST['alamat'];
			$email = $_POST['email'];

			$connect = mysql_connect("localhost", "root", "") or die("Gagal connect!!!");
			mysql_select_db("toko_online") or die("Gagal connect db!!");

			$query = mysql_query("SELECT username FROM users WHERE username='$username'");
			if (mysql_num_rows($query) > 0) {
				echo "su dah ada";
			}
			else
			{
				mysql_query("INSERT INTO users VALUES('','$username', '$password', '$email', '$nama', '$alamat')");
				header("location: index.php");
			}
		}
	?>
</body>
</html>
