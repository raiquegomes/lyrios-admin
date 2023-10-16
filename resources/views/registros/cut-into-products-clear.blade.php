<x-jet-form-section submit="store">
    <x-slot name="title">
        {{ __('Exportação') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Isso e ações administrativas para fins de controle.') }}
    </x-slot>

    <x-slot name="form">
        <div class="buttons">
            <a wire:click="exportCSVPeF" class="btn btn-primary">EXPORTAR CORTES P&F (TXT)</a>
            <a wire:click="exportCSVAeE" class="btn btn-primary">EXPORTAR CORTES A&E (TXT)</a>

            <button wire:click="clear(1)" class="btn btn-warning">LIMPAR CORTES</a>
        </div>
    </x-slot>

</x-jet-form-section>
