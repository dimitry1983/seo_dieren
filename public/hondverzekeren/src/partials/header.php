<div class="top-header text-white bg-primary text-lg py-4">
    <div class="container flex items-center justify-end px-4 mx-auto gap-3">
        <a href="#">Inloggen</a>
        <span>|</span>
        <a href="#">Registreren</a>
    </div>
</div>
<header class="header relative header--main">
    <div class="py-4">
        <div class="container px-4 mx-auto flex justify-center items-center">
            <a href="#" class="castoro text-2xl lg:text-3xl text-primary font-bold">
                LOGO HERE
            </a>

            <button id="toggleBtn" class="group peer lg:hidden ml-auto bg-primary text-white peer-open:mt-10 px-2 py-2 rounded-md">
                <span class="top-0 block bg-white w-8 h-[3px]  transition origin-top-center relative group-open:rotate-45 group-open:top-[11px] group-open:border-none"></span>
                <span class="block mt-2 bg-white w-8 h-[3px] transition duration-300 group-open:opacity-0"></span>
                <span class="top-0 block mt-2 bg-white w-8 h-[3px] transition origin-top-center relative group-open:-rotate-45 group-open:-top-[11px] group-open:border-none"></span>
            </button>
            <nav id="mainMenu" class="peer-open:border-t peer-open:border-gray-800 hidden absolute top-[100%] left-0 lg:static bg-primaryAlt w-full lg:w-[fit-content] lg:block ms-auto z-50 bg-white">
                <ul class="text-center py-5 lg:py-0 lg:text-left lg:flex lg:gap-10 text-lg text-black font-medium">
                    <li class="nav-item hover:text-primary"><a href="#">Home</a></li>
                    <li class="nav-item hover:text-primary mt-2 lg:mt-0"><a href="#">Over ons</a></li>
                    <li class="nav-item hover:text-primary mt-2 lg:mt-0"><a href="#">Onze verzekering</a></li>
                    <li class="nav-item hover:text-primary mt-2 lg:mt-0"><a href="#">Blog</a></li>
                    <li class="nav-item hover:text-primary mt-2 lg:mt-0"><a href="#">Contact</a></li>
                </ul>

                <div class="flex flex-col lg:hidden px-4 pb-4 gap-4">
                    <a href="#" class="btn-secondary w-full text-center">
                        Verzekeringsofferte
                    </a>
                </div>
            </nav>

            <div class="hidden lg:flex ms-6 gap-4">
                <a href="#" class="btn-secondary ms-3">
                    Verzekeringsofferte
                </a>
            </div>
        </div>
    </div>
</header>