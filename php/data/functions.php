<?php
    function query($query) {
        global $con;
        return mysqli_query($con, $query);
    }

    function generateId ($length = 10) {
        $characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $string = "";
        for ($i = 0; $i <= $length; $i++) {
            $string .= $characters[rand(0, strlen($characters)-1)];
        }
        return $string;
    }
?>