<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

    <!-- Navigation -->

    <?php include "includes/admin_navigation.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">


                    <h1 class="page-header" style="text-align: center; font-size: 30px">
                        Format
                    </h1>

                    <div class="col-xs-6">

                        <?php  include "includes/format_modal.php"; ?>

                        <?php // INSERT INTO FORMATS QUERY
                        insertFormat($db);
                        ?>

                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat_title">Add Format</label>
                                <input type="text" class="form-control" name="format_title" placeholder="Enter Format Name">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Format">
                            </div>


                        </form>

                        <?php // UPDATE AND INCLUDE QUERY

                        if(isset($_GET['Edit'])) {

                            $format_id = $_GET['Edit'];

                            include "includes/update_format.php";

                        }

                        ?>

                    </div><!-- Add Format Form-->

                    <div class="col-xs-6">
                        <div class="bodycontainer">
                            <label for="table">Format Table</label>
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Format</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php //FIND ALL FORMATS QUERY
                                findAllFormats($db);
                                ?>

                                <?php // DELETE FROM FORMATS QUERY
                                deleteFormat($db);
                                ?>

                                <script>


                                    $(document).ready(function(){

                                        $(".delete_link").on('click', function () {

                                            var id = $(this).attr("rel");

                                            var delete_url = "format.php?delete="+ id +" ";

                                            $(".modal_delete_link").attr("href", delete_url);

                                            $("#formatModal").modal('show');

                                        });

                                    });
                                </script>


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