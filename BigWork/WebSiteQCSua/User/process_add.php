<?php
	session_start();
	if (!isset($_SESSION['Email'])) {
		header("location:../login.php");
	}
	$MaKH = $_SESSION['MaKH'];
	$MaSua = $_GET['MaSua'];
	require("../connectdb.php");
	$sql = "SELECT * FROM loaisua WHERE MaSua = '$MaSua'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$DonGia = $row['DonGia'];
	$sql_gio = "INSERT INTO donhang(MaKH, MaSua, Gia, TrangThai) VALUES('$MaKH','$MaSua','$DonGia','Giỏ')";
	$result_gio = mysqli_query($conn,$sql_gio);
	if ($result_gio) {
		mysqli_close($conn);
		$_SESSION['addgio'] = "success";
	?>
	<script>
  		window.history.back();
	</script>
	<?php
	}
?>