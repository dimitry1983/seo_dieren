<header class="main-header border-b-2 border-solid border-[#edeff2] bg-white relative">
    <div class="flex items-center">
        <a class="block w-[180px] lg:w-[232px] py-5 px-7" href="#">
            <img src="{{ asset('dieren-dashboard/src/public/img/logo.png')}}" alt="">
        </a>
        <div class="flex items-center flex-1 py-5 border-s-2 border-solid border-[#edeff2] ps-5 pe-10 gap-3 lg:gap-6">
            <button id="toggleBtn" class="w-[50px] h-[50px] border border-solid border-[#e9e9e9] rounded-full flex flex-col items-center justify-center px-0 py-0 gap-[5px]">
                <span class="block w-[18px] h-[2px] bg-[#D1D1D1] rounded"></span>
                <span class="block w-[18px] h-[2px] bg-[#D1D1D1] rounded"></span>
                <span class="block w-[18px] h-[2px] bg-[#D1D1D1] rounded"></span>
            </button>

            <div class="block lg:hidden">
                <div>
                    <button class="relative w-[50px] h-[50px] border border-solid border-[#e9e9e9] rounded-full flex items-center justify-center text-[#D1D1D1] px-0 py-0">
                        <i class="fa-solid fa-bell text-xl"></i>
                        <span class="w-[10px] h-[10px] rounded-full bg-primary absolute top-[1px] right-[1px]"></span>
                    </button>
                </div>
            </div>

            <button id="toggleSideMenu" class="w-[50px] h-[50px] border border-solid border-[#e9e9e9] rounded-full flex flex-col items-center justify-center px-0 py-0 gap-[5px] ms-auto lg:hidden">
                <i class="fa-solid fa-ellipsis-vertical text-[#D1D1D1] text-lg"></i>
            </button>

            <div id="sideMenu" class="hidden absolute top-full left-0 px-6 py-4 w-full items-center gap-6 flex-1 lg:static lg:flex lg:p-0 bg-white z-50">

                <form action="." class="ms-auto relative border border-solid border-[#e9e9e9] h-[50px] w-[610px] max-w-full rounded-[25px] order-2 lg:order-1">
                    <span class="absolute left-0 top-0 h-[50px] w-[50px] flex items-center justify-center text-[#D1D1D1]"><i class="fa-regular fa-search"></i></span>
                    <input type="text" class="relative z-10 w-full bg-transparent h-full px-[50px] outline-none shadow-none placeholder:text-[#D1D1D1]" placeholder="Waar ben je naar op zoek?">
                    <button type="submit" class="px-4 h-[50px] w-[50px] flex items-center justify-center absolute right-0 top-0 text-[#D1D1D1] z-20">
                        <i class="fa-solid fa-angle-right"></i>
                    </button>
                </form>

                <div class="flex items-center order-2 lg:order-1 gap-6 w-full lg:w-fit">
                    <div class="hidden lg:block">
                        <div>
                            <button class="relative w-[50px] h-[50px] border border-solid border-[#e9e9e9] rounded-full flex items-center justify-center text-[#D1D1D1] px-0 py-0">
                                <i class="fa-solid fa-bell text-xl"></i>
                                <span class="w-[10px] h-[10px] rounded-full bg-primary absolute top-[1px] right-[1px]"></span>
                            </button>
                        </div>
                    </div>

                    <div class="ms-auto relative lg:ms-0">
                        <button class="group flex items-center" data-dropdown>
                            <span class="block relative w-[50px] h-[50px] rounded-full overflow-hidden border-2 border-solid border-[#d1d1d1] group-hover:border-primary duration-300 me-3"><img class="abs-cover" src="{{ asset('pexilfy-dashboard/src/public/img/user.jpg')}}" alt=""></span>
                            <span class="text-lg font-medium text-[#271F30]"> {{ Auth::user()->name }} <i class="fa-regular fa-angle-down text-primary ms-2"></i></span>
                        </button>

                        <div class="drop gap-2 border border-solid border-[#D1D1D1] rounded-[8px] px-4 py-3 absolute left-0 top-full translate-y-1 w-full bg-white">
                            <a
                                href="{{ route('logout') }}"
                                class="block duration-300 hover:text-primary"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            >
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</header>