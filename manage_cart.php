<?php
ob_start();
include 'includes/header.php';
include 'includes/connection.php'; 
require_once 'includes/function.php';

$user_id = $_SESSION['user_id'] ?? null;

if (!$user_id) {
    header('location:LoginSignin.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"]=="POST") { 
    if (isset($_POST['cartbtn'])) {
        $product_id = $_POST['product_id'];
        $product_img = $_POST['Item_img'];
        $product_name = $_POST['Item_name'];
        $product_description = $_POST['Item_description'];
        $product_price = $_POST['Item_price'];
        $quantity = $_POST['quantity'];

        $query = mysqli_query($conn,"SELECT * FROM `cart` where name='$product_name' AND user_id='$user_id'");
        $repeted_product = mysqli_num_rows($query);

        if ($repeted_product) {
            echo "<script>alert('Item Already Added');
            window.location.href = 'shop.php';</script>";
        } else {
            $cart_query = mysqli_query($conn,"INSERT INTO `cart`(user_id, product_id, name, description, price, image, quantity) VALUES ('$user_id', '$product_id', '$product_name','$product_description','$product_price','$product_img','$quantity')") or die("faile to insert product: " . mysqli_error($conn));
            echo "<script>window.location.href = 'cart.php';</script>";
        }
    }
}

if (isset($_POST['add'])) {
    $updated_qty = $_POST['qty'];
    $cart_id = $_POST['cart_id'];
    mysqli_query($conn,"UPDATE `cart` SET quantity = '$updated_qty' where id='$cart_id'") or die('faile to Update quantity: ' . mysqli_error($conn));

    echo "<script>window.location.href='cart.php'</script>";
    exit();
}

if (isset($_POST['remove_item'])) {
    $cart_del = $_POST['remove_item'];
    $query = mysqli_query($conn,"DELETE FROM `cart` WHERE id='$cart_del'") or die('faile to remove item: ' . mysqli_error($conn));;

    if ($query) {
        echo "<script>window.location.href = 'cart.php';</script>";
    } else {
        echo "<script>alert('Cart item was not deleted.');
        window.location.href = 'cart.php';</script>";
    }
}

if (isset($_POST['deleteall'])) {
    $query = mysqli_query($conn,"DELETE FROM `cart` WHERE user_id='$user_id'") or die('faile to delete items: ' . mysqli_error($conn));;

    if ($query) {
        echo "<script>window.location.href = 'cart.php';</script>";
    } else {
        echo "<script>alert('Cart item did not deleted.');
        window.location.href = 'cart.php';</script>";
    }
}

?>