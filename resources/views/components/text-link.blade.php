<a
    {{ $attributes->merge(['class' => 'underline mb-2 -mt-3 text-sm block decoration-neutral-400 underline-offset-2 duration-300 ease-out hover:decoration-neutral-700 text-neutral-900 dark:text-neutral-200 dark:hover:decoration-neutral-100']) }}
    wire:navigate
>
    {{ $slot }}
</a>
  