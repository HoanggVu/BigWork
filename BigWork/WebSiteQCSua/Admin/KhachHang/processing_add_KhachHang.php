<?php
	require_once("connectdb.php");
	$TenKH = $_POST["TenKH"];
	$GioiTinh = $_POST["GioiTinh"];
	$DiaChi = $_POST["DiaChi"];
	$SDT = $_POST["SDT"];
	$Email = $_POST["Email"];
	$sql = "INSERT INTO KhachHang(TenKH,GioiTinh,DiaChi,SDT,Email)VALUES('$TenKH','$GioiTinh','$DiaChi','$SDT','$Email')";
	$result = mysqli_query($conn,$sql);
	if($result){
		mysqli_close($conn);
		header("location:../view.php");
	}
?>