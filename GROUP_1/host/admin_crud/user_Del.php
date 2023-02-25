<?php
require_once('C:\xampp\htdocs\GROUP_1\host\admin_include\host_dbcon.php');

	$pdoQuery = "DELETE FROM clienttb where id =" . $_GET['id'];
	$pdoResult = $pdoConnect->prepare($pdoQuery);
	$pdoResult->execute();
	header('location:user_addpage.php');

	$pdoConnect = null;

?>