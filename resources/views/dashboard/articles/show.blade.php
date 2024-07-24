<x-dashboard>
    <a href="/dashboard/articles" class="text-blue-700">&larr; Back</a>
    <article class="py-5 col-span-8 mx-36">
        <header class="flex flex-col gap-5">
            <figure class="mb-4">
                <img class="object-cover object-top max-h-60 min-w-full rounded-md" src="{{ $article['img'] }}" alt="">
            </figure>
            <aside class="">
                <a href="/categories/{{ $article->category->slug }}" class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">{{ $article->category->name }}</a>
                <h3 class="my-2 mb-1 text-4xl tracking-tight font-bold text-gray-900">
                    {{ $article['title'] }}
                </h3>

                <div class="mb-2 text-sm text-gray-500">
                    <!-- /authors/{{ $article->author->id }} -->
                    <a href="/authors" class="hover:underline">{{ $article->author->name }}</a> &centerdot; {{ $article['created_at']->format('d F Y') }}
                </div>


            </aside>
        </header>

        <main class="mb-4 font-light">
            <div class="prose">
                {!! $article['content'] !!}
            </div>
        </main>
    </article>
</x-dashboard>