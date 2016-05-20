<?php // INSERT INTO CATEGORIES QUERY
insert_artist($db);
?>

<form action="" method="post">
    <div class="form-group">
        <label for="artist_fname">Add Artist</label>
        <input type="text" class="form-control" name="artist_fname" placeholder="Enter First Name">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="artist_lname" placeholder="Enter Last Name">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="submit" value="Add Artist">
        <a class="btn btn-danger" href="artists.php" name="Add">Cancel</a>
    </div>


</form>

