<?php

$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pwd'] = "";
$db['db_database'] = "ocs_cds";

foreach($db as $key => $value){

    define(strtoupper($key), $value);

}



$db = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_DATABASE);

if(!$db){

    echo "Database not connected";

}

?>