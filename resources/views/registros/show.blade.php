<x-app-layout>
    <x-slot name="header">
            {{ __('Registros') }}
    </x-slot>
    <x-slot name="subtitle">
        {{ __('Essa e uma função para registro de cortes dentro de certo prazo.') }}
</x-slot>
    <div>

            @livewire('cut-into-products-view')
            <x-jet-section-border />

            @livewire('cut-into-products-view-a-e')
            <x-jet-section-border />


    </div>
</x-app-layout>
