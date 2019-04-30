<?php
     session_start();
     if(isset($_SESSION['avatar'])){	
     	include($_SESSION['avatar']);
     	$tentaikhoan = $_SESSION['username'];
     	echo $tentaikhoan;
     	if(isset($_POST['add'])){
     		header('location:themsanpham.php');
     	}
     	if(isset($_POST['enter'])){
     		header('location:taikhoancuatoi.php');
     	}

      include('linkdandoimatkhau.php');

     }else{
     	include("register.php");
     	include("login.php");
     	$_SESSION['username'] = "account";
     }
     if(isset($_POST['logout'])){
     	unset($_SESSION['avatar']);
     	header('location:trangsanphamdemo.php');
     }
     
 ?>



<?php
    include("test.php");
 ?>              
<?php
     $con = mysqli_connect("localhost","root","","thongtinsanphamdemo");
     if(isset($_POST['doraemontap1'])){
      $sql = "SELECT * FROM infor";
        $query = mysqli_query($con,$sql);
      while ($data = mysqli_fetch_array($query)){
          if('doraemon tap 1' == $data['name']){
            session_start();
                  $_SESSION['img'] = $data['img'];
                  $_SESSION["name"] = $data['name'];
            header('location:danhgia.php');
        
            }
          }
          
     }


     if(isset($_POST['tyquaytap10'])){
      $sql = "SELECT * FROM infor";
        $query = mysqli_query($con,$sql);
      while ($data = mysqli_fetch_array($query)){
           if('ty quay tap 10' == $data['name']){
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
          <title>TRUYEN.VN</title>
          <meta charset="UTF-8">
         
          <style type = "text/css">
                body{
                    margin:0px;
                    padding:0px;
                   
                }
                h1{
                  color: red;
                  display: inline;
                  padding-left: 30%;
          
                }
                h2{
                  color: black;
                }
                h6{
                  color: black;
                }
            
                #container{
                   background-image: url("background/hinhnentrangchu.jpg");
                   margin: auto;

                }
                
                #header{
                  background-color: yellow;
                  border-width: 5px;
                  border-style: inset;
                  border-color: orange;
                  

                }
                #buttonnum{
                  background-color: orange;
                  display: inline;
                  width: 50px;
                  height: 50px;
                  font-size: 30px;
                  color: black;
                }
                #xulynum{
                  margin-left: 700px;
                  word-spacing: 30px;
                }
                
                #buttontrangchu{
                  background-color: green;
                  display: inline;
                  width: 200px;
                  height: 100px;
                  font-size: 40px;
                  color: yellow;
                }



                #content{
                  overflow: auto;

                }
                #menu{
                  width: 300px;
                  height: 600px;
                  float: left;

                }
                #timkiem{
                  margin-left: 10px;
                  width: 300px;
                  height: 50px;
                }
                #anbum{
                  width: 1000px;
                  float: left;
                  
                 
                }
                #anh1{
                  padding-left: 20px;
                  float: left;
                }
                #anh2{
                  padding-left: 40px;
                  float: left;
                }
                #anh3{
                  padding-left: 60px;
                  float: left;
                }
                #anh4{
                  padding-left: 80px;
                  float: left;
                }
                #anh5{
                  padding-left: 20px;
                  float: left;
                }
                #anh6{
                  padding-left: 40px;
                  float: left;
                }
                #anh7{
                  padding-left: 60px;
                  float: left;
                }
                #anh8{
                  padding-left: 80px;
                  float: left;
                }
                #menu_child{
                   border:5px solid black;
                   background-color: rgb(192, 219, 235);
                   border-radius:10px;
                   margin:0px;
                   font-size: 30px;
                   line-height: 80px;
                   


                }
                



                #footer{
                  background-color: gray;
                  padding-left: 44%;
                  clear: both;
                }
                
                

                
          </style>
     </head>

     <body>
      <form  method="POST">
        <button type="submit" name="logout">Đăng Xuất</button>
      </form>
     	
          <div id = "container">

            <div id = "header">
              <button type="button" id = "buttontrangchu">Trang chủ</button>
              <h1>SHOP TRUYỆN</h1>
            </div>

                  

            <div id = "content">

              <h2 align = "center">Phổ Biến</h2>
              <div id = "menu">
                <div id = "timkiem">
                  
                </div>
                <div id = "menu_child">
                  
                    <ul>
                        <li title="truyện tranh">Truyện Tranh</li>
                        <li title="truyện cười">Truyện Cười</li>
                        <li title="tiểu thuyết">Tiểu Thuyết</li>
                        <li title="truyện trinh thám">Truyện Trinh Thám</li>
                        <li title="anime">Anime</li>
                        <li title="truyện cổ tích">Truyện Cổ Tích</li>
                    </ul>
                </div>
              </div>

              <div id = "anbum">
                <div id = "anh1">
                  <form method="POST">
                  <button type="submit" name="doraemontap1" ><img src="CommicImage/doraemon1.jpg" width="200px" height="300px" title = "doraemon tập 1"></button>
                  </form>
                  <u><h3 align="center">20000 VNĐ</h3></u>
                </div>
               
                <div id = "anh2">
                  <img src="CommicImage/SherlockHolmes1.gif" width="200px" height="300px">
                  <u><h3 align="center">500000 VNĐ</h3></u>
                </div>
                <div id = "anh3">
                  <img src="CommicImage/thandongdatviet2.png" width="200px" height="300px">
                  <u><h3 align="center">15000 VNĐ</h3></u>
                </div>
                <div id = "anh4">
                  <img src="CommicImage/tienggoinoihoangda.jpg" width="200px" height="300px">
                  <u><h3 align="center">150000 VNĐ</h3></u>
                </div>
                <div id = "anh5">
                  <img src="CommicImage/truyencotichviet.gif" width="200px" height="300px">
                  <u><h3 align="center">100000 VNĐ</h3></u>
                </div>
                <div id = "anh6">
                  <img src="CommicImage/thoithoaucacthientai1.jpg" width="200px" height="300px">
                  <u><h3 align="center">50000 VNĐ</h3></u>
                </div>
                <div id = "anh7">
                  <img src="CommicImage/tupneubactom.jpg" width="200px" height="300px">
                  <u><h3 align="center">300000 VNĐ</h3></u>
                </div>
                <div id = "anh8">
                  <form method="POST">
                    <button type = "submit" name  = "tyquaytap10"><img src="CommicImage/tyquay10.jpg" width="200px" height="300px"></button>
                  </form>
                  <u><h3 align="center">60000 VNĐ</h3></u>
                </div>
              </div>

              
            </div>





            <div id = "xulynum">
              <button type="button"  id = "buttonnum">1</button>
              <button type="button"  id = "buttonnum">2</button>
            </div>
            
        
            
             


            <div id = "footer">
              <h2>THANK YOU</h2>
            </div>
          </div>


      <form action="" method="POST">
        <button type="submit" name="add">Thêm sản phẩm</button>
      </form>

      <form action="" method="POST">
        <button type="submit" name="enter">Tài khoản của tôi</button>
      </form>
          
     </body>
</html>