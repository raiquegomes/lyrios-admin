<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar equipe') }}
        </h2>
    </x-slot>
    <x-slot name="subtitle">
        {{ __('Criação de setores para ações operacionais.') }}
    </x-slot>

    <div>
        @livewire('teams.create-team-form')
    </div>
</x-app-layout>
