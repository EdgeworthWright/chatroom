<?php
require 'private/functions.php';
$conn = dbConnect();

$sql = "SELECT * FROM messages";

$stmt = $conn->query($sql);
$result = $stmt->fetchAll();



if ($result) {
  $getUsers = "SELECT * FROM users";
  $statement = $conn->query($getUsers);
  $res = $statement->fetchAll();
  foreach ($res as $row) {
    $username = $row['username'];
  }

  foreach ($result as $row) {
    if ($row['user'] == 0) {
      $user = 'Anonymous';
    } else {
      $user = $username;
    }
    echo "Id: " . $row['id'] . " | User: " . $user . " | message: " . $row['message'] . "<br>";
  }
} else {
  echo "No messages";
}
?>
