<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <article class="py-2 pb-10 min-w-full flex flex-nowrap gap-6">
        <figure class="basis-1/2">
            <img class="object-cover object-top max-h-80 min-w-full rounded-md"
                src="{{ $highlight['img'] }}"
                alt="">
        </figure>
        <aside class="basis-1/2">
            <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900 line-clamp-2">
                {{ $highlight['title'] }}
            </h2>
            <div class="text-base text-gray-500">
                <a href="/authors/{{ $highlight->author->id }}" class="hover:underline">{{ $highlight->author->name }}</a> | {{ $highlight['created_at']->format('d F Y') }}
            </div>
            <p class="my-6 font-light leading-7">
                {{ Str::limit($highlight['text'], 360) }}
            </p>
            <a href="news/{{ $highlight['slug'] }}" class="font-medium text-blue-500 hover:underline ">Read More</a>
        </aside>
    </article>

    <h2 class="text-xl font-bold text-blue-500">Latest News</h2>
    <section class="grid grid-cols-4 gap-5">
        @foreach ($articles as $article)
        <article class="py-2 min-h-20">
            <a href="news/{{ $article['slug'] }}">
                <figure class="mb-4 basis-1/2">
                    <img class="object-cover object-top max-h-96 min-w-full rounded-md" src="{{ $article['img'] }}"
                        alt="">
                </figure>
                <main class="flex flex-col">
                    <h3 class="mb-1 text-lg tracking-tight font-bold text-gray-900 line-clamp-2">
                        {{ $article['title'] }}
                    </h3>

                    <div class="mb-2 text-sm text-gray-500">
                        <a href="/authors/{{ $article->author->id }}" class="hover:underline">{{ Str::words($article->author->name, 2, '') }}</a> &centerdot; {{ $article['created_at']->diffForHumans() }}
                    </div>

                    <p class="mb-4 font-light">
                        {{ Str::limit($article['text'], 120) }}
                    </p>

                    <a href="#" class="font-medium text-blue-500 hover:underline">{{ $article['tag'] }}</a>
                </main>
            </a>
        </article>
        @endforeach
    </section>
</x-layout>