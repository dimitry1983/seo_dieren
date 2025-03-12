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
                <div class="text-lg mb-9"><strong>Producten</strong> / <span>Categorieen</span></div>

                <div class="panel-white bg-white py-4 px-5 lg:p-9 rounded-[8px]">

                    <div class="panel-white__toolbar flex items-center mb-7">
                        <ul class="flex gap-4 border-b-[2px] border-solid border-[#f7f8fa] w-full text-lg font-medium">
                            <li><a href="#" class="py-3 px-4 block text-primary -mb-[2px] border-b-[3px] border-solid border-primary">Overzicht</a></li>
                            <li><a href="#" class="py-3 px-4 block -mb-[2px]">Design</a></li>
                        </ul>
                    </div>

                    <div class="pane-white__table h-[42vh] overflow-auto">
                        <table class="w-full">
                            <thead class="bg-[#F6F7F9]">
                                <tr>
                                    <th class="p-4 rounded-tl-[4px] rounded-bl-[4px]">Product</th>
                                    <th class="p-4">Staat</th>
                                    <th class="p-4 rounded-tr-[4px] rounded-br-[4px]">Acties</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for($i=0;$i<=20;$i++): $tdClass='';
                                    // Conditional for top border 
                                    if($i > 0){
                                        $tdClass = 'border-t-[2px] border-solid border-[#F6F7F9]';
                                    }
                                ?>
                                    <tr>
                                        <td class="p-4 <?= $tdClass ?>">
                                            <div class="flex gap-4 items-start">
                                                <div class="flex items-center gap-2">
                                                <span class="w-[16px] h-[16px] border border-solid border-[#d5d5d5] text-primary flex items-center justify-center rounded-[3px] text-[12px] bg-white">
                                                    <i class="fa-solid fa-check"></i>
                                                </span>
                                                <i class="fa-solid fa-bars text-xl text-[#A5A5A5]"></i>
                                                </div>
                                                <div>
                                                    <h3 class="text-lg font-medium text-[#363839]"><i class="fa-solid fa-microphone-lines text-primary me-2"></i>Podcast</h3>
                                                    <span class="font-[14px] text-[#363839]">Seizoenen 10 - 120 afleveringen</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-4 <?= $tdClass ?> text-center">
                                            <span class="flex px-5 py-2 text-center items-center w-fit mx-auto rounded-3xl bg-[#E6FFE2] text-[#1E9609]"><i class="fa-solid fa-circle-small me-2"></i> Gepubliceerd</span></td>
                                        <td class="p-4 <?= $tdClass ?>">
                                            <div class="flex items-center justify-end gap-1 text-[#202224]">
                                                <button class="px-2 py-2"><i class="fa-regular fa-megaphone"></i></button>
                                                <button class="px-2 py-2"><i class="fa-solid fa-trash"></i></button>
                                                <button class="px-2 py-2"><i class="fa-regular fa-pencil"></i></button>
                                                <button class="px-2 py-2"><i class="fa-regular fa-copy"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endfor ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php include 'partials/scripts.php'; ?>
</html>