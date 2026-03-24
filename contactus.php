<?php include 'includes/connection.php';
    include('includes/header.php');

$first_name = $email = $pno = $message = "";
$errors = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $first_name = trim(htmlspecialchars($_POST['first_name']));
    $email = trim(htmlspecialchars($_POST['email']));
    $pno = trim(htmlspecialchars($_POST['pno']));
    $message = trim(htmlspecialchars($_POST['message']));

    if (empty($first_name)) {
        $errors[] = "Name is required.";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter valid email.";
    }

    if (!empty($pno) && !preg_match("/^[0-9]{10,15}$/", $pno)) {
        $errors[] = "Enter a valid phone number (10 digits).";
    }

    if (empty($message)) {
        $errors[] = "Must write your thought in text area.";
    }

    if (empty($errors)) {
        $query = mysqli_query($conn,"INSERT INTO contact_messages (name, email, pno, user_messege) VALUES ('$first_name', '$email', '$pno', '$message')");

        if ($query) {
            echo "<div class='max-w-lg mx-auto mt-6 bg-green-100 text-green-800 px-4 py-3 rounded-lg text-center'>Message sent successfully!</div>";
        } else {
            echo "<div class='max-w-lg mx-auto mt-6 bg-red-100 text-red-800 px-4 py-3 rounded-lg text-center'>Database error. Please try again later.</div>";
        }
    } else {
        echo "<div class='max-w-lg mx-auto mt-6 bg-red-100 text-red-800 px-4 py-3 rounded-lg'>";
        foreach ($errors as $err) {
            echo "<p>• $err</p>";
        }
        echo "</div>";
    }
}
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
<body class="mx-auto">
    <div class="max-w-6xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden flex flex-col md:flex-row my-10">
        <div class="md:w-1/2 bg-white p-10 rounded-2xl text-left text-gray-800 space-y-6">
            <div>
                <h1 class="text-2xl font-medium text-gray-700 mb-2">Get in touch</h1>
                <p class="text-gray-800 flex items-center justify-center gap-2 mb-1">Questions, bug reports, feedback, features request - we're here for it.</p>
            </div>

            <div>
                <h3 class="text-sm font-semibold text-gray-600 tracking-wider">EMAIL</h3>
                <p class="text-[#b56a6a] font-medium">adanirudda@gmail.com</p>
            </div>

            <div>
                <h3 class="text-sm font-semibold text-gray-600 tracking-wider">WHATSAPP</h3>
                <p class="text-[#b56a6a] font-medium">+91 999 837 9764</p>
            </div>

            <div>
                <h3 class="text-sm font-semibold text-gray-600 tracking-wider">INSTAGRAM</h3>
                <p class="text-[#b56a6a] font-medium">rathod___ani</p>
            </div>

            <div class="flex items-center gap-5 pt-4">
                <a href="https://www.instagram.com/ani___rathod/?next=%2F" class="text-gray-700 hover:text-[#b56a6a] text-2xl">
                    <i class="fa-brands fa-instagram"></i>
                </a>
                <a href="tel:9998378764" class="text-gray-700 hover:text-[#b56a6a] text-2xl">
                    <i class="fa-brands fa-whatsapp"></i>
                </a>
                <a href="mailto:adanirudda@gmail.com" class="text-gray-700 hover:text-[#b56a6a] text-2xl">
                    <i class="fa-solid fa-envelope"></i>
                </a>
            </div>
        </div>

        <div class="md:w-1/2 bg-gray-50 p-8">
            <form action="" method="POST" class="space-y-4">
                <input type="text" name="first_name" placeholder="Name" class="w-full px-4 py-3 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
                <input type="email" name="email" placeholder="E-mail?" class="w-full px-4 py-3 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
                <input type="text" name="pno" placeholder="Phone Number" class="w-full px-4 py-3 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
                <textarea name="message" rows="4" placeholder="Your questions..." class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 resize-none"></textarea>
                
                <button type="submit" class="bg-gradient-to-r from-purple-600 to-blue-400 text-white text-sm font-semibold px-6 py-3 rounded-full transition hover:opacity-90">Send Message</button>
            </form>
        </div>
    </div>

<?php include 'includes/footer.php'?>
</body>
</html>