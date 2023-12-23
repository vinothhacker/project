<?php
$DB_host = "database-2.cd00ioqg2b8z.ap-south-1.rds.amazonaws.com";
$DB_port = 3306; // Replace with your desired port number
$DB_user = "admin";
$DB_pass = "12345678";
$DB_name = "library";

try {
    $DB_con = new PDO("mysql:host={$DB_host};port={$DB_port};dbname={$DB_name}", $DB_user, $DB_pass);
    $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>