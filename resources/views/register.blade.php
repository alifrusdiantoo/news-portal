<x-header>{{ $title }}</x-header>
    <section>
        <div class="flex flex-col items-center justify-center md:h-screen lg:py-0">
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Sign Up
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="/register" method="post">
                        @csrf
                        <div>
                            <label for="name" class="flex justify-between mb-2 text-sm font-medium text-gray-900 dark:text-white ">
                                <span>Name</span>
                                @error('name')
                                <span class="text-xs text-red-500">* {{ $message }}</span>
                                @enderror
                            </label>
                            <input type="name" name="name" id="name" value="{{ old('name') }}" class="bg-gray-50 border border-gray-300 @error('name') border-red-500 @enderror text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John Doe" required="">
                        </div>
                        <div>
                            <label for="username" class="flex justify-between mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                <span>Username</span>
                                @error('username')
                                <span class="text-xs text-red-500">* {{ $message }}</span>
                                @enderror
                            </label>
                            <input type="username" name="username" id="username" value="{{ old('username') }}" class="bg-gray-50 border border-gray-300 @error('username') border-red-500 @enderror text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="johdoe243" required="">
                        </div>
                        <div>
                            <label for="email" class="flex justify-between mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                <span>Email</span>
                                @error('email')
                                <span class="text-xs text-red-500">* {{ $message }}</span>
                                @enderror
                            </label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" class="bg-gray-50 border border-gray-300 @error('email') border-red-500 @enderror text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                        </div>
                        <div>
                            <label for="password" class="flex justify-between mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                <span>Password</span>
                                @error('password')
                                <span class="text-xs text-red-500">*{{ $message }}</span>
                                @enderror
                            </label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 @error('password') border-red-500 @enderror text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        </div>
                        <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign Up</button>
                        <p class="text-sm text-center font-light text-gray-500 dark:text-gray-400">
                            Have an account? <a href="/login" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign In</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
<x-footer></x-footer>