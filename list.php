<?php
include 'check-session.php';
require_once 'connection.php';

require_once 'header.php';    // To include HTML HEADERS <html><head><body> etc

include 'menu.php';

?>

<?php
// Show message if any messages are there in the $_SESSION variable

if (isset($_SESSION['message'])) {
    $class = getSession('class');
    echo "<p class='alert-" . $class . "'>" . $_SESSION['message'] . "</p>";
    unset($_SESSION['message']);
}
?>

<?php

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

?>

<div class="login-box">
    <h2>Product List</h2>
    <table>
        <thead>
            <th>#</th>
            <th>Name</th>
            <th>SKU</th>
            <th>Price</th>
            <th>Action</th>
        </thead>
        <tbody>

            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";  // Use some incremental variable instead of ID
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['sku'] . "</td>";
                    echo "<td>" . $row['price'] . "</td>";
                    echo "<td><a href='edit.php?id=" . $row['id'] . "'>Edit </a>";
                    echo "<a href='delete.php?id=" . $row['id'] . "' onClick=\"return confirm('Want to Delete?')\"> Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr>";
                echo "<td colspan='4' style='text-align:center'> No Data </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<a href="create.php">New Product</a>

<?php include 'footer.php' ?>