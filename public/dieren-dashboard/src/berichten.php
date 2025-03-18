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
            <div class="border border-solid border-[#CFD7E4] rounded-[15px] lg:grid lg:grid-cols-3">
                <div class="col-span-1 px-4 lg:ps-4 lg:pe-8 py-6 border-e border-solid border-[#d2d2d2]">
                    <h2 class="mb-6 text-lg font-semibold">Berichten</h2>

                    <form action="." class="mb-4 relative bg-white rounded-[8px]">
                        <i class="fa-regular fa-search absolute z-0 left-3 top-0 bottom-0 my-auto h-fit text-[#71717A]"></i>
                        <input type="text" placeholder="Zoeken" class="relative z-10 bg-transparent rounded-[8px] ps-10 pe-3 py-2 placeholder:text-[#71717A]">
                    </form>

                    <div class="flex flex-col gap-4 overflow-auto">
                        <div class="px-4 py-6 border border-solid border-[#E4E4E7] rounded-[8px] bg-[#F4F4F5]">
                            <div class="flex"><h4 class="text-[#18181B] font-semibold">Alice Smith</h4> <span class="ms-auto text-[15px] text-[#71717A]">1 min ago</span></div>
                            <span class="#181818 block mb-2">Betreft: Projectupdate</span>
                            <p class="mb-0 text-[#71717A]">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
                        </div>
                        <?php for($i=0;$i<4;$i++): ?>
                            <div class="px-4 py-6 border border-solid border-[#E4E4E7] rounded-[8px] bg-white">
                                <div class="flex"><h4 class="text-[#18181B] font-semibold">Alice Smith</h4> <span class="ms-auto text-[15px] text-[#71717A]">1 min ago</span></div>
                                <span class="#181818 block mb-2">Betreft: Projectupdate</span>
                                <p class="mb-0 text-[#71717A]">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
                            </div>
                        <?php endfor ?>
                    </div>
                </div>
                <div class="col-span-2 px-4 lg:ps-14 lg:pe-8 py-6">
                    <form action="." class="h-full min-h-fit flex flex-col">
                        <div class="flex">
                            <div class="flex">
                                <button class="w-[40px] h-[40px] lg:w-[48px] lg:h-[48px] flex items-center justify-center bg-white border border-solid border-[#adb5c3] text-[#adb5c3] rounded-tl-[10px] rounded-bl-[10px] duration-300 hover:bg-primary hover:text-white hover:border-primary"><i class="fa-solid fa-inbox"></i></button>
                                <button class="w-[40px] h-[40px] lg:w-[48px] lg:h-[48px] flex items-center justify-center bg-white border-t border-b border-solid border-[#adb5c3] text-[#adb5c3] duration-300 hover:bg-primary hover:text-white hover:border-primary"><i class="fa-solid fa-circle-info"></i></button>
                                <button class="w-[40px] h-[40px] lg:w-[48px] lg:h-[48px] flex items-center justify-center bg-white border border-solid border-[#adb5c3] text-[#adb5c3] rounded-tr-[10px] rounded-br-[10px] duration-300 hover:bg-primary hover:text-white hover:border-primary"><i class="fa-solid fa-trash"></i></button>
                            </div>
                            <div class="flex ms-auto gap-[3px]">
                                <button class="w-[40px] h-[40px] lg:w-[48px] lg:h-[48px] flex items-center justify-center bg-white border border-solid border-[#adb5c3] text-[#adb5c3] rounded-[10px] duration-300 hover:bg-primary hover:text-white hover:border-primary"><i class="fa-solid fa-reply"></i></button>
                                <button class="w-[40px] h-[40px] lg:w-[48px] lg:h-[48px] flex items-center justify-center bg-white border border-solid border-[#adb5c3] text-[#adb5c3] rounded-[10px] duration-300 hover:bg-primary hover:text-white hover:border-primary"><i class="fa-solid fa-reply-all"></i></button>
                                <button class="w-[40px] h-[40px] lg:w-[48px] lg:h-[48px] flex items-center justify-center bg-white border border-solid border-[#adb5c3] text-[#adb5c3] rounded-[10px] duration-300 hover:bg-primary hover:text-white hover:border-primary"><i class="fa-solid fa-share"></i></button>
                                <button class="w-[40px] h-[40px] lg:w-[48px] lg:h-[48px] flex items-center justify-center bg-white border border-solid border-[#adb5c3] text-[#adb5c3] rounded-[10px] duration-300 hover:bg-primary hover:text-white hover:border-primary"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                            </div>
                        </div>
                        <div class="flex mt-9">
                            <div class="flex">
                                <div class="rounded-full border border-solid min-w-[52px] w-[52px] h-[52px] bg-white border-[#d8d8d8] flex items-center justify-center text-[#ADB5C3] text-xl me-4">
                                    <i class="fa-regular fa-inbox"></i>
                                </div>
                                <div>
                                    <h4 class="text-[#181818] font-semibold">Alice Smith</h4>
                                    <span class="text-[#181818]">Betreft: Projectupdate</span>
                                </div>
                            </div>
                            <div class="ms-auto">
                                <span class="text-[#9F9F9F] text-base">Mar 04, 2024, 1:15:00 PM</span>
                            </div>
                        </div>
                        <div class="text-[#464646] lg:text-lg mt-9">
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus.</p>
                        </div>
                        <div class="flex items-center mt-auto">
                            <label for="switch" class="custom-switch">
                                <input type="checkbox" id="switch">
                                <span>Mute this thread</span>
                            </label>
                            <button class="ms-auto btn-primary">Send</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>
<?php include 'partials/scripts.php'; ?>
</html>