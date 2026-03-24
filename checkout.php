<?php 
include 'includes/connection.php';
include('includes/header.php');

$user_id = $_SESSION['user_id'] ?? null;
if (isset($_POST['checkout_btn'])) {

    if (!isset($user_id)) {
        echo "<script>alert('please create and login account first.');
            window.location.href = 'LoginSignin.php';</script>";
        exit; 
    }
}

$cartCheck = mysqli_query($conn, "SELECT * FROM cart WHERE user_id='$user_id'");
if (mysqli_num_rows($cartCheck) == 0) {
    echo "<script>
        alert('Your cart is empty! Please add items to continue.');
        window.location.href = 'shop.php';
    </script>";
    exit;
}

$nameErr = $PhoneErr = $AddressErr = $PincodeErr = $paymentErr = "";
$Name = $phoneNo = $address = $pincode = $payment_method = "";

if (isset($_POST['order_confirm'])) {
    $Name = trim($_POST['name']);
    $phoneNo = trim($_POST['phoneNo']);
    $address = trim($_POST['address']);
    $pincode = trim($_POST['pincode']);
    $payment_method = $_POST['payment_method'] ?? "";

    if (empty($Name)) {
        $nameErr = "Please enter Full name";
    }
    if (!preg_match("/^[0-9]{10}$/", $phoneNo)) {
        $PhoneErr = "Phone number must be 10 digits";
    }
    if (empty($address)) {
        $AddressErr = "Address is required";
    }
    if (empty($pincode)) {
        $PincodeErr = "Pincode is required";
    } elseif (!preg_match("/^[0-9]{6}$/", $pincode)) {
        $PincodeErr = "Pincode must be 6 digits";
    }
    if (empty($payment_method)) {
        $paymentErr = "Please select a payment method";
    }

    if ($nameErr === "" && $PhoneErr === "" && $AddressErr === "" && $PincodeErr === "" && $paymentErr === "") {
        $query = mysqli_query($conn,"INSERT INTO `orders`(user_id, name, phone, address, pincode, payment_method) VALUES ('$user_id', '$Name', '$phoneNo', '$address', '$pincode', '$payment_method')");
        if ($query) {
            $order_id = mysqli_insert_id($conn); 

            $cart = mysqli_query($conn, "SELECT * FROM cart WHERE user_id='$user_id'");
            while ($item = mysqli_fetch_assoc($cart)) {
                $product_id = $item['product_id'];
                $product_img = $item['image'];
                $product_name = $item['name'];
                $price = $item['price'];
                $qty = $item['quantity'];
                $total = $price * $qty;

                    $checkStock = mysqli_query($conn, "SELECT quantity FROM products WHERE id='$product_id'");
                    $stock = mysqli_fetch_assoc($checkStock)['quantity'];

                    if ($qty > $stock) {
                        echo "<script>alert('Sorry! Product \"{$item['name']}\" is out of stock or not enough quantity.'); window.location.href='cart.php';</script>";
                        exit;
                    }

                $query2 = mysqli_query($conn,"INSERT INTO order_items (order_id, product_id, image, product_name, price, quantity, total)VALUES ('$order_id', '$product_id', '$product_img', '$product_name', '$price', '$qty', '$total')");
                mysqli_query($conn, "UPDATE products SET quantity = quantity - $qty WHERE id = '$product_id'");

            }
            
            mysqli_query($conn, "DELETE FROM cart WHERE user_id='$user_id'");
            echo "<script>
                window.location.href = 'shop.php';
                alert('Order place successfully');
            </script>";
        }
    } 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkout</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    
<div class="min-h-screen bg-gray-50 py-10">
    <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-4">

        <div class="lg:col-span-2 bg-white p-8 rounded-xl shadow">
            <h2 class="text-2xl font-semibold mb-6">Checkout Information</h2>

            <form action="" method="POST" class="space-y-4">
                <div>
                    <label for="name" class="block font-medium text-gray-700 "><i class="fa-solid fa-user"></i> Full name</label>
                    <input type="text" id="name" name="name" class="mt-1 border rounded-lg block w-full p-2.5 border-gray-400 placeholder-gray-500" placeholder="Full name" value="<?= htmlspecialchars($Name) ?>">
                    <span style="color:red;"><?php echo $nameErr; ?></span>
                </div>

                <div>
                    <label for="phoneNo" class="block font-medium text-gray-700"><i class="fa-duotone fa-solid fa-phone"></i> Phone Number *</label>
                    <input type="text" id="phoneNo" name="phoneNo" class="mt-1 border rounded-lg block w-full p-2.5 border-gray-400 placeholder-gray-500" maxlength="10" placeholder="Contact No" value="<?= htmlspecialchars($phoneNo) ?>">
                    <span style="color:red;"><?php echo $PhoneErr; ?></span>
                </div>

                 <div>
                    <label for="address" class="block font-medium text-gray-700"><i class="fa-duotone fa-solid fa-address-card"></i> Address</label>
                    <input type="text" id="address" name="address" class="mt-1 border rounded-lg block w-full p-2.5 border-gray-400 placeholder-gray-500" placeholder="House no and recidancy name" value="<?= htmlspecialchars($address) ?>">
                    <span style="color:red;"><?php echo $AddressErr; ?></span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-14">
                    <div>
                        <label for="pincode" class="block font-medium mb-1 text-gray-700">Pincode *</label>
                        <input type="text" id="pincode" name="pincode" class="mt-1 border rounded-lg block w-full p-2.5  border-gray-400 placeholder-gray-500" maxlength="6" placeholder="Pincode" value="<?= htmlspecialchars($pincode) ?>">
                        <span style="color:red;"><?php echo $PincodeErr; ?></span>
                    </div>

                    <div>
                        <label for="" class="block font-medium mb-1 text-gray-700">Payment method*</label>
                        <div class="flex items-center gap-2">
                            <input id="cod" type="radio" value="cod" name="payment_method" class="w-4 h-4">
                            <label for="cod" class="text-sm font-medium text-gray-900">Cash on delivery (COD)</label>
                        </div>

                        <div class="flex items-center gap-2 mt-2">
                            <input id="online" type="radio" value="online" name="payment_method" class="w-4 h-4">
                            <label for="online" class="text-sm font-medium text-gray-900">Pay online</label>
                        </div>
                        <span style="color:red;"><?php echo $paymentErr; ?></span>           
                    </div>
                </div>
                            
                <div class="col-span-2 mt-4">
                    <button type="submit" name="order_confirm" class="bg-black text-white py-3  w-full block text-center rounded hover:bg-gray-800">CHECKOUT</button>
                </div>
            </form>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-lg w-full lg:w-[350px] h-fit sticky top-5">
            <h2 class="text-xl font-semibold mb-4">Review your cart</h2>
            
            <div class="min-h-72 overflow-y-auto pr-2 space-y-4">
                <?php
                $query = mysqli_query($conn, "SELECT * FROM cart WHERE user_id='$user_id'");
                $subtotal = 0;

                while ($item = mysqli_fetch_assoc($query)):
                    $price = $item['price'] * $item['quantity'];
                    $subtotal += $price;
                ?>
        
                <div class="flex items-start gap-3 pb-4 border-b border-gray-200">
                    <img src="images/<?= $item['image'] ?>" class="w-16 h-16 rounded-lg object-cover shadow-sm">

                    <div class="flex-1">
                        <p class="font-medium"><?= $item['name'] ?></p>
                        <p class="text-sm text-gray-500"><?= $item['quantity'] ?>x</p>
                        <p class="font-semibold mt-1">₹<?= $price ?></p>
                    </div>
                </div>

                <?php endwhile; ?>
            </div>

            <div class="mt-6 space-y-2 text-sm">
                <div class="flex justify-between font-semibold text-lg pt-3 border-t">
                    <span>Total</span>
                    <span>₹<?= $subtotal ?></span>
                </div>
            </div>
            <a href="shop.php" class="block mt-5 text-center py-3 w-full py-3 bg-gray-700 text-white font-semibold rounded-lg hover:bg-gray-800 transition">shop more</a>
        </div>
    </div>
</div>

<script>
document.getElementById("phoneNo").addEventListener("input", function () {
    this.value = this.value.replace(/[^0-9]/g, "");
});
document.getElementById("pincode").addEventListener("input", function () {
    this.value = this.value.replace(/[^0-9]/g, "");
});
</script>

<?php include 'includes/footer.php'?>
<script src="script/script.js"></script>
</body>
</html>