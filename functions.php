<?php

////////////////////////////////////////////////////////////////////////////////////// Artists Section/////////////////////////////////////////////////////////////////////////////////////////////////

function insert_artist($db) {

    if(isset($_POST['submit'])) {

        $fname = mysqli_real_escape_string($db,$_POST['artist_fname']);
        $lname = mysqli_real_escape_string($db,$_POST['artist_lname']);

        if ($fname == "" || empty($fname)) {
            echo "<p style='color: Red'>First Name cannot be empty!</p>";
            header("refresh:1;url=artists.php");
        } else {

            $query = "INSERT INTO names(fname, lname) ";
            $query .= "VALUES('$fname', '$lname')";

            $create_artist = mysqli_query($db, $query);

            if (!$create_artist) {
                die('Query Failed' . mysqli_error($db));
            } else {

                echo "<p style='font-size: 30px; color: green'>Artist Successfully Created";
                header("refresh:1;url=artists.php");

            }

        }

    }

}

function findAllCategories($db) {

    $query = "SELECT name_id, concat(fname, ' ', lname) AS Name FROM names ORDER BY fname ASC ";
    $select_artists = mysqli_query($db, $query);

    while($row = mysqli_fetch_assoc($select_artists)) {
        $name_id = $row['name_id'];
        $name = $row['Name'];

        echo "<tr>";
        echo "<td>{$name}</td>";
        echo "<td id='ignore'><a href='artists.php?Edit={$name_id}'>Edit</a></td>";
        echo "<td id='ignore'><a rel='$name_id' href='javascript:void(0)' class='artist_delete_link' '>Delete</a></td>";
        echo "</tr>";

    }

}

function deleteArtist($db,$url) {

    if(isset($_GET['delete'])) {

        $name_id = $_GET['delete'];

        $query = "DELETE FROM names WHERE name_id= {$name_id} ";
        $delete_artist = mysqli_query($db, $query);

        if (!$delete_artist) {
            die('Delete Failed' . mysqli_error($db));
        } else {

            echo "<p style='font-size: 30px; color: blue'>Artist Successfully Deleted";
            header("refresh:1;url=$url");

        }

    }
    
}

////////////////////////////////////////////////////////////////////////////////////// Artists Section/////////////////////////////////////////////////////////////////////////////////////////////////





////////////////////////////////////////////////////////////////////////////////////// Bands Section/////////////////////////////////////////////////////////////////////////////////////////////////

function findAllBands($db) {

    $query = "SELECT * FROM band";
    $select_band = mysqli_query($db, $query);

    while($row = mysqli_fetch_assoc($select_band)) {
        $band_id = $row['band_id'];
        $band_name = $row['band_name'];

        echo "<tr>";
        echo "<td>{$band_name}</td>";
        echo "<td id='ignore'><a href='group.php?Edit={$band_id}'>Edit</a></td>";
        echo "<td id='ignore'><a rel='$band_id' href='javascript:void(0)' class='band_delete_link' '>Delete</a></td>";
        echo "<td id='ignore'><a href='group.php?members={$band_id}'>Members</a></td>";
        echo "</tr>";

    }

}

function membersOfBands($db)
{
    global $band_name;
    if (isset($_GET['members'])) {

        $id = $_GET['members'];

        $query = "select n.name_id, n.fname, n.lname, b.band_id, b.band_name from names n inner join (band b inner join membership m on b.band_id = m.bandid) on n.name_id = m.nameid WHERE band_id=$id";
        $select_band = mysqli_query($db, $query);

        while ($row = mysqli_fetch_assoc($select_band)) {
            $band_id = $row['band_id'];
            $band_name = $row['band_name'];
            $first_name = $row['fname'];
            $last_name = $row['lname'];
            $name_id = $row['name_id'];

            echo "<tr>";
            echo "<td>{$band_name}</td>";
            echo "<td>{$first_name}</td>";
            echo "<td>{$last_name}</td>";
            echo "<td id='ignore'><a href='group.php?remove={$band_id}'>Remove</a></td>";
            echo "</tr>";

        }

    }

}

