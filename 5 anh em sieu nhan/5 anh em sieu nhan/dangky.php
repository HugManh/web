<!DOCTYPE html>
<html>
<head>
	<title>ĐĂNG KÝ</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
	    require('connect.php');
	?>

	<?php
	    if(isset($_POST['submit'])){
	    	if(empty($_POST['username']) or empty($_POST['password'])){
	    		echo '<p style = "color:red">Vui lòng nhập đầy đủ thông tin</p>';
	    	}else{
	    		$username = $_POST['username'];
	    		$password = $_POST['password'];
	    		$password2 = $_POST['password2'];
	    		$avatar = $_POST['avatar'];
	    		if(strlen($username) < 5 or strlen($password) < 5){
	    			echo '<p style = "color:red">Tên tài khoản hoặc mật khẩu phải nhiều hơn 5 kí tự</p>';
	    		}else{
	    			if($password2!=$password){
	    				echo '<p style = "color:red">Password không trùng nhau yêu cầu nhập lại</p>';
	    			}else{
	    				$sql = "SELECT * FROM quanlythongtin WHERE username = '$username'";
	    				$query = mysqli_query($con,$sql);
	    				$num = mysqli_num_rows($query);
	    				if($num == 0){
	    					$sql2 = "INSERT INTO quanlythongtin(username,password,avatar) VALUES ('$username','$password','$avatar')";
	    					$them = mysqli_query($con,$sql2);
	    					if($them){
	    						echo '<p style = "color:green">Đăng ký thành công</p>';
	    						header('location:dangnhap.php');
	    					}else{
	    						echo '<p style = "color:red">Đăng ký không thành công</p>';
	    					}
	    				}else{
	    					echo '<p style = "color:red">Tên tài khoản đã tồn tại</p>';
	    				}
	    			}
	    		}
	    	}
	    }
	?>
	<form action="" method="post" role = "form">
		<p>Username : </p>
		<input type="text" name="username" placeholder="tên tài khoản">
		<br>
		<br>
		<p>Password : </p>
		<input type="password" name="password" placeholder="pass">
		<br>
		<br>
		<p>Nhập lại Password : </p>
		<input type="password" name="password2">
		<br>
		<br>
		<p>Link Avatar : </p>
		<input type="text" name="avatar">
		<br>
		<br>
		<button type="submit" name = "submit">Đăng ký</button>
    </form>

</body>
</html>