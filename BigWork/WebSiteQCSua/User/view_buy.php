<?php
	session_start();
	require("../connectdb.php");
	if (!isset($_SESSION['Email'])) {
		header("location:../login.php");
	}
	if (!isset($_SESSION['buy'])) {
		$_SESSION['buy'] = null;
	}
	$MaSua = $_GET['MaSua'];

	//Khách Hàng
	$Email = $_SESSION['Email'];
	$sql = "SELECT * FROM khachhang WHERE Email = '$Email'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$MaKH = $row['MaKH'];
	$Name = $row['TenKH'];
	$DiaChi = $row['DiaChi'];
	$SDT = $row['SDT'];
	// Sữa
	$sql = "SELECT * FROM loaisua WHERE MaSua = '$MaSua'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$TenSua = $row['TenSua'];
	$HangSua = $row['HangSua'];
	$LoaiSua = $row['LoaiSua'];
	$TrongLuong = $row['TrongLuong'];
	$DonGia = $row['DonGia'];
	$ThanhPhan = $row['ThanhPhan'];
	$LoiIch = $row['LoiIch'];

	//Hình ảnh
	$sql_Hinh = "SELECT * FROM images WHERE MaSua = '$MaSua'";
	$result_Hinh = mysqli_query($conn, $sql_Hinh);
	$Hinh = mysqli_fetch_array($result_Hinh, MYSQLI_ASSOC);
	$image = $Hinh['file_name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>BUY <?php echo $TenSua ?></title>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
	<style type="text/css">
		@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&family=Work+Sans:wght@800&display=swap');

		* {
		    padding: 0;
		    margin: 0;
		    box-sizing: border-box
		}

		body {
		    padding: 15px;
		    background-color: #5D47CB;
		}

		.container {
		    margin: 20px auto;
		    max-width: 1000px;
		    background-color: white;
		    padding: 0
		}

		.form-control {
		    height: 25px;
		    width: 150px;
		    border: none;
		    border-radius: 0;
		    font-weight: 800;
		    padding: 0 0 5px 0;
		    background-color: transparent;
		    box-shadow: none;
		    outline: none;
		    border-bottom: 2px solid #ccc;
		    margin: 0;
		    font-size: 14px
		}

		.form-control:focus {
		    box-shadow: none;
		    border-bottom: 2px solid #ccc;
		    background-color: transparent
		}

		.form-control2 {
		    font-size: 14px;
		    height: 20px;
		    width: 55px;
		    border: none;
		    border-radius: 0;
		    font-weight: 800;
		    padding: 0 0 5px 0;
		    background-color: transparent;
		    box-shadow: none;
		    outline: none;
		    border-bottom: 2px solid #ccc;
		    margin: 0
		}

		.form-control2:focus {
		    box-shadow: none;
		    border-bottom: 2px solid #ccc;
		    background-color: transparent
		}

		.form-control3 {
		    font-size: 14px;
		    height: 20px;
		    width: 30px;
		    border: none;
		    border-radius: 0;
		    font-weight: 800;
		    padding: 0 0 5px 0;
		    background-color: transparent;
		    box-shadow: none;
		    outline: none;
		    border-bottom: 2px solid #ccc;
		    margin: 0
		}

		.form-control3:focus {
		    box-shadow: none;
		    border-bottom: 2px solid #ccc;
		    background-color: transparent
		}

		p {
		    margin: 0
		}

		img {
		    width: 100%;
		    height: 100%;
		    object-fit: fill
		}

		.text-muted {
		    font-size: 10px
		}

		.textmuted {
		    color: #6c757d;
		    font-size: 13px
		}

		.fs-14 {
		    font-size: 14px
		}

		.btn.btn-primary {
		    width: 100%;
		    height: 55px;
		    border-radius: 0;
		    padding: 13px 0;
		    background-color: black;
		    border: none;
		    font-weight: 600
		}
		.btn.btn-success {
		    width: 100%;
		    height: 55px;
		    border-radius: 0;
		    padding: 13px 0;
		    border: none;
		    font-weight: 600
		}
		.btn.btn-success:hover .fas {
		    transform: translateX(10px);
		    transition: transform 0.5s ease
		}
		.btn.btn-primary:hover .fas {
		    transform: translateX(-10px);
		    transition: transform 0.5s ease
		}
		.fw-900 {
		    font-weight: 900
		}

		::placeholder {
		    font-size: 12px
		}

		.ps-30 {
		    padding-left: 30px
		}

		.h4 {
		    font-family: 'Work Sans', sans-serif !important;
		    font-weight: 800 !important
		}

		.textmuted,
		h5,
		.text-muted {
		    font-family: 'Poppins', sans-serif
		}
		p .edit{
			width: 100px;
			height: 40px;
			font-size: 20px;
			border: none;
		}
		input[type="number"]{
			text-align: right;
		}
		input[type="text"]{
			width: 150%;
		}
		.detail{
			width: 100%;
		}
		.buy{
			width: 100%;
		}
	</style>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
</head>
<body>	
	<?php 
		if ($_SESSION['buy'] == "success") {
	?>
	<script type="text/javascript">
		swal({
			title: 'Chúc mừng!',
			text: 'Bạn đã mua hàng thành công',
			type: 'success',
			button: {
			text: "Continue",
			value: true,
			visible: true,
			className: "btn btn-primary"
			}
		})
	</script>
	<?php
		unset($_SESSION['buy']);
		}
	?>
	<div class="container">
	<form action="process_buy.php" method="POST">
		<input type="hidden" name="MaKH" value="<?php echo $MaKH ?>">
		<input type="hidden" name="MaSua" value="<?php echo $MaSua ?>">
		<input type="hidden" name="DonGia" id="txtgia" value="<?php echo $DonGia ?>">
    <div class="row m-0">
        <div class="col-lg-7 pb-5 pe-lg-5">
            <div class="row detail">
                <div class="col-12 p-5"> <img src="../Admin/Sua/uploads/<?php echo $image ?>" alt=""> </div>
                <div class="row m-0 bg-light">
                    <div class="col-md-4 col-6 ps-30 pe-0 my-4 detail">
                        <p class="text-muted">Nhà sản xuất</p>
                        <p class="h5"><?php echo $HangSua ?></p>
                    </div>
                    <div class="col-md-4 col-6 ps-30 my-4">
                        <p class="text-muted">Loại sữa</p>
                        <p class="h5 m-0"><?php echo $LoaiSua ?></p>
                    </div>
                    <div class="col-md-4 col-6 ps-30 my-4">
                        <p class="text-muted">Trọng lượng</p>
                        <p class="h5 m-0"><?php echo $TrongLuong ?>gram</p>
                    </div>
                    <div class="col-md-4 col-6 ps-30 my-4">
                        <p class="text-muted">Giá</p>
                        <p class="h5 m-0"><?php echo $DonGia ?>Đ</p>
                    </div>
                    <div class="col-md-4 col-6 ps-30 pe-0 my-4 detail">
                        <p class="text-muted">Thành phần</p>
                        <p class="h5"><?php echo $ThanhPhan ?></p>
                    </div>
                    <div class="col-md-4 col-6 ps-30 pe-0 my-4 detail">
                        <p class="text-muted">Lợi ích</p>
                        <p class="h5"><?php echo $LoiIch ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5 p-0 ps-lg-4">
            <div class="row m-0">
                <div class="col-12 px-4">
                    <div class="d-flex align-items-end mt-4 mb-2">
                        <p class="h4 m-0"><span class="pe-1"><?php echo $TenSua ?></span></p>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <p class="textmuted">Số lượng</p>
                        <p class="fs-14 fw-bold"><input class="fas edit" onclick="tong()" type="number" name="txtSL" id="slDat" value="1"></p>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <p class="textmuted fw-bold">Tổng thanh toán</p>
                        <div class="d-flex align-text-top "> <span class="fas mt-1 pe-1 fs-14 "></span><span class="h4" id="gia"><?php echo $DonGia ?> VNĐ</span> </div>
                    </div>
                </div>
                <div class="col-12 px-0">
                    <div class="row bg-light m-0">
                        <div class="col-12 px-4 my-4">
                            <p class="fw-bold">Thông Tin Khách Hàng</p>
                        </div>
                        <div class="col-12 px-4">
                            <div class="d-flex mb-4"> <span class="">
                                    <p class="text-muted">Tên khách hàng</p> <input class="form-control" type="text" value="<?php echo $Name ?>" disabled>
                                </span>
                            </div>
                            <div class="d-flex mb-5"> <span class="me-5">
                                    <p class="text-muted">Địa chỉ</p> <input class="form-control" type="text" value="<?php echo $DiaChi ?>" disabled>
                                </span>
                            </div>
                            <div class="d-flex mb-5"> <span class="me-5">
                                    <p class="text-muted">Số điện thoại</p> <input class="form-control" type="text" value="<?php echo $SDT ?>" disabled>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row m-0">
                        <div class="col-12 mb-4 p-0">
                            <button type="submit" class="btn btn-success buy">Mua<span class="fas fa-arrow-right ps-2"></span> </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
    <div class="col-12 mb-4 p-0"><a href="javascript:goBack()">
        <div class="btn btn-primary back"><span class="fas fa-arrow-left ps-2"></span> Trang chủ</div></a>
    </div>
</div>
<script type="text/javascript">
	var gia = parseInt(document.getElementById("gia").innerHTML);
	function tong(){
		var sl = parseInt(document.getElementById("slDat").value);
		var total = gia * sl;
		document.getElementById("gia").innerHTML = total+" VNĐ";
		document.getElementById("txtgia").value = total;
	}
	function buy(){
		alert("Tiền đéo đâu mà mua :))");
		var choose = confirm("Bạn chắc chắn mua?");
		if (choose) {
			window.location.href("process_buy.php");
		}
	}
	function goBack() {
		window.location.href = "view.php";
	}
</script>
</body>
</html>