function insert_band($db) {

    if(isset($_POST['submit'])) {

        $band_name = mysqli_real_escape_string($db,$_POST['band_name']);

        if ($band_name == "" || empty($band_name)) {
            echo "<p style='color: Red'>Group Name cannot be empty!</p>";
        } else {

            $query = "INSERT INTO band(band_name) ";
            $query .= "VALUES('$band_name')";

            $create_artist = mysqli_query($db, $query);

            if (!$create_artist) {
                die('Query Failed' . mysqli_error($db));
            } else {

                echo "<p style='font-size: 30px; color: green'>Group Successfully Created";
                header("refresh:1;url=group.php");

            }

        }

    }

}

function deleteBand($db) {

    if(isset($_GET['delete'])) {

        $band_id = $_GET['delete'];

        $query = "DELETE FROM band WHERE band_id= {$band_id} ";
        $delete_band = mysqli_query($db, $query);

        if (!$delete_band) {
            die('Delete Failed' . mysqli_error($db));
        } else {

            echo "<p style='font-size: 30px; color: blue'>Group Successfully Deleted";
            header("refresh:1;url=group.php");

        }

    }

}

function showAllData($db) {

    $query = "SELECT name_id AS id , concat_ws('', fname, ' ', lname) AS Name FROM names ORDER BY fname ASC ";
    $result = mysqli_query($db, $query);
    if(!$result) {
        die('Query FAILED' . mysqli_error($db));
    }

    while($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        
        echo "<option value='" . $id . "'>".$row['Name'] ." </option>";

    }

}

function removeMember($db)
{

    if (isset($_GET['remove'])) {

        $id = $_GET['remove'];

        $query = "select n.name_id, n.fname, n.lname, b.band_id, b.band_name from names n inner join (band b inner join membership m on b.band_id = m.bandid) on n.name_id = m.nameid WHERE band_id=$id";
        $removeMember = mysqli_query($db, $query);

        $row = mysqli_fetch_assoc($removeMember);
        $band_id = $row['band_id'];
        $name_id = $row['name_id'];
        mysqli_query($db, "delete from membership WHERE nameid=$name_id AND bandid=$band_id");

        if (!$removeMember) {
            die('Delete Failed' . mysqli_error($db));
        } else {

            //echo "<p style='font-size: 30px; color: blue'>$first_name  $last_name Successfully Removed";
            header("refresh:0;url=group.php?members=$band_id");

        }

    }
}

function getName($db){

    if(isset($_GET['members'])){

        $id = $_GET['members'];
        $query = "select band_name from band where band_id = $id";
        $result = mysqli_query($db, $query);

        $band = mysqli_fetch_assoc($result);
        $band_name = $band['band_name'];
        
        echo $band_name;

    }

}
                    

////////////////////////////////////////////////////////////////////////////////////// Bands Section/////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////// Format Section/////////////////////////////////////////////////////////////////////////////////////////////////



function insertFormat($db) {

    if(isset($_POST['submit'])) {

        $formatTitle = mysqli_real_escape_string($db,$_POST['format_title']);

        if ($formatTitle == "" || empty($formatTitle)) {
            echo "<p style='font-size: 20px; color: red'>This field cannot be empty!";
            header("refresh:1;url=format.php");
        } else {

            $query = "INSERT INTO format(format_cat) ";
            $query .= "VALUES('$formatTitle')";

            $create_format = mysqli_query($db, $query);

            if (!$create_format) {
                die('Query Failed' . mysqli_error($db));
            } else {

                echo "<p style='font-size: 30px; color: blue'>Format Successfully Added";
                header("refresh:1;url=format.php");

            }

        }

    }

}

