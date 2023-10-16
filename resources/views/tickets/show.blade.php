<x-app-layout>
    <x-slot name="header">
            {{ __('Chamados') }}
    </x-slot>
    <x-slot name="subtitle">
        {{ __('Aqui se encontra todos os chamados abertos e fechados.') }}
    </x-slot>
    <div>
        <div class="row">
            <div class="col-md-12">
                @livewire('open-call-suport-form')
            </div>
            <div class="col-md-12">
                @livewire('view-call-support-form')
            </div>
        </div>
    </div>
</x-app-layout>
