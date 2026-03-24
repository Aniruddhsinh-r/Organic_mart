<?php include '../includes/connection.php';

$nameErr = $descriptionErr = $priceErr = $MarketPriceErr = $quantityErr = $IMGErr = "";
if (isset($_POST['update_product'])) {
    $updat_id = mysqli_real_escape_string($conn, $_POST['updated_id']); 
    $updeted_productName = mysqli_real_escape_string($conn, $_POST['updeted_productName']); 
    $update_productdescription = mysqli_real_escape_string($conn, $_POST['updated_productDescription']);
    $updated_quantity = mysqli_real_escape_string($conn, $_POST['updated_quantity']);
    $updated_Price = mysqli_real_escape_string($conn, $_POST['updated_Price']); 
    $updated_MarketPrice = mysqli_real_escape_string($conn, $_POST['updated_MarketPrice']); 
    $updatedIMG = mysqli_real_escape_string($conn, $_FILES['updatedIMG']['name']);
    $updatedIMG_temp_name = mysqli_real_escape_string($conn, $_FILES['updatedIMG']['tmp_name']);
    $updatedIMGFolder = 'images/'.$updatedIMG;

    if (empty($updeted_productName)) {
        $nameErr = "Please must enter product name";
    }
    if (empty($update_productdescription)) {
        $descriptionErr = "Please must enter product Description";
    }
    if (empty($updated_Price)) {
        $priceErr = "Please enter price";
    } elseif ($updated_Price > 200000) {
        $priceErr = "Unable to enter price more then 2,00,000";
    }
    if (empty($updated_MarketPrice)) {
        $MarketPriceErr = "Please enter market price";
    } elseif ($updated_MarketPrice > 200000) {
        $MarketPriceErr = "Unable to enter market price more then 2,00,000";
    }
    if ($updated_quantity === "" || $updated_quantity < 0) {
        $quantityErr = "Please enter quantity";
    } elseif ($updated_quantity > 999) {
        $quantityErr = "You cannot add more than 999 quantity";
    }

    if ($nameErr === "" && $descriptionErr === "" && $priceErr === "" && $MarketPriceErr === "" && $quantityErr === "") {
        if (!empty($updatedIMG)) {
            $update_product = mysqli_query($conn,"UPDATE `products` SET name='$updeted_productName', description='$update_productdescription', price='$updated_Price', `market-price`='$updated_MarketPrice',image='$updatedIMG', quantity='$updated_quantity' WHERE ID=$updat_id");

            if ($update_product) {
                move_uploaded_file($updatedIMG_temp_name, $updatedIMGFolder);
                echo "Product updated successfully.";
                header('Location: sellproduct.php');
                exit();
            } else {
                echo "Failed to update product with image.";
            }

        } else {
            $update_product = mysqli_query($conn,"UPDATE `products` SET name='$updeted_productName', description='$update_productdescription', price='$updated_Price', `market-price`='$updated_MarketPrice', quantity='$updated_quantity' WHERE ID=$updat_id");

            if ($update_product) {
                echo "Product updated successfully without changing image.";
                header('Location: sellproduct.php');
                exit();
            } else {
                echo "Failed to update product.";
            }
        }
    }
}

if (isset($_POST['Cancel'])) {
    header('Location: sellproduct.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UpdateProduct</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php 
if (isset($_GET['update'])) {
    $update_id=$_GET["update"];
    $update_query=mysqli_query($conn,"SELECT * FROM `products` WHERE id=$update_id");
    if (mysqli_num_rows($update_query)>0) {
    $row = mysqli_fetch_assoc($update_query);
        ?>
        <div class="bg-gray-100 flex items-center justify-center p-4">
            <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-5 text-center">Update Product</h2>
                <form action="" class="space-y-4" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="updated_id" value="<?php echo $row['id']?>">
                    <div>
                        <label for="updeted_productName" class="block text-sm font-medium text-gray-900 dark:text-gray-800">Product name</label>
                        <input type="text" name="updeted_productName" class="mt-1 border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white" placeholder="Enter product name" required value="<?php echo $row['name']?>"/>
                        <span style="color:red;"><?php echo $nameErr; ?></span>
                    </div>

                    <div>
                        <label for="productDescription" class="block text-sm font-medium text-gray-900 dark:text-gray-800">Product description</label>
                        <input type="text" name="updated_productDescription" class="mt-1 border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white" placeholder="Enter product name" required value="<?php echo $row['description']?>">
                        <span style="color:red;"><?php echo $descriptionErr; ?></span>
                    </div>

                    <div>
                        <label for="updated_quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                        <input type="number" id="updated_quantity" name="updated_quantity" min="0" max="999" class="mt-1 border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white" placeholder="Enter quantity (0 - 999)" value="<?php echo $row['quantity']?>">
                        <span style="color:red;"><?php echo $quantityErr ?? ''; ?></span>
                    </div>

                    <div class="flex justify-between items-center mb-4 gap-4">
                        <div>
                            <label for="updated_Price" class="block text-sm font-medium text-gray-700">Price (₹)</label>
                            <input type="text" name="updated_Price" id="price" name="updated_Price" inputmode="numeric" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '')" class="mt-1 border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white" value="<?php echo $row['price']?>" placeholder="Enter price">
                            <span style="color:red;"><?php echo $priceErr; ?></span>
                        </div>

                        <div>
                            <label for="updated_MarketPrice" class="block text-sm font-medium text-gray-700">Market Price (₹)</label>
                            <input type="text" name="updated_MarketPrice" id="updated_MarketPrice" inputmode="numeric" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '')" class="mt-1 border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white" value="<?php echo $row['market-price']?>" placeholder="Enter market price">
                            <span style="color:red;"><?php echo $MarketPriceErr; ?></span>
                        </div>
                    </div>

                    <div>
                        <label for="productIMG" class="block text-sm font-medium text-gray-700">Product Image</label>
                        <input type="file" name="updatedIMG" accept="image/jpg, image/jpeg, image/png" class="mt-1 w-full border border-gray-300 text-gray-900 rounded-lg file:mr-4 file:py-2 file:px-4 file:border-0 file:rounded-md file:bg-gray-700 file:text-white hover:file:bg-gray-600 transition">
                        <span style="color:red;"><?php echo $IMGErr; ?></span>
                    </div>

                    <div class="pt-2">
                        <button type="submit" name="update_product" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2 text-center" value="update_product">Update</button>
                        <button type="submit" name="Cancel" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2 text-center">Cancel</button>
                    </div>
                </form>
            </div>
        </div>

    <?php
    }
}
?>
</body>
</html>