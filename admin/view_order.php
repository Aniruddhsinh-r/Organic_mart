<?php 
include 'admin_header.php'; 
include '../includes/connection.php';

if (!isset($_POST['order_id'])) {
    echo "<h2 class='text-red-600 text-center mt-10'>Invalid Order!</h2>";
    exit;
}

$order_id = intval($_POST['order_id']);
$order_q = mysqli_query($conn, "SELECT * FROM orders WHERE id = $order_id");
$order = mysqli_fetch_assoc($order_q);

if (!$order) {
    echo "<h2 class='text-red-600 text-center mt-10'>Order Not Found!</h2>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Order</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    <div class="m-8 bg-white border border-gray-300 shadow-lg rounded-lg overflow-x-auto flex-grow">
        <h2 class="text-2xl font-bold text-green-800 p-4 border-b">Ordered Items</h2>

        <table class="w-full border-collapse">
            <thead class="bg-green-200 text-green-900">
                <tr>
                    <th class="p-3 text-left">No</th>
                    <th class="p-3 text-left">Image</th>
                    <th class="p-3 text-left">Product Name</th>
                    <th class="p-3 text-left">Price</th>
                    <th class="p-3 text-left">Qty</th>
                    <th class="p-3 text-left">Total</th>
                    <th class="p-3 text-left">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $orders = mysqli_query($conn, "SELECT * FROM `order_items` WHERE order_id = $order_id");
                $i = 1;
                    
                while ($row = mysqli_fetch_assoc($orders)) {
                    $image = htmlspecialchars($row['image']);
                        $name = htmlspecialchars($row['product_name']);
                        $price = htmlspecialchars($row['price']);
                        $quantity = htmlspecialchars($row['quantity']);
                        $total = htmlspecialchars($row['total']);
                        ?>
                        
                        <tr class='border-b border-green-100 hover:bg-green-50'>
                            <td class='py-2 px-4'><?php echo"$i"?></td>
                            <td class='py-1 px-2 w-24 h-24'><img src="../images/<?php echo $image;?>" alt='image'/></td>
                            <td class='py-2 px-4'><?php echo"$name"?></td>
                            <td class='py-2 px-4'><?php echo"$price"?></td>
                            <td class='py-2 px-4'><?php echo"$quantity"?></td>
                            <td class='py-2 px-4'><?php echo"$total"?></td>
                        </tr>
                        <?php
                    $i++;
                    }
                    ?>
                </tbody>
        </table>
    </div>

    <div class="static bottom-0 left-0 right-0">
        <?php include 'admin_footer.php'; ?>
    </div>
</body>
</html>
