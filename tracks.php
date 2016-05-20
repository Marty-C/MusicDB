<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

    <!-- Navigation -->

    <?php include "includes/admin_navigation.php"; ?>

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div>
                    <h1 class="page-header" style="text-align: center; font-size: 30px">
                        Tracks
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

                    <?php include "includes/tracks_modal.php" ?>

                    <?php // UPDATE AND INCLUDE QUERY

                    if(isset($_GET['Edit'])) {

                        $track_id = $_GET['Edit'];

                        include "includes/update_track.php";

                    }

                    ?>
                    
                    <a class="btn btn-danger pull-right" href="tracks.php" name="Add">Cancel</a>
                    <a href='add_track.php' class='btn btn-primary Add_link pull-right' '>Add Track</a>
                    <a href='' class='btn btn-primary getfile pull-left' '>Print</a>

                    <table class="table table-bordered table-hover" style="word-break: break-all">
                        <thead id="head">
                        <tr>
                            <th>Song Title </th>
                            <th>Name</th>
                            <th>Group</th>
                            <th>Lyricist</th>
                            <th>Composer</th>
                            <th>Duration</th>
                            <th>Year Released</th>
                            <th id="location">Location</th>
                            <th id="genre">Genre</th>
                            <th id="format">Format</th>
                            <th></th>
                            <th></th>

                        </tr>
                        </thead>
                        <thead id="head">
                        <tr>
                            <th class="col-xs-1"><input autocomplete='off' class='filter form-control input-sm' name='Song Title' placeholder='Song Title' data-col='Song Title'/></th>
                            <th class="col-xs-1"><input autocomplete='off' class='filter form-control input-sm' name='name' placeholder='Name' data-col='Name'/></th>
                            <th class="col-xs-1"><input autocomplete='off' class='filter form-control input-sm' name='Group' placeholder='Group' data-col='Group'/></th>
                            <th class="col-xs-1"><input autocomplete='off' class='filter form-control input-sm' name='Lyricist' placeholder='Lyricist' data-col='Lyricist'/></th>
                            <th class="col-xs-1"><input autocomplete='off' class='filter form-control input-sm' name='Composer' placeholder='Composer' data-col='Composer'/></th>
                            <th class="col-xs-1"><input autocomplete='off' class='filter form-control input-sm' name='Duration' placeholder='Duration' data-col='Duration'/></th>
                            <th class="col-xs-1"><input autocomplete='off' class='filter form-control input-sm' name='Year Released' placeholder='Year Released' data-col='Year Released'/></th>
                            <th id="location" class="col-xs-1"><input autocomplete='off' class='filter form-control input-sm' name='Location' placeholder='Location' data-col='Location'/></th>
                            <th id="genre" class="col-xs-1"><input autocomplete='off' class='filter form-control input-sm' name='Genre' placeholder='Genre' data-col='Genre'/></th></th>
                            <th id="format" class="col-xs-1"><input autocomplete='off' class='filter form-control input-sm' name='Format' placeholder='Format' data-col='Format'/></th></th>
                            <th></th>
                            <th></th>

                        </tr>
                        </thead>

                        <tbody>


                        <?php // DELETE FROM CATEGORIES QUERY
                        findAllTracks($db);
                        ?>

                        <?php // DELETE FROM CATEGORIES QUERY
                        deleteTrack($db);
                        ?>

                        <script>

                            $(document).ready(function(){

                                $(".Add_link").on('click', function () {

                                    var id = $(this).attr("rel");

                                    var add_url = "tracks.php?Add="+ id +" ";

                                    $(".modal_add_link").attr("href", add_url);

                                    $("#addTrackModal").modal('show');

                                });

                            });

                            $(document).ready(function(){

                                $(".track_delete_link").on('click', function () {

                                    var id = $(this).attr("rel");

                                    var delete_url = "tracks.php?delete="+ id +" ";

                                    $(".modal_delete_link").attr("href", delete_url);

                                    $("#deleteTrackModal").modal('show');

                                });

                            });

                            $('.getfile').click(
                                function() {
                                    exportTableToCSV.apply(this, [$('.table'), 'filename.csv']);

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