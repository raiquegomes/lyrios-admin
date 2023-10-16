<x-app-layout>
    <x-slot name="header">
            {{ __('Licitações') }}
    </x-slot>
    <x-slot name="subtitle">
        {{ __('Controle de licitações e liberação de mercadorias') }}
    </x-slot>
    <div>   
        @livewire('licitacao-control')
        <x-jet-section-border />
    </div>
</x-app-layout>
