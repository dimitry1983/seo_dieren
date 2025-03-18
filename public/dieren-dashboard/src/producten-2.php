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
    <div class="main-container flex relative">

        <?php include 'partials/sidebar.php'; ?>

        <div class="main-content flex-1 px-5 py-10 lg:p-16 max-w-[100%]">
            <div class="border border-solid border-[#CFD7E4] rounded-[15px] px-5 py-6 lg:px-16 lg:py-9">
                <div class="text-lg mb-9"><strong>Producten</strong> / <strong>Categorieen</strong> / <span>Vormgeving</span></div>
                <div class="panel-white bg-white py-4 px-9 rounded-[5px] shadow-none mb-5 flex items-center justify-end gap-4">
                    <span class="flex px-5 py-2 text-center items-center w-fit rounded-3xl bg-[#E6FFE2] text-[#1E9609]"><i class="fa-solid fa-circle-small me-2"></i> Gepubliceerd</span>
                    <button class="px-2 py-2"><i class="fa-regular fa-eye"></i></button>
                    <button class="px-2 py-2"><i class="fa-solid fa-trash"></i></button>
                </div>

                <div class="panel-white bg-white py-4 px-5 lg:p-9 rounded-[8px]">
                    <div class="panel-white__toolbar flex items-center mb-7">
                        <ul class="flex flex-col lg:flex-row lg:gap-4 border-b-[2px] border-solid border-[#f7f8fa] w-full text-lg font-medium">
                            <li><a href="#" class="py-3 px-4 block text-primary -mb-[2px] border-b-[3px] border-solid border-primary">Inhoud</a></li>
                            <li><a href="#" class="py-3 px-4 block -mb-[2px]">Gegevens</a></li>
                            <li class="lg:ms-auto"><a href="#" class="py-3 px-4 block -mb-[2px]">Deelnemers</a></li>
                            <li><a href="#" class="py-3 px-4 block -mb-[2px]">Zichtbaarheid</a></li>
                        </ul>
                    </div>

                    <div class="overflow-auto max-h-[680px]">
                        
                        <div class="border border-solid border-[#d5d5d5] rounded-[10px] py-7 px-5 mb-4">
                            <div class="flex flex-col lg:flex-row gap-2">
                                <span class="w-[30px] h-[30px] border border-solid border-[#d5d5d5] text-white flex items-center justify-center rounded-[6px] bg-[#FBFCFF]">
                                    <i class="fa-solid fa-check"></i>
                                </span>
                                <i class="fa-solid fa-microphone-lines text-primary text-lg"></i>
                                <div class="lg:w-[60%]">
                                    <h2 class="text-lg font-medium text-[#363839] mb-0">Podcast-Hoe u uw eigen podcast helemaal opnieuw kunt starten.</h2>
                                    <p class="mb-0 text-[#363839] text-[14px]">Seizoen 1 - 10 afleveringen</p>
                                </div>
                                <div class="flex gap-3 items-center lg:ms-auto">
                                    <button class="px-1 py-2 text-lg text-[#B3B3B3]"><i class="fa-regular fa-star"></i></button>
                                    <button class="w-[30px] h-[30px] text-primary border border-solid rounded-full border-[#B3B3B3] flex items-center justify-center"><i class="fa-solid fa-angle-down"></i></button>
                                    <button class="px-1 py-2 text-lg text-[#B3B3B3]"><i class="fa-regular fa-ellipsis"></i></button>
                                </div>
                            </div>

                            <div class="lg:px-7 py-6 lg:ps-12 gap-3 flex-col w-full hidden">
                                <div class="flex gap-3 items-center">
                                    <i class="fa-solid fa-circle-pause text-primary text-2xl"></i>
                                    <figure class="min-w-[45px] w-[45px] h-[45px] rounded-[8px] relative">
                                        <img src="public/img/user.jpg" class="abs-cover" alt="">
                                    </figure>
                                    <p class="mb-0 lg:ms-3">Wat is een podcast en waarom zou je er een maken?</p>
                                    <p class="mb-0 lg:ms-10">1,212</p>
                                    <p class="mb-0 lg:ms-10">12:11</p>
                                </div>

                                <div class="flex gap-3 items-center">
                                    <i class="fa-solid fa-play w-[24px] text-center"></i>
                                    <figure class="min-w-[45px] w-[45px] h-[45px] rounded-[8px] relative">
                                        <img src="public/img/user.jpg" class="abs-cover" alt="">
                                    </figure>
                                    <p class="mb-0 lg:ms-3">Wat is een podcast en waarom zou je er een maken?</p>
                                    <p class="mb-0 lg:ms-10">1,212</p>
                                    <p class="mb-0 lg:ms-10">12:11</p>
                                </div>

                                <div class="flex gap-3 items-center">
                                    <i class="fa-solid fa-play w-[24px] text-center"></i>
                                    <figure class="min-w-[45px] w-[45px] h-[45px] rounded-[8px] relative">
                                        <img src="public/img/user.jpg" class="abs-cover" alt="">
                                    </figure>
                                    <p class="mb-0 lg:ms-3">Wat is een podcast en waarom zou je er een maken?</p>
                                    <p class="mb-0 lg:ms-10">1,212</p>
                                    <p class="mb-0 lg:ms-10">12:11</p>
                                </div>

                                <a href="#" class="btn-primary w-fit mt-5">Pagina toevegen <i class="fa-solid fa-plus ms-2"></i></a>
                            </div>

                        </div>

                        <div class="border border-solid border-[#d5d5d5] rounded-[10px] py-7 px-5 mb-4 bg-[#F5F5F5]">
                            <div class="flex flex-col lg:flex-row gap-2">
                                <span class="w-[30px] h-[30px] border border-solid border-[#d5d5d5] text-primary flex items-center justify-center rounded-[6px] bg-white">
                                    <i class="fa-solid fa-check"></i>
                                </span>
                                <i class="fa-solid fa-microphone-lines text-primary text-lg"></i>
                                <div class="lg:w-[60%]">
                                    <h2 class="text-lg font-medium text-[#363839] mb-0">Podcast-Hoe u uw eigen podcast helemaal opnieuw kunt starten.</h2>
                                    <p class="mb-0 text-[#363839] text-[14px]">Seizoen 1 - 10 afleveringen</p>
                                </div>
                                <div class="flex gap-3 items-center lg:ms-auto">
                                    <button class="px-1 py-2 text-lg text-[#FFDE21]"><i class="fa-solid fa-star"></i></button>
                                    <button class="w-[30px] h-[30px] text-white border border-solid rounded-full border-primary bg-primary flex items-center justify-center"><i class="fa-solid fa-angle-down"></i></button>
                                    <button class="px-1 py-2 text-lg text-[#B3B3B3]"><i class="fa-regular fa-ellipsis"></i></button>
                                </div>
                            </div>

                            <div class="lg:px-7 py-6 lg:ps-12 gap-3 flex-col w-full flex">
                                <div class="flex gap-3 items-center">
                                    <i class="fa-solid fa-circle-pause text-primary text-2xl"></i>
                                    <figure class="min-w-[45px] w-[45px] h-[45px] rounded-[8px] relative">
                                        <img src="public/img/user.jpg" class="abs-cover" alt="">
                                    </figure>
                                    <p class="mb-0 lg:ms-3">Wat is een podcast en waarom zou je er een maken?</p>
                                    <p class="mb-0 lg:ms-10">1,212</p>
                                    <p class="mb-0 lg:ms-10">12:11</p>
                                </div>

                                <div class="flex gap-3 items-center">
                                    <i class="fa-solid fa-play w-[24px] text-center"></i>
                                    <figure class="min-w-[45px] w-[45px] h-[45px] rounded-[8px] relative">
                                        <img src="public/img/user.jpg" class="abs-cover" alt="">
                                    </figure>
                                    <p class="mb-0 lg:ms-3">Wat is een podcast en waarom zou je er een maken?</p>
                                    <p class="mb-0 lg:ms-10">1,212</p>
                                    <p class="mb-0 lg:ms-10">12:11</p>
                                </div>

                                <div class="flex gap-3 items-center">
                                    <i class="fa-solid fa-play w-[24px] text-center"></i>
                                    <figure class="min-w-[45px] w-[45px] h-[45px] rounded-[8px] relative">
                                        <img src="public/img/user.jpg" class="abs-cover" alt="">
                                    </figure>
                                    <p class="mb-0 lg:ms-3">Wat is een podcast en waarom zou je er een maken?</p>
                                    <p class="mb-0 lg:ms-10">1,212</p>
                                    <p class="mb-0 lg:ms-10">12:11</p>
                                </div>

                                <a href="#" class="btn-primary w-fit px-5 mt-5">Pagina toevegen <i class="fa-solid fa-plus ms-2"></i></a>
                            </div>

                        </div>

                        <div class="border border-solid border-[#d5d5d5] rounded-[10px] py-7 px-5 mb-4">
                            <div class="flex flex-col lg:flex-row gap-2">
                                <span class="w-[30px] h-[30px] border border-solid border-[#d5d5d5] text-white flex items-center justify-center rounded-[6px] bg-[#FBFCFF]">
                                    <i class="fa-solid fa-check"></i>
                                </span>
                                <i class="fa-solid fa-microphone-lines text-primary text-lg"></i>
                                <div class="lg:w-[60%]">
                                    <h2 class="text-lg font-medium text-[#363839] mb-0">Podcast-Hoe u uw eigen podcast helemaal opnieuw kunt starten.</h2>
                                    <p class="mb-0 text-[#363839] text-[14px]">Seizoen 1 - 10 afleveringen</p>
                                </div>
                                <div class="flex gap-3 items-center lg:ms-auto">
                                    <button class="px-1 py-2 text-lg text-[#B3B3B3]"><i class="fa-regular fa-star"></i></button>
                                    <button class="w-[30px] h-[30px] text-primary border border-solid rounded-full border-[#B3B3B3] flex items-center justify-center"><i class="fa-solid fa-angle-down"></i></button>
                                    <button class="px-1 py-2 text-lg text-[#B3B3B3]"><i class="fa-regular fa-ellipsis"></i></button>
                                </div>
                            </div>

                            <div class="lg:px-7 py-6 lg:ps-12 gap-3 flex-col w-full hidden">
                                <div class="flex gap-3 items-center">
                                    <i class="fa-solid fa-circle-pause text-primary text-2xl"></i>
                                    <figure class="min-w-[45px] w-[45px] h-[45px] rounded-[8px] relative">
                                        <img src="public/img/user.jpg" class="abs-cover" alt="">
                                    </figure>
                                    <p class="mb-0 lg:ms-3">Wat is een podcast en waarom zou je er een maken?</p>
                                    <p class="mb-0 lg:ms-10">1,212</p>
                                    <p class="mb-0 lg:ms-10">12:11</p>
                                </div>

                                <div class="flex gap-3 items-center">
                                    <i class="fa-solid fa-play w-[24px] text-center"></i>
                                    <figure class="min-w-[45px] w-[45px] h-[45px] rounded-[8px] relative">
                                        <img src="public/img/user.jpg" class="abs-cover" alt="">
                                    </figure>
                                    <p class="mb-0 lg:ms-3">Wat is een podcast en waarom zou je er een maken?</p>
                                    <p class="mb-0 lg:ms-10">1,212</p>
                                    <p class="mb-0 lg:ms-10">12:11</p>
                                </div>

                                <div class="flex gap-3 items-center">
                                    <i class="fa-solid fa-play w-[24px] text-center"></i>
                                    <figure class="min-w-[45px] w-[45px] h-[45px] rounded-[8px] relative">
                                        <img src="public/img/user.jpg" class="abs-cover" alt="">
                                    </figure>
                                    <p class="mb-0 lg:ms-3">Wat is een podcast en waarom zou je er een maken?</p>
                                    <p class="mb-0 lg:ms-10">1,212</p>
                                    <p class="mb-0 lg:ms-10">12:11</p>
                                </div>

                                <a href="#" class="btn-primary w-fit mt-5">Pagina toevegen <i class="fa-solid fa-plus ms-2"></i></a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php include 'partials/scripts.php'; ?>
</html>