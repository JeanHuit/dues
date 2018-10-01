
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Portal - STAYA</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
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
              <li class="active"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
              <li><a href="register.php">New Registration</a></li>
              <li><a href="dues.php">Dues</a></li>
            </ul>
       </div>
     </div>
     </nav>

 <div class="container-fluid">
      <form class="form-group" action="" method="post">
        <div class="row">
          <div class="col-lg-6">
            <div class="input-group input-group-md">
              <span class="input-group-addon" id="sizing-addon1">Name</span>
              <input type="text" class="form-control" placeholder="Members Name" name="search_term" aria-describedby="sizing-addon1">
            </div>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-lg-4">
            <button class="btn btn-primary btn-lgt" type="submit" name="action">Find Member</button>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-lg-6 table-responsive">
            <table class="table table-striped">
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


      <!-- Poll to find those who are owing -->
      <div class="col-lg-6 table-responsive">
      <input type="date" name="term_date">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Paid Till</th>
                  <th>Date Paid</th>
                </tr>
              </thead>
                <tbody>

            <?php include ('scripts/connect.php');
            if (!empty($_REQUEST['term_date'])) {

              $term_date = mysqli_real_escape_string($db,($_REQUEST['term_date']));
  

            // $term_date = date('Y-m-d');
            $sql = "SELECT * FROM Dues_tbl WHERE Time_payed > $term_date";
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
</div>

  </body>
</html>
