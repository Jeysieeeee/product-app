<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'product_item';

$connection = mysqli_connect($servername, $username, $password, $dbname);


  $id = $_POST['id'];
  $query = "DELETE FROM items WHERE id = '" . $id . "'";
  mysqli_query($connection, $query);
  exit('success');

?>
