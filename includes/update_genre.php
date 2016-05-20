<form action="" method="post">
    <div class="form-group">
        <label for="cat_title">Edit Genre</label>
        <?php  // SELECT QUERY TO SEND VALUE TO FORM INPUT FIELD FOR EDITING

        if(isset($_GET['Edit'])) {

            $genre_id = $_GET['Edit'];
            $query = "SELECT * FROM genre WHERE genre_id= {$genre_id} ";
            $edit_genre = mysqli_query($db, $query);

            while($row = mysqli_fetch_assoc($edit_genre)) {
                $genre_id = $row['genre_id'];
                $genre_title = $row['genre_cat'];

                ?>

                <input value="<?php if(isset($genre_title)){echo $genre_title;}  ?>" type="text" class="form-control" name="genre_title" placeholder="Edit Genre">

            <?php   }}  ?>

        <?php // UPDATE QUERY

        if(isset($_POST['update_genre'])) {

            $genre_title = mysqli_real_escape_string($db, $_POST['genre_title']);
            $query = "UPDATE genre SET genre_cat = '{$genre_title}' WHERE  genre_id = {$genre_id}";
            $update = mysqli_query($db, $query);

            if (!$update) {
                die('Delete Failed' . mysqli_error($db));
            } else {

                echo "<p style='font-size: 30px; color: blue'>Genre Successfully Updated";
                header("refresh:1;url=genre.php");

            }


        }

        ?>

    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_genre" value="Update">
        <a class="btn btn-danger" href="genre.php" name="Add">Cancel</a>
    </div>


</form>
