<?php
include 'config.php';
$pageTitle = "Search";
include "header.php";

$query = $_POST["query"];
echo "
<div class='container'>
  <div class='container'>
    <h3>".$query."</h3>
";

// Create connection
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Query db
$sql = "SELECT *
        FROM Product
        WHERE name LIKE '%{$query}%'
        OR brandName LIKE '%{$query}%'
        OR category LIKE '%{$query}%'";

$result = mysqli_query($conn, $sql);
$count = 0;
while($row = mysqli_fetch_assoc($result)) {
  $imageID = (string) $row["productID"];
  $imageLink = "{$directory}/images/".$imageID.".jpeg";

  echo "
  <div class='centered'>
    <div class='productRow row'>
      <div class='col-md-3 text-center'>
        <img src='$imageLink' alt='Cover' style='width:100%; height:auto;'>
      </div>
      <div class='col-md-9'>
      <a href='$directory/php/product.php?productID=$imageID'>
        <h3> {$row['brandName']} {$row['name']} </h3>
        $ {$row['price']}
      </a>
    </div>
  </div><br>
  ";
  $count++;
}

if ($count == 0) {
  echo "
  <div class='centered'>
    <p>No results for $query</p>
  </div>
  ";
}


echo "</div>";
echo "</div>";



?>
