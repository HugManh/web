<?php
    session_start();
?>



<!DOCTYPE html>
<html>
<head>
	<title>Đăng Nhập</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
	    require('connect.php');
	    if(isset($_POST['submit'])){
	    	if(empty($_POST['username']) or empty($_POST['password'])){
	    		echo '<p style = "color:red">Vui lòng không để trống</p>';
	    	}else{
	    		$username = $_POST['username'];
	    		$password = $_POST['password'];
	    		$sql = "SELECT * FROM quanlythongtin WHERE username='$username' AND password = '$password'";
	    		$query = mysqli_query($con, $sql);
	    		$num = mysqli_num_rows($query);
	    		if($num == 0){
	    			echo '<p style = "color:red">Username hoặc Password không đúng</p>';
	    		}else{
	    			$_SESSION['username'] = $username;
	    			$sql1 = "SELECT * FROM quanlythongtin";
                    $query1 = mysqli_query($con,$sql1);
	                while ($data = mysqli_fetch_array($query1)) {
		                   if($username == $data['username']){
			                   session_start();
                               $_SESSION['avatar'] = $data['avatar'];
                               $_SESSION['username'] = $data['username'];

		                    }
	                    } 
	    			    header('location:trangsanphamdemo.php');

	    		    }

	    	    }
	        }
	?>

	<h1>Login</h1>
	<br>
	<br>
	<br>
	<form action="" method="post" role = "form">
	<p>Username : </p>
		<input type="text" name="username" placeholder="tên tài khoản">
		<br>
		<br>
		<p>Password : </p>
		<input type="password" name="password" placeholder="pass">
		<br>
		<br>
		<button type="submit" name = "submit">Submit</button>
	</form>	
</body>
</html>
