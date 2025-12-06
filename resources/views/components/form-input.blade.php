@props(['label', 'name', 'type' => 'text', 'value' => '', 'placeholder' => ''])

<div class="mb-4">
    <label class="block text-sm font-medium mb-1">{{ $label }}</label>
    <input 
        type="{{ $type }}" 
        name="{{ $name }}" 
        value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}"
        class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" 
    />
    
    @error($name)
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
