<div {{ $attributes->merge(['class' => 'mt-4 p-4 bg-gray-100 border border-gray-300 text-gray-800 rounded-lg shadow-md flex items-center']) }}>
    <!-- Alert Icon -->
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-3 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 9h6M9 13h6M10 17h4M10 5h4"></path>
    </svg>
    <span>{{ $slot }}</span>
</div>

<?php 
/*
<x-alert-box>
This is an alert message.
</x-alert-box>
*/
?>