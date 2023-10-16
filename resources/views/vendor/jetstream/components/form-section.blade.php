@props(['submit'])
<div {{ $attributes->merge(['class' => 'card card-primary']) }}>
    <x-jet-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
    </x-jet-section-title>

    <form id="form" wire:submit.prevent="{{ $submit }}">
         <div class="card-body">
             {{ $form }}
         </div>
         @if (isset($actions))
            <div class="card-footer">
                {{ $actions }}
            </div>
        @endif
    </form>
</div>