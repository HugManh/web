<?php 
session_start();
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
									<a href="dangxuat.php" class="drowdown-item">Đăng xuất</a>
								</li>		
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="jcarousel-wrapper">
			<div class="jcarousel" data-jcarousel="true">
				<ul>
					<li ><img src="sanpham/sp1.jpg" alt="Image 1"></li>
					<li ><img src="sanpham/sp2.jpg" alt="Image 2"></li>
					<li ><img src="sanpham/sp3.jpg" alt="Image 3"></li>
					<li ><img src="sanpham/sp4.jpg" alt="Image 4"></li>
					<li ><img src="sanpham/sp3.jpg" alt="Image 5"></li>
					<li ><img src="sanpham/sp2.jpg" alt="Image 6"></li>
				</ul>
			</div>

			<a href="#" class="jcarousel-control-prev" role="button" data-jcarouselcontrol="true">‹</a>
			<a href="#" class="jcarousel-control-next" role="button" data-jcarouselcontrol="true">›</a>

			<p class="jcarousel-pagination" data-jcarouselpagination="true">
				<a href="#1" class="">1</a>
				<a href="#2" class="">2</a>
				<a href="#3" class="">3</a>
				<a href="#4" class="">4</a>
				<a href="#5" class="">5</a>
				<a href="#6" class="active">6</a>
			</p>
		</div>
	</div>
	<div class="container" style="margin-top: 70px">
		<div class="row">

			<?php
			include 'connect.php';

			$query = mysqli_query($con,"SELECT * FROM thongtinsanpham ORDER BY time_sp DESC");

			if($query->num_rows > 0){
				while($row = $query->fetch_assoc()){
					$imageURL = 'sanpham/'.$row["img"];
					$tensp = $row['name'];
					$giasp = $row['giatien'];
					?>
					<div class="col-sm-3">
						<div class="card" style="width: 100%">
							<img class="card-img-top img-thumbnail" src="<?php echo $imageURL; ?>" alt="Hình ảnh sản phẩm">
							<div class="card-body">
								<h5 class="card-title"><?php echo $tensp; ?></h5>
								<p class="card-text"><?php echo $giasp; ?></p>
								<a href="#">xem san pham</a>
							</div>
						</div>
					</div>

				<?php }
			}else{ ?>
				<p>No image(s) found...</p>
			<?php } ?>

		</div>
	</div>


</body>
</html>
