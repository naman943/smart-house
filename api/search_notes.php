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
            $date=$_POST['date'];

            
            
            if($date=="")
            {
                 $responce=array("status"=>"false","Message"=>"Please Enter Date");
            }
            else
            {
                $sql=mysqli_query($con,"select notes from reminder where date='$date' and user_id='$user'");
                $count=mysqli_num_rows($sql);

                if($count>0)
                {
                    while($res=mysqli_fetch_assoc($sql))
                    {
                        $responce[]=$res;
                    }
                    $responce=array("status"=>"true","Notes"=>$responce);
                }

                else
                {
                     $responce=array("status"=>"false","Message"=>"Notes can not be found");
                }
            }

		
        
		}
		else
		{
			$responce=array("status"=>"false","Message"=>"Please Login To view  Notes");
		}
		echo json_encode($responce);
?>