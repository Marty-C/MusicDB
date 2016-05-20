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
                        Add Track
                    </h1>

                    <?php include "includes/add_tracks_modal.php" ?>

                    <?php  insert_track($db); ?>

                    <div class="container">
                        <div class="col-xs-4 col-lg-offset-4">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="track_name">Track Name</label>
                                    <input type="text" class="form-control" name="track_name" placeholder="Enter Track Name">
                                </div>
                                <div class="inline pull-right">
                                    <a rel='$name_id' href='javascript:void(0)' class='btn btn-success Add_link' '>Add Artist</a>
                                </div>
                                <span class="inline">
                                <div class="form-group">
                                <label for="name">Select Artitst</label>
                                <select multiple name="name" id="" class="form-control inline">
                                    <?php showAllData($db);    ?>
                                </select>
                                </div>
                                </span>
                                <div class="inline pull-right">
                                    <a rel='$band_id' href='javascript:void(0)' class='btn btn-success Add_Group' '>Add Group</a>
                                </div>
                                <div class="form-group">
                                    <label for="group">Select Group</label>
                                    <select multiple name="group" id="" class="form-control">
                                        <?php showAllBands($db);    ?>
                                    </select>
                                </div>
                                <div class="inline pull-right">
                                    <a rel='$name_id' href='javascript:void(0)' class='btn btn-success Add_link' '>Add Lyricist</a>
                                </div>
                                <div class="form-group">
                                    <label for="lyricist">Select Lyricist</label>
                                    <select multiple name="lyricist" id="" class="form-control">
                                        <?php showAllData($db);    ?>
                                    </select>
                                </div>
                                <div class="inline pull-right">
                                    <a rel='$name_id' href='javascript:void(0)' class='btn btn-success Add_link' '>Add Composer</a>
                                </div>
                                <div class="form-group">
                                    <label for="composer">Select Composer</label>
                                    <select multiple name="composer" id="" class="form-control">
                                        <?php showAllData($db);    ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="duration">Duration</label>
                                    <input type="text" class="form-control" name="duration" placeholder="Enter Duration">
                                </div>
                                <div class="form-group">
                                    <label for="date">Year Released</label>
                                    <?php
                                    $already_selected_value = 2000;
                                    echo '<select multiple name="date" class="form-control">';
                                    foreach (range(date('Y'), 1930) as $x) {
                                        echo '<option value="'.$x.'">'.$x.'</option>';
                                    }
                                    echo '</select>';
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <input type="text" class="form-control" name="location" placeholder="Location Recorded">
                                </div>
                                <div class="inline pull-right">
                                    <a rel='$genre_id' href='javascript:void(0)' class='btn btn-success Add_Genre' '>Add Genre</a>
                                </div>
                                <div class="form-group">
                                    <label for="genre">Select Genre</label>
                                    <select multiple name="genre" id="" class="form-control">
                                        <?php showAllGenres($db);    ?>
                                    </select>
                                </div>
                                <div class="inline pull-right">
                                    <a rel='$format_id' href='javascript:void(0)' class='btn btn-success Add_Format' '>Add Format</a>
                                </div>
                                <div class="form-group">
                                    <label for="format">Select Format</label>
                                    <select multiple name="format" id="" class="form-control">
                                        <?php showAllFormats($db);    ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Track">
                                    <a class="btn btn-danger" href="tracks.php" name="Add">Cancel</a>
                                </div>



                            </form>
                        </div>
                    </div>

                    <script>

                            $(document).ready(function(){

                                $(".Add_link").on('click', function () {

                                    var id = $(this).attr("rel");

                                    var add_url = "add_track.php?Add="+ id +" ";

                                    $(".modal_add_link").attr("href", add_url);

                                    $("#addartistModal").modal('show');

                                });

                            });


                            $(document).ready(function(){

                                $(".Add_Group").on('click', function () {

                                    var id = $(this).attr("rel");

                                    var add_url = "add_track.php?Add="+ id +" ";

                                    $(".modal_add_link").attr("href", add_url);

                                    $("#addbandModal").modal('show');

                                });

                            });


                            $(document).ready(function(){

                                $(".Add_Format").on('click', function () {

                                    var id = $(this).attr("rel");

                                    var delete_url = "add_track.php?delete="+ id +" ";

                                    $(".modal_add_link").attr("href", delete_url);

                                    $("#addformatModal").modal('show');

                                });

                            });

                            $(document).ready(function(){

                                $(".Add_Genre").on('click', function () {

                                    var id = $(this).attr("rel");

                                    var delete_url = "add_track.php?delete="+ id +" ";

                                    $(".modal_add_link").attr("href", delete_url);

                                    $("#addgenreModal").modal('show');

                                });

                            });

                        </script>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"; ?>