<?php
	if (session_id() == '') {
		session_start();
	}
	elseif (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	require_once("../connectdb.php");
	if (!isset($_SESSION['addgio'])) {
		$_SESSION['addgio'] = null;
	}
	if (!isset($_SESSION['thanhtoan'])) {
		$_SESSION['thanhtoan'] = null;
	}
	if (!isset($_SESSION['first'])) {
		$_SESSION['first'] = null;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Shop Milk KN</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
	<style type="text/css">
		body {
    background-color: #eee
	}

	.mt-50 {
	    margin-top: 50px
	}

	.product-card {
	    display: block;
	    position: relative;
	    width: 100%;
	    border: 1px solid #e5e5e5;
	    border-radius: 5px;
	    background-color: #fff
	}

	.mb-30 {
	    margin-bottom: 30px !important
	}

	.product-badge {
	    position: absolute;
	    height: 24px;
	    padding: 0 14px;
	    border-radius: 3px;
	    color: #fff !important;
	    font-size: 12px;
	    font-weight: 400;
	    letter-spacing: .025em;
	    line-height: 24px;
	    white-space: nowrap;
	    top: 12px;
	    left: 12px
	}

	.bg-secondary {
	    background-color: #dc3545 !important
	}

	.bg-success {
	    background-color: #21bd4a !important
	}

	.product-thumb>img {
	    display: block;
	    width: 100%;
	    height: 300px;
	    padding: 14px
	}

	.product-category {
	    width: 100%;
	    margin-bottom: 6px;
	    font-size: 12px
	}

	.product-card-body {
	    padding: 18px;
	    padding-top: 15px;
	    text-align: center
	}

	.product-category>a {
	    transition: color .2s;
	    color: #999;
	    text-decoration: none
	}

	.product-title {
	    margin-bottom: 18px;
	    font-size: 16px;
	    font-weight: normal
	}

	.product-title>a {
	    transition: color .3s;
	    color: #232323;
	    text-decoration: none
	}

	.product-price {
	    display: inline-block;
	    margin-bottom: 10px;
	    padding: 9px 15px;
	    border-radius: 4px;
	    background-color: #3ba9fc;
	    color: #ffffff;
	    font-size: 16px;
	    font-weight: normal;
	    text-align: center
	}

	.product-button-group {
	    display: table;
	    width: 100%;
	    border-top: 1px solid #e5e5e5;
	    table-layout: fixed
	}

	.product-button-group a:hover {
	    color: #3ba9fc
	}

	.product-button:first-child {
	    border-bottom-left-radius: 5px
	}

	.product-button {
	    display: table-cell;
	    position: relative;
	    height: 62px;
	    padding: 10px;
	    transition: background-color .3s;
	    border: 0;
	    border-right: 1px solid #e5e5e5;
	    background: none;
	    color: #505050;
	    overflow: hidden;
	    vertical-align: middle;
	    text-align: center;
	    text-decoration: none
	}

	.product-button:hover>span {
	    -webkit-transform: translateY(0);
	    -ms-transform: translateY(0);
	    transform: translateY(0);
	    opacity: 1
	}

	.product-button>span {
	    display: block;
	    position: absolute;
	    bottom: 9px;
	    left: 0;
	    width: 100%;
	    -webkit-transform: translateY(12px);
	    -ms-transform: translateY(12px);
	    transform: translateY(12px);
	    font-size: 12px;
	    white-space: nowrap;
	    opacity: 0
	}

	.product-button>i,
	.product-button>span {
	    transition: all .3s
	}

	.product-button>i {
	    display: inline-block;
	    position: relative;
	    margin-top: 5px;
	    font-size: 18px
	}

	.product-button:hover>i {
	    -webkit-transform: translateY(-10px);
	    -ms-transform: translateY(-10px);
	    transform: translateY(-10px)
	}

	@import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");

	:root {
	    --header-height: 3rem;
	    --nav-width: 68px;
	    --first-color: #4723D9;
	    --first-color-light: #AFA5D9;
	    --white-color: #F7F6FB;
	    --body-font: 'Nunito', sans-serif;
	    --normal-font-size: 1rem;
	    --z-fixed: 100
	}

	*,
	::before,
	::after {
	    box-sizing: border-box;
	}

	body {
	    position: relative;
	    margin: var(--header-height) 0 0 0;
	    padding: 0 1rem;
	    font-family: var(--body-font);
	    font-size: var(--normal-font-size);
	    transition: .5s;
	}

	a {
	    text-decoration: none;
	}

	.header {
	    width: 100%;
	    height: var(--header-height);
	    position: fixed;
	    top: 0;
	    left: 0;
	    display: flex;
	    align-items: center;
	    justify-content: space-between;
	    padding: 0 1rem;
	    background-color: #FFFCFC;
	    z-index: var(--z-fixed);
	    transition: .5s;
	}

	.header_toggle {
	    color: var(--first-color);
	    font-size: 1.5rem;
	    cursor: pointer
	}

	.header_img {
	    width: 35px;
	    height: 35px;
	    display: flex;
	    justify-content: center;
	    border-radius: 50%;
	    overflow: hidden;
	}

	.header_img img {
	    width: 40px;
	}

	.l-navbar {
	    position: fixed;
	    top: 0;
	    left: -30%;
	    width: var(--nav-width);
	    height: 100vh;
	    background-color: var(--first-color);
	    padding: .5rem 1rem 0 0;
	    transition: .5s;
	    z-index: var(--z-fixed)
	}

	.nav {
	    height: 100%;
	    display: flex;
	    flex-direction: column;
	    justify-content: space-between;
	    overflow: hidden;
	}

	.nav_logo,
	.nav_link {
	    display: grid;
	    grid-template-columns: max-content max-content;
	    align-items: center;
	    column-gap: 1rem;
	    padding: .5rem 0 .5rem 1.5rem
	}

	.nav_logo {
	    margin-bottom: 2rem
	}

	.nav_logo-icon {
	    font-size: 1.25rem;
	    color: var(--white-color)
	}

	.nav_logo-name {
	    color: var(--white-color);
	    font-weight: 700
	}

	.nav_link {
	    position: relative;
	    color: var(--first-color-light);
	    margin-bottom: 1.5rem;
	    transition: .3s
	}

	.nav_link:hover {
	    color: var(--white-color)
	}

	.nav_icon {
	    font-size: 1.25rem
	}

	.show {
	    left: 0
	}

	.body-pd {
	    padding-left: calc(var(--nav-width) + 1rem)
	}

	.active {
	    color: var(--white-color)
	}

	.active::before {
	    content: '';
	    position: absolute;
	    left: 0;
	    width: 2px;
	    height: 32px;
	    background-color: var(--white-color)
	}

	.height-100 {
	    height: 100vh
	}

	@media screen and (min-width: 768px) {
	    body {
	        margin: calc(var(--header-height) + 1rem) 0 0 0;
	        padding-left: calc(var(--nav-width) + 2rem)
	    }

	    .header {
	        height: calc(var(--header-height) + 1rem);
	        padding: 0 2rem 0 calc(var(--nav-width) + 2rem)
	    }

	    .header_img {
	        width: 40px;
	        height: 40px
	    }

	    .header_img img {
	        width: 45px
	    }

	    .l-navbar {
	        left: 0;
	        padding: 1rem 1rem 0 0
	    }

	    .show {
	        width: calc(var(--nav-width) + 156px)
	    }

	    .body-pd {
	        padding-left: calc(var(--nav-width) + 188px)
	    }
	}

	.search-wrapper {
    position: absolute;
    -webkit-transform: translate(-50%, -50%);
    -moz-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    top:50%;
    left:50%;
	}
	.search-wrapper.active {}

	.search-wrapper .input-holder {
	    overflow: hidden;
	    height: 50px;
	    background: rgba(255,255,255,0);
	    border-radius:6px;
	    position: relative;
	    width:50px;
	    -webkit-transition: all 0.3s ease-in-out;
	    -moz-transition: all 0.3s ease-in-out;
	    transition: all 0.3s ease-in-out;
	}
	.search-wrapper.active .input-holder {
	    border-radius: 50px;
	    width:200px;
	    background: #FFFF;
	    -webkit-transition: all .5s cubic-bezier(0.000, 0.105, 0.035, 1.570);
	    -moz-transition: all .5s cubic-bezier(0.000, 0.105, 0.035, 1.570);
	    transition: all .5s cubic-bezier(0.000, 0.105, 0.035, 1.570);
	}

	.search-wrapper .input-holder .search-input {
	    width:100%;
	    height: 50px;
	    padding:0px 70px 0 20px;
	    opacity: 0;
	    position: absolute;
	    top:-10px;
	    left:0px;
	    background: #0ddbf0;
	    -webkit-box-sizing: border-box;
	    -moz-box-sizing: border-box;
	    box-sizing: border-box;
	    border:none;
	    outline:none;
	    font-family:"Open Sans", Arial, Verdana;
	    font-size: 16px;
	    font-weight: 400;
	    line-height: 20px;
	    color: #040000;
	    -webkit-transform: translate(0, 60px);
	    -moz-transform: translate(0, 60px);
	    transform: translate(0, 60px);
	    -webkit-transition: all .3s cubic-bezier(0.000, 0.105, 0.035, 1.570);
	    -moz-transition: all .3s cubic-bezier(0.000, 0.105, 0.035, 1.570);
	    transition: all .3s cubic-bezier(0.000, 0.105, 0.035, 1.570);

	    -webkit-transition-delay: 0.3s;
	    -moz-transition-delay: 0.3s;
	    transition-delay: 0.3s;
	}
	.search-wrapper.active .input-holder .search-input {
	    opacity: 1;
	    -webkit-transform: translate(0, 10px);
	    -moz-transform: translate(0, 10px);
	    transform: translate(0, 10px);
	}

	.search-wrapper .input-holder .search-icon {
	    width:50px;
	    height:50px;
	    border: 1px solid gray;
	    border-radius:6px;
	    background: #FFF;
	    padding:0px;
	    outline:none;
	    position: relative;
	    z-index: 2;
	    float:right;
	    cursor: pointer;
	    -webkit-transition: all 0.3s ease-in-out;
	    -moz-transition: all 0.3s ease-in-out;
	    transition: all 0.3s ease-in-out;
	}
	.search-wrapper.active .input-holder .search-icon {
	    width: 50px;
	    height:50px;
	    margin: 0px;
	    border-radius: 30px;
	}
	.search-wrapper .input-holder .search-icon span {
	    width:20px;
	    height:20px;
	    display: inline-block;
	    vertical-align: middle;
	    position:relative;
	    -webkit-transform: rotate(45deg);
	    -moz-transform: rotate(45deg);
	    transform: rotate(45deg);
	    -webkit-transition: all .4s cubic-bezier(0.650, -0.600, 0.240, 1.650);
	    -moz-transition: all .4s cubic-bezier(0.650, -0.600, 0.240, 1.650);
	    transition: all .4s cubic-bezier(0.650, -0.600, 0.240, 1.650);

	}
	.search-wrapper.active .input-holder .search-icon span {
	    -webkit-transform: rotate(-45deg);
	    -moz-transform: rotate(-45deg);
	    transform: rotate(-45deg);
	}
	.search-wrapper .input-holder .search-icon span::before, .search-wrapper .input-holder .search-icon span::after {
	    position: absolute;
	    content:'';
	}
	.search-wrapper .input-holder .search-icon span::before {
	    width: 4px;
	    height: 15px;
	    left: 9px;
	    top: 13px;
	    border-radius: 2px;
	    background: aqua;
	}
	.search-wrapper .input-holder .search-icon span::after {
	    width: 26px;
	    height: 23px;
	    left: -2px;
	    top: -9px;
	    border-radius: 16px;
	    border: 4px solid aqua;
	}

	.search-wrapper .close {
	    position: absolute;
	    z-index: 1;
	    top:24px;
	    right:20px;
	    width:25px;
	    height:25px;
	    cursor: pointer;
	    -webkit-transform: rotate(-180deg);
	    -moz-transform: rotate(-180deg);
	    transform: rotate(-180deg);
	    -webkit-transition: all .3s cubic-bezier(0.285, -0.450, 0.935, 0.110);
	    -moz-transition: all .3s cubic-bezier(0.285, -0.450, 0.935, 0.110);
	    transition: all .3s cubic-bezier(0.285, -0.450, 0.935, 0.110);
	    -webkit-transition-delay: 0.2s;
	    -moz-transition-delay: 0.2s;
	    transition-delay: 0.2s;
	}
	.search-wrapper.active .close {
	    right:-50px;
	    -webkit-transform: rotate(45deg);
	    -moz-transform: rotate(45deg);
	    transform: rotate(45deg);
	    -webkit-transition: all .6s cubic-bezier(0.000, 0.105, 0.035, 1.570);
	    -moz-transition: all .6s cubic-bezier(0.000, 0.105, 0.035, 1.570);
	    transition: all .6s cubic-bezier(0.000, 0.105, 0.035, 1.570);
	    -webkit-transition-delay: 0.5s;
	    -moz-transition-delay: 0.5s;
	    transition-delay: 0.5s;
	}
	.search-wrapper .close::before, .search-wrapper .close::after {
	    position:absolute;
	    content:'';
	    background: #512BF5;
	    border-radius: 1px;
	}
	.search-wrapper .close::before {
	    width: 5px;
	    height: 25px;
	    top: 6px;
	    left: -10px;
	}
	.search-wrapper .close::after {
	    width: 25px;
	    height: 5px;
	    left: -20px;
	    top: 16px;
	}
	.search-wrapper .result-container {
	    width: 100%;
	    position: absolute;
	    top:80px;
	    left:0px;
	    text-align: center;
	    font-family: "Open Sans", Arial, Verdana;
	    font-size: 14px;
	    display:none;
	    color:#B7B7B7;
	}


	@media screen and (max-width: 560px) {
	    .search-wrapper.active .input-holder {width:200px;}
	}
	#ima{
		border-radius: 5px;
		background-color: white;
		border: 1px solid black;
		color: #06E4FE;
	}
	#ima:hover{
		color: #0803D6;
		transition: 0.3s;
	}
	.logo{
		text-align: left;
	}
	.logo img{
		width: 100px;
		height: 100px;
	}
	.prd a:hover{
		color: #4E02E8;
	}
	#confirm{
		text-align: center;
		color: green;
		display: none;
		background-color: white;
		position: fixed;
		width: 50%;
		margin: auto;
		border: 2px solid black;
		border-radius: 15px;
	}
	.msg{
		margin: auto;
		text-align: center;
	}
	.msg input{
		width: 100%;
		height: 100px;
		font-size: 30px;
		text-align: center;
		margin: 10px;
	}
	#confirm button{
		margin: 10px;
	}
	.box{
		width: 100px;
	}
	.carousel-item img {
	    height: 500px
	}
	.active::before{
		display: none;
	}
	.content-pd-main{
		padding-top: 50px;
	}
	.items {
	    width: 100%;
	    margin: 0px auto;
	    margin-top: 10px;
	    margin-bottom: 15px;
	    border-radius: 15px;
	}

	.slick-slide {
    	margin: 10px;
	}

	.slick-slide div {
	    width: 100%;
	    border: 2px solid #fff;
	}
	.slider{
		padding-top: 50px;
	}
	.slick-prev:before, .slick-next:before {
	    color: black !important;
	}
	</style>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script type="text/javascript">
		document.addEventListener("DOMContentLoaded", function(event) {
		const showNavbar = (toggleId, navId, bodyId, headerId) =>{
		const toggle = document.getElementById(toggleId),
		nav = document.getElementById(navId),
		bodypd = document.getElementById(bodyId),
		headerpd = document.getElementById(headerId)
		// Validate that all variables exist
		if(toggle && nav && bodypd && headerpd){
		toggle.addEventListener('click', ()=>{
		// show navbar
		nav.classList.toggle('show')
		// change icon
		toggle.classList.toggle('bx-x')
		// add padding to body
		bodypd.classList.toggle('body-pd')
		// add padding to header
		headerpd.classList.toggle('body-pd')
		})
		}
		}
		showNavbar('header-toggle','nav-bar','body-pd','header')
		const linkColor = document.querySelectorAll('.nav_link')
		function colorLink(){
		if(linkColor){
		linkColor.forEach(l=> l.classList.remove('active'))
		this.classList.add('active')
		}
		}
		linkColor.forEach(l=> l.addEventListener('click', colorLink))
		});

	</script>
