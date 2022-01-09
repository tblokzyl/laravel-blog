<x-layout>
    <x-setting heading="Publish New Post">
        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf
            <x-form.input x-model="slug" name="title" type="text"/>
            <x-form.input-slug name="slug" type="text"/>
            <x-form.input name="thumbnail" type="file"/>
            <x-form.textarea name="excerpt" type="text"/>
            <x-form.textarea name="body" type="text"/>
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
    </x-section>
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