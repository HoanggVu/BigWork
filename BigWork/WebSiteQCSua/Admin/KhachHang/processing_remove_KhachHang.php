<?php
	session_start();
	$_SESSION['action'] = "TTKhachHang";
	require("../connectdb.php");
	$MaKH = $_GET['MaKH'];
	$sql = "DELETE FROM khachhang WHERE MaKH = '$MaKH'";
	$result = mysqli_query($conn,$sql);
	if ($result) {
		header("location:../view.php");
	}
?>