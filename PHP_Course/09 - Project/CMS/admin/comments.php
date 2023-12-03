<?php include "includes/admin_header.php" ?>
<?php

if(!is_admin($_SESSION['username'])){

    header("Location: index.php");
    exit(); // Make sure to exit after a header redirect

}


?>

<div id="wrapper">



    <!-- Navigation -->

    <?php include "includes/admin_navbar.php" ?>




    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">
                        Welcome,
                        <small><?php echo $_SESSION['username'] ?></small>
                    </h1>


                    <?php

                    if (isset($_GET['source'])) {

                        $source = escape($_GET['source']);
                    } else {

                        $source = '';
                    }

                    switch ($source) {

                        case '200';
                            echo "NICE 200";
                            break;

                        default:

                            include "includes/view_all_comments.php";

                            break;
                    }








                    ?>






                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>


    <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php" ?>