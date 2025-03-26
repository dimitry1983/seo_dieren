<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="main-container flex relative">
        @include('parts.company.sidebar', ['active' => $active ?? ""])
        <div class="main-content flex-1 px-5 py-10 lg:p-16 max-w-[100%]">
            <div class="border border-solid border-[#CFD7E4] rounded-[15px] px-5 py-6 xl:px-16 xl:py-9">

                <div class="flex items-center mb-5 lg:mb-10">
                    <figure class="block relative w-[50px] h-[50px] min-w-[50px] lg:w-[70px] lg:h-[70px] rounded-full overflow-hidden border-2 border-solid border-[#d1d1d1] group-hover:border-primary duration-300 me-4"><img class="abs-cover" src="{{ asset('dieren-dashboard/src/public/img/user.jpg')}}" alt=""></figure>
                    <div>
                        <h2 class="font-medium text-xl lg:text-2xl text-[#271F30] mb-1">{{__('Hallo') }}  {{ Auth::user()->name }}!</h2>
                        <p class="text-[#888888] mb-0">{{devTranslate('dashboard_company.Bekijk hieronder de laatste ontwikkelingen op jouw bedrijfspagina','Bekijk hieronder de laatste ontwikkelingen op jouw bedrijfspagina')}}</p>
                    </div>
                </div>

             

                <div class="panel-white bg-white py-4 px-5 lg:p-9 rounded-[8px]">
                    

                    <div class="pane-white__table h-[42vh] overflow-auto">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
