<?php
          session_start();
          $con=mysqli_connect("localhost","root","");
          mysqli_select_db($con,"smarthouse");
          header('Content-Type: application/json');
          $responce=array();


        if(isset($_SESSION['user']))
		      {
               $profile_pic=$_FILES['file']['name'];
               $ext = pathinfo($profile_pic, PATHINFO_EXTENSION);
               $name =rand(1000000, 9999999)."_".$profile_pic;
               $temp_location ='../uploads/' . $name;  
               $location='192.168.0.116/SmartHouse/uploads/' .$name;

              if($profile_pic=="")
              {
                $responce=array("status"=>"false","Message"=>"please upload your profile picture");
              }
              else if($ext !="jpg" && $ext != "jpeg" && $ext !="png")
              {

                   $responce=array("status"=>0,"Message"=>"Profile Picture is not valid");
              }

              else
               {
                $user_name=$_SESSION['user'];

                  if(move_uploaded_file($_FILES['file']['tmp_name'],$temp_location))
                    {

                      $upd=mysqli_query($con,"update customers set profile='$location' where email='$user_name'");

                        if($upd>0)
                        {
                          $responce=array("status"=>"true","Message"=>"Profile Updated Successfully");   
                        }

                    }
                    else
                    {
                      $responce=array("status"=>"false","Message"=>"server not respond please try again");
                    }

            

               }

        	}
		else
		{
			$responce=array("status"=>"false","Message"=>"Please Login To Update  Profile Picture");
		}
		echo json_encode($responce);
?>