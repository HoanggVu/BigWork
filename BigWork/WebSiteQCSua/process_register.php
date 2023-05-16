<?php
	session_start();
	require("connectdb.php");
	$TenKH = $_POST['TenKH'];
	$GioiTinh = $_POST['gender'];
	$DiaChi = $_POST['DiaChi'];
	$SDT = $_POST['SDT'];
	$Email = $_POST['Email'];
	$Pass = $_POST['Pass'];
	$sql = "INSERT INTO khachhang(TenKH, GioiTinh, DiaChi, SDT, Email, Pass) 
			VALUES ('$TenKH','$GioiTinh','$DiaChi','$SDT', '$Email','$Pass')";
	$result = mysqli_query($conn,$sql);
	if ($result) {
		if (!isset($_SESSION['Admin']) || $_SESSION['Admin'] == 0) {
			mysqli_close($conn);
			$_SESSION['success'] = "success";
			header("location:login.php");
		}
		else{
			$_SESSION['action'] = "TTKhachHang";
			header("location:Admin/view.php");
		}
	}
?>
