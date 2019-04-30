<?php
    session_start();
    if(isset($_SESSION['username'])){
    	unset($_SESSION['username']);
    	header('location:dangnhap.php');
    }else{
    	
    	header('location:dangnhap.php');
    }
?>