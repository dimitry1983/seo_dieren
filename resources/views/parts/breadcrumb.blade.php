@if (isset($breadcrumbs['total']) && $breadcrumbs['total'] === 1)
    <div class="flex items-center space-x-2 flex-wrap mb-5">
        <span class="text-base text-[#009999]">{{ devTranslate('breadcrumb.U bevindt zich hier:', 'U bevindt zich hier:') }}</span>
        <ul class="flex items-center space-x-2 flex-wrap">
            <li><a href="/" class="text-base text-[#009999]">Home</a></li>

            <span class="text-base text-[#009999]">/</span>
            <li class="text-base text-[#000]"> {!!$breadcrumbData['name']!!} </li>
        </ul>
    </div>
@elseif (isset($breadcrumbs['total']) && $breadcrumbs['total'] ?? 0 === 2)
    <div class="flex items-center space-x-2 flex-wrap mb-5">
        <span class="text-base text-[#009999]">{{ devTranslate('breadcrumb.U bevindt zich hier:', 'U bevindt zich hier:') }}</span>
        <ul class="flex items-center space-x-2 flex-wrap">
            <li><a href="/" class="text-base text-[#009999]">Home</a></li>

            <span class="text-base text-[#009999]">/</span>

            <li><a href="{{$breadcrumbData['url_one']}}" class="text-base text-[#009999]"> {!! $breadcrumbData['name_one'] !!}</a></li>

            <span class="text-base text-[#009999]">/</span>

            <li class="text-base text-[#000]">{!! $breadcrumbData['name_two']!!}</li>
        </ul>
    </div>
@endif