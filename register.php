<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Portal - STAYA</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/toastr.min.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
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
     <nav>
       <div class=" container nav-wrapper">
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
        <div class="row col s12 center-align">
        <h2>St.Thomas Aquinas Youth Portal Registraiton</h2>
        </div>
      <form class="col s12" action="" method="post">
        <div class="row">
          <div class="input-field col s6">
            <input type="text" id="fsname" name="fsname" class="validate" placeholder="Firstname & Surname" required="required">
            <label for="first_name">Name</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <input type="tel" id="phone_number" name="phone_number" class="validate" placeholder="0201234567" required="required">
            <label for="phone_number">Phone Number</label>
          </div>
          <div class="input-field col s6">
            <input type="text" id="Home_Address" name="address" class="validate" placeholder="Cantonments" required="required">
            <label for="Home_Address">Home Address</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <input type="email" id="email_add" name="email_add" class="validate" placeholder="johnsmith@gmail.com" required="required">
            <label for="email_add">Email</label>
          </div>
          <div class="col s6">
            <button class="btn waves-effect waves-light" type="submit" name="action">Submit
              <i class="material-icons right">send</i>
            </button>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>
