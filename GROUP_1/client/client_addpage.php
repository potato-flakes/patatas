<?php
include_once './include/client_dbcon.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP PROJECT - Add User Data</title>
	<link rel="icon" type="image/gif" href="images/client_logo.png">
	<link rel="stylesheet" type="text/css" href="client_style.css">
	<meta charset=:"UTF_8">
</head>
<body>

	<a href='#'>Create</a>
	<a href='client_searchpage.php'>Search</a>
	<br> <br>
		<form action="add.php" method="post">
			<input type="hidden" uname="id">
			&nbsp;uname: <input type="text" uname="uname" required placeholder="uname"><br><br>
			pword: <input type="text" uname="pword" required placeholder="pword"><br><br><br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" uname="insert" value="   Save  "><br><br><br>
		</form>
<br>
<?php
	$pdoQuery = 'SELECT * FROM clienttb';
	$pdoResult = $pdoConnect->prepare($pdoQuery);
	$pdoResult->execute();
		echo "<table border='2' cellpadding='7'>";
		echo "<tr>";
		echo "<th>id</th>";
		echo "<th>uname</th>";
		echo "<th>pword</th>";
		echo "<th>Action</th>";
		echo "</tr>";
	while($row=$pdoResult->fetch(PDO::FETCH_ASSOC)) {
		extract($row);
		echo "<tr>";
		echo "<td>$id</td>";
		echo "<td>$uname</td>";
		echo "<td>$pword</td>";
		echo "<td><a href='client_edit.php?id=$id';>Edit</a> <a href='client_del.php?id=$id';?>Delete</a></td>";
		echo "</tr>";

	}
?>
	</body>
</html>