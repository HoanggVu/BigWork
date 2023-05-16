<?php
	session_start();
	if (!isset($_SESSION['Email'])) {
		header("location:../view.php");
	}
	elseif ($_SESSION['Admin'] != 1) {
		header("location:../view.php");
	}
	$_SESSION['action'] = "TTKhachHang";
	$MaKH = $_GET['MaKH'];
	require("../connectdb.php");
	$sql = "SELECT * FROM khachhang WHERE MaKH = '$MaKH'";
	$result = mysqli_query($conn,$sql);
	while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		$TenKH = $rows['TenKH'];
		$GioiTinh = $rows['GioiTinh'];
		$DiaChi = $rows['DiaChi'];
		$SDT = $rows['SDT'];
		$Email = $rows['Email'];
		$Pass = $rows['Pass'];
		$Admin = $rows['ADMIN'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sữa Thông Tin Khách Hàng</title>
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
		.ra{
			text-align: center;
		}
		.ra input{
			margin-left: 33%;
		}
		.ra input:first-child{
			margin-left: 0px;
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
		<form action="processing_edit_KhachHang.php" method="POST">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Sữa Thông Tin Khách Hàng</h2>
			</div>
			<div class="panel-body">
				<div class="form-group">
				  <label for="usr">Mã Khách Hàng:</label>
				  <input name="MaKH" required="true" type="text" class="form-control" id="usr" value="KH<?php echo $MaKH ?>" disabled >
				</div>
				<div class="form-group">
				  <label for="usr">Tên Khách Hàng:</label>
				  <input name="TenKH" required="true" type="text" class="form-control" id="usr" value="<?php echo $TenKH ?>">
				</div>
				<div class="form-group">
				  <label for="usr">Giới tính:</label>
				  <div class="form-control ra">
						<input type="radio" name="GioiTinh" value="Nam"
							<?php
								if ($GioiTinh == "Nam") {
									echo "checked";
								}
								else
									echo "";
							?>	
						>Nam
						<input type="radio" name="GioiTinh" value="Nữ"
							<?php
								if ($GioiTinh == "Nữ") {
									echo "checked";
								}
								else
									echo "";
							?>
						>Nữ
						<input type="radio" name="GioiTinh" value="Khác"
							<?php
								if ($GioiTinh == "Khác") {
									echo "checked";
								}
								else
									echo "";
							?>
						>Khác
				  </div>
				</div>
				<div class="form-group">
				  <label for="usr">Địa chỉ:</label>
				  <input name="DiaChi" required="true" type="text" class="form-control" id="usr" value="<?php echo $DiaChi ?>" >
				</div>
				<div class="form-group">
				  <label for="usr">Số điện thoại:</label>
				  <input name="SDT" required="true" type="text" class="form-control" id="usr" value="<?php echo $SDT ?>" >
				</div>
				<div class="form-group">
				  <label for="email">Email:</label>
				  <input name="Email" required="true" type="email" class="form-control" id="email" value="<?php echo $Email ?>" >
				</div>
				<div class="form-group">
				  <label for="usr">Password:</label>
				  <input name="Pass" required="true" type="text" class="form-control" id="usr" value="<?php echo $Pass ?>" >
				</div>
				<div class="form-group">
				  <label for="usr">Admin:</label>
				  <div class="form-control ra">
						<input type="radio" name="Admin" value="1"
							<?php
								if ($Admin == 1) {
									echo "checked";
								}
								else
									echo "";
							?>	
						>ADMIN
						<input type="radio" name="Admin" value="0"
							<?php
								if ($Admin == 0) {
									echo "checked";
								}
								else
									echo "";
							?>
						>NOT ADMIN
				  </div>
				</div>
				<button class="btn btn-success">Cập nhật thông tin</button>
				<input class="btn btn-success" type="reset" name="reset" value="Reset">
			</div>
		</div>
		</form>
	</div>
</body>
</html>