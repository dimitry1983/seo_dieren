<div class="head bg-[#202428]">
  <div class="container mx-auto px-3">
    <!-- For mobile: flex-col and text-center; for md+: flex-row and text-left -->
    <div class="flex flex-col md:flex-row py-2 text-center md:text-left">
      <!-- New flex container to keep location and phone number on the same line -->
      <div class="flex items-center justify-center md:justify-start space-x-2 w-full md:w-auto">
        <p class="location text-xs text-white flex items-center mb-0">
          <i class="fa-solid fa-location-dot text-primary mr-1"></i> 9999 BP Amsterdam, Netherlands
        </p>
        <a class="text-xs text-white flex items-center mb-0" href="#">
          <i class="fa-solid fa-phone text-primary mr-1"></i> +1800 956 687
        </a>
      </div>
      <!-- This menu is hidden on mobile (md:flex hidden) so it remains hidden -->
      <ul class="mb-0 mt-2 md:mt-0 md:ml-auto md:flex hidden md:text-sm">
        <li class="mb-0 text-white"><a href="#">About</a></li>
        <li class="mb-0 text-white ml-2 border-l border-l-white">
            <a class="pl-[10px]" href="#">Contact</a>
        </li>
        <li class="mb-0 text-white ml-2 border-l border-l-white">
            <a class="pl-[10px]" href="#">My Account</a>
        </li>
    </ul>
    </div>
  </div>
</div>
