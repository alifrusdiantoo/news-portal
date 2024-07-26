<x-layout>
    <section class="mx-4 bg-white">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Edit Profile</h2>
            <form action="/profile/{{ $user->username }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2 flex justify-center items-center text-center">
                        <div class="image-upload">
                            <input type="hidden" name="oldImage" value="{{ $user->img }}"/>
                            
                            <label for="file-input">
                                @if($user->img)
                                    <img id="preview" class="rounded-full border-2 size-40 object-cover object-center" src="{{ asset('storage/' . $user->img) }}" alt="{{ $user->name . ' Avatar' }}"/>
                                @else
                                    <img id="preview" class="rounded-full border-2 size-40 object-cover object-center" src="https://via.placeholder.com/150" alt="{{ $user->name }} . ' Avatar'"/>
                                @endif

                                <span class="text-sm">Click to change image</span>

                                @error('img')
                                    <p class="mt-2 text-xs text-red-600 dark:text-red-500">* {{ $message }}</p>
                                @enderror
                            </label>
                            <input id="file-input" name="img" value="" class="hidden" type="file" accept="image/*" onchange="loadFile(event)"/>
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type your name" required="" value="{{ old('name', $user->name) }}">
                        @error('name')
                            <p class="mt-2 text-xs text-red-600 dark:text-red-500">* {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full">
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                        <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Choose your username" required="" value="{{ old('username', $user->username) }}">
                        @error('username')
                            <p class="mt-2 text-xs text-red-600 dark:text-red-500">* {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type your email" required="" value="{{ old('email', $user->email) }}" >
                        @error('email')
                            <p class="mt-2 text-xs text-red-600 dark:text-red-500">* {{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Edit Profile
                </button>
            </form>
        </div>
      </section>

    <script>
        function loadFile(event) {
            const preview = document.getElementById('preview');
            preview.src = URL.createObjectURL(event.target.files[0]);
            preview.onload = () => URL.revokeObjectURL(preview.src); // Free up memory
        }
    </script>
</x-layout>