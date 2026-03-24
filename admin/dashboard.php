<?php
include 'admin_header.php';
include '../includes/connection.php';

$total_products = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM products"))['total'];

$total_users = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM users_table"))['total'];

$total_orders = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM orders"))['total'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="min-h-screen bg-gray-100 p-6 sm:p-10">
        <h1 class="text-3xl font-bold text-green-800 mb-8 text-center">Admin Dashboard</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-green-100 p-6 rounded-xl shadow-lg hover:shadow-2xl transition duration-300 transform hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-green-800">Total Products</h3>
                        <p class="mt-2 text-3xl font-bold text-green-900"><?php echo $total_products; ?></p>
                    </div>
                    <div class="text-green-700 text-4xl">
                        <i class="fa-solid fa-box-open"></i>
                    </div>
                </div>
            </div>

            <div class="bg-green-200 p-6 rounded-xl shadow-lg hover:shadow-2xl transition duration-300 transform hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-green-900">Total Users</h3>
                        <p class="mt-2 text-3xl font-bold text-green-950"><?php echo $total_users; ?></p>
                    </div>
                    <div class="text-green-800 text-4xl">
                        <i class="fa-solid fa-users"></i>
                    </div>
                </div>
            </div>

            <div class="bg-green-300 p-6 rounded-xl shadow-lg hover:shadow-2xl transition duration-300 transform hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-green-900">Total Orders</h3>
                        <p class="mt-2 text-3xl font-bold text-green-950"><?php echo $total_orders; ?></p>
                    </div>
                    <div class="text-green-800 text-4xl">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-10 flex flex-col sm:flex-row sm:justify-center sm:space-x-6 space-y-4 sm:space-y-0">
            <a href="sellproduct.php" class="bg-[#107869] hover:bg-green-600 text-white px-6 py-3 rounded-lg shadow-lg font-semibold transition duration-300">Manage Products</a>
            <a href="users.php" class="bg-[#107869] hover:bg-green-600 text-white px-6 py-3 rounded-lg shadow-lg font-semibold transition duration-300">Manage Users</a>
            <a href="" class="bg-[#107869] hover:bg-green-600 text-white px-6 py-3 rounded-lg shadow-lg font-semibold transition duration-300">View Orders</a>
        </div>

        <div class="mt-12">
            <h2 class="text-2xl font-bold text-green-800 mb-4">Recently Added Products</h2>
            <div class="overflow-x-auto">
                <table class="w-full border-collapse bg-white border border-black shadow-lg rounded-md">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Product Name</th>
                            <th>Price (₹)</th>
                            <th class="py-2 px-4 text-left">Market Price (₹)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $products = mysqli_query($conn, "SELECT * FROM products ORDER BY id DESC LIMIT 5");
                        $i = 1;
                        while ($row = mysqli_fetch_assoc($products)) {
                            echo "<tr class='border-b border-green-100 hover:bg-green-50'>";
                            echo "<td class='py-2 px-4'>{$i}</td>";
                            echo "<td class='py-2 px-4'>{$row['name']}</td>";
                            echo "<td class='py-2 px-4'>{$row['price']}</td>";
                            echo "<td class='py-2 px-4'>{$row['market-price']}</td>";
                            echo "</tr>";
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>    
    </div>
    <?php include "admin_footer.php"?>
</body>
</html>

