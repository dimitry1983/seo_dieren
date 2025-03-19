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
                <div class="text-lg mb-9"><strong>Producten</strong> / <span>Vormgeving</span></div>
                <div class="panel-white bg-white py-4 px-5 lg:p-9 rounded-[8px]">
                    <div class="flex flex-col lg:flex-row gap-4 lg:gap-2 border border-solid border-[#d5d5d5] rounded-[10px] py-7 px-5 mb-4">
                        <span class="w-[30px] h-[30px] border border-solid border-[#d5d5d5] text-white flex items-center justify-center rounded-[6px] bg-[#FBFCFF]">
                            <i class="fa-solid fa-check"></i>
                        </span>
                        <i class="fa-regular fa-eye-dropper-half text-primary text-lg"></i>
                        <div class="lg:w-[60%]">
                            <h2 class="text-lg font-medium text-[#363839] mb-2">Huisstijl kleur</h2>
                            <p class="mb-0">De huisstijl kleur wordt gebruik om visuele elementen mee te accentueren. De gekozen kleur kan gewijzigd worden naar een lichtere of donkere variant wanneer de tekst niet goed leesbaar is.</p>
                        </div>
                        <div class="flex gap-4 lg:ms-auto">
                            <span class="w-[20px] h-[20px] rounded-full bg-[#010101]"></span>
                            <span class="w-[20px] h-[20px] rounded-full bg-[#210071]"></span>
                            <span class="w-[20px] h-[20px] rounded-full bg-[#010101]"></span>
                            <span class="w-[20px] h-[20px] rounded-full bg-[#7E5FBE]"></span>
                            <span class="w-[20px] h-[20px] rounded-full bg-[#E8FF57]"></span>
                        </div>
                    </div>

                    <div class="flex flex-col lg:flex-row gap-4 lg:gap-2 border border-solid border-[#d5d5d5] rounded-[10px] py-7 px-5 mb-4">
                        <span class="w-[30px] h-[30px] border border-solid border-[#d5d5d5] text-white flex items-center justify-center rounded-[6px] bg-[#FBFCFF]">
                            <i class="fa-solid fa-check"></i>
                        </span>
                        <i class="fa-regular fa-eye-dropper-half text-primary text-lg"></i>
                        <div class="lg:w-[60%]">
                            <h2 class="text-lg font-medium text-[#363839] mb-2">Menu achtergrondkleur</h2>
                            <p class="mb-0">Dit is de kleur van je menubalk. Je logo zou er hier goed op uit moeten zien.</p>
                        </div>
                        <div class="flex gap-4 lg:ms-auto">
                            <span class="w-[20px] h-[20px] rounded-full bg-[#7E5FBE]"></span>
                            <span class="w-[20px] h-[20px] rounded-full bg-[#7E5FBE]"></span>
                        </div>
                    </div>

                    <div class="flex flex-col lg:flex-row gap-4 lg:gap-2 border border-solid border-[#d5d5d5] rounded-[10px] py-7 px-5 bg-[#F5F5F5]">
                        <span class="w-[30px] h-[30px] border border-solid border-[#d5d5d5] text-primary flex items-center justify-center rounded-[6px] bg-white">
                            <i class="fa-solid fa-check"></i>
                        </span>
                        <div class="lg:w-[60%]">
                            <h2 class="text-lg font-medium text-[#363839] mb-2">Logo</h2>
                            <p class="mb-0">Het logo dat zichtbaar is binnen</p>
                        </div>
                        <div class="lg:ms-auto">
                            <figure class="w-[130px] px-2 py-4 rounded-[8px] bg-white">
                                <img src="public/img/Logo.png" alt="">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php include 'partials/scripts.php'; ?>
</html>