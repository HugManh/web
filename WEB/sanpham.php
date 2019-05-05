<?php 
session_start();
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="vi">
<head>
	<title>Trao đổi thông tin sản phẩm</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/png" href="webimage/icon.png"/>
	<!-- CSS, Boostrap -->
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/all.css">
	<link rel="stylesheet" type="text/css" href="jcarousel/jcarousel.responsive.css">
	<!-- Javascript -->
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
				<a href="index1.php">
					<img src="webimage/logo1.png" alt="Logo trang">
				</a>

			</div>
		</div>
	</header>
	<div class="container-fluid">
		<div class="navbar navbar-expand-sm bg-primary navbar-light" style="justify-content: space-between; padding: 0px; height: 56px; cursor: pointer;">
			<ul class="navbar-nav menu">
				<li class="dropdowm">
					<a class="nav-link dropdown-toggle text-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Danh mục sản phẩm</a>
					<ul class="dropdown-menu">
						<li>
							<a href="loaisp.php?loai_sp=<?php echo "Sách" ?>" class="drowdown-item">Sách</a>
						</li>
						<li class="dropdown-divider"></li>
						<li>
							<a href="loaisp.php?loai_sp=<?php echo "Laptop - Thiết bị IT" ?>" class="drowdown-item">Laptop - Thiết bị IT</a>
						</li>
						<li class="dropdown-divider"></li>
						<li>
							<a href="loaisp.php?loai_sp=<?php echo "Thời trang - Phụ kiện thời trang" ?>" class="drowdown-item">Thời trang - Phụ kiện thời trang</a>
						</li>
						<li class="dropdown-divider"></li>
						<li>
							<a href="loaisp.php?loai_sp=<?php echo "Phụ kiện - Thiết bị số" ?>" class="drowdown-item">Phụ kiện - Thiết bị số</a>
						</li>
						<li class="dropdown-divider"></li>
						<li>
							<a href="loaisp.php?loai_sp=<?php echo "Điện thoại - Máy tính bảng" ?>" class="drowdown-item">Điện thoại - Máy tính bảng</a>
						</li>
						<li>
							<a href="loaisp.php?loai_sp=<?php echo "Loại khác" ?>" class="drowdown-item">Loại khác</a>
						</li>
					</ul>
				</li>
			</ul>
			<div class="navbar-nav">
				<form>
					<div class="input-group" style="margin-top: 9px;">
						<input type="text" class="search" value="Tim kiem san pham" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Tim kiem san pham';}">
						<div class="input-group-append" style="margin-top: 9px; margin-left: -34px">
							<a href="#" class="text-dark">
								<i class="fa fa-search"></i>
							</a>
						</div>
					</div>			
				</form>
				<div>			
					<ul class="navbar-nav menu">
						<li class="dropdowm">
							<a href="#" class="nav-link text-light dropdown-toggle" data-toggle="dropdown" style="display: -webkit-inline-box;">
								<?php
								if(isset($_SESSION['avatar'])){
									$imageURL="avatar/".$_SESSION['avatar'];
									$tentaikhoan = $_SESSION['username'];
									?>
									<img src="<?php echo $imageURL; ?>" alt="avatar_user" style="width: 40px; height: 34px;" />
									<p><?php echo $tentaikhoan; ?></p>
									<?php
								}
								?>								
							</a>
							<ul class="dropdown-menu-right border border-primary dropdown-menu">
								<li>
									<a href="taikhoancuatoi.php" class="drowdown-item">Thông tin tài khoản</a>
								</li>
								<li class="dropdown-divider"></li>
								<li>
									<a href="themsanpham.php" class="drowdown-item">Thêm sản phẩm</a>
								</li>
								<li class="dropdown-divider"></li>
								<li>
									<a href="sanphamdathem.php" class="drowdown-item">Sản phẩm đã thêm</a>
								</li>
								<li class="dropdown-divider"></li>
								<li>
									<a href="sanphamdathich.php" class="drowdown-item">Sản phẩm đã thích</a>
								</li>
								<li class="dropdown-divider"></li>
								<li>
									<a href="doimatkhau.php" class="drowdown-item">Đổi mật khẩu</a>
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
	<div class="container-fluid">
		<div class="row content" style="margin: 30px auto;">
			<div class="col-sm-4 sidenav">
				<div>
					<?php
					$id = $_GET['id'];
					$query = mysqli_query($con,"SELECT * FROM thongtinsanpham WHERE ma_sp = '$id'");
					if($query->num_rows > 0){
						$row = $query->fetch_assoc();
						$imageURL1 = 'sanpham/'.$row["img"];
						$tensp = $row['name'];
						$giasp = $row['giatien'];
						$user = $row['username_themsp'];
						$time = $row['time_sp'];
						$noidung = $row['noidung_sp'];
						$_SESSION['name'] = $tensp;
						$_SESSION['img'] = basename($row["img"]);
						$_SESSION['gia'] = $giasp;
						?>
						<div class="card mb-3">

							<div class="view" style="max-width: 500px">
								<img src="<?php echo $imageURL1; ?>" class="card-img-top" alt="">
							</div>
						</div>

						<?php 
					} ?>
					<div class="px-4">
						
						<?php
						$anh = $_SESSION['img'];
						$gia = $_SESSION['gia'];
						$biengetusername = $_SESSION['username'].'fake';
						if(isset($_SESSION['avatar'])){
							if(isset($_POST['like'])){
								$name = $_SESSION["name"];
								$xoa = "DELETE FROM danhgia WHERE username = '$biengetusername'";
								mysqli_query($con, $xoa);
								$tim = "SELECT * FROM danhgia WHERE username = '$biengetusername'";
								$truycap = mysqli_query($con,$tim);
								$num = mysqli_num_rows($truycap);
								if($num == 0){
									$sql = "INSERT INTO danhgia (name,img,gia_sp,like_sp,username) VALUES ('$name','$anh', '$gia',1,'$biengetusername')";
									mysqli_query($con, $sql);   
								}
							}
						}else{
							echo "<script>";
							echo "alert('hãy đăng nhập')";
							echo "</script>";
						}

						if(isset($_SESSION['avatar'])){
							if(isset($_POST['dislike'])){
								$name = $_SESSION["name"];
								$xoa1 = "DELETE FROM danhgia WHERE username = '$biengetusername'";
								mysqli_query($con, $xoa1);
								$tim1 = "SELECT * FROM danhgia WHERE username = '$biengetusername'";
								$truycap1 = mysqli_query($con,$tim1);
								$num1 = mysqli_num_rows($truycap1);
								if($num1 == 0){
									$sql = "INSERT INTO danhgia (name,img,gia_sp,dislike_sp,username) VALUES ('$name','$anh', '$gia',1,'$biengetusername')";
									mysqli_query($con, $sql1);   
								}
							}
						}else{
							echo "<script>";
							echo "alert('hãy đăng nhập')";
							echo "</script>";
						}

						$solike = 0;
						$ten = $_SESSION["name"];
						$tim = "SELECT * FROM danhgia WHERE like_sp = 1";
						$truyvan = mysqli_query($con,$tim);
						while ($data = mysqli_fetch_array($truyvan)) {
							if($ten == $data['name']){
								$solike++;
							}
						}


						$sodislike = 0;
						$ten1 = $_SESSION["name"];
						$tim1 = "SELECT * FROM danhgia WHERE dislike_sp = 1";
						$truyvan1 = mysqli_query($con,$tim1);
						while ($data1 = mysqli_fetch_array($truyvan1)) {
							if($ten1 == $data1['name']){
								$sodislike++;
							}
						}
						?>
						<form action="" method="post">
							<div class="float-left">
								<button type="submit" name="like">
									<i class="fa fa-thumbs-up" style="font-size: 25px"></i>
									<p><?php echo $solike; ?></p>
								</button>
							</div>
							<div style="padding-left: 117px;">
								<button type="submit" name="dislike">
									<i class="fa fa-thumbs-down" style="font-size: 25px"></i>
									<p><?php echo $sodislike; ?></p>
								</button>	
							</div>
						</form>
					</div>
				</div>
			</div>

			<div class="col-sm-8">
				<h4><small><?php echo $tensp; ?></small></h4>
				<p class="m-auto">Người thêm: <?php echo $user; ?></p>
				<p>Thời gian thêm: <?php echo $time; ?></p>
				<hr>
				<h3>Chi tiết sản phẩm</h3>
				<br>
				<p><?php echo $noidung; ?></p>
				<br><br>
				<?php
				$anh = $_SESSION['img'];
				if(isset($_POST['ok'])){
					$txtmess = $_POST['txtmess'];
					$bienusername = $_SESSION['username'];
					$ava = "SELECT * FROM thongtinnguoidung";
					$j_query = mysqli_query($con,$ava);
					while ($data = mysqli_fetch_array($j_query)){
						if($bienusername == $data['username']){
							$avatar_cm = $data['avatar'];
							$themvao = "INSERT INTO danhgia(name,img,comment,username_cm,time_cm,avatar_cm) VALUES ('$ten1','$anh','$txtmess','$bienusername',now(),'$avatar_cm')";
							$them = mysqli_query($con,$themvao);
						}
					}

				}
				?>
				<hr>

				<h4>Bình luận</h4>
				<form action="" method="post" role="form">
					<div class="form-group">
						<textarea class="form-control" name="txtmess" rows="3" required></textarea>
					</div>
					<button type="submit" name="ok" class="btn btn-success">Submit</button>
				</form>
				<br><br>

				<p><span class="badge">so luong comment</span> Comments:</p><br>

				<div class="row">
					<?php
					$chonbinhluan = "SELECT * FROM danhgia WHERE comment !=''";
					$querybinhluan = mysqli_query($con,$chonbinhluan);
					while ($dulieu = mysqli_fetch_array($querybinhluan)){
						if($ten1 == $dulieu['name']){
							$bienbinhluan = $dulieu['comment'];
							$bientencommet = $dulieu['username_cm'];
							$thoigian = $dulieu['time_cm'];
							$avatarcm = 'avatar/'.$dulieu['avatar_cm'];
							?>
							<div class="col-sm-12">
								<div style="display: block;">
									<div class="float-left">
										<p>
											<img src="<?php echo $avatarcm; ?>" class="card-img-top" alt="" style="max-width: 48px; height: 48px;">
										</p>

									</div>
									<div>
										<div class="float-left ml-md-2">
											<p class="m-auto"><b style='color:blue'><?php echo $bientencommet; ?></b> &nbsp <i><?php echo $thoigian; ?></i></p>
											<p><?php echo $bienbinhluan; ?></p>
										</div>

									</div>


								</div>
							</div>
							
							

							<?php
						}
					}
					?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>