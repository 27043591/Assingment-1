<?php
$servername = "localhost:3306";
$username = "a2704359_APPSCP";
$password = "a2704359_APPSCP";
$db = "a2704359_APPSCP";

$mysqli = mysqli_connect($servername, $username, $password, $db);

if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}
$str = sprintf("database = [ %s ] Connected ",$db);

?>