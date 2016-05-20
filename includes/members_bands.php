<pre style="background-color: lightgoldenrodyellow">
<h1 style="text-align: center; color: purple"><?php getName($db); ?></h1>
<table class="table table-bordered table-hover" id="members">
    <thead class="thead-inverse">
    <tr>
        <th>Group Name</th>
        <th>First Name</th>
        <th>Last Name</th>
    </tr>
    </thead>

    <tbody>


    <?php
    global $band_name;
    membersOfBands($db);
    ?>    
    </tbody>
</table>
</pre>
<form action="" method="post">
    <div class="form-group">
<select multiple name="name[]" id="" class="form-control">
    <?php showAllData($db);    ?>
</select>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="addMember" value="Add Member">
        <a class="btn btn-danger" href="group.php">Cancel</a>
        <a href='' class='btn btn-primary getmembers pull-right' '>Print</a>
    </div>

</form>

<?php

if(isset($_POST['addMember'])) {

    $id = $_POST['name'];

    foreach($id as $nameid) {

        $band = $_GET['members'];
        $query = "insert into membership(bandid, nameid) VALUES ($band, $nameid)";
        $result = mysqli_query($db, $query);

    } if (!$result) {
        die('Delete Failed' . mysqli_error($db));
    } else {

        //echo "<p style='font-size: 30px; color: blue'>Members Successfully Added";
        header("refresh:0;url=group.php?members=$band");

    }

}

?>




