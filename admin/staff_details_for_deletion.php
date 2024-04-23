<?PHP
	// Retrieving values from textboxes
	
	$staff_id = $_POST['staff_id'];
	
	/*$first_name = $_POST['first_name'];
	$middle_name = $_POST['middle_name'];
	$last_name = $_POST['last_name'];
	$email_id = $_POST['email_id'];
	$password = $_POST['password'];
	$user_type = "Staff";*/
	
	// Initializing the values, following DRY (Don't Repeat Yourself) Approach

	
	// Obtaining connection using DSN and ODBC
	$connection = @mysqli_connect("localhost", "root", "");
	
	// Sql query
	$sql1 = "SELECT * FROM staff WHERE staff_id = '$staff_id'";
	$sql2 = "SELECT password FROM login WHERE user_id = '$staff_id'"; 
	
	
	// Firing query
	$result1 = mysqli_query($connection, $sql1);
	$result2 = mysqli_query($connection, $sql2);
	/*$affected_rows = odbc_affected_rows($result);	// Obtaining the number of rows affected
	echo $affected_rows;	*/						// Printing nuber of rows affected
	if(!mysqli_query($connection,$sql1)||mysqli_num_rows($result1,MYSQLI_NUM)){
		while($row1 = mysqli_fetch_array(mysqli_query($connection,$sql1)))
		{
			$first_name = $row1['first_name'];
			$middle_name = $row1['middle_name'];
			$last_name = $row1['last_name'];
		}
		while($row2 = mysqli_fetch_array($result2))
		{
			$password =  $row2['password'];
		}
	}
	else
	{
		echo 	"<script>
				alert(\"Staff ID ".$staff_id." does not exist !\");
				window.location=\"search_staff_for_deletion.php\";</script>";
	}
	
	// Closing Connection
	mysqli_close($connection);
	
?>
<?php
	session_start();
	if($_SESSION['sid'] == session_id() && $_SESSION['user'] == "admin")
	{
		?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update Staff</title>
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url(../images/bg.gif);
}
</style>
<link href="../style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
	$document.ready(function(staff_id)
	{
		alert(staff_id);
	})
</script>
</head>

<body>
<div id="container">
  <div id="header">
    <div id="title">Leave Management System</div>
    <div id="quick_links">
   	  <ul>
        	<li><a class="home" href="index.php">Home</a></li>
            <li>|</li>
          
        <li><a class="logout" href="../logout.php">Logout</a></li>
         <li>|</li>
        <li><a class="greeting" href="#">Hi <?php echo $_SESSION['user']; ?></a></li>
      </ul>
    </div>
  </div>
  <div id="content_panel">
    <div id="heading">Update Staff<hr size="2" color="#FFFFFF" ice:repeating=""/></div>
    <form action="delete_staff_db_by_id.php" method="get">
     <p>
        <label for="staff_id" ><span>Staff ID </span><span class="db_data"> <?php echo $staff_id; $_SESSION['staff_id'] = $staff_id;?></span></label>
      </p>
        <label for="full_name" ><span>Name </span> 
          <span class="db_data"><?php echo $first_name ." ". $middle_name ." ". $last_name ?></span>
        </label>
        <label for="password" ><span>Password </span>
         <span class="db_data"> <?php echo $password ?></span>
        </label>
      <label>
          <input type="Submit" value="Delete Staff"/>
        </label>
    </form>
  </div>
  <?php $page = 'delete_staff'; include 'sidebar.php'?>
  <div id="footer">
  	<p><br />&copy; J!N <?php echo date("Y"); ?> Leave Management System</p>
  </div>
</div>
</body>
</html>
<?php
	}
	else
	{
		header("Location: ../index.php");
	}
?>
