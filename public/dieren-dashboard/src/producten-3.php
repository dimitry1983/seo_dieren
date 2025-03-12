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
            <div class="border border-solid border-[#CFD7E4] rounded-[15px] px-5 py-6 lg:px-24 lg:py-9 flex flex-col lg:grid lg:grid-cols-5 gap-4">
                <div class="col-span-3">
                    <div class="panel-white bg-white py-4 px-5 lg:p-9 rounded-[8px]">
                        <h2 class="text-[28px] font-bold mb-10">Product informatie</h2>
                        <div class="mb-5">
                            <label class="text-lg font-medium text-[#333333]" for="">Naam <span>*</span></label>
                            <div class="input-wrapper mt-2">
                                <input type="text" class="custom-input pe-[65px]" placeholder="Wat is een podcast en waarom zou je er een maken?" value="Wat is een podcast en waarom zou je er een maken?">
                                <i class="fa-solid fa-check valid"></i>
                            </div>
                        </div>
                        <div class="mb-5">
                            <label class="text-lg font-medium text-[#333333]" for="">Url</label>
                            <div class="input-wrapper mt-2">
                                <input type="text" class="custom-input pe-[65px]" placeholder="">
                                <i class="fa-solid fa-link absolute right-[40px] top-0 bottom-0 h-fit my-auto text-[15px] text-primary"></i>
                                <i class="fa-solid fa-check valid"></i>
                            </div>
                        </div>
                        <div class="mb-5">
                            <label class="text-lg font-medium text-[#333333]" for="">Categorie selecteren</label>
                            <div class="custom-select ms-auto mt-2">
                                <i class="fa-solid fa-angle-down"></i>
                                <select>
                                    <option value="">Podcast</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-8">
                            <label class="text-lg font-medium text-[#333333]" for="">Omschrijver (optioneel)</label>
                            <textarea class="custom-input w-full block mt-2" rows="8"></textarea>
                        </div>
                        <div class="flex items-center">
                            <label class="text-lg font-medium text-[#333333]" for="switch">Gebruiker moet elke les handmatig afvinken</label>
                            <label for="switch" class="custom-switch ms-auto">
                                <input type="checkbox" id="switch">
                                <span></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-span-2">
                    <div class="panel-white bg-white p-9 rounded-[8px]">
                        <div class="mb-5">
                            <label class="text-lg font-medium text-[#333333]" for="image">Afbeelding</label>
                            <label for="image" class="upload-photo mt-2">
                                <span class="block text-primary font-medium text-lg">
                                    <i class="fa-solid fa-image flex w-[80px] h-[80px] items-center justify-center bg-[#ECECEE] text-[#414141] text-2xl rounded-full mx-auto mb-2"></i>
                                Upload Photo
                            </span>
                        </label>
                        </div>
                        <div>
                            <label class="text-lg font-medium text-[#333333]" for="">Typeproduct</label>
                            <div class="custom-select ms-auto mt-2">
                                <i class="fa-solid fa-angle-down"></i>
                                <select>
                                    <option value="">Audio</option>
                                </select>
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