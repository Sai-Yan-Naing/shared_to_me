<?php require_once 'function.php'; ?>

<?php require_once 'header.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="text-center mt-3"><img src="img/signup.png" width="100px" height="100px"></div>
			<h5 class="text-center text-primary mt-3">Signup Page</h5>
			<?php if($errExitUser): ?>
				<div class="alert alert-danger">
					<?= $errExitUser; ?>
				</div>
			<?php elseif($errExitEmail): ?>
				<div class="alert alert-danger">
					<?= $errExitEmail; ?>
				</div>
			<?php endif; ?>
			<form method="post" id="signup_validation">
				<div class="form-group">
				    <label for="username">Username</label>
				    <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
				</div>
				<div class="form-group">
				    <label for="email">Email</label>
				    <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email">
				</div>
				<div class="form-group">
				    <label for="password">Password</label>
				    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
				</div>
				<button type="submit" class="btn btn-primary" name="signup">Signup</button>

				<p class="mt-3 text-center">Aleady Account here? <a href="index.php" class="btn btn-outline-primary login">Login</a></p>

				<!-- <input type="text" name="username" placeholder="Enter Username"><br>
				<input type="email" name="email" placeholder="Enter Email"><br>
				<input type="password" name="password" placeholder="Enter password"><br>
				<input type="submit" name="signup" value="SingUp"> -->
			</form>
		</div>
		<div class="col-md-3"></div>
	</div>
</div>

<?php require_once 'footer.php'; ?>
