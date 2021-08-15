<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "collge_website";
$conn = mysqli_connect($server, $user, $pass, $database);
if(mysqli_connect_error())
{
    echo "<p>Error occurred..kindly try again later.</p>";
    echo "<p>Exiting...</p>";
    exit();
}
?>