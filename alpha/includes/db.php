<!-- -------------------------- DATABASE CONNECTION -------------------------- --> 

<?php
$db_server = getenv('DB_SERVER');
$db_username = getenv('DB_USERNAME');
$db_password = getenv('DB_PASSWORD');
$db_name = getenv('DB_NAME');

$connection = new mysqli($db_server, $db_username, $db_password, $db_name);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>