@php
    $label = $label ?? $name;
@endphp

<label class="block text-gray-700 text-sm font-bold mb-2" for="{{ $name }}">
    {{ $label }}
</label>

<input
    class="shadow appearance-none border @error($name) border-red-500 @enderror rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-3"
    id="email"
    type="{{ $type }}"
    placeholder="{{ $label }}"
    name="{{ $name }}"
    value="{{ old($name) }}"
>

@include('partials.form.input_errors', ['name' => $name])
