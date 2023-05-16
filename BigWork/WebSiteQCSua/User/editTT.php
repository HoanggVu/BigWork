<?php
	session_start();
	require("../connectdb.php");
	$MaKH = $_SESSION['MaKH'];
	require("../connectdb.php");
	$sql = "SELECT * FROM khachhang WHERE MaKH = '$MaKH'";
	$result = mysqli_query($conn,$sql);
	while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		$TenKH = $rows['TenKH'];
		$GioiTinh = $rows['GioiTinh'];
		$DiaChi = $rows['DiaChi'];
		$SDT = $rows['SDT'];
		$Email = $rows['Email'];
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Chỉnh sửa thông tin</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
</head>
<body>
	<?php
		if (isset($_POST['btnUp'])) {
			$TenKH = $_POST['TenKH'];
			$DiaChi = $_POST['DiaChi'];
			$GioiTinh = $_POST['GioiTinh'];
			$SDT = $_POST['SDT'];
			$Email = $_POST['Email'];
			$sql = "UPDATE khachhang SET TenKH = '$TenKH', GioiTinh = '$GioiTinh',DiaChi = '$DiaChi', SDT = '$SDT',Email = '$Email' WHERE MaKH = '$MaKH'";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				$_SESSION['Email'] = $Email;
				$_SESSION['TenKH'] = $TenKH;
				?>
					<script type="text/javascript">
					const Toast = Swal.mixin({
					  toast: true,
					  position: 'top-end',
					  showConfirmButton: false,
					  timer: 3000,
					  timerProgressBar: true,
					  didOpen: (toast) => {
					    toast.addEventListener('mouseenter', Swal.stopTimer)
					    toast.addEventListener('mouseleave', Swal.resumeTimer)
					  }
					})
					Toast.fire({
					  icon: 'success',
					  title: 'cập nhật thông tin thành công'
					})
					</script>
					<?php
					header("refresh:3;url=tk.php");
				}
			}
		?>
	<a href="tk.php" class="btn btn-success">Quay lại</a>
	<form method="POST">
	<div class="container">
		<div class="panel-heading">
				<h2 class="text-center">Cập nhật thông tin tài khoản</h2>
			</div>
			<div class="panel-body">
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
			<button class="btn btn-success" name="btnUp">Cập nhật thông tin</button>
			<input class="btn btn-success" type="reset" name="reset" value="Reset">
		</div>
	</form>
	
</body>
</html>