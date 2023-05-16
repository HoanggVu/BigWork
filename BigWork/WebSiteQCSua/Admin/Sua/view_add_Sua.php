<?php
	session_start();
	if (!isset($_SESSION['Email'])) {
		header("location:../login.php");
	}
	elseif ($_SESSION['Admin'] != 1) {
		header("location:../login.php");
	}
	$_SESSION['action'] = "TTSua";
	require("../connectdb.php");
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
		textarea{
			size: 100px;
		}
	</style>
</head>
<body>
	<div class="container">
		<form action="processing_add_Sua.php" method="POST" enctype="multipart/form-data">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm sữa mới!</h2>
			</div>
			<div class="panel-body">
				<div class="form-group">
				  <label for="usr">Mã sữa:</label>
				  <input name="MaSua" required="true" type="text" class="form-control" id="usr">
				</div>
				<div class="form-group">
				  <label for="usr">Tên sữa:</label>
				  <input name="TenSua" required="true" type="text" class="form-control" id="usr">
				</div>
				<div class="form-group">
				  <label for="usr">Hãng sữa:</label>
				  <select name="HangSua" class="form-control" id="usr">
				  	<?php
				  		$sql = "SELECT TenHS FROM hang";
						$result = mysqli_query($conn,$sql);
						while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				  	?>
				  	<option value="<?php echo $rows['TenHS'] ?>"><?php echo $rows['TenHS'] ?></option>
				  <?php } ?>
				  </select>
				</div>
				<div class="form-group">
				  <label for="usr">Loại Sữa:</label>
				  <select name="LoaiSua" class="form-control" id="usr">
				  		<option value="sữa bột">Sữa bột</option>
				  		<option value="sữa tươi">Sữa tươi</option>
				  		<option value="Sữa chua">Sữa chua</option>
				  		<option value="Sữa canxi">Sữa canxi</option>
				  </select>
				</div>
				<div class="form-group">
				  <label for="usr">Trọng lượng:</label>
				  <input name="TrongLuong" required="true" type="text" class="form-control" id="usr">
				</div>
				<div class="form-group">
				  <label for="usr">Giá:</label>
				  <input name="DonGia" required="true" type="number" class="form-control" id="usr">
				</div>
				<div class="form-group">
				  <label for="usr">Thành phần:</label>
				  <textarea name="ThanhPhan" required="true" type="text" class="form-control" id="usr"></textarea>
				</div>
				<div class="form-group">
				  <label for="usr">Lợi ích:</label>
				  <textarea name="LoiIch" required="true" type="text" class="form-control" id="usr"></textarea>
				</div>
				<div class="form-group">
				  <label for="usr">Hình:</label>
				  <input type="file" name="Hinh" class="form-control" id="usr" required="true">
				</div>
				<button class="btn btn-success">Thêm Sữa mới</button>
				<input class="btn btn-success" type="reset" name="reset" value="Reset">
			</div>
		</div>
		</form>
	</div>
</body>
</html>