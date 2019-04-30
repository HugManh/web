<?php
      session_start();
      /*include( $_SESSION['img']);
      if(isset($_POST['thich'])){
      	$name = $_SESSION["name"]."fake";
      	$conn = mysqli_connect("localhost", "root", "","thongtinsanphamdemo");
        $sql = "INSERT INTO infor (name,like_sp) VALUES ('$name',1)";
        mysqli_query($conn, $sql);
      }
      if(isset($_POST['khongthich'])){
      	$name1 = $_SESSION["name"]."fake";
      	$conn1 = mysqli_connect("localhost", "root", "","thongtinsanphamdemo");
        $sql1 = "INSERT INTO infor (name,dislike_sp) VALUES ('$name1',1)";   
        mysqli_query($conn1, $sql1);

      }

    $solike = 0;
	$ten = $_SESSION["name"]."fake";
    $con = mysqli_connect("localhost", "root", "","thongtinsanphamdemo");
	$tim = "SELECT * FROM infor WHERE like_sp = 1";
    $truyvan = mysqli_query($con,$tim);
	while ($data = mysqli_fetch_array($truyvan)) {
		if($ten == $data['name']){
			$solike++;
		}
	}

    
    $sodislike = 0;
	$ten1 = $_SESSION["name"]."fake";
	$tim1 = "SELECT * FROM infor WHERE dislike_sp = 1";
    $truyvan1 = mysqli_query($con,$tim1);
	while ($data1 = mysqli_fetch_array($truyvan1)) {
		if($ten1 == $data1['name']){
			$sodislike++;
		}
	}*/
    

      include( $_SESSION['img']);
      $anh = $_SESSION['img'];
      $biengetusername = $_SESSION['username'].'fake';
      if(isset($_SESSION['avatar'])){
      if(isset($_POST['thich'])){
      	$name = $_SESSION["name"]."fake";
      	$conn = mysqli_connect("localhost", "root", "","thongtinsanphamdemo");
      	$xoa = "DELETE FROM infor WHERE username_cm = '$biengetusername'";
      	mysqli_query($conn, $xoa);
      	$tim = "SELECT * FROM infor WHERE username_cm = '$biengetusername'";
      	$truycap = mysqli_query($conn,$tim);
      	$num = mysqli_num_rows($truycap);
		if($num == 0){
			$sql = "INSERT INTO infor (name,img,like_sp,username_cm) VALUES ('$name','$anh',1,'$biengetusername')";
            mysqli_query($conn, $sql);   
		}
        
      }

      
  }else{
  	echo "<script>";
  	echo "alert('hãy đăng nhập')";
  	echo "</script>";
  }



    if(isset($_SESSION['avatar'])){
      if(isset($_POST['khongthich'])){
      	$name1 = $_SESSION["name"]."fake";
      	$conn1 = mysqli_connect("localhost", "root", "","thongtinsanphamdemo");

      	$xoa1 = "DELETE FROM infor WHERE username_cm = '$biengetusername'";
      	mysqli_query($conn1, $xoa1);

      	$tim1 = "SELECT * FROM infor WHERE username_cm = '$biengetusername'";
      	$truycap1 = mysqli_query($conn1,$tim1);
      	$num1 = mysqli_num_rows($truycap1);
		if($num1 == 0){
			$sql1 = "INSERT INTO infor (name,dislike_sp,username_cm) VALUES ('$name1',1,'$biengetusername')";
            mysqli_query($conn1, $sql1);
		}
	
      }

  }else{
  	echo "<script>";
  	echo "alert('hãy đăng nhập')";
  	echo "</script>";
  }




    $solike = 0;
	$ten = $_SESSION["name"]."fake";
    $con = mysqli_connect("localhost", "root", "","thongtinsanphamdemo");
	$tim = "SELECT * FROM infor WHERE like_sp = 1";
    $truyvan = mysqli_query($con,$tim);
	while ($data = mysqli_fetch_array($truyvan)) {
		if($ten == $data['name']){
			$solike++;
		}
	}

    
    $sodislike = 0;
	$ten1 = $_SESSION["name"]."fake";
	$tim1 = "SELECT * FROM infor WHERE dislike_sp = 1";
    $truyvan1 = mysqli_query($con,$tim1);
	while ($data1 = mysqli_fetch_array($truyvan1)) {
		if($ten1 == $data1['name']){
			$sodislike++;
		}
	}

    
    
     /* $ketnoi = mysqli_connect("localhost","root","","thongtinkhachhang");
      if(isset($_POST['ok'])){
      	if(empty($_POST['txtname']) or empty($_POST['txtmess'])){
	    		echo '<p style = "color:red">Vui lòng nhập Comment</p>';
	    }else{
	    	$txtname = $_POST['txtname'];
	    	$txtmess = $_POST['txtmess'];

	    	$ava = "SELECT * FROM quanlythongtin";
	    	$j_query = mysqli_query($ketnoi,$ava);
	    	while ($data = mysqli_fetch_array($j_query)){
            if($txtname == $data['username']){
            	$avatar_cm = $data['avatar'];
            }
          }



	    	$chon = "SELECT * FROM quanlythongtin WHERE username = '$txtname'";
	    	$jquery = mysqli_query($ketnoi,$chon);
	    	$num = mysqli_num_rows($jquery);
	    	if($num == 0){
	    		echo '<p style = "color:red">Tài Khoản sai</p>';
	    	}else{
	    		$themvaoinfor = "INSERT INTO infor(name,comment,username_cm,time_cm,avatar_cm) VALUES ('$ten1','$txtmess','$txtname',now(),'$avatar_cm')";
	    		$them = mysqli_query($con,$themvaoinfor);
	    		if($them){
	    		   echo '<p style = "color:green">Bình luận thành công</p>';


	            }
	    	}
	    	

	    }

      }   */








