<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

    <!-- Navigation -->

    <?php include "includes/admin_navigation.php"; ?>

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div>
                    <h1 class="page-header" style="text-align: center; font-size: 30px">
                        Artists

                        <a rel='$name_id' href='javascript:void(0)' class='btn btn-primary Add_link pull-right' '>Add Artists</a>
                        <a href='' class='btn btn-primary getfile pull-right' '>Print</a>
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

                    <?php include "includes/artists_modal.php" ?>

                    <?php // UPDATE AND INCLUDE QUERY

                    if(isset($_GET['Edit'])) {

                        $name_id = $_GET['Edit'];

                        include "includes/update_artists.php";

                    }

                    ?>

                    <input class="form-control" type="text" id="search" placeholder="Type to search..." />
                    <script>
                        $('#search').on('keyup', function(e) {
                            if ('' != this.value) {
                                var reg = new RegExp(this.value, 'i'); // case-insesitive

                                $('.table tbody').find('tr').each(function() {
                                    var $me = $(this);
                                    if (!$me.children('td').text().match(reg)) {
                                        $me.hide();
                                    } else {
                                        $me.show();
                                    }
                                });
                            } else {
                                $('.table tbody').find('tr').show();
                            }
                        });
                    </script>
                    <table class="table table-bordered table-hover" id="mytable">
                        <thead>
                        <tr>
                            <th>Artist Name</th>
                            <th id="leave"></th>
                            <th id="leave"></th>
                        </tr>
                        </thead>

                        <tbody>


                        <?php // DELETE FROM CATEGORIES QUERY
                        findAllCategories($db);
                        ?>

                        <?php // DELETE FROM CATEGORIES QUERY
                        $url = "artists.php";
                        deleteArtist($db, $url);
                        ?>

                        <script>

                            $(document).ready(function(){

                                $(".Add_link").on('click', function () {

                                    var id = $(this).attr("rel");

                                    var add_url = "artists.php?Add="+ id +" ";

                                    $(".modal_add_link").attr("href", add_url);

                                    $("#artistModal").modal('show');

                                });

                            });

                            $(document).ready(function(){

                                $(".artist_delete_link").on('click', function () {

                                    var id = $(this).attr("rel");

                                    var delete_url = "artists.php?delete="+ id +" ";

                                    $(".modal_delete_link").attr("href", delete_url);

                                    $("#deleteModal").modal('show');

                                });

                            });


                            function exportTableToCSV($table, filename) {

                             var $rows = $table.find('tr:visible(td,th)'),

                             // Temporary delimiter characters unlikely to be typed by keyboard
                             // This is to avoid accidentally splitting the actual contents
                             tmpColDelim = String.fromCharCode(11), // vertical tab character
                             tmpRowDelim = String.fromCharCode(0), // null character

                             // actual delimiter characters for CSV format
                             colDelim = '","',
                             rowDelim = '"\r\n"',

                             // Grab text from table into CSV formatted string
                             csv = '"' + $rows.map(function (i, row) {
                             var $row = $(row),
                             $cols = $row.find('td,th');

                             return $cols.map(function (j, col) {
                             if(j<1) {
                             var $col = $(col),
                             text = $col.text();

                             return text.replace('"', '""'); // escape double quotes
                             }
                             }).get().join(tmpColDelim);

                             }).get().join(tmpRowDelim)
                             .split(tmpRowDelim).join(rowDelim)
                             .split(tmpColDelim).join(colDelim) + '"',

                             // Data URI
                             csvData = 'data:application/csv;charset=utf-8,' + encodeURIComponent(csv);

                             $(this)
                             .attr({
                             'download': filename,
                             'href': csvData,
                             'target': '_blank'
                             });
                             }

                            $('.getfile').click(
                                function() {
                                    exportTableToCSV.apply(this, [$('#mytable'), 'filename.csv']);
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

<?php include "includes/admin_footer.php"; ?>