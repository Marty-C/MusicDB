<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

    <!-- Navigation -->

    <?php include "includes/admin_navigation.php"; ?>

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div>
                    <h1 class="page-header" style="text-align: center; font-size: 30px">
                        Groups
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12 bodycontainer">

                    <?php include "includes/band_modal.php" ?>

                    <?php // UPDATE AND INCLUDE QUERY

                    if(isset($_GET['Edit'])) {

                        $band_id = $_GET['Edit'];

                        include "includes/update_bands.php";

                    }

                    ?>

                    <?php // ADD QUERY

                    if(isset($_GET['members'])) {

                        $band_id = $_GET['members'];

                        include "includes/members_bands.php";

                    }

                    ?>

                    <a class="btn btn-danger pull-right" href="group.php" name="Add">Cancel</a>
                    <a rel='$band_id' href='javascript:void(0)' class='btn btn-primary Add_Band_link pull-right' '>Add Group</a>
                    <a href='' class='btn btn-primary getfile pull-left' '>Print</a>

                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Group Name</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <thead>
                        <tr>
                            <th><input autocomplete='off' class='filter form-control input-sm' name='Group Name' placeholder='Group Name' data-col='Group Name'/></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>

                        <tbody>


<?php // DELETE FROM CATEGORIES QUERY
findAllBands($db);
?>

<?php // DELETE FROM CATEGORIES QUERY
deleteBand($db);
?>
<?php // DELETE ARTIST MEMBERSHIP FROM A BAND
removeMember($db);
?>

<script>

    $(document).ready(function(){

        $(".Add_Band_link").on('click', function () {

            var id = $(this).attr("rel");

            var add_url = "group.php?Add="+ id +" ";

            $(".modal_add_link").attr("href", add_url);

            $("#bandModal").modal('show');

        });

    });

    $(document).ready(function(){

        $(".band_delete_link").on('click', function () {

            var id = $(this).attr("rel");

            var delete_url = "group.php?delete="+ id +" ";

            $(".modal_delete_link").attr("href", delete_url);

            $("#deleteBandModal").modal('show');

        });

    });

    $('.getfile').click(
        function() {
            exportTableToCSV.apply(this, [$('.table'), 'filename.csv']);
        });

    $('.getmembers').click(
        function() {
            exportTableToCSV.apply(this, [$('#members'), 'filename.csv']);
        });

</script>

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