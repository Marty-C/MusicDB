
<form action="" method="post">
                            <div class="form-group">
                                <label for="cat_title">Edit Artist</label>
                                <?php  // SELECT QUERY TO SEND VALUE TO FORM INPUT FIELD FOR EDITING

                                if(isset($_GET['Edit'])) {

                                    $name_id = $_GET['Edit'];
                                    $query = "SELECT * FROM names WHERE name_id= {$name_id} ";
                                    $edit_artist = mysqli_query($db, $query);

                                    while($row = mysqli_fetch_assoc($edit_artist)) {
                                        $name_id = $row['name_id'];
                                        $fname = $row['fname'];
                                        $lname = $row['lname'];

                                        ?>

                                    <?php   }} ?>

<?php // UPDATE QUERY

if(isset($_POST['update_artist'])) {

    $fname = mysqli_real_escape_string($db, $_POST['fname']);
    $lname = mysqli_real_escape_string($db, $_POST['lname']);
    $query = "UPDATE names SET fname='{$fname}', lname='{$lname}' WHERE  name_id = {$name_id}";
    $update_artist = mysqli_query($db, $query);

    if (!$update_artist) {
        die('Query Failed' . mysqli_error($db));
    } else {

        echo "<p style='font-size: 30px; color: green'>Artist Successfully Updated";
        header("refresh:1;url=artists.php");

    }


}

?>

        <input value="<?php if(isset($fname)){echo $fname;}  ?>" type="text" class="form-control" name="fname" placeholder="Edit First Name">
</div>
<div class="form-group">
        <input value="<?php if(isset($lname)){echo $lname;}  ?>" type="text" class="form-control" name="lname" placeholder="Edit Last Name">
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" name="update_artist" value="Update">
    <a class="btn btn-danger" href="artists.php" name="Add">Cancel</a>
</div>


</form>
