<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

    <!-- Navigation -->

    <?php include "includes/admin_navigation.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">


                    <h1 class="page-header">
                        Admin
                        <small>Marty</small>
                    </h1>


                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <!--<th>Category</th>
                            <th>Status</th>
                            <th>Image</th>
                            <th>Tags</th>
                            <th>Comments</th>
                            <th>Date</th>-->
                        </tr>
                        </thead>

                        <tbody>
<?php

$query = "SELECT * FROM names";
$select_posts = mysqli_query($db, $query);

while($row = mysqli_fetch_assoc($select_posts)) {
    $artist_id = $row['name_id'];
    $artist_fname = $row['fname'];
    $artist_lname = $row['lname'];
    /*$post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_tags = $row['post_tags'];
    $post_comment_count = $row['post_comment_count'];
    $post_date = $row['post_date'];*/

    echo "<tr>";
    echo "<td>{$artist_id}</td>";
    echo "<td>{$artist_fname}</td>";
    echo "<td>{$artist_lname}</td>";
    /*echo "<td>{$post_category_id}</td>";
    echo "<td>{$post_status}</td>";
    echo "<td><img class='img-responsive' src='../images/$post_image' alt='image'></td>";
    echo "<td>{$post_tags}</td>";
    echo "<td>{$post_comment_count}</td>";
    echo "<td>{$post_date}</td>";*/
    echo "</tr>";
}



?>
<!--
                            <th>11</th>
                            <th>Marty</th>
                            <th>Bootstrap</th>
                            <th>Bootstrap</th>
                            <th>Status</th>
                            <th>Image</th>
                            <th>Tags</th>
                            <th>Comments</th>
                            <th>Date</th>-->

                        </tbody>
                    </table>



                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"; ?>