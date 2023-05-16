<?php
	require("../connectdb.php");
	$MaHD = $_GET['MaHD'];
	$sql = "DELETE FROM donhang WHERE MaHD = '$MaHD'";
	$result = mysqli_query($conn,$sql);
	if ($result) {
?>
<script type="text/javascript">
	 window.history.back();
</script>
<?php } ?>