@props(['name'])

<div class="mb-6">
    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="{{ $name }}">
        {{ ucwords($name) }}
    </label>

    <textarea 
        {{ $attributes }}
        class="border border-gray-400 p-2 w-full" 
        type="{{ $name }}" 
        id="{{ $name }}" 
        required>
        {{ old($name) }}
    </textarea>

    @error($name)
    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>
