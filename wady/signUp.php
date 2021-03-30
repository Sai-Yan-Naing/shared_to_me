<?php include('model/crudModel.php') ?>
<!DOCTYPE html>
  <html>
    <head>
		<title> CRUD </title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
      <div class="header"> <h2> Sign Up </h2> </div>
	    <form method="post" action="signUp.php">
  	    	<?php include('error.php'); ?>

			<div class="input-group">
				<label> Username </label>
				<div <?php if (isset($name_error)): ?> class="form-error" <?php endif ?> >
				<input type="text" name="username" value="<?php echo $username; ?>">
				<?php if (isset($name_error)): ?> <span><?php echo $name_error; ?></span> <?php endif ?>
			</div>

			<div class="input-group">
				<label> Email </label>
				<div <?php if (isset($email_error)): ?> class="form-error" <?php endif ?> >
				<input type="email" name="email" value="<?php echo $email; ?>">
				<?php if (isset($email_error)): ?><span><?php echo $email_error; ?></span> <?php endif ?>
			</div>

			<div class="input-group">
				<label> Password </label>
				<input type="password" name="password" required="required">
			</div>

			<div class="input-group">
				<label>Confirm password</label>
				<input type="password" name="confirm_password" required="required">
			</div>

			<div class="input-group">
			<button type="submit" class="btn" name="reg_user">Register</button>
			</div>
  	    	<p> Already Register? <a href="signIn.php"> Login </a> </p>
      </form>
    </body>
  </html>

