<?php
include("scripts/connect.php");
 session_start();

 if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form

    $myusername = mysqli_real_escape_string($db,$_POST['email_log']);
    $mypassword = sha1(mysqli_real_escape_string($db,$_POST['password']));

    $sql = "SELECT id FROM admin WHERE username = '$myusername' and passcode = '$mypassword' and pemissions = 1";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];

    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row

    if($count == 1) {
      // session_register("myusername");
       $_SESSION['login_user'] = $myusername;

       header("location: payment.php");
    }else {
       header("location: dues.php");
    }
 }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Portal - STAYA</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/toastr.min.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/toastr.min.js"></script>
    <script type="text/javascript"src="js/main.js"></script>
    <style media="screen">
      .row{
        padding-top: 50px;
      }
    </style>
  </head>
  <body>


    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
           <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
             <span class="sr-only">Toggle navigation</span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
           </button>
           <a class="navbar-brand" href="#">STAYA</a>
       </div>
       <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
           <ul class="nav navbar-nav">
             <li><a href="index.php">Home </a></li>
             <li><a href="register.php">New Registration</a></li>
             <li class="active"><a href="dues.php">Dues <span class="sr-only">(current)</span></a></li>
           </ul>
      </div>
    </div>
    </nav>

    <div class="container-fluid">
      <form class="form-group" action="" method="post">
        <div class="row">
            <div class="col-lg-6">
              <div class="input-group input-group-md">
                <span class="input-group-addon" id="sizing-addon1">@</span>
                <input type="email" class="form-control" placeholder="johnsmith@gmail.com" name="email_log" aria-describedby="sizing-addon1">
              </div>
            </div>

            <div class="col-lg-6">
              <div class="input-group input-group-md">
              <span class="input-group-addon" id="sizing-addon1">Password</span>
              <input type="password" class="form-control" name="password"  placeholder="password" aria-describedby="sizing-addon1">
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-lg-4">
              <button class="btn btn-primary btn-lgt" type="submit" name="action">Login</button>
            </div>
          </div>
      </form>
    </div>
  </body>
</html>
