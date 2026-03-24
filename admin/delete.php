<?php
include '../includes/connection.php';

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $del_query = mysqli_query($conn, "DELETE FROM `products` WHERE id = $delete_id")or die('faile to delete item'.mysqli_error('$conn'));
    
    if ($del_query) {
        mysqli_query($conn, "DELETE FROM `cart` WHERE product_id = $delete_id") or die('failed to delete cart items: ' . mysqli_error($conn));
        echo "<script>alert('item deleted successfully.')</script>";
        header('Location:sellproduct.php');
    } else {
        echo "<script>alert('Item did not delete.');</script>";
        header('Location:index.php');
    }
}