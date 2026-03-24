<?php include 'includes/connection.php';
    include('includes/header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecomart</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
    .fade-container {
        opacity: 0;
        transform: translateY(10px);
        transition: opacity 0.6s ease, transform 0.6s ease;
    }
    .fade-container.show {
        opacity: 1;
        transform: translateY(0);
    }
</style>
<body class="mx-auto">

    <section class="my-8 px-10">
        <form method="GET" class="mb-6 flex gap-2">
            <input type="text" name="search" placeholder="Search product..." class="w-full border px-4 py-2 rounded">
            <button class="bg-black text-white px-4 py-2 rounded">Search</button>
        </form>
        
        <div class="w-auto">
            <div class="section_title">
                <h2>Our Products</h2>
                <img src="https://www.pngall.com/wp-content/uploads/15/Divider-PNG-File.png" alt="">
            </div>
            <div id="products" class="fade-container grid my-8 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

                <?php
                if (!empty($_GET['search'])) {
                    include "search_products.php";
                } else {
                    $limit = 9;
                    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
                    $start = ($page - 1) * $limit;
                                    
                    $result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM products");
                    $row = mysqli_fetch_assoc($result);
                    $total_products = $row['total'];
                    $total_pages = ceil($total_products / $limit);

                    $display_product = mysqli_query($conn, "SELECT * FROM products LIMIT $start, $limit");
                    if (mysqli_num_rows($display_product)>0) {
                        include 'userproduct.php';
                    } 
                }
                ?>
                
            </div>
            <div class="w-full flex justify-center mt-10">
                <div class="bg-white shadow rounded-full px-4 py-2 flex items-center gap-2">
                    <a href="?page=<?= max(1, $page - 1) ?>" class="px-2 py-1 rounded-full text-gray-600 hover:bg-gray-200 <?= $page == 1 ? 'opacity-40 pointer-events-none' : '' ?>">&#10094;</a>

                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <?php if ($i == $page): ?>
                            <span class="px-3 py-1 bg-black text-white rounded-full"><?= $i ?></span>
                        <?php else: ?>
                            <a href="?page=<?= $i ?>" class="px-3 py-1 rounded-full text-gray-700 hover:bg-gray-200"><?= $i ?></a>
                        <?php endif; ?>
                    <?php endfor; ?>
                        
                    <!-- Next -->
                    <a href="?page=<?= min($total_pages, $page + 1) ?>" class="px-2 py-1 rounded-full text-gray-600 hover:bg-gray-200 <?= $page == $total_pages ? 'opacity-40 pointer-events-none' : '' ?>">&#10095;</a>
                </div>
            </div>
        </div> 
    </section>

<?php 
include "includes/footer.php";
?>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const container = document.getElementById("products");
        if (container) {
            setTimeout(() => {
                container.classList.add("show");
            }, 50);
        }
    });
</script>
</body>
</html>