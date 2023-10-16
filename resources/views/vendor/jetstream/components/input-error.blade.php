@props(['for'])

@error($for)
    <div {{ $attributes->merge(['class' => 'parsley-error filled']) }}><span class="parsley-required">{{ $message }}</span></div>
@enderror
