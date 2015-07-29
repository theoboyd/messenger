<?php
require_once('../../../config.php');
// Create connection
$con=mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
