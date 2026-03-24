<?php include 'includes/connection.php';
    // $display_product = mysqli_query($conn,"select * from `products` LIMIT 6");
    // if (mysqli_num_rows($display_product)>0) {
            // echo "yes";
        while ($row = mysqli_fetch_assoc($display_product)) {
                // echo $row['name']; 
                $product_id = $row['id'];
                $productName = $row['name'];
                $productDescription = $row['description'];
                $productPrice = $row['price'];
                $productMarketPrice = $row['market-price'];
                $quantity = $row['quantity'];
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
                        <div class="flex justify-between items-center mb-4">
                            <div class="flex items-center">
                                <span class="text-xl font-bold">&#8377;<?php echo $productPrice?></span>
                                <span class="text-gray-500 line-through ml-2">&#8377;<?php echo $productMarketPrice?></span>
                            </div>

                            <div class="flex items-center">
                                <span class="text-xl font-bold">Qty:-</span>
                                <span class="text-gray-500 ml-2"><?php echo $quantity?></span>
                            </div>
                        </div>    

                        <input type="hidden" name="quantity" min="1" value='1'>
                        <input type="hidden" name="product_id" value="<?= htmlspecialchars($product_id)?>">
                        <input type="hidden" name="Item_img" value="<?= htmlspecialchars($productIMG)?>">
                        <input type="hidden" name="Item_name" value="<?= htmlspecialchars($productName) ?>">    
                        <input type="hidden" name="Item_description" value="<?= htmlspecialchars($productDescription) ?>">    
                        <input type="hidden" name="Item_price" value="<?= htmlspecialchars($productPrice) ?>">
                        <input type="hidden" name="Item_quantity" value="<?= htmlspecialchars($quantity) ?>">
                        <input type="hidden" name="Item_id" value="<?= htmlspecialchars($product_id) ?>">
                        <?php
                        if ($quantity >= 1) {        
                            echo "<input type='submit' value='Add to Cart' name='cartbtn' class='w-full bg-black text-white py-2 rounded-full hover:bg-gray-800 transition cursor-pointer'>";
                        } else {
                            echo "<button disabled class='w-full bg-gray-400 text-white py-2 rounded-full cursor-not-allowed'>Out of Stock</button>";
                        }
                        ?>
                    </div>
                </div>
            </form>
        <?php
        }
    // } else {
    //     echo "no products available";
    // }
?>
