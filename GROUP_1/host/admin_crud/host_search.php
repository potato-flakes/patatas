<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/gif" href="../images/host_logo.png">
	<title>PHP PROJECT - Host-Search</title>
	<link rel="stylesheet" type="text/css" href='../host_style.css'>
</head>
<body>
<div id="host_search_table">
	<form action="host_search.php" method="post">
		<div id="button_edit">
			Search: &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="Id" placeholder="Enter Data Here" required>
			<input type="submit" name="Find" value="Search">
			<input class="back_button" type="button" onclick="location.href='host_addpage.php';" value="Go Back" />
		</div>
		
	</form>
<?php


$id = "";
$uname = "";
$pword = "";
$fullname = "";

if(isset($_POST['Find']))

{

// connect to mysql

try {

$pdoConnect = new PDO("mysql:host=localhost; dbname=database","root",""); 
} catch (PDOException $exc) {

echo $exc->getMessage(); 
exit();

}

// id to search

$id = $_POST['Id'];

// mysql search query

$pdoQuery = "SELECT * FROM admintb WHERE id = :id";

$pdoResult = $pdoConnect->prepare($pdoQuery);

//set your id to the query id

$pdoExec = $pdoResult->execute(array(":id"=>$id));

if($pdoExec)

// if id exist
{

if($pdoResult->rowCount()>0)

{ 
echo "<table cellpadding='7'>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Name</th>";
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
echo "<td><a href='host_edit.php?id=$id';>Edit</a> <a href='host_del.php?id=$id';?>Delete</a></td>"; 
echo "</tr>";
}
} else {
echo 'No Data';

}

}

}

$pdoConnect = null;

?>
</div>
</body>
</html>