function findAllFormats($db) {

    $query = "SELECT * FROM format";
    $select_format = mysqli_query($db, $query);

    while($row = mysqli_fetch_assoc($select_format)) {
        $format_id = $row['format_id'];
        $format_cat = $row['format_cat'];

        echo "<tr>";
        echo "<td>{$format_cat}</td>";
        echo "<td><a href='format.php?Edit={$format_id}'>Edit</a></td>";
        echo "<td><a rel='$format_id' href='javascript:void(0)' class='delete_link' '>Delete</a></td>";
        echo "</tr>";

    }

}

function deleteFormat($db) {

    if(isset($_GET['delete'])) {

        $format_id = $_GET['delete'];

        $query = "DELETE FROM format WHERE format_id= {$format_id} ";
        $deleteFormat = mysqli_query($db, $query);

        if (!$deleteFormat) {
            die('Delete Failed' . mysqli_error($db));
        } else {

            echo "<p style='font-size: 20px; color: blue'>Successfully Deleted";
            header("refresh:1;url=format.php");

        }

    }

}


////////////////////////////////////////////////////////////////////////////////////// Format Section/////////////////////////////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////////// Genre Section/////////////////////////////////////////////////////////////////////////////////////////////////


function insertGenre($db) {

    if(isset($_POST['submit'])) {

        $genreTitle = mysqli_real_escape_string($db, $_POST['genre_title']);

        if ($genreTitle == "" || empty($genreTitle)) {
            echo "<p style='font-size: 20px; color: red'>This field cannot be empty!";
            header("refresh:1;url=genre.php");
        } else {

            $query = "INSERT INTO genre(genre_cat) ";
            $query .= "VALUES('$genreTitle')";

            $create_genre = mysqli_query($db, $query);

            if (!$create_genre) {
                die('Query Failed' . mysqli_error($db));
            } else {

                echo "<p style='font-size: 30px; color: blue'>Genre Successfully Added";
                header("refresh:1;url=genre.php");

            }

        }

    }

}

function findAllGenres($db) {

    $query = "SELECT * FROM genre";
    $select_genre = mysqli_query($db, $query);

    while($row = mysqli_fetch_assoc($select_genre)) {
        $genre_id = $row['genre_id'];
        $genre_cat = $row['genre_cat'];

        echo "<tr>";
        echo "<td>{$genre_id}</td>";
        echo "<td>{$genre_cat}</td>";
        echo "<td><a href='genre.php?Edit={$genre_id}'>Edit</a></td>";
        echo "<td><a rel='$genre_id' href='javascript:void(0)' class='delete_link' '>Delete</a></td>";
        echo "</tr>";

    }

}

function deleteGenre($db) {

    if(isset($_GET['delete'])) {

        $genre_id = $_GET['delete'];

        $query = "DELETE FROM genre WHERE genre_id= {$genre_id} ";
        $deleteGenre = mysqli_query($db, $query);

        if (!$deleteGenre) {
            die('Delete Failed' . mysqli_error($db));
        } else {

            echo "<p style='font-size: 20px; color: blue'> Genre Successfully Deleted";
            header("refresh:1;url=genre.php");

        }

    }

}


////////////////////////////////////////////////////////////////////////////////////// Genre Section/////////////////////////////////////////////////////////////////////////////////////////////////



////////////////////////////////////////////////////////////////////////////////////// Tracks Section/////////////////////////////////////////////////////////////////////////////////////////////////


