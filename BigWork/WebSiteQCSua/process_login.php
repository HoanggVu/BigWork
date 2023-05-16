<?php
	if (session_id() == '') {
		session_start();
	}
	elseif (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	require("connectdb.php");
	$em = $_POST['Email'];
	$pw = $_POST['Pass'];
	$Email = null;
	$Pass = null;
	$Admin = null;
	$sql = "SELECT * FROM khachhang WHERE Email = '$em'";
	$result = mysqli_query($conn,$sql);
	if ($result) {
		while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$MaKH = $rows["MaKH"];
			$Name = $rows["TenKH"];
			$Email = $rows["Email"];
			$Pass = $rows["Pass"];
			$Admin = $rows["ADMIN"];
		}
		if ($em === $Email && $pw === $Pass) {
			$_SESSION['MaKH'] = $MaKH;
			$_SESSION['Name'] = $Name;
			$_SESSION['Email'] = $Email;
			$_SESSION['Pass'] = $Pass;
			$_SESSION['Admin'] = $Admin;
			$_SESSION['first'] = "ok";
			echo "$em";
			if ($Admin == 1) {
				header("location:Admin/view.php");
			}
			elseif ($Admin == 0) {
				header("location:User/view.php");
			}
		}
		if($Email == null || $pw !== $Pass){
			echo "Email or Password Incorrect!";
		}

	}
?>