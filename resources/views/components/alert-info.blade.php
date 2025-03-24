<div {{ $attributes->merge(['class' => 'mt-4 p-4 bg-blue-100 border border-blue-300 text-blue-800 rounded-lg shadow-md flex items-center']) }}>
    <!-- Information Icon -->
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2">
    <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
    </svg>

    <span>{{ $slot }}</span>
</div>

<?php 
/*
<x-alert-info>
    This is an informational message.
</x-alert-info>
*/
?> 