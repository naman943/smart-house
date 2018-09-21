<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Register</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <?php
      include_once("connection.php");
      if(isset($_POST['register']))
      {
        $email = mysqli_escape_string($conn,$_POST['inputEmail']);
        $password = mysqli_escape_string($conn,$_POST['inputPassword']);
        $mobile = mysqli_escape_string($conn,$_POST['inputMobile']);
        $confirmpass = mysqli_escape_string($conn,$_POST['confirmPassword']);

        $sql = "insert into user (UserEmail,Password,PhoneNumber) values ('$email','$password','$mobile')";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
          $Error = "User Created Successfully";
          header("Location:login.php");
        }
        else
        {
          $Error = "Enter Valid Information";
        }
      }
    ?>


  </head>

  <body class="bg-dark">

    <div class="container">
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
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Register an Account</div>
        <div class="card-body">
          <form action="#" method="post">
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
                <label for="inputEmail">Email address</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputMobile" name="inputMobile" class="form-control" placeholder="Password" pattern="[0-9]{10}" required>
                <label for="inputPassword">Mobile Number</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                    <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
                    <label for="inputPassword">Password</label>
                  </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" placeholder="Confirm password" required="required">
                <label for="confirmPassword">Confirm password</label>
              </div>
            </div>
            <input type="submit" id="register" name="register" class="btn btn-primary btn-block" value="Register">
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="login.php">Login Page</a>
            <!--<a class="d-block small" href="#">Forgot Password?</a>-->
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
