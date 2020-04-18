<?php

$con = mysqli_connect("eporqep6b4b8ql12.chr7pe7iynqr.eu-west-1.rds.amazonaws.com","hd63e4pss4kd0lrj","psl4pual893x1v5s"); //connecting database

if (!$con) //if connection is not true do this
{
  die('Could not connect: ' . mysqli_error());
}
//then select the database name blog
mysqli_select_db( $con, "gp7tltk4q1mj97bk");

//setting timestamp for every date to be used
date_default_timezone_set("Europe/Dublin");
$date=date('Y-m-d H:i:s');
ob_start();
?>
