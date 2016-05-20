
<?php // INSERT INTO CATEGORIES QUERY
insert_album($db);
?>

<!-- Trigger the modal with a button -->
<!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>-->

<!-- Modal -->
<div id="albumModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center">Add Album</h4>
            </div>

            <div class="container">
                <div class="col-xs-5">
            <form action="" method="post">
                <div class="form-group">
                    <label for="band_name">Add Album</label>
                    <input type="text" class="form-control" name="album_name" placeholder="Enter Album Name">
                </div>
                <div class="form-group">
                    <label for="band_name">Duration</label>
                    <input type="text" class="form-control" name="duration" placeholder="Enter Duration">
                </div>
                <!--<div class="form-group">
                    <label for="band_name">Date Released</label>
                    <input type="text" class="form-control" name="released" placeholder="Enter Release Date">
                </div>-->
                <div class="form-group">
                    <label for="date">Year Released</label>
                    <?php
                    $already_selected_value = 2000;
                    echo '<select multiple name="released" class="form-control">';
                    foreach (range(date('Y'), 1930) as $x) {
                        echo '<option value="'.$x.'">'.$x.'</option>';
                    }
                    echo '</select>';
                    ?>
                </div>
                <div class="form-group">
                    <label for="band_name">Status</label>
                    <input type="text" class="form-control" name="status" placeholder="Enter Status">
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" name="submit" value="Submit">
                    <a class="btn btn-danger" href="albums.php">Cancel</a>
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
<div id="deleteAlbumModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center">Delete Confirmation</h4>
            </div>
            <div class="modal-body text-danger text-center">
                <h2>Confirm Delete</h2>
            </div>
            <div class="modal-footer">
                <a href="" class="btn btn-danger modal_delete_link">Delete</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>

    </div>
</div>