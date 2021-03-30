<?php
require_once("controller/dbcontroller.php");
session_start();
$username = "";
$email    = "";
$errors = array(); 

$conn = mysqli_connect('localhost', 'root', '', 'testing');

if (isset($_GET['login_user'])) {
  $email = mysqli_real_escape_string($conn, $_GET['email']);
  $password = mysqli_real_escape_string($conn, $_GET['password']);
  if (empty($email)) {
    array_push($errors, "Please fill the Email");
  }
  if (empty($password)) {
    array_push($errors, "Please fill the Password");
  }
  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $results = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($results);
    $username = $row['username'];
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['email'] = $email;
      $_SESSION['username'] = $username;
     /* $_SESSION['success'] = "Sucessfully!";*/
      header('location: home.php');
    }else {
      array_push($errors, "Email and Password are wrong!");
    }
  }
}


if (isset($_POST['reg_user'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
 if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
  if ($password != $confirm_password) { array_push($errors, "Password and Confirm Password do not match"); } 

  $sql_username = "SELECT * FROM users WHERE username='$username'";
  $sql_email = "SELECT * FROM users WHERE email='$email'";
  $res_username = mysqli_query($conn, $sql_username);
  $res_email = mysqli_query($conn, $sql_email);

    if (mysqli_num_rows($res_username) > 0) {
      $name_error = "Username already exists";  
    }if(mysqli_num_rows($res_email) > 0){
      $email_error = "Email already exists";  
    }else if (count($errors) == 0){
      $password = md5($password);
      $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
      mysqli_query($conn, $query);
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "Sucessfully!";
      header('location: signIn.php');
    }
}

  if(isset($_POST['add'])){
    $name =  mysqli_real_escape_string($conn, $_POST['name']);
    $birthday =  mysqli_real_escape_string($conn, $_POST['birthday']);
    $education =  mysqli_real_escape_string($conn, $_POST['education']);
   
    $gender =  mysqli_real_escape_string($conn, $_POST['gender']);
    $department =  mysqli_real_escape_string($conn, $_POST['department']);
    $address =  mysqli_real_escape_string($conn, $_POST['address']);
    $skills =  $_POST['skill'];
    $check="";  
    foreach($skills as $skill)  {  $check .= $skill." ";  }  
    $sql = mysqli_query($conn,"INSERT INTO add_user (name,birthday,education,it_skill,gender,department,address) 
      VALUES ('$name','$birthday','$education','$check','$gender','$department','$address')");  
      $_SESSION['email'] = $email;
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "Sucessfully!";
      header('location: home.php');
}  

  if(isset($_GET['edit_id'])){
    $edit_id = $_GET['edit_id'];
    $sql = "SELECT * FROM add_user WHERE id=$edit_id";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $birthday = $row['birthday'];
    $education = $row['education'];
    $skill = $row['it_skill'];
    $gender = $row['gender'];
    $department = $row['department'];
    $address = $row['address'];

    if(isset($_POST['update'])){
     $name =  mysqli_real_escape_string($conn, $_POST['name']);
    $birthday =  mysqli_real_escape_string($conn, $_POST['birthday']);
    $education =  mysqli_real_escape_string($conn, $_POST['education']);
   
    $gender =  mysqli_real_escape_string($conn, $_POST['gender']);
    $department =  mysqli_real_escape_string($conn, $_POST['department']);
    $address =  mysqli_real_escape_string($conn, $_POST['address']);
      $skills =  $_POST['skill'];
      $check="";  
      foreach($skills as $skill)  {  $check .= $skill." ";  }  

      $sql = "UPDATE add_user SET name='$name',birthday='$birthday', education='$education', it_skill='$check',gender='$gender',department='$department', address='$address' WHERE id=$edit_id";
      mysqli_query($conn,$sql);
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "Sucessfully!";
      header('location: home.php');                
    }
  }


  //Delete
 if(isset($_GET['del_id'])){
    $del_id = $_GET['del_id'];
    $sql = "DELETE FROM users WHERE id=$del_id";
    mysqli_query($conn,$sql);
    
    echo "<script>alert('Successfully!')</script>";
  }


?>