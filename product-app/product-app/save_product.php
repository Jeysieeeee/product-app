<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'product_item';

$connection = mysqli_connect($servername, $username, $password, $dbname);

  $name = $_POST['name'];
  $unit = $_POST['unit'];
  $price = $_POST['price'];
  $expiry_date = $_POST['expiry_date'];
  $inventory = $_POST['inventory'];

  // Upload image
  $image = '';
  if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
    $targetDir = 'product_app_pictures/';
    $targetFile = $targetDir . basename($_FILES['image']['name']);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
      $image = $_FILES['image']['name'];
    }
  }

  $query = "INSERT INTO items (name, unit, price, expiry_date, inventory, image) VALUES ('" . $name . "', '" . $unit . "', '" . $price . "', '" . $expiry_date . "', '" . $inventory . "', '" . $targetFile . "')";
  mysqli_query($connection, $query);
  exit('success');

?>
