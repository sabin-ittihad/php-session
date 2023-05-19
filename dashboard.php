<?php
include 'check-session.php';

require_once 'header.php';    // To include HTML HEADERS <html><head><body> etc

include 'menu.php';

?>

<br>
<div class="dashboard">
    <h2>Dashboard</h2>

    <?php

    if (isset($_SESSION['logged'])) {
        echo "<h3>Welcome " . $_SESSION['user'] . "</h3>";
    }

    ?>
</div>

<?php include 'footer.php' ?>