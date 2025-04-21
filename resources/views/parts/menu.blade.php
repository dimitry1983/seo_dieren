<div class="py-4">
    <div class="container px-4 mx-auto flex justify-center items-center">
        <a href="{{route('home')}}" class="castoro text-2xl lg:text-3xl text-white">
            <img class="max-w-[280px]  sm:max-w-[280px] md:max-w-[310px]" src="{{ asset('dieren/src/public/img/logo.png')}}" alt="">
        </a>

        <button id="toggleBtn" class="group peer lg:hidden ml-auto bg-primary text-white peer-open:mt-10 px-3 py-3 ">
            <span class="top-0 block bg-white w-7 h-[2px]  transition origin-top-center relative group-open:rotate-45 group-open:top-[11px] group-open:border-none"></span>
            <span class="block mt-2 bg-white w-7 h-[2px] transition duration-300 group-open:opacity-0"></span>
            <span class="top-0 block mt-2 bg-white w-7 h-[2px] transition origin-top-center relative group-open:-rotate-45 group-open:-top-[10px] group-open:border-none"></span>
        </button>
        <nav id="mainMenu" class="peer-open:border-t peer-open:border-gray-800 hidden absolute top-[100%] left-0 lg:static bg-primaryAlt w-full lg:w-[fit-content] lg:block mx-auto z-50 bg-white">
            <ul class="text-center py-5 lg:py-0 lg:text-left lg:flex lg:space-x-8 text-lg text-black font-medium">
                <li class="nav-item hover:text-primary"><a href="{{route('home')}}">Home</a></li>
                <li class="nav-item hover:text-primary mt-2 lg:mt-0"><a href="{{route('map')}}">Overzicht</a></li>
                <li class="nav-item hover:text-primary mt-2 lg:mt-0"><a href="{{route('blog.overview')}}">Blog & Nieuws</a></li>
            </ul>

            <div class="flex flex-col lg:hidden px-4 pb-4 gap-4">
                <a href="{{route('register')}}" class="btn-secondary w-full text-center">
                {{ devTranslate('page.Add Your Clinic','Kliniek toevoegen') }} <i class="fa-solid fa-circle-plus"></i>
                </a>
            </div>
        </nav>

        <div class="hidden lg:flex ms-6 gap-4">
            <a href="{{route('register')}}" class="btn-secondary flex justify-center items-center" style="padding-top:8px!important; padding-bottom:8px!important;">
                {{ devTranslate('page.Add Your Clinic','Kliniek toevoegen') }} <i class="fa-solid fa-circle-plus ml-4 text-4xl"></i>
            </a>
        </div>
    </div>
</div>