<?php
	session_start();
	if (!isset($_SESSION['Email'])) {
		header("location:../login.php");
	}
	elseif ($_SESSION['Admin'] != 1) {
		header("location:../login.php");
	}
	if (!isset($_SESSION['action'])) {
		$_SESSION['action'] = null;
	}
	require_once("../connectdb.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> 
	<script>
	$(document).ready(function(){
		$(".lead .item0").show();
		$(".lead .item1").hide();
	    $(".lead .item2").hide();
	    $(".lead .item3").hide();
	    $(".lead .item4").hide();
	    $(".lead .item5").hide();
	    $(".lead .item6").hide();
	    $(".lead .item7").hide();
	    $(".ifhide1").click(function(){
	    	$(".lead .item0").hide();
	        $(".lead .item1").show();
	        $(".lead .item2").hide();
	        $(".lead .item3").hide();
	        $(".lead .item4").hide();
		    $(".lead .item5").hide();
		    $(".lead .item6").hide();
		    $(".lead .item7").hide();
	    });
	    $(".ifhide2").click(function(){
	    	$(".lead .item0").hide();
	        $(".lead .item1").hide();
	        $(".lead .item2").show();
	        $(".lead .item3").hide();
	        $(".lead .item4").hide();
		    $(".lead .item5").hide();
		    $(".lead .item6").hide();
		    $(".lead .item7").hide();
	    });
	    $(".ifhide3").click(function(){
	    	$(".lead .item0").hide();
	        $(".lead .item1").hide();
	        $(".lead .item2").hide();
	        $(".lead .item3").show();
	        $(".lead .item4").hide();
		    $(".lead .item5").hide();
		    $(".lead .item6").hide();
		    $(".lead .item7").hide();
	    });
	    $(".ifhide4").click(function(){
	    	$(".lead .item0").hide();
	        $(".lead .item1").hide();
	        $(".lead .item2").hide();
	        $(".lead .item3").hide();
	        $(".lead .item4").show();
		    $(".lead .item5").hide();
		    $(".lead .item6").hide();
		    $(".lead .item7").hide();
	    });
	    $(".ifhide5").click(function(){
	    	$(".lead .item0").hide();
	        $(".lead .item1").hide();
	        $(".lead .item2").hide();
	        $(".lead .item3").hide();
	        $(".lead .item4").hide();
		    $(".lead .item5").show();
		    $(".lead .item6").hide();
		    $(".lead .item7").hide();
	    });
	    $(".ifhide6").click(function(){
	    	$(".lead .item0").hide();
	        $(".lead .item1").hide();
	        $(".lead .item2").hide();
	        $(".lead .item3").hide();
	        $(".lead .item4").hide();
		    $(".lead .item5").hide();
		    $(".lead .item6").show();
		    $(".lead .item7").hide();
	    });
	    $(".ifhide7").click(function(){
	    	$(".lead .item0").hide();
	        $(".lead .item1").hide();
	        $(".lead .item2").hide();
	        $(".lead .item3").hide();
	        $(".lead .item4").hide();
		    $(".lead .item5").hide();
		    $(".lead .item6").hide();
		    $(".lead .item7").show();
	    });
	});
	</script>

	<?php
		if ($_SESSION['action'] == "TTHang") {
	?>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".ifhide1").click();
		});
	</script>
	<?php
		$_SESSION['action'] = null;
		}
	?>
	<?php
		if ($_SESSION['action'] == "TTKhachHang") {
	?>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".ifhide2").click();
		});
	</script>
	<?php
		$_SESSION['action'] = null;
		}
	?>
	<?php
		if ($_SESSION['action'] == "TTSua") {
	?>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".ifhide3").click();
		});
	</script>
	<?php
		$_SESSION['action'] = null;
		}
	?>
	<?php
		if ($_SESSION['action'] == "XuLy") {
	?>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".clicked").click();
			$(".ifhide4").click();
		});
	</script>
	<?php
		$_SESSION['action'] = null;
		}
	?>
	<?php
		if ($_SESSION['action'] == "DangXuLy") {
	?>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".clicked").click();
			$(".ifhide5").click();
		});
	</script>
	<?php
		$_SESSION['action'] = null;
		}
	?>
	<style type="text/css">
		.content-main{
			margin-left: 18%;
		}
		.sidebar{
			position: fixed;
		}
		
		.content-main table{
			word-wrap: break-word;
			table-layout: fixed;
			width: 100%;
			margin: 5px auto;
			border-collapse: collapse;
			border: 2px solid black;
		}
		.content-main th, .content-main td{
			border: 1px solid black;
		    padding: 5px;
		}
		.content-main th{
			font-size: 14px;
			text-align: center;
			font-weight: bold;
		}
		.content-main td{
			font-size: 13px;
			text-overflow: clip;
		}
		.content-main tbody tr:nth-child(odd) {
		    background-color: #D1F0F9;
		}
		.vip{
			color: #F81818;
			font-weight: bold;
		}
		#menu ul{
			padding: 15px;
			border-radius: 10px;
			border: 1px solid black;
			box-shadow: 1px 1px 1px 1px #5A5A5A;
		}
		#menu li span:hover{
			transition: 0.5s;
			color: #FC5900;
		}
		.item0 .result ul{
			list-style-type: none;
		}
		.item0 .result li{
			display: inline-table;
			margin: 10px;
			width: 250px;
			height: 100px;
			border-radius: 10px;
			background-color: #51A6FD;
			box-sizing: border-box;
		}
		.item0 .result li p{
			font-weight: bold;
			padding-left: 10px;
			padding-right: 10px;
		}
		.item0 .result li h2{
			text-align: center;
		}
		.doanhThu{
			margin-left: 20px;
			width: 300px;
			height: 300px;
			border-radius: 50%;
			background-color: #06BE13;
			text-align: center;
		}
		.doanhThu h2{
			padding-top: 130px;
			text-shadow: 1px 1px white;
			word-wrap: break-word;
		}
	</style>
