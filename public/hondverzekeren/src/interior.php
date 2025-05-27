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

    <div class="main-container">

        <!-- hero -->
        <!-- hero -->
    <section class="section section--primary section--hero section--page-header bg-[url('../../../src/public/img/hero-bg.jpg')] bg-cover bg-center bg-no-repeat text-white relative overflow-hidden">
        <div class="container text-center">
            <h1 class="section-title--lg lg:text-[60px] mb-2 font-medium">Post</h1>
        </div>
    </section>
    <!-- /hero -->
        <!-- /hero -->

        <!-- content -->
        <section class="section section--white section--content">
            <div class="container mx-auto px-4">
                <div class="lg:grid lg:grid-cols-12 lg:gap-24">
                    <div class="col-span-8 flex flex-col gap-11">
                        <div class="py-9 px-10 border border-solid border-[#D9D9D9] rounded-[30px]">
                            <h2 class="text-2xl lg:text-[35px] font-semibold mb-7">Over het pakket</h2>
                            <p class="mb-7 text-xl">stelt gebruikers in staat producten te vinden op onderwerp, formaat of ervaringsniveau. Bovendien bevat het downloadbare bestanden om het leren dynamischer te maken.</p>
                            <ul class="flex flex-col gap-1 text-lg">
                                <li class="relative ps-8"><i class="fa-solid fa-square-check absolute left-0 top-1 text-[#00B900]"></i> Aanpasbare inhoud: Producten zijn ontworpen om zich aan te passen aan de specifieke behoeften van elke klant.</li>
                                <li class="relative ps-8"><i class="fa-solid fa-square-check absolute left-0 top-1 text-[#00B900]"></i> Toegewijde ondersteuning: we bieden persoonlijke aandacht om ervoor te zorgen dat gebruikers het maximale uit hun bronnen halen.</li>
                                <li class="relative ps-8"><i class="fa-solid fa-square-check absolute left-0 top-1 text-[#00B900]"></i> Voortdurende updates: Nieuwe producten en regelmatige updates houden de winkel fris en relevant.</li>
                            </ul>
                        </div>

                        <?php for($i=0;$i<3;$i++): ?>
                            <div class="border border-solid border-[#D9D9D9] rounded-[30px]">
                                <div class="py-6 px-10">
                                    <span class="w-fit text-xl bg-secondary py-2 px-10 rounded-[20px] text-primaryDark font-bold">Tutorial</span>
                                </div>
                                <figure class="relative pb-[55%]">
                                    <img src="public/img/image.jpg" class="abs-cover" alt="">
                                </figure>
                                <div class="py-6 px-10">
                                    <h2 class="text-2xl lg:text-[35px] font-semibold mb-6">Fotografie voor beginners: compositie en bewerking</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. </p>
                                </div>
                            </div>
                        <?php endfor ?>
                    </div>

                    <div class="col-span-4">
                        <div class="py-9 px-10 border border-solid border-[#D9D9D9] rounded-[30px]">
                            <h3 class="text-2xl font-semibold mb-6">Lorem ipsum dolor sit amet</h3>
                            <div class="flex flex-col gap-5">
                                <?php for($i=0;$i<9;$i++): ?>
                                    <div class="grid grid-cols-3 gap-5 items-center">
                                        <div class="col-span-1">
                                            <figure class="pb-[65%] relative rounded-[10px] border-[3px] border-solid border-primary overflow-hidden">
                                                <img src="public/img/image.jpg" class="abs-cover filter blur opacity-80 scale-125" alt="">
                                                <i class="fa-solid fa-lock-keyhole absolute left-0 right-0 w-fit h-fit top-0 bottom-0 m-auto z-10 text-white text-3xl drop-shadow-md"></i>
                                            </figure>
                                        </div>
                                        <div class="col-span-2">
                                            <strong class="text-lg font-semibold text-black block mb-1">Lorem ipsum dolor sit amet</strong>
                                            <span class="font-medium text-primaryDark">10 lessen  |  Maart 2024</span>
                                        </div>
                                    </div>
                                <?php endfor ?>
                            </div>
                            <a href="#" class="btn w-full mt-10 text-center btn-secondary">Abonneer je nu <i class="fa-solid fa-circle-chevron-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /content -->
        
    </div>

    <?php include 'partials/footer.php'; ?>
</body>
<?php include 'partials/scripts.php'; ?>
</html>