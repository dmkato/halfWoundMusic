<?php
  session_start();

if($_SESSION["username"] == "") {
  $username = "Guest";
} else {
  $username = $_SESSION["username"];
}

//edit to correct path depending on where files are hosted
$directory = "/~katod/halfWoundMusic";

//$directory = "/~giovanmi/dbs/halfWoundMusic";

?>

<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo "Halfwound Music | ".$pageTitle; ?></title>

  <script>
    var pageTitle = "<?php echo $pageTitle;?>";
  </script>
  <script src="<?php echo $directory;?>/js/jquery.min.js"></script>
  <script src="<?php echo $directory;?>/js/main.js"></script>
  <script src="<?php echo $directory;?>/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="<?php echo $directory;?>/styles/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo $directory;?>/styles/main.css">
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
              <form id="searchBar" class="input-group" action='<?php echo $directory;?>/php/search.php' method='post'>
                <input name="query" type="text" class="form-control" placeholder="Search">
                <span class="input-group-btn">
                  <input type="submit" class="btn btn-default" type="button">Go!</input>
                </span>
              </form>

              <ul class="nav nav-pills">

                <li id="Home"><a href="<?php echo $directory;?>/index.php">Home</a></li>
                <li id="Account"><a href="<?php echo $directory;?>/php/myaccount.php">Account</a></li>
                <li id="Myaccount"><a href="<?php echo $directory;?>/php/logout.php">Logout</a></li>

              </ul>
            </div>

            <div id="greeting" class="col-md-2 align-middle">
              <h4 class="text-center">Welcome, </h4>
              <h4 class="text-center"><?php echo "$username"; ?></h4>
            </div>

          </nav>
    </div>

  </header>
