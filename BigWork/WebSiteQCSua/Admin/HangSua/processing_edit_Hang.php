<?php
	require_once("../connectdb.php");
	$MaHS = $_POST["MaHS"];
	$TenHS = $_POST["TenHS"];
	$DiaChi = $_POST["DiaChi"];
	$DienThoai = $_POST["DienThoai"];
	$Email = $_POST["Email"];
	$sql = "UPDATE hang SET TenHS = '$TenHS',DiaChi = '$DiaChi',DienThoai = '$DienThoai',Email = '$Email' 
	WHERE MaHS = '$MaHS'";
	$result = mysqli_query($conn,$sql);
	if($result){
		mysqli_close($conn);
		header("location:../view.php");
	}
?>