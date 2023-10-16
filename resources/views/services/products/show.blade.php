<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Perdas de Produtos') }}
        </h2>
    </x-slot>
    <x-slot name="subtitle">
        {{ __('Gerenciamento de perdas gerais do supermercado (Hortifruti, Açougue etc..)') }}
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @livewire('product-losses-form-add')

            <x-jet-section-border />
        </div>


    </div>
</x-app-layout>
