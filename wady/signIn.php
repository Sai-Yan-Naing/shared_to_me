<?php include('model/crudModel.php') ?>
<!DOCTYPE html>
  <html>
    <head>
      <title> CRUD</title>
      <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
      <div class="header"> <h2> Login </h2> </div>
      <form method="get" action="">
  	    <?php include('error.php'); ?>
  	    <div class="input-group">
  		    <label> Email </label>
  		    <input type="email" name="email" required="required">
  	    </div>
  	    <div class="input-group">
  		    <label> Password </label>
  		    <input type="password" name="password" required="required">
  	    </div>
  	    <div class="input-group">
  		    <button type="submit" class="btn" name="login_user"> Login </button>
  	    </div>
  	    <p> Not yet register? <a href="signUp.php"> Sign Up </a> </p>
      </form>
    </body>
  </html>