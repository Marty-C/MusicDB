
<form action="" method="post">
                            <div class="form-group">
                                <label for="cat_title">Edit Group</label>
                                <?php  // SELECT QUERY TO SEND VALUE TO FORM INPUT FIELD FOR EDITING

                                if(isset($_GET['Edit'])) {

                                    $band_id = $_GET['Edit'];
                                    $query = "SELECT * FROM band WHERE band_id= {$band_id} ";
                                    $edit_artist = mysqli_query($db, $query);

                                    while($row = mysqli_fetch_assoc($edit_artist)) {
                                        $band_id = $row['band_id'];
                                        $band_name= $row['band_name'];

                                        ?>

                                    <?php   }} ?>

<?php // UPDATE QUERY

if(isset($_POST['update_band'])) {

    $band_name = mysqli_real_escape_string($db, $_POST['band_name']);
    $query = "UPDATE band SET band_name='{$band_name}' WHERE  band_id = {$band_id}";
    $update_band = mysqli_query($db, $query);

    if (!$update_band) {
        die('Query Failed' . mysqli_error($db));
    } else {

        echo "<p style='font-size: 30px; color: green'>Group Successfully Updated";
        header("refresh:1;url=group.php");

    }


}

?>

        <input value="<?php if(isset($band_name)){echo $band_name;}  ?>" type="text" class="form-control" name="band_name" placeholder="Edit Group Name">
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" name="update_band" value="Update">
    <a class="btn btn-danger" href="group.php">Cancel</a>
</div>


</form>
