@php
    $label = $label ?? $name;
    $selected = $selected ?? old($name);
    $hasSelected = in_array($selected, array_keys($options ?? []));
@endphp

<label class="block text-gray-700 text-sm font-bold mb-2" for="{{ $name }}">
    {{ $label }}
</label>

<select
    id="{{$name}}-selectbox"
    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
    name={{ $name }}
>

  <option @if(!$hasSelected) selected @endif>Choose {{ $label }}</option>

  @foreach ($options as $key => $value)

    <option value="{{ $key }}">{{ $value }}</option>

  @endforeach

</select>

@include('partials.form.input_errors', ['name' => $name])
