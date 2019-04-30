<?php
     if(isset($_POST['dangnhap'])){
     	session_start();
     	header('location:dangnhap.php');
     }
     if(isset($_POST['dangky'])){
     	session_start();
     	header('location:dangky.php');
     }
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div align="center">
		<form method="POST">
			<button type="submit" name = "dangnhap">Đăng Nhập</button>
			<button type="submit" name = "dangky">Đăng Ký</button>
		</form>
	</div>
</body>
</html>