<?php
try {
    // connect to mysql
	$pdoConnect = new PDO("mysql:host=localhost;dbname=database","root","");
	// set the PDO error mode to exception
	$pdoConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $exc) {
    	echo $exc ->getMessage();
    	
    }
?>

