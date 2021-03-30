<?php 
  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "Firstly, You need to login!";
  	header('location: signIn.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: signIn.php");
  }
?>