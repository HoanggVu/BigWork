<?php
	$conn = mysqli_connect("localhost","root","") or die("connect error");
	$select = mysqli_select_db($conn,"milk") or die("select error");
?>