<?php
require 'private/functions.php';
$conn = dbConnect();

$username = 0;
$message = test_input($_POST['message']);
$date = date('Y-m-d H:i:s');

$sql = "INSERT INTO messages(user, message, timestamp) VALUES (?, ?, ?)";

$stmt = $conn->prepare($sql);
$data = array(
  $username,
  $message,
  $date
);
$stmt->execute($data);

function test_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
