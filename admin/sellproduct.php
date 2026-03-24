<?php include '../includes/connection.php';
include 'admin_header.php';
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
<body>

<?php 
$nameErr = $descriptionErr = $priceErr = $MarketPriceErr = $quantityErr = $IMGErr = "";
$productName = $productDescription = $productPrice = $productMarketPrice = $productQuantity = "";

if (isset($_POST['addProduct'])) {
$productName = mysqli_real_escape_string($conn, $_POST['productName']);
$productDescription = mysqli_real_escape_string($conn, $_POST['productDescription']);
$productPrice = mysqli_real_escape_string($conn, $_POST['productPrice']);
$productMarketPrice = mysqli_real_escape_string($conn, $_POST['productMarketPrice']);
$productQuantity = mysqli_real_escape_string($conn, $_POST['productQuantity']);

    $productIMG = $_FILES['productIMG']['name'];
    $productIMG_temp_name = $_FILES['productIMG']['tmp_name'];
    $productIMGFolder = '../images/'.$productIMG;

    if (empty($productName)) {
        $nameErr = "Please must enter product name";
    }
    if (empty($productDescription)) {
        $descriptionErr = "Please must enter product Description";
    }
    if (empty($productPrice)) {
        $priceErr = "Please enter price";
    } elseif ($productPrice > 200000) {
        $priceErr = "Unable to enter price more then 2,00,000";
    }
    if (empty($productMarketPrice)) {
        $MarketPriceErr = "Please enter market price";
    } elseif ($productMarketPrice > 200000) {
        $MarketPriceErr = "Unable to enter market price more then 2,00,000";
    }
    if (empty($productIMG)) {
        $IMGErr = "Product image is required";
    }
    if ($productQuantity === "" || $productQuantity < 0) {
        $quantityErr = "Please enter quantity";
    } elseif ($productQuantity > 999) {
        $quantityErr = "You cannot add more than 999 quantity";
    }

    if ($nameErr === "" && $descriptionErr === "" && $priceErr === "" && $MarketPriceErr === "" && $IMGErr === "" && $quantityErr === "") {
        $query = mysqli_query($conn,"INSERT INTO `products` (`name`, `description`, `price`, `market-price`, `image`, `quantity`) VALUES('$productName','$productDescription','$productPrice','$productMarketPrice','$productIMG','$productQuantity')") or die("faile to insert query");
        if ($query) {
            move_uploaded_file($productIMG_temp_name ,$productIMGFolder);
            $displayMSG = "product insert successfully";
            $productName = $productDescription = $productPrice = $productMarketPrice = $productQuantity = "";
        }
    } else {
        $displayMSG = "error occurred due to inserting data";
    }

}
?>

    <div class="bg-gray-100 flex items-center justify-center p-4">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-5 text-center">Add Product</h2>
            <form action="" class="space-y-4" method="post" enctype="multipart/form-data">
                <div>
                    <label for="productName" class="block text-sm font-medium text-gray-900 text-gray-800">Product name</label>
                    <input type="text" id="productName" name="productName" class="mt-1 border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white" value="<?php echo htmlspecialchars($productName); ?>" placeholder="Enter product name">
                    <span style="color:red;"><?php echo $nameErr; ?></span>
                </div>

                <div>
                    <label for="productDescription" class="block text-sm font-medium text-gray-900 text-gray-800">Product description</label>
                    <input type="text" id="productDescription" name="productDescription" class="mt-1 border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white" value="<?php echo htmlspecialchars($productDescription);?>" placeholder="Enter product name">
                    <span style="color:red;"><?php echo $descriptionErr; ?></span>
                </div>

                <div>
                    <label for="productQuantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                    <input type="number" id="productQuantity" name="productQuantity" min="0" max="999" class="mt-1 border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white" placeholder="Enter quantity (0 - 999)">
                    <span style="color:red;"><?php echo $quantityErr ?? ''; ?></span>
                </div>

                <div class="flex justify-between items-center mb-4 gap-4">
                    <div>
                        <label for="productPrice" class="block text-sm font-medium text-gray-700">Price (₹)</label>
                        <input type="text" name="productPrice" id="price" name="productPrice" inputmode="numeric" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '')" class="mt-1 border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white" value="<?php echo htmlspecialchars($productPrice);?>" placeholder="Enter price">
                        <span style="color:red;"><?php echo $priceErr; ?></span>
                    </div>

                    <div>
                        <label for="productMarketPrice" class="block text-sm font-medium text-gray-700">Market Price (₹)</label>
                        <input type="text" name="productMarketPrice" id="productMarketPrice" inputmode="numeric" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '')" class="mt-1 border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white" value="<?php echo htmlspecialchars($productMarketPrice);?>" placeholder="Enter market price">
                        <span style="color:red;"><?php echo $MarketPriceErr; ?></span>
                    </div>
                </div>

                <div>
                    <label for="productIMG" class="block text-sm font-medium text-gray-700">Product Image</label>
                    <input type="file" name="productIMG" id="productIMG" accept="image/jpg, image/jpeg, image/png" class="mt-1 w-full border border-gray-300 text-gray-900 rounded-lg file:mr-4 file:py-2 file:px-4 file:border-0 file:rounded-md file:bg-gray-700 file:text-white hover:file:bg-gray-600 transition">
                    <span style="color:red;"><?php echo $IMGErr; ?></span>
                </div>

                <div class="pt-2">
                    <button type="submit" name="addProduct" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2 text-center">Add</button>
                </div>
                <?php
                if (isset($displayMSG)) {
                    echo " <div class='mt-2 w-full rounded-lg border border-green-300 bg-green-100 text-green-800 text-sm px-4 py-2 relative'>
                        <span class='block'>$displayMSG</span>
                        <button type='button' class='absolute top-2 right-3 text-green-700 hover:text-green-900' onclick=\"this.parentElement.style.display='none';\">
                            <i class='fa fa-times text-red-600 hover:text-red-800''></i>
                        </button>
                    </div>";
                }
                ?>
            </form>
        </div>
    </div>

    <section class="p-8 max-w-full overflow-x-auto">
        <table class="w-full border-collapse bg-white border border-black shadow-lg rounded-md">
            <thead>
                <th>No</th>
                <th>image</th>
                <th>name</th>
                <th>qty</th>
                <th>update</th>
                <th>delete</th>
            </thead>
            <tbody>
            <?php 
                $display_product = mysqli_query($conn,"select * from `products`");
                if (mysqli_num_rows($display_product)>0) {
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($display_product)) {
                        $productName = $row['name'];
                        $productIMG = $row['image'];
                        $productQty = $row['quantity']
                        ?>
                        <tr>
                            <td><?php echo $no;?></td>
                            <td><img src="../images/<?php echo $productIMG ?>" alt="<?php echo $productName?>"  class="w-16 h-16 rounded-md object-contain"></td>
                            <td><?php echo $productName ?></td>
                            <td><?php echo $productQty ?></td>
                            <td><a href="updateproduct.php?update=<?php echo $row['id']?>"><i class="fa-solid fa-file-pen"></i>update</a></td>
                            <td><a href="delete.php?delete=<?php echo $row['id']?>" onclick="return confirm('are you sure you wont to delete this product.');"><i class="fa-solid fa-trash"></i>delete</a></td>
                        </tr>
                        <?php
                        $no++;
                    }
            
                } else {
                    echo "no products available";
                }
            ?>
            </tbody>
        </table>
    </section>
    <?php include 'admin_footer.php'?>
    <script src="../script/script.js"></script>
</body>
</html>