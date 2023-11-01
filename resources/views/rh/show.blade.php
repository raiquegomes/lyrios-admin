<x-app-layout>
    <x-slot name="header">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
          </a>
    </x-slot>
    <x-slot name="subtitle">
        {{ __('Informações sobre o andamento de chamados, cadastro e etc.') }}
    </x-slot>

        @livewire('control-funcionario')
        <!-- Main row -->
        <div class="row">
            <section class="col-lg-7 connectedSortable">
                @livewire('task-list-form')
            </section>
            <section class="col-lg-5 connectedSortable">
                @livewire('utils.utils-cards-info')
            </section>
          </div>    
        </div>
</x-app-layout>
