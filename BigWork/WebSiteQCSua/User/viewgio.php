<?php
	session_start();
	require("../connectdb.php");
	if (!isset($_SESSION['Email'])) {
		header("location:../login.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Giỏ hàng</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
	<style type="text/css">
		body {
		    background: linear-gradient(to right,#3B88FB ,#3619B4);
		    min-height: 100vh
		}

		.text-gray {
		    color: #aaa
		}

		img {
		    height: 170px;
		    width: 140px
		}
		.total{
			text-align: right;
		}
		.x{
			margin-top: 5px;
			padding-left: 30%;
			font-size: 20px;
			font-weight: bold;
			color: white;
			text-shadow: 2px 2px black;
		}
		.xxx a:hover, .xxx p:hover, .xxx h4S{
			text-decoration: none;
		}
		.foot{
			height: 100%;
			padding-top: 6%;
		}
	</style>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
	<a href="view.php" class="btn btn-success">Quay lại</a>
	<span class="x">Giỏ hàng của bạn</span>
	<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <ul class="list-group shadow">
                    <?php
                    	$total = 0;
                    	$MaKH = $_SESSION['MaKH'];
						$sql = "SELECT * FROM donhang WHERE MaKH = '$MaKH' AND TrangThai = 'Giỏ'";
						$result = mysqli_query($conn, $sql);
						while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
						$MaSua = $row['MaSua'];
						$sql_sua = "SELECT * FROM loaisua WHERE MaSua = '$MaSua'";
						$result_sua = mysqli_query($conn, $sql_sua);
						$row_sua = mysqli_fetch_array($result_sua, MYSQLI_ASSOC);
						$sql_hinh = "SELECT * FROM images WHERE MaSua = '$MaSua'";
						$result_hinh = mysqli_query($conn, $sql_hinh);
						$row_hinh = mysqli_fetch_array($result_hinh, MYSQLI_ASSOC);
						$total += $row['Gia'];
					?>
					<form method="POST">
					<li class="list-group-item">
                    <a href="view_buy.php?MaSua=<?php echo $MaSua ?>"><div class="media align-items-lg-center flex-column flex-lg-row p-3">
                        <div class="media-body order-2 order-lg-1 xxx">
                            <h5 class="mt-0 font-weight-bold mb-2"><?php echo $row_sua['TenSua']; ?></h5>
                            <p class="font-italic text-muted mb-0 medium"><span style="color: black;">Hãng sữa: </span><?php echo $row_sua['HangSua']; ?></p>
                            <p class="font-italic text-muted mb-0 medium"><span style="color: black;">Loại sữa: </span><?php echo $row_sua['LoaiSua']; ?></p>
                            <p class="font-italic text-muted mb-0 medium"><span style="color: black;">Trọng lượng: </span><?php echo $row_sua['TrongLuong']; ?> gram</p>
                            <div class="d-flex align-items-center justify-content-between mt-1">
                                <h6 class="font-weight-bold my-2"><?php echo $row['Gia']; ?> VNĐ</h6>
                            </div>
                            <a href="delegio.php?MaHD=<?php echo $row['MaHD'] ?>" class="btn btn-danger">xóa</a>
                        </div>
                        <img src="../Admin/Sua/uploads/<?php echo $row_hinh['file_name']; ?>" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">
                    </div></a>
                </li>
                </form>
            <?php } ?>
            </ul>
            <li class="list-group-item totalx">
            	<h5 class="mt-0 font-weight-bold mb-2 total">Tổng tiền: <?php echo $total; ?> VNĐ</h5>
            </li>
            <?php
            	if ($total != 0) {
            ?>
            <button onclick="tb()" class="btn btn-success">Thanh toán</button>
            <?php
        	}
        	?>
        </div>
    </div>
</div>
<div class="foot">
	<?php require_once("footer.php") ?>
</div>
<script type="text/javascript">
	function tb(){
		Swal.fire({
		  title: 'Bạn có chắc chắn muốn thanh toán?',
		  icon: 'question',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Có',
		  cancelButtonText: 'Không'
		}).then((result) => {
		  if (result.isConfirmed) {
		    Swal.fire(
		      window.location.href = "thanhtoan.php"
		    )
		  }
		})
	}
</script>

</body>
</html>