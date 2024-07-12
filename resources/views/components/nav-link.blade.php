@props(['active'=>false])

<a class="{{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}"
   aria-current="{{ request()->is('/') ? 'page' : 'false' }}"
    {{ $attributes }}
>{{ $slot }}</a>