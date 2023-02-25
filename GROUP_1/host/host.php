<?php 
session_start();
require_once './admin_include/host_dbcon.php';
try{
	if(isset($_POST["loginServer"])){
		if(empty($_POST["uname"]) || empty($_POST["pword"])){
			$message = '<label> All Fields are required</label>';
		}else{
			$pdoQuery = "SELECT * FROM admintb WHERE uname = :uname AND pword = :pword";
			$pdoResult = $pdoConnect->prepare($pdoQuery);
			$pdoResult->execute(
				array(
					'uname'     =>      $_POST["uname"],
					'pword'		=>		$_POST["pword"]
				)

			);
			$count = $pdoResult->rowCount();
			if($count > 0){
				$_SESSION["uname"] = $_POST["uname"];
				header("location: host_home.php");
			}else{
				echo '<script>alert("Wrong Data")</script>';
			}
		}
	}
}
catch(PDOException $error)
{
	$message = $error->getMessage();
}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="host_style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" type="image/gif" href="./images/host_logo.png">
	<title>PHP PROJECT - Login Page</title>

</head>
<body>
	<?php
				if(isset($message)){
					echo '<label>'.$message.'</label';
				}
				
			?>
	<div class="overlay">
	<!-- LOGN IN FORM by Omar Dsoky -->
		<form id="template" method="POST">
		   <!--   con = Container  for items in the form-->
		   <div class="con">
		   <!--     Start  header Content  -->
			   <header class="head-form">
			      <h2>WELCOME</h2>
			      <!--     A welcome message or an explanation of the login form -->
			      <p>Enter username and password</p>
			   </header>
		   <!--     End  header Content  -->
		   <br>
		   <div class="field-set">
		     
		    	  <!--   user name -->
		         <span class="input-item">
		           <i class="fa fa-user-circle"></i>
		         </span>
		        <!--   user name Input-->
		         <input class="form-input" name="uname"id="txt-input" type="text" placeholder="Enter UserName" required>
		      <br>
		           <!--   Password -->
		     	 <span class="input-item">
		        <i class="fa fa-key"></i>
		      	 </span>
		     	 <!--   Password Input-->
		    	  <input class="form-input" type="password" placeholder="Enter Password" id="txt-input"  name="pword" required>
		     
				<!--      Show/hide password  -->
				
		      <br>
		<!--        buttons -->
		<!--      button LogIn -->
		      <button class="log-in" name="loginServer"> Log In </button>
		   </div>

		<!--      End Other the Division -->
		   </div>
		     
		<!--   End Conrainer  -->
		  </div>
		  
		  <!-- End Form -->
		</form>
	</div>
	<script src="myscripts.js">
		window.onload = function() {
    document.getElementById("my_audio").play();
}
	</script>
	</body>
	</html>
