<?php 

	session_start();
	$auth = isset($_SESSION['auth']);
	
	// echo "<a href='logout.php'>Logout</a>";

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
</head>
<body>

	<div class="wrapper">
		<?php if($auth) { ?>

		<?php
		include_once('config.php');
		
		$con = config::connect();

		$results = fetchRecords($con);

		function fetchRecords($con)
		{
			$query = $con->prepare("SELECT * FROM users");

			$query->execute();

			return $query->fetchAll();
		}

		?>

			<table>
				<tr>
					<th>Id</th>
					<th>Username</th>
					<th>Email</th>
					<th>Update</th>
					<th>Delete</th>
				</tr>
					<?php
					$id = 1;
					foreach($results as $user): 
					?>
				<tr>
					<td><?= $user['userId']?></td>
					<td><?= $user['username']?></td>
					<td><?= $user['email']?></td>
					<td><a href="update.php?id=<?= $user['userId']?>">Update</a></td>
					<td><a href="delete.php?id=<?= $user['userId']?>">Delete</a></td>
				</tr>
					<?php 
						endforeach;
						$i++;
					 ?>
			</table>

		<?php  } else {  ?>
			<form action="function.php" method="get">
				<input type="text" name="username" placeholder="Enter username"><br>
				<input type="password" name="password" placeholder="Enter password"><br>
				<input type="submit" value="Login" name="login"> 
			</form>

			<p>Not yet a member? <a href="signup.php">SignUp</a></p>
		<?php } ?>
	</div>

</body>
</html>