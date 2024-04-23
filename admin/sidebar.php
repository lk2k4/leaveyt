<div id="side_bar">
  	<ul>
    	<li class="menu_head">Control Panel</li>
        <li class="<?php if ($page == "add_staff") { echo 'activec';}?>"><a href="add_staff.php">Add Staff</a></li>
        <li class="<?php if ($page == "view_staff") { echo 'activec';}?>"><a href="view_staff.php">View Staff</a></li>
        <li class="<?php if ($page == "view_leave") { echo 'activec';}?>"><a href="view_leave.php">View leave</a></li>
    	<li class="<?php if ($page == "add_leave") { echo 'activec';}?>"><a href="add_leave.php">Add Leave Type</a></li>
        <li class="<?php if ($page == "delete_leave") { echo 'activec';}?>"><a href="delete_leave_type.php">Delete Leave Type</a></li>
        <li class="<?php if ($page == "program_coordinator") { echo 'activec';}?>"><a href="search_staff_to_assign_pc.php">Program Coordinator</a></li>
    </ul>
  </div>