function findAllTracks($db) {

    $query = "select t.track_id, t.title, t.Location, n.fname, n.lname, b.band_name,
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
ON f.format_id=t.format";
    $select_artists = mysqli_query($db, $query);

    while($row = mysqli_fetch_assoc($select_artists)) {
        $track_id = $row['track_id'];
        $title = $row['title'];
        $fname = $row['fname'];
        $lname = $row['lname'];
        $band = $row['band_name'];
        $lyricist = $row['lyricist'];
        $composer = $row['composer'];
        $duration = $row['duration'];
        $date = $row['released'];
        $loc = $row['Location'];
        $genre= $row['genre_cat'];
        $format = $row['format_cat'];

        echo "<tr>";
        echo "<td>{$title}</td>";
        echo "<td>{$fname} {$lname}</td>";
        echo "<td>{$band}</td>";
        echo "<td>{$lyricist}</td>";
        echo "<td>{$composer}</td>";
        echo "<td>{$duration}</td>";
        echo "<td>{$date}</td>";
        echo "<td id='location'>{$loc}</td>";
        echo "<td id='genre'>{$genre}</td>";
        echo "<td id='format'>{$format}</td>";
        echo "<td id='ignore'><a href='tracks.php?Edit={$track_id}'>Edit</a></td>";
        echo "<td id='ignore'><a rel='$track_id' href='javascript:void(0)' class='track_delete_link' '>Delete</a></td>";
        echo "</tr>";

    }

}

function insert_track($db) {

    error_reporting(~E_NOTICE);

    if(isset($_POST['submit'])) {

        $title = mysqli_real_escape_string($db, $_POST['track_name']);
        $name = $_POST['name'];
        $group = $_POST['group'];
        $lyricist = $_POST['lyricist'];
        $composer = $_POST['composer'];
        $duration = $_POST['duration'];
        $date = $_POST['date'];
        $location = $_POST['location'];
        $genre = $_POST['genre'];
        $format = $_POST['format'];

        if ($title == "" || empty($title)) {
            echo "<p style='color: Red'>Track cannot be empty!</p>";
        } if ($name == "" || empty($name)) {
            echo "<p style='color: Red'>Artist cannot be empty!</p>";
        } if ($duration == "" || empty($duration)) {
            echo "<p style='color: Red'>Duration cannot be empty!</p>";
        }else {

            $query = "INSERT INTO track(title, artist_name, artist_band, lyricist, composer, duration, released, Location, genre, format) ";
            $query .= "VALUES('$title', $name, $group, $lyricist, $composer, '$duration', '$date', '$location', '$genre', '$format')";

            $create_artist = mysqli_query($db, $query);

            if (!$create_artist) {
                //die('Query Failed' . mysqli_error($db));
            } else {

                echo "<p style='font-size: 30px; color: green'>Artist Successfully Created";
                header("refresh:1;url=add_track.php");

            }

        } header("refresh:2;url=add_track.php");

    }

}

function showAllBands($db) {

    $query = "SELECT band_id AS id , band_name AS Name FROM band ORDER BY band_name ASC ";
    $result = mysqli_query($db, $query);
    if(!$result) {
        die('Query FAILED' . mysqli_error($db));
    }

    while($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];

        echo "<option value='" . $id . "'>".$row['Name'] ." </option>";

    }

}

function showAllGenres($db) {

    $query = "SELECT genre_id AS id , genre_cat AS Name FROM genre ORDER BY genre_cat ASC ";
    $result = mysqli_query($db, $query);
    if(!$result) {
        die('Query FAILED' . mysqli_error($db));
    }

    while($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];

        echo "<option value='" . $id . "'>".$row['Name'] ." </option>";

    }

}

function showAllFormats($db) {

    $query = "SELECT format_id AS id , format_cat AS Name FROM format ORDER BY format_cat ASC ";
    $result = mysqli_query($db, $query);
    if(!$result) {
        die('Query FAILED' . mysqli_error($db));
    }

    while($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];

        echo "<option value='" . $id . "'>".$row['Name'] ." </option>";

    }

}

function deleteTrack($db) {

    if(isset($_GET['delete'])) {

        $name_id = $_GET['delete'];

        $query = "DELETE FROM track WHERE track_id= {$name_id} ";
        $delete_artist = mysqli_query($db, $query);

        if (!$delete_artist) {
            die('Delete Failed' . mysqli_error($db));
        } else {

            echo "<p style='font-size: 30px; color: blue'>Track Successfully Deleted";
            header("refresh:1;url=tracks.php");

        }

    }

}

