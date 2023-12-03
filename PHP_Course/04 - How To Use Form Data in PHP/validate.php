<!-- $_GET[] -->
<!-- $_POST[] -->

<?php
if (isset($_GET['submit'])) {
  echo "<h1>Form Received</h1>";

  // $username = $_GET['username'];
  // $password = $_GET['password'];

  $username = filter_input(INPUT_GET, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
  $password = filter_input(INPUT_GET, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

  if (empty($username) || empty($password)) {
    echo "something is missing!";
  }

  $hash_password = password_hash($password, PASSWORD_DEFAULT);

  echo 'Username = ' . $username . '<br>' . 'Password = ' . $hash_password . '';
}
