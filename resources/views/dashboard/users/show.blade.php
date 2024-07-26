<x-dashboard>
    <section class="mx-4 bg-white ">
        <div class="py-8 px-4 mx-auto">
            <div class="flex items-center justify-center">
                @if($user->img)
                    <img src="{{ asset('storage/' . $user->img) }}" alt="Profile Picture" class="w-32 h-32 rounded-full border-2 border-gray-300">
                @else
                    <img src="https://via.placeholder.com/150" alt="Profile Picture" class="w-32 h-32 rounded-full border-2 border-gray-300">
                @endif
            </div>
            <div class="text-center mt-4">
                <h2 class="text-2xl font-semibold">{{ $user->name }}</h2>
                <p class="text-gray-600">{{ $user->username }}</p>
                <p class="text-gray-600">{{ $user->email }}</p>
            </div>
            @auth
            <div class="mt-6 flex justify-center space-x-4">
                <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Edit Profile</button>
            </div>
            @endauth
    
            <div class="mt-20 mx-6">
                <h3 class="text-xl font-semibold mb-10 text-center">Articles by {{ $user->name }}</h3>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    @foreach($user->articlesPosted as $article)
                    <article class="py-2 min-h-20 shadow-md">
                        <a href="/news/{{ $article['slug'] }}">
                            <figure class="basis-1/2">
                                <img class="object-cover object-top max-h-40 min-w-full rounded-md" src="{{ asset('storage/' . $article->img) }}"
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
                </div>
            </div>
        </div>
    </section>
</x-dashboard>