function track_artist($db) {

    if(isset($_POST['finish'])) {

        $fname = $_POST['artist_fname'];
        $lname = $_POST['artist_lname'];

        if ($fname == "" || empty($fname)) {
            //echo "<p style='color: Red'>First Name cannot be empty!</p>";
        } else {

            $query = "INSERT INTO names(fname, lname) ";
            $query .= "VALUES('$fname', '$lname')";

            $create_artist = mysqli_query($db, $query);

            if (!$create_artist) {
                die('Query Failed' . mysqli_error($db));
            } else {

                echo "<p style='font-size: 30px; color: green'>Artist Successfully Created";
                header("refresh:1;url=add_track.php");

            }

        }

    }

}

function track_band($db) {

    if(isset($_POST['add_group'])) {

        $band_name = $_POST['band_name'];

        if ($band_name == "" || empty($band_name)) {
            echo "<p style='color: Red'>Group Name cannot be empty!</p>";
            header("refresh:1;url=add_track.php");
        } else {

            $query = "INSERT INTO band(band_name) ";
            $query .= "VALUES('$band_name')";

            $create_band = mysqli_query($db, $query);

            if (!$create_band) {
                die('Query Failed' . mysqli_error($db));
            } else {

                echo "<p style='font-size: 30px; color: green'>Group Successfully Created";
                header("refresh:1;url=add_track.php");

            }

        }

    }

}

function track_genre($db) {

    if(isset($_POST['add_genre'])) {

        $genre_name = $_POST['genre_name'];

        if ($genre_name == "" || empty($genre_name)) {
            echo "<p style='color: Red'>Genre cannot be empty!</p>";
            header("refresh:1;url=add_track.php");
        } else {

            $query = "INSERT INTO genre(genre_cat) ";
            $query .= "VALUES('$genre_name')";

            $create_genre = mysqli_query($db, $query);

            if (!$create_genre) {
                die('Query Failed' . mysqli_error($db));
            } else {

                echo "<p style='font-size: 30px; color: green'>Genre Successfully Created";
                header("refresh:1;url=add_track.php");

            }

        }

    }

}

function track_format($db) {

    if(isset($_POST['add_format'])) {

        $format_name = $_POST['format_name'];

        if ($format_name == "" || empty($format_name)) {
            echo "<p style='color: Red'>Format Name cannot be empty!</p>";
            header("refresh:1;url=add_track.php");
        } else {

            $query = "INSERT INTO format(format_cat) ";
            $query .= "VALUES('$format_name')";

            $create_format = mysqli_query($db, $query);

            if (!$create_format) {
                die('Query Failed' . mysqli_error($db));
            } else {

                echo "<p style='font-size: 30px; color: green'>Format Successfully Created";
                header("refresh:1;url=add_track.php");

            }

        }

    }

}







////////////////////////////////////////////////////////////////////////////////////// Tracks Section/////////////////////////////////////////////////////////////////////////////////////////////////



////////////////////////////////////////////////////////////////////////////////////// Albums Section/////////////////////////////////////////////////////////////////////////////////////////////////


function findAllAlbums($db) {

    $query = "SELECT * FROM album";
    $select_band = mysqli_query($db, $query);

    while($row = mysqli_fetch_assoc($select_band)) {
        $album_id = $row['album_id'];
        $album_name = $row['name'];
        $duration = $row['duration'];
        $released = $row['released'];
        $status = $row['status'];

        echo "<tr>";
        echo "<td>{$album_name}</td>";
        echo "<td>{$duration}</td>";
        echo "<td>{$released}</td>";
        echo "<td>{$status}</td>";
        echo "<td id='ignore'><a href='albums.php?Edit={$album_id}'>Edit</a></td>";
        echo "<td id='ignore'><a rel='{$album_id}' href='javascript:void(0)' class='album_delete_link' '>Delete</a></td>";
        echo "<td id='ignore'><a href='albums.php?members={$album_id}'>Tracks</a></td>";
        echo "</tr>";

    }

}

