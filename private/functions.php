<?php
function dbConnect() {
  $config = require __DIR__ . '/config.php';
  try {
  	$conn = new PDO('mysql:host='.$config['db_host'].';dbname='.$config['db_name'].'', $config['db_user'], $config['db_password'] );
  	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  	$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  } catch ( PDOException $e ) {
  	echo $e->getFile() . ' on line ' . $e->getLine() . ': ' . $e->getMessage();
  	exit();
  }
  return $conn;
}
