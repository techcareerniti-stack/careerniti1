<?php
$conn = new mysqli("localhost", "root", "", "careerniti");
if ($conn->connect_error) {
    die("Database connection failed");
}
?>
