<?php
session_start();
if($_SESSION["username"] == "Not logged in") {
  $username = "";
  
}
else {
  $username = $_SESSION["username"];
  
}

?>

<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo "Halfwound Music | ".$pageTitle; ?></title>

  <script>
    var pageTitle = "<?php echo $pageTitle;?>";
  </script>
  <script src="js/jquery.min.js"></script>
  <script src="js/main.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="styles/bootstrap.min.css">
  <link rel="stylesheet" href="styles/main.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">

</head>
<body>
  <header>

    <div id="nav" class="container">
          <nav class="row">
            <div id="shopName" class="col-md-4">
              <h1 class="text-center">Halfwound Music</h1>
            </div>

            <div class="middleMenus col-md-6">
              <div id="searchBar" class="input-group">
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="button">Go!</button>
                </span>
              </div>

              <ul class="nav nav-pills">
                <li id="Home"><a href="index.php">Home</a></li>
                <li id="Shop"><a href="shop.php">Shop</a></li>
                <li id="Account"><a href="myaccount.php">Account</a></li>
                <li id="Cart"><a href="#">Cart</a></li>
                <li id="AboutUs"><a href="#">About Us</a></li>
                <li id="Signup"><a href="signup">Sign Up</a></li>
                <li id="Login"><a href="login.php">Login</a></li>
                <li id="Myaccount"><a href="logout.php">Logout</a></li>
              </ul>
            </div>

            <div class="col-md-2 align-middle">
              <h4 class="text-center">Welcome, </h4>
              <h4 class="text-center"><?php echo "$username"; ?></h4>
            </div>

          </nav>
    </div>

  </header>
