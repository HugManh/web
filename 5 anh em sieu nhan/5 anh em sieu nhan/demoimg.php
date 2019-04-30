<?php  

$conn = mysqli_connect("localhost", "root", "","thongtinsanphamdemo");
$sql = "INSERT INTO infor (name,img,loai,like_sp,dislike_sp,gia,comment) VALUES ('ty quay tap 10','tyquay10.html','truyen',0,0,'20000','tốt')";
mysqli_query($conn,$sql);
?>
