<?php

function sign_up()
{
  include("./index.php");
  date_default_timezone_set('Asia/Karachi');

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<h1>Form Received</h1>";

    // $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    // $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    // $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    if (empty($username) || empty($password)) {
      echo "something is missing!";
    }

    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    $currentDateTime = date('Y-m-d h:i:s A');


    $sql = "INSERT INTO users(username, email, password, reg_date) values('$username', '$email', '$hash_password', '$currentDateTime')";
    try {
      mysqli_query($conn, $sql);
      echo "<br>User is created.";
    } catch (Exception $e) {
      echo "<br>" . $e->getMessage() . "";
    }
    mysqli_close($conn);
  }
}

function sign_in()
{
  include("./index.php");
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<h1>Form Received</h1>";

    // $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    // $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    if (empty($username) || empty($password)) {
      echo "something is missing!";
    }

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_array($result);
      $pass = $row["password"];
      if (password_verify($password, $pass)) {
        echo "Wellcome";
      } else {
        echo "Incorrect password.";
      }
    } else {
      echo "user not found";
    }
    mysqli_close($conn);
  }
}

function delete_record($pid)
{
  include("./index.php");
  $sql = "DELETE FROM users WHERE id = '$pid'";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    echo "<br>User deleted successfully";
  } else {
    echo "<br>Could not find the user";
  }
  mysqli_close($conn);
}

function update_record($pid, $data)
{
  include("./index.php");
  // var_dump($_POST);

  // Set the time zone to Pakistan
  date_default_timezone_set('Asia/Karachi');

  // Ensure that the input data contains the required fields
  if (isset($data['new_username']) && isset($data['new_email']) && isset($data['new_password'])) {

    $newUsername = filter_var($data['new_username'], FILTER_SANITIZE_SPECIAL_CHARS);
    $newEmail = filter_var($data['new_email'], FILTER_SANITIZE_EMAIL);
    $newPassword = password_hash($data['new_password'], PASSWORD_DEFAULT); // Hash the new password

    // Check if the user with the given ID exists
    $checkUserQuery = "SELECT * FROM users WHERE id = '$pid'";
    $checkUserResult = mysqli_query($conn, $checkUserQuery);

    if (mysqli_num_rows($checkUserResult) > 0) {
      $currentDateTime = date('Y-m-d h:i:s A'); // Current date and time in "Y-m-d H:i:s" format

      // User exists, proceed with the update
      $updateQuery = "UPDATE users SET username = '$newUsername', email = '$newEmail', password = '$newPassword', reg_date = '$currentDateTime' WHERE id = '$pid'";
      $updateResult = mysqli_query($conn, $updateQuery);

      if ($updateResult) {
        echo "<br>User updated successfully";
      } else {
        echo "<br>Failed to update user";
      }
    } else {
      echo "<br>User not found";
    }
  } else {
    echo "<br>Username, email, and password are required for update";
  }

  mysqli_close($conn);
}

function fetch_records()
{
  include("./index.php");

  $sql = "SELECT * FROM users";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
?>
      <div style="background-color:pink;">
        <pre style="cursor: pointer;">
<?php print_r($row); ?>
<form method="post" action="">
  <input type="hidden" name="update_id" value="<?php echo $row['id']; ?>">
  <label for="new_username">New Username:</label>
  <input type="text" name="new_username" placeholder="Enter new username">

  <label for="new_email">New Email:</label>
  <input type="email" name="new_email" placeholder="Enter new email">
  
  <label for="new_password">New Password:</label>
  <input type="password" name="new_password" placeholder="Enter new password">

  <button type="submit" name="update_btn">Update</button>
  <button type="submit" name="delete_btn">Delete</button>
</form>
    </pre>
      </div>
<?php
    }
  } else {
    echo "<br>No user found";
  }

  mysqli_close($conn);
}

// Check if the update or delete button is clicked
if (isset($_POST['update_btn'])) {
  $update_id = $_POST['update_id'];
  $newData = array(
    'new_username' => $_POST['new_username'],
    'new_email' => $_POST['new_email'],
    'new_password' => $_POST['new_password']
  );
  update_record($update_id, $newData);
} elseif (isset($_POST['delete_btn'])) {
  $delete_id = $_POST['update_id'];
  delete_record($delete_id);
}

?>