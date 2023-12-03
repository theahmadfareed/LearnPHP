<?php global $connection;
include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
<?php include_once "admin/functions.php";
?>

<!-- Navigation -->
<?php include "includes/navigation.php"; ?>


<?php

if (isset($_POST['liked'])) {

    $post_id = $_POST['post_id'];
    $user_id = $_POST['user_id'];

    // 1
    mysqli_query($connection, "UPDATE posts SET likes=likes+1 WHERE post_id=$post_id");

    // 2
    mysqli_query($connection, "INSERT INTO likes(user_id, post_id) VALUES($user_id, $post_id)");

    // 3. Get updated like count
    $newLikesCount = getPostlikes($post_id);

    // 4. Send updated like count back to client-side JavaScript
    json_encode($newLikesCount);
    exit();
}


if (isset($_POST['unliked'])) {

    $post_id = $_POST['post_id'];
    $user_id = $_POST['user_id'];

    // 1
    mysqli_query($connection, "DELETE FROM likes WHERE post_id=$post_id AND user_id=$user_id");

    // 2
    mysqli_query($connection, "UPDATE posts SET likes=likes-1 WHERE post_id=$post_id");
    // 3. Get updated like count
    $newLikesCount = getPostlikes($post_id);

    // 4. Send updated like count back to client-side JavaScript
    json_encode($newLikesCount);
    exit();
}

?>


