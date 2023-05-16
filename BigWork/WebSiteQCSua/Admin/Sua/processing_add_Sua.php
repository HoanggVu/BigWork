<?php
	require("../connectdb.php");
	$statusMsg = '';
	$MaSua = $_POST['MaSua'];
	$TenSua = $_POST['TenSua'];
	$HangSua = $_POST['HangSua'];
	$LoaiSua = $_POST['LoaiSua'];
	$TrongLuong = $_POST['TrongLuong'];
	$DonGia = $_POST['DonGia'];
	$ThanhPhan = $_POST['ThanhPhan'];
	$LoiIch = $_POST['LoiIch'];
	$sql = "INSERT INTO loaisua(MaSua,TenSua,HangSua,LoaiSua,TrongLuong,DonGia,ThanhPhan,LoiIch)
	VALUES('$MaSua','$TenSua','$HangSua','$LoaiSua','$TrongLuong','$DonGia','$ThanhPhan','$LoiIch')";
	$result = mysqli_query($conn,$sql);
	// move hình ảnh vào uploads và up tên lên database
	$targetDir = "uploads/";
	$fileName = basename($_FILES["Hinh"]["name"]);
	$nametmp = $MaSua.$fileName;
	$fileName = $nametmp;
	$targetFilePath = $targetDir . $fileName;
	$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
	// move hình ảnh vào uploads
	move_uploaded_file($_FILES["Hinh"]["tmp_name"], $targetFilePath);
	// up tên lên database
	$sql = "INSERT into images (MaSua, file_name) VALUES ('$MaSua', '$fileName')";
	$insert = mysqli_query($conn, $sql);
	if($insert){
	    $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
	}else{
		// nếu MaSua ko trùng trong bảng loaisua thì fail
	    $statusMsg = "File upload failed, please try again.";
	} 
	echo $statusMsg;
	if($result){
		mysqli_close($conn);
		header("location:../view.php");
	}
?>