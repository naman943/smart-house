<?php

         session_start();
          $con=mysqli_connect("localhost","root","");
          mysqli_select_db($con,"smarthouse");
          header('Content-Type: application/json');
          $responce=array();

          if(isset($_SESSION['user']))
		  {

		  		$id=$_POST['product_id'];

		  		if($id=="")
				{
				$responce=array("status"=>"false","Message"=>"Product Id can not be empty");
			    }
			    else
			    {
			    	$sql=mysqli_query($con,"select * from product where ProductID='$id'");
			    	
			    		$count=mysqli_num_rows($sql);

			    		if($count>0)
			    		{
			    			while($res=mysqli_fetch_assoc($sql))
			    			{
			    				$responce[]=$res;
			    			}
			    			$responce=array("status"=>"true","Product-Data"=>$responce);
			    		}
			    		else
			    		{
			    			$responce=array("status"=>"false","Message"=>"Product not found");
			    		}

			    }

		  }
		  else
		  {
			$responce=array("status"=>"false","Message"=>"Please Login To View Products");
		  }
		echo json_encode($responce);

?>