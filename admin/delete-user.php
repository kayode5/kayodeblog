<?php

//Start session
session_start();


if(isset($_SESSION["lname"])){


	if((time() - $_SESSION['last_time']) > 60) //Time is seconds
			{
				 header("location: logout.php");
			}else {
				   $_SESSION['last_time'] = time();
				  // echo "" .$_SESSION["name"];
				  }
}

//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['uname'])) {
    header("location: login.php");
    exit();
}




$name = $_SESSION['uname'];
include 'dbconfig.php';  //including the database config 
$get_id=$_GET['id']; //get that blog by the id since its unique
$query=mysqli_query($con,"DELETE FROM User WHERE Id='$get_id'");//query to delete that blog by id since its unique
if($query){ //if query is true reload the view page and echo deleted successfully
    header('location:view-user.php');
    echo "<h2>User Deleted Successfully.</h2>";
    
}

else{
    echo "Error Deleting Author: " . mysql_error();

}

?>
