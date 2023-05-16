<?php
	session_start();
	require_once("../connectdb.php");
	$MaHS = $_GET['MaHS'];
	$sql = "DELETE FROM hang WHERE MaHS='$MaHS'";
	$ps = mysqli_prepare($conn,$sql);
	mysqli_execute($ps);
	$_SESSION['action'] = "TTHang";
	mysqli_close($conn);
	header("location:../view.php");
?>