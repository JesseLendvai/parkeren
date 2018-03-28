<?php
    require_once("data/functions.php");
    require_once("db/db_credentials.php");
    $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    session_start();
?>