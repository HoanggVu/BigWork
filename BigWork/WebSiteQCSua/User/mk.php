<?php
	session_start();
	require("../connectdb.php");
	$MaKH = $_SESSION['MaKH'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Đổi mật khẩu</title>
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
			$oldPass = $_POST['oldPass'];
			$newPass = $_POST['newPass'];
			$renewPass = $_POST['renewPass'];
			
			if ($oldPass != $_SESSION['Pass']) {
				?>
				<script type="text/javascript">
				Swal.fire(
				  'Bạn nhập sai mật khẩu cũ',
				  'Xin mời bạn nhập lại',
				  'error'
				)
				</script>
				<?php
			}
			elseif ($newPass != $renewPass) {
				?>
				<script type="text/javascript">
				Swal.fire(
				  'Mật khẩu nhập lại không trùng khớp',
				  'Xin mời bạn nhập lại',
				  'error'
				)
				</script>
				<?php
			}
			else{
				$sql = "UPDATE khachhang SET Pass = '$newPass' WHERE MaKH = '$MaKH'";
				$result = mysqli_query($conn, $sql);
				if ($result) {
					$_SESSION['Pass'] = $newPass;
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
					  title: 'Đổi mật khẩu thành công'
					})
					</script>
					<?php
					header("refresh:3;url=tk.php");
				}
			}
		}
	?>
	<a href="tk.php" class="btn btn-success">Quay lại</a>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Đổi mật khẩu</h2>
			</div>
			<form method="POST">
			<div class="panel-body">
				<div class="form-group">
				  <label for="usr">Mật khẩu cũ :</label>
				  <input name="oldPass" id="oldPass" required="true" type="password" class="form-control" id="usr" required>
				</div>
				<div class="form-group">
				  <label for="usr">Mật khẩu mới :</label>
				  <input name="newPass" id="newPass" required="true" type="password" class="form-control" id="usr" required>
				</div>
				<div class="form-group">
				  <label for="usr">Nhập lại mật khẩu mới :</label>
				  <input name="renewPass" id="renewPass" required="true" type="password" class="form-control" id="usr" required>
				</div>
				<input type="submit" class="btn btn-success" name="btnUp" value="Cập Nhật">
				<input class="btn btn-success" type="reset" name="reset" value="Reset">
			</div>
			</form>
		</div>
	</div>
</body>
</html>