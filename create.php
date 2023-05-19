<?php
require_once 'check-session.php';
require_once 'connection.php';

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $sku = $_POST['sku'];
    $price = $_POST['price'];

    // Do validation codes before saving it to the DB

    $sql = "INSERT INTO products(name, sku, price) VALUES(?, ?, ?)";

    try {
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, 'ssd', $name, $sku, $price);
        }

        if (mysqli_stmt_execute($stmt)) {

            setSession('class', "success");
            setSession('message', 'New Product Created');
            header("location: list.php");
        } else {
            // Handle Error case
            $_SESSION['message'] = "Somthing Wrong!";
        }
    } catch (Exception $e) {
        $err = $e->getMessage();
        $err = date('H-i-s-d-m-Y') . ' : ' . $err . "\n"; //or use PHP_EOL
        file_put_contents('log-' . date("d-m-Y") . '.log', $err, FILE_APPEND);
        setSession('class', "danger");
        setSession('message', 'Something Wrong! ');
        header("location: list.php");
    }
}

require_once 'header.php';    // To include HTML HEADERS <html><head><body> etc

include 'menu.php';

?>

<div class="login-box">
    <h2>New Product</h2>
    <form action="" method="POST">
        <label for="name">Name
            <input type="text" name="name" required />
        </label>
        <label for="sku">SKU
            <input type="text" name="sku" required />
        </label>
        <label for="price">Price
            <input type="text" name="price" required />
        </label>
        <button style="margin-top: 10px;" type="submit">Save</button>
    </form>
</div>

<?php include 'footer.php' ?>