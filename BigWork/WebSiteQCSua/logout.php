<?php
	if (session_id() == '') {
		session_start();
	}
	elseif (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	unset($_SESSION['Email']);
	unset($_SESSION['Pass']);
	unset($_SESSION['Admin']);
	header("location:User/view.php");
?>