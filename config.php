<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'kpop_album_review');

$conn = mysqli_connect("localhost", "root", "", "kpop_album_review");

if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>