</head>
<body>
	<?php 
		if ($_SESSION['first'] == "ok") {
	?>
	// sweatalert
	<script type="text/javascript">
		Swal.fire({
		  position: 'top-end',
		  icon: 'success',
		  title: 'Đăng nhập thành công',
		  showConfirmButton: false,
		  timer: 1500
		})
	</script>
	<?php
		unset($_SESSION['first']);
		}
	?>
	<?php 
		if ($_SESSION['thanhtoan'] == "ok") {
	?>
	<script type="text/javascript">
		swal({
			title: 'Thanh Toán Thành Công',
			type: 'success',
			button: {
			text: "Continue",
			value: true,
			visible: true,
			className: "btn btn-success"
			}
		})
	</script>
	<?php
		unset($_SESSION['thanhtoan']);
		}
	?>
	<?php 
		if ($_SESSION['addgio'] == "success") {
	?>
	<script type="text/javascript">
		// sweetalert 
		const Toast = Swal.mixin({
		  toast: true,
		  position: 'top',
		  showConfirmButton: false,
		  timer: 1500,
		  timerProgressBar: true,
		  didOpen: (toast) => {
		    toast.addEventListener('mouseenter', Swal.stopTimer)
		    toast.addEventListener('mouseleave', Swal.resumeTimer)
		  }
		})
		Toast.fire({
		  icon: 'success',
		  title: 'Đã thêm vào giỏ hàng'
		})
	</script>
	<?php
		unset($_SESSION['addgio']);
		}
	?>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <a href="viewgio.php"><h2><i class='bi bi-cart4' id="ima"></i></h2></a>
        <form method="GET">
        	<div class="box">
	        	<form onsubmit="submitFn(this, event);">
				    <div class="search-wrapper">
				        <div class="input-holder">
				            <input type="text" name="txtSearch" class="search-input" placeholder="Tìm kiếm..." />
				            <button class="search-icon" name="btnSearch" onclick="searchToggle(this, event);"><span></span></button>
				        </div>
				        <span class="close" onclick="searchToggle(this, event);"></span>
				        <div class="result-container">
				        </div>
				    </div>
				</form>
        	</div>
        </form>
        <div class="logo"> <img src="logo_KN.png" alt=""> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="view.php" class="nav_logo"> <i class='bi bi-house nav_logo-icon'></i> <span class="nav_logo-name">Trang Chủ</span> </a>
                <div class="nav_list"> 
                	<a href="#" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Tất cả loại sữa</span> </a> 
                	 
                	<a href="tk.php" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Tài khoản</span> </a> 
                	
            </div> 
            <?php
			if (isset($_SESSION['Email']) && isset($_SESSION['Pass'])) {
				if ($_SESSION['Admin'] == 1) {
			?>
				<a href="../Admin/view.php" class="nav_link"> <i class='bi bi-gear nav_icon'></i> <span class="nav_name">Trang Admin</span> </a>
				<a href="javascript:logout()" class="nav_link"> <i class='bi bi-box-arrow-in-left nav_icon'></i> <span class="nav_name">LogOut</span> </a>
			<?php
				}
				elseif ($_SESSION['Admin'] == 0) {
			?>
				<a href="javascript:logout()" class="nav_link"> <i class='bi bi-box-arrow-in-left nav_icon'></i> <span class="nav_name">Đăng xuất</span> </a>
			<?php
				}
			}
			else{
			?>
			<a href="../login.php" class="nav_link"> <i class='bi bi-person-plus-fill nav_icon'></i> <span class="nav_name">Đăng nhập</span> </a>
			<?php

				}
			?>
        </nav>
    </div>
        <div class="container-fluid mt-50 slider">
        	<div class="row">
		        <div class="col-md-12">
		            <div class="carousel slide" id="carousel-554496">
		                <ol class="carousel-indicators">
		                    <li data-slide-to="0" data-target="#carousel-554496"> </li>
		                    <li data-slide-to="1" data-target="#carousel-554496"> </li>
		                    <li data-slide-to="2" data-target="#carousel-554496"> </li>
		                    <li data-slide-to="3" data-target="#carousel-554496"> </li>
		                    <li data-slide-to="4" data-target="#carousel-554496"> </li>
		                </ol>
		                <div class="carousel-inner">
		                    <div class="carousel-item"> <img class="d-block w-100" alt="Carousel Bootstrap First" src="https://i.ytimg.com/vi/yMPlXnb1sno/maxresdefault.jpg" />
		                    </div>
		                    <div class="carousel-item"> <img class="d-block w-100" alt="Carousel Bootstrap Second" src="https://i.pinimg.com/originals/14/73/91/147391b8e34164c719a216f71705d382.jpg" />
		                    </div>
		                    <div class="carousel-item"> <img class="d-block w-100" alt="Carousel Bootstrap Second" src="https://i.pinimg.com/originals/a6/2c/e8/a62ce8ce5c71b36ad47ebf7b43f44dfa.jpg" />
		                    </div>
		                    <div class="carousel-item"> <img class="d-block w-100" alt="Carousel Bootstrap Second" src="https://zerovn.net/poster-quang-cao-sua/imager_90396.jpg" />
		                    </div>
		                    <div class="carousel-item active"> <img class="d-block w-100" alt="Carousel Bootstrap Third" src="https://vinamilk.com.vn/sua-tuoi-vinamilk/wp-content/uploads/2018/08/KV-FMccc-1024x585.jpg" />
		                        <div class="carousel-caption">
		                    </div>
		                </div> <a class="carousel-control-prev" href="#carousel-554496" data-slide="prev"><span class="carousel-control-prev-icon"></span> <span class="sr-only">Previous</span></a> <a class="carousel-control-next" href="#carousel-554496" data-slide="next"><span class="carousel-control-next-icon"></span> <span class="sr-only">Next</span></a>
		            </div>
		        </div>
		    </div>
		    
		    <?php
		    	if (!isset($_GET['btnSearch'])) {
		    		echo "<div class='content-pd-main'>";
		    	}
				if (isset($_GET['btnSearch'])) {
					$detail = $_GET['txtSearch'];
					$sql = "SELECT * FROM loaisua WHERE TenSua like '%$detail%'";
						$result = mysqli_query($conn,$sql);
					while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
						$MaSua = $rows["MaSua"];
						$TenSua = $rows["TenSua"];
						$HangSua = $rows["HangSua"];
						$LoaiSua = $rows["LoaiSua"];
						$TrongLuong = $rows["TrongLuong"];
						$DonGia = $rows["DonGia"];
						$sql_Hinh = "SELECT * FROM images WHERE MaSua = '$MaSua'";
						$result_Hinh = mysqli_query($conn,$sql_Hinh);
						$Hinh = mysqli_fetch_assoc($result_Hinh);
						$image = null;
						if (isset($Hinh['file_name'])) {
							$image = $Hinh['file_name'];
						}
			?>
				<div class="col-md-4 prd">
		            <div class="product-card mb-30">
		                <a class="product-thumb" href="view_buy.php?MaSua=<?php echo $MaSua ?>" data-abc="true">
		                	<img src="../Admin/Sua/uploads/<?php echo $image ?>" alt="Product"></a>
		                <div class="product-card-body">
		                	<h3 class="product-title"><a href="view_buy.php?MaSua=<?php echo $MaSua ?>" data-abc="true"><?php echo $TenSua ?></a></h3>
		                    <div class="product-category"><a href="view_buy.php?MaSua=<?php echo $MaSua ?>" data-abc="true"><?php echo "$HangSua"." - $LoaiSua - "."$TrongLuong"."gr" ?></a></div>
		                    <h4 class="product-price"><?php echo "$DonGia"."đ" ?></a></h4>
		                </div>
		                <div class="product-button-group" id="buy">
		                	<a class="product-button btn-wishlist" href="process_add.php?MaSua=<?php echo $MaSua ?>" data-abc="true" value="<?php echo $MaSua ?>"><i class="bi bi-bag-plus"></i><span>Thêm vào giỏ</span></a>
		                	<a class="product-button btn-compare" href="view_buy.php?MaSua=<?php echo $MaSua ?>" data-abc="true"><i class="bi bi-cash-coin"></i><span>Mua</span></a>
		                </div>
		            </div>
		        </div> 
			<?php 
				} 
				echo "<p style='text-align:center;'>Kết quả tìm kiếm</p>";
				echo "<hr>";
				echo "<p>Các loại sữa khác</p>";
			} 
		?>
		    <div class="row">
		        <?php
					$sql = "SELECT * FROM loaisua";
					$result = mysqli_query($conn,$sql);
					while ($rows = mysqli_fetch_assoc($result)) {
						$MaSua = $rows["MaSua"];
						$TenSua = $rows["TenSua"];
						$HangSua = $rows["HangSua"];
						$LoaiSua = $rows["LoaiSua"];
						$TrongLuong = $rows["TrongLuong"];
						$DonGia = $rows["DonGia"];
						$sql_Hinh = "SELECT * FROM images WHERE MaSua = '$MaSua'";
						$result_Hinh = mysqli_query($conn,$sql_Hinh);
						$Hinh = mysqli_fetch_assoc($result_Hinh);
						$image = null;
						if (isset($Hinh['file_name'])) {
							$image = $Hinh['file_name'];
						}
					?>
					
		        <div class="col-md-4 prd">
		            <div class="product-card mb-30">
		                <a class="product-thumb" href="view_buy.php?MaSua=<?php echo $MaSua ?>" data-abc="true"><img src="../Admin/Sua/uploads/<?php echo $image ?>" alt="Product"></a>
		                <div class="product-card-body">
		                	<h3 class="product-title"><a href="view_buy.php?MaSua=<?php echo $MaSua ?>" data-abc="true"><?php echo $TenSua ?></a></h3>
		                    <div class="product-category"><a href="view_buy.php?MaSua=<?php echo $MaSua ?>" data-abc="true"><?php echo "$HangSua"." - $LoaiSua - "."$TrongLuong"."gr" ?></a></div>
		                    <h4 class="product-price"><?php echo "$DonGia"."đ" ?></a></h4>
		                </div>
		                <div class="product-button-group" id="buy">
		                	<a class="product-button btn-wishlist" href="process_add.php?MaSua=<?php echo $MaSua ?>" data-abc="true"><i class="bi bi-bag-plus"></i><span>Thêm vào giỏ</span></a>
		                	<a class="product-button btn-compare" href="view_buy.php?MaSua=<?php echo $MaSua ?>" data-abc="true"><i class="bi bi-cash-coin"></i><span>Mua</span></a>
		                </div>
		            </div>
		        </div> 
		        <?php } ?>
		        </div>
		        </div>
		    </div>
		</div>
    </div>
	</div>
 <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />
 <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
 <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
 <h2>Sữa HOT giá HỜI</h2>
 <div class="items">
 <?php
	$sql = "SELECT * FROM loaisua WHERE DonGia < 10000";
	$result = mysqli_query($conn,$sql);
	while ($rows = mysqli_fetch_assoc($result)) {
		$MaSua = $rows["MaSua"];
		$TenSua = $rows["TenSua"];
		$HangSua = $rows["HangSua"];
		$LoaiSua = $rows["LoaiSua"];
		$TrongLuong = $rows["TrongLuong"];
		$DonGia = $rows["DonGia"];
		$sql_Hinh = "SELECT * FROM images WHERE MaSua = '$MaSua'";
		$result_Hinh = mysqli_query($conn,$sql_Hinh);
		$Hinh = mysqli_fetch_assoc($result_Hinh);
		$image = null;
		if (isset($Hinh['file_name'])) {
			$image = $Hinh['file_name'];
		}
	?>

     <div class="col-md-4 prd">
		            <div class="product-card mb-30">
		                <a class="product-thumb" href="view_buy.php?MaSua=<?php echo $MaSua ?>" data-abc="true"><img src="../Admin/Sua/uploads/<?php echo $image ?>" alt="Product"></a>
		                <div class="product-card-body">
		                	<h3 class="product-title"><a href="view_buy.php?MaSua=<?php echo $MaSua ?>" data-abc="true"><?php echo $TenSua ?></a></h3>
		                    <div class="product-category"><a href="view_buy.php?MaSua=<?php echo $MaSua ?>" data-abc="true"><?php echo "$HangSua"." - $LoaiSua - "."$TrongLuong"."gr" ?></a></div>
		                    <h4 class="product-price"><?php echo "$DonGia"."đ" ?></a></h4>
		                </div>
		                <div class="product-button-group" id="buy">
		                	<a class="product-button btn-wishlist" href="process_add.php?MaSua=<?php echo $MaSua ?>" data-abc="true"><i class="bi bi-bag-plus"></i><span>Thêm vào giỏ</span></a>
		                	<a class="product-button btn-compare" href="view_buy.php?MaSua=<?php echo $MaSua ?>" data-abc="true"><i class="bi bi-cash-coin"></i><span>Mua</span></a>
		                </div>
		            </div>
		        </div>
		<?php } ?>
 </div>

	<script type="text/javascript">
		$(document).ready(function(){
			$('.items').slick({
			infinite: true,
			slidesToShow: 3,
			slidesToScroll: 3
			});
		});
		// sweat alert
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
		function searchToggle(obj, evt){
		    var container = $(obj).closest('.search-wrapper');

		    if(!container.hasClass('active')){
		            container.addClass('active');
		            evt.preventDefault();
		    }
		    else if(container.hasClass('active') && $(obj).closest('.input-holder').length == 0){
		            container.removeClass('active');
		            container.find('.search-input').val('');
		            container.find('.result-container').fadeOut(100, function(){$(this).empty();});
		    }
		}
		function submitFn(obj, evt){
		    value = $(obj).find('.search-input').val().trim();

		    _html = "Searching for: ";
		    if(!value.length){
		        _html = "Ehem, I can't search nothing";
		    }
		    else{
		        _html += "<b>" + value + "</b>";
		    }

		    $(obj).find('.result-container').html('<span>' + _html + '</span>');
		    $(obj).find('.result-container').fadeIn(100);

		    evt.preventDefault();
		}
	</script>
	<?php require_once("footer.php"); ?>
</body>
</html>
