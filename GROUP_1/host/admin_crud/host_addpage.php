<?php
include_once 'C:\xampp\htdocs\GROUP_1\host\admin_include\host_dbcon.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP PROJECT - Host-Dashboard</title>
	<link rel="stylesheet" type="text/css" href='../host_style.css'>
	<link rel="icon" type="image/gif" href="../images/host_logo.png">
	<meta charset=:"UTF_8">
</head>
<body>
	<div id="admin_dashboard">
		<div id="align">
<br><br><br>
<a href="host_addpage.php">Add Admin</a><br>
<a href="user_addpage.php">Add User</a>
<a href="../host_logout.php">Log Out</a>

		<form action="host_add.php" method="post">
			<input type="hidden" name="id">
			&nbsp;
			<br>
			<div id="button_edit">
			Username: <input type="text" name="uname" required placeholder="Enter Username"><br><br>
			Password: <input type="Password" name="pword" required placeholder="Enter Password"><br><br>
			Fullname: <input type="text" name="fullname" required placeholder="Enter Fullname"><br><br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="insert_to_host" value="   Save  "><br><br><br>
			</div>
		</form>
<br>
</div>
</div>
<div id="admin_dashboard_table">
	<form action="host_search.php" method="post">
		<div id="button_edit">
			Search: &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="Id" placeholder="Enter Data Here" required>
			<input type="submit" name="Find" value="Search"><br>
		</div>
</form>
<?php
	$pdoQuery = 'SELECT * FROM admintb';
	$pdoResult = $pdoConnect->prepare($pdoQuery);
	$pdoResult->execute();
		echo "<table cellpadding='5'>";
		echo "<tr>";
		echo "<th>ID</th>";
		echo "<th>User-Name</th>";
		echo "<th>Password</th>";
		echo "<th>Fullname</th>";
		echo "<th>Action</th>";
		echo "</tr>";
	while($row=$pdoResult->fetch(PDO::FETCH_ASSOC)) {
		extract($row);
		echo "<tr>";
		echo "<td>$id</td>";
		echo "<td>$uname</td>";
		echo "<td>$pword</td>";
		echo "<td>$fullname</td>";
		echo "<td><a class = 'table_button' href='host_edit.php?id=$id';>Edit</a> <a class = 'table_button' href='host_del.php?id=$id';?>Delete</a></td>";
		echo "</tr>";


	}
?>
</div>
</div>
	</body>
</html>