<?php
    session_start();
    session_destroy();
    header('Location: http://localhost/parking/php/pages/index.php');
?>