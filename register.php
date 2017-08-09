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
  </head>
  <body>
<?php
ob_start();
 include ('scripts/connect.php');

 if($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = mysqli_real_escape_string($db,$_POST['fsname']);
    $myphonenumber = mysqli_real_escape_string($db,$_POST['phone_number']);
    $myaddress = mysqli_real_escape_string($db,$_POST['address']);
    $myemail = mysqli_real_escape_string($db,$_POST['email_add']);

    $sql = "INSERT INTO Dues_tbl (Name,Address,PhoneNumber,Email) VALUES ('$name','$myaddress',$myphonenumber,'$myemail')";
    $submit = mysqli_query($db,$sql);
    if(! $submit )
            {
              echo '<script type="text/javascript">toastr.error("Something went horribly wrong",{timeOut: 5000});</script>';
              mysqli_close($db);
              exit;
            }
            else
            {
              echo '<script type="text/javascript">toastr.success("Registration Successful",{timeOut: 5000});</script>';
            }


    }

 ?>
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
          <li class="active"><a href="register.php">New Registration<span class="sr-only">(current)</span></a></li>
          <li><a href="dues.php">Dues</a></li>
        </ul>
   </div>
 </div>
 </nav>

    <div class=" container-fluid">
        <div class="row col-lg-12">
        <h2>St.Thomas Aquinas Youth Portal Registraiton</h2>
        </div>
      <form class="form-group" action="" method="post">
        <div class="row">
          <div class="col-lg-6">
            <div class="input-group input-group-md">
              <span class="input-group-addon" id="sizing-addon1">Name</span>
              <input type="text" id="fsname" name="fsname" class="form-control" placeholder="Firstname & Surname" required="required" aria-describedby="sizing-addon1">
            </div>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-lg-6">
            <div class="input-group input-group-md">
              <span class="input-group-addon" id="sizing-addon1">Phone Number</span>
              <input type="tel" id="phone_number" name="phone_number" class="form-control" placeholder="0201234567" required="required" aria-describedby="sizing-addon1">
            </div>
          </div>
        </div>
        <br>
          <div class="row">
            <div class="col-lg-6">
              <div class="input-group input-group-md">
                <span class="input-group-addon" id="sizing-addon1">Address</span>
                <input type="text" id="Home_Address" name="address" class="form-control" placeholder="Cantonments" required="required" aria-describedby="sizing-addon1">
              </div>
            </div>
          </div>
          <br>
        <div class="row">
          <div class="col-lg-6">
            <div class="input-group input-group-md">
            <span class="input-group-addon" id="sizing-addon1">Email</span>
            <input type="email" id="email_add" name="email_add" class="form-control" placeholder="johnsmith@gmail.com" aria-describedby="sizing-addon1" >
          </div>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-lg-6">
          <div class="input-group input-group-md">
          <button class="btn btn-primary btn-lgtt" type="submit" name="action">Submit</button>
        </div>
      </div>
      </div>

      </form>
    </div>
  </body>
</html>
