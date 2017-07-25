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

    <div class="row">
        <div class="row col s12">
        <h2>St.Thomas Aquinas Youth Portal - Registraiton</h2>
        </div>
      <form class="col s12" action="index.html" method="post">
        <div class="row">
          <div class="input-field col s6">
            <input type="text" id="first_name" class="validate" placeholder="Firstname">
            <label for="first_name">First Name</label>
          </div>
          <div class="input-field col s6">
            <input type="text" id="last_name" class="validate" placeholder="Surname">
            <label for="last_name">Last Name</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <input type="tel" id="phone_number" class="validate" placeholder="0201234567">
            <label for="phone_number">Phone Number</label>
          </div>
          <div class="input-field col s6">
            <input type="text" id="Home_Address" class="validate" placeholder="Cantonments">
            <label for="Home_Address">Home Address</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <input type="email" id="email_add" class="validate" placeholder="johnsmith@gmail.com">
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
