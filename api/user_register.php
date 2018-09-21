<?php
session_start();

?>

<?php

     $con=mysqli_connect("localhost","root","");
      mysqli_select_db($con,"smarthouse");
     	header('Content-Type: application/json');
         $responce=array();

        if(isset($_SESSION['user']))
		{
        $responce=array("status"=>"found","Message"=>"You Have Already Registered");
        echo json_encode($responce);
        exit();
		}
		



		$email=$_POST['email'];

		$phone=$_POST['phone'];

		$cname=$_POST['user_name'];
 
        $gender=$_POST['gender'];        
     
		$password=$_POST['password'];

		$confirm=$_POST['confirm'];

		$profile_pic=$_FILES['file']['name'];
        
        $ext = pathinfo($profile_pic, PATHINFO_EXTENSION);
       
       	$name =rand(1000000, 9999999)."_".$profile_pic;
 			
 	    $temp_location ='../uploads/' . $name;  
		$location='192.168.0.116/wallpaper/uploads/' .$name;

		if($email=="" && $phone=="" && $cname=="" && $gender=="" && $password=="" && $confirm=="" && $profile_pic=="")
		{
         $responce=array("status"=>0,"Message"=>"required fileds can not be empty");
		}
        else if($email=="")
        {
        $responce=array("status"=>0,"Message"=>"Please Enter Your Email Address");	
        }
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
          $responce=array("status"=>0,"Message"=>"Please Enter Your Valid Email Address");
        }
        else if($phone=="")
        {
        	 $responce=array("status"=>0,"Message"=>"Please Enter Your Mobile Number");	
        }
        else if(!preg_match('/^[0-9]{10}+$/', $phone))
        {
        	 $responce=array("status"=>0,"Message"=>"Please Enter Your valid  Mobile Number");	
        }
        else if($cname=="")
        {
        	$responce=array("status"=>0,"Message"=>"Please Enter Your Name");	

        }
        else if($gender=="")
        {
        $responce=array("status"=>0,"Message"=>"Please Select Gender");	
        }
        else if($password=="")
        {
        	$responce=array("status"=>0,"Message"=>"Please Enter your Password");	
        }
        else if($confirm=="")
        {
        	$responce=array("status"=>0,"Message"=>"Please Enter Confirm Password");	
        }
        else if($password != $confirm)
        {
        	$responce=array("status"=>0,"Message"=>"Password Does not match");	
        }
        else if($profile_pic=="")
        {
        	$responce=array("status"=>0,"Message"=>"Please Upload Your Profile Picture");	
        }
        else if($ext !="jpg" && $ext != "jpeg" && $ext !="png")
        {

        	$responce=array("status"=>0,"Message"=>"Profile Picture is not valid");
        }
        else 
        {
          $chk=mysqli_query($con,"select phone,email from customers where  phone='$phone' OR email='$email'");
          $count=mysqli_num_rows($chk);

          	if($count>0)
          	{
          		$responce=array("status"=>0,"Message"=>" Phone OR Email is already registred try to use Diffrent Phone Or Email");
          		echo json_encode($responce);
          		exit();
          			
          	}
          	
          	

          try
          {
          	if(move_uploaded_file($_FILES['file']['tmp_name'],$temp_location))
          	{
          	   $sql=mysqli_query($con,"insert into customers(name,phone,email,gender,password,profile)
          		values('$cname','$phone','$email','$gender','$password','$location')");
  
                 if($sql>0)
                 {
                  $responce=array("status"=>1,"Message"=>"customers Added success");
                 }
                 else
                 {
	                 if(mysqli_error($con))
	          	     {
	          		   throw new Exception("Error Processing Request Please Try Again");
	          		 }
          		  }
			}

          	else
          	{
          		$responce=array("status"=>"0","Message"=>"Profile Pic Not Uploaded Please Try Again");
          	}	
          
          	}
          	
		  
          catch(Exception $e)
          {
          	
           $responce=array("status"=>"false","Message"=>$e->getMessage());
          }


        }
	echo json_encode($responce);
	





?>