<?php
session_start();

include "connection.php";

if (isset($_POST['username']) && isset($_POST['password'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username != '' && $password != '') {

        $sqlFetch = "SELECT * FROM user_login WHERE username='$username' AND password = '" . md5($password) . "'";
        $fetchResult = $conn->query($sqlFetch);

        if ($fetchResult->num_rows > 0) {
            $_SESSION['logged'] = TRUE;     //Set Session variable
            $_SESSION['user'] = $username;
            header("Location: dashboard.php");   //Redirect to the dashboard.
        } else {
            echo "<p>User not found! </p>";
        }
    } else {
        echo "Please fill all the mandatory fields.";
    }
} else {
    echo "Log In failed";
}
