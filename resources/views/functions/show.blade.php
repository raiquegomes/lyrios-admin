<x-app-layout>
    <x-slot name="header">
            {{ __('Cortes') }}
    </x-slot>
    <x-slot name="subtitle">
        {{ __('Essa e uma função para registro de cortes dentro de certo prazo.') }}
    </x-slot>
    <div>
        <div class="row">
            <section class="col-lg-7 connectedSortable">
                @livewire('cut-into-products')
            </section>
            <section class="col-lg-5 connectedSortable">
                @livewire('cut-into-products-clear')
            </section>
        </div>
    </div>
</x-app-layout>
