<?php
	session_start();
	ob_start();
	include("koneksi.php");
	if (!isset($_SESSION['username'])) {
		header("location: index.php");
	}

	$nama = $_SESSION['username'];
	$dir = "images/user/";

	if ($nama) {
			$query = mysql_query("SELECT * FROM users WHERE username = '$nama'") or die(mysql_error());

			$row = mysql_fetch_array($query);
			$gambar = $dir . $row['photo'];
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
				<div id="logout">
					<img src="<?php echo $gambar;?>" id="userimg"><br/>
					<h5 id="user"><?php
						echo "Welcome, ".$_SESSION['username']."!<br/>";
					?></h5>
					<a href="logout.php"><input type="button" value="Keluar" class="btn btn-primary" id="out" /></a>
				</div>
				<div id="search">
					<form action="" class="search-form frame inbtn rlarge">
					    <input type="text" name="search" class="search-input" placeholder="Search..." />
					    <input class="search-btn" type="submit" value="Go" name="search" />        
					</form>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<div id="nav">
			<div class="grid_12">
				<div id="content">
					<div id="slider_container_2">

					<div id="SliderName_2" class="SliderName_2">
						<img src="img/1.png" width="960" height="450" alt="Demo2 first" title="Demo2 first" usemap="#img1map" />
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