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
	$MaSua = $_GET['MaSua'];
	$sql = "SELECT * FROM loaisua WHERE MaSua = '$MaSua'";
	$result = mysqli_query($conn,$sql);
	while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		$TenSua = $rows['TenSua'];
		$HangSua = $rows['HangSua'];
		$LoaiSua = $rows['LoaiSua'];
		$TrongLuong = $rows['TrongLuong'];
		$DonGia = $rows['DonGia'];
		$ThanhPhan = $rows['ThanhPhan'];
		$LoiIch = $rows['LoiIch'];
	}
	$sql_image = "SELECT * FROM images WHERE MaSua = '$MaSua'";
	$result_image = mysqli_query($conn,$sql_image);
	$image = mysqli_fetch_array($result_image, MYSQLI_ASSOC);
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
	<script type="text/javascript">
		jQuery(function ($) {        
		  $('form').bind('submit', function () {
		    $(this).find(':input').prop('disabled', false);
		  });
		});
	</script>
</head>
<body>
	<div class="container">
		<form action="processing_edit_Sua.php" method="POST" enctype="multipart/form-data">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm sữa mới!</h2>
			</div>
			<div class="panel-body">
				<div class="form-group">
				  <label for="usr">Mã sữa:</label>
				  <input name="MaSua" value="<?php echo $MaSua ?>" type="text" class="form-control" id="usr" disabled>
				</div>
				<div class="form-group">
				  <label for="usr">Tên sữa:</label>
				  <input name="TenSua" value="<?php echo $TenSua ?>" required="true" type="text" class="form-control" id="usr">
				</div>
				<div class="form-group">
				  <label for="usr">Hãng sữa:</label>
				  <select name="HangSua" class="form-control" id="usr">
				  	<?php
				  		$sql = "SELECT TenHS FROM hang";
						$result = mysqli_query($conn,$sql);
						while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				  	?>
				  	<option value="<?php echo $rows['TenHS'] ?>" 
				  		<?php
				  			if ($HangSua == $rows['TenHS']) {
				  				echo " selected";
				  			}
				  		?>
				  		><?php echo $rows['TenHS'] ?></option>
				  <?php } ?>
				  </select>
				</div>
				<div class="form-group">
				  <label for="usr">Loại Sữa:</label>
				  <select name="LoaiSua" class="form-control" id="usr">
				  		<option value="Sữa bột"
				  		<?php 
				  			if ($LoaiSua == "Sữa bột") {
				  				echo " selected";
				  			}
				  		?>
				  		>Sữa bột</option>
				  		<option value="Sữa tươi"
				  		<?php 
				  			if ($LoaiSua == "Sữa tươi") {
				  				echo " selected";
				  			}
				  		?>
				  		>Sữa tươi</option>
				  		<option value="Sữa chua"
				  		<?php 
				  			if ($LoaiSua == "Sữa chua") {
				  				echo " selected";
				  			}
				  		?>
				  		>Sữa chua</option>
				  		<option value="Sữa canxi"
				  		<?php 
				  			if ($LoaiSua == "Sữa canxi") {
				  				echo " selected";
				  			}
				  		?>
				  		>Sữa canxi</option>
				  </select>
				</div>
				<div class="form-group">
				  <label for="usr">Trọng lượng:</label>
				  <input name="TrongLuong" value="<?php echo $TrongLuong ?>" required="true" type="text" class="form-control" id="usr">
				</div>
				<div class="form-group">
				  <label for="usr">Giá:</label>
				  <input name="DonGia" value="<?php echo $DonGia ?>" required="true" type="number" class="form-control" id="usr">
				</div>
				<div class="form-group">
				  <label for="usr">Thành phần:</label>
				  <textarea name="ThanhPhan" type="text" class="form-control" id="usr"><?php echo $ThanhPhan ?></textarea>
				</div>
				<div class="form-group">
				  <label for="usr">Lợi ích:</label>
				  <textarea name="LoiIch" type="text" class="form-control" id="usr"><?php echo $LoiIch ?></textarea>
				</div>
				<div class="form-group">
				  <label for="usr">Hình:</label>
				  <?php 
				  		if (isset($image['file_name'])) {
				  			echo "<td>".$image['file_name']."</td>";
				  		}
				  		else
				  			echo "Chưa có hình...";
				   ?>
				  <input type="file" name="Hinh" class="form-control" id="usr">
				</div>
				<button class="btn btn-success">Update Sữa</button>
				<input class="btn btn-success" type="reset" name="reset" value="Reset">
			</div>
		</div>
		</form>
	</div>
</body>
</html>