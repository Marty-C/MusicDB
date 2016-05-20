<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

    <!-- Navigation -->

    <?php include "includes/admin_navigation.php"; ?>

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div>
                    <h1 class="page-header" style="text-align: center; font-size: 30px">
                        Albums
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

                    <?php include "includes/album_modal.php" ?>

                    <?php // UPDATE AND INCLUDE QUERY

                    if(isset($_GET['Edit'])) {

                        $album_id = $_GET['Edit'];

                        include "includes/update_albums.php";

                    }

                    ?>

                    <?php // ADD QUERY

                    if(isset($_GET['members'])) {

                        $album_id = $_GET['members'];

                        include "includes/album_tracks.php";

                    }

                    ?>

                    <a class="btn btn-danger pull-right" href="albums.php" name="Add">Cancel</a>
                    <a rel='$album_id' href='javascript:void(0)' class='btn btn-primary Add_Album_link pull-right' '>Add Album</a>

                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Album Name</th>
                            <th>Duration</th>
                            <th>Released</th>
                            <th>Status</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <thead>
                        <tr>
                            <th><input autocomplete='off' class='filter form-control input-sm' name='Album Name' placeholder='Album Name' data-col='Album Name'/></th>
                            <th><input autocomplete='off' class='filter form-control input-sm' name='Duration' placeholder='Duration' data-col='Duration'/></th>
                            <th><input autocomplete='off' class='filter form-control input-sm' name='Released' placeholder='Released' data-col='Released'/></th>
                            <th><input autocomplete='off' class='filter form-control input-sm' name='Status' placeholder='Status' data-col='Status'/></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>

                        <tbody>


<?php // DELETE FROM CATEGORIES QUERY
findAllAlbums($db);
?>

<?php // DELETE FROM CATEGORIES QUERY
deleteAlbum($db);
?>
<?php // DELETE ARTIST MEMBERSHIP FROM A BAND
removeTracks($db);
?>

<script>

    $(document).ready(function(){

        $(".Add_Album_link").on('click', function () {

            var id = $(this).attr("rel");

            var add_url = "albums.php?Add="+ id +" ";

            $(".modal_add_link").attr("href", add_url);

            $("#albumModal").modal('show');

        });

    });

    $(document).ready(function(){

        $(".album_delete_link").on('click', function () {

            var id = $(this).attr("rel");

            var delete_url = "albums.php?delete="+ id +" ";

            $(".modal_delete_link").attr("href", delete_url);

            $("#deleteAlbumModal").modal('show');

        });

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
    <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"; ?>