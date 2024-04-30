<?php
$servername = "database";
$username = "root";
$password = "tiger";
$dbname = "blog_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


