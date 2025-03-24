<div {{ $attributes->merge(['class' => 'mt-4 p-4 bg-green-100 border border-green-300 text-green-800 rounded-lg shadow-md flex items-center']) }}>
    <!-- Icon -->
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-3 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
    </svg>

    <span>{{ $slot }}</span>
</div>



<?php 
/*
<x-success>
    This is an informational message.
</x-success>
*/
?> 