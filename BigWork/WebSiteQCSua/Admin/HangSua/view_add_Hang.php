<?php
	session_start();
	if (!isset($_SESSION['Email'])) {
		header("location:../view.php");
	}
	elseif ($_SESSION['Admin'] != 1) {
		header("location:../view.php");
	}
	$_SESSION['action'] = "TTHang";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Thêm Hãng sữa</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<style type="text/css">
		.container{
			margin: 15px auto;
			border: 2px solid black;
			padding: 15px;
			border-radius: 15px;
			box-shadow: 5px 10px #656565;
		}
	</style>
</head>
<body>
	<div class="container">
		<form action="processing_add_Hang.php" method="POST">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm Hãng sữa mới!</h2>
			</div>
			<div class="panel-body">
				<div class="form-group">
				  <label for="usr">Mã Hãng sữa:</label>
				  <input name="MaHS" required="true" type="text" class="form-control" id="usr">
				</div>
				<div class="form-group">
				  <label for="usr">Tên Hãng sữa:</label>
				  <input name="TenHS" required="true" type="text" class="form-control" id="usr">
				</div>
				<div class="form-group">
				  <label for="usr">Địa chỉ:</label>
				  <input name="DiaChi" required="true" type="text" class="form-control" id="usr">
				</div>
				<div class="form-group">
				  <label for="usr">Số điện thoại:</label>
				  <input name="DienThoai" required="true" type="text" class="form-control" id="usr">
				</div>
				<div class="form-group">
				  <label for="email">Email:</label>
				  <input name="Email" required="true" type="email" class="form-control" id="email">
				</div>
				<button class="btn btn-success">Thêm Hãng Sữa</button>
				<input class="btn btn-success" type="reset" name="reset" value="Reset">
			</div>
		</div>
		</form>
	</div>
</body>
</html>