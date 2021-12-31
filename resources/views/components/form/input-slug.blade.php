@props(['name', 'type' => 'text'])
<div class="mb-6">
    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="{{ $name }}">
        {{ ucwords($name) }}
    </label>
    
    <input 
        {{ $attributes }}
        class="border border-gray-400 text-gray-400 p-2 w-full w-full cursor-not-allowed" 
        type="{{ $type }}" 
        id="{{ $name }}"
        :value="handleSlug(slug)" readonly required>

    @error($name)
    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>