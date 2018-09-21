<!DOCTYPE html>
<html lang="en">
<?php
  include_once("connection.php");
  // session_start();
  // if(isset($_SESSION['ema'])&&$_SESSION['ema']!=null)
  // {
  //   header("Location:index.php");
  // }
?>
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Login</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

    <?php
      include_once("connection.php");
      if(isset($_POST['login']))
      {
        $ema = mysqli_escape_string($conn,$_POST['Email1']);
        $pass = mysqli_escape_string($conn,$_POST['Pass']);

        $sql = "select * from user where UserEmail='$ema' and Password='$pass'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0)
        {
          $row = mysql_fetch_assoc($result);
          $_SESSION['ema'] = $row['UserEmail'];
          header("Location:index.php");
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
        <div class="card-header">Login</div>
        <div class="card-body">
          <form action="#" method="post">
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" id="Email1" name="Email1" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
                <label for="inputEmail">Email address</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="Pass" name="Pass" class="form-control" placeholder="Password" required="required">
                <label for="inputPassword">Password</label>
              </div>
            </div>
           
            <input type="submit" id="login" name="login" class="btn btn-primary btn-block" value="Login">
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="register.php">Register an Account</a>
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
