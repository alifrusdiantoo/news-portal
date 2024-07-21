@props(['active' => false])

<a class="text-white hover:underline rounded-md  px-3 py-2 text-sm"
    aria-current="{{ $active ? 'page' : false }}" {{ $attributes }}>
    {{ $slot }}
</a>