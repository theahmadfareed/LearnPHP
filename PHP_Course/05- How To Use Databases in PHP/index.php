<?php
$db_server = "localhost";
$db_user = "root";
$db_pass = "root";
$db_name = "learnphp";
$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

try {
  if (!empty($conn)) {
  } else {
    echo "not connected";
  }
} catch (Exception $e) {
  echo " " . $e->getMessage() . " ";
}
