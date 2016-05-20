<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

    <!-- Navigation -->

    <?php include "includes/admin_navigation.php"; ?>

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div>
                <h1 class="page-header" style="text-align: center; font-size: 30px">
                    Artists
                </h1>
                </div>
            </div>
        </div>
    </div>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12 bodycontainer">

                    <?php include "includes/artists_modal.php" ?>

                    <?php // UPDATE AND INCLUDE QUERY

                    if(isset($_GET['Edit'])) {

                        $name_id = $_GET['Edit'];

                        include "includes/update_artists.php";

                    }

                    ?>

                    <a class="btn btn-danger pull-right" href="artists.php" name="Add">Cancel</a>
                    <a rel='$name_id' href='javascript:void(0)' class='btn btn-primary Add_link pull-right' '>Add Artists</a>
                    <a href='' class='btn btn-primary getfile pull-left' '>Print</a>
                    <table class="table table-bordered table-hover" id="table">
                        <thead>
                        <tr>
                            <th id="include">Artist Name</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <thead>
                        <tr>
                            <th><input autocomplete='off' class='filter form-control input-sm' name='Artist Name' placeholder='Artist Name' data-col='Artist Name'/></th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>                       


                        <?php // DELETE FROM CATEGORIES QUERY
                        findAllCategories($db);
                        ?>

                        <?php // DELETE FROM CATEGORIES QUERY
                        $url = "artists.php";
                        deleteArtist($db, $url);
                        ?>

                        <script>

                            $(document).ready(function(){

                                $(".Add_link").on('click', function () {

                                    var id = $(this).attr("rel");

                                    var add_url = "artists.php?Add="+ id +" ";

                                    $(".modal_add_link").attr("href", add_url);

                                    $("#artistModal").modal('show');

                                });

                            });

                            $(document).ready(function(){

                                $(".artist_delete_link").on('click', function () {

                                    var id = $(this).attr("rel");

                                    var delete_url = "artists.php?delete="+ id +" ";

                                    $(".modal_delete_link").attr("href", delete_url);

                                    $("#deleteModal").modal('show');

                                });

                            });


                            $('.getfile').click(
                                function() {
                                    exportTableToCSV.apply(this, [$('#table'), 'filename.csv']);
                                });

                        </script>

                        </tbody>
                    </table>


                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>

<?php include "includes/admin_footer.php"; ?>