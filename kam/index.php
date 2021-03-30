<?php require_once 'function.php'; ?>
<?php require_once 'header.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="loginImg text-center mt-3"><img src="img/login.png" width="100px" height="100px"></div>
			<h5 class="text-center text-primary mt-3">Login Page</h5>
			<?php if(isset($error)): ?>
				<div class="alert alert-danger">
					<?= $error;  ?>
				</div>
			<?php endif; ?>
			<form method="get" id="login_validation">
				<div class="form-group">
				    <label for="username">Username</label>
				    <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
				</div>
				<div class="form-group">
				    <label for="password">Password</label>
				    <input type="password" class="form-control" id="password" name="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
				</div>
				<button type="submit" class="btn btn-primary" name="login">Login</button>
				
				<!--<input type="text" name="username" placeholder="Enter username"><br>
				<input type="password" name="password" placeholder="Enter password"><br>
				<input type="submit" value="Login" name="login"> --> 
			</form>

			<p class="mt-3 text-center">You don't have account register here? <a href="signup.php" class="btn btn-outline-primary signup">SignUp</a></p>
		</div>
		<div class="col-md-3"></div>
	</div>
</div>

<?php require_once 'footer.php'; ?>
	