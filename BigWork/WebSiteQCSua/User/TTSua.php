<?php
	require_once("../connectdb.php");
	$TenSua = $_GET['TenSua'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
	<style type="text/css">
		body {
		  background: linear-gradient(-45deg, #FE09D3, #7C07F4, #23a6d5, #1DD5AA);
		  background-size: 400% 400%;
		  animation: gradient 15s ease infinite;
		  height: 100vh;
		}
		@keyframes gradient {
		  	0% {
		    	background-position: 0% 50%;
		}
		  	50% {
		    	background-position: 100% 50%;
		}
		  	100% {
		    	background-position: 0% 50%;
		  	}
		}

		*{
			margin: 0;
			padding: 0;
			font-family: Verdana, Helvetica, sans-serif;
		}
		.container{
			width: 100%;
			margin: auto;
			overflow-x: auto;
		}
		.menu{
			position: fixed;
			width: 100%;
			height: 20%;
			background-color: orange;
			border-bottom: 2px solid black;
			box-sizing: border-box;
		}
		.menu-top{
			width: 80%;
			margin: 0 auto;
			list-style-type: none;
			border-bottom: 1px solid black;
		}
		.menu-top li{
			display: inline-table;
			width: 150px;
		}

		.menu-top .logo{
			margin-right: 200px;
		}
		.menu-top .logo img{
			width: 80px;
		}
		.menu-top .logo a{
			display: initial;
		}
		.menu-top li img{
			vertical-align: middle;
			width: 30px;
		}
		.menu-top li a{
			display: block;
			padding-left: 10px;
			box-sizing: border-box;
			color: black;
			text-decoration: none;
		}
		.menu-top li a:hover{
			transition: 0.3s;
			color: white;
		}
		.menu-bot{
			width: 80%;
			margin: 5px auto;
		}
		.menu-bot .search{
			display: inline-block;
			width: 540px;
			height: 35px;
			border: 2px solid black;
			border-radius: 5px;
			background-color: white;
			margin-right: 200px;
		}
		.menu-bot .search input[type="text"]{
			padding-left: 15px;
			box-sizing: border-box;
			width: 500px;
			height: 35px;
			border: none;
		}
		.menu-bot button{
			width: 32px;
			height: 32px;
			vertical-align: middle;
			border: none;
			background-color: white;
		}
		.menu-bot button img{
			width: 30px;
		}
		.menu-bot .buy{
			display: inline-block;
		}
		.menu-bot .buy button{
			width: 40px;
			height: 40px;
			background-color: white;
			border: 1px solid black;
			border-radius: 10px;
			margin-bottom: 3px;
		}
		.menu-bot .buy button:hover{
			padding: 5px;
			transition: 0.2s;
		}
		.button-select a:hover .menu-left{
			display: block;
		}
		.select{
			position: fixed;
			margin: 5px;
			width: 40px;
			height: 40px;
			border: 2px solid black;
			border-radius: 10px;
		}
		.select div {
			padding-left: 15%;
		  	width: 35px;
		 	height: 5px;
		  	background-color: black;
		 	margin: 6px 0;
		 	box-sizing: border-box;
		}
		.menu-left{
			display: none;
			position: fixed;
			width: 150px;
			border: 2px solid black;
			height: 100%;
			background-color: orange;
		}
		.menu-left .hide-button{
			width: 35px;
			height: 35px;
			margin-left: 70%;
			margin-top: 5px;
			border: 2px solid black;
			border-radius: 10px;
		}
		.menu-left .hide-button:active{
			display: none;
		}
		.content{
			width: 80%;
			margin: 150px auto;
			background-color: white;
			box-sizing: border-box;
			border: 1px solid gray;
		}
		.products h2{
			padding-bottom: 10px;
			text-align: center;
		}
		.product{
			width: 100%;
			padding-left: 10px;
			margin-bottom: 10px;
			height: 100%;
			border: 1px solid black;
			border-radius: 10px;
			display: inline-table;
			text-align: center;
			box-sizing: border-box;
		}
		.product .image img{
			padding-top: 10px;
			width: 400px;
		}
		.products a{
			text-decoration: none;
		}
		.description tr{
			border-collapse: collapse;
			height: 50px;
			width: 100%;
		}
		.description td{
			text-align: left;
			width: 500px;
			color: black;
			border-bottom: 1px solid black;
		}
		.description .milkName{
			font-size: 15px;
			font-weight: bold;
		}
		.end{
			width: 100%;
			height: 200px;
			border-top: 2px solid black;
			background-color: orange;
		}
		.end .mxh{
			margin-left: 15px;
			float: left;
		}
		.end .mxh li{
			padding-top: 130px;
			width: 200px;
			list-style-type: none;
			display: inline-block;
		}
		.end .mxh li a:hover{
			display: block;
			box-shadow: 2px 2px 2px 2px #5A5A5A;
		}
		.end .mxh img{
			width: 50px;
			vertical-align: middle;
		}
		.end a{
			display: block;
			text-decoration: none;
			color: white;
		}
		.end .mota {
			margin-left: 500px;
			float: left;
			padding-top: 15px;
			padding-left: 15px;
			width: 400px;
			height: 200px;
			box-sizing: border-box;
			font-weight: bold;
		}
		.end .mota p{
			padding: 5px;
			box-sizing: border-box;
		}
	</style>
</head>
<body>
	<div class="container">

		<div class="menu">
			<ul class="menu-top">
				<li class="logo"><a href="view.php">
					<img src="logo.png">
				</a></li>
				<li><a href="view.php">
					<img src="login.png">
					Trang chủ
				</a></li>
				<li><a href="#">
					<img src="login.png">
					Loại Sữa
				</a></li>
				<li><a href="#">
					<img src="login.png">
					Flash Sale
				</a></li>
				<li><a href="#">
					<img src="login.png">
					Đăng nhập
				</a></li>
			</ul>
			<ul class="menu-bot">
				<div class="search">
					<form>
						<input type="text" name="txtSearch" placeholder="Search...">
						<button>
							<img src="search.png">
						</button>
					</form>
				</div>
				<div class="buy">
					<button name="buy" type="button" onclick="buy()">
						<img src="buy.png">
					</button>
				</div>
			</ul>
		</div>
		<div class="button-select">
			<a href="">
				<div class="select">
					<div></div>
					<div></div>
					<div></div>
				</div>
				<div class="menu-left">
					<div class="hide-button">
					</div>
				</div>
			</a>
		</div>

		<div class="content">
				<form>
					<h2>THÔNG TIN SẢN PHẨM</h2>
					<?php
					$sql = "SELECT * FROM loaisua WHERE TenSua = '$TenSua'";
					$result = mysqli_query($conn,$sql);
					while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
						$TenSua = $rows["TenSua"];
						$HangSua = $rows["HangSua"];
						$LoaiSua = $rows["LoaiSua"];
						$TrongLuong = $rows["TrongLuong"];
						$DonGia = $rows["DonGia"];
						$Hinh = $rows["Hinh"];
					?>
					<div class="product">
							<div class="image">
								<img src="picture_test.jpg">
							</div>
							<div class="description">
								<table>
									<tr>
										<td class="milkName">Tên sữa:</td>
										<td class="milkName"><?php echo "$TenSua"; ?></td>
									</tr>
									<tr>
										<td class="milkName">Nhà sản xuất:</td>
										<td><?php echo "$HangSua"; ?></td>
									</tr>
									<tr>
										<td class="milkName">Loại sữa:</td>
										<td><?php echo "$LoaiSua"; ?></td>
									</tr>
									<tr>
										<td class="milkName">Trọng lượng:</td>
										<td><?php echo "$TrongLuong gram"; ?></td>
									</tr>
									<tr>
										<td class="milkName">Giá:</td>
										<td><?php echo "$DonGia VNĐ"; ?></td>
									</tr>
									<tr>
										<td class="milkName">Thành phần:</td>
										<td><?php echo ""; ?></td>
									</tr>
									<tr>
										<td class="milkName">Lợi ích:</td>
										<td><?php echo ""; ?></td>
									</tr>
								</table>
							</div>
					</div>
					<?php }?>
				</form>
		</div>

		<div class="end">
			<ul class="mxh">
				<li>
					<a href="https://www.facebook.com/profile.php?id=100007498090194">
						<img src="facebook.png">Khương Nguyễn
					</a>
				</li>
				<li>
					<a href="https://www.youtube.com/c/KNOFFICIALGAME">
						<img src="youtube.png">KN OFFICIAL
					</a>
				</li>
				
			</ul>
			<div class="mota">
				<p>Chi tiết liên hệ: 0366193799</p>
				<p>Email: knofficial6@gmail.com</p>
				<p>This website design by KN OFFICIAL</p>
				<p>Thanks for watching!</p>
			</div>
		</div>
	</div>
<script>
	function buy(){
		alert("buy");
	}
</script>
</body>
</html>