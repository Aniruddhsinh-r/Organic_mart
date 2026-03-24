<?php 
include 'connection.php';

function cart_item() {
    
    global $conn;

    $user_id = $_SESSION['user_id'] ?? null;

    if (!$user_id) {
        echo 0;
        return;
    }

    $query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id='$user_id'");
    $count_product = mysqli_num_rows($query);

    echo $count_product;
}
?>