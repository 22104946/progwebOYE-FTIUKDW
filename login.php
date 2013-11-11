<?php
	session_start();

	$username = $_POST['username'];
	$password = $_POST['password'];

	if ($username && $password) {
		$connect = mysql_connect("localhost", "root", "") or die("Gagal connect!");
		mysql_select_db("toko_online") or die("Gagal connect db!");

		$query = mysql_query("SELECT username, user_pass FROM users WHERE username='$username'");

		$numrows = mysql_num_rows($query);

		if ($numrows != 0) {
			while ($row = mysql_fetch_assoc($query)) {
				$dbusername = $row['username'];
				$dbpassword = $row['user_pass'];
			}

			if ($username==$dbusername && $password==$dbpassword) {
				header('Location: login_success.php');
				$_SESSION['username'] = $username;
			}else echo "Password yang anda masukkan salah!!";
		}else die("User tidak terdaftar!");

	}else die("Masukkan ID dan Password");
?>
