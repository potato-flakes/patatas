<?php
require_once('C:\xampp\htdocs\GROUP_1\host\admin_include\host_dbcon.php');

	$pdoQuery = "DELETE FROM admintb where id =" . $_GET['id'];
	$pdoResult = $pdoConnect->prepare($pdoQuery);
	$pdoResult->execute();
	header('location:host_addpage.php');

	$pdoConnect = null;

?>