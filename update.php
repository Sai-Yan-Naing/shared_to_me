<?php 

	session_start();

	include_once("config.php");
	
	require_once 'function.php';

	require_once 'header.php';

	require_once 'footer.php';

	$username = $_SESSION['username'];

 ?>

 <div class="container">
 	<div class="row">
 		<div class="col-md-3"></div>
 		<div class="col-md-6">
 			<div class="text-center mt-3"><img src="img/signup.png" width="100px" height="100px"></div>
			<h5 class="text-center text-primary mt-3">Update</h5>
			<form method="post" id="update_validation">
				<div class="form-group">
				    <label for="username">Username</label>
				    <input type="text" class="form-control" id="username" name="username2" placeholder="Enter Username">
				</div>
				<div class="form-group">
				    <label for="email">Email</label>
				    <input type="text" class="form-control" id="email" name="email2" placeholder="Enter Email">
				</div>
				<div class="form-group">
				    <label for="password">Password</label>
				    <input type="password" class="form-control" id="password" name="password2" placeholder="Enter Password">
				</div>
				<button type="submit" class="btn btn-primary" name="update">Update</button>
				<a href="home.php" class="btn btn-info cancel-btn">Cancel</a>
 			</div>
 		<div class="col-md-3"></div>
 	</div>
 </div>