<a href="{{ $url }}" {{ $attributes->merge(['class' => "inline-flex items-center justify-center whitespace-nowrap px-4
    py-2 $color border-2 border-black rounded-md font-medium text-sm focus-visible:outline-none focus-visible:ring-1
    focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 tracking-widest transition
    ease-in-out duration-150 shadow-custom"]) }}>
    {{ $slot }}
</a>