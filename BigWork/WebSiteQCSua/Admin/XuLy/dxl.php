<?php
	session_start();
	require("../connectdb.php");
	$_SESSION['action'] = "XuLy";
	$MaHD = $_GET['id'];
	$sql = "UPDATE donhang SET TrangThai = 'Đã gửi' 
	WHERE MaHD = '$MaHD'";
	$result = mysqli_query($conn,$sql);
	if ($result) {
		mysqli_close($conn);
		header("location:../view.php");
	}
?>