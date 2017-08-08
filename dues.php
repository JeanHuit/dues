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
    <title>Portal - STAYA</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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


     <nav>
       <div class="container nav-wrapper">
         <a href="#!" class="brand-logo">STAYA</a>
         <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
         <ul class="right hide-on-med-and-down">
           <li><a href="register.php">New Registration</a></li>
           <li><a href="dues.php">Dues</a></li>
         </ul>
         <ul class="side-nav" id="mobile-demo">
           <li><a href="register.php">New Registration</a></li>
           <li><a href="dues.php">Dues</a></li>
         </ul>
       </div>
     </nav>

    <div class=" container row">
      <form class="col s12" action="" method="post">
        <div class="row">
            <div class="input-field col s6 m6">
              <input type="email" name="email_log" class="validate" placeholder="johnsmith@gmail.com">
              <label for="email_log">Email</label>
            </div>
            <div class="input-field col s6 m6">
              <input type="password" name="password" class="validate" placeholder="johnsmith@gmail.com">
              <label for="password">Password</label>
            </div>
          </div>
          <button class="btn waves-effect waves-light" type="submit" name="action">Login
            <i class="material-icons right">send</i>
          </button>
      </form>

    </div>


  </body>
</html>
