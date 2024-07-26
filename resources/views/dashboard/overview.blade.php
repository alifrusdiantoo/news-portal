<x-dashboard>
    <section class="mx-4 p-8 bg-white min-h-screen rounded-md">
        <h1 class="text-2xl">Hello, <span class="font-bold">{{ auth()->user()->name }}</span>!</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
            <div class="bg-gradient-to-r from-sky-400 to-blue-500 shadow-md rounded-lg p-6 text-white">
                <h2 class="text-lg font-semibold">Articles</h2>
                <p class="text-2xl font-bold">{{ $articleCount }}</p>
            </div>

            <div class="bg-gradient-to-r from-sky-400 to-blue-500 shadow-md rounded-lg p-6 text-white">
                <h2 class="text-lg font-semibold">Authors</h2>
                <p class="text-2xl font-bold">{{ $authorCount }}</p>
            </div>

            <div class="bg-gradient-to-r from-sky-400 to-blue-500 shadow-md rounded-lg p-6 text-white">
                <h2 class="text-lg font-semibold">Categories</h2>
                <p class="text-2xl font-bold">{{ $categoryCount }}</p>
            </div>
        </div>
    </section>
</x-dashboard>
