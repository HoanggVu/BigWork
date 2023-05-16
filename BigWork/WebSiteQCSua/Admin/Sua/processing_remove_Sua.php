<?php
	session_start();
	require_once("../connectdb.php");
	$MaSua = $_GET['MaSua'];
	$sql_picture = "DELETE FROM images WHERE MaSua='$MaSua'";
	$ps_picture = mysqli_prepare($conn,$sql_picture);
	mysqli_execute($ps_picture);

	$sql = "DELETE FROM loaisua WHERE MaSua='$MaSua'";
	$ps = mysqli_prepare($conn,$sql);
	mysqli_execute($ps);
	$_SESSION['action'] = "TTSua";
	mysqli_close($conn);
	header("location:../view.php");
?>