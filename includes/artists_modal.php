
<?php // INSERT INTO CATEGORIES QUERY
insert_artist($db);
?>

<!-- Trigger the modal with a button -->
<!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>-->

<!-- Modal -->
<div id="artistModal" class="modal fade" role="dialog">
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
                    <input class="btn btn-primary" type="submit" name="submit" value="Submit">
                    <a class="btn btn-danger" href="artists.php" name="Add">Cancel</a>
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
<div id="deleteModal" class="modal fade" role="dialog">
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