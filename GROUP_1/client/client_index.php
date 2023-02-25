<?php 
session_start();
require_once './include/client_dbcon.php';
try{
	if(isset($_POST["login"])){
		if(empty($_POST["uname"]) || empty($_POST["pword"])){
			$message = '<label> All Fields are required</label>';
		}else{
			$pdoQuery = "SELECT * FROM clienttb WHERE uname = :uname AND pword = :pword";
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
				header("location: client_home.php");
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
	<link rel="stylesheet" type="text/css" href="client_style.css">
	<link rel="icon" type="image/gif" href="images/client_logo.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>PHP PROJECT - Login/Registration Page</title>
</head>
<body>
	<?php
				if(isset($message)){
					echo '<label>'.$message.'</label';
				}
				
			?>
			<div id="template">
			<form method="POST">
				<h2>WELCOME</h2>
				Username: 
					<span class="input-item">
			           <i class="fa fa-user-circle"></i>
			        </span>
			        <input class="form-input" id="txt-input" type="text" name="uname" placeholder="Enter Username" required><br />
				Password:  
					<span class="input-item">
			        <i class="fa fa-key"></i>
			      	</span>
		      	<input class="form-input" id="txt-input" type="password" name="pword" placeholder="Enter Password" required>
				<button class="log-in" name="login"> Log In </button>

			</form>
			<hr>
			<form action="client_add.php" method="POST">
				<h2>Sign Up</h2>
				<p>It’s quick and easy.</p>
				<input type="hidden" name="id">
					Username: 
					<span class="input-item">
			           <i class="fa fa-user-circle"></i>
			        </span>
					<input class="form-input" id="txt-input" type="text" name="uname" required placeholder="USERNAME"><br>
					Password: 
					<span class="input-item">
			        <i class="fa fa-key"></i>
			      	</span>
					<input class="form-input" id="txt-input" type="password" name="pword" required placeholder="PASSWORD"><br>
					Fullname: 
					<span class="input-item">
					<i class="fa fa-id-card-o"></i>
					</span>
					<input class="form-input" id="txt-input" type="text" name="fullname" required placeholder="FULLNAME"><br>
					<button class="log-in" name="insert"> Register </button>
			</form>
		</div>
		<br>
		<script type="text/javascript">
			// Show/hide password onClick of button using Javascript only

// https://stackoverflow.com/questions/31224651/show-hide-password-onclick-of-button-using-javascript-only

function show() {
    var p = document.getElementById('txt-input-pwd');
    p.setAttribute('type', 'text');
}

function hide() {
    var p = document.getElementById('txt-input-pwd');
    p.setAttribute('type', 'password');
}

var pwShown = 0;

document.getElementById("eye").addEventListener("click", function () {
    if (pwShown == 0) {
        pwShown = 1;
        show();
    } else {
        pwShown = 0;
        hide();
    }
}, false);


		</script>
</body>
</html>