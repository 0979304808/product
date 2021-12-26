<?php
require_once 'config.php';
function connection()
{
    $conn = mysqli_connect(SERVER, USERNAME, PASSWORD, DBNAME);

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    return $conn;
}


function query($sql)
{
    return mysqli_query(connection(), $sql);
}

function getAll($sql)
{
    $result = mysqli_query(connection(), $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function first($id, $table)
{
    $sql = "select * from ".$table." where id=".$id." limit 1";
    $result = mysqli_query(connection(), $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC)[0];
}
