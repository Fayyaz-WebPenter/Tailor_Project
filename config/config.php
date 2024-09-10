<?php
$conn = mysqli_connect("localhost", "root", "", "tailors");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
