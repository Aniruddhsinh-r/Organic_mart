<?php include 'includes/connection.php';

$search = $_GET['search'] ?? "";
$query = mysqli_query($conn,"SELECT * FROM `products` WHERE name LIKE '%$search%' OR description LIKE '%$search%'");

    while ($row = mysqli_fetch_assoc($query)) {
        $product_id = $row['id'];
        $productName = $row['name'];
        $productDescription = $row['description'];
        $productPrice = $row['price'];
        $productMarketPrice = $row['market-price'];
        // $quantity = $row['quantity'];
        $productIMG = $row['image'];
        ?>
            <form action="manage_cart.php" method="POST">
                <div class="bg-white rounded-lg overflow-hidden shadow-md product-card" data-aos="fade-up">
                    <div class="h-48 bg-gray-50 flex items-center justify-center p-4">
                        <img src="images/<?php echo $productIMG?>" alt="<?php echo $productName?>" class="h-full object-contain">
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="font-bold text-lg"><?php echo $productName ?></h3>
                            <span class="bg-red-500 text-white text-sm px-2 py-1 rounded-full"><?php echo  round((($productMarketPrice - $productPrice) / $productMarketPrice) * 100, 2);?>%</span>
                        </div>
                        <p class="text-gray-700 h-12 mb-2 line-clamp-2"><?php echo $productDescription?></p>
                        <div class="flex items-center mb-4">
                            <span class="text-xl font-bold">&#8377;<?php echo $productPrice?></span>
                            <span class="text-gray-500 line-through ml-2">&#8377;<?php echo $productMarketPrice?></span>
                        </div>
                        <input type="hidden" name="quantity" min="1" value='1'>
                        <input type="hidden" name="product_id" value="<?= htmlspecialchars($product_id)?>">
                        <input type="hidden" name="Item_img" value="<?= htmlspecialchars($productIMG)?>">
                        <input type="hidden" name="Item_name" value="<?= htmlspecialchars($productName) ?>">    
                        <input type="hidden" name="Item_description" value="<?= htmlspecialchars($productDescription) ?>">    
                        <input type="hidden" name="Item_price" value="<?= htmlspecialchars($productPrice) ?>">
                        <input type="hidden" name="Item_id" value="<?= htmlspecialchars($product_id) ?>">
                        <input type="submit" value="Add to Cart" name="cartbtn" class="w-full bg-black text-white py-2 rounded-full hover:bg-gray-800 transition">
                    </div>
                </div>
            </form>
        <?php
    }   

?>