<x-header></x-header>
    <div class="min-h-full">
        @if(!request()->is('login'))
            @include('components.navbar', ['categories' => $categories])
        @endif

        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>
    </div>
<x-footer></x-footer>