$ketnoi = mysqli_connect("localhost","root","","thongtinkhachhang");
      if(isset($_POST['ok'])){
      	if(empty($_POST['txtmess'])){
	    		echo '<p style = "color:red">Vui lòng nhập Comment</p>';
	    }else{
	    	$txtmess = $_POST['txtmess'];
	    	$bienusername = $_SESSION['username'];

	    	$ava = "SELECT * FROM quanlythongtin";
	    	$j_query = mysqli_query($ketnoi,$ava);
	    	while ($data = mysqli_fetch_array($j_query)){
            if($bienusername == $data['username']){
            	$avatar_cm = $data['avatar'];
            	$themvaoinfor = "INSERT INTO infor(name,comment,username_cm,time_cm,avatar_cm) VALUES ('$ten1','$txtmess','$bienusername',now(),'$avatar_cm')";
	    		$them = mysqli_query($con,$themvaoinfor);
	    		if($them){
	    		   echo '<p style = "color:green">Bình luận thành công</p>';
	            }
            }
          }



	    	/*$chon = "SELECT * FROM quanlythongtin WHERE username = '$txtname'";
	    	$jquery = mysqli_query($ketnoi,$chon);
	    	$num = mysqli_num_rows($jquery);
	    	if($num == 0){
	    		echo '<p style = "color:red">Tài Khoản sai</p>';
	    	}else{
	    		
	    	}*/
	    	

	    }

      }   

?>

<!DOCTYPE html>
<html>
<head>

	<title></title>
	
</head>
<body>
  

    <form  method="POST">
    	<table>
    	<tr>
    	<td><button type="submit" name = "thich" >LIKE</button><td>
    	<td><?php echo $solike; ?></td>
    	</tr>

    	<tr>
	    <td><button type="submit" name = "khongthich">DISLIKE</button><td>
	    <td><?php echo $sodislike; ?></td>
	    </tr>
	    </table>
    </form>
	
	<fieldset>
		
		<legend>Comment</legend>
		<form  method="POST">
			
			<table>
				<!--<tr>
					<td>Name</td>
					<td><input type="text" name="txtname" size="25" value=""></td>
				</tr>-->
				<tr>
					<td>Mess</td>
					<td><textarea cols="60" rows="5" name="txtmess"></textarea></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="ok" value="submit"></td>
				</tr>
			</table>
		</form>
	</fieldset>

    
    <h1>Ý kiến bình luận</h1>
</body>
<?php 
	     $chonbinhluan = "SELECT * FROM infor WHERE comment !=''";
         $querybinhluan = mysqli_query($con,$chonbinhluan);
	     while ($dulieu = mysqli_fetch_array($querybinhluan)){
		    if($ten1 == $dulieu['name']){
		    	$bienbinhluan = $dulieu['comment'];
		    	$bientencommet = $dulieu['username_cm'];
		    	$thoigian = $dulieu['time_cm'];
		    	$avatarcm = $dulieu['avatar_cm'];
		    		include ("$avatarcm");
		    		echo "<p><b style='color:blue'>$bientencommet</b> &nbsp <i>$thoigian</i></p>";
		    	    echo "<p>$bienbinhluan</p>";
		    	    echo "<br>";
		    	    echo "<br>";
		    	    echo "<br>";
		    	
		}
	}
	
    ?>

</html>