<div>
    @error($name)
        @foreach ($errors->get($name) as $error)
            <p class="text-red-500 text-xs italic mb-2">{{ $error }}</p>
        @endforeach
    @enderror
</div>
