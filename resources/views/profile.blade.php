<x-layout>
    <section class="flex items-center justify-center min-h-screen">
        <div class="bg-white rounded-lg w-full max-w-3xl">
            <div class="flex items-center justify-center">
                <img src="https://via.placeholder.com/150" alt="Profile Picture" class="w-32 h-32 rounded-full border-2 border-gray-300">
            </div>
            <div class="text-center mt-4">
                <h2 class="text-2xl font-semibold">John Doe</h2>
                <p class="text-gray-600">@johndoe</p>
                <p class="text-gray-600">johndoe@example.com</p>
            </div>
            @auth
            <div class="mt-6 flex justify-center space-x-4">
                <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Edit Profile</button>
                <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Change Password</button>
            </div>
            @endauth
    
            <div class="mt-8">
                <h3 class="text-xl font-semibold mb-4">Articles by @auth You @else John Doe @endauth</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Card 1 -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h4 class="text-lg font-semibold">Article Title 1</h4>
                        <p class="text-gray-600 mt-2">A brief description of the first article goes here. It should be concise and engaging.</p>
                        <a href="#" class="text-blue-500 mt-4 block">Read more...</a>
                    </div>
                    <!-- Card 2 -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h4 class="text-lg font-semibold">Article Title 2</h4>
                        <p class="text-gray-600 mt-2">A brief description of the second article goes here. It should be concise and engaging.</p>
                        <a href="#" class="text-blue-500 mt-4 block">Read more...</a>
                    </div>
                    <!-- Add more cards as needed -->
                </div>
            </div>
        </div>
    </section>
</x-layout>