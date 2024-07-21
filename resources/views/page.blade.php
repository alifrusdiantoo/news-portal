<x-layout>
    <x-search-bar></x-search-bar>
    <h2 class="text-xl font-bold text-blue-500">{{ $title }}</h2>
    <section class="my-4 mb-4 grid grid-cols-4 gap-5">
        @forelse ($articles as $article)
        <article class="py-2 min-h-20 shadow-md">
            <a href="/news/{{ $article['slug'] }}">
                <figure class="mb-4 basis-1/2">
                    <img class="object-cover object-top max-h-96 min-w-full rounded-md" src="{{ $article['img'] }}"
                        alt="">
                </figure>
                <main class="flex flex-col p-4">
                    <h3 class="mb-1 text-lg tracking-tight font-bold text-gray-900 line-clamp-2">
                        {{ $article['title'] }}
                    </h3>

                    <div class="mb-2 text-sm text-gray-500">
                        <a href="/authors/{{ $article->author->username }}" class="hover:underline">{{ Str::words($article->author->name, 2, '') }}</a> &centerdot; {{ $article['created_at']->diffForHumans() }}
                    </div>

                    <p class="mb-4 font-light">
                        {{ Str::limit($article['content'], 120) }}
                    </p>

                    <a href="/categories/{{ $article->category->slug }}" class="font-medium text-blue-500 hover:underline">{{ $article->category->name }}</a>
                </main>
            </a>
        </article>
        @empty
        <p class="font-semibold text-xl my-4">Article not found</p>
        @endforelse
    </section>

    {{ $articles->links() }}

</x-layout>