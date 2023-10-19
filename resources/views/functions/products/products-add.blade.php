<x-jet-form-section submit="store">
    <x-slot name="title">
        {{ __('Adicionar Produto ao Banco de Dados') }}
    </x-slot>

    <x-slot name="form">
      <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <x-jet-label value="{{ __('ID do Produto')}}" />
                <input type="text" name="id_product" id="id_product" wire:model="id_product" placeholder="ID Codigo" class="form-control @if (session()->has('success')) is-valid @endif" />
                <x-jet-input-error for="id_product" class="mt-2" />
            </div>
        </div>

        <div class="col-sm-6">
          <div class="form-group">
            <label for="nome">Nome: </label>
            <x-jet-input type="text" name="qty" id="qty" placeholder="Nome do produto" wire:model="nome" autocomplete="nome" class="form-control @if (session()->has('success')) is-valid @endif" />
            <x-jet-input-error for="nome" class="mt-2" />
          </div>
        </div>
        
        <div class="col-sm-6">
          <div class="form-group">
              <x-jet-label value="{{ __('Codigo de Barra')}}" />
              <x-jet-input type="text" name="ean" id="ean" wire:model="ean" placeholder="Codigo de Barra" class="form-control @if (session()->has('success')) is-valid @endif @if (session()->has('error')) is-invalid @endif" />
              <x-jet-input-error for="ean" class="mt-2" />
          </div>
        </div>

      </div>
      <div class="col-span-6">
        <label class="block text-sm font-medium text-gray-700">Esse serviço e usado apenas para o setor de controle de corte. Todos os items colocados já devem ter passado por verificação do relatorio do sistema.</label>
      </div>

      <x-jet-button>
        {{ __('Adicionar Produto') }}
    </x-jet-button>
    </x-slot>
</x-jet-form-section>
