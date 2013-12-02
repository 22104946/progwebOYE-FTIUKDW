$(document).ready(function(){
	$("button#reg").click(function(){
		$("#content").load("register.php");
	});

	$("a#produks").click(function(){
		$("#content").load("produk.php");
	});

	$("a#aboutus").click(function(){
		$("#content").load("aboutus.html");
	});

	$("a#HP").click(function(){
		$("#content").load("handphone.php");
	});

	$("a#laptop").click(function(){
		$("#content").load("laptop.php");
	});

	$("a#kamera").click(function(){
		$("#content").load("kamera.php");
	});

	$("a#elektro").click(function(){
		$("#content").load("elektro.php");
	});

	$("a#otomotif").click(function(){
		$("#content").load("otomotif.php");
	});

	$("a#akun").click(function(){
		$("#content").load("akun.php");
	});

	$("button#editakun").click(function(){
		$("#content").load("editakun.php");
	});

	$("button#searchbtn").click(function(){
		$("#content").load("search.php");
	});

	$("a#pembayaran").click(function(){
		$("#content").load("howtopay.html");
	});

	$("a#shopcart").click(function(){
		$("#content").load("addtocart.php");
	});

	$("a#produkadmin").click(function(){
		$("#content").load("produkadmin.php");
	});

	$("button#beli-btn").click(function(){
		$("#content").load("beli.php");
	});
});
