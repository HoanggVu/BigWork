<?php
	require_once("../connectdb.php");
	$MaHS = $_POST["MaHS"];
	$TenHS = $_POST["TenHS"];
	$DiaChi = $_POST["DiaChi"];
	$DienThoai = $_POST["DienThoai"];
	$Email = $_POST["Email"];
	$sql = "INSERT INTO hang(MaHS,TenHS,DiaChi,DienThoai,Email)VALUES('$MaHS','$TenHS','$DiaChi','$DienThoai','$Email')";
	$result = mysqli_query($conn,$sql);
	if($result){
		mysqli_close($conn);
		header("location:../view.php");
	}
?>