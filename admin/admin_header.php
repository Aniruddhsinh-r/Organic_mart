<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <header class="bg-green-100 shadow-md">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-12">
            <div class="flex justify-between items-center py-3">
                <!-- <div class="flex items-center space-x-2">
                    <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Admin Logo" class="h-12 w-12 rounded-full object-cover">
                    <span class="text-xl font-bold text-blue-700 hidden sm:inline">Admin Panel</span>
                </div> -->
                <div class="flex items-center space-x-2">
                    <img src="https://img.freepik.com/premium-vector/organic-market-logo-design_501861-391.jpg" alt="OrganicMart Logo" class="h-12 w-12 rounded-full object-cover">
                    <span class="text-xl font-bold text-green-700 hidden sm:inline">OrganicMart</span>
                </div>

                <nav class="hidden md:flex items-center space-x-6">
                    <a href="dashboard.php" class="text-green-700 hover:text-green-900 font-medium">Dashboard</a>
                    <a href="sellproduct.php" class="text-green-700 hover:text-green-900 font-medium">Products</a>
                    <a href="users.php" class="text-green-700 hover:text-green-900 font-medium">Customer</a>
                    <a href="feedback.php" class="text-green-700 hover:text-green-900 font-medium">Feedback</a>
                    <a href="orders.php" class="text-green-700 hover:text-green-900 font-medium">Orders</a>
                </nav>

                <div class="flex space-x-7 ml-24">
                    <div class="flex items-center space-x-1 text-green-700">
                        <i class="fa-solid fa-user-shield text-lg"></i>
                        <span class="font-medium">Admin</span>
                    </div>
                    <button id="menuToggle" class="cursor-pointer text-gray-800 focus:outline-none md:hidden">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        
        <div id="menubar" class="hidden absolute right-4 bg-white rounded-lg shadow-md p-4 space-y-3 w-fit z-[9999]">
            <a href="dashboard.php" class="block text-green-700 hover:text-green-900 font-medium">Dashboard</a>
            <a href="sellproduct.php" class="block text-green-700 hover:text-green-900 font-medium">Products</a>
            <a href="users.php" class="block text-green-700 hover:text-green-900 font-medium">Customer</a>
            <a href="feedback.php" class="block text-green-700 hover:text-green-900 font-medium">Feedback</a>
            <a href="orders.php" class="block text-green-700 hover:text-green-900 font-medium">Orders</a>
        </div>
        
    </header>


    <script src="script/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#menuToggle').click(function () {
            $('#menubar').toggleClass('hidden');
        });
    });
</script>

</body>
</html>