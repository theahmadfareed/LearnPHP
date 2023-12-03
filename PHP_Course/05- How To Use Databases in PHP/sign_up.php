<?php
include("./index.php");
include("./functions.php");
sign_up();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign-Up</title>
</head>

<body>
  <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
    <input placeholder="enter username here..." type="text" name="username" id="username">
    <br>
    <input placeholder="enter email here..." type="email" name="email" id="email">
    <br>
    <input placeholder="enter password here..." type="password" name="password" id="password">
    <br>
    <input type="submit" name="submit">
  </form>
</body>

</html>