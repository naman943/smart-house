<!DOCTYPE html>
<html>
<?php
  include_once("connection.php");
  /*session_start();
   if(!isset($_SESSION['ema']))
   {
     header("Location:login.php");
   }*/

   if(isset($_POST['addproduct']))
   {
   	$productname = mysqli_escape_string($conn,$_POST['ProductName']);
   	$productdate = mysqli_escape_string($conn,$_POST['ProductDate']);
   	$productquantity = mysqli_escape_string($conn,$_POST['Quantity']);
   	$productprice = mysqli_escape_string($conn,$_POST['Price']);

   	$sql = "insert into product (ProductName,ProductDate,ProductQuantity,ProductPrice) values ('$productname','$productdate','$productquantity','$productprice')";
   	$result = mysqli_query($conn,$sql);
   	if($result)
   	{
   		$Error = "Product Added Successfully";
   	} 
   	else
   	{
   		$Error = "Product Failed To Added";
   	}
   }
?>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
<head>

	<title>Dashboard</title>
</head>
<body id="page-top">

    <?php
      include_once("header.php");
    ?>

      <div id="content-wrapper">

        <div class="container-fluid">
        	<?php
        if(isset($Error))
        {
      ?>
        <div class="alert alert-danger">
        <?php
          echo $Error;?>
        </div>
      <?php 
        }
      ?>
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Product Detail</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>

          <!-- Content -->
          <div class="card card-login mx-auto mt-5">
        <div class="card-header">Add Product</div>
        <div class="card-body">
          <form action="#" method="post">
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="ProductName" name="ProductName" class="form-control" placeholder="Product Name" autofocus="autofocus">
                <label for="ProductName">Product Name</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="Date" id="ProductDate" name="ProductDate" class="form-control" placeholder="Product Date">
                <label for="ProductDate">Product Date</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                    <input type="text" id="Quantity" name="Quantity" class="form-control" placeholder="Quantity">
                    <label for="Quantity">Quantity</label>
                  </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="Price" name="Price" class="form-control" placeholder="Price">
                <label for="confirmPassword">Price</label>
              </div>
            </div>
            <div class="form-group">
                <label for="totalprice">Total Price = </label>
            </div>
            <input type="submit" id="addproduct" name="addproduct" class="btn btn-primary btn-block" value="Add Product">
          </form>
        </div>
      </div> 
          

        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Smart House 2018</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>

  </body>
</html>