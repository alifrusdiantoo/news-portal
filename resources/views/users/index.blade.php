<x-layout>
    <section class="my-8 flex items-center justify-center min-h-screen">
        <div class="bg-white rounded-lg w-full">
            <div class="flex items-center justify-center">
                <img src="{{ asset('storage/' . $user->img) }}" alt="Profile Picture" class="w-32 h-32 rounded-full border-2 border-gray-300">
            </div>
            <div class="text-center mt-4">
                <h2 class="text-2xl font-semibold">{{ $user->name }}</h2>
                <p class="text-gray-600">{{ $user->username }}</p>
                <p class="text-gray-600">{{ $user->email }}</p>
            </div>
            @auth
                @if(auth()->user()->id === $user->id)
                    <div class="mt-6 flex justify-center space-x-4">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            <a href="/profile/{{ $user->username }}/edit">Edit Profile</a>
                        </button>
                    </div>
                @endif
            @endauth
    
            <div class="mt-16">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    @forelse($user->articlesPosted as $article)
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
                    @empty
                    <p class="col-span-4">
                        Belum ada artikel
                    </p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
</x-layout>