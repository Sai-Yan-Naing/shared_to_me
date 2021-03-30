<?php 

	session_start();

	include_once('config.php');
	
	require_once 'header.php';

	require_once 'footer.php';

	$username = $_SESSION['username'];

	$con = config::connect();

	$results = fetchRecords($con);


	function fetchRecords($con)
	{
		$query = $con->prepare("SELECT * FROM users");

		$query->execute();

		return $query->fetchAll();
	}

 ?>


<div class="container">
	<p class="mt-3">
	 	<?php echo "Welcome " ."<span class='text-success font-weight-bold'>".$username."</span>" ?>
	 	<?php echo "<a href='logout.php' class='btn btn-outline-primary'>Logout</a>"; ?>
	</p>
	<table class="table table-success">
		<tr>
			<th>Id</th>
			<th>Username</th>
			<th>Email</th>
			<!-- <th>Update</th> -->
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
			<!-- <td><a href="update.php?id=<?= $user['userId']?>">Update</a></td> -->
			<td><a href="delete.php?id=<?= $user['userId']?>">Delete</a></td>
		</tr>
			<?php 
				endforeach;
				$i++;
			 ?>
	</table>
</div>