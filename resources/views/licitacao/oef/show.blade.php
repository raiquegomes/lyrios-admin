<x-app-layout>
    <x-slot name="header">
            {{ __('OEF') }}
    </x-slot>
    <x-slot name="subtitle">
        {{ __('Controle de licitações e liberação de mercadorias') }}
    </x-slot>
    <div class="row">
        <div class="col-12">
            
        @livewire('add-oef-products')
        <x-jet-section-border />

        @livewire('oef-control')
        <x-jet-section-border />
        </div>
    </div>

    </div>
</x-app-layout>
