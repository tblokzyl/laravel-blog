<x-layout>
    <section class="px-6 py-8">
        <x-panel class="max-w-sm mx-auto">
            <form method="POST" action="/admin/posts" x-data="{slug: '', newSlug: ''}">
                @csrf
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">
                        Title
                    </label>

                    <input x-model="slug"  
                        class="border border-gray-400 p-2 w-full" 
                        type="text" 
                        name="title" 
                        id="title"
                        value="{{ old('title') }}" required>

                    @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="slug">
                        Slug
                    </label>

                    <input 
                        class="border border-gray-400 text-gray-500 p-2 w-full cursor-not-allowed" 
                        type="text" 
                        name="slug" 
                        id="slug" 
                        :value="handleSlug(slug)" readonly required>

                    @error('slug')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="excerpt">
                        Excerpt
                    </label>

                    <textarea class="border border-gray-400 p-2 w-full" name="excerpt" id="excerpt"
                        required>{{ old('excerpt') }}</textarea>

                    @error('excerpt')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="body">
                        Body
                    </label>

                    <textarea class="border border-gray-400 p-2 w-full" 
                        name="body" 
                        id="body"
                        required>{{ old('body') }}</textarea>

                    @error('body')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="category">
                        Category
                    </label>

                    <select name="category_id" id="category_id">
                        @foreach (\App\Models\Category::all() as $category)
                            <option
                                value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}
                            >{{ ucwords($category->name) }}</option>
                        @endforeach
                    </select>

                    @error('category')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <x-submit-button class="block ml-auto">Publish</x-submit-button>
            </form>
        </x-panel>
    </section>
    <script>
        function handleSlug(slug) {
            return slug
            .toString().trim().toLowerCase()
            .replace(/\s+/g, '-')
            .replace(/[^\w\-]+/g, '')
            .replace(/\-\-+/g, '-')
            .replace(/^-+/, '')
            .replace(/-+$/, '')
        }
    </script>
</x-layout>