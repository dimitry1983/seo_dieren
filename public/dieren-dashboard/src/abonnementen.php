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

                <div class="panel-white bg-white rounded-[8px] mb-6">
                    <div class="flex flex-col lg:flex-row">
                        <div class="flex gap-1">
                            <button class="p-5 duration-300 hover:text-primary"><i class="fa-regular fa-filter me-2"></i> Filter By</button>
                            <button class="p-5 duration-300 hover:text-primary"><i class="fa-regular fa-file-export me-2"></i> Export</button>
                        </div>
                        
                        <div class="px-4 pb-4 lg:p-5 flex-1 lg:border-l lg:border-solid lg:border-[#EDEFF2]">
                            <form action="." class="ms-auto relative border border-solid border-[#e9e9e9] h-[50px] w-full rounded-[25px]">
                                <span class="absolute left-0 top-0 h-[50px] w-[50px] flex items-center justify-center text-[#D1D1D1]"><i class="fa-regular fa-search"></i></span>
                                <input type="text" class="relative z-10 w-full bg-transparent h-full px-[50px] outline-none shadow-none placeholder:text-[#D1D1D1]" placeholder="Waar ben je naar op zoek?">
                                <button type="submit" class="px-4 h-[50px] w-[50px] flex items-center justify-center absolute right-0 top-0 text-[#D1D1D1] z-20">
                                    <i class="fa-solid fa-angle-right"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="panel-white bg-white py-4 px-5 lg:p-9 rounded-[8px]">
                    <div class="panel-white__toolbar flex items-center mb-7">
                        <ul class="flex gap-4 border-b-[2px] border-solid border-[#f7f8fa] w-full text-lg font-medium">
                            <li><a href="#" class="py-3 px-4 block text-primary -mb-[2px] border-b-[3px] border-solid border-primary">Alles</a></li>
                            <li><a href="#" class="py-3 px-4 block -mb-[2px]">Testabonnementen</a></li>
                        </ul>
                    </div>

                    <div class="pane-white__table overflow-auto">
                        <table class="w-full">
                            <thead class="bg-[#F6F7F9]">
                                <tr>
                                    <th class="p-4 rounded-tl-[4px] rounded-bl-[4px]"><button class="w-full flex items-center">Factuur <i class="fa-regular fa-arrow-down ms-auto"></i></button></th>
                                    <th class="p-4"><button class="w-full flex items-center">Naam <i class="fa-regular fa-arrow-down ms-auto"></i></button></th>
                                    <th class="p-4"><button class="w-full flex items-center">Product <i class="fa-regular fa-arrow-down ms-auto"></i></button></th>
                                    <th class="p-4"><button class="w-full flex items-center">Datum <i class="fa-regular fa-arrow-down ms-auto"></i></button></th>
                                    <th class="p-4"><button class="w-full flex items-center">Bedrag <i class="fa-regular fa-arrow-down ms-auto"></i></button></th>
                                    <th class="p-4 rounded-tr-[4px] rounded-br-[4px]"><button class="w-full flex items-center">Staat <i class="fa-regular fa-arrow-down ms-auto"></i></button></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for($i=0;$i<=7;$i++): $tdClass='';
                                    // Conditional for top border 
                                    if($i > 0){
                                        $tdClass = 'border-t-[2px] border-solid border-[#F6F7F9]';
                                    }
                                ?>
                                    <tr>
                                        <td class="p-4 <?= $tdClass ?>">0001</td>
                                        <td class="p-4 <?= $tdClass ?>">Christine Brooks</td>
                                        <td class="p-4 <?= $tdClass ?>">Podcast sit amet, consectetuer adipiscing elit </td>
                                        <td class="p-4 <?= $tdClass ?>">04 Oct 24</td>
                                        <td class="p-4 <?= $tdClass ?>">€ 20,50</td>
                                        <td class="p-4 <?= $tdClass ?>"><span class="flex px-5 py-2 text-center items-center w-fit rounded-3xl bg-[#E6FFE2] text-[#1E9609]"><i class="fa-solid fa-circle-small me-2"></i> Actief</span></td>
                                    </tr>
                                <?php endfor ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="flex items-start mt-11">
                    <span class="text-lg text-[#202224] opacity-60">1-07 van 20 wordt weergegeven</span>
                    <div class="flex ms-auto border-solid border-[#dddddd] border rounded-lg text-lg">
                        <a href="#" class="px-4 pt-1 text-[#202224] opacity-60 hover:opacity-100 hover:text-primary duration-300"><i class="fa-regular fa-angle-left"></i></a>
                        <a href="#" class="border-l border-solid border-[#dddddd] px-4 pt-1 text-[#202224] opacity-60 hover:opacity-100 hover:text-primary duration-300"><i class="fa-regular fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php include 'partials/scripts.php'; ?>
</html>