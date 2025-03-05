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

        <section class="section section--hero-interior bg-primaryLight relative py-[140px]">
            <img class="absolute bottom-0 left-0 z-0" src="public/img/about1.png" alt="">
            <div class="container mx-auto">
                <h1 class="text-6xl text-center font-regular text-gray-800 relative z-1">
                    About <strong>Us</strong>
                </h1>
            </div>
            <img class="absolute bottom-0 right-0 z-0" src="public/img/about2.png" alt="">
        </section>

        <section class="section section--about-us">
            <div class="container mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div>
                        <h3 class="title title--section text-4xl font-bold mb-8">
                            Find The Best<br><span class="text-primary">Veterinary Cate Near You</span>
                        </h3>
                        <p class="paragraph text-gray-300 mb-4">
                            We are passionate about pet well-being and know how important it is to find the best veterinary care for them. That's why we've created this specialized directory of veterinary clinics, designed to help you easily locate the best animal health centers near you.
                            <br><br>Our goal is to connect pet owners with qualified professionals, offering detailed information about services, hours, locations, and reviews of each clinic.
                        </p>
                        <a href="#" class="btn btn-primary">Add Your Clinic <i class="fa-solid fa-circle-plus"></i></a>
                    </div>
                    <div>
                        <figure>
                            <img src="public/img/pics.png" alt="">
                        </figure>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section--stats bg-[#202428] pt-[90px] pb-[75px]">
            <div class="container mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-12">
                    <div class="lg:col-span-7">
                        <h3 class="title title--section c-white text-3xl text-white font-bold mb-2">
                            <span class="text-primary">Vergelijk</span>dierenarts.nl
                        </h3>
                        <p class="paragraph text-white">
                            We are committed to providing you with an up-to-date, easy-to-use and accessible platform, so that your pet's care is always a priority.
                            <br><br>Your furry companion deserves the best, and we help you find it!
                        </p>
                        <ul>
                            <li class="font-semibold mb-3 text-white">
                                <i class="fa-regular fa-circle-check text-primary"></i> Lorem ipsum dolor sit amet consectetur adipcing elit.
                            </li>
                            <li class="font-semibold mb-3 text-white">
                                <i class="fa-regular fa-circle-check text-primary"></i> Lorem ipsum dolor sit amet consectetur adipcing elit.
                            </li>
                            <li class="font-semibold mb-3 text-white">
                                <i class="fa-regular fa-circle-check text-primary"></i> Lorem ipsum dolor sit amet consectetur adipcing elit.
                            </li>
                        </ul>
                        <a href="#" class="btn btn-primaryLight">Find A Clinic <i class="fa-regular fa-magnifying-glass"></i></a>
                    </div>
                    <div class="lg:col-span-5">
                        <figure>
                            <img src="public/img/dogi.png" alt="">
                        </figure>
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

        <section class="section section--map pt-[40px] pb-0">
            <div class="container mx-auto">
                <h3 class="title title--section text-center text-4xl text-gray-800 font-bold mb-8">
                     Discover The Best <span class="text-primary">Veterinary Clinics</span>
                </h3>
            </div>
            <div class="map">
                <div style="width: 100%"><iframe width="100%" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=500&amp;hl=es&amp;q=Netherlands+(Mi%20nombre%20de%20egocios)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.gps.ie/car-satnav-gps/">GPS car tracker</a></iframe></div>
            </div>
        </section>

    <?php include 'partials/footer.php'; ?>
</body>
<?php include 'partials/scripts.php'; ?>
</html>