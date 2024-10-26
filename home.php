<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sitarabuks</title>
    <link href="https://fonts.googleapis.com/css2?family=Poiret+One&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'sitarabuk-brown': '#310E05',
                    },
                    fontFamily: {
                        'poiret': ['"Poiret One"', 'cursive'],
                        'montserrat': ['Montserrat', 'sans-serif'],
                    },
                }
            }
        }
    </script>
</head>
<body>
    <?php include_once("./nav.php") ?>
    
 <!-- Content Section (Add a margin-left to avoid overlap with sidebar) -->
 <div class="md:ml-48 flex flex-col min-h-screen p-4 md:p-7">
        <div id="imageCarousel" class="relative shadow-[rgba(0,_0,_0,_0.2)_0px_60px_40px_-7px] rounded-xl mx-auto mt-10 w-[95%] max-w-[1200px] h-auto md:h-[28rem] overflow-hidden">
            <img src="./stocks/PS1.png" alt="Carousel Image 1" class="w-full h-full object-cover transition-opacity duration-500 ease-in-out">
            <img src="./stocks/PS2.png" alt="Carousel Image 2" class="w-full h-full object-cover transition-opacity duration-500 ease-in-out absolute top-0 left-0 opacity-0">
            <img src="./stocks/PS3.png" alt="Carousel Image 3" class="w-full h-full object-cover transition-opacity duration-500 ease-in-out absolute top-0 left-0 opacity-0">
        </div>
        
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Existing JavaScript for navigation (unchanged)
    
                // Image Carousel Functionality
                const carousel = document.getElementById('imageCarousel');
                const images = carousel.querySelectorAll('img');
                let currentIndex = 0;
    
                function showNextImage() {
                    images[currentIndex].classList.add('opacity-0');
                    currentIndex = (currentIndex + 1) % images.length;
                    images[currentIndex].classList.remove('opacity-0');
                }
    
                // Change image every 2 seconds
                setInterval(showNextImage, 2000);
            });
        </script>


        <h2 class="text-center text-3xl md:text-4xl mt-16 md:mt-20">MENU</h2>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mt-10">
            
        <a href="black_coffee_page.php">
        <div class="relative flex flex-col items-center group">
                <div class="relative">
                    <img src="./stocks/m1.jpg" alt="Black Coffee" class="  w-48 h-48 md:w-64 md:h-64 rounded-full object-cover transition duration-300 ease-in-out group-hover:blur-md">
                    <div class="absolute inset-0 flex items-center justify-center text-white  text-2xl opacity-0 group-hover:opacity-100 transition duration-300 ease-in-out">
                        BLACK COFFEE
                    </div>
                </div>
                <p class="text-xl md:text-2xl mt-4">BLACK COFFEE</p>
            </div>
        </a>
            
        <a href="milk_coffee_page.php">
        <div class="relative flex flex-col items-center group">
                <div class="relative">
                    <img src="./stocks/m2.jpg" alt="Milk Coffee" class="w-48 h-48 md:w-64 md:h-64 rounded-full object-cover transition duration-300 ease-in-out group-hover:blur-md">
                    <div class="absolute inset-0 flex items-center justify-center text-white  text-2xl opacity-0 group-hover:opacity-100 transition duration-300 ease-in-out">
                        MILK COFFEE
                    </div>
                </div>
                <p class="text-xl md:text-2xl mt-4">MILK COFFEE</p>
            </div>
        </a>
            
        <a href="cold_coffee_page.php">
        <div class="relative flex flex-col items-center group">
                <div class="relative">
                    <img src="./stocks/m3.jpg" alt="Cold Coffee" class="w-48 h-48 md:w-64 md:h-64 rounded-full object-cover transition duration-300 ease-in-out group-hover:blur-md">
                    <div class="absolute inset-0 flex items-center justify-center text-white  text-2xl opacity-0 group-hover:opacity-100 transition duration-300 ease-in-out">
                        COLD COFFEE
                    </div>
                </div>
                <p class="text-xl md:text-2xl mt-4">COLD COFFEE</p>
            </div>
        </a>
           
        <a href="milk_shake_page.php">
        <div class="relative flex flex-col items-center group">
                <div class="relative">
                    <img src="./stocks/m4.jpg" alt="Milk Shakes" class="w-48 h-48 md:w-64 md:h-64 rounded-full object-cover transition duration-300 ease-in-out group-hover:blur-md">
                    <div class="absolute inset-0 flex items-center justify-center text-white  text-2xl opacity-0 group-hover:opacity-100 transition duration-300 ease-in-out">
                        MILK SHAKES
                    </div>
                </div>
                <p class="text-xl md:text-2xl mt-4">MILK SHAKES</p>
            </div>
        </a>
           
        <a href="sweets_page.php">
        <div class="relative flex flex-col items-center group">
                <div class="relative">
                    <img src="./stocks/m5.jpg" alt="Sweets" class="w-48 h-48 md:w-64 md:h-64 rounded-full object-cover transition duration-300 ease-in-out group-hover:blur-md">
                    <div class="absolute inset-0 flex items-center justify-center text-white  text-2xl opacity-0 group-hover:opacity-100 transition duration-300 ease-in-out">
                        SWEETS
                    </div>
                </div>
                <p class="text-xl md:text-2xl mt-4">SWEETS</p>
            </div>
        </a>
           
        <a href="food_page.php">
        <div class="relative flex flex-col items-center group">
                <div class="relative">
                    <img src="./stocks/m6.jpg" alt="Food" class="w-48 h-48 md:w-64 md:h-64 rounded-full object-cover transition duration-300 ease-in-out group-hover:blur-md">
                    <div class="absolute inset-0 flex items-center justify-center text-white  text-2xl opacity-0 group-hover:opacity-100 transition duration-300 ease-in-out">
                        FOOD
                    </div>
                </div>
                <p class="text-xl md:text-2xl mt-4">FOOD</p>
            </div>
        </div>
        </a>
            
        

        <h2 class="text-center text-3xl md:text-4xl mt-16 md:mt-20">OFFERS</h2>
       
        <section class="flex overflow-hidden">
            <div class="image-wrapper flex animate-slide">
                <img src="./stocks/OF1.png" alt="" class="h-auto w-1/2">
                <img src="./stocks/OF2.png" alt="" class="h-auto w-1/2">
                <img src="./stocks/OF3.png" alt="" class="h-auto w-1/2">
                <img src="./stocks/OF1.png" alt="" class="h-auto w-1/2"> <!-- Clone of the first image -->
            </div>
        </section>
        
        <style>
            .animate-slide {
                animation: slide 10s linear infinite; /* Adjust duration as needed */
            }
        
            @keyframes slide {
                0% {
                    transform: translateX(0);
                }
                100% {
                    transform: translateX(-50%); /* Move left by half the width of the original images */
                }
            }
        
            .image-wrapper {
                display: flex; /* Align images in a row */
                width: 200%; /* Adjust this based on the number of images */
            }
        
            section {
                overflow: hidden; /* Hide overflow to create a smooth animation effect */
                width: 100%; /* Full width for the section */
            }
        
            img {
                width: 25%; /* Adjust to fit 4 images (3 + 1 clone) */
                height: auto; /* Maintain aspect ratio */
            }
        </style>
        
        <h2 class="text-center text-3xl md:text-4xl mt-16 md:mt-20">COMBOS</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mt-10"> 

        <a href="comboPage.php">
        <div class="flex flex-col items-center group">
                <img src="./stocks/combo1.png" alt="Coffee Combos" class="w-48 h-48 md:w-64 md:h-64 rounded-full object-cover transform transition-transform duration-300 ease-in-out group-hover:scale-110">
                <p class="text-xl md:text-2xl mt-4">COFFEE COMBOS</p>
            </div>
        </a>
            
        <a href="comboPage.php">
        <div class="flex flex-col items-center group">
                <img src="./stocks/combo2.png" alt="Sweets Combos" class="w-48 h-48 md:w-64 md:h-64 rounded-full object-cover transform transition-transform duration-300 ease-in-out group-hover:scale-110">
                <p class="text-xl md:text-2xl mt-4">SWEETS COMBOS</p>
            </div>
        </a>
           
        <a href="comboPage.php">
        <div class="flex flex-col items-center group">
                <img src="./stocks/combo3.png" alt="Food Combos" class="w-48 h-48 md:w-64 md:h-64 rounded-full object-cover transform transition-transform duration-300 ease-in-out group-hover:scale-110">
                <p class="text-xl md:text-2xl mt-4">FOOD COMBOS</p>
            </div>
        </a>
            
        </div>
        

        <div class="mt-16 md:mt-20 space-y-8">

            <!-- Viviana Mall Card -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden" onclick="openModal('modalViviana')">
                <div class="flex flex-col md:flex-row">
                    <div class="md:w-2/12">
                        <img src="./stocks/RS1.jpg" alt="Restaurant interior" class="w-full h-64 md:h-full object-cover">
                    </div>
                    <div class="p-6 md:w-3/5">
                        <h2 class="font-poiret text-2xl font-bold text-sitarabuk-brown mb-4">VIVIYANA MALL</h2>
                        <p><span class="font-semibold">Located in:</span> Viviana Mall</p>
                        <p><span class="font-semibold">Address:</span> G 43, Viviana Mall, Eastern Express Highway, Laxmi Nagar, Thane West, Thane, Maharashtra 400601</p>
                        <p><span class="font-semibold">Hours:</span> Open, closes at 11 PM</p>
                        <p><span class="font-semibold">Phone:</span> 1860 266 0010</p>
                        <div class="flex my-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </div>
            
                        <p class="font-semibold">Price per person: ₹200-600</p>
                        <p class="text-sm text-gray-600">Reported by 272 people</p>
                    </div>
                </div>
            </div>
        
            <!-- Viviana Mall Modal -->
            <div id="modalViviana" class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex items-center justify-center z-50 hidden">
                <div class="bg-white p-6 rounded-lg max-w-md w-full">
                    <h2 class="font-poiret text-2xl font-bold text-sitarabuk-brown mb-4">VIVIYANA MALL - Detailed Info</h2>
                    <p><span class="font-semibold">Address:</span> G 43, Viviana Mall, Thane</p>
                    <p><span class="font-semibold">Hours:</span> Open, closes at 11 PM</p>
                    <p><span class="font-semibold">Phone:</span> 1860 266 0010</p>
                    <div class="flex my-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    </div>
                    <p><span class="font-semibold">Price per person:</span> ₹200-600</p>
                    <button onclick="closeModal('modalViviana')" class="mt-4 bg-sitarabuk-brown text-white py-2 px-4 rounded">Close</button>
                </div>
            </div>
        
            <!-- Infinity Mall Card -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden" onclick="openModal('modalInfinity')">
                <div class="flex flex-col md:flex-row">
                    <div class="md:w-2/12">
                        <img src="./stocks/RS2.jpg" alt="Restaurant interior" class="w-full h-64 md:h-full object-cover">
                    </div>
                    <div class="p-6 md:w-3/5">
                        <h2 class="font-poiret text-2xl font-bold text-sitarabuk-brown mb-4">INFINITY MALL</h2>
                        <p><span class="font-semibold">Located in:</span> Infinity Mall</p>
                        <p><span class="font-semibold">Address:</span> 1st Floor, Infinity Mall, Link Road, Malad West, Mumbai, Maharashtra 400064</p>
                        <p><span class="font-semibold">Hours:</span> Open, closes at 10 PM</p>
                        <p><span class="font-semibold">Phone:</span> 022 6691 0001</p>
                        <div class="flex my-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </div>
                        <p class="font-semibold">Price per person: ₹250-700</p>
                        <p class="text-sm text-gray-600">Reported by 315 people</p>
                    </div>
                </div>
            </div>
        
            <!-- Infinity Mall Modal -->
            <div id="modalInfinity" class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex items-center justify-center z-50 hidden">
                <div class="bg-white p-6 rounded-lg max-w-md w-full">
                    <h2 class="font-poiret text-2xl font-bold text-sitarabuk-brown mb-4">INFINITY MALL - Detailed Info</h2>
                    <p><span class="font-semibold">Address:</span> 1st Floor, Infinity Mall, Malad West, Mumbai</p>
                    <p><span class="font-semibold">Hours:</span> Open, closes at 10 PM</p>
                    <p><span class="font-semibold">Phone:</span> 022 6691 0001</p>
                    <p><span class="font-semibold">Price per person:</span> ₹250-700</p>
                    <button onclick="closeModal('modalInfinity')" class="mt-4 bg-sitarabuk-brown text-white py-2 px-4 rounded">Close</button>
                </div>
            </div>
        
            <!-- Phoenix Marketcity Card -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden" onclick="openModal('modalPhoenix')">
                <div class="flex flex-col md:flex-row">
                    <div class="md:w-2/12">
                        <img src="./stocks/RS3.jpg" alt="Restaurant interior" class="w-full h-64 md:h-full object-cover">
                    </div>
                    <div class="p-6 md:w-3/5">
                        <h2 class="font-poiret text-2xl font-bold text-sitarabuk-brown mb-4">PHOENIX MARKETCITY</h2>
                        <p><span class="font-semibold">Located in:</span> Phoenix Marketcity</p>
                        <p><span class="font-semibold">Address:</span> LBS Marg, Kamani Junction, Kurla West, Mumbai, Maharashtra 400070</p>
                        <p><span class="font-semibold">Hours:</span> Open, closes at 11:30 PM</p>
                        <p><span class="font-semibold">Phone:</span> 022 6180 0000</p>
                        <p class="font-semibold">Price per person: ₹300-800</p>
                        <p class="text-sm text-gray-600">Reported by 280 people</p>
                    </div>
                </div>
            </div>
        
            <!-- Phoenix Marketcity Modal -->
            <div id="modalPhoenix" class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex items-center justify-center z-50 hidden">
                <div class="bg-white p-6 rounded-lg max-w-md w-full">
                    <h2 class="font-poiret text-2xl font-bold text-sitarabuk-brown mb-4">PHOENIX MARKETCITY - Detailed Info</h2>
                    <p><span class="font-semibold">Address:</span> LBS Marg, Kamani Junction, Kurla West, Mumbai</p>
                    <p><span class="font-semibold">Hours:</span> Open, closes at 11:30 PM</p>
                    <p><span class="font-semibold">Phone:</span> 022 6180 0000</p>
                    <p><span class="font-semibold">Price per person:</span> ₹300-800</p>
                    <button onclick="closeModal('modalPhoenix')" class="mt-4 bg-sitarabuk-brown text-white py-2 px-4 rounded">Close</button>
                </div>
            </div>
        
        </div>
        
        <script>
            function openModal(modalId) {
                document.getElementById(modalId).classList.remove('hidden');
            }
        
            function closeModal(modalId) {
                document.getElementById(modalId).classList.add('hidden');
            }
        </script>
        
            
            
            
        </div>
    </div>
</body>
</html>