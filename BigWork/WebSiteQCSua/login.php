<?php
	session_start();
	if (!isset($_SESSION['success'])) {
		$_SESSION['success'] = null;
	}
	if ($_SESSION['success'] == "success"){
	?>
	<script type="text/javascript">
		setTimeout(function(){
		   alert("tạo tài khoản thành công!");
		}, 100);
	</script>
	<?php
     	$_SESSION['success'] = null;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<style type="text/css">
		@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');
		* {
		  box-sizing: border-box;
		}

		body {
		  background: #f6f5f7;
		  display: flex;
		  justify-content: center;
		  align-items: center;
		  flex-direction: column;
		  font-family: 'Montserrat', sans-serif;
		  height: 100vh;
		  margin: -20px 0 50px;
		}

		h1 {
		  font-weight: bold;
		  margin: 0;
		}

		h2 {
		  text-align: center;
		}

		p {
		  font-size: 14px;
		  font-weight: 100;
		  line-height: 20px;
		  letter-spacing: 0.5px;
		  margin: 20px 0 30px;
		}

		span {
		  font-size: 12px;
		}

		a {
		  color: #333;
		  font-size: 14px;
		  text-decoration: none;
		  margin: 15px 0;
		}

		button {
		  border-radius: 20px;
		  border: 1px solid #FF4B2B;
		  background-color: #FF4B2B;
		  color: #FFFFFF;
		  font-size: 12px;
		  font-weight: bold;
		  padding: 12px 45px;
		  letter-spacing: 1px;
		  text-transform: uppercase;
		  transition: transform 80ms ease-in;
		}

		button:active {
		  transform: scale(0.95);
		}

		button:focus {
		  outline: none;
		}

		button.ghost {
		  background-color: transparent;
		  border-color: #FFFFFF;
		}

		form {
		  background-color: #FFFFFF;
		  display: flex;
		  align-items: center;
		  justify-content: center;
		  flex-direction: column;
		  padding: 0 50px;
		  height: 100%;
		  text-align: center;
		}

		input {
		  background-color: #eee;
		  border: none;
		  padding: 12px 15px;
		  margin: 8px 0;
		  width: 100%;
		}

		.container {
		  background-color: #fff;
		  border-radius: 10px;
		    box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
		      0 10px 10px rgba(0,0,0,0.22);
		  position: relative;
		  overflow: hidden;
		  width: 768px;
		  max-width: 100%;
		  min-height: 480px;
		}

		.form-container {
		  position: absolute;
		  top: 0;
		  height: 100%;
		  transition: all 0.6s ease-in-out;
		}

		.sign-in-container {
		  left: 0;
		  width: 50%;
		  z-index: 2;
		}

		.container.right-panel-active .sign-in-container {
		  transform: translateX(100%);
		}

		.sign-up-container {
		  left: 0;
		  width: 50%;
		  opacity: 0;
		  z-index: 1;
		}

		.container.right-panel-active .sign-up-container {
		  transform: translateX(100%);
		  opacity: 1;
		  z-index: 5;
		  animation: show 0.6s;
		}

		@keyframes show {
		  0%, 49.99% {
		    opacity: 0;
		    z-index: 1;
		  }
		  
		  50%, 100% {
		    opacity: 1;
		    z-index: 5;
		  }
		}

		.overlay-container {
		  position: absolute;
		  top: 0;
		  left: 50%;
		  width: 50%;
		  height: 100%;
		  overflow: hidden;
		  transition: transform 0.6s ease-in-out;
		  z-index: 100;
		}

		.container.right-panel-active .overlay-container{
		  transform: translateX(-100%);
		}

		.overlay {
		  background: #FF416C;
		  background: -webkit-linear-gradient(to right, #FF4B2B, #FF416C);
		  background: linear-gradient(to right, #FF4B2B, #FF416C);
		  background-repeat: no-repeat;
		  background-size: cover;
		  background-position: 0 0;
		  color: #FFFFFF;
		  position: relative;
		  left: -100%;
		  height: 100%;
		  width: 200%;
		    transform: translateX(0);
		  transition: transform 0.6s ease-in-out;
		}

		.container.right-panel-active .overlay {
		    transform: translateX(50%);
		}

		.overlay-panel {
		  position: absolute;
		  display: flex;
		  align-items: center;
		  justify-content: center;
		  flex-direction: column;
		  padding: 0 40px;
		  text-align: center;
		  top: 0;
		  height: 100%;
		  width: 50%;
		  transform: translateX(0);
		  transition: transform 0.6s ease-in-out;
		}

		.overlay-left {
		  transform: translateX(-20%);
		}

		.container.right-panel-active .overlay-left {
		  transform: translateX(0);
		}

		.overlay-right {
		  right: 0;
		  transform: translateX(0);
		}

		.container.right-panel-active .overlay-right {
		  transform: translateX(20%);
		}

		.social-container {
		  margin: 20px 0;
		}

		.social-container a {
		  border: 1px solid #DDDDDD;
		  border-radius: 50%;
		  display: inline-flex;
		  justify-content: center;
		  align-items: center;
		  margin: 0 5px;
		  height: 40px;
		  width: 40px;
		}

		footer {
		    background-color: #222;
		    color: #fff;
		    font-size: 14px;
		    bottom: 0;
		    position: fixed;
		    left: 0;
		    right: 0;
		    text-align: center;
		    z-index: 999;
		}

		footer p {
		    margin: 10px 0;
		}

		footer i {
		    color: red;
		}

		footer a {
		    color: #3c97bf;
		    text-decoration: none;
		}
		table{
			width: 100%;
			height: 40px;
			font-size: 12px;
			background-color: #eee;
		   color: #333;
		}
		table input{
			width: 15px;
		}
		table td{
			width: 100px;
		}
	</style>
</head>
<body>
   <h2>Chào mừng bạn đến với KN OFFICIAL</h2>
		<div class="container" id="container">
		  <div class="form-container sign-up-container">
		    <form action="process_register.php" method="POST">
		      <h1>Tạo Tài Khoản</h1>
		      <span></span>
		      <input type="text" name="TenKH" placeholder="Name" />
		      <table>
		      	<tr>
		      		<td>Gender</td>
		      		<td>
		      			<span><input name="gender" type="radio" value="Nam" checked /></span>
		      			<span>Nam</span>
		      		</td>
		      		<td>
		      			<span><input name="gender" type="radio" value="Nữ" /></span>
		      			<span>Nữ</span>
		      		</td>
		      		<td>
		      			<span><input name="gender" type="radio" value="Khác" /></span>
		      			<span>Khác</span>
		      		</td>
		      	</tr>
		      </table>
		      <input type="text" name="DiaChi" placeholder="Adress" />
		      <input type="text" name="SDT" placeholder="Phone Number" />
		      <input type="email" name="Email" placeholder="Email" />
		      <input type="password" name="Pass" placeholder="Password" />
		      <button class="DK">Đăng ký</button>
		    </form>
		  </div>
		  <div class="form-container sign-in-container">
		    <form action="process_login.php" method="POST">
		      <h1>Đăng Nhập</h1>
		      <div class="social-container">
		        <p class="social"><i class="fab fa-facebook-f"></i></p>
		        <p class="social"><i class="fab fa-google-plus-g"></i></p>
		        <p class="social"><i class="fab fa-linkedin-in"></i></p>
		      </div>
		      <span></span>
		      <input type="email" name="Email" placeholder="Email" />
		      <input type="password" name="Pass" placeholder="Password" />
		      <p></p>
		      <button>Đăng Nhập</button>
		    </form>
		  </div>
		  <div class="overlay-container">
		    <div class="overlay">
		      <div class="overlay-panel overlay-left">
		        <h1>Chào mừng bạn mới!</h1>
		        <p>Nhập đầy đủ thông tin cá nhân để giữ kết nối với chúng tôi nhé!</p>
		        <button class="ghost" id="signIn">Đăng Nhập</button>
		      </div>
		      <div class="overlay-panel overlay-right">
		        <h1>Xin chào bạn!</h1>
		        <p>Hãy nhập thông tin cá nhân vào và bắt đầu mua sắm nào!</p>
		        <button class="ghost" id="signUp" >Đăng ký</button>
		      </div>
		    </div>
		  </div>
		</div>
		<footer>
		  <p>
		    Youtube <i class="fa fa-heart"></i>:
		    <a target="_blank" href="https://www.youtube.com/c/KNOFFICIALGAME">KN OFFICIAL</a>
		    - Bạn có thể yêu cầu trợ giúp thông qua Facebook
		    <a target="_blank" href="https://www.facebook.com/profile.php?id=100007498090194">Tại đây</a>.
		  </p>
		</footer>
	<script type="text/javascript">
		const signUpButton = document.getElementById('signUp');
		const signInButton = document.getElementById('signIn');
		const container = document.getElementById('container');

		signUpButton.addEventListener('click', () => {
		  container.classList.add("right-panel-active");
		});

		signInButton.addEventListener('click', () => {
		  container.classList.remove("right-panel-active");
		});
	</script>
</body>
</html>