<div class="head bg-[#202428]">
  <div class="container mx-auto px-3">
    <div class="flex flex-col md:flex-row py-2 text-center md:text-left">
      <div class="flex items-center justify-center md:justify-start space-x-2 w-full md:w-auto">
        <p class="location text-xs text-white flex items-center mb-0 mr-4">
          
        </p>
        <a class="text-xs text-white flex items-center mb-0" href="#">
          
        </a>
      </div>
      <ul class="mb-0 mt-2 md:mt-0 md:ml-auto md:flex hidden md:text-sm">
        <li class="mb-0 text-white"><a href="{{route('about')}}">Over ons</a></li>
        <li class="mb-0 text-white ml-2 border-l border-l-white">
            <a class="pl-[10px]" href="{{route('contact')}}">Contact</a>
        </li>
        <li class="mb-0 text-white ml-2 border-l border-l-white">
          @guest
              <a class="pl-[10px]" href="{{ route('login') }}">Mijn Account</a>
          @else
              <a class="pl-[10px]" href="{{ route('company.dashboard') }}">Mijn Account</a>
          @endguest
        </li>
    </ul>
    </div>
  </div>
</div>
