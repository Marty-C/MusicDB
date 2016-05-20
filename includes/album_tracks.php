<pre style="background-color: lightgoldenrodyellow">
<h1 style="text-align: center; color: purple"><?php getAlbumName($db); ?></h1>
<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Album ID</th>
        <th>Album Name</th>
        <th>Track Name</th>
    </tr>
    </thead>

    <tbody>


    <?php
    global $album_name;
    albumTrack($db);
    ?>    
    </tbody>
</table>
</pre>
<form action="" method="post">
    <div class="form-group">
<select multiple name="name[]" id="" class="form-control">
    <?php showAllTracks($db);    ?>
</select>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="addTrack" value="Add Track">
        <a class="btn btn-danger" href="albums.php">Cancel</a>
    </div>

</form>

<?php

if(isset($_POST['addTrack'])) {

    $id = $_POST['name'];

    foreach($id as $track) {
        
        $album = $_GET['members'];
        $query = "insert into trk_alb(album, track) VALUES ($album, $track)";
        $result = mysqli_query($db, $query);

    } if (!$result) {
        die('Delete Failed' . mysqli_error($db));
    } else {

        //echo "<p style='font-size: 30px; color: blue'>Members Successfully Added";
        header("refresh:0;url=albums.php?members=$album");

    }

}

?>




