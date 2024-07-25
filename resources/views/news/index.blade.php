<x-layout>
    <article class="py-2 pb-10 min-w-full flex flex-nowrap gap-6">
        <figure class="basis-1/2">
            <img class="object-cover object-top max-h-80 min-w-full rounded-md"
                src="{{ asset('storage/' . $highlight->img) }}"
                alt="">
        </figure>
        <aside class="basis-1/2">
            <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900 line-clamp-2">
                {{ $highlight['title'] }}
            </h2>
            <div class="text-base text-gray-500">
                <a href="/authors/{{ $highlight->author->username }}" class="hover:underline">{{ $highlight->author->name }}</a> | {{ $highlight['created_at']->format('d F Y') }}
            </div>
            <p class="my-6 font-light leading-7">
                {{ Str::limit(strip_tags($highlight['content']), 360) }}
            </p>
            <a href="/news/{{ $highlight['slug'] }}" class="font-medium text-blue-500 hover:underline ">Read More</a>
        </aside>
    </article>

    <x-search-bar></x-search-bar>

    <h2 class="text-xl font-bold text-blue-500">Latest News</h2>
    <section class="my-4 mb-4 grid grid-cols-4 gap-5">
        @foreach ($articles as $article)
        <article class="py-2 min-h-20 shadow-md">
            <a href="news/{{ $article['slug'] }}">
                <figure class="basis-1/2">
                    <img class="object-cover object-top max-h-96 min-w-full rounded-md" src="{{ asset('storage/' . $article->img) }}"
                        alt="">
                </figure>
                <main class="flex flex-col p-3">
                    <h3 class="mb-1 text-lg tracking-tight font-bold text-gray-900 line-clamp-2">
                        {{ $article['title'] }}
                    </h3>

                    <div class="mb-2 text-sm text-gray-500">
                        <a href="/authors/{{ $article->author->username }}" class="hover:underline">{{ Str::words($article->author->name, 2, '') }}</a> &centerdot; {{ $article['created_at']->diffForHumans() }}
                    </div>

                    <p class="mb-4 font-light line-clamp-3">
                        {{ Str::limit(strip_tags($article['content']), 120) }}
                    </p>

                    <a href="/categories/{{ $article->category->slug }}" class="font-medium text-blue-500 hover:underline">{{ $article->category->name }}</a>
                </main>
            </a>
        </article>
        @endforeach
    </section>

    {{ $articles->links() }}
</x-layout>