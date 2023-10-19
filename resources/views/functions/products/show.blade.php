<x-app-layout>
    <x-slot name="header">
            {{ __('Produtos') }}
    </x-slot>
    <x-slot name="subtitle">
        {{ __('Aqui você irá encontrar todas as funções de atividades para produtos.') }}
    </x-slot>
    <div>
        <div class="row">
            <section class="col-lg-7 connectedSortable">
                @livewire('products-add')
            </section>
            <section class="col-lg-5 connectedSortable">
                @livewire('cut-into-products-clear')
            </section>
        </div>
    </div>
</x-app-layout>
