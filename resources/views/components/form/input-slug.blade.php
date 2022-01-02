@props(['name'])
<x-form.field>
    <x-form.label name="{{ $name }}"/>

    <input 
        class="border border-gray-200 p-2 w-full rounded cursor-not-allowed" 
        id="{{ $name }}"
        :value="handleSlug(slug)" readonly required
        {{ $attributes(['value' => old($name)]) }}>

    <x-form.error name="{{ $name }}"/>
</x-form.field>