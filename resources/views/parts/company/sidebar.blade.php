<div id="sideContent" class="side-content bg-white w-[232px] min-h-[calc(100vh-92px)] flex flex-col pb-5 pt-16 text-lg duration-300 h-[calc(100vh-92px)] absolute z-50 lg:static lg:h-auto">
    <ul class="">
        <li>
            <a href="{{route('company.dashboard')}}" 
                @class([
                    'flex items-center px-6 py-3 duration-300',
                    'relative text-[#271F30] bg-[#F7F8FA] before:content-[""] before:bg-primary before:w-[4px] before:h-full before:absolute before:left-0 before:rounded' => $active === 'dashboard',
                    'group text-[#ADB5C3] hover:text-[#271F30]' => $active !== 'dashboard',
                ])>
                    <i @class([
                            'fa-solid fa-objects-column text-xl w-[20px] me-2 duration-300',
                            'text-primary' => $active === 'dashboard',
                            'group-hover:text-primary' => $active !== 'dashboard',
                        ])></i>
               <span> {{devTranslate('menu_company.Dashboard','Dashboard')}}</span>
            </a>
        </li>
        <li> 
            <a href="{{route('company.company-info')}}"
                @class([
                    'flex items-center px-6 py-3 duration-300',
                    'relative text-[#271F30] bg-[#F7F8FA] before:content-[""] before:bg-primary before:w-[4px] before:h-full before:absolute before:left-0 before:rounded' => $active === 'company-information',
                    'group text-[#ADB5C3] hover:text-[#271F30]' => $active !== 'company-information',
                ])>
                    <i @class([
                            'fa-solid fa-square-info text-xl w-[20px] me-2 duration-300',
                            'text-primary' => $active === 'company-information',
                            'group-hover:text-primary' => $active !== 'company-information',
                        ])></i>
              <span>{{ devTranslate("menu_company.Bedrijfsinformatie", "Bedrijfsinformatie") }}</span></a>
        </li>
    
        <li  x-data="{ open: false }">
            <a href="{{route('company.company-media')}}"  @class([
                    'flex items-center px-6 py-3 duration-300',
                    'relative text-[#271F30] bg-[#F7F8FA] before:content-[""] before:bg-primary before:w-[4px] before:h-full before:absolute before:left-0 before:rounded' => $active === 'media',
                    'group text-[#ADB5C3] hover:text-[#271F30]' => $active !== 'media',
                ])>
                    <i @class([
                            'fa-solid fa-images  text-xl w-[20px] me-2 duration-300',
                            'text-primary' => $active === 'media',
                            'group-hover:text-primary' => $active !== 'media',
                        ])></i><span>{{devTranslate('menu_company.Media','Media')}}</span>  </a>

        </li>
        <li><a href="{{route('company.openingstime')}}"
                @class([
                    'flex items-center px-6 py-3 duration-300',
                    'relative text-[#271F30] bg-[#F7F8FA] before:content-[""] before:bg-primary before:w-[4px] before:h-full before:absolute before:left-0 before:rounded' => $active === 'times',
                    'group text-[#ADB5C3] hover:text-[#271F30]' => $active !== 'times',
                ])>
                <i @class([
                        'fa-solid fa-clock-two text-xl w-[20px] me-2 duration-300',
                        'text-primary' => $active === 'times',
                        'group-hover:text-primary' => $active !== 'times',
                    ])></i>
                <span>{{devTranslate('menu_company.Openingstijden','Openingstijden')}}</span></a>
        </li>
        <li><a href="{{route('company.company-pricing')}}" 
                @class([
                    'flex items-center px-6 py-3 duration-300',
                    'relative text-[#271F30] bg-[#F7F8FA] before:content-[""] before:bg-primary before:w-[4px] before:h-full before:absolute before:left-0 before:rounded' => $active === 'prices',
                    'group text-[#ADB5C3] hover:text-[#271F30]' => $active !== 'prices',
                ])>
                <i @class([
                        'fa-solid fa-euro-sign text-xl w-[20px] me-2 duration-300',
                        'text-primary' => $active === 'prices',
                        'group-hover:text-primary' => $active !== 'prices',
                    ])></i>
        <span>{{devTranslate('menu_company.Prijzen','Prijzen')}}</span></a></li>
        <li><a href="{{route('company.company-reviews')}}" 
            @class([
                'flex items-center px-6 py-3 duration-300',
                'relative text-[#271F30] bg-[#F7F8FA] before:content-[""] before:bg-primary before:w-[4px] before:h-full before:absolute before:left-0 before:rounded' => $active === 'reviews',
                'group text-[#ADB5C3] hover:text-[#271F30]' => $active !== 'reviews',
            ])>
            <i @class([
                    'fa-regular fa-star-sharp-half-stroke text-xl w-[20px] me-2 duration-300',
                    'text-primary' => $active === 'reviews',
                    'group-hover:text-primary' => $active !== 'reviews',
                ])></i>
        <span>{{devTranslate('menu_company.Reviews','Reviews')}}</span> </a></li>
        <li><a href="{{route('company.company-blogs')}}" 
            @class([
                'flex items-center px-6 py-3 duration-300',
                'relative text-[#271F30] bg-[#F7F8FA] before:content-[""] before:bg-primary before:w-[4px] before:h-full before:absolute before:left-0 before:rounded' => $active === 'blogs',
                'group text-[#ADB5C3] hover:text-[#271F30]' => $active !== 'blogs',
            ])>
            <i @class([
                    'fa-solid fa-file-pen text-xl w-[20px] me-2 duration-300',
                    'text-primary' => $active === 'blogs',
                    'group-hover:text-primary' => $active !== 'blogs',
                ])></i>
        <span>{{devTranslate('menu_company.Nieuws','Nieuws')}}</span> </a></li>
    </ul>

    <ul class="mt-auto">
        <li><a href="#" class="group flex items-center px-6 py-3 text-[#ADB5C3] duration-300 hover:text-[#271F30]"><i class="fa-solid fa-circle-question text-xl w-[20px] me-2 duration-300 group-hover:text-primary"></i> <span>{{devTranslate('menu_company.Hulp nodig?','Hulp nodig?')}}</span></a></li>
    </ul>
</div>