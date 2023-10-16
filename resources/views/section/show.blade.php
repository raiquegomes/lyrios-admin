<x-app-layout>
    <x-slot name="header">
            {{ __('Tarefas de Departamento') }}
    </x-slot>
    <x-slot name="subtitle">
        {{ __('Ação exclusiva para orientação operacional distribuida na gestação.') }}
    </x-slot>
    <div>
            @livewire('to-do-list-task-add')
            <x-jet-section-border />


    </div>
</x-app-layout>
