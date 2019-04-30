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
				<a href="Trangchu.php">
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
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#user_login">
						Đăng nhập/Đăng ký
					</button>
					<div class="modal fade" id="user_login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog cascading-modal" role="document">
							<!--Content-->
							<div class="modal-content">
								<div class="modal-c-tabs">

									<!-- Nav tabs -->
									<ul class="nav nav-tabs" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" data-toggle="tab" href="#login" role="tab"><i class="fas fa-user mr-1"></i>
											Đăng nhập</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#register" role="tab"><i class="fas fa-user-plus mr-1"></i>
											Đăng ký</a>
										</li>
									</ul>

									<!-- Tab panels -->
									<div class="tab-content">
										<!--Login-->
										<div class="tab-pane fade in show active" id="login" role="tabpanel">

											<!--Body-->
											<form action="dangnhap.php" method="post" class="modal-body my-3 mx-3">
												<div class="input-group md-form form-sm mb-4">
													<div class="input-group-prepend">
														<span class="input-group-text">
															<i class="fa fa-user"></i>
														</span>
													</div>
													<input type="username" name="username" class="form-control" placeholder="Tên tài khoản" required>
												</div>

												<div class="input-group md-form form-sm mb-4">
													<div class="input-group-prepend">
														<span class="input-group-text">
															<i class="fas fa-lock prefix"></i>
														</span>
													</div>
													<input type="password" name="password" id="pass" class="form-control" placeholder="Mật khẩu" required>
												</div>

												<div class="form-group form-check">
													<label class="form-check-label">
														<input class="form-check-input" type="checkbox" name="remember" <?php if(isset($_COOKIE['username'])){echo 'checked';} ?>> Remember me
													</label>
												</div>

												<div class="text-center mt-2">
													<button type="submit" name="submit" class="btn btn-info">Đăng nhập<i class="fas fa-sign-in ml-1"></i></button>
												</div>
												<?php
												if($num=0)
												{
													echo "<script>alert('Sai tên đăng nhập hoặc mật khẩu! Mời nhập lại!');</script>";
												}  
												?>
											</form>
											<!--Footer-->
											<div class="modal-footer">
												<button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Đóng</button>
											</div>

										</div>
										<!--/Login-->

										<!--Register-->
										<div class="tab-pane fade" id="register" role="tabpanel">

											<!--Body-->
											<form action="dangky.php" method="post" class="modal-body my-3 mx-3" enctype="multipart/form-data">
												<div class="input-group md-form form-sm mb-4">
													<div class="input-group-prepend">
														<span class="input-group-text">
															<i class="fa fa-user"></i>
														</span>
													</div>
													<input type="username" name="username" class="form-control" placeholder="Tên tài khoản" required>
												</div>

												<div class="input-group md-form form-sm mb-4">
													<div class="input-group-prepend">
														<span class="input-group-text">
															<i class="fas fa-lock prefix"></i>
														</span>
													</div>
													<input type="password" id="password" name="password" placeholder="Mật khẩu" class="form-control" pattern="(?=.*\d).{6,}" required>
												</div>
												<div id="message">
													<p id="length" class="invalid">
														<i class="fa fa-check"></i>
														Mật khẩu lớn hơn 5 ký tự
													</p>
												</div>												
												
												<div class="input-group md-form form-sm mb-4">
													<div class="input-group-prepend">
														<span class="input-group-text">
															<i class="fas fa-lock prefix"></i>
														</span>
													</div>
													<input type="password" name="password2" class="form-control" placeholder="Nhập lại mật khẩu" required>
												</div>

												<div class="input-group md-form form-sm mb-4" enc>
													<div class="input-group-prepend">
														<span class="input-group-text">
															<i class="fa fa-image"></i>
														</span>
													</div>
													<input type="file" name="avatar" class="form-control" placeholder="Link Avatar" required>
												</div>

												<div class="text-center form-sm mt-2">
													<button type="submit" name="submit" class="btn btn-info">Đăng ký<i class="fas fa-sign-in ml-1"></i></button>
												</div>

											</form>
											<!--Footer-->
											

											<div class="modal-footer">
												<button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Đóng</button>
											</div>
										</div>
										<!--/Register-->
									</div>

								</div>
							</div>
							<!--/.Content-->
						</div>
					</div>		
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
			<div class="col-sm-3">
				<div class="card" style="width: 100%">
					<?php
// Include the database configuration file
					include 'connect.php';

// Get images from the database
					$query = mysqli_query($con,"SELECT * FROM thongtinsanpham ORDER BY time_sp DESC");

					if($query->num_rows > 0){
						while($row = $query->fetch_assoc()){
							$imageURL = 'sanpham/'.$row["img"];

							?>
							<img class="card-img-top img-thumbnail" src="<?php echo $imageURL; ?>" alt="card">
							<div class="card-body">
								<h5 class="card-title">San pham</h5>
								<p><?php echo $imageURL; ?></p>
								<p class="card-text">15000d-20000d</p>
								<a href="#">xem san pham</a>
							</div>

						<?php }
					}else{ ?>
						<p>No image(s) found...</p>
					<?php } ?>
					
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function clickPass(){
			var pass=document.getElementById('pass');
			if (pass.type=='password') {
				pass.type='text';
			} else {
				pass.type='password';
			}
		}
	</script>
	<script>
		var myInput = document.getElementById("password");
		var length = document.getElementById("length");

		myInput.onfocus = function() {
			document.getElementById("message").style.display = "block";
		}

		myInput.onblur = function() {
			document.getElementById("message").style.display = "none";
		}

		myInput.onkeyup = function() {
			if(myInput.value.length >= 6) {
				length.classList.remove("invalid");
				length.classList.add("valid");
			} else {
				length.classList.remove("valid");
				length.classList.add("invalid");
			}
		}
	</script>

</body>
</html>