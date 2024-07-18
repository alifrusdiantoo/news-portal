@props(['active' => false])

<a class="{{ $active ? 'text-blue-700 bg-white': 'text-white hover:bg-white hover:text-blue-700' }} rounded-md  px-3 py-2 text-sm font-medium"
    aria-current="{{ $active ? 'page' : false }}" {{ $attributes }}>
    {{ $slot }}
</a>