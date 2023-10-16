<x-app-layout>
    <x-slot name="header">
            {{ __('Painel de controle de atividades') }}
    </x-slot>
    <x-slot name="subtitle">
        {{ __('Controle de atividades de departamentos') }}
    </x-slot>
    <div>
        @livewire('dashboard-task')
    </div>
</x-app-layout>
