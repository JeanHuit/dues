<?php
ob_start();
   include('scripts/session.php');
   include ('scripts/connect.php');
   ini_alter('date.timezone','Africa/Accra'); //set timezone to allow use of date() function.



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
       <div class="col-lg-6">
         <h6>Welcome <?php echo $login_session; ?></h6>
       </div>
     </div>


        <?php
        if ( isset($_GET['success']) && $_GET['success'] == 1 ){
          echo '<script type="text/javascript">toastr.success("Dues updated successfully",{timeOut: 5000});</script>';
        }
        if($_SERVER["REQUEST_METHOD"] == "POST") {

           $var = mysqli_real_escape_string($db,$_POST['dues_payment']);
           $dues_paid_upto = strval($var);
           $is_selected = mysqli_real_escape_string($db,$_POST['selected']);
           $date_entered = date('Y-m-d H:i:s');


           $sql = "UPDATE Dues_tbl SET Dues = '$dues_paid_upto',Time_payed = '$date_entered' WHERE Name ='$is_selected' ";
           $update = mysqli_query($db,$sql);
           if(! $update )
                   {
                      echo '<script type="text/javascript">toastr.error("Something went horribly wrong",{timeOut: 5000});</script>';
                      mysqli_close($db);
                      exit;
                   }
                   else {

                    header("Location: payment.php?success=1");
                    // echo '<script type="text/javascript">toastr.success("Dues updated successfully",{timeOut: 5000});</script>';
                   }



           }

         ?>

       <form class="form-group" action="" method="post">
         <div class="row">
           <div class="col-lg-6">
             <select name="selected" class="form-control">
               <option value="" disabled selected>Choose your option</option>
                     <?php

                    $sql="select Name from Dues_tbl";
                    $result=mysqli_query($db,$sql);
                    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                echo "<option value='" . $row['Name'] . "'>".$row['Name']."</option>";
                              }
                    ?>
             </select>
           </div>
           </div>
           <br>
           <div class="row">
             <div class="col-lg-6">
               <div class="input-group input-group-md disabled_check">
                  <span class="input-group-addon" id="sizing-addon1">Paid Till or For</span>
                 <input type="text" name="dues_payment" class="form-control" maxlength="4" id="dues_payment" required="required" aria-describedby="sizing-addon1">
               </div>
             </div>
           </div>
           <br>
           <button class="update_btn btn btn-primary btn-lgt"  disabled="disabled" type="submit" name="action">Update</button>
       </form>

  </body>
</html>
