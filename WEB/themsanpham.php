<?php
session_start();
$tentaikhoan = $_SESSION['username'];



$con = mysqli_connect("localhost","root","","web");
if(isset($_POST['add'])){

$targetDir = "sanpham/";
$fileName = basename($_FILES["addimg"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

	$addname = $_POST['addname'];
	$addloai = $_POST['addloai'];
	$addgia = $_POST['addgia'];
	$addnoidung = $_POST['addnoidung'];


	$sql = "SELECT * FROM thongtinsanpham WHERE name = '$addname'";
	$query = mysqli_query($con,$sql);
	$num = mysqli_num_rows($query);
	$allowTypes = array('jpg','png','jpeg','gif','pdf');
	if($num == 0){
		if(in_array($fileType, $allowTypes)){
                // Upload file to server
			if(move_uploaded_file($_FILES["addimg"]["tmp_name"], $targetFilePath)){
                 // Insert image file name into database
				$sql="INSERT INTO thongtinsanpham(name, img, loai_sp, giatien, noidung_sp, username_themsp, time_sp) VALUES ('$addname','$fileName','$addloai','$addgia','$addnoidung','$tentaikhoan',NOW())";
				$insert = mysqli_query($con, $sql);
				if($insert){
					//Thêm sản phẩm thành công
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
	}else{
		echo '<p style = "color:red">Sản phẩm đã tồn tại</p>';
	}
}

?>

<!DOCTYPE html>
<html lang="vi">
<head>
	<title>Bootstrap Example</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/all.css">
	<link rel="stylesheet" type="text/css" href="jcarousel/jcarousel.responsive.css">
	<script src="jquery-3.3.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="fontawesome/all.js"></script>
	<script type="text/javascript" src="jcarousel/jquery.jcarousel.min.js"></script>
	<script type="text/javascript" src="jcarousel/jcarousel.responsive.js"></script>
</head>
<body>
	<header>
		<div class="container-fluid">		
			<div class="logo">
				<a href="Trangchu1.php">
					<img src="webimage/logo1.png" alt="Logo trang">
				</a>

			</div>
		</div>
	</header>
	<div class="container-fluid">
		<div class="navbar navbar-expand-sm bg-primary navbar-light" style="justify-content: space-between">
			<ul class="navbar-nav">
				<li class="dropdowm">
					<a href="#" class="nav-link text-light dropdown-toggle" data-toggle="dropdown">Danh mục sản phẩm</a>
					<ul class="border border-primary dropdown-menu">
						<li>
							<a href="#" class="drowdown-item">Sách</a>
						</li>
						<li class="dropdown-divider"></li>
						<li>
							<a href="#" class="drowdown-item">Laptop - Thiết bị IT</a>
						</li>
						<li class="dropdown-divider"></li>
						<li>
							<a href="#" class="drowdown-item">Thời trang - Phụ kiện thời trang</a>
						</li>
						<li class="dropdown-divider"></li>
						<li>
							<a href="#" class="drowdown-item">Phụ kiện - Thiết bị số</a>
						</li>
						<li class="dropdown-divider"></li>
						<li>
							<a href="#" class="drowdown-item">Điện thoại - Máy tính bảng</a>
						</li>		
					</ul>
				</li>
				<div>
					<a href="themsanpham.php"  class="nav-link text-light">Thêm sản phẩm</a>
				</div>
			</ul>
			<div class="navbar-nav">
				<form>
					<div class="input-group">
						<input type="text" class="search" value="Tim kiem san pham" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Tim kiem san pham';}">
						<div class="input-group-append" style="margin-top: 9px; margin-left: -28px">
							<a href="#" class="text-dark">
								<i class="fa fa-search"></i>
							</a>
						</div>
					</div>			
				</form>
				<div>
					
					<ul class="navbar-nav">
						<li class="dropdowm">
							<a href="#" class="nav-link text-light dropdown-toggle" data-toggle="dropdown">
								<?php
								if(isset($_SESSION['avatar'])){
									$imageURL="avatar/".$_SESSION['avatar'];
									$tentaikhoan = $_SESSION['username'];
									?>
									<img src="<?php echo $imageURL; ?>" alt="" style="width: 21px;" />
									<?php
									echo "$tentaikhoan";
								}
								?>								
							</a>
							<ul class="dropdown-menu-right border border-primary dropdown-menu">
								<li>
									<a href="taikhoancuatoi.php" class="drowdown-item">Thong tin tai khoan</a>
								</li>
								<li class="dropdown-divider"></li>
								<li>
									<a href="#" class="drowdown-item">San pham da xem</a>
								</li>
								<li class="dropdown-divider"></li>
								<li>
									<a href="#" class="drowdown-item">San pham da thich</a>
								</li>
								<li class="dropdown-divider"></li>
								<li>
									<a href="doimatkhau.php" class="drowdown-item">Doi mat khau</a>
								</li>
								<li class="dropdown-divider"></li>
								<li>
									<a href="#" class="drowdown-item">
										<form method="post">
											<button name="logout"> Đăng xuất</button>
										</form>
										<?php
										if(isset($_POST['logout'])){
											unset($_SESSION['avatar']);
											header('location:Trangchu.html');
										}
										?>
									</a>
								</li>		
							</ul>
						</li>
					</ul>
				</div>
			</div>

		</div>
	</div>
	<div>
		<form action="" method="post" class="my-3 mx-3" enctype="multipart/form-data">
			<div class="input-group md-form form-sm mb-4">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-user"></i>
					</span>
				</div>
				<input type="text" name="addname" class="form-control" placeholder="Tên sản phẩm" required>
			</div>

			<div class="input-group md-form form-sm mb-4">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fas fa-lock prefix"></i>
					</span>
				</div>
				<input type="text" name="addloai" class="form-control" placeholder="Loại sản phẩm" required>
			</div>											

			<div class="input-group md-form form-sm mb-4">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fas fa-lock prefix"></i>
					</span>
				</div>
				<input type="text" name="addgia" class="form-control" placeholder="Giá sản phẩm" required>
			</div>

			<div class="input-group md-form form-sm mb-4">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fas fa-lock prefix"></i>
					</span>
				</div>
				<input type="text" name="addnoidung" class="form-control" placeholder="Thông tin sản phẩm" required>
			</div>

			<div class="input-group md-form form-sm mb-4">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-image"></i>
					</span>
				</div>
				<input type="file" name="addimg" class="form-control" placeholder="Hỉnh ảnh sản phẩm" required>
			</div>

			<div class="text-center form-sm mt-2">
				<button type="submit" name="add" class="btn btn-info">Thêm sản phẩm<i class="fas fa-sign-in ml-1"></i></button>
			</div>

		</form>
	</div>


</body>
</html>
