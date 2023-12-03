<?php
global $connection;
if (isset($_POST['create_post'])) {

   $post_title        = escape($_POST['title']);
   $post_author       = escape($_POST['post_author']);
   $post_category_id  = escape($_POST['post_category']);
//   $post_status       = escape($_POST['post_status']);

   $post_image        = escape($_FILES['post_image']['name']);
   $post_image_temp   = escape($_FILES['post_image']['tmp_name']);


   $post_tags         = escape($_POST['post_tags']);
   $post_content      = escape($_POST['post_content']);
   $post_date         = escape(date('d-m-y'));
//   $post_comment_count = 0;


   copy($post_image_temp, "../images/$post_image");

   $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags) ";

   $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}') ";

   $create_post_query = mysqli_query($connection, $query);

   confirmQuery($create_post_query);

   $the_post_id = mysqli_insert_id($connection);


   echo "<p class='bg-success'>Post Created. <a href='../post.php?p_id={$the_post_id}'>>View Post </a> or <a href='./posts.php'>Edit More Posts</a></p>";
}




?>

<form action="" method="post" enctype="multipart/form-data">


   <div class="form-group">
      <label for="title">Post Title</label>
      <input type="text" class="form-control" name="title">
   </div>

   <div class="form-group">
      <label for="category">Category</label>
      <select name="post_category" id="">

         <?php

         $query = "SELECT * FROM categories";
         $select_categories = mysqli_query($connection, $query);

         confirmQuery($select_categories);


         while ($row = mysqli_fetch_assoc($select_categories)) {
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];


            echo "<option value='$cat_id'>{$cat_title}</option>";
         }

         ?>


      </select>

   </div>

    <div class="form-group">

        <?php

        $users_query = "SELECT * FROM users";
        $select_users = mysqli_query($connection, $users_query);

        confirmQuery($select_users);

        if ($_SESSION['user_role'] == 'admin') {
            echo "<label for='post_author'>Users</label>";
            echo "<select name='post_author' id='post_author'>";
        }

        while ($row = mysqli_fetch_assoc($select_users)) {
            $user_id = $row['user_id'];
            $username = $row['username'];

            if ($_SESSION['user_role'] == 'admin') {
                echo "<option value='{$username}'>{$username}</option>";
            }
        }

        if ($_SESSION['user_role'] == 'admin') {
            echo "</select>";
        }

        ?>

    </div>





   <div class="form-group">
      <label for="title">Post Author</label>
      <input type="text" class="form-control" name="post_author">
   </div>

    <?php
    if ($_SESSION['user_role'] == 'admin') {
        ?>
        <div class="form-group">
            <label for="post_status">Post Status</label>
            <select name="post_status" id="post_status">
                <option value="Draft">Draft</option>
                <option value="Published">Published</option>
            </select>
        </div>
        <?php
    } else {
        // If the user is not an admin, don't show anything.
    }
    ?>


   <div class="form-group">
      <label for="post_image">Post Image</label>
      <input type="file" name="post_image">
   </div>

   <div class="form-group">
      <label for="post_tags">Post Tags</label>
      <input type="text" class="form-control" name="post_tags">
   </div>

   <div class="form-group">
      <label for="summernote">Post Content</label>
      <textarea class="form-control" name="post_content" id="summernote" cols="30" rows="10"></textarea>
   </div>


   <div class="form-group">
      <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
   </div>


</form>