<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Portal - STAYA</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/materialize.min.css">
    <link rel="stylesheet" href="../css/toastr.min.css">
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    <script type="text/javascript" src="../js/toastr.min.js"></script>
    <script type="text/javascript"src="../js/main.js"></script>
  </head>
  <body>
<?php
 include ('connect.php');

 if($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = mysqli_real_escape_string($db,$_POST['set_username']);
    $password = sha1(mysqli_real_escape_string($db,$_POST['set_password']));

    $sql = "INSERT INTO admin (username,passcode) VALUES ('$username','$password')";
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

    <div class=" container row">
        <div class="row col s12 center-align">
        <h2>St.Thomas Aquinas Admin Registraiton</h2>
        </div>
      <form class="col s12" action="" method="post">
        <div class="row">
          <div class="input-field col s6">
            <input type="email"  name="set_username" class="validate" placeholder="johnsmith@gmail.com" required="required">
            <label for="email_add">Email</label>
          </div>
          <div class="input-field col s6">
            <input type="password"  name="set_password" class="validate"  required="required">
            <label for="email_add">Password</label>
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
