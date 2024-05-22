<!-- $_GET[] -->
<!-- $_POST[] -->
<!-- $_SESSION[] -->
<!-- $_COOKIE[] -->

<?php
session_start(); // Start the session

if (isset($_POST['submit'])) {
  echo "<h1>Form Received</h1>";


  $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
  $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);


  if (empty($username) || empty($password)) {
    echo "something is missing!";
  }


  $hash_password = password_hash($password, PASSWORD_DEFAULT);
  // Create an object to store the username and hashed password
  $user = new stdClass();
  $user->username = $username;
  $user->hash_password = $hash_password;


  // Store the object in a session
  $_SESSION['user'] = $user;
  // Store the object in a cookie (serialize the object for storage)
  setcookie('user', serialize($user), time() + (86400 * 30), "/"); // Cookie expires in 30 days


  header("Location: wellcome.php");
  exit();
}
