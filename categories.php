<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

    <!-- Navigation -->

    <?php include "includes/admin_navigation.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">


                    <h1 class="page-header">
                        Admin
                        <small>Marty</small>
                    </h1>

                    <div class="col-xs-6">

                        <?php // INSERT INTO CATEGORIES QUERY
                        insert_categories($db);
                        ?>

                        <form action="" method="post">
                            <div class="form-group">
                                <label for="artist_fname">Add Artist</label>
                                <input type="text" class="form-control" name="artist_fname" placeholder="Enter First Name">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Artist">
                            </div>


                        </form>

                        <?php // UPDATE AND INCLUDE QUERY

                        if(isset($_GET['Edit'])) {

                            $cat_id = $_GET['Edit'];

                            include "includes/update_categories.php";

                        }

                        ?>

                    </div><!-- Add Category Form-->

                    <div class="col-xs-6">
                        <div class="bodycontainer">
                        <label for="table">Category Table</label>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category</th>
                                </tr>
                            </thead>
                            <tbody>

<?php //FIND ALL CATEGORIES QUERY
findAllCategories($db);
?>

<?php // DELETE FROM CATEGORIES QUERY
deleteCategory($db);
?>


                            </tbody>
                        </table>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"; ?>