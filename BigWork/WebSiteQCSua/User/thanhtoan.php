<?php
	session_start();
	require("../connectdb.php");
	$MaKH = $_SESSION['MaKH'];
	$sql = "UPDATE donhang SET TrangThai = 'Chờ xác nhận' WHERE MaKH = '$MaKH' AND TrangThai = 'Giỏ'";
	$result = mysqli_query($conn,$sql) or die("lỗi");
	if ($result) {
		mysqli_close($conn);
		$_SESSION['thanhtoan'] = "ok";
		header("location:view.php");
	}
?>