
@if (isset($breadcrumbs['total']) && $breadcrumbs['total'] === 1)
<div class="flex items-center space-x-2 flex-wrap mb-2">
    <ul class="flex items-center space-x-2 flex-wrap">
        <li><a href="{{route('company.dashboard')}}" class="text-base text-primary"><strong>Dashboard</strong></a></li>

        <span class="text-base">/</span>
        <li class="text-base text-[#000]"> {!!$breadcrumbData['name']!!} </li>
    </ul>
</div>
@elseif (isset($breadcrumbs['total']) && $breadcrumbs['total'] ?? 0 === 2)
<div class="flex items-center space-x-2 flex-wrap mb-2">
    <ul class="flex items-center space-x-2 flex-wrap">
        <li><a href="{{route('company.dashboard')}}" class="text-base text-primary">Dashboard</a></li>

        <span class="text-base text-[#FD7CB4]">/</span>

        <li><a href="{{$breadcrumbData['url_one']}}" class="text-base text-primary"> {!! $breadcrumbData['name_one'] !!}</a></li>

        <span class="text-base text-[#FD7CB4]">/</span>

        <li class="text-base text-[#000]">{!! $breadcrumbData['name_two']!!}</li>
    </ul>
</div>
@endif