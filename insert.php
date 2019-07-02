<?php
require 'private/functions.php';
$conn = dbConnect();

$username = 0;
$message = test_input($_POST['message']);

$sql = "INSERT INTO messages(user, message) VALUES ('$username', '$message')";

$stmt = $conn->query($sql);

function test_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
