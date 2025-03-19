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
                <h1 class="text-6xl text-center font-regular text-gray-800 relative z-3">
                    Contact <strong>Us</strong>
                </h1>
            </div>
            <img class="absolute bottom-0 right-0 z-0" src="public/img/contact.png" alt="">
        </section>

        <section class="section section--contact contact-form pb-[40px]">
            <div class="container mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-12">
                    <div class="lg:col-span-7">
                        <form class="px-[50px] py-[60px] bg-[#202428] lg:h-full" action="">
                            <p class="text-white">
                                Leave us a message and we will help you with any questions about veterinary clinics, services or how to use our directory.
                            </p>
                            <p class="text-primary">
                                We are here for you and your pet!
                            </p>
                            <p class="text-white mb-2">
                                Name
                            </p>
                            <input class="rounded-[5px] w-full py-1" type="text">
                            <p class="text-white mb-2">
                                Telephone
                            </p>
                            <input class="rounded-[5px] w-full py-1" type="text">
                            <p class="text-white mb-2">
                                Email
                            </p>
                            <input class="rounded-[5px] w-full py-1" type="text">
                            <p class="text-white mb-2">
                                Message
                            </p>
                            <input class="rounded-[5px] w-full mb-5 py-1" type="text">
                            <button class="btn btn-primaryLight w-full rounded-[5px] text-white">Send</button>
                        </form>
                    </div>
                    <div class="lg:col-span-5 bg-gray-200">
                        <figure>
                            <img src="public/img/contact2.png" alt="">
                        </figure>
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