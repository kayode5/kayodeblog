<?php

//Start session
session_start();

//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['uname'])) {
    header("location: login.php");
    exit();
}


$name = $_SESSION['uname'];

include 'dbconfig.php';  //including the database config 
$get_id=$_GET['id']; //get that blog by the id since its unique
$query=mysqli_query($con,"delete from blog where blogId='$get_id'");//query to delete that blog by id since its unique
if($query){ //if query is true reload the view page and echo deleted successfully
    header('location:view-blog.php');
    echo "<h2>Blog Deleted Successfully.</h2>";
    
}

else{
    echo "Error Deleting Blog: " . mysql_error();

}

?>