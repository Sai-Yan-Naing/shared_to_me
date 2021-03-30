<?php 

	session_start();

	include_once("config.php");

	if(isset($_POST['signup']))
	{
		$con = config::connect();
		$username = sanitizeString($_POST['username']);
		$email = sanitizeString($_POST['email']);
		$password = sanitizePassword($_POST['password']);

		if($username == "" || $email == "" || $password == "")
		{
			return;
		}

		if(!checkUserExists($con,$username))
		{
			$errExitUser = "Username is already exist ";
			return;
			header("Location: signup.php");
		}

		if(!checkEmailExists($con,$email))
		{
			$errExitEmail = "Email is already exist ";
			return;
			header("Location: signup.php");
		}

		if(insert($con,$username,$email,$password));
		{
			$_SESSION['username'] = $username;
			header("Location: home.php");
		}
	}


	if(isset($_GET['login']))
	{
		$con = config::connect();
		$username = sanitizeString($_GET['username']);
		$password = sanitizePassword($_GET['password']);

		if($username == "" || $password == "")
		{
			return;
		}

		if(checkLogin($con,$username,$password))
		{
			$_SESSION['username'] = $username;
			$_SESSION['auth'] = true;
			header("Location: home.php");
		}
		else
		{
			$error = "Username or password are incorrect";
			return true;
			header("Location: index.php");
		}
	}
 
	if(isset($_POST['update']))
	{
		$con = config::connect();
		$username = sanitizeString($_POST['username']);
		$email = sanitizeString($_POST['email']);
		$password = sanitizePassword($_POST['password']);

		if($username == "" || $email == "" || $password == "")
		{
			return;
		}

		if(!checkUserExists($con,$username))
		{
			echo "Username is already exist ";
			echo "<a href='signup.php'>Signup</a>";
			return;
		}

		if(!checkEmailExists($con,$email))
		{
			echo "Email is already exist ";
			echo "<a href='signup.php'>Signup</a>";
			return;
		}

		$currentUsername = $_SESSION['username'];

		$query = $con->prepare("SELECT * FROM users WHRE username=:username");

		$query->bindParam(":username",$currentUsername);

		$query->execute();

		$result = $query->fetch(PDO::FETCH_ASSOC);

		$id = $result['userId'];

		if(update($con,$id,$username,$email,$password));
		{
			alert("hello");
			$_SESSION['username'] = $username;
			header("Location: home.php");
		}
	}

	function insert($con,$username,$email,$password)
	{
		$query = $con->prepare("INSERT INTO users (username,email,password) VALUES(:username,:email,:password)");
		$query->bindParam(":username",$username);
		$query->bindParam(":email",$email);
		$query->bindParam(":password",$password);

		return $query->execute();
	}


	function checkLogin($con,$username,$password)
	{
		$query = $con->prepare("SELECT * FROM users WHERE username=:username AND password=:password");

		$query->bindParam(":username",$username);
		$query->bindParam(":password",$password);

		$query->execute();

		//check how many rows are returned

		if($query->rowCount() == 1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function sanitizeString($string)
	{
		$string = strip_tags($string);

		$string = str_replace(" ","",$string);

		return $string;
	}

	function sanitizePassword($string)
	{
		$string = md5($string);
		return $string;
	}

	function update($con,$id,$username,$email,$password)
	{
		$query = $con->prepare("UPDATE users SET username=:username,email=:email,password=:password WHERE id=:userId");

		$query->bindParam(":username",$username);
		$query->bindParam(":email",$email);
		$query->bindParam(":password",$password);
		$query->bindParam(":userId",$id);

		return $query->execute();
	}

	function checkUserExists($con,$username)
	{
		$query = $con->prepare("SELECT * FROM users WHERE username=:username");

		$query->bindParam(":username",$username);

		$query->execute();

		// check

		if($query->rowCount() == 1)
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	function checkEmailExists($con,$email)
	{
		$query = $con->prepare("SELECT * FROM users WHERE email=:email");

		$query->bindParam(":email",$email);

		$query->execute();

		// check

		if($query->rowCount() == 1)
		{
			return false;
		}
		else
		{
			return true;
		}
	}



 ?>