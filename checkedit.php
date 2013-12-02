<?php 
	ob_start();
	include("koneksi.php");
	$id = $_POST['id'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$telp = $_POST['telp'];
	$gambar = $_FILES['gambar']['name'];
	$dir="images/user/";
	$gambarLoc = $dir . $gambar;

	if(empty($gambar)){
	$query = "UPDATE `users` SET `user_pass`='$password', `email`='$email', `nama`='$nama', `alamat`='$alamat', `telp` = '$telp' WHERE `user_id`='$id'";
	mysql_query($query);
	}
	else{
	$query = "UPDATE `users` SET `user_pass`='$password', `email`='$email', `nama`='$nama', `alamat`='$alamat', `telp` = '$telp', `photo` = '$gambar' WHERE `user_id`='$id'";
	mysql_query($query);
	}
	
	if($query){
	move_uploaded_file($_FILES["gambar"]["tmp_name"], $gambarLoc);
	echo "Data berhasil diperbaharui!";
	header("location: home.php");
	}
	else
	{
		echo "<script type='text/javascript'> alert('Data gagal diperbaharui! '); </script>";
	}

?>

