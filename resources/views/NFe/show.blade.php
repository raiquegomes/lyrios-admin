<x-app-layout>
    <x-slot name="header">
            {{ __('Nota Fiscal Eletrônica') }}
    </x-slot>
    <x-slot name="subtitle">
        {{ __('Digitação da nota de fiscal fisica em nosso sistema.') }}
</x-slot>
    <div>
        @livewire('nfe-form')
        <x-jet-section-border />

        @livewire('n-fe-form-view')
        <x-jet-section-border />
    </div>
</x-app-layout>