function albumTrack($db)
{
    //global $album_name;
    if (isset($_GET['members'])) {

        $id = $_GET['members'];

        $query = "SELECT a.album_id, a.name, s.track_id, s.title AS track from album a inner join (track s inner join trk_alb t ON s.track_id=t.track) ON a.album_id=t.album WHERE album_id=$id";
        $select_album = mysqli_query($db, $query);

        while ($row = mysqli_fetch_assoc($select_album)) {
            $track_id = $row['track_id'];
            $album_id = $row['album_id'];
            $album_name = $row['name'];
            $title = $row['track'];

            echo "<tr>";
            echo "<td>{$album_id}</td>";
            echo "<td>{$album_name}</td>";
            echo "<td>{$title}</td>";
            echo "<td><a href='albums.php?remove={$album_id}'>Remove</a></td>";
            echo "</tr>";

        }

    }

}

function insert_album($db) {

    if(isset($_POST['submit'])) {

        $album_name = mysqli_real_escape_string($db, $_POST['album_name']);
        $duration = $_POST['duration'];
        $released = $_POST['released'];
        $status = mysqli_real_escape_string($db, $_POST['status']);

        if ($album_name == "" || empty($album_name)) {
            echo "<p style='color: Red'>Album Name cannot be empty!</p>";
        } else {

            $query = "INSERT INTO album(name, duration, released, status) ";
            $query .= "VALUES('$album_name', '$duration', '$released', '$status')";

            $create_album = mysqli_query($db, $query);

            if (!$create_album) {
                die('Query Failed' . mysqli_error($db));
            } else {

                echo "<p style='font-size: 30px; color: green'>Album Successfully Created";
                header("refresh:1;url=albums.php");

            }

        }

    }

}

function deleteAlbum($db) {

    if(isset($_GET['delete'])) {

        $album_id = $_GET['delete'];

        $query = "DELETE FROM album WHERE album_id= {$album_id} ";
        $delete_album = mysqli_query($db, $query);

        if (!$delete_album) {
            die('Delete Failed' . mysqli_error($db));
        } else {

            echo "<p style='font-size: 30px; color: blue'>Album Successfully Deleted";
            header("refresh:1;url=albums.php");

        }

    }

}

function showAllTracks($db) {

    $query = "SELECT track_id AS id , title AS Name FROM track";
    $result = mysqli_query($db, $query);
    if(!$result) {
        die('Query FAILED' . mysqli_error($db));
    }

    while($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];

        echo "<option value='" . $id . "'>".$row['Name'] ." </option>";

    }

}

function removeTracks($db)
{

    if (isset($_GET['remove'])) {

        $id = $_GET['remove'];

        $query = "SELECT a.album_id, a.name, s.track_id, s.title AS track from album a inner join (track s inner join trk_alb t ON s.track_id=t.track) ON a.album_id=t.album WHERE album_id=$id";
        $removeTrack = mysqli_query($db, $query);

        $row = mysqli_fetch_assoc($removeTrack);
        $album_id = $row['album_id'];
        $track_id = $row['track_id'];
        mysqli_query($db, "delete from trk_alb WHERE  album=$album_id AND track=$track_id");

        if (!$removeTrack) {
            die('Delete Failed' . mysqli_error($db));
        } else {

            //echo "<p style='font-size: 30px; color: blue'>$first_name  $last_name Successfully Removed";
            header("refresh:0;url=albums.php?members=$album_id");

        }

    }
}

function getAlbumName($db){

    if(isset($_GET['members'])){

        $id = $_GET['members'];
        $query = "select name from album where album_id = $id";
        $result = mysqli_query($db, $query);

        $album = mysqli_fetch_assoc($result);
        $album_name = $album['name'];

        echo $album_name;

    }

}

////////////////////////////////////////////////////////////////////////////////////// Albums Section/////////////////////////////////////////////////////////////////////////////////////////////////


?>