<?php
	// Retrieving values from textboxes
	
	$name= $_POST['name'];
	
	/*$first_name = $_POST['first_name'];
	$middle_name = $_POST['middle_name'];
	$last_name = $_POST['last_name'];
	$email_id = $_POST['email_id'];
	$password = $_POST['password'];
	$user_type = "Staff";*/
	
	// Obtaining connection
	$connection = @mysqli_connect("localhost", "root", "");
	
	
	// Sql query
	$sql1 = "SELECT * FROM leavesystemphp.staff WHERE first_name LIKE '%$name%' OR middle_name LIKE '%$name%' OR last_name LIKE '%$name%'" ;
	//$sql2 = "SELECT COUNT(*) FROM leavesystemphp.staff WHERE first_name LIKE '%$name%' OR middle_name LIKE '%$name%' OR last_name LIKE '%$name%'" ;
	//$sql2 = "SELECT password FROM login WHERE name = '$staff_id'"; 
	
	
	// Firing query
	$result1 = mysqli_query( $connection,$sql1);
	//$result2 = mysql_query($sql2, $connection);
	//$result2 = odbc_exec($connection, $sql2);
	
	if(mysqli_num_rows($result1)==0)
	{
		echo 	"<script>
				alert(\"Search results not found !\");
				window.location=\"search_staff_for_deletion.php\";</script>";
	}
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
  <?php $page = 'delete_staff'; include 'sidebar.php'?>
  <div id="content_panel">
    <div id="heading">Search Result
      <hr size="2" color="#FFFFFF" ice:repeating=""/>
    </div>
    <div id="table">
    	 <?PHP
			echo "<span><table border=\"1\" bgcolor=\"#006699\" >
				<tr>
					<th width=\"200px\">Staff ID</th>
					<th width=\"100px\">First Name</th>
					<th width=\"110px\">Middle Name</th>
					<th width=\"100px\">Last Name</th>
					<th width=\"100px\">Password</th>
					<th width=\"100px\">Delete</th>
				</tr>
			</table></span>";
			while($row1 = mysqli_fetch_array($result1))
			{
				$staff_id = $row1['staff_id'];
				$first_name = $row1['first_name'];
				$middle_name = $row1['middle_name'];
				$last_name = $row1['last_name'];
				
				$sql3 = "SELECT password FROM leavesystemphp.login WHERE user_id = '".$staff_id."'";
				$result2 = mysqli_query( $connection,$sql3);
				if($row2 = mysqli_fetch_array($result2))
				{
					$password = $row2['password'];
				}
				echo "<table border=\"1\">
						<tr>
							<td width=\"200px\">".$staff_id."</td>
							<td width=\"100px\">".$first_name."</td>
							<td width=\"110px\">".$middle_name."</td>
							<td width=\"100px\">".$last_name."</td>
							<td width=\"100px\">".$password."</td>
							<td width=\"100px\"><a href='delete_staff_db.php?staff_id=".$staff_id."'\><img src=\"../images/trash.gif\" />Delete</a></td>
						</tr>
					</table>";
			}
			
		mysqli_close($connection);
	?>
    </div>
  </div>
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