<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->

        <div class="col-md-8">

            <?php

            if(isLoggedIn()){

                $post_id = $_GET['p_id'];



                $update_statement = mysqli_prepare($connection, "UPDATE posts SET post_views_count = post_views_count + 1 WHERE post_id = ?");

                mysqli_stmt_bind_param($update_statement, "i", $post_id);

                mysqli_stmt_execute($update_statement);

                // mysqli_stmt_bind_result($stmt1, $post_id, $post_title, $post_author, $post_date, $post_image, $post_content);



                if(!$update_statement) {

                    die("query failed" );
                }


                if(isset($_SESSION['username']) && is_admin($_SESSION['username']) ) {


                    $stmt1 = mysqli_prepare($connection, "SELECT post_title, post_author, post_date, post_image, post_content FROM posts WHERE post_id = ?");


                } else {
                    $stmt2 = mysqli_prepare($connection , "SELECT post_title, post_author, post_date, post_image, post_content FROM posts WHERE post_id = ? AND post_status = ? ");

                    $published = 'published';



                }



                if(isset($stmt1)){

                    mysqli_stmt_bind_param($stmt1, "i", $post_id);

                    mysqli_stmt_execute($stmt1);

                    mysqli_stmt_bind_result($stmt1, $post_title, $post_author, $post_date, $post_image, $post_content);

                    $stmt = $stmt1;


                }else {


                    mysqli_stmt_bind_param($stmt2, "is", $post_id, $published);

                    mysqli_stmt_execute($stmt2);

                    mysqli_stmt_bind_result($stmt2, $post_title, $post_author, $post_date, $post_image, $post_content);

                    $stmt = $stmt2;

                }




                while(mysqli_stmt_fetch($stmt)) {



                    ?>

                    <!--          <h1 class="page-header">-->
                    <!--                    Posts-->
                    <!--                  -->
                    <!--                </h1>-->

                    <!-- First Blog Post -->
                    <h2>
                        <a href="#"><?php echo $post_title ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="author_posts.php?author=<?php echo $post_author ?>&p_id=<?php echo $post_id; ?>"><?php echo $post_author ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                    <hr>
                    <img width="500px" height="500px" class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                    <hr>
                    <p><?php echo $post_content ?></p>


                    <hr>
            <?php
            }

            // Free the result and close the statement
            mysqli_stmt_free_result($stmt);
            mysqli_stmt_close($stmt);
            ?>

            <div class="row">
                <p class="pull-right">
                    <a class="<?php echo userLikedThisPost($post_id) ? 'unlike' : 'like'; ?>" href="#">
                        <span class="glyphicon glyphicon-thumbs-up" data-toggle="tooltip" data-placement="top" title="<?php echo userLikedThisPost($post_id) ? ' I liked this before' : 'Want to like it?'; ?>"></span>
                        <?php echo userLikedThisPost($post_id) ? ' Unlike' : ' Like'; ?>
                    </a>
                </p>
            </div>


            <div class="row">
                <p class="pull-right likes">Likes: <span id="like-count"><?php getPostlikes($post_id); ?></span></p>
            </div>
            <div class="clearfix"></div>

                <!-- Blog Comments -->

                <?php

                if (isset($_POST['create_comment'])) {

                    $post_id = $_GET['p_id'];
                    $comment_author = $_POST['comment_author'];
                    $comment_email = $_POST['comment_email'];
                    $comment_content = $_POST['comment_content'];


                    if (!empty($comment_author) && !empty($comment_email) && !empty($comment_content)) {
                        mysqli_query($connection, "UPDATE posts SET post_comments_count=post_comments_count + 1 WHERE post_id=$post_id");
                        $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status,comment_date)";

                        $query .= "VALUES ($post_id, '{$comment_author}', '{$comment_email}', '{$comment_content}', ";

                        if ($_SESSION['user_role'] == 'admin') {
                            $query .= "'approved', "; // Set status to approved
                        } else {
                            $query .= "'unapproved', "; // Set status to unapproved for other roles
                        }

                        $query .= "now())";
                        $create_comment_query = mysqli_query($connection, $query);

                        if (!$create_comment_query) {
                            die('QUERY FAILED' . mysqli_error($connection));
                        }
                    }else{
                        echo "<script>alert('Something is missing!')</script>";
                    }
                }




                ?>


                <!-- Posted Comments -->



                <!-- Comments Form -->
                <div class="well">



                    <h4>Leave a Comment:</h4>
                    <form action="#" method="post" role="form">

                        <div class="form-group">
                            <label for="Author">Author</label>
                            <input type="text" name="comment_author" class="form-control" value="<?php echo $_SESSION['username']?>">
                        </div>

                        <div class="form-group">
                            <label for="Author">Email</label>
                            <input type="email" name="comment_email" class="form-control" value="<?php echo $_SESSION['user_email']?>">
                        </div>

                        <div class="form-group">
                            <label for="comment">Your Comment</label>
                            <textarea name="comment_content" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>
                <?php


                $query = "SELECT * FROM comments WHERE comment_post_id = {$post_id} ";
                $query .= "AND comment_status = 'approved' ";
                $query .= "ORDER BY comment_id DESC ";
                $select_comment_query = mysqli_query($connection, $query);
                if (!$select_comment_query) {

                    die('Query Failed' . mysqli_error($connection));
                }
                while ($row = mysqli_fetch_array($select_comment_query)) {
                    $comment_date   = $row['comment_date'];
                    $comment_content = $row['comment_content'];
                    $comment_author = $row['comment_author'];

                ?>


                    <!-- Comment -->
                    <div class="media">

                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo $comment_author;   ?>
                                <small><?php echo $comment_date;   ?></small>
                            </h4>

                            <?php echo $comment_content;   ?>

                        </div>
                    </div>




            <?php }
            } else {


                header("Location: index.php");
                exit(); // Make sure to exit after a header redirect

            }
            ?>



        </div>



        <!-- Blog Sidebar Widgets Column -->


        <?php include "includes/sidebar.php"; ?>


    </div>
    <!-- /.row -->

    <hr>



    <?php include "includes/footer.php"; ?>
    <script>
        $(document).ready(function() {
            $("[data-toggle='tooltip']").tooltip();
            var post_id = <?php echo $post_id; ?>;
            var user_id = <?php echo loggedInUserId(); ?>;

            // Handle liking and unliking
            $('.like, .unlike').click(function() {
                var action = $(this).hasClass('like') ? 'liked' : 'unliked';

                $.ajax({
                    url: "http://localhost/LearnPhp/PHP_Course/09%20-%20Project/CMS/post.php?p_id=<?php echo $post_id; ?>",
                    type: 'post',
                    data: {
                        [action]: 1,
                        'post_id': post_id,
                        'user_id': user_id
                    },
                    success: function(response) {
                        // Update the like count and button text on success
                        $('#like-count').html(response);

                        if (action === 'liked') {
                            $('.like').removeClass('like').addClass('unlike');
                            $('.unlike').text(' Unlike');
                            $('.glyphicon-thumbs-up').remove();
                            $('.unlike').prepend('<span class="glyphicon glyphicon-thumbs-up" data-toggle="tooltip" data-placement="top" title="Unlike"></span>');
                        } else {
                            $('.unlike').removeClass('unlike').addClass('like');
                            $('.like').text(' Like');
                            $('.glyphicon-thumbs-up').remove();
                            $('.like').prepend('<span class="glyphicon glyphicon-thumbs-up" data-toggle="tooltip" data-placement="top" title="Like it?"></span>');
                        }
                    }
                });
            });
        });
    </script>
