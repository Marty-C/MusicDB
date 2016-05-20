
<?php // INSERT INTO CATEGORIES QUERY
insert_band($db);
?>

<!-- Trigger the modal with a button -->
<!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>-->

<!-- Modal -->
<div id="bandModal" class="modal fade" role="dialog">
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
                    <label for="band_name">Add Group</label>
                    <input type="text" class="form-control" name="band_name" placeholder="Enter Group Name">
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" name="submit" value="Submit">
                    <a class="btn btn-danger" href="group.php">Cancel</a>
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
<div id="deleteBandModal" class="modal fade" role="dialog">
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