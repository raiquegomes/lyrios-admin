<x-app-layout>
    <x-slot name="header">
            {{ __('Guias de Pagamentos') }}
    </x-slot>
    <x-slot name="subtitle">
        {{ __('Todos os chamados feitos para a realização de pagamentos') }}
    </x-slot>
    <div>   
        @livewire('pagamento-guias')
        <x-jet-section-border />
    </div>
</x-app-layout>
