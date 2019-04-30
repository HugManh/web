<?php
$con = mysqli_connect("localhost", "root", "","thongtinsanphamdemo");

if(isset($_POST['submit'])){
	$timkiem = $_POST['timkiem'];
	$sql = "SELECT * FROM infor";
    $query = mysqli_query($con,$sql);
	while ($data = mysqli_fetch_array($query)) {
		if($timkiem == $data['name']){
			session_start();
            $_SESSION['img'] = $data['img'];
            $_SESSION["name"] = $data['name'];

			header('location:danhgia.php');


		}
	}
}
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST">
		<input type="text" name="timkiem" value="">
		<input type="submit" name="submit" value="OK">
		
	</form>
</body>
</html>