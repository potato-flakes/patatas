<?php
include_once 'C:\xampp\htdocs\GROUP_1\host\admin_include\host_dbcon.php';

if(!empty($_POST["modify"])){
	$pdoQuery=$pdoConnect->prepare("update clienttb set uname ='" . $_POST['uname'] . "' , pword = '"  . $_POST['pword'] . "',  fullname = '" . $_POST['fullname'] . "' where id = " . $_GET["id"]);
		$pdoResult = $pdoQuery->execute();
			if($pdoResult){	
				header('location:user_addpage.php');
			}
}

	$pdoQuery = $pdoConnect->prepare("SELECT * FROM clienttb where id=" . $_GET["id"]);
	$pdoQuery->execute();
	$pdoResult = $pdoQuery->fetchAll();
	$pdoConnect = null;

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PHP PROJECT - User-Modify_Data</title>
	<link rel="icon" type="image/gif" href="../images/host_logo.png">
	<link rel="stylesheet" type="text/css" href='../host_style.css'>
</head>
<body>
	<br>
	<form action="" method="post">
		<div id="template">
			<div id="align">
				<br><br><br>
				<h2>Edit Data</h2>
				<hr>
				<br><br><br>
				<div id="button_edit">
				Username: <input type="text" name="uname" value="<?php echo $pdoResult[0]['uname']; ?>" required placeholder="Username"><br><br>
				Password:&nbsp; <input type="password" name="pword" value="<?php echo $pdoResult[0]['pword']; ?>" required placeholder="Password"><br><br>
				Fullname:&nbsp; <input type="text" name="fullname" value="<?php echo $pdoResult[0]['fullname']; ?>" required placeholder="Fullname"><br><br>
				<input type="submit" name="modify" value="     Update         ">
				<br>
				<br>
				<input class="back_button" type="button" onclick="location.href='user_addpage.php';" value="Go Back" />
				</div>
			</div>
		</div>
	</form>
	
</body>
</html>