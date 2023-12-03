<?php


global $connection;
if (isset($_POST['create_user'])) {


   $username          = escape($_POST['username']);
   $user_password     = escape($_POST['user_password']);
   $user_firstname    = escape($_POST['user_firstname']);
   $user_lastname     = escape($_POST['user_lastname']);
   $user_email        = escape($_POST['user_email']);

   $user_image          =  escape($_FILES['image']['name']);
   $user_image_temp     =  escape($_FILES['image']['tmp_name']);

   $user_role         = escape($_POST['user_role']);

   copy($user_image_temp, "../images/$user_image");


   $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10));

   $query = "INSERT INTO users(username, user_password, user_firstname, user_lastname, user_email, user_image, user_role) ";

   $query .= "VALUES('{$username}','{$user_password}','{$user_firstname}','{$user_lastname}','{$user_email}', '{$user_image}', '{$user_role}') ";

   $create_user_query = mysqli_query($connection, $query);

   confirmQuery($create_user_query);


   echo "User Created: " . " " . "<a href='./users.php'>View Users</a> ";
}




?>

<form action="" method="post" enctype="multipart/form-data">



   <div class="form-group">
      <label for="title">Firstname</label>
      <input type="text" class="form-control" name="user_firstname">
   </div>




   <div class="form-group">
      <label for="post_status">Lastname</label>
      <input type="text" class="form-control" name="user_lastname">
   </div>


   <div class="form-group">

      <select name="user_role" id="">
         <option value="subscriber">Select Options</option>
         <option value="admin">Admin</option>
         <option value="subscriber">Subscriber</option>
      </select>

   </div>

   <div class="form-group">
      <label for="post_image">Post Image</label>
      <input type="file" name="image">
   </div>

   <div class="form-group">
      <label for="post_tags">Username</label>
      <input type="text" class="form-control" name="username">
   </div>

   <div class="form-group">
      <label for="post_content">Email</label>
      <input type="email" class="form-control" name="user_email">
   </div>

   <div class="form-group">
      <label for="post_content">Password</label>
      <input type="password" class="form-control" name="user_password">
   </div>

   <div class="form-group">
      <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
   </div>


</form>