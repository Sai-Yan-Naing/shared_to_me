<?php include('controller/dbcontroller.php')?>
<?php include('model/crudModel.php')?>
<?php include('session.php')?>
<?php 
  $db_handle = new DBController();
  if (isset($_POST['search'])){
    $queryCondition = " WHERE CONCAT(id, username, email, password) LIKE '%".$_POST["value"]."%'" ;
  }else{
    $queryCondition = "";
  }
  $sql = "SELECT * FROM users" . $queryCondition;
  $href = 'home.php';   
  $result = $db_handle->runQuery($sql); 
?>

<!DOCTYPE html>
  <html>
    <head>
	    <title> CRUD </title>
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script type="text/javascript" src="js/fontawesome.js"></script>
      <script type="text/javascript" src="js/jquery.min.js"></script>
    </head>
    <body>
      <form class="index-form" method="post" action="home.php" name="frmSearch">
        <?php  if (isset($_SESSION['email'])) : ?>
        <table style="width: 125%">
          <tr>
            <td style="color: black;"> Username : <?php echo $_SESSION['username']; ?> </td>
            <td><button style="background-color: pink; color: white; width: 100px; height: 30px;"><a href="addNew.php" >Add New</a></button></td>
            <td><button style="background-color: pink; color: white; width: 100px; height: 30px;"><a href="home.php?logout='1'">Logout</a></button></td>
          </tr>
        </table>
        <br><br>
        <?php endif ?>
        <label> Search </label><input type="text" name="value" placeholder="Search" >
        <button type="submit" name="search" class="btnSearch"><i class="fa fa-search"></i></button> <input type="reset"  value="Reset" onclick="window.location='home.php'"><br><br>

        <table class="index-table">
          <thead>
            <tr class="index-tr">
            <td class="index-th">ID  </td>
            <td class="index-th">User Name</td>
            <td class="index-th">Email</td>
            <td class="index-th" colspan="2">Action</td>
            </tr>
          </thead>
          <tbody>        
          <?php if(!empty($result)) {
            foreach($result as $k=>$v) {
              if(is_numeric($k)) { ?>
                <tr class="index-tr">
                  <td class="index-td" style="text-align: right;"> <?php echo $result[$k]["id"]; ?> </td>
                  <td class="index-td"> <?php echo $result[$k]["username"]; ?> </td>
                  <td class="index-td"> <?php echo $result[$k]["email"]; ?> </td>
                  <td class="index-td"> <a href="edit.php?edit_id=<?php echo $result[$k]["id"]; ?>" onclick="editFunction()"> Edit </a> </td>
                  <td class="index-td"> <a href="home.php?del_id=<?php echo $result[$k]["id"]; ?>" onclick="deleteFunction()"> Delete </a> </td>
                </tr>
                <?php }
                }
              } ?>
          </tbody>
        </table>
      </form>
      <script type="text/javascript">
        function deleteFunction() {
          return confirm("Are you sure you want to delete!");
        }
      </script>
    </body>
</html>


  