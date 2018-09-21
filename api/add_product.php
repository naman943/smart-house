<?php
          session_start();
          $con=mysqli_connect("localhost","root","");
          mysqli_select_db($con,"smarthouse");
          header('Content-Type: application/json');
          $responce=array();


        if(isset($_SESSION['user']))
		{

			$product_name=$_POST['pro_name'];
			$date=$_POST['date'];
			$quantity=$_POST['quantity'];
			$price=$_POST['price'];
			$total_amount=$price*$quantity;

			if($product_name=="" && $date=="" && $quantity=="" && $price=="")
			{
				$responce=array("status"=>"false","Message"=>"Required fileds can not be empty");
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

        		$sql=mysqli_query($con,"insert into product(ProductName,ProductDate,ProductQuantity,ProductPrice)values('$product_name','$date','$quantity','$price')");

        		if($sql>0)
        		{
        			$responce=array("status"=>"true","Message"=>"Product Add successfully","Total-Amount"=>$total_amount);
        		}
        	}

        
		}
		else
		{
			$responce=array("status"=>"false","Message"=>"Please Login To Add New Products");
		}
		echo json_encode($responce);
?>