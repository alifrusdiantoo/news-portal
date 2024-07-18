<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <article class="py-2 pb-10 min-w-full flex flex-nowrap gap-6">
        <figure class="basis-1/2">
            <img class="object-cover object-top max-h-80 min-w-full rounded-md"
                src="https://akcdn.detik.net.id/community/media/visual/2024/07/16/enzo-fernandez-chelsea-timnas-argentina-copa-america-2024.jpeg?w=700&q=90"
                alt="">
        </figure>
        <aside class="basis-1/2">
            <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">
                Pernyataan Resmi Chelsea soal Kasus Rasis Enzo ke Skuad Perancis
            </h2>
            <div class="text-base text-gray-500">
                <a href="#">Fabrizio Romano</a> | 18 Juli 2024
            </div>
            <p class="my-6 font-light leading-7">
                Chelsea membuat pernyataan resmi seusai gelandangnya melakukan aksi rasisme ke skuad Perancis saat
                bersama
                timnas Argentina. Argentina berhasil menjuarai Copa America 2024 setelah mengalahkan Kolombia dengan
                skor
                1-0 di Stadion Hard Rock padda Senin (15/7/2024). Setelah itu, gelandang Argentina, Enzo Fernandez,
                melakukan....
            </p>
            <a href="#" class="font-medium text-blue-500 hover:underline ">Read More</a>
        </aside>
    </article>

    <h2 class="text-xl font-bold text-blue-500">Latest News</h2>
    <section class="grid grid-cols-4 gap-5">
        @foreach ($articles as $article)
        <article class="py-2">
            <a href="news/{{ $article['slug'] }}">
                <figure class="mb-4 basis-1/2">
                    <img class="object-cover object-top max-h-96 min-w-full rounded-md" src="{{ $article['img'] }}"
                        alt="">
                </figure>
                <main class="basis-1/2">
                    <h3 class="mb-1 text-lg tracking-tight font-bold text-gray-900">
                        {{ Str::limit($article['title'], 60) }}
                    </h3>

                    <div class="mb-2 text-sm text-gray-500">
                        <a href="#">{{ $article['author'] }}</a> &centerdot; {{ $article['date'] }}
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