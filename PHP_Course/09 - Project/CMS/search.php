<?php
//<!-- Database -->
global $connection;
include("includes/db.php");
//<!-- Header -->
include("includes/header.php");
//<!-- Navigation -->
include("includes/navigation.php");
?>

<!-- Page Content -->
<div class="container">

  <div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">
      <?php



      if (isset($_POST['submit'])) {

        $search = $_POST['search'];


        //        $query = "SELECT * FROM posts WHERE post_tags COLLATE utf8mb4_bin LIKE '%$search%'";
        $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
        $search_query = mysqli_query($connection, $query);

        if (!$search_query) {

          die("QUERY FAILED" . mysqli_error($connection));
        }

        $count = mysqli_num_rows($search_query);

        if ($count == 0) {

          echo "<h1> NO RESULT</h1>";
        } else {

          while ($row = mysqli_fetch_assoc($search_query)) {
            $post_id= $row['post_id'];
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];

      ?>

            <!-- First Blog Post -->
            <h2>
              <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a>
            </h2>
            <p class="lead">
              by <a href="author_posts.php?author=<?php echo $post_author ?>&p_id=<?php echo $post_id; ?>"><?php echo $post_author ?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
            <hr>
              <a href="post.php?p_id=<?php echo $post_id; ?>">
                  <img width="500px" height="500px" class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
              </a>
            <hr>
            <p><?php echo $post_content ?></p>
            <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>


      <?php }
        }
      }


      ?>

    </div>

    <?php
    //<!-- Sidebar -->
    include("includes/sidebar.php");
    ?>
  </div>
  <!-- /.row -->

  <hr>
  <?php
  //<!-- Footer -->
  include("includes/footer.php");
  ?>