<?PHP
	// Retrieving values from textboxes
	session_start();
	$staff_id = $_SESSION['staff_id'];
	$first_name = $_POST['first_name'];
	$middle_name = $_POST['middle_name'];
	$last_name = $_POST['last_name'];
	$password = $_POST['password'];
	$user_type = "Staff";
	
	// Initializing the values, following DRY (Don't Repeat Yourself) Approach
	/*$dsn_name = "leavesystemphp";
	$db_user = "root";
	$db_pass = "";*/
	
	// Obtaining connection using DSN and ODBC
	$connection = @mysqli_connect("localhost", "root", "");
	
	// Sql query
	$sql1 = "UPDATE leavesystemphp.staff SET first_name = '$first_name', middle_name = '$middle_name', last_name = '$last_name' WHERE staff_id = '$staff_id'";
	$sql2 = "UPDATE leavesystemphp.login SET password = '$password', user_type = '$user_type' WHERE user_id = '$staff_id'"; 
	
	
	// Firing query
	mysqli_query( $connection,$sql1);
	mysqli_query( $connection,$sql2);
	/*$affected_rows = odbc_affected_rows($result);	// Obtaining the number of rows affected
	echo $affected_rows;	*/						// Printing nuber of rows affected
	
	
	echo 	"<script>
					alert(\"Staff Updated Successfully.\");
				</script>";
	header("Location: search_staff_for_updation.php");
	// Closing Connection
	mysqli_close($connection);
	
	
?>