
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

 <div class="container">
      <form class="halign-wrapper" action="" method="post">
        <div class="row">
          <div class="input-field col s12 m12">
            <input type="search" name="search_term" >
            <label for="">Enter Name</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 offset-s4 m12 offset-m4">
            <button class="btn waves-effect waves-light" type="submit" name="action">Find
              <i class="material-icons right ">send</i>
            </button>
          </div>
        </div>

        <div class="row">
          <div class="col s12 m12">
            <table class="striped responsive-table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Paid Till</th>
                  <th>Date Paid</th>
                </tr>
              </thead>
                <tbody>

            <?php include ('scripts/connect.php');
            if (!empty($_REQUEST['search_term'])) {

            $term = mysqli_real_escape_string($db,($_REQUEST['search_term']));

            $sql = "SELECT * FROM Dues_tbl WHERE Name LIKE '%".$term."%'";
            $r_query = mysqli_query($db,$sql);

            while ($row = mysqli_fetch_array($r_query,MYSQLI_ASSOC)){
            echo " <tr>";
            echo  "<td>".$row['Name']."</td>";
            echo "<td>".$row['Dues']."</td>" ;
            echo "<td>".$row['Time_payed']."</td>";
            echo "</tr>";
            }

            }
            ?>

              </tbody>
          </table>
          </div>
        </div>
      </form>
</div>

  </body>
</html>
