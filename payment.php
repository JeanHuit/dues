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

     <nav>
       <div class="container nav-wrapper">
         <a href="index.php" class="brand-logo">STAYA</a>
         <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
         <ul class="right hide-on-med-and-down">
           <li><a href="register.php">New Registration</a></li>
           <li><a href="dues.php">Dues</a></li>
           <li><a href="scripts/logout.php">LogOut</a></li>
         </ul>
         <ul class="side-nav" id="mobile-demo">
           <li><a href="register.php">New Registration</a></li>
           <li><a href="dues.php">Dues</a></li>
           <li><a href="scripts/logout.php">LogOut</a></li>
         </ul>
       </div>
     </nav>

     <div class="container row">
       <div class="col s12 m12 right-align">
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

       <form class=" container col s12 m12" action="" method="post">
         <div class="row">
           <div class="input-field col s6 m6">
             <select name="selected">
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
             <div class="input-field col s6 m6 disabled_check">
               <input type="text" name="dues_payment"  maxlength="4" id="dues_payment" required="required">
               <label for="">Paid Till or For</label>
             </div>
           </div>

           <button class="btn waves-effect waves-light update_btn"  disabled="disabled" type="submit" name="action">Update
             <i class="material-icons right">send</i>
           </button>
       </form>

  </body>
</html>
