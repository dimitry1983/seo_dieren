@props([
    'title',
    'description',
])

<div class="flex w-full flex-col gap-2 text-center">
    <h1 class="text-xl font-medium text-white">{{ $title }}</h1>
    <p class="text-center text-sm text-white">{{ $description }}</p>
</div>
