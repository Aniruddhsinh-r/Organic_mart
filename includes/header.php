<?php
include 'connection.php';
include_once 'function.php';

session_start();

if (!isset($_SESSION['user_id']) && isset($_COOKIE['remember_name']) && isset($_COOKIE['remember_pass'])) {
    $name = $_COOKIE['remember_name'];
    $pass = md5($_COOKIE['remember_pass']);

    $userdetail = mysqli_query($conn, "SELECT `id`, `name` FROM `users_table` WHERE name='$name' AND password='$pass'");
    if ($row = mysqli_fetch_assoc($userdetail)) {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['name'];
    } else {
        setcookie('remember_name', '', time() - 3600, "/");
        setcookie('remember_pass', '', time() - 3600, "/");
    }
}

$user_id = $_SESSION['user_id'] ?? null;

if ($user_id) {
    $query = mysqli_query($conn,"SELECT `name` FROM `users_table` where id = $user_id"); 
    if ($row = mysqli_fetch_assoc($query)) {
        $username = htmlspecialchars($row['name']);
    }
} else {
    $username = "guest";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
</head>
</style>
<body class="hidden">

    <header class="bg-green-100 shadow-md">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-12">
            <div class="flex justify-between items-center py-3">
                <div class="flex items-center space-x-2">
                    <img src="https://img.freepik.com/premium-vector/organic-market-logo-design_501861-391.jpg" alt="OrganicMart Logo" class="h-12 w-12 rounded-full object-cover">
                    <span class="text-xl font-bold text-green-700 hidden sm:inline">OrganicMart</span>
                </div>

                <nav class="hidden md:flex items-center space-x-6">
                    <a href="index.php" class="text-green-700 hover:text-green-900 font-medium">Home</a>
                    <a href="shop.php" class="text-green-700 hover:text-green-900 font-medium">shop</a>
                    <a href="aboutus.php" class="text-green-700 hover:text-green-900 font-medium">About</a>
                    <a href="contactus.php" class="text-green-700 hover:text-green-900 font-medium">Contact</a>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <a href="logout.php" class="text-red-700 hover:text-red-900 font-medium transition">Logout</a>
                    <?php else: ?>
                        <a href="LoginSignin.php" class="text-green-700 hover:text-green-900 font-medium transition">Login</a>
                    <?php endif; ?>
                </nav>

                <div class="flex space-x-7">
                    <div class="flex items-center space-x-1">
                        <i class="fa-solid fa-user text-lg text-gray-900"></i>
                        <span class="text-sm font-medium text-gray-900">
                            <?php echo $username ?>
                        </span>
                    </div>
                    <div class="flex items-center"><a href="cart.php"><i class="fa-solid fa-cart-shopping text-lg text-gray-900"><sup class="font-mono"><?php cart_item();?></sup></i></a></div>
                    <button id="menuToggle" class="cursor-pointer text-gray-800 focus:outline-none md:hidden">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
                
            </div>
        </div>

        <div id="menubar" class="hidden fixed right-4 top-16 bg-white rounded-lg shadow-md p-4 space-y-3 w-fit z-[9999]">
            <a href="index.php" class="block text-green-700 hover:text-green-900 font-medium">Home</a>
            <a href="shop.php" class="text-green-700 hover:text-green-900 font-medium">shop</a>
            <a href="aboutus.php" class="block text-green-700 hover:text-green-900 font-medium">About</a>
            <a href="contactus.php" class="block text-green-700 hover:text-green-900 font-medium">Contact</a>
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="logout.php" class="text-red-700 hover:text-red-900 font-medium transition">Logout</a>
            <?php else: ?>
                <a href="LoginSignin.php" class="text-green-700 hover:text-green-900 font-medium transition">Login</a>
            <?php endif; ?>
            </div>
        </header>


    <script src="script/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#menuToggle').click(function () {
            $('#menubar').toggleClass('hidden');
        });
        $("body").fadeIn(70); // super fast fade
    });

    // Fade-out when clicking internal links
    $("a").on("click", function (e) {
        let url = $(this).attr("href");

        // skip empty or external links
        if (!url || url.startsWith("http") && !url.includes(window.location.origin)) {
            return;
        }

        e.preventDefault();
        $("body").fadeOut(150, function () {
            window.location.href = url;
        });
    });
</script>
</body>
</html>