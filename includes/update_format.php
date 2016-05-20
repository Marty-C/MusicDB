<form action="" method="post">
    <div class="form-group">
        <label for="cat_title">Edit Format</label>
        <?php  // SELECT QUERY TO SEND VALUE TO FORM INPUT FIELD FOR EDITING

        if(isset($_GET['Edit'])) {

            $format_id = $_GET['Edit'];
            $query = "SELECT * FROM format WHERE format_id= {$format_id} ";
            $edit_format = mysqli_query($db, $query);

            while($row = mysqli_fetch_assoc($edit_format)) {
                $format_id = $row['format_id'];
                $format_title = $row['format_cat'];

                ?>

                <input value="<?php if(isset($format_title)){echo $format_title;}  ?>" type="text" class="form-control" name="format_title" placeholder="Edit Format">

            <?php   }}  ?>

        <?php // UPDATE QUERY

        if(isset($_POST['update_format'])) {

            $format_title = mysqli_real_escape_string($db, $_POST['format_title']);
            $query = "UPDATE format SET format_cat = '{$format_title}' WHERE  format_id = {$format_id}";
            $update = mysqli_query($db, $query);

            if (!$update) {
                die('Delete Failed' . mysqli_error($db));
            } else {

                echo "<p style='font-size: 30px; color: blue'>Successfully Updated";
                header("refresh:1;url=format.php");

            }


        }

        ?>

    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_format" value="Update">
        <a class="btn btn-danger" href="format.php" name="Add">Cancel</a>
    </div>


</form>
