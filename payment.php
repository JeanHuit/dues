<?php
   include('scripts/session.php');
   include ('scripts/connect.php');



?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Portal - STAYA</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/materialize.min.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript"src="js/main.js"></script>
  </head>
  <body>

     <nav>
       <div class="nav-wrapper">
         <a href="#" class="brand-logo">STAYA</a>
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

     <div class="row">
       <div class="col s6 right">
         <h6>Welcome <?php echo $login_session; ?></h6>
       </div>
     </div>
     <div class="row">
       <div class="input-field col s6">
         <select>
           <option value="" disabled selected>Choose your option</option>
                 <?php

                $sql="select Name from Dues";
                $result=mysqli_query($db,$sql);
                while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                            echo "<option value=''>".$row['Name']."</option>";
                                  }
                ?>
         </select>

       </div>
       <form class="col s12" action="" method="post">
         <div class="row">
             <div class="input-field col s6">
               <input type="email" name="email_log" class="validate" placeholder="johnsmith@gmail.com">
               <label for="email_log">Email</label>
             </div>
             <div class="input-field col s6">
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
