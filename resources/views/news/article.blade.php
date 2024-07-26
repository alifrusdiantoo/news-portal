<x-layout>
    <article class="py-2 col-span-8 max-w-screen-lg mx-auto">
        <header class="mb-8">
            <figure class="mb-4">
                <img class="object-cover object-top max-h-96 min-w-full rounded-md" src="{{ asset('storage/' . $article->img) }}" alt="">
            </figure>
            <a href="/categories/{{ $article->category->slug }}" class="font-medium text-blue-500 hover:underline">{{ $article->category->name }}</a>
            <h1 class="mb-1 text-4xl tracking-tight font-bold text-gray-900">
                {{ $article['title'] }}
            </h1>

            <div class="mb-2 text-sm text-gray-500">
                <!-- /authors/{{ $article->author->id }} -->
                <a href="/profile/{{ $article->author->username }}" class="hover:underline">{{ $article->author->name }}</a> &centerdot; {{ $article['created_at']->format('d F Y') }}
            </div>
        </header>

        <main class="">
            <div class="mb-4 font-light prose max-w-fit">
                {!! $article['content'] !!}
            </div>
        </main>
    </article>
</x-layout>