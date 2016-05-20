
<form action="" method="post" name="tcol">
                            <div class="form-group">
                                <label for="cat_title">Edit Track</label>
                                <?php  // SELECT QUERY TO SEND VALUE TO FORM INPUT FIELD FOR EDITING

                                if(isset($_GET['Edit'])) {

                                    $track_id = $_GET['Edit'];
                                    $query =    "select n.name_id, t.track_id, t.title, t.Location, n.fname, n.lname, b.band_name,
                                                concat_ws('', n1.fname, ' ', n1.lname) AS lyricist,
                                                concat_ws('', n2.fname, ' ', n2.lname) AS composer,
                                                g.genre_cat, f.format_cat, t.duration, t.released
                                                FROM names n
                                                join track t
                                                on n.name_id=t.artist_name
                                                left join band b
                                                ON t.artist_band=b.band_id
                                                left join names n1
                                                ON n1.name_id=t.lyricist
                                                left outer join names n2
                                                ON n2.name_id=t.composer
                                                left join genre g
                                                ON t.genre=g.genre_id
                                                left outer join format f
                                                ON f.format_id=t.format 
                                                WHERE track_id={$track_id}";
                                    $edit_artist = mysqli_query($db, $query);

                                    while($row = mysqli_fetch_assoc($edit_artist)) {
                                        $name_id = $row['name_id'];
                                        $title = $row['title'];
                                        $fname = $row['fname'];
                                        $lname = $row['lname'];
                                        $band = $row['band_name'];
                                        $duration = $row['duration'];
                                        $released = $row['released'];
                                        $Location = $row['Location'];

                                        ?>

                                    <?php   }} ?>

<?php // UPDATE QUERY

if(isset($_POST['update_track'])) {

    $title = mysqli_real_escape_string($db, $_POST['title']);
    $fname = mysqli_real_escape_string($db, $_POST['fname']);
    $lname = mysqli_real_escape_string($db, $_POST['lname']);
    $band = mysqli_real_escape_string($db, $_POST['band_name']);
    $duration = $_POST['duration'];
    $released = $_POST['released'];
    $Location = mysqli_real_escape_string($db, $_POST['Location']);
    $query = "UPDATE names SET fname='{$fname}', lname='{$lname}' WHERE  name_id=$name_id";
    $query2 = "update track set title='{$title}', duration='$duration', released='$released' where track_id=$track_id";
    $update_artist = mysqli_query($db, $query);
    $update_artist1 = mysqli_query($db, $query2);

    if (!$update_artist) {
        die('Query Failed' . mysqli_error($db));
    } else {

        echo "<p style='font-size: 30px; color: green'>Artist Successfully Updated";
        header("refresh:1;url=tracks.php");

    }


}

?>

        <input value="<?php if(isset($title)){echo $title;}  ?>" type="text" class="form-control" name="title" placeholder="Edit First Name">
</div>
<div class="form-group">
        <input value="<?php if(isset($fname)){echo $fname;}  ?>" type="text" class="form-control" name="fname" placeholder="Edit Last Name">
</div>
    <div class="form-group">
        <input value="<?php if(isset($lname)){echo $lname;}  ?>" type="text" class="form-control" name="lname" placeholder="Edit Last Name">
    </div>
    <div class="form-group">
        <input value="<?php if(isset($band)){echo $band;}  ?>" type="text" class="form-control" name="band_name" placeholder="Edit Last Name">
    </div>
    <div class="form-group">
        <input value="<?php if(isset($duration)){echo $duration;}  ?>" type="text" class="form-control" name="duration" placeholder="Edit Last Name">
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
        <input value="<?php if(isset($Location)){echo $Location;}  ?>" type="text" class="form-control" name="Location" placeholder="Edit Last Name">
    </div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" name="update_track" value="Update">
    <a class="btn btn-danger" href="tracks.php" name="Add">Cancel</a>
</div>

</form>
