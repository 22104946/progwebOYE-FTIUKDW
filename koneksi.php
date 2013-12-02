<?php
	$server = "localhost";
	$username = "root";
	$pass = "";
	$database = "toko_online";

	mysql_connect($server, $username, $pass) or die(mysql_error());
	mysql_select_db($database)or die('Gagal connect db!');
?>