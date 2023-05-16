<?php
	session_start();
	if (!isset($_SESSION['Email'])) {
		header("location:../login.php");
	}
	require("../connectdb.php");
	$MaKH = $_POST['MaKH'];
	$MaSua = $_POST['MaSua'];
	$SoLuong = $_POST['txtSL'];
	$DonGia = $_POST['DonGia'];
	$TrangThai = "Chờ xác nhận";
	echo $MaKH."<br>";
	echo $MaSua."<br>";
	echo $SoLuong."<br>";
	echo $DonGia;
	header("view.php");
	$sql = "INSERT INTO donhang(MaKH, MaSua, SoLuong, Gia, TrangThai) VALUES('$MaKH','$MaSua','$SoLuong','$DonGia','$TrangThai')";
	$result = mysqli_query($conn,$sql);
	if ($result) {
		$_SESSION['buy'] = "success";
		mysqli_close($conn);
		header("location:view_buy.php?MaSua=$MaSua");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Xử lý</title>
</head>
<body>
	<h1>Lỗi rồi</h1>
</body>
</html>