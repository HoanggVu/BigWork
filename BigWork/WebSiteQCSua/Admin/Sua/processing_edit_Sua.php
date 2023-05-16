<?php
	require("../connectdb.php");
	$MaSua = $_POST['MaSua'];
	$TenSua = $_POST['TenSua'];
	$HangSua = $_POST['HangSua'];
	$LoaiSua = $_POST['LoaiSua'];
	$TrongLuong = $_POST['TrongLuong'];
	$DonGia = $_POST['DonGia'];
	$ThanhPhan = $_POST['ThanhPhan'];
	$LoiIch = $_POST['LoiIch'];
	$fileName = basename($_FILES["Hinh"]["name"]);
	if ($fileName != null) {
		$targetDir = "uploads/";
		$nametmp = $MaSua.$fileName;
		$fileName = $nametmp;
		$targetFilePath = $targetDir . $fileName;
		$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
		// move hình ảnh vào uploads
		move_uploaded_file($_FILES["Hinh"]["tmp_name"], $targetFilePath);
		// up tên lên database
		$sql = "UPDATE images SET file_name = '$fileName' WHERE MaSua = '$MaSua'";
		$insert = mysqli_query($conn, $sql);
		if($insert){
		    $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
		}else{
			// nếu MaSua ko trùng trong bảng loaisua thì fail
		    $statusMsg = "File upload failed, please try again.";
		} 
	}
	$sql = "UPDATE loaisua SET TenSua = '$TenSua', HangSua = '$HangSua',LoaiSua = '$LoaiSua', TrongLuong = '$TrongLuong',DonGia = '$DonGia', ThanhPhan = '$ThanhPhan', LoiIch = '$LoiIch' WHERE MaSua = '$MaSua'";
	$result = mysqli_query($conn,$sql);
	if($result){
		mysqli_close($conn);
		header("location:../view.php");
	}
?>