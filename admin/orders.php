<?php include 'admin_header.php'; 
    include '../includes/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewpzort" content="width=device-width, initial-scale=1.0">
    <title>AddProduct</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="min-h-screen flex flex-col">

    <div class="m-10 flex-grow">
        <div class="overflow-x-auto">
            <h2 class="text-2xl font-bold text-green-800 mb-4">Orders</h2>
            <table class="w-full border-collapse bg-white border border-black shadow-lg rounded-md">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Pincode</th>
                        <th>Payment_method</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $orders = mysqli_query($conn, "SELECT * FROM `orders`");
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($orders)) {
                        echo "<tr class='border-b border-green-100 hover:bg-green-50'>";
                        echo "<td class='py-2 px-4'>{$i}</td>";
                        echo "<td class='py-2 px-4'>{$row['name']}</td>";
                        echo "<td class='py-2 px-4'>{$row['phone']}</td>";
                        echo "<td class='py-2 px-4'>{$row['address']}</td>";
                        echo "<td class='py-2 px-4'>{$row['pincode']}</td>";
                        echo "<td class='py-2 px-4'>{$row['payment_method']}</td>";
                        echo "<td class='py-2 px-4'>
                                <form action='view_order.php' method='POST'>
                                    <input type='hidden' name='order_id' value='{$row['id']}'>
                                    <button type='submit' class='px-3 py-1 bg-blue-500 text-white rounded'>View Order</button>
                                </form>
                            </td>";
                        echo "</tr>";
                    $i++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>  
        
<?php include 'admin_footer.php'?>
</body>
</html>