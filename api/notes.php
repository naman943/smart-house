<?php
          session_start();
          $con=mysqli_connect("localhost","root","");
          mysqli_select_db($con,"smarthouse");
          header('Content-Type: application/json');
          $responce=array();


        if(isset($_SESSION['user']))
		{
            $user_id=mysqli_query($con,"select user_id from customers where email='".$_SESSION['user']."'");
            $get_id=mysqli_fetch_array($user_id);
            $user=$get_id['user_id'];

            $notes=$_POST['notes'];
            $date=$_POST['date'];

            if($notes=="" && $date=="")
            {
                $responce=array("status"=>"false","Message"=>"required field can not be empty");
            }
            else if($notes=="")
            {
                $responce=array("status"=>"false","Message"=>"Please Enter Notes");

            }
            else if($date=="")
            {
                 $responce=array("status"=>"false","Message"=>"Please Enter Date");
            }
            else
            {
                $sql=mysqli_query($con,"insert into reminder(user_id,notes,date) values('$user','$notes','$date')");

                if($sql>0)
                {
                    $responce=array("status"=>"success","Message"=>"Notes Added Succesfully");
                }
            }

		
        
		}
		else
		{
			$responce=array("status"=>"false","Message"=>"Please Login To Add New Notes");
		}
		echo json_encode($responce);
?>