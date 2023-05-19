<?php
include 'check-session.php';
require_once 'connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $name = $row['name'];
            $sku = $row['sku'];
            $price = $row['price'];
        }
    } else {
        echo "Invalid ID";
    }
} else {
    echo "No ID";
}

if (isset($_POST['name'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $sku = $_POST['sku'];
    $price = $_POST['price'];

    $sql = "UPDATE products SET name='$name', sku='$sku', price=$price WHERE id=$id";
    $result = $conn->query($sql);
    setSession('message', 'Product Updated Successfully');
    setSession('class', 'success');
    header("location: list.php");
}

require_once 'header.php';    // To include HTML HEADERS <html><head><body> etc

include 'menu.php';

?>

<div class="login-box">
    <h2>Edit Product</h2>
    <form action="" method="POST">
        <input type="hidden" value="<?= $id ?>" name="id">
        <label for="name">Name
            <input type="text" name="name" value="<?= $name ?>" required />
        </label>
        <label for="sku">SKU
            <input type="text" name="sku" value="<?= $sku ?>" required />
        </label>
        <label for="price">Price
            <input type="text" name="price" value="<?= $price ?>" required />
        </label>
        <button style="margin-top: 10px;" type="submit">Save</button>
    </form>
</div>

<?php include 'footer.php' ?>