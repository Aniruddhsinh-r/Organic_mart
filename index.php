<?php include 'includes/connection.php';
    include('includes/header.php');
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

    <section>
        <div class="container">
            <div class="slideshow-container">

                <div class="slide-container fade">
                    <img src="https://organicindia.com/cdn/shop/files/immunity-web-banner-1920x600_1_1.jpg?v=1738129650">
                </div>

                <div class="slide-container fade">
                    <img src="https://store.prabhatagri.com/wp-content/uploads/2023/06/E-commerce-Website-Banner-3-1.jpg">
                </div>

                <div class="slide-container fade">
                    <img src="https://organicindia.com/cdn/shop/files/bilona-website-banner.jpg?v=1749185603">
                </div>

                <div class="slide-container fade">
                    <img src="https://organicindia.com/cdn/shop/files/khandsari_banner_1920x600-01.jpg?v=1741346446">
                </div>

                <div class="slide-container fade">
                    <img src="https://organicindia.com/cdn/shop/files/Website-Banner-Clean.jpg?v=1738582248">
                </div>

                <div class="dot-container">
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>
            </div>
        </div>
    </section>

    <section class="px-4 sm:px-6 lg:px-8 my-4 w-full overflow-x-auto scrollbar-hide">
        <div class="flex justify-start min-[1000px]:justify-center flex-nowrap gap-6 md:gap-10 whitespace-nowrap px-4">
            <div class="item_Category">
                <div class="imagecontainer shadow">
                    <img src="https://organicindia.com/cdn/shop/files/beautiful_skin_front_558X600_crop_center.png?v=1748343454" alt="product_img">
                </div>
                <p>energy</p>
            </div>
            <div class="item_Category">
                <div class="imagecontainer shadow">
                    <img src="https://www.tatanutrikorner.com/cdn/shop/files/Ghee500ML-1-removebg-preview_7bc4ffa3-e708-40ca-bf2d-8c92414940d5.png?v=1748858211" alt="product_img">
                </div>
                <p>Ghee</p>
            </div>
            <div class="item_Category">
                <div class="imagecontainer shadow">
                    <img src="https://gurumannnutrition.com/media/catalog/product/cache/0daeb07bb1d294c1f281fab47369d56a/c/r/crunchy_1.png" alt="product_img">
                </div>
                <p>Peanut butter</p>
            </div>
            <div class="item_Category ">
                <div class="imagecontainer shadow">
                    <img src="https://www.gavyamart.in/cdn/shop/products/Organic_pure_wild_forest_honey_Raw_and_Unprocessed.png?v=1725522916" alt="product_img">
                </div>
                <p>Honey</p>
            </div>
            <div class="item_Category ">
                <div class="imagecontainer shadow">
                    <img src="https://cdn.grofers.com/cdn-cgi/image/f=auto,fit=scale-down,q=70,metadata=none,w=360/da/cms-assets/cms/product/9feb557f-49ef-49e5-b46d-7100ed69daee.png" alt="product_img">
                </div>
                <p>flour</p>
            </div>
            <div class="item_Category">
                <div class="imagecontainer shadow">
                    <img src="https://gogarden.co.in/cdn/shop/files/Square2.png?v=1742305732" alt="product_img">
                </div>
                <p>fertilizer</p>
            </div>
            <div class="item_Category">
                <div class="imagecontainer shadow">
                    <img src="https://png.pngtree.com/png-clipart/20230430/original/pngtree-moisturizing-transparent-face-cream-skin-care-products-png-image_9125672.png" alt="product_img">
                </div>
                <p>Moisturizer</p>
            </div>
        </div>
    </section>
                
    <section class="my-8 px-4">
        <div class="w-auto">
            <div class="section_title">
                <h2>New Products</h2>
                <img src="https://www.pngall.com/wp-content/uploads/15/Divider-PNG-File.png" alt="">
            </div>
            <div class="grid my-8 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php 
                    $display_product = mysqli_query($conn,"select * from `products` ORDER BY id DESC LIMIT 6");
                    if (mysqli_num_rows($display_product)>0) {
                        include 'userproduct.php';
                    }
                ?>
            </div>
        </div> 
    </section>

    <div class="relative py-20 px-6 bg-green-100 text-center overflow-hidden px-1 md:px-12">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl md:text-5xl font-extrabold text-green-900 mb-6">Why Choose Us?</h2>
            <p class="text-sm text-lg md:text-xl text-green-800 leading-relaxed">At the heart of everything we do is a commitment to sustainability, natural living, and a healthier world. Join us in making impactful choices for your well-being and the planet.</p>
        </div>
    </div>

    <section class="w-full px-4 sm:px-8 md:px-2 lg:px-10 py-5">
        <div class="w-full">
            <h3 class="text-3xl font-bold p-6 max-[350px]:px-0  text-emerald-600">Customers Speak</h3>
        </div>
        <div class="relative max-w-7xl mx-auto flex items-center gap-4">
            <button id="prevBtn" class="text-lime-700 text-3xl px-0 min-[400px]:px-3 hover:scale-110">
                &#10094;
            </button>

            <div id="reviewWrapper" class="w-full overflow-hidden lg:px-2">
                <div id="reviewSlider" class="flex transition-transform duration-500 ease-in-out">
                    <div class="review-card bg-gray-100 h-96 px-4 py-0 shrink-0">
                        <i class="fa-solid fa-quote-left text-[80px] text-emerald-600 mb-1"></i>
                        <p>I recently switched to buying all my groceries from Ecomart, and I have to say I’m genuinely impressed. The atta is so fresh, and the rotis come out incredibly soft.</p>
                        <span>Johad Logan</span>
                        <samp>Country: america</samp>
                    </div>
                    <div class="review-card bg-gray-100 h-96 px-4 py-0 shrink-0">
                        <i class="fa-solid fa-quote-left text-[80px] text-emerald-600 mb-1"></i>
                        <p>"Excellent experience overall. Products feel authentic and clean, especially the ghee and atta. it gives a village-like feel with modern service.</p>
                        <span>Rahul Gadhvi</span>
                        <samp>Country: japan</samp>
                    </div>
                    <div class="review-card bg-gray-100 h-96 px-4 py-0 shrink-0">
                        <i class="fa-solid fa-quote-left text-[80px] text-emerald-600 mb-1"></i>
                        <p>I’m really impressed with the product quality and eco-friendly packaging. It feels great to support a business that truly cares about sustainability.</p>
                        <span>Chuhan Jaydeepsinh</span>
                        <samp>Country: India</samp>
                        </div>
                    <div class="review-card bg-gray-100 h-96 px-4 py-0 shrink-0">
                        <i class="fa-solid fa-quote-left text-[80px] text-emerald-600 mb-1"></i>
                        <p>I helped my cousin apply through NeoLoan. The process was smooth, transparent, and fast. Their support was helpful and everything worked perfectly online.</p>
                        <span>Parmar Jaydeepsinh</span>
                        <samp>Country: India</samp>
                    </div>
                    <div class="review-card bg-gray-100 h-96 px-4 py-0 shrink-0">
                        <i class="fa-solid fa-quote-left text-[80px] text-emerald-600 mb-1"></i>
                        <p>I applied for a loan during an emergency, and NeoLoan responded quickly. The app is modern, efficient, and completely trustworthy. Five-star experience overall.</p>
                        <span>Rahul Gadhvi</span>
                        <samp>Country: japan</samp>
                    </div>
                    <div class="review-card bg-gray-100 h-96 px-4 py-0 shrink-0">
                        <i class="fa-solid fa-quote-left text-[80px] text-emerald-600 mb-1"></i>
                        <p>NeoLoan made my entire loan process smooth and stress-free. I got approval in hours, and the interest rate was surprisingly low. Highly recommend it.</p>
                        <span>Roman reigns</span>
                        <samp>Country: UK</samp>
                    </div>
                    <div class="review-card bg-gray-100 h-96 px-4 py-0 shrink-0">
                        <i class="fa-solid fa-quote-left text-[80px] text-emerald-600 mb-1"></i>
                        <p>What I liked most about NeoLoan was the clarity. No hidden charges, no paperwork. Everything was online and completed in a few hours only.</p>
                        <span>Rathod Hemansi</span>
                        <samp>Country: India</samp>
                    </div>
                </div>
            </div>

            <button id="nextBtn" class="text-lime-700 text-3xl px-0 min-[400px]:px-3 hover:scale-110">
                &#10095;
            </button>
        </div>  
    </section>

    <section id="iconic" class="py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-5xl font-bold mb-12 text-center">ICONIC PRODUCTS</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

                <div class="product-card bg-white rounded-lg overflow-hidden shadow-md card-hover" data-aos="fade-up">
                    <div class="h-48 bg-gray-100 flex items-center justify-center p-4">
                        <img src="https://www.tatanutrikorner.com/cdn/shop/files/Ghee500ML-1-removebg-preview_7bc4ffa3-e708-40ca-bf2d-8c92414940d5.png?v=1748858211" alt="Nike Air Force 1" class="h-full object-contain">
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-lg mb-2">Ghee</h3>
                        <p class="text-gray-700">Our 100% SATVIK PURE A2 Gir Cow Ghee is made using traditional methods, preserving all the essential nutrients and antioxidants. rich flavor that only true pure ghee can deliver.</p>
                    </div>
                </div>

                <div class="product-card bg-white rounded-lg overflow-hidden shadow-md card-hover" data-aos="fade-up" data-aos-delay="200">
                    <div class="h-48 bg-gray-100 flex items-center justify-center p-4">
                        <img src="https://swadesii.com/cdn/shop/products/Products-Facewash-sulfate-free-700x700.png?v=1701425679&width=2880" alt="Nike Air Max 1" class="h-full object-contain">
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-lg mb-2">Adven Naturals Face Wash</h3>
                        <p class="text-gray-700">Experience the purifying power of Berberis with this organic face wash. It deeply cleanses, controls acne, and revitalizes your skin with nature’s healing touch.</p>
                    </div>
                </div>

                <div class="product-card bg-white rounded-lg overflow-hidden shadow-md card-hover" data-aos="fade-up" data-aos-delay="100">
                    <div class="h-48 bg-gray-100 flex items-center justify-center p-4">
                        <img src="https://gogarden.co.in/cdn/shop/files/Square2.png?v=1742305732" alt="Nike Air Jordan 1" class="h-full object-contain">
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-lg mb-2">Buy Organic India Brahmi</h3>
                        <p class="text-gray-700">NPK 20 20 20 Water Soluble Granules Fertilizer for Plants or Abundant Flowering and Plant Growth, Fertilizer for Home Plants 100% Water Soluble.</p>
                    </div>
                </div>

                <div class="product-card bg-white rounded-lg overflow-hidden shadow-md card-hover" data-aos="fade-up" data-aos-delay="300">
                    <div class="h-48 bg-gray-100 flex items-center justify-center p-4">
                        <img src="https://instamart-media-assets.swiggy.com/swiggy/image/upload/fl_lossy,f_auto,q_auto/NI_CATALOG/IMAGES/CIW/2025/1/12/87786c2c-b4b2-428a-a1c9-367cc332ecc7_357024_1.png" alt="Nike ZoomX Vaporfly" class="h-full object-contain">
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-lg mb-2">Neem medicine</h3>
                        <p class="text-gray-700">Essential Blood purifire Organic India’s herbal medicines are made from 100% certified organic herbs, using ancient Ayurvedic wisdom for Healthy conscious living.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'?>
    <script src="script/script.js"></script>
    <script src="script/review.js"></script>
</body>
</html>