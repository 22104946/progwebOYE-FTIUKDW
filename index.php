<?php
	session_start();
	ob_start();
	include("koneksi.php");
	if(isset($_POST['username'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		if ($username && $password) {
			$query = mysql_query("SELECT username, user_pass FROM users WHERE username='$username'");
			
			$numrows = mysql_num_rows($query);

			if ($numrows != 0) {
				while ($row = mysql_fetch_assoc($query)) {
					$dbusername = $row['username'];
					$dbpassword = $row['user_pass'];
				}

				if ($username==$dbusername && $password==$dbpassword) {
					header('Location: home.php');
					$_SESSION['username'] = $username;
				}else echo "<script type='text/javascript'> alert('Password yang anda masukkan salah!!'); </script>";
			}else echo "<script type='text/javascript'> alert('User tidak terdaftar!'); </script>";

		}else echo "<script type='text/javascript'> alert('Masukkan ID dan Password'); </script>";
	}

	if (isset($_GET['id']) && isset($_GET['jumlah'])) {
		$id = $_GET['id'];
		$jml = $_GET['jumlah'];

		$_SESSION['cart'][$id] = $jml;
	}

	if(isset($_POST['reset'])){
			unset($_SESSION['cart']);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Rumah Gadget</title>
	<link rel="stylesheet" type="text/css" href="css/960_12_col.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/form.css">
	<link rel="stylesheet" type="text/css" href="css/sliderman.css" />
	<script src="js/jquery.js"></script>
	<script src="js/main.js"></script>
	<script type="text/javascript" src="js/sliderman.1.3.7.js"></script>
</head>
<body>
<?php
		if (isset($_SESSION['username'])) {
			header("location: home.php");
		}
	?>
	<div class="container_12">
		<div id="header">
			<div class="grid_9">
				<div id="imglogo">
					<img src="images/logo.png">
				</div>
				<div id="menu_new">
					<div id='cssmenu'>
					  <ul>
					     <li class='active'><a href='index.php'>Beranda</a></li>
					     <li><a id="produks">Produk</a></li>
					     <li><a id="aboutus">Tentang Kami</a></li>
					     <li><a id="akun">Akun Anda</a></li>
					     <li><a id="pembayaran">Cara Pembayaran</a></li>
					  </ul>
					</div>
				</div>
			</div>
			<div class="grid_3">
				<div id="login">
					<form action="index.php" class="form-horizontal" role="form" method="POST">
					  <div class="form-group">
					    <div class="col-sm-10">
					      <input type="text" name="username" class="form-control" id="focusedInput" placeholder="Akun Pengguna">
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-10">
					      <input type="password" name="password" class="form-control" id="focusedInput" placeholder="Kata Sandi">
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-10">
					      <button type="submit" class="btn btn-primary" value="login">Masuk</button>
					    </div>
					  </div>
					</form>
					<div class="col-sm-10" id="regdiv">
					      <button class="btn btn-primary" id="reg">Buat Akun</button>
					</div>
				</div>
				<div id="search">
					<form action="search.php" class="search-form frame inbtn rlarge" method="POST">
					    <input type="text" name="search" class="search-input" placeholder="Search..." />
						<button class="search-btn" id="searchbtn">Go</button>
					    <!-- <input class="search-btn" type="submit" value="Go" id="searchbtn" /> -->        
					</form>
				</div>
			</div>
		</div>
		
		<div class="clear"></div>
		<div id="nav">
			<div class="grid_12">
				<div id="content">
					<div id="errormsg">
						<?php
						if (isset($_SESSION['error_msg'])) {
								$error_msg = $_SESSION['error_msg'];
								echo $error_msg;
								session_unset($_SESSION['error_msg']);
							}
						?>
					</div>
					<div id="slider_container_2">

					<div id="SliderName_2" class="SliderName_2">
						<img src="img/1.png" width="960" height="450" alt="Promo 1" title="Promo Diskon" usemap="#img1map" />
						<map name="img1map">
							<area href="#img1map-area1" shape="rect" coords="100,100,200,200" />
							<area href="#img1map-area2" shape="rect" coords="300,100,400,200" />
						</map>
						<img src="img/2.png" width="960" height="450" alt="Promo 2" title="Promo Diskon" />
						<img src="img/3.png" width="960" height="450" alt="Promo 3" title="Promo Diskon" />
						<img src="img/4.png" width="960" height="450" alt="Promo 4" title="Promo Diskon" />
					</div>
					<div class="c"></div>
					<div id="SliderNameNavigation_2"></div>
					<div class="c"></div>

					<script type="text/javascript">
						effectsDemo2 = 'rain,stairs,fade';
						var demoSlider_2 = Sliderman.slider({container: 'SliderName_2', width: 960, height: 450, effects: effectsDemo2,
							display: {
								autoplay: 3000,
								loading: {background: '#000000', opacity: 0.5, image: 'img/loading.gif'},
								buttons: {hide: true, opacity: 1, prev: {className: 'SliderNamePrev_2', label: ''}, next: {className: 'SliderNameNext_2', label: ''}},
								description: {hide: true, background: '#000000', opacity: 0.4, height: 50, position: 'bottom'},
								navigation: {container: 'SliderNameNavigation_2', label: '<img src="img/clear.gif" />'}
							}
						});
					</script>

					<div class="c"></div>
				</div>
				<div class="c"></div>
				</div>
				<div class="c"></div>
			</div>
		</div>
		<div class="clear"></div>
		<div id="footer">
			<div class="grid_12">
				<div id="kontak_kami">
					<h2>Hubungi Kami</h2>
					<hr />
					<p><img src="images/telp.png"> 085612332144</p>
					<p><img src="images/fb.png"> facebook.com/rumahgadget</p>
					<p><img src="images/twitter.png"> RumahGadget</p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>