
<form action="" method="post">
                            <div class="form-group">
                                <label for="album_name">Edit Album</label>
                                <?php  // SELECT QUERY TO SEND VALUE TO FORM INPUT FIELD FOR EDITING

                                if(isset($_GET['Edit'])) {

                                    $album_id = $_GET['Edit'];
                                    $query = "SELECT * FROM album WHERE album_id= {$album_id} ";
                                    $edit_album = mysqli_query($db, $query);

                                    while($row = mysqli_fetch_assoc($edit_album)) {
                                        $album_id = $row['album_id'];
                                        $album_name= $row['name'];
                                        $duration = $row['duration'];
                                        $released = $row['released'];
                                        $status = $row['status'];

                                        ?>

                                    <?php   }} ?>

<?php // UPDATE QUERY

if(isset($_POST['update_album'])) {

    $album_name = mysqli_real_escape_string($db, $_POST['album_name']);
    $duration = $_POST['duration'];
    $released = $_POST['released'];
    $status = mysqli_real_escape_string($db, $_POST['status']);
    $query = "UPDATE album SET name='{$album_name}', duration='{$duration}', released={$released}, status='{$status}' WHERE  album_id = {$album_id}";
    $update_album = mysqli_query($db, $query);

    if (!$update_album) {
        die('Query Failed' . mysqli_error($db));
    } else {

        echo "<p style='font-size: 30px; color: green'>Album Successfully Updated";
        header("refresh:1;url=albums.php");

    }


}

?>

        <input value="<?php if(isset($album_name)){echo $album_name;}  ?>" type="text" class="form-control" name="album_name" placeholder="Edit album Name">
</div>
<div class="form-group">
    <label for="duration">Duration</label>
    <input value="<?php if(isset($duration)){echo $duration;}  ?>" type="text" class="form-control" name="duration" placeholder="Edit Duration">
</div>
    <div class="form-group">
        <label for="date">Year Released</label>
        <?php

        if(isset($released)) {

            $date = $released;

            echo '<select multiple class="form-control" name="released">';
            echo "<option value='$released' selected>$released</option>";
            foreach (range(date('Y'), 1930) as $x) {
                echo '<option value="' . $x . '">' . $x . '</option>';
            }
            echo '</select>';
        }

        ?>
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <input value="<?php if(isset($status)){echo $status;}  ?>" type="text" class="form-control" name="status" placeholder="Edit Status">
    </div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" name="update_album" value="Update">
    <a class="btn btn-danger" href="albums.php">Cancel</a>
</div>


</form>
