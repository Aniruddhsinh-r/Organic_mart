<?php 
include 'includes/header.php';
include 'includes/connection.php';
include 'signup.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoginSignin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/login-signin.css">
</head>
<body>

    <section class="w-full h-full my-5">
        <div id="container" class="relative overflow-hidden mx-auto max-w-[900px] h-[450px] flex bg-white p-5 rounded-3xl">
            <div id="loginsection" class="block w-full md:w-1/2 h-full p-5 sign-up absolute top-0 transition-all duration-700 ease-in-out left-0">
                <form method="POST" action="login.php" class="bg-white px-[40px] h-full">
                    <h1 class="text-center mt-3.5 mb-8 font-bold text-2xl">Log In</h1>
                    <div class="mb-4">
                        <label for="email">User name</label>
                        <input type="text" name="name" class="inputfield" placeholder="Enter User Name">
                    </div>
                    <div class="mb-4">
                        <label for="password">Your password</label>
                        <input type="password" name="pass" class="inputfield" inputmode="numeric">
                    </div>
                    <p class="text-xs text-gray-600">People who use our service may have uploaded their contact information to Ecomart.</p>
                    <p class="text-xs text-gray-600 mt-4">So if you dont have account then please Register first.</p>
                    <div class="mt-6 flex justify-center">
                        <button type="submit" name="loginsubmit" class="text-white bg-gradient-to-r from-indigo-600 via-indigo-600 to-cyan-600 focus:ring-1 focus:outline-none font-medium rounded-lg px-12 py-2 text-center">Log in</button><br>
                    </div>    
                    <p id="registerationform" class="md:hidden text-sm mt-4 text-gray-600 hover:underline">&larr; Already have account</p>
                </form>
            </div>
            <div id="registerationsection" class="hidden md:block w-full md:w-1/2 h-full p-5 sign-in absolute top-0 left-0 bg-white transition-all duration-700 ease-in-out z-[2]">
                <form method="POST" action="" class="bg-white px-[40px] h-full">
                    <h1 class="text-center my-3 font-bold text-2xl">Sign In</h1>
                    <div class="mb-4">
                        <label for="email">User name</label>
                        <input type="text" name="uname" class="inputfield" placeholder="Enter User Name" value="<?php echo htmlspecialchars($name);?>">
                        <span style="color:red;"><?php echo $nameErr; ?></span>
                    </div>
                    <div class="mb-4">
                        <label for="email">Your email</label>
                        <input type="text" name="uemail" class="inputfield" placeholder="name@xyz.com">
                        <span style="color:red;"><?php echo $mailerror; ?></span>
                    </div>
                    <div class="mb-4">
                        <label for="password">Your password</label>
                        <input type="password" name="upass" class="inputfield" inputmode="numeric">
                        <span style="color:red;"><?php echo $passerror;?></span>
                    </div>
                    <button type="submit" name="signinsubmit" class="text-white bg-gradient-to-r from-indigo-600 via-indigo-600 to-cyan-600 focus:ring-1 focus:outline-none font-medium rounded-lg px-5 py-2 text-center">Sign In</button><br>
                    <p id="loginform" class="md:hidden text-sm mt-2 text-gray-600 hover:underline">&larr; Create account</p>
                </form>
                
            </div>
            <div class="toggle-container max-[767px]:hidden absolute top-0 left-1/2 w-1/2 h-full overflow-hidden transition-all duration-700 ease-in-out [border-radius:100px_0_0_100px] z-[1000]">
                <div class="toggle">
                    <div class="toggle-panel toggle-left absolute w-1/2 h-full flex items-center justify-center flex-col px-[30px] text-center top-0 transition-all duration-700 ease-in-out">
                        <h1 class="text-2xl font-semibold">Welcome Back!</h1>
                        <p class="text-[14px] leading-5 tracking-[0.3px] my-[20px]">Enter your personal details to use all of site features</p>
                        <button id="login" class="bg-transparent border border-white text-white text-[12px] px-[45px] py-[10px] rounded-[8px] font-semibold tracking-[0.5px] uppercase mt-[10px] cursor-pointer">Sign In</button>
                    </div>

                    <div class="toggle-panel toggle-right absolute w-1/2 h-full flex items-center justify-center flex-col px-[30px] text-center top-0 right-0 transition-all duration-700 ease-in-out">
                        <h1 class="text-2xl font-semibold">Hello, Friend!</h1>
                        <p class="text-[14px] leading-5 tracking-[0.3px] my-[20px]">Register with your personal details to use all of site features</p>
                        <button id="register" class="bg-transparent border border-white text-white text-[12px] px-[45px] py-[10px] rounded-[8px] font-semibold tracking-[0.5px] uppercase mt-[10px] cursor-pointer">Log IN</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'?>
    <script src="script/login-signin.js"></script>
</body>
</html>