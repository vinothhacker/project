<?php
    $host = 'database-2.cd00ioqg2b8z.ap-south-1.rds.amazonaws.com';
    $dbuser = 'admin';
    $dbpass = '12345678';
    $db = 'library';
    $port = 3306; 
    
    $mysqli = new mysqli($host, $dbuser, $dbpass, $db, $port);
    
    // Check the connection
    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }
?>
