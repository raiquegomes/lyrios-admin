<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Produtos') }}
        </h2>
    </x-slot>
    <x-slot name="subtitle">
        {{ __('Realizar o registros das validades dos produtos.') }}
    </x-slot>
    <div>   
        @livewire('products-validate-form')
        <x-jet-section-border />
    </div>
</x-app-layout>
