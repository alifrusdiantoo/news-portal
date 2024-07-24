<x-layout>
    <article class="py-2 col-span-8">
        <header class="flex gap-5">
            <figure class="mb-4 basis-1/2">
                <img class="object-cover object-top max-h-60 min-w-full rounded-md" src="{{ $article['img'] }}" alt="">
            </figure>
            <aside class="basis-1/2">
                <h3 class="mb-1 text-4xl tracking-tight font-bold text-gray-900">
                    {{ $article['title'] }}
                </h3>

                <div class="mb-2 text-sm text-gray-500">
                    <!-- /authors/{{ $article->author->id }} -->
                    <a href="/authors" class="hover:underline">{{ $article->author->name }}</a> &centerdot; {{ $article['created_at']->format('d F Y') }}
                </div>

                <a href="/categories/{{ $article->category->slug }}" class="font-medium text-blue-500 hover:underline">{{ $article->category->name }}</a>

            </aside>
        </header>

        <main class="basis-1/2">
            <p class="mb-4 font-light">
                {{ $article['content']}}
            </p>
        </main>
    </article>
</x-layout>