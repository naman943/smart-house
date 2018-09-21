<?php

 session_start();
  $con=mysqli_connect("localhost","root","");
   mysqli_select_db($con,"smarthouse");
   header('Content-Type: application/json');
    $responce=array();

    if(isset($_SESSION['user']))
    {
    	$responce=array("success"=>"true","Message"=>"Log out success");
    	session_destroy();

    }
    echo json_encode($responce);

?>