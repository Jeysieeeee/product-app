<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'product_item';

$connection = mysqli_connect($servername, $username, $password, $dbname);
$query = "SELECT * FROM items";
$result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($result)) {
   $inventory_cost = floatval($row['inventory']) * floatval($row['price']);
  $expiry_date = date('F j, Y', strtotime($row['expiry_date']));
  
  echo '<tr>';
  echo '<td>' . $row['name'] . '</td>';
  echo '<td>' . $row['unit'] . '</td>';
  echo '<td>' . $row['price'] . '</td>';
  echo '<td>' . $row['expiry_date'] . '</td>';
  echo '<td>' . $row['inventory'] . '</td>';
  echo '<td>' . $inventory_cost . '</td>';
  echo '<td><img src="' . $row['image'] . '" width="50"></td>';
  echo '<td><button class="delete-product" data-id="' . $row['id'] . '">Delete</button></td>';
  echo '</tr>';
}
?>
