<?php include 'includes/header.php';
    include 'includes/connection.php';
    include_once 'includes/function.php';
    
$user_id = $_SESSION['user_id'] ?? null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    
    <section class="p-2 sm:p-8 min-[850px]:p-14">
        <div class="flex max-[767px]:flex-col rounded-2xl items-start">
            <div class="w-full md:w-2/3 p-2 sm:p-6 bg-slate-200 rounded-l-2xl">
                <h1 class="text-2xl font-bold m-2">My Shopping Cart</h1>
                <?php 
                    global $conn;
                    $total_price = 0;

                    $query = mysqli_query($conn, "SELECT * from `cart` where user_id='$user_id'");
                    if (mysqli_num_rows($query) > 0) {
                        while($row = mysqli_fetch_array($query)){
                            $product_price = array($row['price']);
                            $Item_name = $row['name'];
                            $Item_description = $row['description'];
                            $Item_price = $row['price'];
                            $Item_img = $row['image'];
                            $Item_quantity = $row['quantity'];
                            $item_total = $Item_price * $Item_quantity;
                            $total_price += $item_total;
                        ?>
                    <div class='flex items-center border-b py-4'>
                        <img src='./images/<?php echo $Item_img?>' class='max-[450px]:w-20 max-[450px]:h-20 w-28 h-28 object-cover rounded bg-slate-200' alt='Product_img'>
                        <div class='ml-2 flex-1'>
                            <p class='font-medium text-sm sm:text-lg line-clamp-1'><?php echo $Item_name?></p>
                            <p class='mt-2 text-xs sm:text-sm text-gray-500 line-clamp-2'><?php echo $Item_description ?></p>
                            <p class='mt-2 font-medium'>&#8377;<?php echo $Item_price ?></p>
                        </div>
                        <div class='flex flex-col ml-2 items-center'>
                            <div>
                                <form action="manage_cart.php" method="POST">
                                    <input type="hidden" name="cart_id" value="<?php echo $row['id']?>">
                                    <input class='w-9 text-center border-x border-gray-300 focus:outline-none' type='number' name='qty' value='<?php echo $row['quantity'];?>' min='1' max='10'>
                                    <input type="submit" name='add' value="Add" class="px-3 py-1 text-sm font-medium text-grey-800 rounded-lg shadow bg-gray-100 hover:bg-gray-300 focus:outline-none transition-all duration-200">
                                </form>
                            </div>
                            <div class='mt-4'>
                                <form action='manage_cart.php' method='POST'>
                                    <button type='submit' name='remove_item' value='<?php echo $row['id'];?>' class='px-3 py-1 text-sm font-medium text-red-500 rounded-lg shadow hover:text-red-600 transition-all duration-200' onclick="return confirm('you sure want to remove item.')">Remove</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php                 
                }
                } 
                ?>
            </div>
            <div class="w-full md:w-1/3 right-0 p-2 sm:p-6 bg-white">
                <div>
                    <h3 class="text-lg font-bold md:text-2xl mb-4">Summary</h3><hr>

                    <div class="flex justify-between my-6">
                        <span class="text-sm font-bold">Grand Totle</span>
                        <span class="text-sm font-medium">&#8377;<?php echo $total_price; ?></span>
                    </div>

                    <div class="flex justify-between my-6">
                        <span class="text-sm font-bold">Totle item</span>
                        <span class="text-sm font-medium"><?php cart_item(); ?></span>
                    </div>

                    <form action="manage_cart.php" method="POST">
                        <div class="flex justify-between my-6">
                            <button class="w-36 p-2 font-bold text-white bg-red-500 rounded-lg shadow hover:bg-red-600 transition-all duration-200" name="deleteall" onclick="return confirm('you sure want to remove all item.')">Delete All</button>
                        </div>
                    </form>

                    <form action="checkout.php" method="post">
                        <h3 class="text-lg font-bold md:text-2xl mb-4">Payment method</h3><hr>
                            <div class="flex items-center mt-6">
                                <label for="default_radio" class="ms-2 text-sm font-medium text-gray-900">Cash on delivery (COD)</label>
                            </div>
                        <button type="submit" name="checkout_btn" class="bg-black text-white py-3 mt-6 w-full block text-center rounded hover:bg-gray-800">CHECKOUT</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <a href="shop.php" class="text-sm text-gray-600 hover:underline">&larr; Back to shop</a>
        </div>
    </section>
    
    <?php include 'includes/footer.php'?>
</body>
</html>
