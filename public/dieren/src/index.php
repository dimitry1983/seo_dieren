<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php include 'partials/head.php'; ?>
</head>
<body class="text-base">
    <?php include 'partials/header.php'; ?>

    <div class="main-container relative w-full overflow-hidden">
        <section class="section section--hero bg-[url('../../../src/public/img/hero.jpg')] bg-cover bg-right bg-center">
            <div class="container mx-auto lg:pt-[120px] lg:pb-[180px] md:pt-[90px] md:pb-[120px] sm:pt-[50px] sm:pb-[80px] pt-[30px] pb-[50px] bg-white  bg-opacity-75 lg:bg-opacity-0">
                <div class="flex flex-col lg:flex-row items-center">
                    <div class="w-full lg:w-1/2 text-center lg:text-left">
                        <div class="mb-6">
                            <h1 class="text-4xl sm:text-5xl md:text-6xl font-regular text-gray-800">
                                Discover The Best <span class="text-primary font-bold">Veterinary</span> <strong>Clinics</strong> In Your City
                            </h1>
                            <p class="mt-4 text-gray-600 text-sm sm:text-base">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras<br class="hidden md:block"> euismod leo eleifend maximus mattis quis augue dapibus.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="section section--search py-0 bg-transparent">
            <div class="container mx-auto bg-transparent">
            <form action="" class="md:p-[40px] p-[20px] flex flex-col md:flex-row items-center gap-y-4 md:gap-x-6 mt-[-50px] bg-white md:rounded-full border border-[#D2D3D4] relative before:hidden md:before:block before:absolute before:right-0 before:top-0 before:w-full md:before:w-1/4 before:h-full before:z-0 before:bg-primaryLight before:rounded-tr-full before:rounded-br-full">
                <div class="w-full md:w-1/4 text-center md:text-left relative z-1">
                    <p class="mb-[10px]"><strong>What Are You Looking For?</strong></p>
                    <input type="text" placeholder="Search For" class="form-control p-3 border border-gray-300 rounded-full outline-none transition duration-300 ease-out w-full">
                </div>

                <div class="w-full md:w-1/4 text-center md:text-left relative">
                    <p class="mb-[10px]"><strong>Category</strong></p>
                    <div class="relative">
                        <select class="form-control p-3 border border-gray-300 rounded-full outline-none transition duration-300 ease-out w-full appearance-none pr-10">
                            <option>Dogs</option>
                        </select>
                        <i class="fa-solid fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-gray-600"></i>
                    </div>
                </div>

                <div class="w-full md:w-1/4 text-center md:text-left relative">
                    <p class="mb-[10px]"><strong>Location</strong></p>
                    <div class="relative">
                        <select class="form-control p-3 border border-gray-300 rounded-full outline-none transition duration-300 ease-out w-full appearance-none pr-10">
                            <option>Amsterdam</option>
                        </select>
                        <i class="fa-solid fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-gray-600"></i>
                    </div>
                </div>

                <div class="w-full md:w-1/4 text-center flex items-center justify-center relative z-1">
                    <button type="submit" class="btn btn-secondary text-3xl md:text-5xl p-4 md:p-[20px] md:rounded-full w-full md:w-fit">
                        <i class="fa-regular fa-magnifying-glass"></i>
                    </button>
                </div>
            </form>
            </div>
        </section>

        <section class="section section--intro py-[40px] md:py-[80px]">
            <div class="container mx-auto relative">
                <div class="flex flex-col lg:flex-row gap-y-4 lg:gap-x-6">
                    <div class="w-full lg:w-1/2">
                        <div class="block relative before:content-[''] before:w-full before:h-full before:absolute before:top-0 before:left-0 before:bg-gradient-to-t before:from-black/100 before:via-black/25 before:to-transparent bg-[url('../../../src/public/img/block-1.jpg')] bg-cover bg-center">
                            <div class="block__content pt-[250px] pb-[30px] px-[30px] relative z-1">
                                <h4 class="subtitle text-lg text-white">Lorem ipsum dolor</h4>
                                <h3 class="title title--block text-white text-2xl mb-2"><strong>+30% Off</strong></h3>
                                <a href="#" class="btn btn-primary mb-2">View More</a>
                                <p class="paragraph paragraph--small text-sm text-white">
                                    *Lorem ipsum dolor sit amet
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full lg:w-1/2">
                        <div class="block relative block before:content-[''] before:w-full before:h-full before:absolute before:top-0 before:left-0 before:bg-gradient-to-t before:from-black/100 before:via-black/25 before:to-transparent bg-[url('../../../src/public/img/block-2.jpg')] bg-cover bg-center mb-[40px]">
                            <div class="block__content px-[30px] py-[20px] relative z-1">
                                <h4 class="subtitle text-lg text-white">Lorem ipsum dolor</h4>
                                <h3 class="title title--block text-white text-2xl mb-2"><strong>+25% Off</strong></h3>
                                <a href="#" class="btn btn-primary mb-2">View More</a>
                                <p class="paragraph paragraph--small text-sm text-white">
                                    *Lorem ipsum dolor sit amet
                                </p>
                            </div>
                        </div>
                        <div class="block relative block before:content-[''] before:w-full before:h-full before:absolute before:top-0 before:left-0 before:bg-gradient-to-t before:from-black/100 before:via-black/25 before:to-transparent bg-[url('../../../src/public/img/block-3.jpg')] bg-cover bg-center">
                            <div class="block__content px-[30px] py-[20px] relative z-1">
                                <h4 class="subtitle text-lg text-white">Lorem ipsum dolor</h4>
                                <h3 class="title title--block text-white text-2xl mb-2"><strong>+20% Off</strong></h3>
                                <a href="#" class="btn btn-primary mb-2">View More</a>
                                <p class="paragraph paragraph--small text-sm text-white">
                                    *Lorem ipsum dolor sit amet
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <img src="public/img/bg-blocks.png" alt="" class="absolute top-[-80px] left-[-60px] z-[-1]"> 
            </div>
        </section>

        <section class="section section--hotspots">
            <div class="container mx-auto relative">
                <h3 class="title title--section text-center text-3xl sm:text-4xl text-gray-800 font-bold mb-4">
                    <span class="text-primary">Hotspots</span> You Can't Miss
                </h3>
                <div class="header-pills flex flex-wrap justify-center mb-6 gap-2">
                    <button class="pill active border-b-2 border-b-primary px-4 sm:px-6 hover:border-b-primary" data-filter="all">All</button>
                    <button class="pill border-b-2 border-b-[#D2D3D4] px-4 sm:px-6 hover:border-b-primary" data-filter="best-rated">Best Rated</button>
                    <button class="pill border-b-2 border-b-[#D2D3D4] px-4 sm:px-6 hover:border-b-primary" data-filter="most-viewed">Most Viewed</button>
                    <button class="pill border-b-2 border-b-[#D2D3D4] px-4 sm:px-6 hover:border-b-primary" data-filter="veterinarians">Veterinarians</button>
                    <button class="pill border-b-2 border-b-[#D2D3D4] px-4 sm:px-6 hover:border-b-primary" data-filter="clinics">Clinics</button>
                </div>

                <div class="content-blocks grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                    <div class="block-hotspots border border-gray-300 transition duration-300 ease-out hover:shadow-lg category-best-rated">
                        <figure class="m-0 overflow-hidden">
                            <a href="#"><img class="w-full transition-transform duration-300 ease-out hover:scale-105" src="public/img/block-4.png" alt=""></a>
                        </figure>
                        <div class="content p-[20px]">
                            <h3 class="title font-bold text-lg">
                                <a href="#">Amsterdam Clinic</a>
                                <span class="rating float-right text-yellow-500 text-xs">
                                    <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i>
                                </span>
                            </h3>
                            <h4 class="subtitle text-sm text-gray-800 mb-2">Lorem Ipsum Dolor Sit Amet</h4>
                            <p class="location text-xs mb-0">
                                <i class="fa-solid fa-location-dot text-primary"></i> 9999 BP Amsterdam, Netherlands
                            </p>
                            <a class="text-xs" href="#">
                                <i class="fa-solid fa-phone text-primary"></i> +1800 956 687
                            </a>
                            <h4 class="price font-bold text-lg mt-2">
                                From €60.00 
                                <a class="float-right text-sm font-normal underline hover:text-primary" href="#">View More</a>
                            </h4>
                        </div>
                    </div>
                    <div class="block-hotspots border border-gray-300 transition duration-300 ease-out hover:shadow-lg category-most-viewed">
                        <figure class="m-0 overflow-hidden">
                            <a href="#"><img class="w-full transition-transform duration-300 ease-out hover:scale-105" src="public/img/block-5.jpg" alt=""></a>
                        </figure>
                        <div class="content p-[20px]">
                            <h3 class="title font-bold text-lg">
                                <a href="#">VetCare</a>
                                <span class="rating float-right text-yellow-500 text-xs">
                                    <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i>
                                </span>
                            </h3>
                            <h4 class="subtitle text-sm text-gray-800 mb-2">Lorem Ipsum Dolor Sit Amet</h4>
                            <p class="location text-xs mb-0">
                                <i class="fa-solid fa-location-dot text-primary"></i> 9999 BP Amsterdam, Netherlands
                            </p>
                            <a class="text-xs" href="#">
                                <i class="fa-solid fa-phone text-primary"></i> +1800 956 687
                            </a>
                            <h4 class="price font-bold text-lg mt-2">
                                From €50.00 
                                <a class="float-right text-sm font-normal underline hover:text-primary" href="#">View More</a>
                            </h4>
                        </div>
                    </div>
                    <div class="block-hotspots border border-gray-300 transition duration-300 ease-out hover:shadow-lg category-clinics">
                        <figure class="m-0 overflow-hidden">
                            <a href="#"><img class="w-full transition-transform duration-300 ease-out hover:scale-105" src="public/img/block-6.jpg" alt=""></a>
                        </figure>
                        <div class="content p-[20px]">
                            <h3 class="title font-bold text-lg">
                                <a href="#">Happy Pets Clinic</a>
                                <span class="rating float-right text-yellow-500 text-xs">
                                    <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i>
                                </span>
                            </h3>
                            <h4 class="subtitle text-sm text-gray-800 mb-2">Lorem Ipsum Dolor Sit Amet</h4>
                            <p class="location text-xs mb-0">
                                <i class="fa-solid fa-location-dot text-primary"></i> 9999 BP Amsterdam, Netherlands
                            </p>
                            <a class="text-xs" href="#">
                                <i class="fa-solid fa-phone text-primary"></i> +1800 956 687
                            </a>
                            <h4 class="price font-bold text-lg mt-2">
                                From €70.00 
                                <a class="float-right text-sm font-normal underline hover:text-primary" href="#">View More</a>
                            </h4>
                        </div>
                    </div>
                </div>

                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        const pills = document.querySelectorAll(".pill");
                        const blocks = document.querySelectorAll(".block-hotspots");

                        pills.forEach(pill => {
                            pill.addEventListener("click", function () {
                                pills.forEach(p => p.classList.remove("border-b-primary", "active"));
                                
                                this.classList.add("border-b-primary", "active");

                                const filter = this.getAttribute("data-filter");

                                blocks.forEach(block => {
                                    if (filter === "all") {
                                        block.classList.remove("hidden");
                                    } else {
                                        block.classList.toggle("hidden", !block.classList.contains(category-${filter}));
                                    }
                                });
                            });
                        });
                    });
                </script>
                </div>
            </div>
        </section>

        <section class="section section--categories bg-[url('../../../src/public/img/categories.jpg')] bg-cover bg-center pt-[40px] pb-[50px] lg:pt-[80px] lg:pb-[100px]">
            <div class="container mx-auto">
                <div class="section__header flex flex-col lg:flex-row items-center justify-between mb-6">
                    <div class="text-center lg:text-left">
                        <h4 class="subtitle w-fit text-md font-semibold relative before:content-[''] before:w-[20px] before:h-[2px] before:bg-primary before:absolute before:right-[-30px] before:top-1/2 before:-translate-y-1/2">
                            Choose Your Category
                        </h4>
                        <h3 class="title title--section font-bold text-3xl text-gray-800">
                            <span class="text-primary">Browse</span> Categories
                        </h3>
                    </div>
                    <a href="#" class="btn btn-outline-black whitespace-nowrap mt-4 lg:mt-0">Explore All</a>
                </div>
                <div class="categories grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                    <div class="category border-2 border-white shadow-lg bg-white transition-transform duration-300 ease-out hover:scale-y-105">
                        <figure class="bg-gray-300 w-full h-[170px] flex overflow-hidden">
                            <img class="m-auto w-[120px] h-[120px]" src="public/img/dog.png" alt="">
                        </figure>
                        <div class="content text-center p-4">
                            <h3 class="title text-md font-semibold mb-2">Dogs</h3>
                            <p class="paragraph text-sm">(150 Listings)</p>
                        </div>
                    </div>

                    <div class="category border-2 border-white shadow-lg bg-white transition-transform duration-300 ease-out hover:scale-y-105">
                        <figure class="bg-gray-300 w-full h-[170px] flex overflow-hidden">
                            <img class="m-auto w-[120px] h-[120px]" src="public/img/cat.png" alt="">
                        </figure>
                        <div class="content text-center p-4">
                            <h3 class="title text-md font-semibold mb-2">Cats</h3>
                            <p class="paragraph text-sm">(150 Listings)</p>
                        </div>
                    </div>

                    <div class="category border-2 border-white shadow-lg bg-white transition-transform duration-300 ease-out hover:scale-y-105">
                        <figure class="bg-gray-300 w-full h-[170px] flex overflow-hidden">
                            <img class="m-auto w-[120px] h-[120px]" src="public/img/turtle.png" alt="">
                        </figure>
                        <div class="content text-center p-4">
                            <h3 class="title text-md font-semibold mb-2">Others</h3>
                            <p class="paragraph text-sm">(100 Listings)</p>
                        </div>
                    </div>

                    <div class="category border-2 border-white shadow-lg bg-white transition-transform duration-300 ease-out hover:scale-y-105">
                        <figure class="bg-gray-300 w-full h-[170px] flex overflow-hidden">
                            <img class="m-auto w-[120px] h-[120px]" src="public/img/shelters.png" alt="">
                        </figure>
                        <div class="content text-center p-4">
                            <h3 class="title text-md font-semibold mb-2">Shelters</h3>
                            <p class="paragraph text-sm">(100 Listings)</p>
                        </div>
                    </div>

                    <div class="category border-2 border-white shadow-lg bg-white transition-transform duration-300 ease-out hover:scale-y-105">
                        <figure class="bg-gray-300 w-full h-[170px] flex overflow-hidden">
                            <img class="m-auto w-[120px] h-[120px]" src="public/img/specialists.png" alt="">
                        </figure>
                        <div class="content text-center p-4">
                            <h3 class="title text-md font-semibold mb-2">Specialists</h3>
                            <p class="paragraph text-sm">(50 Listings)</p>
                        </div>
                    </div>

                    <div class="category border-2 border-white shadow-lg bg-white transition-transform duration-300 ease-out hover:scale-y-105">
                        <figure class="bg-gray-300 w-full h-[170px] flex overflow-hidden">
                            <img class="m-auto w-[120px] h-[120px]" src="public/img/emergencies.png" alt="">
                        </figure>
                        <div class="content text-center p-4">
                            <h3 class="title text-md font-semibold mb-2">Emergencies</h3>
                            <p class="paragraph text-sm">(50 Listings)</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="section section--clinics">
            <div class="container mx-auto relative">
                <div class="section__header flex items-center justify-between mb-8">
                    <div>
                        <h4 class="subtitle w-fit text-md font-semibold relative before:content-[''] before:w-[20px] before:h-[2px] before:bg-primary before:absolute before:right-[-30px] before:top-1/2 before:-translate-y-1/2">
                            Lorem Ipsum Dolor
                        </h4>
                        <h3 class="title title--section font-bold text-3xl text-gray-800">
                            What Are You <span class="text-primary">Looking for?</span>
                        </h3>
                    </div>
                    <div class="relative ml-auto">
                        <select class="appearance-none border border-gray-300 rounded-full p-[10px] w-full px-2 text-black font-semibold bg-white pr-10">
                            <option>All Filters</option>
                        </select>
                        <i class="fa-solid fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-black"></i>
                    </div>

                    <div class="relative ml-2">
                        <select class="appearance-none border border-gray-300 rounded-full p-[10px] w-full px-2 text-black font-semibold bg-white pr-10">
                            <option>Sort By</option>
                        </select>
                        <i class="fa-solid fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-black"></i>
                    </div>

                    <button id="btn-2cols" class="w-[45px] h-[45px] flex items-center justify-center rounded-full border border-gray-300 text-gray-400 transition duration-300 ease-out hover:text-black hover:border-black ml-2">
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                    </button>
                    <button id="btn-4cols" class="w-[45px] h-[45px] flex items-center justify-center rounded-full border border-gray-300 text-gray-400 transition duration-300 ease-out hover:text-black hover:border-black ml-2">
                        <i class="fa-solid fa-ellipsis-vertical"></i><i class="fa-solid fa-ellipsis-vertical ml-1"></i>
                    </button>
                    <button id="btn-6cols" class="w-[45px] h-[45px] flex items-center justify-center rounded-full border border-gray-300 text-gray-400 transition duration-300 ease-out hover:text-black hover:border-black ml-2">
                        <i class="fa-solid fa-ellipsis-vertical"></i><i class="fa-solid fa-ellipsis-vertical ml-1"></i><i class="fa-solid fa-ellipsis-vertical ml-1"></i>
                    </button>
                </div>
                <div class="grid grid-cols-4 gap-4 mb-8">
                    <div class="categories-sidebar col-span-4 lg:col-span-1 bg-white border border-gray-300 p-[20px] h-fit">
                        <h3 class="title title--sidebar title title--section font-bold text-2xl text-gray-800 mb-2">
                            Search Category
                        </h3>
                        <input type="text" placeholder="Lorem Ipsum Dolor Amet" class="form-control p-0 border-none outline-none hover:border-none hover:outline-[#D2D3D4] outline-offset-[4px] transition duration-300 ease-out mb-3">
                        <ul class="mb-4">
                            <li class="text-xl font-semibold border-t border-t-gray-300 py-3"><span class="text-primary">01</span> <a href="#">Category Name</a></li>
                            <li class="text-xl font-semibold border-t border-t-gray-300 py-3"><span class="text-primary">02</span> <a href="#">Category Name</a></li>
                            <li class="text-xl font-semibold border-t border-t-gray-300 py-3"><span class="text-primary">03</span> <a href="#">Category Name</a></li>
                            <li class="text-xl font-semibold border-t border-t-gray-300 py-3"><span class="text-primary">04</span> <a href="#">Category Name</a></li>
                            <li class="text-xl font-semibold border-t border-t-gray-300 py-3"><span class="text-primary">05</span> <a href="#">Category Name</a></li>
                            <li class="text-xl font-semibold border-t border-t-gray-300 py-3"><span class="text-primary">06</span> <a href="#">Category Name</a></li>
                            <li class="text-xl font-semibold border-t border-t-gray-300 border-b border-b-gray-300 py-3"><span class="text-primary">07</span> <a href="#">Category Name</a></li>
                        </ul>
                        <a href="#" class="btn btn-primaryLight mx-auto block w-fit">
                            View All Categories
                        </a>
                    </div>
                    <div class="posts col-span-4 lg:col-span-3 grid grid-cols-3 gap-4">
                        <div class="block-hotspots border border-gray-300 transition duration-300 ease-out hover:shadow-lg category-best-rated">
                            <figure class="m-0 overflow-hidden">
                                <a href="#"><img class="w-full transition-transform duration-300 ease-out hover:scale-105" src="public/img/post-1.png" alt=""></a>
                            </figure>
                            <div class="content p-[20px]">
                                <h3 class="title font-bold text-lg">
                                    <a href="#">Amsterdam Clinic</a>
                                </h3>
                                <h4 class="subtitle text-sm text-gray-800 mb-2">Lorem Ipsum Dolor Sit Amet</h4>
                                <p class="location text-xs mb-0 font-semibold">
                                    <i class="fa-solid fa-location-dot text-primary"></i> 9999 BP Amsterdam, Netherlands
                                </p>
                                <a class="text-xs font-semibold" href="#">
                                    <i class="fa-solid fa-phone text-primary"></i> +1800 956 687
                                </a>
                                <h4 class="price font-bold text-lg mt-2">
                                    From €60.00 
                                    <a class="float-right text-sm font-normal underline hover:text-primary" href="#">View More</a>
                                </h4>
                            </div>
                        </div>
                        <div class="block-hotspots border border-gray-300 transition duration-300 ease-out hover:shadow-lg category-best-rated">
                            <figure class="m-0 overflow-hidden">
                                <a href="#"><img class="w-full transition-transform duration-300 ease-out hover:scale-105" src="public/img/post-2.png" alt=""></a>
                            </figure>
                            <div class="content p-[20px]">
                                <h3 class="title font-bold text-lg">
                                    <a href="#">Amsterdam Clinic</a>
                                </h3>
                                <h4 class="subtitle text-sm text-gray-800 mb-2">Lorem Ipsum Dolor Sit Amet</h4>
                                <p class="location text-xs mb-0 font-semibold">
                                    <i class="fa-solid fa-location-dot text-primary"></i> 9999 BP Amsterdam, Netherlands
                                </p>
                                <a class="text-xs font-semibold" href="#">
                                    <i class="fa-solid fa-phone text-primary"></i> +1800 956 687
                                </a>
                                <h4 class="price font-bold text-lg mt-2">
                                    From €60.00 
                                    <a class="float-right text-sm font-normal underline hover:text-primary" href="#">View More</a>
                                </h4>
                            </div>
                        </div>
                        <div class="block-hotspots border border-gray-300 transition duration-300 ease-out hover:shadow-lg category-best-rated">
                            <figure class="m-0 overflow-hidden">
                                <a href="#"><img class="w-full transition-transform duration-300 ease-out hover:scale-105" src="public/img/post-3.png" alt=""></a>
                            </figure>
                            <div class="content p-[20px]">
                                <h3 class="title font-bold text-lg">
                                    <a href="#">Amsterdam Clinic</a>
                                </h3>
                                <h4 class="subtitle text-sm text-gray-800 mb-2">Lorem Ipsum Dolor Sit Amet</h4>
                                <p class="location text-xs mb-0 font-semibold">
                                    <i class="fa-solid fa-location-dot text-primary"></i> 9999 BP Amsterdam, Netherlands
                                </p>
                                <a class="text-xs font-semibold" href="#">
                                    <i class="fa-solid fa-phone text-primary"></i> +1800 956 687
                                </a>
                                <h4 class="price font-bold text-lg mt-2">
                                    From €60.00 
                                    <a class="float-right text-sm font-normal underline hover:text-primary" href="#">View More</a>
                                </h4>
                            </div>
                        </div>
                        <div class="block-hotspots border border-gray-300 transition duration-300 ease-out hover:shadow-lg category-best-rated">
                            <figure class="m-0 overflow-hidden">
                                <a href="#"><img class="w-full transition-transform duration-300 ease-out hover:scale-105" src="public/img/post-4.png" alt=""></a>
                            </figure>
                            <div class="content p-[20px]">
                                <h3 class="title font-bold text-lg">
                                    <a href="#">Amsterdam Clinic</a>
                                </h3>
                                <h4 class="subtitle text-sm text-gray-800 mb-2">Lorem Ipsum Dolor Sit Amet</h4>
                                <p class="location text-xs mb-0 font-semibold">
                                    <i class="fa-solid fa-location-dot text-primary"></i> 9999 BP Amsterdam, Netherlands
                                </p>
                                <a class="text-xs font-semibold" href="#">
                                    <i class="fa-solid fa-phone text-primary"></i> +1800 956 687
                                </a>
                                <h4 class="price font-bold text-lg mt-2">
                                    From €60.00 
                                    <a class="float-right text-sm font-normal underline hover:text-primary" href="#">View More</a>
                                </h4>
                            </div>
                        </div>
                        <div class="block-hotspots border border-gray-300 transition duration-300 ease-out hover:shadow-lg category-best-rated">
                            <figure class="m-0 overflow-hidden">
                                <a href="#"><img class="w-full transition-transform duration-300 ease-out hover:scale-105" src="public/img/post-5.png" alt=""></a>
                            </figure>
                            <div class="content p-[20px]">
                                <h3 class="title font-bold text-lg">
                                    <a href="#">Amsterdam Clinic</a>
                                </h3>
                                <h4 class="subtitle text-sm text-gray-800 mb-2">Lorem Ipsum Dolor Sit Amet</h4>
                                <p class="location text-xs mb-0 font-semibold">
                                    <i class="fa-solid fa-location-dot text-primary"></i> 9999 BP Amsterdam, Netherlands
                                </p>
                                <a class="text-xs font-semibold" href="#">
                                    <i class="fa-solid fa-phone text-primary"></i> +1800 956 687
                                </a>
                                <h4 class="price font-bold text-lg mt-2">
                                    From €60.00 
                                    <a class="float-right text-sm font-normal underline hover:text-primary" href="#">View More</a>
                                </h4>
                            </div>
                        </div>
                        <div class="block-hotspots border border-gray-300 transition duration-300 ease-out hover:shadow-lg category-best-rated">
                            <figure class="m-0 overflow-hidden">
                                <a href="#"><img class="w-full transition-transform duration-300 ease-out hover:scale-105" src="public/img/post-6.png" alt=""></a>
                            </figure>
                            <div class="content p-[20px]">
                                <h3 class="title font-bold text-lg">
                                    <a href="#">Amsterdam Clinic</a>
                                </h3>
                                <h4 class="subtitle text-sm text-gray-800 mb-2">Lorem Ipsum Dolor Sit Amet</h4>
                                <p class="location text-xs mb-0 font-semibold">
                                    <i class="fa-solid fa-location-dot text-primary"></i> 9999 BP Amsterdam, Netherlands
                                </p>
                                <a class="text-xs font-semibold" href="#">
                                    <i class="fa-solid fa-phone text-primary"></i> +1800 956 687
                                </a>
                                <h4 class="price font-bold text-lg mt-2">
                                    From €60.00 
                                    <a class="float-right text-sm font-normal underline hover:text-primary" href="#">View More</a>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pagination flex justify-center gap-2">
                    <button class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-300 text-lg font-semibold text-black transition duration-300 ease-out bg-white hover:bg-primary hover:text-white">
                        1
                    </button>
                    <button class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-300 text-lg font-semibold text-black transition duration-300 ease-out bg-white hover:bg-primary hover:text-white">
                        2
                    </button>
                    <button class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-300 text-lg font-semibold text-black transition duration-300 ease-out bg-white hover:bg-primary hover:text-white">
                        3
                    </button>
                    <button class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-300 text-lg font-semibold text-black transition duration-300 ease-out bg-white hover:bg-primary hover:text-white">
                        4
                    </button>
                    <button class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-300 text-lg font-semibold text-black transition duration-300 ease-out bg-white hover:bg-primary hover:text-white">
                        <i class="fa-solid fa-arrow-right-long"></i>
                    </button>
                </div>
                <img src="public/img/bg-blocks.png" alt="" class="absolute bottom-[-80px] left-[-60px] z-[-1]"> 
            </div>
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    const postsContainer = document.querySelector(".posts");
                    const btn2Cols = document.getElementById("btn-2cols");
                    const btn4Cols = document.getElementById("btn-4cols");
                    const btn6Cols = document.getElementById("btn-6cols");

                    btn2Cols.addEventListener("click", () => {
                        postsContainer.classList.remove("grid-cols-3", "grid-cols-2");
                        postsContainer.classList.add("grid-cols-1");
                    });

                    btn4Cols.addEventListener("click", () => {
                        postsContainer.classList.remove("grid-cols-1", "grid-cols-3");
                        postsContainer.classList.add("grid-cols-2");
                    });

                    btn6Cols.addEventListener("click", () => {
                        postsContainer.classList.remove("grid-cols-1", "grid-cols-2");
                        postsContainer.classList.add("grid-cols-3");
                    });
                });
            </script>
        </section>

        <section class="section section--about-us">
            <div class="container mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div>
                        <h3 class="title title--section text-4xl font-bold mb-8">
                            Why To Choose<br><span class="text-primary">Our Directory</span>
                        </h3>
                        <div class="grid grid-cols-2 mb-3 pb-3 border-b border-b-gray-300">
                            <div class="number">
                                <h4 class="value text-primary font-semibold text-4xl md:text-5xl">+5k</h4>
                                <p class="description text-gray-300">Completed Listing</p>
                            </div>
                            <div class="number">
                                <h4 class="value text-primary font-semibold text-4xl md:text-5xl">+5M</h4>
                                <p class="description text-gray-300">Listed Places</p>
                            </div>
                        </div>
                        <p class="paragraph text-gray-300 mb-4">
                            Lorem ipsum dolor sit amet consectetur adipiscing elit. In vel laoreet eros. Nullam vulputate, magna vel efficitur scelerisque.
                        </p>
                        <ul>
                            <li class="font-semibold mb-3">
                                <i class="fa-regular fa-circle-check text-primary"></i> Lorem ipsum dolor sit amet consectetur.
                            </li>
                            <li class="font-semibold mb-3">
                                <i class="fa-regular fa-circle-check text-primary"></i> Lorem ipsum dolor sit amet consectetur.
                            </li>
                            <li class="font-semibold mb-3">
                                <i class="fa-regular fa-circle-check text-primary"></i> Lorem ipsum dolor sit amet consectetur.
                            </li>
                        </ul>
                    </div>
                    <div>
                        <figure class="w-full flex justify-center">
                            <img class="max-w-full h-auto" src="public/img/pics.png" alt="">
                        </figure>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section--stats bg-[#202428] pt-[90px] pb-[75px]">
            <div class="container mx-auto">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 items-center">
                    <div class="col-span-1 sm:col-span-2 text-center lg:text-left">
                        <h3 class="title title--section text-3xl text-white font-bold mb-2">
                            <span class="text-primary">Vergelijk</span>dierenarts.nl
                        </h3>
                        <p class="paragraph text-white">
                            Lorem ipsum dolor sit amet consectetur<br>adipcing elit. In vel laoreet eros. Nullam<br>vulputate, magna vel efficitur scelerisque.
                        </p>
                    </div>
                    <div class="text-center">
                        <p class="text-white">CLINICS</p>
                        <span class="text-primary font-semibold text-4xl md:text-5xl block">+2k</span>
                    </div>
                    <div class="border-x border-x-white text-center">
                        <p class="text-white">LISTINGS</p>
                        <span class="text-primary font-semibold text-4xl md:text-5xl block">+20k</span>
                    </div>
                    <div class="text-center">
                        <p class="text-white">PETS</p>
                        <span class="text-primary font-semibold text-4xl md:text-5xl block">+200k</span>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section--testimonial pt-[80px] pb-[40px]">
            <div class="container mx-auto">
                <div class="section__header flex flex-col lg:flex-row items-center justify-between mb-6">
                    <div class="text-center lg:text-left">
                        <h4 class="subtitle w-fit text-md font-semibold relative before:content-[''] before:w-[20px] before:h-[2px] before:bg-primary before:absolute before:right-[-30px] before:top-1/2 before:-translate-y-1/2">
                            Lorem Ipsum Dolor
                        </h4>
                        <h3 class="title title--section font-bold text-3xl text-gray-800">
                            What Our Customers <span class="text-primary">Are Saying...</span>
                        </h3>
                    </div>
                    <a href="#" class="btn btn-outline-black whitespace-nowrap mt-4 lg:mt-0">Explore All</a>
                </div>
                <div class="testimonials grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="review border border-gray-300 p-[30px] md:p-[50px] bg-white">
                        <div class="d-rating flex justify-center items-center">
                            <figure class="w-[50px] h-[50px] rounded-full overflow-hidden mb-4">
                                <img class="w-full h-full" src="public/img/review.png" alt="">
                            </figure>
                            <p class="rating text-yellow-500 text-xs mb-0 mt-4 ml-2">
                                <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i>
                            </p>
                        </div>
                        <p class="review__content text-lg mb-4 text-center">
                            <i>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec varius neque.</i>
                        </p>
                        <h3 class="name text-normal font-bold text-center">User Name 
                            <span class="location text-gray-400 font-normal text-sm">Amsterdam</span>
                        </h3>
                    </div>
                    <div class="review border border-gray-300 p-[30px] bg-white">
                        <div class="d-rating flex justify-center align-center">
                            <figure class="w-[50px] h-[50px] rounded-full overflow-hidden mb-4">
                                <img class="w-full h-full" src="public/img/review.png" alt="">
                            </figure>
                            <p class="rating text-yellow-500 text-xs mb-0 mt-4 ml-2">
                                <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i>
                            </p>
                        </div>
                        <h4 class="rating"></h4>
                        <p class="review__content text-lg mb-4 text-center">
                            <i>Lorem ipsum dolor sit amet, <br>consectetur adipiscing elit. <br>Pellentesque nec varius neque.</i>
                        </p>
                        <h3 class="name text-normal font-bold text-center">User Name <span class="location text-gray-400 font-normal text-sm">Amsterdam</span></h3>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section--blog py-[40px]">
            <div class="container mx-auto relative">
                <h3 class="title title--section text-center text-3xl text-gray-800 font-bold mb-8">
                    From <span class="text-primary">Our Blog</span>
                </h3>
                <div class="posts grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                    <div class="block-blog border border-gray-300 transition duration-300 ease-out hover:shadow-lg">
                        <figure class="m-0 overflow-hidden">
                            <a href="#"><img class="w-full transition-transform duration-300 ease-out hover:scale-105" src="public/img/blog-1.png" alt=""></a>
                        </figure>
                        <div class="content p-[20px] pb-[30px]">
                            <p class="text-primary text-sm date">20 February, 2025</p>
                            <h3 class="title font-bold text-lg">
                                <a href="#">Lorem Ipsum Dolor</a>
                            </h3>
                            <p class="mb-5">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec varius.
                            </p>
                            <a href="#" class="btn btn-outline-black text-sm font-bold block w-fit mx-auto">Read Article</a>
                        </div>
                    </div>
                    <div class="block-blog border border-gray-300 transition duration-300 ease-out hover:shadow-lg">
                        <figure class="m-0 overflow-hidden">
                            <a href="#"><img class="w-full transition-transform duration-300 ease-out hover:scale-105" src="public/img/blog-2.png" alt=""></a>
                        </figure>
                        <div class="content p-[20px] pb-[30px]">
                            <p class="text-primary text-sm date">20 February, 2025</p>
                            <h3 class="title font-bold text-lg">
                                <a href="#">Lorem Ipsum Dolor</a>
                            </h3>
                            <p class="mb-5">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec varius. 
                            </p>
                            <a href="#" class="btn btn-outline-black text-sm font-bold block w-fit mx-auto">Read Article</a>
                        </div>
                    </div>
                    <div class="block-blog border border-gray-300 transition duration-300 ease-out hover:shadow-lg">
                        <figure class="m-0 overflow-hidden">
                            <a href="#"><img class="w-full transition-transform duration-300 ease-out hover:scale-105" src="public/img/blog-3.png" alt=""></a>
                        </figure>
                        <div class="content p-[20px] pb-[30px]">
                            <p class="text-primary text-sm date">20 February, 2025</p>
                            <h3 class="title font-bold text-lg">
                                <a href="#">Lorem Ipsum Dolor</a>
                            </h3>
                            <p class="mb-5">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec varius. 
                            </p>
                            <a href="#" class="btn btn-outline-black text-sm font-bold block w-fit mx-auto">Read Article</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section--map pt-[40px] pb-0">
            <div class="container mx-auto">
                <h3 class="title title--section text-center text-4xl text-gray-800 font-bold mb-8">
                    Discover The Best <span class="text-primary">Veterinary Clinics</span>
                </h3>
            </div>
            <div class="map">
                <div style="width: 100%">
                    <iframe width="100%" height="400" class="sm:h-[500px]" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                        src="https://maps.google.com/maps?width=100%25&amp;height=500&amp;hl=es&amp;q=Netherlands+(Mi%20nombre%20de%20egocios)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
                    </iframe>
                </div>
            </div>
        </section>

    </div>

    <?php include 'partials/footer.php'; ?>
</body>
<?php include 'partials/scripts.php'; ?>
</html>