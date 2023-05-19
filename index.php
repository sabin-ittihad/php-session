<?php

session_start();

if (isset($_SESSION['logged'])) {
    header("location: dashboard.php");
}
?>

<html>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="login-box">
        <form action="server.php" method="POST">
            <h2>Login</h2>
            <label>Username
                <input type="text" name="username" required/>
            </label>
            <label>Password
                <input type="password" name="password" required/>
            </label>
            <br>

            <button type="submit">Login</button>
            <button class="cancel-button">Cancel</button>
        </form>
    </div>
</body>

</html>