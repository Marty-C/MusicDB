
<?php
track_artist($db);
track_band($db);
track_genre($db);
track_format($db);
?>

<!-- Trigger the modal with a button -->
<!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>-->

<!-- Modal -->
<div id="addartistModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center">Add Artist</h4>
            </div>

            <div class="container">
                <div class="col-xs-5">
            <form action="" method="post">
                <div class="form-group">
                    <label for="artist_fname">Add Artist</label>
                    <input type="text" class="form-control" name="artist_fname" placeholder="Enter First Name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="artist_lname" placeholder="Enter Last Name">
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" name="finish" value="Submit">
                    <a class="btn btn-danger" href="add_track.php" name="Add">Cancel</a>
                </div>


            </form>
            </div>
            </div>
            <!--<div class="modal-footer">
                <a href="" class="btn btn-danger modal_add_link">Add</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>-->
        </div>

    </div>
</div>


<!-- Modal -->
<div id="addbandModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center">Add Group</h4>
            </div>

            <div class="container">
                <div class="col-xs-5">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="artist_fname">Add Group</label>
                            <input type="text" class="form-control" name="band_name" placeholder="Enter Group Name">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="add_group" value="Submit">
                            <a class="btn btn-danger" href="add_track.php" name="Add">Cancel</a>
                        </div>


                    </form>
                </div>
            </div>
            <!--<div class="modal-footer">
                <a href="" class="btn btn-danger modal_add_link">Add</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>-->
        </div>

    </div>
</div>


<!-- Modal -->
<div id="addgenreModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center">Add Genre</h4>
            </div>

            <div class="container">
                <div class="col-xs-5">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="artist_fname">Add Genre</label>
                            <input type="text" class="form-control" name="genre_name" placeholder="Enter Genre">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="add_genre" value="Submit">
                            <a class="btn btn-danger" href="add_track.php" name="Add">Cancel</a>
                        </div>


                    </form>
                </div>
            </div>
            <!--<div class="modal-footer">
                <a href="" class="btn btn-danger modal_add_link">Add</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>-->
        </div>

    </div>
</div>


<!-- Modal -->
<div id="addformatModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center">Add Genre</h4>
            </div>

            <div class="container">
                <div class="col-xs-5">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="artist_fname">Add Format</label>
                            <input type="text" class="form-control" name="format_name" placeholder="Enter Format">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="add_format" value="Submit">
                            <a class="btn btn-danger" href="add_track.php" name="Add">Cancel</a>
                        </div>


                    </form>
                </div>
            </div>
            <!--<div class="modal-footer">
                <a href="" class="btn btn-danger modal_add_link">Add</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>-->
        </div>

    </div>
</div>