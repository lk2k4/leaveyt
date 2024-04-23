<?PHP
	// Retrieving values from textboxes
	session_start();
	$staff_id = $_GET['staff_id'];
	
	// Initializing the values, following DRY (Don't Repeat Yourself) Approach
	/*$dsn_name = "leavesystemphp";
	$db_user = "root";
	$db_pass = "";*/
	
	// Obtaining connection using DSN and ODBC
	$connection = @mysqli_connect("localhost", "root", "");
	
	// Sql query
	$sql1 = "SELECT user_id FROM leavesystemphp.login WHERE user_type = 'PC'";
	$sql2 = "UPDATE leavesystemphp.login SET user_type = 'PC' WHERE user_id = '".$staff_id."'";
	
	
	// Firing query
	$result = mysqli_query($connection,$sql1);
	while($row = mysqli_fetch_array($result))
	{
		$previous_pc = $row['user_id'];
	}
	$sql3 = "UPDATE leavesystemphp.login SET user_type = 'Staff' WHERE user_id = '".$previous_pc."'";
	mysqli_query( $connection,$sql3);
	mysqli_query( $connection,$sql2);
	/*$affected_rows = odbc_affected_rows($result);	// Obtaining the number of rows affected
	echo $affected_rows;	*/						// Printing nuber of rows affected
	
	
	echo 	"<script>
					alert(\"Program Coordinator Assigned Successfully.\");
				window.location=\"search_staff_to_assign_pc.php\";</script>";
	// Closing Connection
	mysqli_close($connection);
	
	
?>