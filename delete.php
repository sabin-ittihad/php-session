<?php

require_once 'connection.php';
require_once 'check-session.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE from products WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        setSession('message', 'Product Deleted');
        setSession('class', 'success');
    } else {
        setSession('message', 'Product Deletion failed!');
        setSession('class', 'danger');
    }
    header('location:list.php');
}
