<?php

require 'connection.php';

$username = 'user@gmail.com';  // Use your username here
$password = 'password';  // Use your username here

$sql = "INSERT INTO user_login (username, password) VALUES ('$username','" . md5("$password") . "')";

if ($conn->query($sql) === TRUE) {
    echo "<p>User is created</p>";
} else {
    echo "Error : " . $conn->error;
}

$conn->close();
