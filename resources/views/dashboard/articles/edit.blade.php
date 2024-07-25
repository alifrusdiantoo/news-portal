<x-dashboard>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Edit article</h2>
            <form action="/dashboard/articles/{{ $article->id }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $article->title) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type article title" required="" minlength="50" maxlength="255">
                        @error('title')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">* {{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                        <select id="category_id" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            @foreach($categories as $category)
                                @if(old('category_id', $article->category_id) == $category->id)
                                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                @else
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="img">Upload image</label>
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="img" id="img" name="img" type="file" accept="image/*" required="" onchange="previewImage()">
                        @error('img')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">* {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="sm:col-span-2">
                        <input type="hidden" name="oldImage" value="{{ $article->img }}">
                        @if($article->img)
                            <img class="object-cover object-top max-h-96 min-w-full rounded-md" id="imgPreview" src="{{ asset('storage/' . $article->img) }}">
                        @else
                            <img class="object-cover object-top max-h-96 min-w-full rounded-md" id="imgPreview" src="">
                        @endif
                    </div>

                    <div class="sm:col-span-2">
                        <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content</label>
                         <x-forms.tinymce-editor>
                            <x-slot name="oldValue">{{ $article->content }}</x-slot>
                            content
                         </x-forms.tinymce-editor>
                         @error('content')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">* {{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 max-w-fit sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                        Update article
                    </button>
                </div>
            </form>
        </div>
    </section>

    <script>
        img.onchange = evt => {
            const [file] = img.files
            if(file) {
                imgPreview.src = URL.createObjectURL(file)
            }
        }
    </script>
</x-dashboard>