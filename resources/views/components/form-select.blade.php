@props(['label', 'name', 'options' => [], 'selected' => null])

<div class="mb-4">
    <label class="block text-sm font-medium mb-1">{{ $label }}</label>
    <select name="{{ $name }}" class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">

        {{-- Blank option --}}
        <option value="" {{ $selected === null ? 'selected' : '' }}>-- Pilih --</option>

        {{-- Options --}}
        @foreach ($options as $key => $text)
            <option value="{{ $key }}" {{ $selected === $key ? 'selected' : '' }}>
                {{ $text }}
            </option>
        @endforeach
    </select>
</div>
