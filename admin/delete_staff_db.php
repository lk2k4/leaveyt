<?PHP
	$staff_id = $_GET['staff_id'];
	$connection = @mysqli_connect("localhost", "root", "");
	$sql1 = "DELETE FROM leavesystemphp.staff WHERE staff_id = '".$staff_id."'";
	$sql2 = "DELETE FROM leavesystemphp.login WHERE user_id = '".$staff_id."'";
	$sql3 = "DELETE FROM leavesystemphp.leave_requests WHERE staff_id = '".$staff_id."'";
	$sql4 = "DELETE FROM leavesystemphp.leave_statistics WHERE staff_id = '".$staff_id."'";
	echo 	"<script>
				alert(\"Do you really want to delete Staff ID = ".$staff_id."\");
			</script>";
	mysqli_query($connection,$sql1);
	mysqli_query( $connection,$sql2);
	mysqli_query( $connection,$sql3);
	mysqli_query( $connection,$sql4);
	echo 	"<script>
				alert(\"Staff Deleted.\");
			</script>";
	echo "<script>window.location=\"search_staff_for_deletion.php\";</script>";
	//header ("Location: delete_staff.php"); 
	mysqli_close($connection);

?> 