<!DOCTYPE html>
<html>
<head>
	<title>ĐỔI MẬT KHẨU</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
	    require('connect.php');
	?>

	<?php
	    session_start();
	    $username = $_SESSION['username'];
	    $avatar = $_SESSION['avatar'];
	    if(isset($_POST['submit'])){
	    	if(empty($_POST['password']) or empty($_POST['password2'])){
	    		echo '<p style = "color:red">Vui lòng nhập đầy đủ thông tin</p>';
	    	}else{
	    		$password = $_POST['password'];
	    		$password2 = $_POST['password2'];
	    		if(strlen($password2) < 5){
	    			echo '<p style = "color:red">mật khẩu phải nhiều hơn 5 kí tự</p>';
	    		}else{
	    			if($password2==$password){
	    				echo '<p style = "color:red">Password trùng nhau </p>';
	    			}else{
	    				$sql = "DELETE FROM quanlythongtin WHERE username = '$username'";
	    				$query = mysqli_query($con,$sql);
	    				//$num = mysqli_num_rows($query);
	    				//if($num == 0){
	    					$sql2 = "INSERT INTO quanlythongtin(username,password,avatar) VALUES ('$username','$password2','$avatar')";
	    					$them = mysqli_query($con,$sql2);
	    					if($them){
	    						echo '<p style = "color:green">Thay đổi thành công</p>';
	    						
	    					}else{
	    						echo '<p style = "color:red">Thay đổi không thành công</p>';
	    					}
	    				}
	    			}
	    		}
	    	}
	    
	?>
	<form action="" method="post" role = "form">
		<p>Password cũ: </p>
		<input type="password" name="password" placeholder="pass">
		<br>
		<br>
		<p>Password mới: </p>
		<input type="password" name="password2">
		<br>
		<br>
		<button type="submit" name = "submit">OK</button>
    </form>

</body>
</html>