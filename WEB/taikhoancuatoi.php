<?php
require 'connect.php';
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
          
          <ul class="navbar-nav">
            <li class="dropdowm">
              <a href="#" class="nav-link text-light dropdown-toggle" data-toggle="dropdown">
                <?php
                if(isset($_SESSION['avatar'])){
                  include($_SESSION['avatar']);
                  $tentaikhoan = $_SESSION['username'];
                  echo $tentaikhoan;
                }
                ?>
              </a>
              <ul class="border border-primary dropdown-menu">
                <li>
                  <a href="#" class="drowdown-item">Thong tin tai khoan</a>
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
  <div class="container-fluid">
    <div class="float-left">
      <div class="">
        <img src="sanpham/sp1.jpg" style="
    width: 86px;
">
      </div>
    </div>
  </div>

</body>
</html>