<?php
session_start();
require('connect.php');
if(isset($_POST['submit'])){
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$sql = "SELECT * FROM thongtinnguoidung WHERE username='$username' AND password = '$password'";
	$query = mysqli_query($con, $sql);
	$num = mysqli_num_rows($query);
	if($num == 0){
		header('location:Trangchu.php');
	}else{
		if (isset($_POST['remember'])) {
            setcookie('user', $username, time() + 3600, '/', '', 0, 0);
            setcookie('pass', $password, time() + 3600, '/', '', 0, 0);
        }
		$_SESSION['username'] = $username;
		$sql1 = "SELECT * FROM thongtinnguoidung";
		$query1 = mysqli_query($con,$sql1);
		while ($data = mysqli_fetch_array($query1)) {
			if($username == $data['username']){
				session_start();
				$_SESSION['avatar'] = $data['avatar'];
				$_SESSION['username'] = $data['username'];

			}
		} 
		header('location:Trangchu1.php');

	}
	
}
?>
