<?php
// php pdo insert data to mysql database
if(isset($_POST['insert2']))
{

   try {
    // connect to mysql
   $pdoConnect = new PDO("mysql:host=localhost;dbname=database","root","");
   // set the PDO error mode to exception
   $pdoConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $exc) {
      echo $exc ->getMessage();
      exit();  
    }
    // get values form input text and number
    $id = $_POST['id'];
    $uname = $_POST['uname'];
    $pword = $_POST['pword'];
    $fullname = $_POST ['fullname'];


    // mysql query to insert data
    $pdoQuery = "INSERT INTO `clienttb` (uname, pword, fullname) VALUES (:uname, :pword, :fullname)";
    $pdoResult = $pdoConnect ->prepare($pdoQuery);
    $pdoExec = $pdoResult->execute(array(":uname"=>$uname,":pword"=>$pword, ":fullname"=>$fullname));
    $message1='<label>Data Added!</label>';

    // check if mysql insert query successful
    if($pdoExec)
    {
      //retrieve all files display
      $pdoQuery = 'SELECT * FROM clienttb';
      $pdoResult = $pdoConnect ->prepare($pdoQuery);
      $pdoResult->execute();
         while ($row = $pdoResult->fetch()){
            echo $row['id'] . " | " .$row['uname'] . " | " . $row['pword'] . " | " . $row["fullname"] . "<br/>";
         }
         header("Location: user_addpage.php");
         exit;
      }else{
         echo 'Data Mot Inserted';
      }

    } 
    $pdoConnect = null;
?>