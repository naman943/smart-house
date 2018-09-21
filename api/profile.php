<?php

	 session_start();
          $con=mysqli_connect("localhost","root","");
          mysqli_select_db($con,"smarthouse");
          header('Content-Type: application/json');
          $responce=array();


        if(isset($_SESSION['user']))
		{


			$profile=mysqli_query($con,"select name,email,gender,profile,phone from customers where email='".$_SESSION['user']."'");

			while($res=mysqli_fetch_assoc($profile))
			{
				$responce[]=$res;
			}
			$responce=array("status"=>"true","Profile"=>$responce);

		}
		else
		  {
			$responce=array("status"=>"false","Message"=>"Can not view your profile because you are not authenticate");
		  }
		echo json_encode($responce);

?>