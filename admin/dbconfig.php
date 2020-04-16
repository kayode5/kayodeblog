<?php

$con = mysqli_connect("localhost","root",""); //connecting database

if (!$con) //if connection is not true do this
{
  die('Could not connect: ' . mysqli_error());
}
//then select the database name blog
mysqli_select_db( $con, "blog");

//setting timestamp for every date to be used
date_default_timezone_set("Europe/Dublin");
$date=date('Y-m-d H:i:s');
ob_start();
?>