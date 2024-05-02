<?php
include 'db_connect.php';
//Get Inputs
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// This Prepared statement properly handles data insertion into the database
$checkName = $conn->prepare("SELECT COUNT(*) FROM users WHERE Username = ?");
$checkName->bind_param("s", $username);
$checkName->execute();
$checkName->bind_result($count);
$checkName->fetch();
$checkName->close();

if ($count > 0) {
    echo "Username Unavailable";
} else {
    // prepare and bind_param() allow for proper handling of the sql query and its values  
    $createUser = $conn->prepare("INSERT INTO users (Username, Password, Email) VALUES (?, ?, ?)");
    $createUser->bind_param("sss", $username, $hashedPassword, $email); 
    $createUser->execute();
    if ($createUser->affected_rows > 0) {
        echo "Welcome, $username";
    } else {
        echo "Error: " . $createUser->error;
    }
    $createUser->close();
}

$conn->close();
?>

