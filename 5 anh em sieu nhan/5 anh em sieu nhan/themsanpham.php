<?php
     session_start();
     $tentaikhoan = $_SESSION['username'];
     $con = mysqli_connect("localhost","root","","thongtinsanphamdemo");
     if(isset($_POST['add'])){
	    
	    		$addname = $_POST['addname'];
	    		$addimg = $_POST['addimg'];
	    		$addloai = $_POST['addloai'];
	    		$addgia = $_POST['addgia'];
	    		
	    			
	    				$sql = "SELECT * FROM infor WHERE name = '$addname'";
	    				$query = mysqli_query($con,$sql);
	    				$num = mysqli_num_rows($query);
	    				if($num == 0){
	    					$sql2 = "INSERT INTO infor(name,img,loai,gia,username_cm) VALUES ('$addname','$addimg','$addloai','$addgia','$tentaikhoan')";
	    					$them = mysqli_query($con,$sql2);
	    					if($them){
	    						echo '<p style = "color:green">Thêm thành công</p>';
	    					}else{
	    						echo '<p style = "color:red">Thêm không thành công</p>';
	    					}
	    				}else{
	    					echo '<p style = "color:red">Sản phẩm đã tồn tại</p>';
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
		<table>
		        <tr>
					<td>Thêm tên :</td>
					<td><input type="text" name="addname" value=""></td>
				</tr>
				<tr>
					<td>Thêm link ảnh :</td>
					<td><input type="text" name="addimg" value=""></td>
				</tr>
				<tr>
					<td>Thêm loại :</td>
					<td><input type="text" name="addloai" value=""></td>
				</tr>
				<tr>
					<td>Thêm giá :</td>
					<td><input type="text" name="addgia" value=""></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="add" value="ADD"></td>
				</tr>
		</table>		
	</form>
</body>
</html>