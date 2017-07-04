<?php
    $enlace =  mysql_connect('g500603svbcp', 'root', 'qwerty');
    mysql_select_db("dashboard");
    if (!$enlace) {
        die('No pudo conectarse: ' . mysql_error());
    }
?>
