<?php
$conn = mysqli_connect("localhost", "root", "P@ssw0rd123!", "tailors");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
