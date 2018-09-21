  <?php
      
      session_start();
      $con=mysqli_connect("localhost","root","");
      mysqli_select_db($con,"smarthouse");
      header('Content-Type: application/json');
      $responce=array();
     

       if(isset($_SESSION['user']))
		{
        $responce=array("status"=>"found","Message"=>"You Have Already Login");
        echo json_encode($responce);
        exit();
		}

     $email_phone=$_POST['email-or-phone'];
     $password=$_POST['password'];
   
     if($email_phone=="" && $password=="")
     {
     	$responce=array("success"=>"False","Message"=>"Please Enter Email And Password");
     }
     else if($email_phone=="")
     {
     		$responce=array("success"=>"False","Message"=>"Please Enter Email OR Phone");
     }
     else if($password=="")
     {
     		$responce=array("success"=>"False","Message"=>"Please Enter Password");
     }
     else
     {
     	$auth=mysqli_query($con,"select name,email,phone,password from customers where (email='".$email_phone."' OR phone='".$email_phone."') and password='".$password."'");
     	$count=mysqli_num_rows($auth);

     	if($count>0)
     	{
     		$responce=array("success"=>"true","Message"=>"Login Successfully");
     		$get=mysqli_fetch_array($auth);
     		$_SESSION['user']=$get['email'];
     	}
     	else
     	{
     		$responce=array("success"=>"false","Message"=>"invalid authentication detail");
     	}
     }
     echo json_encode($responce);


?>