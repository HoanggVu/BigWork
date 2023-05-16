<?php
	session_start();
	require("../connectdb.php");
	if (!isset($_SESSION['Email'])) {
		header("location:../login.php");
	}
	$MaKH = $_SESSION['MaKH'];
	$sql = "SELECT * FROM khachhang WHERE MaKH = '$MaKH'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Thông tin tài khoản</title>
	<style type="text/css">
		.padding {
		    padding: 2rem !important
		}

		.user-card-full {
		    overflow: hidden
		}

		.card {
		    border-radius: 5px;
		    -webkit-box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
		    box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
		    border: none;
		    margin-bottom: 30px
		}

		.m-r-0 {
		    margin-right: 0px
		}

		.m-l-0 {
		    margin-left: 0px
		}

		.user-card-full .user-profile {
		    border-radius: 5px 0 0 5px
		}

		.bg-c-lite-green {
		    
		    background: linear-gradient(to right, #131880, #7832F7)
		}

		.user-profile {
		    padding: 20px 0
		}

		.card-block {
		    padding: 1.25rem
		}

		.m-b-25 {
		    margin-bottom: 25px
		}

		.img-radius {
		    border-radius: 5px
		}

		h6 {
		    font-size: 14px
		}

		.card .card-block p {
		    line-height: 25px
		}

		@media only screen and (min-width: 1400px) {
		    p {
		        font-size: 14px
		    }
		}

		.card-block {
		    padding: 1.25rem
		}

		.b-b-default {
		    border-bottom: 1px solid #e0e0e0
		}

		.m-b-20 {
		    margin-bottom: 20px
		}

		.p-b-5 {
		    padding-bottom: 5px !important
		}

		.card .card-block p {
		    line-height: 25px
		}

		.m-b-10 {
		    margin-bottom: 10px
		}

		.text-muted {
		    color: #919aa3 !important
		}

		.b-b-default {
		    border-bottom: 1px solid #e0e0e0
		}

		.f-w-600 {
		    font-weight: 600
		}

		.m-b-20 {
		    margin-bottom: 20px
		}

		.m-t-40 {
		    margin-top: 20px
		}

		.p-b-5 {
		    padding-bottom: 5px !important
		}

		.m-b-10 {
		    margin-bottom: 10px
		}

		.m-t-40 {
		    margin-top: 20px
		}
	</style>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
	<div class="page-content page-container" id="page-content">
	<a href="view.php" class="btn btn-success">Quay lại</a>
    <div class="padding to">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-6 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                            	<?php 
                            	if ($row['GioiTinh'] == "Nam") {
                            	?>
                                <div class="m-b-25"><img src="https://img.icons8.com/doodle/48/000000/user-male-circle.png" class="img-radius" alt="User-Profile-Image"> </div>
                                <?php
                                	}
                                	elseif($row['GioiTinh'] == "Nữ"){
                                ?>
                                <div class="m-b-25"><img src="https://img.icons8.com/doodle/48/000000/user-female-circle.png" class="img-radius" alt="User-Profile-Image"> </div>
                            <?php } ?>
                            <h6 class="f-w-600"><?php echo $row['TenKH']; ?></h6>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Giới tính</p>
                                        <h6 class="text-muted f-w-400"><?php echo $row['GioiTinh']; ?></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">SĐT</p>
                                        <h6 class="text-muted f-w-400"><?php echo $row['SDT']; ?></h6>
                                    </div>
                                </div>
                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600"></h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Email</p>
                                        <h6 class="text-muted f-w-400"><?php echo $row['Email']; ?></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Địa chỉ</p>
                                        <h6 class="text-muted f-w-400"><?php echo $row['DiaChi']; ?></h6>
                                    </div>
                                </div>
                                <a href="editTT.php" type="button" class="btn btn-success">Sửa thông tin</a>
                                <a href="mk.php" type="button" class="btn btn-primary">Đổi mật khẩu</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>