</head>
<body>
	<div class="container-use">
		<div class="container-fluid">
		    <div class="row flex-nowrap">
		        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark sidebar">
		            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
		                <a href="view.php" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
		                    <span class="fs-5 d-none d-sm-inline">Welcom to Admin!</span>
		                </a>
		                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
		                    <li class="nav-item">
		                        <a href="view.php" class="nav-link align-middle px-0">
		                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
		                        </a>
		                    </li>
		                    <li>
		                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
		                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Quản Lý</span> </a>
		                        <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
		                            <li class="w-100">
		                                <button class="nav-link px-0"> <span class="d-none d-sm-inline ifhide1">Hãng Sữa</span></button>
		                            </li>
		                            <li>
		                                <button class="nav-link px-0"> <span class="d-none d-sm-inline ifhide2">Khách Hàng</span></button>
		                            </li>
		                            <li>
		                                <button class="nav-link px-0"> <span class="d-none d-sm-inline ifhide3">Sản Phẩm</span></button>
		                            </li>
		                        </ul>
		                    </li>
		                    <li>
		                        <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
		                            <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline clicked">Đơn Hàng</span> </a>
		                            <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
		                            <li class="w-100">
		                                <button class="nav-link px-0"> <span class="d-none d-sm-inline ifhide4">Đang chờ xử lý</span></button>
		                            </li>
		                            <li>
		                                <button class="nav-link px-0"> <span class="d-none d-sm-inline ifhide5">Đã gửi</span></button>
		                            </li>
		                            <li>
		                                <button class="nav-link px-0"> <span class="d-none d-sm-inline ifhide6">Đổi trả</span></button>
		                            </li>
		                            <li>
		                                <button class="nav-link px-0"> <span class="d-none d-sm-inline ifhide7">Đã bán</span></button>
		                            </li>
		                        </ul>
		                    </li>
		                </ul>
		                <hr>
		                <div class="dropdown pb-4">
		                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
		                        <img src="https://scontent.fdad1-1.fna.fbcdn.net/v/t1.6435-9/201577826_2901378320122076_5233175496630585320_n.jpg?_nc_cat=103&ccb=1-5&_nc_sid=09cbfe&_nc_ohc=qsmMoxzkVbYAX_hwq45&_nc_ht=scontent.fdad1-1.fna&oh=9b743acaf85153ea15a142fc6b0d1ffe&oe=61A99684" alt="hugenerd" width="30" height="30" class="rounded-circle">
		                        <span class="d-none d-sm-inline mx-1">Admin KN</span>
		                    </a>
		                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
		                        <li><a class="dropdown-item" href="../User/view.php">Trang User</a></li>
		                        <li>
		                            <hr class="dropdown-divider">
		                        </li>
		                        <li><a class="dropdown-item" href="javascript:logout()">Đăng xuất</a></li>
		                    </ul>
		                </div>
		            </div>
		        </div>
		        <div class="col py-3 content-main">
		            <div class="lead">
		            	<?php
		            	$sql = "SELECT * FROM donhang WHERE TrangThai != 'Giỏ'";
						$result = mysqli_query($conn,$sql);
						$rs_sldon = 0;
						while($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
							if ($rows['SoLuong'] > 1) {
								$rs_sldon += $rows['SoLuong'];
							}
							else
								$rs_sldon++;
						}
		            	?>
		            	<div class="item0">
							<h2>Thống Kê Số Liệu Cửa Hàng</h2>
							<div class="result">
								<ul>
									<li>
										<div>
											<p>Tổng Số đơn đặt hàng</p>
											<h2><?php echo $rs_sldon; ?></h2>
										</div>
									</li>
									<?php
					            	$sql = "SELECT * FROM donhang WHERE TrangThai = 'Chờ xác nhận'";
									$result = mysqli_query($conn,$sql);
									$rs_sldon_cho = 0;
									while($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
										if ($rows['SoLuong'] > 1) {
											$rs_sldon_cho += $rows['SoLuong'];
										}
										else
											$rs_sldon_cho++;
									}
					            	?>
									<li>
										<div>
											<p>Số đơn chờ xử lý</p>
											<h2><?php echo $rs_sldon_cho; ?></h2>
										</div>
									</li>
									<?php
					            	$sql = "SELECT * FROM donhang WHERE TrangThai = 'Đã bán'";
									$result = mysqli_query($conn,$sql);
									$rs_sldon_ban = 0;
									while($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
										if ($rows['SoLuong'] > 1) {
											$rs_sldon_ban += $rows['SoLuong'];
										}
										else
											$rs_sldon_ban++;
									}
					            	?>
									<li>
										<div>
											<p>Số đơn đã bán</p>
											<h2><?php echo $rs_sldon_ban; ?></h2>
										</div>
									</li>
									<?php
					            	$sql = "SELECT * FROM donhang WHERE TrangThai = 'Đã gửi'";
									$result = mysqli_query($conn,$sql);
									$rs_sldon_gui = 0;
									while($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
										if ($rows['SoLuong'] > 1) {
											$rs_sldon_gui += $rows['SoLuong'];
										}
										else
											$rs_sldon_gui++;
									}
					            	?>
									<li>
										<div>
											<p>Số đơn đang gửi đi</p>
											<h2><?php echo $rs_sldon_gui; ?></h2>
										</div>
									</li>
									<?php
					            	$sql = "SELECT * FROM donhang WHERE TrangThai = 'Đổi trả'";
									$result = mysqli_query($conn,$sql);
									$rs_sldon_tra = 0;
									while($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
										if ($rows['SoLuong'] > 1) {
											$rs_sldon_tra += $rows['SoLuong'];
										}
										else
											$rs_sldon_tra++;
									}
					            	?>
									<li>
										<div>
											<p>Số đơn đổi trả</p>
											<h2><?php echo $rs_sldon_tra; ?></h2>
										</div>
									</li>
								</ul>
							</div>
							<h2>Tổng Thu Nhập</h2>
							<div class="doanhThu">
								<?php
					            	$sql = "SELECT * FROM donhang WHERE TrangThai = 'Đã bán'";
									$result = mysqli_query($conn,$sql);
									$rs_doanhthu = 0;
									while($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
										$rs_doanhthu += $rows['Gia'];
									}
					            ?>
					            
					            <h2><?php echo $rs_doanhthu ?> VNĐ</h2>
							</div>
						</div>
		            	<div class="item1">
		            		<div class="TTHang">
								<form>
									<table>
										<tr>
											<th colspan="5">THÔNG TIN HÃNG SỮA</th>
											<th colspan="2"><a href="HangSua/view_add_Hang.php" class="btn btn-success">Create new</a></th>
										</tr>
										<tr>
											<th>Mã HS</th>
											<th>Tên hãng sữa</th>
											<th>Địa chỉ</th>
											<th>Điện thoại</th>
											<th>Email</th>
											<th colspan="2">Action</th>
										</tr>
										<?php
										
											$sql = "SELECT * FROM hang";
											$result = mysqli_query($conn,$sql);
											while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
												$MaHS = $rows["MaHS"];
												$TenHS = $rows["TenHS"];
												$DiaChi = $rows["DiaChi"];
												$DienThoai = $rows["DienThoai"];
												$Email = $rows["Email"];
												?>
												<tr>
													<td><?php echo $MaHS ?></td>
													<td><?php echo $TenHS ?></td>
													<td><?php echo $DiaChi ?></td>
													<td><?php echo $DienThoai ?></td>
													<td><?php echo $Email ?></td>
													<th><a href="HangSua/view_edit_Hang.php?MaHS=<?php echo $MaHS ?>" class="btn btn-primary">Update</a></th>
													<th><a href="HangSua/processing_remove_Hang.php?MaHS=<?php echo $MaHS ?>" class="btn btn-danger">Delete</a></th>
												</tr>
												<?php
											}
										?>
									</table>
								</form>
							</div>
		            	</div>
		            	<div class="item2">
		            		<div class="TTKhachHang">
								<form>
									<table>
										<tr>
											<th colspan="6">THÔNG TIN KHÁCH HÀNG</th>
											<th colspan="2"><a href="../login.php" class="btn btn-success">Create new</a></th>
										</tr>
										<tr>
											<th>Mã KH</th>
											<th>Tên khách hàng</th>
											<th>Giới tính</th>
											<th>Địa chỉ</th>
											<th>Số điện thoại</th>
											<th>Email</th>
											<th colspan="2">Action</th>
										</tr>
										<?php
											$sql = "SELECT * FROM KhachHang";
											$result = mysqli_query($conn,$sql);
											while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
												$MaKH = $rows["MaKH"];
												$TenKH = $rows["TenKH"];
												$GioiTinh = $rows["GioiTinh"];
												$DiaChi = $rows["DiaChi"];
												$SDT = $rows["SDT"];
												$Email = $rows["Email"];
												echo "<tr";
													if ($rows['ADMIN'] == 1) {
														echo " class='vip' >";
													}
													else{
														echo ">";
													}
												?>
												<td><?php echo $MaKH ?></td>
												<td><?php echo $TenKH ?></td>
												<td><?php echo $GioiTinh ?></td>
												<td><?php echo $DiaChi ?></td>
												<td><?php echo $SDT ?></td>
												<td><?php echo $Email ?></td>
												<th><a href='KhachHang/view_edit_KhachHang.php?MaKH=<?php echo $MaKH ?>' class="btn btn-primary">Update</a></th>
												<th><a href='KhachHang/processing_remove_KhachHang.php?MaKH=<?php echo $MaKH ?>' class="btn btn-danger">Delete</a></th>
												<?php
											}
										?>
									</table>
								</form>
							</div>
		            	</div>
		            	<div class="item3">
		            		<div class="TTSua">
								<form>
									<table>
										<tr>
											<th colspan="9">THÔNG TIN CÁC LOẠI SỮA</th>
											<th colspan="2"><a href="Sua/view_add_Sua.php" class="btn btn-success">Create new</a></th>
										</tr>
										<tr>
											<th>Mã Sữa</th>
											<th>Tên sữa</th>
											<th>Hãng sữa</th>
											<th>Loại sữa</th>
											<th>Trọng Lượng</th>
											<th>Giá</th>
											<th>Thành phần</th>
											<th>Lợi ích</th>
											<th>Picture</th>
											<th colspan="2">Action</th>
										</tr>
										<?php
											$sql = "SELECT * FROM loaisua";
											$result = mysqli_query($conn,$sql);
											while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
												$MaSua = $rows["MaSua"];
												$TenSua = $rows["TenSua"];
												$HangSua = $rows["HangSua"];
												$LoaiSua = $rows["LoaiSua"];
												$TrongLuong = $rows["TrongLuong"];
												$DonGia = $rows["DonGia"];
												$ThanhPhan = $rows["ThanhPhan"];
												$LoiIch = $rows["LoiIch"];
												?>
												<tr>
													<td><?php echo $MaSua ?></td>
													<td><?php echo $TenSua ?></td>
													<td><?php echo $HangSua ?></td>
													<td><?php echo $LoaiSua ?></td>
													<td><?php echo $TrongLuong ?></td>
													<td><?php echo $DonGia ?></td>
													<td><?php echo $ThanhPhan ?></td>
													<td><?php echo $LoiIch ?></td>
												
												<?php
												$sql_image = "SELECT * FROM images WHERE MaSua = '$MaSua'";
												$result_image = mysqli_query($conn,$sql_image);
												$image = mysqli_fetch_array($result_image, MYSQLI_ASSOC);
												if (isset($image)) {
													echo "<td><img src='Sua/uploads/".$image['file_name']."' width='90pxpx'> </td>";
												}
												else
													echo "<td>Chưa có ảnh</td>";
												?>
													<th><a href="Sua/view_edit_Sua.php?MaSua=<?php echo $MaSua ?>" class="btn btn-primary">Update</a></th>
													<th><a href="Sua/processing_remove_Sua.php?MaSua=<?php echo $MaSua ?>" class="btn btn-danger">Delete</a></th>
												</tr>
												<?php
											}
										?>
									</table>
								</form>
							</div>
		            	</div>
		            	<div class="item4">
		            		<table>
					        	<tr>
					        		<th>Tên Khách Hàng</th>
					        		<th>Địa Chỉ</th>
					        		<th>SĐT</th>
					        		<th>Tên Sữa</th>
					        		<th>Hình</th>
					        		<th>Số Lượng</th>
					        		<th>Giá</th>
					        		<th>Xử lý</th>
					        	</tr>
		            		<?php
					            $sql = "SELECT * FROM donhang WHERE TrangThai = 'Chờ xác nhận'";
								$result = mysqli_query($conn,$sql);
								while($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
									$MaHD = $rows['MaHD'];
									$MaKH = $rows['MaKH'];
									$sql_KH = "SELECT * FROM khachhang WHERE MaKH = '$MaKH'";
									$result_KH = mysqli_query($conn,$sql_KH);
									$KH = mysqli_fetch_array($result_KH, MYSQLI_ASSOC);
									$MaSua = $rows['MaSua'];
									$sql_Sua = "SELECT * FROM loaisua WHERE MaSua = '$MaSua'";
									$result_Sua = mysqli_query($conn,$sql_Sua);
									$Sua = mysqli_fetch_array($result_Sua, MYSQLI_ASSOC);
									$SoLuong = $rows['SoLuong'];
									$Gia = $rows['Gia'];
									$picture = null;
									$sql_pic = "SELECT * FROM images WHERE MaSua = '$MaSua'";
									$result_pic = mysqli_query($conn,$sql_pic);
									$select = mysqli_fetch_array($result_pic, MYSQLI_ASSOC);
									if (isset($select['file_name'])) {
										$picture = $select['file_name'];
									}	
					        ?>
					        
					        	<tr>
					        		<td><?php echo $KH['TenKH']; ?></td>
					        		<td><?php echo $KH['DiaChi']; ?></td>
					        		<td><?php echo $KH['SDT']; ?></td>
					        		<td><?php echo $Sua['TenSua']; ?></td>
					        		<td>
					        			<?php
					        			if ($picture) {
					        				echo "<img src='Sua/uploads/".$picture."' width='100px'>";
					        			}
					        			else
					        				echo "Chưa có hình";
					        			?>
					        		</td>
					        		<td><?php echo $SoLuong; ?></td>
					        		<td><?php echo $Gia; ?></td>
					        		<th><a href="XuLy/dxl.php?id=<?php echo $MaHD ?>" class="btn btn-success">Đã gửi</a></th>
					        	</tr>
					        <?php } ?>
					        </table>
		            	</div>
		            	<div class="item5">
		            		<table>
					        	<tr>
					        		<th>Tên Khách Hàng</th>
					        		<th>Địa Chỉ</th>
					        		<th>SĐT</th>
					        		<th>Tên Sữa</th>
					        		<th>Hình</th>
					        		<th>Số Lượng</th>
					        		<th>Giá</th>
					        		<th colspan="2">Xử lý</th>
					        	</tr>
		            		<?php
					            $sql = "SELECT * FROM donhang WHERE TrangThai = 'Đã Gửi'";
								$result = mysqli_query($conn,$sql);
								while($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
									$MaHD = $rows['MaHD'];
									$MaKH = $rows['MaKH'];
									$sql_KH = "SELECT * FROM khachhang WHERE MaKH = '$MaKH'";
									$result_KH = mysqli_query($conn,$sql_KH);
									$KH = mysqli_fetch_array($result_KH, MYSQLI_ASSOC);
									$MaSua = $rows['MaSua'];
									$sql_Sua = "SELECT * FROM loaisua WHERE MaSua = '$MaSua'";
									$result_Sua = mysqli_query($conn,$sql_Sua);
									$Sua = mysqli_fetch_array($result_Sua, MYSQLI_ASSOC);
									$SoLuong = $rows['SoLuong'];
									$Gia = $rows['Gia'];
									$picture = null;
									$sql_pic = "SELECT * FROM images WHERE MaSua = '$MaSua'";
									$result_pic = mysqli_query($conn,$sql_pic);
									$select = mysqli_fetch_array($result_pic, MYSQLI_ASSOC);
									if (isset($select['file_name'])) {
										$picture = $select['file_name'];
									}	
					        ?>
					        
					        	<tr>
					        		<td><?php echo $KH['TenKH']; ?></td>
					        		<td><?php echo $KH['DiaChi']; ?></td>
					        		<td><?php echo $KH['SDT']; ?></td>
					        		<td><?php echo $Sua['TenSua']; ?></td>
					        		<td>
					        			<?php
					        			if ($picture) {
					        				echo "<img src='Sua/uploads/".$picture."' width='100px'>";
					        			}
					        			else
					        				echo "Chưa có hình";
					        			?>
					        		</td>
					        		<td><?php echo $SoLuong; ?></td>
					        		<td><?php echo $Gia; ?></td>
					        		<th><a href="XuLy/doitra.php?id=<?php echo $MaHD ?>" class="btn btn-primary">Đổi trả</a></th>
					        		<th><a href="XuLy/done.php?id=<?php echo $MaHD ?>" class="btn btn-success">Đã bán</a></th>
					        	</tr>
					        <?php } ?>
					        </table>
		            	</div>
		            	<div class="item6">
		            		<table>
					        	<tr>
					        		<th>Tên Khách Hàng</th>
					        		<th>Địa Chỉ</th>
					        		<th>SĐT</th>
					        		<th>Tên Sữa</th>
					        		<th>Hình</th>
					        		<th>Số Lượng</th>
					        		<th>Giá</th>
					        		<th>Xử lý</th>
					        	</tr>
		            		<?php
					            $sql = "SELECT * FROM donhang WHERE TrangThai = 'Đổi trả'";
								$result = mysqli_query($conn,$sql);
								while($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
									$MaHD = $rows['MaHD'];
									$MaKH = $rows['MaKH'];
									$sql_KH = "SELECT * FROM khachhang WHERE MaKH = '$MaKH'";
									$result_KH = mysqli_query($conn,$sql_KH);
									$KH = mysqli_fetch_array($result_KH, MYSQLI_ASSOC);
									$MaSua = $rows['MaSua'];
									$sql_Sua = "SELECT * FROM loaisua WHERE MaSua = '$MaSua'";
									$result_Sua = mysqli_query($conn,$sql_Sua);
									$Sua = mysqli_fetch_array($result_Sua, MYSQLI_ASSOC);
									$SoLuong = $rows['SoLuong'];
									$Gia = $rows['Gia'];
									$picture = null;
									$sql_pic = "SELECT * FROM images WHERE MaSua = '$MaSua'";
									$result_pic = mysqli_query($conn,$sql_pic);
									$select = mysqli_fetch_array($result_pic, MYSQLI_ASSOC);
									if (isset($select['file_name'])) {
										$picture = $select['file_name'];
									}	
					        ?>
					        
					        	<tr>
					        		<td><?php echo $KH['TenKH']; ?></td>
					        		<td><?php echo $KH['DiaChi']; ?></td>
					        		<td><?php echo $KH['SDT']; ?></td>
					        		<td><?php echo $Sua['TenSua']; ?></td>
					        		<td>
					        			<?php
					        			if ($picture) {
					        				echo "<img src='Sua/uploads/".$picture."' width='100px'>";
					        			}
					        			else
					        				echo "Chưa có hình";
					        			?>
					        		</td>
					        		<td><?php echo $SoLuong; ?></td>
					        		<td><?php echo $Gia; ?></td>
					        		<th>Đã Hủy</th>
					        	</tr>
					        <?php } ?>
					        </table>
		            	</div>
		            	<div class="item7">
		            		<table>
					        	<tr>
					        		<th>Tên Khách Hàng</th>
					        		<th>Địa Chỉ</th>
					        		<th>SĐT</th>
					        		<th>Tên Sữa</th>
					        		<th>Hình</th>
					        		<th>Số Lượng</th>
					        		<th>Giá</th>
					        		<th>Xử lý</th>
					        	</tr>
		            		<?php
					            $sql = "SELECT * FROM donhang WHERE TrangThai = 'Đã bán'";
								$result = mysqli_query($conn,$sql);
								while($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
									$MaHD = $rows['MaHD'];
									$MaKH = $rows['MaKH'];
									$sql_KH = "SELECT * FROM khachhang WHERE MaKH = '$MaKH'";
									$result_KH = mysqli_query($conn,$sql_KH);
									$KH = mysqli_fetch_array($result_KH, MYSQLI_ASSOC);
									$MaSua = $rows['MaSua'];
									$sql_Sua = "SELECT * FROM loaisua WHERE MaSua = '$MaSua'";
									$result_Sua = mysqli_query($conn,$sql_Sua);
									$Sua = mysqli_fetch_array($result_Sua, MYSQLI_ASSOC);
									$SoLuong = $rows['SoLuong'];
									$Gia = $rows['Gia'];
									$picture = null;
									$sql_pic = "SELECT * FROM images WHERE MaSua = '$MaSua'";
									$result_pic = mysqli_query($conn,$sql_pic);
									$select = mysqli_fetch_array($result_pic, MYSQLI_ASSOC);
									if (isset($select['file_name'])) {
										$picture = $select['file_name'];
									}	
					        ?>
					        
					        	<tr>
					        		<td><?php echo $KH['TenKH']; ?></td>
					        		<td><?php echo $KH['DiaChi']; ?></td>
					        		<td><?php echo $KH['SDT']; ?></td>
					        		<td><?php echo $Sua['TenSua']; ?></td>
					        		<td>
					        			<?php
					        			if ($picture) {
					        				echo "<img src='Sua/uploads/".$picture."' width='100px'>";
					        			}
					        			else
					        				echo "Chưa có hình";
					        			?>
					        		</td>
					        		<td><?php echo $SoLuong; ?></td>
					        		<td><?php echo $Gia; ?></td>
					        		<th>Done</th>
					        	</tr>
					        <?php } ?>
					        </table>
		            	</div>
		            </div>
		        </div>
		    </div>
		</div>
	</div>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script type="text/javascript">
		function logout(){
			Swal.fire({
			  title: 'Bạn muốn đăng xuất không?',
			  icon: 'question',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Có, Đăng xuất!',
			  cancelButtonText: 'Không'
			}).then((result) => {
			  if (result.isConfirmed) {
			  	window.location.href = "../logout.php"
			  	}
			})
		}
	</script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>