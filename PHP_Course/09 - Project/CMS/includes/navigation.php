<?php include_once "admin/functions.php";?>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<!--    <div class="container">-->
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="./index.php">Learn.io</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php
                global $connection;
                $query = "SELECT * FROM categories ORDER BY cat_title ASC LIMIT 5";
                $select_all_categories_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_categories_query)) {
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];

                    echo "<li><a href='./category.php?category=$cat_id'>{$cat_title}</a></li>";
                }
                ?>

            </ul>

            <!-- Move the Registration and ADMIN links to the right -->
            <ul class="nav navbar-nav" style="float: right">
                <li><a href="./contact.php">Contact</a></li>
                <?php
                if (isLoggedIn()) {
                        echo "<li><a href='./admin/posts.php?source=add_post'>Add Post</a></li>";
                }
                else{
                    echo "";
                }
                ?>
                <?php
                if (isset($_SESSION['user_role'])) {
                    if (isset($_GET['p_id'])) {
                        $the_post_id = $_GET['p_id'];
                        echo "<li><a href='./admin/posts.php?source=edit_post&p_id={$the_post_id}'>Edit Post</a></li>";
                    }
                }
                ?>

                <?php if(isLoggedIn()): ?>
                    <li><a href="admin">ADMIN</a></li>
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-user"></i> <small><?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?></small> <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="./admin/profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="./includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Logout</a>
                        </li>
                    </ul>
                </li>
                <?php else: ?>
                    <li><a href="./login.php">Login</a></li>
                    <li><a href="./registration.php">Create Account</a></li>
                <?php endif; ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
<!--    </div>-->
    <!-- /.container -->
</nav>