<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/960_12_col.css">
	<link rel="stylesheet" type="text/css" href="css/extend.css">
	<link rel="stylesheet" type="text/css" href="css/menustyle.css" media="screen, print" />
	<link href="css/js-image-slider.css" rel="stylesheet" type="text/css" />
	<link href="css/generic.css" rel="stylesheet" type="text/css" />
    <script src="js/js-image-slider.js" type="text/javascript"></script>
	<script src="js/menuscript.js" language="javascript" type="text/javascript"></script>
</head>
<body>
	<?php
		if (!isset($_SESSION['username'])) {
			header("location: index.php");
		}
	?>
	<div class="container_12">
		<div id="header">
			<div class="grid_9">
				<img src="images/logo.jpg">
			</div>
			<div id="logout" class="grid_3">
				<img src="images/user.png" class="user"><br/>
				<p class="user"><?php
					echo "Welcome, ".$_SESSION['username']."!<br/>";
				?></p>
				<a href="logout.php"><input type="button" value="logout" id="out"/></a>
			</div>
		</div>
		<div class="clear"></div>
		<div id="nav">
			<div class="grid_3">
				<div id="search">
				<form>
					<input type="text" name="search" />
					<button type="submit" value="search"><span>Search</span></button>
				</form>
					</div>
				<div id="menu">
					<table border="0" cellpadding="0" cellspacing="0"><tr><td>
						<a href="index.php" onmouseover="setOverImg('1','');overSub=true;showSubMenu('submenu1','button1');" onmouseout="setOutImg('1','');overSub=false;setTimeout('hideSubMenu(\'submenu1\')',delay);"><img src="buttons/button1up.png" border="0" id="button1" vspace="1" hspace="1"></a><br>
						<a href="aboutus.html" onmouseover="setOverImg('2','');overSub=true;showSubMenu('submenu2','button2');" onmouseout="setOutImg('2','');overSub=false;setTimeout('hideSubMenu(\'submenu2\')',delay);"><img src="buttons/button2up.png" border="0" id="button2" vspace="1" hspace="1"></a><br>
						<a href="allproduct.html" onmouseover="setOverImg('3','');overSub=true;showSubMenu('submenu3','button3');" onmouseout="setOutImg('3','');overSub=false;setTimeout('hideSubMenu(\'submenu3\')',delay);"><img src="buttons/button3up.png" border="0" id="button3" vspace="1" hspace="1"></a><br>
						<a href="acc.php" onmouseover="setOverImg('4','');overSub=true;showSubMenu('submenu4','button4');" onmouseout="setOutImg('4','');overSub=false;setTimeout('hideSubMenu(\'submenu4\')',delay);"><img src="buttons/button4up.png" border="0" id="button4" vspace="1" hspace="1"></a><br>
						<a href="howtopay.html" onmouseover="setOverImg('5','');overSub=true;showSubMenu('submenu5','button5');" onmouseout="setOutImg('5','');overSub=false;setTimeout('hideSubMenu(\'submenu5\')',delay);"><img src="buttons/button5up.png" border="0" id="button5" vspace="1" hspace="1"></a><br>
						</td></tr>
					</table>
				</div>
			</div>
			<div class="grid_9">
				<div id="nav_content">
					<div id="sliderFrame">
				        <div id="slider">
				            <img src="images/slider-1.jpg" alt="#htmlcaption1" /></a>
				            <a class="lazyImage" href="images/slider-2.jpg" title="#htmlcaption2">slide 2</a>
				                <b data-src="images/slider-3.jpg" data-alt="#htmlcaption3">Image Slider</b>
				            </a>
				            <a class="lazyImage" href="images/slider-4.jpg" title="#htmlcaption4">slide 4</a>
				        </div>
    				</div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<div id="footer">
			<div class="grid_12">Footer</div>
		</div>
	</div>
</body>
</html>