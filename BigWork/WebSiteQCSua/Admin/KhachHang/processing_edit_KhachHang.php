<?php
	require_once("../connectdb.php");
	$MaKH = str_replace("KH", "", $_POST["MaKH"]);
	$TenKH = $_POST['TenKH'];
	$GioiTinh = $_POST['GioiTinh'];
	$DiaChi = $_POST['DiaChi'];
	$SDT = $_POST['SDT'];
	$Email = $_POST['Email'];
	$Pass = $_POST['Pass'];
	$Admin = $_POST['Admin'];
	$sql = "UPDATE khachhang SET TenKH = '$TenKH', GioiTinh = '$GioiTinh',DiaChi = '$DiaChi', SDT = '$SDT',Email = '$Email', Pass = '$Pass', ADMIN = '$Admin' WHERE MaKH = '$MaKH'";
	$result = mysqli_query($conn,$sql);
	if($result){
		mysqli_close($conn);
		header("location:../view.php");
	}
?>