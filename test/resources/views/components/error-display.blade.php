@if (isset($error))
    @error($error)
        <div class="text-red-500 text-xs">{{ $message }}</div>
    @enderror
@endif
