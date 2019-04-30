<?php
require('connect.php');

$statusMsg = '';
// File upload path
$targetDir = "avatar/";
$fileName = basename($_FILES["avatar"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST['submit']) && !empty($_FILES["avatar"]["name"])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];

	if($password2!=$password){
		echo '<p style = "color:red">Password không trùng nhau yêu cầu nhập lại</p>';
	}else{
		$sql = "SELECT * FROM thongtinnguoidung WHERE username == '$username' AND avatar == '$fileName'";
		$query = mysqli_query($con,$sql);
		$allowTypes = array('jpg','png','jpeg','gif','pdf');

		if($query == 0){
			if(in_array($fileType, $allowTypes)){
                // Upload file to server
				if(move_uploaded_file($_FILES["avatar"]["tmp_name"], $targetFilePath)){
                    // Insert image file name into database
                    $query = "INSERT INTO thongtinnguoidung ( username, password, avatar, date_created) VALUES ('$username', '$password', '$fileName', NOW())";
					$insert = mysqli_query($con, $query);
					if($insert){
						$_SESSION['avatar'] = $data['avatar'];
						$_SESSION['username'] = $data['username'];
						//Dang ký thành công
						header('location:Trangchu1.php');						
					}else{
						echo "file load bị lỗi";
					} 
				}else{
					$statusMsg = "upload file bị lỗi";
				}
			}
		    else{
			    $statusMsg = 'Chỉ load file : JPG, JPEG, PNG, GIF, & PDF ';
		    }
	    }
    }
}
?>