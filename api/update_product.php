<?php
	
	      session_start();
          $con=mysqli_connect("localhost","root","");
          mysqli_select_db($con,"smarthouse");
          header('Content-Type: application/json');
          $responce=array();

          if(isset($_SESSION['user']))
		  {
		  	$id=$_POST['product_id'];
		  	$product_name=$_POST['pro_name'];
			$date=$_POST['date'];
			$quantity=$_POST['quantity'];
			$price=$_POST['price'];
			$total_amount=$price*$quantity;

		  	if($product_name=="" && $date=="" && $quantity=="" && $price=="" && 
		  	$id=="")
			{
				$responce=array("status"=>"false","Message"=>"Required fileds can not be empty");
			}
			else if($id=="")
			{
				$responce=array("status"=>"false","Message"=>"Product Id can not be empty");

			}
			else if($product_name=="")
        	{
        		$responce=array("status"=>0,"Message"=>"Please Enter Your Products Name");	
        	}
        	else if($date=="")
        	{
        		$responce=array("status"=>0,"Message"=>"Please Select date");	
        	}
        	else if($quantity=="")
        	{
        		$responce=array("status"=>0,"Message"=>"Please Enter Quantity");	
        	}
        	else if($price=="")
        	{
        		$responce=array("status"=>0,"Message"=>"Please Enter Price");
        	}
        	else
        	{
        		$get=mysqli_query($con,"select ProductID from product where ProductID='$id'");

        		$cnt=mysqli_num_rows($get);

        		if($cnt>0)
        		{

        		$sql=mysqli_query($con,"update product set ProductName='$product_name',ProductDate='$date',ProductQuantity='$quantity',ProductPrice='$price' where ProductID='$id'");

		        		if($sql>0)
		        		{
		        			$responce=array("status"=>"true","Message"=>"Product Updated successfully","Total-Amount"=>$total_amount);
		        		}

        		}
        		else
        		{
        			$responce=array("status"=>0,"Message"=>"Product updation failed or Product id is invalid");
				}

        	}



		  }
		  else
		  {
			$responce=array("status"=>"false","Message"=>"Please Login To update Products");
		  }
		echo json_encode($responce);



?>