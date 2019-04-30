<?php
    session_start();
    $tentaikhoan = $_SESSION['username'];
    $avatar = $_SESSION['avatar'];


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div>
	<h2>Thông tin cá nhân</h2>
	<p>Tên tài khoản : <?php echo $tentaikhoan ?></p>
	<p>Avatar : <?php include("$avatar") ?></p>
	</div>
	<div>
		<h2>Sản phẩm đã thích</h2>
		<p><?php 
                $con = mysqli_connect("localhost", "root", "","thongtinsanphamdemo");
                $tim = "SELECT * FROM infor WHERE like_sp = 1";
                $query = mysqli_query($con,$tim);
                while ($data = mysqli_fetch_array($query)){
                      if($tentaikhoan.'fake' == $data['username_cm']){
            	                  $sanphamthich = $data['img'];
            	                  include("$sanphamthich");
                             }
                  }  
          ?>
          	
          </p>
	</div>


	<div>
		<h2>Sản phẩm đã thêm</h2>
		<p><?php 
                $con1 = mysqli_connect("localhost", "root", "","thongtinsanphamdemo");
                $tim1 = "SELECT * FROM infor WHERE username_cm = '$tentaikhoan'";
                $query1 = mysqli_query($con1,$tim1);
                while ($data1 = mysqli_fetch_array($query1)){
                      if($data1['gia'] != 0){
            	                  $sanphamthem = $data1['img'];
            	                  include("$sanphamthem");
                             }
                  }  
          ?>
          	
          </p>
	</div>

</body>
</html>