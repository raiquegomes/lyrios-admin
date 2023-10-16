<x-app-layout>
    <x-slot name="header">
            {{ __('Atendimento do Comprador') }}
    </x-slot>
    <x-slot name="subtitle">
        {{ __('Aqui se encontra todos os chamados abertos e fechados.') }}
    </x-slot>
    <div>
        <div class="row">
            <div class="col-md-12">
                @livewire('utils-cards-compradores')
            </div>
            <div class="col-md-12">
                @livewire('tickets-settings')
            </div>
        </div>
    </div>
</x-app-layout>
