<?php include 'includes/header.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aboutus</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="w-full h-56 py-14 bg-green-50 text-center line">
        <h1 class="text-4xl md:text-5xl font-bold text-green-800 mb-4">Welcome to OrganicMart</h1>
        <p class="text-lg md:text-xl max-w-2xl mx-auto text-green-900">Rooted in Nature. Grown with Care. Shared with Love.</p>
    </div>

    <section class="bg-green-50 py-16 px-6">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-3xl font-semibold text-green-800 mb-10">🍀 What We Offer</h2>
            <div class="grid md:grid-cols-3 gap-10">
                <div class="bg-white p-6 rounded shadow hover:shadow-lg transition">
                    <h3 class="text-xl font-semibold mb-2 text-green-700">From Farms to your Kitchen</h3>
                    <p class="text-gray-600">In our quest to get people to eat the way our ancestors ate.</p>
                </div>
                <div class="bg-white p-6 rounded shadow hover:shadow-lg transition">
                    <h3 class="text-xl font-semibold mb-2 text-green-700">Product guarantee</h3>
                    <p class="text-gray-600">We take responsibility to Delivered with pure guarantee — safely, securely, and with care..</p>
                </div>
                <div class="bg-white p-6 rounded shadow hover:shadow-lg transition">
                    <h3 class="text-xl font-semibold mb-2 text-green-700">Eco-Friendly Living</h3>
                    <p class="text-gray-600">Our packaging is biodegradable or recyclable, and our practices are planet-first.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-green-100 py-16 px-6">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-3xl font-semibold text-green-800 mb-10">👩‍🌾 Meet the Team</h2>
            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-10">
                <div>
                    <img src="founders/founder1.jpg" alt="Founder" class="mx-auto rounded-full w-32 h-32 mb-4 object-cover object-center">
                    <h3 class="text-xl font-semibold text-green-700">Rathod Aniruddhsinh</h3>
                    <p class="text-gray-600 text-sm">Founder & CEO</p>
                </div>
                <div>
                    <img src="founders/founder2.jpg" alt="Nutritionist" class="mx-auto rounded-full w-32 h-32 mb-4 object-cover object-center">
                    <h3 class="text-xl font-semibold text-green-700">Patil Mukesh</h3>
                    <p class="text-gray-600 text-sm">Lead Nutritionist</p>
                </div>
                <div>
                    <img src="founders/founder3.jpg" alt="Farm Liaison" class="mx-auto rounded-full w-32 h-32 mb-4 object-cover object-center">
                    <h3 class="text-xl font-semibold text-green-700">Saikh Miraj</h3>
                    <p class="text-gray-600 text-sm">Farm Liaison</p>
                </div>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'?>
</body>
</html>